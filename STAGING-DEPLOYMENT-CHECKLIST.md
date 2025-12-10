# Grander Core - Staging Deployment Checklist

**Version:** 1.0.0
**Generated:** 2025-12-08
**Purpose:** Complete checklist for deploying Grander Core plugin to staging and syncing all content

---

## Pre-Deployment Verification

### Plugin Files Present
- [x] `grander-core.php` (main plugin file, v1.0.0)
- [x] `includes/class-grander-cpt.php` (CPT registration)
- [x] `includes/class-grander-acf.php` (ACF field groups)
- [x] `includes/class-grander-assets.php` (CSS/JS enqueue)
- [x] `includes/class-grander-shortcodes.php` (shortcodes)
- [x] `includes/class-grander-rest-options.php` (REST API)
- [x] `assets/css/grander-core.css` (7600+ lines)
- [x] `assets/js/grander-core.js` (1220 lines)
- [x] `assets/svg/footer-zigzag-divider.svg`

### Template Build Specs Present
- [x] HEADER-FOOTER-BUILD-SPEC.md
- [x] GLOBAL-TEMPLATES-BUILD-SPEC.md
- [x] HOME-PAGE-BUILD-SPEC.md
- [x] ABOUT-PAGE-BUILD-SPEC.md
- [x] BUILD-PROCESS-PAGE-BUILD-SPEC.md
- [x] SERVICE-TEMPLATE-BUILD-SPEC.md
- [x] SERVICE-PAGES-CONTENT-SPEC.md
- [x] TEAM-PAGE-BUILD-SPEC.md
- [x] GALLERY-PAGE-BUILD-SPEC.md
- [x] BLOG-BUILD-SPEC.md
- [x] CONTACT-PAGE-BUILD-SPEC.md
- [x] ESTIMATE-PAGE-BUILD-SPEC.md
- [x] FORMS-LIGHTBOX-BUILD-SPEC.md

---

## Phase 1: Plugin Installation

### Step 1.1: Upload Plugin
1. ZIP the entire `grander-core` folder
2. Go to **wp-admin → Plugins → Add New → Upload Plugin**
3. Upload and activate `grander-core.zip`
4. **OR** FTP upload to `/wp-content/plugins/grander-core/`

### Step 1.2: Verify Plugin Activation
After activation, confirm these admin menu items appear:
- [ ] **Grander Settings** (ACF options page at position 3)
- [ ] **Projects** (dashicons-building at position 5)
- [ ] **Testimonials** (dashicons-format-quote at position 6)
- [ ] **FAQs** (dashicons-editor-help at position 7)
- [ ] **Events** (dashicons-calendar-alt at position 8)

### Step 1.3: Flush Permalinks
1. Go to **Settings → Permalinks**
2. Click **Save Changes** (no changes needed, just save)
3. This registers the CPT rewrite rules

---

## Phase 2: ACF Field Group Sync

### Registered Field Groups (Programmatic)
The plugin registers these field groups via PHP code in `class-grander-acf.php`:

| Field Group | Key | Location |
|-------------|-----|----------|
| Global Site Settings | `group_gc_global_options` | Options page |
| Page Hero Fields | `group_gc_page_hero` | All pages |
| Home Page Fields | `group_gc_home` | Home page |
| About Page Fields | `group_gc_about` | About page |
| Build Process Fields | `group_gc_process` | Build Process page |
| Performance Building Fields | `group_gc_performance` | Performance page |
| Services Landing Fields | `group_gc_services_landing` | Services page |
| Service Page Fields | `group_gc_service` | Service pages |
| Team Page Fields | `group_gc_team` | Team page |
| Gallery Page Fields | `group_gc_gallery` | Gallery page |
| Blog Settings Fields | `group_gc_blog` | Blog page |
| Contact Page Fields | `group_gc_contact` | Contact page |
| Estimate Page Fields | `group_gc_estimate` | Estimate page |
| Project CPT Fields | `group_gc_project` | Project CPT |
| FAQ CPT Fields | `group_gc_faq` | FAQ CPT |
| Testimonial CPT Fields | `group_gc_testimonial` | Testimonial CPT |
| Event CPT Fields | `group_gc_event` | Event CPT |

### Verification Steps
1. Go to **Custom Fields** in admin
2. Confirm all 17 field groups are listed
3. If any are missing, check that ACF Pro is active

### No JSON Sync Required
Field groups are registered via PHP, not JSON files. They load automatically when ACF Pro is active.

---

## Phase 3: CPT and Taxonomy Verification

### Custom Post Types
| CPT | Slug | REST Endpoint | Archive |
|-----|------|---------------|---------|
| Projects | `project` | `/wp-json/wp/v2/project` | Yes |
| Testimonials | `testimonial` | `/wp-json/wp/v2/testimonial` | No |
| FAQs | `faq` | `/wp-json/wp/v2/faq` | No |
| Events | `gc_event` | `/wp-json/wp/v2/gc_event` | No |

