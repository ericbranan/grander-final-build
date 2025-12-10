# REST seeding guide for Grander Core

This document provides the import order, example requests, and script patterns for bulk populating the Grander Construction website via REST API.

---

## Assumptions

Before running any import scripts:

1. **WordPress site URL**: Replace `https://staging.granderconstruction.com` with your actual staging or production URL
2. **Authentication**: WordPress Application Passwords are enabled and configured
3. **Plugin active**: Grander Core plugin is installed and activated
4. **ACF Pro active**: ACF Pro is installed with REST API support enabled
5. **Permalinks saved**: Visit Settings > Permalinks and click Save (required for REST routes)
6. **Caching disabled**: Temporarily disable caching plugins during import

---

## Prerequisites

### Authentication setup

1. Go to WordPress Admin > Users > Your Profile
2. Scroll to Application Passwords
3. Create a new application password named "REST Import"
4. Copy the password (shown only once)
5. Use Basic Auth with your username and the application password

```bash
# Base64 encode credentials
echo -n "username:application_password" | base64
```

### Disable caching during import

Temporarily disable any caching plugins during the import to ensure immediate updates.

---

## Import order

Follow this sequence to avoid broken relationships:

1. **Taxonomies** - Create terms before posts that reference them
   - service_category
   - project_tag
   - faq_group

2. **Media** - Upload images before posts that use them

3. **CPT entries** - Create in this order:
   - Projects (references service_category, project_tag, media)
   - Testimonials (references service_category)
   - FAQs (references faq_group)
   - Events (if using)

4. **Page ACF fields** - Update after CPTs exist for relationship fields

5. **Global options** - Update via custom endpoint

6. **Blog posts** - Create new drafts last

---

## Endpoint reference

### Standard WordPress endpoints

| Endpoint | Method | Purpose |
|----------|--------|---------|
| `/wp-json/wp/v2/pages` | GET/POST | List or create pages |
| `/wp-json/wp/v2/pages/{id}` | POST | Update page |
| `/wp-json/wp/v2/posts` | GET/POST | Blog posts |
| `/wp-json/wp/v2/media` | POST | Upload images |
| `/wp-json/wp/v2/project` | GET/POST | Projects CPT |
| `/wp-json/wp/v2/testimonial` | GET/POST | Testimonials CPT |
| `/wp-json/wp/v2/faq` | GET/POST | FAQs CPT |
| `/wp-json/wp/v2/gc_event` | GET/POST | Events CPT |
| `/wp-json/wp/v2/service_category` | GET/POST | Service categories |
| `/wp-json/wp/v2/project_tag` | GET/POST | Project tags |
| `/wp-json/wp/v2/faq_group` | GET/POST | FAQ groups |

### Custom Grander endpoint

| Endpoint | Method | Purpose |
|----------|--------|---------|
| `/wp-json/grander/v1/options` | GET | Read all global options |
| `/wp-json/grander/v1/options` | POST | Update global options |
| `/wp-json/grander/v1/options/{key}` | GET | Read single option |

---

## Example requests

### 1. Create service category terms

```bash
# Custom homes
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/service_category" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Custom homes",
    "slug": "custom-homes",
    "description": "Custom home builds including farmhouse, transitional, and contemporary styles."
  }'

# Outdoor spaces
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/service_category" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Outdoor spaces",
    "slug": "outdoor-spaces",
    "description": "Porches, patios, coverings, decks, and pavilions."
  }'

# Pool houses, garages, and ADUs
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/service_category" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Pool houses, garages, and ADUs",
    "slug": "pool-houses-garages-adus",
    "description": "Multi-purpose structures for flexible living."
  }'

# Sunrooms and additions
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/service_category" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Sunrooms and additions",
    "slug": "sunrooms-additions",
    "description": "Light-filled expansions and home additions."
  }'
```

### 2. Create FAQ group terms

```bash
# Build process
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/faq_group" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Build process",
    "slug": "build-process"
  }'

# Contact (canonical FAQ set from staging)
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/faq_group" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Contact",
    "slug": "contact"
  }'

# Services general
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/faq_group" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Services general",
    "slug": "services-general"
  }'
```

### 3. Upload media

```bash
# Upload an image
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/media" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Disposition: attachment; filename=custom-farmhouse-hero.jpg" \
  -H "Content-Type: image/jpeg" \
  --data-binary @"/path/to/custom-farmhouse-hero.jpg"

# Response includes the media ID to use in ACF fields
# {"id": 123, "source_url": "https://...", ...}
```

### 4. Create a project

