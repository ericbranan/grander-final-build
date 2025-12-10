#!/usr/bin/env node
/*
 * Post-deploy validation script
 * Compares live REST data against the canonical payload to ensure visual sync readiness.
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
const payloadPathArg = args.find((arg) => arg.startsWith('--payload='));
const payloadPath = payloadPathArg ? payloadPathArg.split('=')[1] : 'grander_rest_payload_outline_v1.json';
const resolvedPayloadPath = path.resolve(process.cwd(), payloadPath);
if (!fs.existsSync(resolvedPayloadPath)) {
  console.error(`Payload file not found: ${resolvedPayloadPath}`);
  process.exit(1);
}
const payload = JSON.parse(fs.readFileSync(resolvedPayloadPath, 'utf8'));

const log = (msg) => console.log(`[validate][${WP_ENV}] ${msg}`);

const authHeaders = () => {
  if (WP_AUTH_TOKEN) return { Authorization: `Bearer ${WP_AUTH_TOKEN}` };
  if (WP_APP_USER && WP_APP_PASSWORD) {
    const token = Buffer.from(`${WP_APP_USER}:${WP_APP_PASSWORD}`).toString('base64');
    return { Authorization: `Basic ${token}` };
  }
  return {};
};

const apiFetch = async (endpoint) => {
  const url = `${WP_BASE_URL.replace(/\/$/, '')}${endpoint}`;
  const response = await fetch(url, { headers: { ...authHeaders() } });
  if (!response.ok) {
    const text = await response.text();
    throw new Error(`Request failed ${response.status} ${response.statusText}: ${text}`);
  }
  return response.json();
};

const fetchBySlug = async (type, slug) => {
  const data = await apiFetch(`/wp-json/wp/v2/${type}?slug=${slug}`);
  return Array.isArray(data) && data.length ? data[0] : null;
};

const diffObject = (expected, actual, pathPrefix = '') => {
  const issues = [];
  Object.entries(expected || {}).forEach(([key, value]) => {
    const fullPath = pathPrefix ? `${pathPrefix}.${key}` : key;
    if (value && typeof value === 'object' && !Array.isArray(value)) {
      issues.push(...diffObject(value, actual?.[key] || {}, fullPath));
    } else {
      const live = actual?.[key];
      if (Array.isArray(value)) {
        if (!Array.isArray(live) || value.length !== live.length) {
          issues.push(`${fullPath} expected ${value.length} items, found ${Array.isArray(live) ? live.length : 0}`);
        }
      } else if (value !== live) {
        issues.push(`${fullPath} mismatch (expected "${value}" got "${live}")`);
      }
    }
  });
  return issues;
};

const validatePages = async () => {
  const issues = [];
  for (const [slug, pageConfig] of Object.entries(payload.pages || {})) {
    const page = await fetchBySlug('pages', slug);
    if (!page) {
      issues.push(`Page missing: ${slug}`);
      continue;
    }
    issues.push(...diffObject(pageConfig.acf || {}, page.acf || {}, `page:${slug}.acf`));
  }
  return issues;
};

const validateOptions = async () => {
  if (!payload.options) return [];
  const live = await apiFetch('/wp-json/grander/v1/options');
  return diffObject(payload.options, live, 'options');
};

const validateTaxonomies = async () => {
  const issues = [];
  for (const [taxonomy, terms] of Object.entries(payload.taxonomies || {})) {
    const live = await apiFetch(`/wp-json/wp/v2/${taxonomy}?per_page=100`);
    terms.forEach((term) => {
      const match = live.find((entry) => entry.slug === term.slug);
      if (!match) issues.push(`Missing term ${term.slug} in ${taxonomy}`);
    });
  }
  return issues;
};

const main = async () => {
  log(`Validating against payload ${resolvedPayloadPath}`);
  const issues = [
    ...(await validateTaxonomies()),
    ...(await validatePages()),
    ...(await validateOptions()),
  ];

  if (issues.length === 0) {
    log('Validation passed: live site matches payload for tracked fields');
  } else {
    log(`Validation found ${issues.length} potential mismatches:`);
    issues.forEach((issue) => console.log(` - ${issue}`));
    process.exitCode = 1;
  }
};

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