### Taxonomies
| Taxonomy | Slug | REST Endpoint | Attached To |
|----------|------|---------------|-------------|
| Service Categories | `service_category` | `/wp-json/wp/v2/service_category` | project, testimonial, faq |
| Project Tags | `project_tag` | `/wp-json/wp/v2/project_tag` | project |
| FAQ Groups | `faq_group` | `/wp-json/wp/v2/faq_group` | faq |

### Verification
1. Visit `/wp-json/wp/v2/` and confirm endpoints exist
2. Check admin menus for CPT management screens

---

## Phase 4: Asset Verification

### CSS File
- **Path:** `/wp-content/plugins/grander-core/assets/css/grander-core.css`
- **Handle:** `grander-core`
- **Loaded on:** All frontend pages

### JS File
- **Path:** `/wp-content/plugins/grander-core/assets/js/grander-core.js`
- **Handle:** `grander-core`
- **Loaded on:** All frontend pages (in footer)

### Verification
1. View page source on frontend
2. Search for `grander-core.css` in `<head>`
3. Search for `grander-core.js` before `</body>`

---

## Phase 5: Elementor Template Setup

### Required Templates (Build in Elementor)
These templates need to be created in **Elementor → Templates → Theme Builder**:

#### Header Template
- **Name:** GC Header Main
- **Type:** Header
- **Condition:** Entire Site
- **Build Spec:** `templates/HEADER-FOOTER-BUILD-SPEC.md`

#### Footer Template
- **Name:** GC Footer Main
- **Type:** Footer
- **Condition:** Entire Site
- **Build Spec:** `templates/HEADER-FOOTER-BUILD-SPEC.md`

### Global Section Templates (Saved Templates)
Create these as **Section** templates in Elementor Template Library:

| Template Name | Class Hook | Build Spec |
|---------------|------------|------------|
| GC Testimonials Slider v1 | `.gc-testimonials-v1` | GLOBAL-TEMPLATES-BUILD-SPEC.md |
| GC FAQ Accordion v1 | `.gc-faq-accordion-v1` | GLOBAL-TEMPLATES-BUILD-SPEC.md |
| GC Trust Bar v1 | `.gc-trust-bar-v1` | GLOBAL-TEMPLATES-BUILD-SPEC.md |
| GC Featured Projects v1 | `.gc-featured-projects-v1` | GLOBAL-TEMPLATES-BUILD-SPEC.md |
| GC Events Strip v1 | `.gc-events-strip-v1` | GLOBAL-TEMPLATES-BUILD-SPEC.md |
| GC Estimate Lightbox | `.gc-estimate-lightbox` | FORMS-LIGHTBOX-BUILD-SPEC.md |

---

## Phase 6: Page Content Replacement

### Page Mapping
For each page, follow the corresponding build spec to replace content:

| Page | Page ID | Template/Build Spec | ACF Field Group |
|------|---------|---------------------|-----------------|
| Home | (lookup) | HOME-PAGE-BUILD-SPEC.md | gc_home |
| About Our Company | (lookup) | ABOUT-PAGE-BUILD-SPEC.md | gc_about |
| Build Process | (lookup) | BUILD-PROCESS-PAGE-BUILD-SPEC.md | gc_process |
| Performance Building | (lookup) | (section in About spec) | gc_performance |
| Services | (lookup) | SERVICE-TEMPLATE-BUILD-SPEC.md | gc_services_landing |
| Custom Homes | (lookup) | SERVICE-PAGES-CONTENT-SPEC.md | gc_service |
| Outdoor Spaces | (lookup) | SERVICE-PAGES-CONTENT-SPEC.md | gc_service |
| Pool Houses, Garages, ADUs | (lookup) | SERVICE-PAGES-CONTENT-SPEC.md | gc_service |
| Sunrooms and Additions | (lookup) | SERVICE-PAGES-CONTENT-SPEC.md | gc_service |
| Our Team | (lookup) | TEAM-PAGE-BUILD-SPEC.md | gc_team |
| Gallery | (lookup) | GALLERY-PAGE-BUILD-SPEC.md | gc_gallery |
| The Blueprint (Blog) | (lookup) | BLOG-BUILD-SPEC.md | gc_blog |
| Contact | (lookup) | CONTACT-PAGE-BUILD-SPEC.md | gc_contact |
| Request an Estimate | (lookup) | ESTIMATE-PAGE-BUILD-SPEC.md | gc_estimate |

### Per-Page Steps

For each page:

1. **Open page in Elementor**
2. **Reference the build spec** for section structure
3. **Replace static content with ACF Dynamic Tags:**
   - Use **ACF Field** dynamic tag for text fields
   - Use **ACF Image** dynamic tag for image fields
   - Use **ACF Repeater** for repeater content
4. **Add class hooks** to each section (e.g., `gc-hero`, `gc-services-grid`)
5. **Save and verify** on frontend

### Dynamic Tag Bindings

