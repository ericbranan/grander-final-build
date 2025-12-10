# Grander Construction REST API content seeding guide

This document defines the recommended REST API structure and usage for bulk populating the Grander Construction website after templates, ACF groups, and global modules are built.

It assumes WordPress, Elementor, ACF Pro, and a small site plugin that registers custom post types, taxonomies, and optional custom endpoints for global settings.

This guide is written so you can run a structured import without manually pasting content on each page.

---

## 1. The core approach

You are building the site so layout is handled by Elementor templates, while content is stored in WordPress entities that are REST friendly.

The content you will seed should live in:

1. pages  
2. custom post types  
3. taxonomies  
4. ACF fields attached to those objects  
5. global options data only if exposed by a custom endpoint

This keeps the import predictable and easy to re run.

---

## 2. Authentication options

Choose one consistent auth method for your import script.

### 2.1 Application passwords

Best for quick internal scripts.

- Create an Application Password for a privileged admin user.
- Use basic auth with the username and application password.

### 2.2 OAuth or JWT

Use only if you expect long term programmatic integrations beyond this one time import.

---

## 3. Required plugin level configuration

Your site plugin should handle these registrations.

### 3.1 Custom post types

Recommended CPTs for your final system:

1. Projects  
2. Testimonials  
3. Events  
4. FAQs (optional if you decide to move FAQs out of options)

For each CPT:

- show_in_rest: true  
- supports: title, editor, excerpt, thumbnail  
- has_archive: true for Projects and Blog like content

Suggested slugs:

- projects: `project`  
- testimonials: `testimonial`  
- events: `event`  
- faqs: `faq`

If you prefer more separation:

- `grander_project`, `grander_testimonial`, etc.

Pick one naming scheme and use it everywhere.

### 3.2 Taxonomies

Recommended taxonomies:

1. Service category  
2. Project tags  
3. FAQ groups if using an FAQ CPT

For each taxonomy:

- show_in_rest: true  
- hierarchical: true for service category  
- non hierarchical for tags

Suggested slugs:

- service category: `service_category`  
- project tags: `project_tag`  
- faq groups: `faq_group`

### 3.3 ACF REST exposure

For every ACF field group you want to populate:

- enable Show in REST API

This is a field group level setting.

---

## 4. Object map and what will be populated

### 4.1 Pages

You will seed the following core pages:

- Home  
- About our company  
- Build process  
- Our team  
- Gallery  
- The Blueprint blog landing  
- Contact  
- Performance building  
- Request an estimate

Page bodies can be minimal if Elementor is handling most layout. Your import will primarily populate ACF fields that feed templates.

### 4.2 Projects

Projects will drive:

- services page portfolios  
- gallery filters  
- homepage featured projects  
- future social proof

### 4.3 Testimonials

Testimonials will feed:

- homepage section  
- team page section  
- services pages if enabled  
- estimate page micro proof

### 4.4 FAQs

Two supported models.

Model A preferred for automation  
FAQ CPT with FAQ group taxonomy

Model B simplest  
Global FAQ library in ACF options with a custom options REST endpoint

This guide includes both.

### 4.5 Events

Options based or CPT based.

If you want easiest list management and clean REST:

- Events CPT

---

## 5. Standard REST endpoints

Assuming standard WordPress endpoints.

### 5.1 Pages

- List pages  
  GET /wp-json/wp/v2/pages

- Get a specific page  
  GET /wp-json/wp/v2/pages/{id}

- Create or update  
  POST /wp-json/wp/v2/pages  
  POST /wp-json/wp/v2/pages/{id}

### 5.2 Posts

Blog posts will use:

- GET /wp-json/wp/v2/posts  
- POST /wp-json/wp/v2/posts

### 5.3 Media

Upload images first when you need featured images or galleries.

- POST /wp-json/wp/v2/media

### 5.4 Custom post types

Once registered with show_in_rest:

- GET /wp-json/wp/v2/{cpt_slug}  
- POST /wp-json/wp/v2/{cpt_slug}

Examples:

- /wp-json/wp/v2/project  
- /wp-json/wp/v2/testimonial  
- /wp-json/wp/v2/event  
- /wp-json/wp/v2/faq

### 5.5 Taxonomies

Once registered with show_in_rest:

- GET /wp-json/wp/v2/{taxonomy_slug}  
- POST /wp-json/wp/v2/{taxonomy_slug}

---

## 6. Recommended ACF field naming and payload patterns

Use stable, human readable field names.

### 6.1 Services templates relationships

If you attach service specific controls to each service page:

Example field names:

- service_overview  
- service_featured_projects  
- service_portfolio_sections  
- service_faq_groups  
- service_jump_links_enabled  
- service_portfolio_cta_text

### 6.2 Projects ACF fields

Recommended fields on the Projects CPT:

- project_location_city  
- project_location_state  
- project_service_category (taxonomy assignment, not text)  
- project_short_summary  
- project_before_image  
- project_gallery  
- project_has_before_toggle  
- project_featured_on_home_toggle

### 6.3 Testimonials ACF fields

- testimonial_quote  
- testimonial_first_name  
- testimonial_last_initial  
- testimonial_city  
- testimonial_service_category optional  
- testimonial_source

### 6.4 Events ACF fields

- event_start_date  
- event_end_date  
- event_start_time  
- event_end_time  
- event_location_name  
- event_city_state  
- event_short_description  
- event_button_label  
- event_button_url

---

## 7. Model A FAQ CPT design

If you choose an FAQ CPT.

### 7.1 CPT slug

- faq

### 7.2 Taxonomy slug

- faq_group

### 7.3 ACF fields on FAQ

- faq_question  
- faq_answer  
- faq_optional_link_label  
- faq_optional_link_url

Or you can use title as the question and editor as the answer to keep it simple.

### 7.4 Page level selection

On any page that displays FAQs:

- service_faq_groups or page_faq_groups  
  stores an array of faq_group term ids.

---

## 8. Model B Global options REST endpoint

If you keep global FAQs, announcement bar, trust bar, and service area microline in options, create one custom endpoint.

### 8.1 Namespace

- /wp-json/grander/v1

### 8.2 Endpoints

- GET /options  
- POST /options

### 8.3 Supported option keys

Organize options into named objects:

- announcement_bar  
- trust_bar  
- service_area  
- global_faqs  
- featured_projects_settings  
- social_feed_settings  
- events_settings

### 8.4 Example payload

POST /wp-json/grander/v1/options

{
  "service_area": {
    "enabled": true,
    "text": "Proudly serving the Upstate of South Carolina with custom homes and outdoor living."
  },
  "announcement_bar": {
    "enabled": false,
    "message": "",
    "button_label": "",
    "button_url": ""
  }
}

Your plugin will map these keys to ACF option fields.

---

## 9. Import order of operations

Follow this sequence to avoid broken relationships.

1. Create or confirm core pages  
2. Create service category terms  
3. Create project tag terms  
4. Upload media  
5. Create Projects with taxonomy and ACF meta  
6. Create Testimonials  
7. Create FAQs  
8. Create Events  
9. Update page level ACF fields that reference Projects, FAQs, or Testimonials  
10. Update global options if using the custom options endpoint  
11. Create new blog posts and backfill old ones

---

## 10. Example requests

These are generic examples you can use as a pattern in your script.

### 10.1 Create a service category term

POST /wp-json/wp/v2/service_category

{
  "name": "Custom homes",
  "slug": "custom-homes",
  "parent": 0
}

### 10.2 Upload media

POST /wp-json/wp/v2/media

Headers:
- Content-Disposition: attachment; filename="custom-farmhouse.jpg"
- Content-Type: image/jpeg

Body:
- binary file