```bash
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/project" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Custom farmhouse charm",
    "slug": "custom-farmhouse-charm",
    "status": "publish",
    "excerpt": "Open concept custom farmhouse combining timeless board and batten character with modern comfort.",
    "featured_media": 123,
    "service_category": [5],
    "project_tag": [],
    "acf": {
      "gc_project_location_city": "Fountain Inn",
      "gc_project_location_state": "SC",
      "gc_project_short_summary": "Open concept custom farmhouse combining timeless board and batten character with modern comfort and expansive covered patio space.",
      "gc_project_has_design_image": false,
      "gc_project_gallery": [124, 125, 126, 127],
      "gc_project_featured_on_home": true
    }
  }'
```

### 5. Create a testimonial

```bash
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/testimonial" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Sallie B",
    "slug": "sallie-b",
    "status": "publish",
    "acf": {
      "gc_testimonial_quote": "Micah and his team treat construction as a process, not a one time event. They solved issues quickly and fairly and delivered a result we trust.",
      "gc_testimonial_first_name": "Sallie",
      "gc_testimonial_last_initial": "B",
      "gc_testimonial_city": "",
      "gc_testimonial_project_type": "Custom home",
      "gc_testimonial_source": "magazine"
    }
  }'
```

### 6. Create an FAQ

```bash
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/faq" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "What are the main phases of the Grander build process?",
    "slug": "main-phases-build-process",
    "status": "publish",
    "faq_group": [3],
    "acf": {
      "gc_faq_answer": "The five core phases are listed above. Exact steps can vary based on project type, complexity, site conditions, and product availability."
    }
  }'
```

### 7. Update page ACF fields

First, get the page ID by slug:

```bash
curl -X GET "https://staging.granderconstruction.com/wp-json/wp/v2/pages?slug=home" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS"
```

Then update ACF fields:

```bash
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/pages/2" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "acf": {
      "gc_hero_headline": "Experience the art of building with grandeur",
      "gc_hero_subline": "Custom homes and outdoor living spaces built with purpose across Upstate South Carolina.",
      "gc_home_expert_offerings_intro": "Grander Construction brings custom homes and outdoor living spaces together under one design driven approach. From full scale builds to targeted additions, our team pairs refined craftsmanship with practical building science to create spaces that fit your lifestyle, elevate daily living, and stand up to the demands of time and climate.",
      "gc_home_performance_teaser_headline": "Discover the art of custom home building in Upstate South Carolina",
      "gc_home_performance_teaser_body": "Grander Construction believes homes should do more than look beautiful. High performance building brings healthier indoor air, better year round comfort, and lower long term energy costs. By combining advanced methods with durable materials, we build homes that last, protect your investment, and support a healthier way of living.",
      "gc_home_testimonial_slider_variant": "v1",
      "gc_trust_bar_enabled_on_page": true
    }
  }'
```

### 8. Update global options

```bash
curl -X POST "https://staging.granderconstruction.com/wp-json/grander/v1/options" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "gc_announcement_enabled": false,
    "gc_service_area_enabled": true,
    "gc_service_area_text": "Proudly serving the Upstate of South Carolina with custom homes and outdoor living.",
    "gc_phone_number": "(864) 555-1234",
    "gc_header_estimate_label": "Request an estimate",
    "gc_header_estimate_mode": "lightbox",
    "gc_social_instagram_url": "https://instagram.com/granderconstruction",
    "gc_social_facebook_url": "https://facebook.com/granderconstruction",
    "gc_events_enabled": false,
    "gc_featured_projects_enabled": true,
    "gc_featured_projects": [201, 202, 203, 204],
    "gc_estimate_form_shortcode": "[gravityform id=\"1\" title=\"false\" description=\"false\"]"
  }'
```

### 9. Create a blog post draft

```bash
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/posts" \
  -H "Authorization: Basic YOUR_BASE64_CREDENTIALS" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "What high performance building means for Upstate homes",
    "slug": "high-performance-building-upstate",
    "status": "draft",
    "excerpt": "Learn how high performance building delivers healthier air, lower energy costs, and lasting value for South Carolina homeowners."
  }'
```

---

## Mapping to payload outline

The `grander_rest_payload_outline_v1.json` file defines the complete data structure. Here's how each section maps to REST endpoints:

