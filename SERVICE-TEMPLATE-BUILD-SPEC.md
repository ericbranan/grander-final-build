# Service Page Template - Complete Build Specification

**Template Type:** Reusable Elementor Template (applied to 4 service pages)
**Template Name:** Service Page Template
**ACF Field Group:** `gc_service_fields`
**Last Updated:** 2025-12-08

---

## Template Overview

A single reusable template that powers all four service pages:
- Custom Homes (`/custom-homes/`)
- Outdoor Spaces (`/outdoor-spaces/`)
- Pool Houses, Garages, and ADUs (`/pool-houses-garages-adus/`)
- Sunrooms and Additions (`/sunrooms-additions/`)

Each page uses the same template structure but displays unique content via ACF fields and taxonomy filtering.

---

## Section 1: Hero

### Container Structure
```
Section: gc-hero gc-hero--service (min-height: 60vh)
├── Background Image (ACF: gc_hero_background_image - from Page Hero fields)
├── Overlay (rgba(26, 26, 26, 0.45))
└── Container (max-width: 1200px, centered)
    └── Inner Container: gc-hero__content
        ├── Heading Widget (H1): gc-hero__headline
        │   └── ACF: gc_hero_headline
        └── Text Widget: gc-hero__subline
            └── ACF: gc_hero_subline
```

### ACF Bindings (from Page Hero field group)
| Element | ACF Field | Type |
|---------|-----------|------|
| H1 | `gc_hero_headline` | text |
| Subline | `gc_hero_subline` | textarea |
| Background | `gc_hero_background_image` | image |
| Nav variant | `gc_hero_nav_variant` | select (light/dark) |

### Responsive Rules
| Breakpoint | H1 Size | Subline Size | Min Height |
|------------|---------|--------------|------------|
| Desktop | 56px | 20px | 60vh |
| Tablet ≤1024px | 42px | 18px | 50vh |
| Mobile ≤767px | 32px | 16px | 45vh |

---

## Section 2: Jump Links Navigation

### Container Structure
```
Section: gc-service-jumplinks (background: white, sticky on scroll)
└── Container (max-width: 1200px, centered)
    └── Nav: gc-service-jumplinks__nav
        ├── Link: #overview → "Overview"
        ├── Link: #portfolio → "Our work"
        ├── Link: #faq → "FAQ"
        └── Link: #estimate → "Get started"
```

### ACF Binding
| Element | ACF Field | Purpose |
|---------|-----------|---------|
| Visibility | `gc_service_jump_links_enabled` | true_false toggle |

### Behavior
- Sticky position below header on scroll
- Smooth scroll to anchor sections
- Active state highlighting as user scrolls
- Hide on mobile (convert to hamburger dropdown or remove)

### CSS Classes
- `.gc-service-jumplinks` - Section wrapper
- `.gc-service-jumplinks--sticky` - Applied when sticky
- `.gc-service-jumplinks__nav` - Navigation container
- `.gc-service-jumplinks__link` - Individual link
- `.gc-service-jumplinks__link--active` - Active state

---

## Section 3: Service Overview

### Container Structure
```
Section#overview: gc-service-overview (background: warm-white, padding: 96px/24px)
└── Container (max-width: 900px, centered)
    └── Inner: gc-service-overview__inner
        ├── Heading Widget (H2): gc-service-overview__headline
        │   "About [service name]" or custom
        └── Text Widget (WYSIWYG): gc-service-overview__content
            └── ACF: gc_service_overview
```

### ACF Bindings
| Element | ACF Field | Type | Notes |
|---------|-----------|------|-------|
| Body | `gc_service_overview` | wysiwyg | 150-180 words |

### Final Copy Structure
Each service page will have unique copy. The WYSIWYG allows:
- Multiple paragraphs
- Bold emphasis on key phrases
- Bullet lists if needed

### Responsive Rules
- Desktop: Body 18px, max-width 900px
- Tablet: Body 17px
- Mobile: Body 16px, padding 64px 16px

---

## Section 4: Featured Projects Row

### Container Structure
```
Section: gc-service-featured (background: light, padding: 96px/24px)
└── Container (max-width: 1200px, centered)
    ├── Header Row: gc-service-featured__header
    │   ├── Heading Widget (H2): "Featured projects"
    │   └── Link Widget: "View all projects →" → /gallery/
    └── Projects Grid: gc-service-featured__grid (3 columns)
        └── Loop (ACF Relationship: gc_service_featured_projects OR fallback to global)
            └── Template: gc-project-card
                ├── Image: gc-project-card__image (featured_image)
                ├── Title: gc-project-card__title (post_title)
                ├── Location: gc-project-card__location (gc_project_location_city, gc_project_location_state)
                └── Link: View project → single project page
```

