# Grander Construction Elementor Site Kit

Version: 1.0.0
Last Updated: 2025-12-15

## Overview

This site kit contains everything needed to build and deploy the Grander Construction website in WordPress with Elementor Pro. It includes:

- **Design tokens** defining colors, typography, spacing, and breakpoints
- **Global CSS** with all utility classes and component styles
- **Elementor global settings** for colors, fonts, and button presets
- **Template specifications** for header, footer, lightbox, blog, search, and 404
- **Page specifications** for all 13 site pages with container trees, widgets, and copy
- **WordPress configuration** checklist for comments, permalinks, and schema
- **Visual QA checklist** for systematic testing across breakpoints

## How to Use This Site Kit

### Step 1: WordPress Setup

Before importing any Elementor templates, complete these WordPress configurations:

1. Install and activate required plugins:
   - Elementor Pro (required)
   - Advanced Custom Fields Pro (required)
   - Gravity Forms (for estimate forms)
   - Grander Core plugin (registers CPTs, ACF fields, shortcodes)

2. Configure WordPress settings per `wordpress/config-checklist.md`:
   - Set permalinks to Post name
   - Configure comments moderation settings
   - Create required pages with correct slugs

3. Import ACF field groups from the Grander Core plugin

### Step 2: Apply Global Styles

1. Open `theme/tokens.json` and reference all design tokens
2. In Elementor > Site Settings > Global Colors, add colors from `elementor/globals.md`
3. In Elementor > Site Settings > Global Fonts, add typography presets from `elementor/globals.md`
4. Copy CSS from `theme/global-styles.css` into Elementor > Site Settings > Custom CSS

### Step 3: Build Templates (Execution Order)

Build templates in this order to resolve dependencies:

| Order | Template | File | Notes |
|-------|----------|------|-------|
| 1 | Header | `templates/header.md` | Build first, needed by all pages |
| 2 | Footer | `templates/footer.md` | Build second, needed by all pages |
| 3 | Estimate Lightbox | `templates/estimate-lightbox.md` | Global popup, triggered from CTAs |
| 4 | Blog Archive | `templates/blog-archive.md` | Archive template for /blog/ |
| 5 | Single Post | `templates/single-post.md` | Single post template with comments |
| 6 | Search Results | `templates/search-results.md` | Search template |
| 7 | 404 | `templates/404.md` | Error page with back button |

### Step 4: Build Pages (Execution Order)

Build pages in this order:

| Order | Page | File | Notes |
|-------|------|------|-------|
| 1 | Home | `pages/home.md` | Set as front page |
| 2 | About | `pages/about-our-company.md` | |
| 3 | Our Team | `pages/our-team.md` | |
| 4 | Build Process | `pages/build-process.md` | Under "Our Approach" dropdown |
| 5 | Performance Building | `pages/performance-building.md` | Under "Our Approach" dropdown |
| 6 | Custom Homes | `pages/custom-homes.md` | Service page |
| 7 | Outdoor Spaces | `pages/outdoor-spaces.md` | Service page |
| 8 | Pool Houses, Garages, ADUs | `pages/pool-houses-garages-adus.md` | Service page |
| 9 | Sunrooms and Additions | `pages/sunrooms-and-additions.md` | Service page |
| 10 | Gallery | `pages/gallery.md` | Filterable project gallery |
| 11 | Blog | `pages/blog.md` | Archive behavior from template |
| 12 | Contact | `pages/contact.md` | |
| 13 | Request an Estimate | `pages/request-an-estimate.md` | SEO landing + lightbox |

### Step 5: Configure Navigation

**Primary Menu Structure:**

```
Home
About
├── About Our Company
├── Our Team
Services (dropdown only, URL: #)
├── Custom Homes
├── Outdoor Spaces
├── Pool Houses, Garages, ADUs
├── Sunrooms and Additions
Our Approach (dropdown only, URL: #)
├── Build Process
├── Performance Building
Gallery
The Blueprint (Blog)
Contact
```

**Important Navigation Rules:**
- "Services" is a dropdown label only with `href="#"` and no physical landing page
- "Our Approach" is a dropdown label only with `href="#"` and no physical landing page
- All service pages are accessed through the Services dropdown
- Build Process and Performance Building are under "Our Approach"