| Payload Section | REST Endpoint | ACF Field Prefix |
|-----------------|---------------|------------------|
| `taxonomies.service_category` | `/wp/v2/service_category` | N/A (term fields) |
| `taxonomies.faq_group` | `/wp/v2/faq_group` | N/A (term fields) |
| `cpt.projects[]` | `/wp/v2/project` | `gc_project_*` |
| `cpt.testimonials[]` | `/wp/v2/testimonial` | `gc_testimonial_*` |
| `cpt.faqs[]` | `/wp/v2/faq` | `gc_faq_*` |
| `cpt.events[]` | `/wp/v2/gc_event` | `gc_event_*` |
| `pages.home` | `/wp/v2/pages/{id}` | `gc_home_*`, `gc_hero_*` |
| `pages.services` | `/wp/v2/pages/{id}` | `gc_service_*` |
| `pages.team` | `/wp/v2/pages/{id}` | `gc_team_*` |
| `pages.gallery` | `/wp/v2/pages/{id}` | `gc_gallery_*` |
| `pages.contact` | `/wp/v2/pages/{id}` | `gc_contact_*` |
| `pages.estimate` | `/wp/v2/pages/{id}` | `gc_estimate_*` |
| `options` | `/grander/v1/options` | `gc_*` |

### Field name conventions

All ACF fields use the `gc_` prefix followed by context:

- `gc_project_*` - Project CPT fields
- `gc_testimonial_*` - Testimonial CPT fields
- `gc_faq_*` - FAQ CPT fields
- `gc_event_*` - Event CPT fields
- `gc_home_*` - Home page fields
- `gc_service_*` - Services page fields
- `gc_team_*` - Team page fields
- `gc_hero_*` - Shared hero fields (any page)
- `gc_trust_*` - Trust bar fields
- `gc_announcement_*` - Announcement bar options
- `gc_social_*` - Social link options

---

## Script pattern (Node.js example)

```javascript
const axios = require('axios');

const BASE_URL = 'https://staging.granderconstruction.com/wp-json';
const AUTH = Buffer.from('username:app_password').toString('base64');

const headers = {
  'Authorization': `Basic ${AUTH}`,
  'Content-Type': 'application/json'
};

// Store created IDs for relationships
const idMap = {
  serviceCategories: {},
  faqGroups: {},
  projects: {},
  testimonials: {},
  media: {}
};

async function createTaxonomyTerm(taxonomy, data) {
  const response = await axios.post(
    `${BASE_URL}/wp/v2/${taxonomy}`,
    data,
    { headers }
  );
  console.log(`Created ${taxonomy}: ${data.name} (ID: ${response.data.id})`);
  return response.data;
}

async function createProject(data) {
  const response = await axios.post(
    `${BASE_URL}/wp/v2/project`,
    data,
    { headers }
  );
  console.log(`Created project: ${data.title} (ID: ${response.data.id})`);
  return response.data;
}

async function updatePageACF(pageId, acfData) {
  const response = await axios.post(
    `${BASE_URL}/wp/v2/pages/${pageId}`,
    { acf: acfData },
    { headers }
  );
  console.log(`Updated page ${pageId} ACF fields`);
  return response.data;
}

async function updateOptions(optionsData) {
  const response = await axios.post(
    `${BASE_URL}/grander/v1/options`,
    optionsData,
    { headers }
  );
  console.log('Updated global options:', response.data.updated);
  return response.data;
}

// Main import function
async function runImport() {
  try {
    // 1. Create service categories
    const categories = [
      { name: 'Custom homes', slug: 'custom-homes' },
      { name: 'Outdoor spaces', slug: 'outdoor-spaces' },
      { name: 'Pool houses, garages, and ADUs', slug: 'pool-houses-garages-adus' },
      { name: 'Sunrooms and additions', slug: 'sunrooms-additions' }
    ];

    for (const cat of categories) {
      const result = await createTaxonomyTerm('service_category', cat);
      idMap.serviceCategories[cat.slug] = result.id;
    }

    // 2. Create FAQ groups
    const faqGroups = [
      { name: 'Build process', slug: 'build-process' },
      { name: 'Contact', slug: 'contact' },
      { name: 'Services general', slug: 'services-general' }
    ];

    for (const group of faqGroups) {
      const result = await createTaxonomyTerm('faq_group', group);
      idMap.faqGroups[group.slug] = result.id;
    }

    // 3. Create projects (using category IDs from map)
    const projects = [
      {
        title: 'Custom farmhouse charm',
        slug: 'custom-farmhouse-charm',
        status: 'publish',
        service_category: [idMap.serviceCategories['custom-homes']],
        acf: {
          gc_project_location_city: 'Fountain Inn',
          gc_project_location_state: 'SC',
          gc_project_short_summary: 'Open concept custom farmhouse combining timeless board and batten character with modern comfort and expansive covered patio space.',
          gc_project_has_design_image: false,
          gc_project_featured_on_home: true
        }
      }
      // ... more projects
    ];

    for (const project of projects) {
      const result = await createProject(project);
      idMap.projects[project.slug] = result.id;
    }

    // 4. Update global options
    await updateOptions({
      gc_service_area_enabled: true,
      gc_service_area_text: 'Proudly serving the Upstate of South Carolina with custom homes and outdoor living.',
      gc_events_enabled: false,
      gc_featured_projects_enabled: true,
      gc_featured_projects: Object.values(idMap.projects)
    });

    console.log('Import complete!');
    console.log('ID Map:', JSON.stringify(idMap, null, 2));

  } catch (error) {
    console.error('Import failed:', error.response?.data || error.message);
  }
}

runImport();
```

