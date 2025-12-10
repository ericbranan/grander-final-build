#!/usr/bin/env node
/*
 * Grander content seeding script
 * - Reads a structured payload (default grander_rest_payload_outline_v1.json)
 * - Uses WordPress REST API to upsert taxonomies, pages, CPT items, and options
 * - Idempotent via slug-based lookups and update calls
 */

const fs = require('fs');
const path = require('path');

const WP_BASE_URL = process.env.WP_BASE_URL;
const WP_APP_USER = process.env.WP_APP_USER;
const WP_APP_PASSWORD = process.env.WP_APP_PASSWORD;
const WP_AUTH_TOKEN = process.env.WP_AUTH_TOKEN;
const WP_ENV = process.env.WP_ENV || 'staging';

if (!WP_BASE_URL) {
  console.error('WP_BASE_URL is required');
  process.exit(1);
}

const args = process.argv.slice(2);
const dryRun = args.includes('--dry-run');
const payloadPathArg = args.find((arg) => arg.startsWith('--payload='));
const payloadPath = payloadPathArg ? payloadPathArg.split('=')[1] : 'grander_rest_payload_outline_v1.json';

const resolvedPayloadPath = path.resolve(process.cwd(), payloadPath);
if (!fs.existsSync(resolvedPayloadPath)) {
  console.error(`Payload file not found: ${resolvedPayloadPath}`);
  process.exit(1);
}

const payload = JSON.parse(fs.readFileSync(resolvedPayloadPath, 'utf8'));

const log = (msg) => console.log(`[seed][${WP_ENV}] ${msg}`);

const authHeaders = () => {
  if (WP_AUTH_TOKEN) {
    return { Authorization: `Bearer ${WP_AUTH_TOKEN}` };
  }
  if (WP_APP_USER && WP_APP_PASSWORD) {
    const token = Buffer.from(`${WP_APP_USER}:${WP_APP_PASSWORD}`).toString('base64');
    return { Authorization: `Basic ${token}` };
  }
  return {};
};

const apiFetch = async (endpoint, options = {}) => {
  const url = `${WP_BASE_URL.replace(/\/$/, '')}${endpoint}`;
  const headers = {
    'Content-Type': 'application/json',
    ...authHeaders(),
    ...(options.headers || {}),
  };
  const fetchOptions = {
    method: 'GET',
    ...options,
    headers,
  };

  if (dryRun && fetchOptions.method && fetchOptions.method !== 'GET') {
    log(`DRY RUN: ${fetchOptions.method} ${endpoint}`);
    return null;
  }

  const response = await fetch(url, fetchOptions);
  if (!response.ok) {
    const text = await response.text();
    throw new Error(`Request failed ${response.status} ${response.statusText}: ${text}`);
  }
  if (response.status === 204) return null;
  return response.json();
};

const slugify = (value) =>
  value
    .toString()
    .trim()
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/^-+|-+$/g, '')
    .replace(/-{2,}/g, '-');

const findBySlug = async (type, slug) => {
  const data = await apiFetch(`/wp-json/wp/v2/${type}?slug=${slug}`);
  return Array.isArray(data) && data.length > 0 ? data[0] : null;
};

const ensureTerm = async (taxonomy, term) => {
  const existing = await apiFetch(`/wp-json/wp/v2/${taxonomy}?slug=${term.slug}`);
  if (existing && existing.length) {
    const current = existing[0];
    if (term.name && current.name !== term.name) {
      await apiFetch(`/wp-json/wp/v2/${taxonomy}/${current.id}`, {
        method: 'POST',
        body: JSON.stringify({ name: term.name }),
      });
    }
    return existing[0].id;
  }
  const created = await apiFetch(`/wp-json/wp/v2/${taxonomy}`, {
    method: 'POST',
    body: JSON.stringify(term),
  });
  return created?.id;
};

const syncTaxonomies = async () => {
  const taxonomyMap = {};
  const entries = payload.taxonomies || {};
  for (const [taxonomy, terms] of Object.entries(entries)) {
    taxonomyMap[taxonomy] = {};
    for (const term of terms) {
      const id = await ensureTerm(taxonomy, term);
      if (id) {
        taxonomyMap[taxonomy][term.slug] = id;
      }
    }
  }
  return taxonomyMap;
};