### Step 6: Quality Assurance

Run through `qa/visual-qa-checklist.md` for each page at all breakpoints:
- Desktop (1920px, 1440px, 1280px)
- Tablet (1024px, 768px)
- Mobile (414px, 375px, 320px)

## Staging vs Production

### Staging Environment

1. Use `staging.` subdomain or local environment
2. Enable all debug modes
3. Skip caching plugins during build
4. Test all forms with test email recipients
5. Verify all internal links use staging URLs
6. Run full QA checklist before production push

### Production Deployment

1. Search and replace staging URLs with production URLs
2. Update Gravity Forms notification emails
3. Enable caching plugins (WP Rocket, etc.)
4. Regenerate permalinks
5. Submit sitemap to Google Search Console
6. Test all forms with real submissions
7. Verify Google Analytics/Tag Manager
8. Run Lighthouse audit

## File Structure

```
site-kit/
├── README.md                    # This file
├── theme/
│   ├── tokens.json              # Design tokens (colors, fonts, spacing)
│   └── global-styles.css        # Global CSS from tokens
├── elementor/
│   └── globals.md               # Elementor global colors, fonts, buttons
├── templates/
│   ├── header.md                # Site header template
│   ├── footer.md                # Site footer template
│   ├── estimate-lightbox.md     # Global estimate popup
│   ├── blog-archive.md          # Blog listing template
│   ├── single-post.md           # Single blog post template
│   ├── search-results.md        # Search results template
│   └── 404.md                   # 404 error page template
├── pages/
│   ├── home.md                  # Home page
│   ├── about-our-company.md     # About page
│   ├── our-team.md              # Team page
│   ├── build-process.md         # Build process page
│   ├── performance-building.md  # Performance building page
│   ├── custom-homes.md          # Custom homes service
│   ├── outdoor-spaces.md        # Outdoor spaces service
│   ├── pool-houses-garages-adus.md  # Pool houses service
│   ├── sunrooms-and-additions.md    # Sunrooms service
│   ├── gallery.md               # Project gallery
│   ├── blog.md                  # Blog archive page
│   ├── contact.md               # Contact page
│   └── request-an-estimate.md   # Estimate page
├── wordpress/
│   └── config-checklist.md      # WP settings, comments, redirects
└── qa/
    └── visual-qa-checklist.md   # Page-by-page QA checklist
```

## Non-Negotiable Requirements

These requirements must be met exactly as specified:

1. **No Services Landing Page** — "Services" is a nav dropdown only with `href="#"`
2. **No Our Approach Landing Page** — "Our Approach" is a nav dropdown only with `href="#"`
3. **Request an Estimate Page Exists** — Real page at `/request-an-estimate/` for SEO and direct access
4. **Estimate Lightbox with Fallback** — Desktop/tablet CTAs open lightbox; mobile CTAs link to estimate page
5. **Blog Comments on Single Posts Only** — Comments appear only on single post pages with moderation
6. **404 Back Button with JS Fallback** — Back button uses `history.back()` with fallback to homepage
7. **Responsive Rules on All Templates** — Every template includes desktop, tablet, and mobile specifications
8. **Linked CTAs with Fallbacks** — All lightbox triggers have a normal link fallback for accessibility

## Brand Guidelines Reference

| Element | Value |
|---------|-------|
| Primary Gold | `#B08D66` |
| Deep Brown | `#4C2A19` |
| Warm White (Background) | `#FDFBF8` |
| Text Dark | `#333333` |
| Text Muted | `#666666` |
| Border Light | `#E8DFD5` |
| Heading Font | Libre Baskerville / Baskerville |
| Body Font | Corbel |
| Button Border Radius | 0px or 4px (per context) |
| Card Border Radius | 0px or 8px (per context) |

## Support

For questions about this site kit:
- Consult the authoritative source documents in the project root
- Reference `Claude.MD` for architectural decisions
- Reference `GLOBAL-TEMPLATES-BUILD-SPEC.md` for template details

---

End of README.