---

## Data quality rules

### Slug-based lookup
- Use slugs as primary lookup keys
- Before creating, check if slug exists
- If found, update instead of create

### ID mapping
- Keep a local JSON file mapping slugs to IDs
- Update after each successful creation
- Use for relationship fields

### Re-run safety
```javascript
async function getOrCreate(endpoint, slug, createData) {
  // Check if exists
  const existing = await axios.get(
    `${BASE_URL}/wp/v2/${endpoint}?slug=${slug}`,
    { headers }
  );

  if (existing.data.length > 0) {
    console.log(`${endpoint} "${slug}" exists, updating...`);
    return axios.post(
      `${BASE_URL}/wp/v2/${endpoint}/${existing.data[0].id}`,
      createData,
      { headers }
    );
  }

  console.log(`Creating ${endpoint} "${slug}"...`);
  return axios.post(
    `${BASE_URL}/wp/v2/${endpoint}`,
    createData,
    { headers }
  );
}
```

---

## Safety tips

### Always test on staging first

Never run import scripts directly against production. Use a staging environment that mirrors production:

1. Clone production database to staging
2. Run all imports on staging
3. Verify content displays correctly
4. Only then run against production

### Idempotent imports

Design scripts to be safely re-runnable:

```javascript
// Good: Check before create
const existing = await getBySlug('project', 'custom-farmhouse');
if (existing) {
  await updateProject(existing.id, projectData);
} else {
  await createProject(projectData);
}

// Bad: Always create (will fail on duplicates or create duplicates)
await createProject(projectData);
```

### Error handling

Wrap each operation with proper error handling:

```javascript
async function safeCreate(type, data) {
  try {
    const result = await createItem(type, data);
    console.log(`✓ Created ${type}: ${data.slug}`);
    return { success: true, id: result.id };
  } catch (error) {
    console.error(`✗ Failed ${type}: ${data.slug}`);
    console.error(`  Reason: ${error.response?.data?.message || error.message}`);
    return { success: false, error: error.message };
  }
}

// Collect results for summary
const results = [];
for (const project of projects) {
  results.push(await safeCreate('project', project));
}

// Summary
const succeeded = results.filter(r => r.success).length;
const failed = results.filter(r => !r.success).length;
console.log(`\nImport complete: ${succeeded} succeeded, ${failed} failed`);
```

### Rate limiting

Add delays between requests if importing large amounts of data:

```javascript
function delay(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

for (const item of largeDataset) {
  await createItem(item);
  await delay(100); // 100ms between requests
}
```

### Backup before import

Always create a database backup before running import scripts:

```bash
# WP-CLI backup
wp db export backup-before-import.sql

# Or use your hosting provider's backup tools
```

---

## Validation checklist

Before running the import:

- [ ] WordPress application password created
- [ ] Permalinks set (Settings > Permalinks > Save)
- [ ] Caching plugins disabled
- [ ] Grander Core plugin activated
- [ ] ACF Pro activated
- [ ] Test single request works

After running the import:

- [ ] All taxonomy terms created
- [ ] All projects created and categorized
- [ ] All testimonials created
- [ ] All FAQs created and grouped
- [ ] Global options updated
- [ ] Page ACF fields populated
- [ ] Featured projects relationship working
- [ ] Re-enable caching plugins

---

## Troubleshooting

### 401 Unauthorized

- Verify Application Password is correctly created
- Check Base64 encoding includes username and password separated by colon
- Ensure no extra whitespace in credentials

### 403 Forbidden

- User must have appropriate capabilities (Administrator recommended)
- Check if security plugin is blocking REST API

### 404 Not Found

- Verify permalinks are saved
- Check endpoint URL matches CPT/taxonomy REST base
- Ensure Grander Core plugin is activated

### ACF fields not saving

- Verify ACF Pro is active
- Check field names match exactly (case-sensitive)
- Ensure `show_in_rest` is true for all field groups
- For image fields, pass media ID (integer), not URL

### Relationship fields empty

- Ensure referenced posts exist before creating relationships
- Pass array of post IDs, not slugs
- Verify the relationship field's post type setting matches