### ACF Bindings
| Element | ACF Field | Type | Fallback |
|---------|-----------|------|----------|
| Projects | `gc_service_featured_projects` | relationship | `gc_featured_projects` (global) |

### Project Card Fields (from Project CPT)
- `featured_image` - Thumbnail
- `post_title` - Project name
- `gc_project_location_city` - City
- `gc_project_location_state` - State abbreviation
- `gc_project_short_summary` - Brief description

### Responsive Rules
| Breakpoint | Columns | Gap |
|------------|---------|-----|
| Desktop | 3 | 32px |
| Tablet ≤1024px | 2 | 24px |
| Mobile ≤767px | 1 | 24px |

---

## Section 5: Portfolio Section (Project Showcase)

### Container Structure
```
Section#portfolio: gc-service-portfolio (background: warm-white, padding: 96px/24px)
└── Container (max-width: 1200px, centered)
    ├── Heading Widget (H2): gc-service-portfolio__headline
    │   "Our [service] projects" or "Project portfolio"
    └── Portfolio Loop: gc-service-portfolio__list
        └── Repeater (ACF: gc_service_portfolio_sections)
            └── Template: gc-portfolio-section
                ├── Header: gc-portfolio-section__header
                │   ├── Title (H3): gc-portfolio-section__title
                │   │   └── Subfield: title
                │   └── Location: gc-portfolio-section__location
                │       └── Subfield: location
                ├── Summary: gc-portfolio-section__summary
                │   └── Subfield: summary
                ├── Design Image (conditional): gc-portfolio-section__design
                │   └── Subfield: design_image (if has_design_image = true)
                └── Gallery: gc-portfolio-section__gallery
                    └── Subfield: gallery (ACF gallery field)
```

### ACF Repeater: gc_service_portfolio_sections

| Subfield | Type | Required | Notes |
|----------|------|----------|-------|
| `title` | text | yes | Project name |
| `location` | text | no | City, SC format |
| `summary` | textarea | yes | 2-3 sentences |
| `has_design_image` | true_false | no | Toggle for design/before image |
| `design_image` | image | conditional | Shows if toggle is true |
| `gallery` | gallery | yes | Project photos |

### Gallery Layout Options
- Masonry grid (3-4 columns)
- Lightbox on click
- Lazy loading for performance

### Responsive Rules
- Desktop: 4-column gallery grid
- Tablet: 3-column gallery grid
- Mobile: 2-column gallery grid

---

## Section 6: Mid-Page CTA

### Container Structure
```
Section#estimate: gc-service-cta (background: gold, padding: 96px/24px)
└── Container (max-width: 800px, centered, text-align: center)
    ├── Heading Widget (H2): gc-service-cta__headline
    │   └── ACF: gc_service_mid_cta_headline
    ├── Text Widget: gc-service-cta__body
    │   └── ACF: gc_service_mid_cta_body
    └── Button Widget: gc-service-cta__button
        └── Label: ACF gc_service_estimate_cta_label
        └── Class: gc-btn gc-btn--dark gc-estimate-trigger
        └── data-gc-estimate-trigger attribute
```

### ACF Bindings
| Element | ACF Field | Default |
|---------|-----------|---------|
| Headline | `gc_service_mid_cta_headline` | "Ready to start your project?" |
| Body | `gc_service_mid_cta_body` | (service-specific) |
| Button | `gc_service_estimate_cta_label` | "Request an estimate" |

### Button Behavior
- Triggers global estimate lightbox
- Uses `gc-estimate-trigger` class
- Dark button variant on gold background

### Responsive Rules
- Desktop: H2 42px, body 18px
- Mobile: H2 28px, body 16px

---

## Section 7: FAQ Section

### Container Structure
```
Section#faq: gc-service-faq (background: light, padding: 96px/24px)
└── Container (max-width: 900px, centered)
    ├── Heading Widget (H2): gc-service-faq__headline
    │   "Frequently asked questions"
    └── FAQ Accordion: gc-faq-accordion-v1
        └── Loop (FAQ from global options filtered by gc_service_faq_groups)
            └── Template: gc-faq-item
                ├── Question (button): gc-faq-question
                │   └── Subfield: question
                └── Answer (panel): gc-faq-answer
                    └── Subfield: answer
```