Response returns an id you can reference as featured_media or in ACF gallery arrays.

### 10.3 Create a project

POST /wp-json/wp/v2/project

{
  "title": "Custom Farmhouse Charm",
  "status": "publish",
  "excerpt": "A warm modern farmhouse designed for everyday living.",
  "featured_media": 123,
  "service_category": [5],
  "project_tag": [12, 14],
  "acf": {
    "project_location_city": "Fountain Inn",
    "project_location_state": "SC",
    "project_short_summary": "Open concept living, generous kitchen, and a welcoming front porch with timeless board and batten details.",
    "project_has_before_toggle": false,
    "project_gallery": [124, 125, 126]
  }
}

Note  
The exact ACF payload key may differ based on your ACF to REST setup. If you use the common ACF REST integration, the field group will appear under acf.

### 10.4 Create a testimonial

POST /wp-json/wp/v2/testimonial

{
  "title": "Sallie B",
  "status": "publish",
  "acf": {
    "testimonial_quote": "Micah and his team were professional, thoughtful, and delivered a beautiful pool house we are proud of.",
    "testimonial_first_name": "Sallie",
    "testimonial_last_initial": "B"
  }
}

### 10.5 Create an FAQ

POST /wp-json/wp/v2/faq

{
  "title": "What are the main phases of the building process with Grander Construction?",
  "status": "publish",
  "faq_group": [3],
  "acf": {
    "faq_answer": "The five main phases of the building process are listed above. These may vary based on project type, complexity, environmental factors, and product availability."
  }
}

### 10.6 Update a service page with relationships

POST /wp-json/wp/v2/pages/{service_page_id}

{
  "acf": {
    "service_jump_links_enabled": true,
    "service_featured_projects": [201, 202, 203],
    "service_faq_groups": [3, 4]
  }
}

### 10.7 Create a blog post

POST /wp-json/wp/v2/posts

{
  "title": "Designing outdoor spaces that work in every season",
  "status": "draft",
  "excerpt": "A practical guide to covered patios, screened porches, and backyard retreats that feel good year round.",
  "content": "<p>Full post body here...</p>"
}

---

## 11. Data quality rules for clean re runs

To make re imports safe:

- Use slugs as your primary lookup keys  
- If your script finds a matching slug, update rather than create  
- Keep a mapping JSON file of slug to id for:  
  - pages  
  - service categories  
  - projects  
  - FAQs  
  - testimonials

---

## 12. Validation checklist before you run the final import

### 12.1 WordPress

- Application password created  
- Permalinks set  
- Caching plugin disabled or cleared during import

### 12.2 Site plugin

- CPT registration confirmed  
- Taxonomies registration confirmed  
- show_in_rest true for all of the above

### 12.3 ACF

- All target field groups have Show in REST API enabled  
- Field names finalized  
- Options page fields mapped if you use the custom options endpoint

### 12.4 Elementor

- Templates reference ACF fields correctly  
- No hard coded text blocks remain where API content should render

---

## 13. Minimal required scope for the first REST pass

If you want the shortest path to a successful automated population:

1. Projects CPT with REST enabled  
2. Service category taxonomy with REST enabled  
3. Project tag taxonomy with REST enabled  
4. ACF REST enabled for Projects and Services fields  
5. Page level ACF for service pages  
6. Blog posts and media

Then add options endpoints only if needed.

---

## 14. Suggested endpoints summary

Core

- /wp-json/wp/v2/pages  
- /wp-json/wp/v2/posts  
- /wp-json/wp/v2/media  
- /wp-json/wp/v2/project  
- /wp-json/wp/v2/testimonial  
- /wp-json/wp/v2/event  
- /wp-json/wp/v2/faq  
- /wp-json/wp/v2/service_category  
- /wp-json/wp/v2/project_tag  
- /wp-json/wp/v2/faq_group

Optional custom

- /wp-json/grander/v1/options

---

End of document.