| Content Type | Elementor Widget | Dynamic Tag |
|--------------|------------------|-------------|
| Headline text | Heading | ACF Field → gc_hero_headline |
| Body text | Text Editor | ACF Field → gc_[page]_[field] |
| Background image | Section | ACF Image → gc_hero_background |
| Button URL | Button | ACF URL → gc_[field]_url |
| Repeater items | Loop Grid | ACF Repeater → gc_[repeater] |

---

## Phase 7: Global Options Population

### Go to Grander Settings in Admin

#### Announcement Bar Tab
- [ ] `gc_announcement_enabled` - Set to false initially
- [ ] `gc_announcement_message` - Leave empty
- [ ] `gc_announcement_style` - Default: info

#### Header Tab
- [ ] `gc_phone_number` - Enter Grander phone number
- [ ] `gc_header_estimate_label` - "Request an estimate"
- [ ] `gc_header_estimate_mode` - "lightbox"

#### Footer Tab
- [ ] `gc_footer_logo_white` - Upload white logo
- [ ] `gc_footer_hba_logo` - Upload HBA logo
- [ ] `gc_footer_hba_url` - Enter HBA URL
- [ ] `gc_footer_bbb_logo` - Upload BBB logo
- [ ] `gc_footer_bbb_url` - Enter BBB URL

#### Social Tab
- [ ] `gc_social_instagram_url` - Enter Instagram URL
- [ ] `gc_social_facebook_url` - Enter Facebook URL

#### Trust Bar Tab
- [ ] `gc_trust_items` - Add trust logos (max 5)

#### Service Area Tab
- [ ] `gc_service_area_enabled` - Set to true
- [ ] `gc_service_area_text` - "Proudly serving the Upstate..."

---

## Phase 8: Taxonomy Term Creation

### Service Categories
Create these terms under **Projects → Service Categories**:

| Term Name | Slug |
|-----------|------|
| Custom Homes | `custom-homes` |
| Outdoor Spaces | `outdoor-spaces` |
| Pool Houses, Garages, ADUs | `pool-houses-garages-adus` |
| Sunrooms and Additions | `sunrooms-additions` |

### FAQ Groups
Create these terms under **FAQs → FAQ Groups**:

| Term Name | Slug |
|-----------|------|
| Build Process | `build-process` |
| Services General | `services-general` |
| Custom Homes | `custom-homes` |
| Outdoor Spaces | `outdoor-spaces` |
| Pool Houses, Garages, ADUs | `pool-houses-garages-adus` |
| Sunrooms and Additions | `sunrooms-additions` |
| Contact | `contact` |
| Estimate | `estimate` |

---

## Phase 9: Content Seeding

### Projects
Use REST API or manual entry to create projects per CLAUDE.md seed list.

### Testimonials
Create testimonials from magazine content per CLAUDE.md seed list.

### FAQs
Create FAQs from Contact page content per CLAUDE.md seed list.

---

## Phase 10: Final Verification

### Frontend Checks
- [ ] Home page renders with ACF content
- [ ] Header sticky behavior works
- [ ] Footer displays correctly
- [ ] Mobile floating call icon appears
- [ ] FAQ accordions expand/collapse
- [ ] Gallery filter works
- [ ] Estimate lightbox opens
- [ ] All pages load without errors

### Admin Checks
- [ ] All CPTs accessible
- [ ] All ACF fields editable
- [ ] Global options save correctly
- [ ] REST API endpoints respond

### Console/Log Checks
- [ ] No PHP errors in debug.log
- [ ] No JS console errors
- [ ] CSS loads without 404

---

## Troubleshooting

### ACF Fields Not Showing
1. Ensure ACF Pro is installed and active
2. Check field group location rules
3. Clear any object cache

### CPTs Not Appearing
1. Flush permalinks
2. Check for plugin conflicts
3. Verify plugin is active

### Styles Not Loading
1. Check browser cache
2. Verify file permissions
3. Check enqueue hooks in class-grander-assets.php

### REST API 404
1. Flush permalinks
2. Check show_in_rest is true
3. Verify permalink structure isn't Plain

---

## Quick Reference: Class Hooks

| Component | Class Hook |
|-----------|------------|
| Header stripe | `.gc-header-stripe` |
| Nav overlay (light) | `.gc-nav-overlay--light` |
| Nav overlay (dark) | `.gc-nav-overlay--dark` |
| Hero section | `.gc-hero` |
| Testimonials | `.gc-testimonials-v1` |
| FAQ accordion | `.gc-faq-accordion-v1` |
| Trust bar | `.gc-trust-bar` |
| Service cards | `.gc-service-cards-v1` |
| Featured projects | `.gc-featured-projects-v1` |
| Events strip | `.gc-events-strip-v1` |
| Portfolio block | `.gc-portfolio-block-v1` |
| Team grid | `.gc-team-grid` |
| Gallery filter | `.gc-filter-btn` |
| Project card | `.gc-project-card` |
| Estimate lightbox | `.gc-estimate-lightbox` |
| Float call icon | `.gc-float-call` |
| Mobile menu | `.gc-mobile-menu-panel` |

---

End of checklist.