const resolveTaxInput = (taxonomyMap, taxonomySlugs = {}) => {
  const taxInput = {};
  Object.entries(taxonomySlugs).forEach(([taxonomy, slugs]) => {
    const ids = (slugs || []).map((slug) => taxonomyMap?.[taxonomy]?.[slug]).filter(Boolean);
    if (ids.length) taxInput[taxonomy] = ids;
  });
  return Object.keys(taxInput).length ? taxInput : undefined;
};

const upsert = async (type, item, taxonomyMap) => {
  const slug = item.slug || slugify(item.title || 'item');
  const existing = await findBySlug(type, slug);
  const basePayload = {
    title: item.title || slug,
    slug,
    status: item.status || 'publish',
    content: item.content || item.body || '',
    acf: item.acf || undefined,
    meta: item.meta || undefined,
  };
  const taxInput = resolveTaxInput(taxonomyMap, item.taxonomy || {});
  if (taxInput) basePayload.tax_input = taxInput;

  if (existing) {
    await apiFetch(`/wp-json/wp/v2/${type}/${existing.id}`, {
      method: 'POST',
      body: JSON.stringify(basePayload),
    });
    log(`Updated ${type} ${slug}`);
    return existing.id;
  }

  const created = await apiFetch(`/wp-json/wp/v2/${type}`, {
    method: 'POST',
    body: JSON.stringify(basePayload),
  });
  log(`Created ${type} ${slug}`);
  return created?.id;
};

const syncPages = async (taxonomyMap) => {
  const pages = payload.pages || {};
  for (const [slug, pageConfig] of Object.entries(pages)) {
    const existing = await findBySlug('pages', slug);
    const data = {
      title: pageConfig.title || slug,
      slug,
      status: pageConfig.status || 'publish',
      content: pageConfig.content || '',
      acf: pageConfig.acf || undefined,
    };
    if (existing) {
      await apiFetch(`/wp-json/wp/v2/pages/${existing.id}`, {
        method: 'POST',
        body: JSON.stringify(data),
      });
      log(`Updated page ${slug}`);
    } else {
      await apiFetch('/wp-json/wp/v2/pages', {
        method: 'POST',
        body: JSON.stringify(data),
      });
      log(`Created page ${slug}`);
    }
  }
};

const syncProjects = async (taxonomyMap) => {
  const projects = payload.projects || [];
  for (const project of projects) {
    await upsert('project', project, taxonomyMap);
  }
};

const syncTestimonials = async () => {
  const testimonials = payload.testimonials || payload.testimonials_seed || [];
  for (const testimonial of testimonials) {
    const name = testimonial.title || `${testimonial.first_name || ''} ${testimonial.last_initial || ''}`.trim();
    await upsert('testimonial', {
      title: name,
      slug: testimonial.slug || slugify(name),
      status: 'publish',
      content: testimonial.quote || testimonial.content || '',
      acf: testimonial.acf || undefined,
    });
  }
};

const syncFaqs = async (taxonomyMap) => {
  const faqs = payload.faqs || [];
  for (const faq of faqs) {
    await upsert('faq', faq, taxonomyMap);
  }

  const faqSeed = payload.faq_seed || {};
  const faqOptions = [];
  Object.entries(faqSeed).forEach(([group, entries]) => {
    entries.forEach((entry) => {
      faqOptions.push({
        group,
        question: entry.question,
        answer: entry.answer,
      });
    });
  });
  if (faqOptions.length) {
    await apiFetch('/wp-json/grander/v1/options', {
      method: 'POST',
      body: JSON.stringify({ gc_faq_items: faqOptions }),
    });
    log(`Updated FAQ options (${faqOptions.length} items)`);
  }
};

const syncBlogDrafts = async () => {
  const posts = payload.blog_new_drafts || payload.posts || [];
  for (const post of posts) {
    await upsert('posts', {
      title: post.title,
      slug: post.slug || slugify(post.title || 'draft'),
      status: post.status || 'draft',
      content: post.content || '',
    });
  }
};

const syncOptions = async () => {
  if (!payload.options) return;
  await apiFetch('/wp-json/grander/v1/options', {
    method: 'POST',
    body: JSON.stringify(payload.options),
  });
  log('Updated global options');
};

const main = async () => {
  log(`Using payload: ${resolvedPayloadPath}`);
  const taxonomyMap = await syncTaxonomies();
  await syncPages(taxonomyMap);
  await syncProjects(taxonomyMap);
  await syncTestimonials();
  await syncFaqs(taxonomyMap);
  await syncBlogDrafts();
  await syncOptions();
  log('Content seeding complete');
};

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