### ACF Binding
| Element | ACF Field | Type | Notes |
|---------|-----------|------|-------|
| FAQ Filter | `gc_service_faq_groups` | select (multiple) | Filters FAQs by context |

### FAQ Context Values
- `services-general` - General service questions
- `custom-homes` - Custom homes specific
- `outdoor-spaces` - Outdoor spaces specific
- `pool-houses-garages-adus` - Pool houses/garages/ADUs specific
- `sunrooms-additions` - Sunrooms and additions specific

### Responsive Rules
- Max-width 900px for readability
- Mobile: Full-width accordion

---

## Section 8: Final CTA (Optional)

### Container Structure
```
Section: gc-service-final-cta (background: deep-brown, padding: 64px/24px)
└── Container (max-width: 1000px, centered)
    └── Flex Row: gc-service-final-cta__inner
        ├── Content: gc-service-final-cta__content
        │   ├── Heading (H3): "Let us bring your vision to life"
        │   └── Text: Brief service area mention
        └── Button: gc-btn gc-btn--primary gc-estimate-trigger
            "Start your project"
```

This section is optional and can be omitted if the mid-page CTA is sufficient.

---

## CSS Classes Summary

### Hero
- `.gc-hero--service` - Service page hero variant

### Jump Links
- `.gc-service-jumplinks` - Jump links section
- `.gc-service-jumplinks--sticky` - Sticky state
- `.gc-service-jumplinks__nav` - Nav container
- `.gc-service-jumplinks__link` - Individual link
- `.gc-service-jumplinks__link--active` - Active link

### Overview
- `.gc-service-overview` - Overview section
- `.gc-service-overview__inner` - Content wrapper
- `.gc-service-overview__content` - WYSIWYG content

### Featured Projects
- `.gc-service-featured` - Featured projects section
- `.gc-service-featured__header` - Header with title and link
- `.gc-service-featured__grid` - Projects grid
- `.gc-project-card` - Individual project card

### Portfolio
- `.gc-service-portfolio` - Portfolio section
- `.gc-portfolio-section` - Individual project showcase
- `.gc-portfolio-section__header` - Project header
- `.gc-portfolio-section__gallery` - Gallery grid
- `.gc-portfolio-section__design` - Design/before image

### CTA
- `.gc-service-cta` - Mid-page CTA (gold background)
- `.gc-service-final-cta` - Final CTA (brown background)

### FAQ
- `.gc-service-faq` - FAQ section
- `.gc-faq-accordion-v1` - Accordion wrapper
- `.gc-faq-item` - Individual FAQ item

---

## JavaScript Requirements

### Jump Links Behavior
```javascript
// Sticky jump links on scroll
// Active state tracking
// Smooth scroll to anchors
```

### Gallery Lightbox
```javascript
// Lightbox for portfolio gallery images
// Keyboard navigation (arrow keys, ESC)
// Touch swipe on mobile
```

These are handled by existing `grander-core.js` functions plus Elementor's native lightbox.

---

## ACF Field Group: gc_service_fields

The existing field group in `class-grander-acf.php` already includes all required fields. No updates needed.

Fields included:
- `gc_service_overview` (wysiwyg)
- `gc_service_jump_links_enabled` (true_false)
- `gc_service_featured_projects` (relationship)
- `gc_service_portfolio_sections` (repeater)
- `gc_service_mid_cta_headline` (text)
- `gc_service_mid_cta_body` (textarea)
- `gc_service_estimate_cta_label` (text)
- `gc_service_faq_groups` (select, multiple)

---

## Elementor Template Settings

### Save As
- **Template Name:** Service Page Template
- **Template Type:** Single Page
- **Display Conditions:** Page slugs: custom-homes, outdoor-spaces, pool-houses-garages-adus, sunrooms-additions

### Global Widget Usage
Consider saving these as Global Widgets for reuse:
- FAQ Accordion block
- Mid-page CTA block
- Project card layout

---

## Self-Check Verification

- [ ] All 7 sections documented with container hierarchy
- [ ] All ACF bindings specified with field names
- [ ] Responsive rules defined for all breakpoints
- [ ] CSS class hooks documented
- [ ] Jump links behavior specified
- [ ] FAQ filtering by context documented
- [ ] CTA button wired to estimate lightbox
- [ ] No placeholder content in template spec
