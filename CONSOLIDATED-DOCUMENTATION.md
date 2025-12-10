# Grander Construction Website - Consolidated Documentation

**Generated:** 2025-12-10
**Plugin Version:** 1.2.0
**Purpose:** Single reference document combining all essential project documentation

---

## Table of Contents

1. [Project Overview](#1-project-overview)
2. [Architecture Summary](#2-architecture-summary)
3. [Plugin Reference](#3-plugin-reference)
4. [Deployment Checklists](#4-deployment-checklists)
5. [REST API Guide](#5-rest-api-guide)
6. [Template Library Guide](#6-template-library-guide)
7. [Admin UI Reference](#7-admin-ui-reference)
8. [Version History](#8-version-history)
9. [Document Index](#9-document-index)

---

## 1. Project Overview

### What This Project Is

An upgraded Grander Construction website built with WordPress, Elementor Pro, and ACF Pro. The architecture follows an "Elementor-first" approach where:

- **Elementor** owns all markup, layout, and visual design
- **grander-core plugin** provides data models, ACF schemas, and REST API compatibility

### Brand Positioning

**Grandeur by Design. Built with Purpose.**

High-end but approachable, craftsmanship-forward, positioned as the local authority for custom homes and outdoor living in Upstate South Carolina.

### Key Decisions

| Decision | Choice | Rationale |
|----------|--------|-----------|
| Testimonials storage | CPT (not options repeater) | REST seeding, filtering, reuse |
| Team bios | 60-90 word drafts | Claude drafts from magazine |
| Estimate form | Gravity Forms | Shortcode stored in ACF |
| Events module | Built but disabled | Feature flag approach |
| Social feed | Static icons for launch | Embedded feed post-launch |

---

## 2. Architecture Summary

### Responsibility Matrix

| Component | Responsibility |
|-----------|----------------|
| **Elementor** | All markup, layout, visual design, page templates |
| **grander-core CSS** | Brand tokens, shortcode output, behavior states only |
| **grander-core JS** | Enhancement behaviors only (5 functions) |
| **Hello Elementor** | Base theme, CSS reset |

### What the Plugin Does NOT Do

- Hardcode page layouts
- Render complete headers or footers
- Generate complex HTML structures
- Override Elementor templates

### CSS Boundaries (567 lines total)

| Section | Purpose |
|---------|---------|
| CSS Custom Properties | Brand tokens (colors, fonts) |
| Shortcode Output | Zigzag, trust bar, events strip, etc. |
| Behavior States | FAQ accordion, lightbox visibility |
| Mobile Call Icon | Floating phone button |
| Utility Classes | Screen reader, hide/show helpers |

### JS Boundaries (242 lines total)

| Function | Purpose |
|----------|---------|
| `initMobileCallIcon()` | Creates floating phone button |
| `initFAQAccordion()` | Toggle class handlers |
| `initHeaderScroll()` | Scroll state class |
| `initEstimateLightbox()` | Modal open/close |
| `initSmoothScroll()` | Anchor scrolling |

---

## 3. Plugin Reference

### Custom Post Types

| CPT Slug | Label | REST Enabled | Archive |
|----------|-------|--------------|---------|
| `project` | Projects | Yes | Yes |
| `testimonial` | Testimonials | Yes | No |
| `faq` | FAQs | Yes | No |
| `gc_event` | Events | Yes | No |

### Taxonomies

| Taxonomy Slug | Hierarchical | Attached To |
|---------------|--------------|-------------|
| `service_category` | Yes | project, testimonial, faq |
| `project_tag` | No | project |
| `faq_group` | Yes | faq |

### Shortcodes

| Shortcode | Purpose |
|-----------|---------|
| `[grander_zigzag_divider]` | SVG zigzag pattern |
| `[grander_service_area_line]` | Service area microline |
| `[grander_trust_bar]` | Trust items display |
| `[grander_events_strip]` | Upcoming events |
| `[grander_phone_link]` | Clickable phone number |
| `[grander_estimate_form]` | Gravity Forms embed |
| `[grander_estimate_lightbox]` | Modal trigger |

### ACF Field Prefixes

| Prefix | Context |
|--------|---------|
| `gc_project_*` | Project CPT fields |
| `gc_testimonial_*` | Testimonial CPT fields |
| `gc_faq_*` | FAQ CPT fields |
| `gc_home_*` | Home page fields |
| `gc_service_*` | Service page fields |
| `gc_team_*` | Team page fields |
| `gc_hero_*` | Shared hero fields |
| `gc_trust_*` | Trust bar options |
| `gc_announcement_*` | Announcement bar options |

### CSS Class Hooks

| Class | Component |
|-------|-----------|
| `.gc-header-stripe` | Sticky top bar |
| `.gc-header-call` | Call button |
| `.gc-testimonials-v1` | Testimonial slider |
| `.gc-faq-accordion-v1` | FAQ accordion |
| `.gc-trust-bar` | Trust bar |
| `.gc-featured-projects-v1` | Projects grid |
| `.gc-events-strip` | Events display |
| `.gc-estimate-cta-v1` | Estimate CTA |
| `.gc-team-grid-v1` | Team grid |
| `.gc-process-steps-v1` | Process steps |

---

## 4. Deployment Checklists

### After Updating grander-core

1. Update `GRANDER_CORE_VERSION` constant in `grander-core.php`
2. Add entry to `grander-core/CHANGELOG.md`
3. Deploy files to staging/production
4. Clear LiteSpeed Cache: **LiteSpeed Cache > Dashboard > Purge All**
5. Clear Elementor Cache: **Elementor > Tools > Regenerate CSS & Data**
6. Hard refresh browser (Cmd+Shift+R / Ctrl+Shift+R)
7. Test affected pages visually
8. Verify no 404 errors in Network tab

### After Updating Elementor Templates

1. Save template in Elementor editor
2. Click **Update** button
3. Clear Elementor Cache
4. Clear LiteSpeed Cache
5. Hard refresh browser
6. Test at desktop (1920px, 1440px, 1024px)
7. Test at tablet (768px)
8. Test at mobile (375px)
9. Verify fonts use Global Typography

### Cache Clearing Order

**Always clear in this order:**
1. LiteSpeed Cache (server-side)
2. Elementor Cache (template CSS)
3. Browser Cache (client-side)

### Immediately After Any Deployment

1. Verify site loads without 500 errors
2. Check home page renders
3. Check header sticky behavior
4. Check footer displays
5. Test mobile floating call icon
6. Test "Request an Estimate" lightbox
7. Check Network tab for 404s
8. Clear LiteSpeed if anything looks wrong
9. Test at least one service page
10. Test Contact page FAQ accordion

### Monthly Maintenance

1. Visual review of grander-core.css for layout properties
2. Search for Grander code outside plugin
3. Review Elementor templates for hardcoded typography
4. Verify backup copies exist
5. Check for WordPress/Elementor/ACF updates
6. Test forms
7. Review Search Console for issues

---

## 5. REST API Guide

### Standard Endpoints

| Endpoint | Method | Purpose |
|----------|--------|---------|
| `/wp-json/wp/v2/project` | GET/POST | Projects |
| `/wp-json/wp/v2/testimonial` | GET/POST | Testimonials |
| `/wp-json/wp/v2/faq` | GET/POST | FAQs |
| `/wp-json/wp/v2/gc_event` | GET/POST | Events |
| `/wp-json/wp/v2/service_category` | GET/POST | Categories |
| `/wp-json/wp/v2/faq_group` | GET/POST | FAQ groups |

### Custom Endpoint

| Endpoint | Method | Purpose |
|----------|--------|---------|
| `/wp-json/grander/v1/options` | GET | Read all global options |
| `/wp-json/grander/v1/options` | POST | Update global options |

### Import Order

1. Taxonomies (service_category, faq_group, project_tag)
2. Media uploads
3. Projects (references categories, media)
4. Testimonials
5. FAQs (references faq_group)
6. Page ACF fields
7. Global options
8. Blog posts

### Authentication

Use WordPress Application Passwords with Basic Auth:

```bash
# Create Base64 credentials
echo -n "username:application_password" | base64

# Use in requests
curl -X POST "https://site.com/wp-json/wp/v2/project" \
  -H "Authorization: Basic YOUR_BASE64" \
  -H "Content-Type: application/json" \
  -d '{"title": "Project Name", ...}'
```

### Example: Create Project

```bash
curl -X POST "https://staging.granderconstruction.com/wp-json/wp/v2/project" \
  -H "Authorization: Basic YOUR_BASE64" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Custom farmhouse charm",
    "slug": "custom-farmhouse-charm",
    "status": "publish",
    "service_category": [5],
    "acf": {
      "gc_project_location_city": "Fountain Inn",
      "gc_project_location_state": "SC",
      "gc_project_short_summary": "Open concept custom farmhouse...",
      "gc_project_featured_on_home": true
    }
  }'
```

### Example: Update Global Options

```bash
curl -X POST "https://staging.granderconstruction.com/wp-json/grander/v1/options" \
  -H "Authorization: Basic YOUR_BASE64" \
  -H "Content-Type: application/json" \
  -d '{
    "gc_announcement_enabled": false,
    "gc_service_area_enabled": true,
    "gc_service_area_text": "Proudly serving the Upstate...",
    "gc_phone_number": "(864) 555-1234"
  }'
```

---

## 6. Template Library Guide

### Naming Convention

All ACF-integrated template sections use:
- **Template name:** `ACF integrated [block type] [version]`
- **CSS class:** `.gc-[module-name]-v[number]`

### Template Blocks

| Block Name | Used On | ACF Source |
|------------|---------|------------|
| ACF integrated testimonial slider 1 | Home, Team, Services | testimonial CPT |
| ACF integrated FAQ accordion 1 | Process, Services, Contact | faq CPT + faq_group |
| ACF integrated trust bar 1 | Home, Services, Contact | gc_trust_items |
| ACF integrated featured projects 1 | Home, Services | gc_featured_projects |
| ACF integrated events strip 1 | Home, Contact | gc_events repeater |
| ACF integrated portfolio block 1 | Services | gc_service_portfolio_sections |
| ACF integrated estimate CTA block 1 | Services, Process | gc_service_mid_cta |
| ACF integrated team grid 1 | Team | gc_team_members |
| ACF integrated process steps 1 | Process | gc_process_steps |

### Building a Template Section

1. Create new Elementor section
2. Add wrapper container with class hook (e.g., `.gc-testimonials-v1`)
3. Use ACF Dynamic Tags for content binding
4. Set responsive breakpoints
5. Save as template
6. Apply to pages via Template Kit or manual placement

---

## 7. Admin UI Reference

### Target Screen

Admin CSS/JS only loads on: `toplevel_page_grander-settings`

### Design Tokens

```css
--gc-admin-gold: #B08D66;
--gc-admin-gold-light: #D4BC9A;
--gc-admin-brown: #4C2A19;
--gc-admin-brown-light: #5C4A3D;
```

### Components

- **Page Header:** Custom H1 with gold accent bar
- **Module Navigation:** 5 quick-nav buttons with icons
- **Card Styling:** ACF postboxes with shadows
- **Tab Styling:** Enhanced tab navigation
- **Form Inputs:** Brand-focused focus states
- **Toggle Switches:** Gold accent on active
- **Submit Button:** Brown background, gold hover

### Keyboard Navigation

- **Tab:** Move between buttons
- **Enter/Space:** Activate button
- **Arrow keys:** Move focus between buttons

### Dark Theme Support

Automatically adapts for WordPress admin color schemes:
modern, midnight, coffee, ectoplasm, ocean, sunrise

---

## 8. Version History

### v1.2.0 (2025-12-10)

**Added:**
- Admin UI enhancement for ACF Settings pages
- Custom page header and module navigation
- Dark admin theme support
- Deployment checklists document
- Additional .gitignore rules

**Changed:**
- Admin assets scoped to settings pages only

### v1.1.0 (2025-12-10)

**Changed:**
- CSS reduced from 7,638 lines (165KB) to 567 lines (13.5KB) - 92% reduction
- JS reduced from 1,220 lines to 242 lines - 80% reduction
- Removed all page layout CSS
- Removed all DOM-manipulating JavaScript

**Fixed:**
- Visual mismatch caused by plugin CSS overriding Elementor
- LiteSpeed cache serving stale combined CSS/JS

### v1.0.0 (2025-11)

**Added:**
- Initial plugin release
- Custom Post Types: project, testimonial, faq, gc_event
- Taxonomies: service_category, project_tag, faq_group
- ACF field groups for all page types and CPTs
- Shortcodes: zigzag, service_area, trust_bar, events_strip, phone_link, estimate_form
- REST API endpoints
- Custom endpoint: /wp-json/grander/v1/options

---

## 9. Document Index

### Primary Documents (in this repo)

| File | Purpose |
|------|---------|
| `CLAUDE.md` | Master site plan and architecture spec |
| `grander-core/README.md` | Plugin installation and usage |
| `grander-core/CHANGELOG.md` | Version history |
| `grander-core/TEMPLATE-LIBRARY-GUIDE.md` | Elementor template build guide |
| `grander-core/REST-SEEDING-GUIDE.md` | REST API import documentation |
| `DEPLOYMENT-CHECKLISTS.md` | Cache clearing and deployment procedures |

### Session Reports

| File | Contents |
|------|----------|
| `IMPLEMENTATION-REPORT-2025-12-10.md` | Admin UI and audit summary |
| `TECHNICAL-AUDIT-REPORT-2025-12-10.md` | Architecture verification |
| `STAGING-CLEANUP-REPORT-2025-12-10.md` | File cleanup details |
| `VISUAL-ALIGNMENT-REPORT-2025-12-10.md` | CSS/JS reduction details |

### Template Build Specs

Located in `grander-core/templates/`:

- `HEADER-FOOTER-BUILD-SPEC.md`
- `HOME-PAGE-BUILD-SPEC.md`
- `SERVICE-TEMPLATE-BUILD-SPEC.md`
- `ABOUT-PAGE-BUILD-SPEC.md`
- `TEAM-PAGE-BUILD-SPEC.md`
- `GALLERY-PAGE-BUILD-SPEC.md`
- `CONTACT-PAGE-BUILD-SPEC.md`
- `ESTIMATE-PAGE-BUILD-SPEC.md`
- `BLOG-BUILD-SPEC.md`
- `404-PAGE-BUILD-SPEC.md`

---

## Quick Reference Card

### Cache Clear Commands

```
LiteSpeed: LiteSpeed Cache > Dashboard > Purge All
Elementor: Elementor > Tools > Regenerate CSS & Data
Browser: Cmd+Shift+R (Mac) / Ctrl+Shift+R (Windows)
```

### Plugin Version Check

```php
// In grander-core.php header
* Version: 1.2.0

// As constant
define( 'GRANDER_CORE_VERSION', '1.2.0' );
```

### REST API Base

```
https://staging.granderconstruction.com/wp-json/
```

### Grander Settings Page

```
WordPress Admin > Grander Settings (left sidebar)
Hook: toplevel_page_grander-settings
```

---

*Generated by Claude Code*
*Reference: CLAUDE.md, grander-core plugin v1.2.0*
