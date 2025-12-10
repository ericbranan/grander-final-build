# Grander Core Plugin

Version: 1.0.0

A WordPress plugin providing data models, ACF schemas, and REST API compatibility for the Grander Construction website. Works alongside Elementor templates following an Elementor-first architecture.

---

## Installation

1. Upload the `grander-core` folder to `/wp-content/plugins/`
2. Activate the plugin through WordPress admin
3. Ensure ACF Pro is installed and activated
4. Visit Grander Settings to configure global options

---

## What this plugin provides

### Custom Post Types
- **Projects** (`project`) - Portfolio items
- **Testimonials** (`testimonial`) - Client testimonials
- **FAQs** (`faq`) - Frequently asked questions
- **Events** (`gc_event`) - Upcoming events (disabled by default)

### Taxonomies
- **Service Categories** (`service_category`) - Project and FAQ categorization
- **Project Tags** (`project_tag`) - Additional project filtering
- **FAQ Groups** (`faq_group`) - FAQ grouping for page-level display

### ACF Field Groups
- Global options page with site-wide settings
- Page-specific fields for Home, Services, Team, Gallery, Contact, Estimate
- CPT-specific fields for Projects, Testimonials, FAQs

### REST API Endpoints
- Standard WP endpoints for all CPTs and taxonomies
- Custom endpoint: `/wp-json/grander/v1/options`

### Shortcodes
- `[grander_zigzag_divider]` - SVG zigzag pattern
- `[grander_service_area_line]` - Service area microline
- `[grander_trust_bar]` - Trust items display
- `[grander_events_strip]` - Upcoming events
- `[grander_phone_link]` - Clickable phone number
- `[grander_estimate_form]` - Gravity Forms embed wrapper

---

## Architecture

This plugin follows an **Elementor-first** architecture:

| Component | Responsibility |
|-----------|----------------|
| **Elementor** | All markup, layout, and visual design |
| **Plugin** | Data models, ACF schemas, REST API, small enhancements |

The plugin does NOT:
- Hardcode page layouts
- Render complete headers or footers
- Generate complex HTML structures

---

## Files structure

```
grander-core/
├── grander-core.php           # Main plugin file
├── README.md                  # This file
├── TEMPLATE-LIBRARY-GUIDE.md  # Elementor template instructions
├── REST-SEEDING-GUIDE.md      # REST API import documentation
├── includes/
│   ├── class-grander-cpt.php         # CPT and taxonomy registration
│   ├── class-grander-acf.php         # ACF field groups
│   ├── class-grander-assets.php      # CSS/JS enqueuing
│   ├── class-grander-shortcodes.php  # Shortcode definitions
│   └── class-grander-rest-options.php # Custom REST endpoint
└── assets/
    ├── css/
    │   └── grander-core.css   # Class hooks and shortcode styling
    ├── js/
    │   └── grander-core.js    # Mobile behaviors and enhancements
    └── svg/
        └── footer-zigzag-divider.svg
```

---

## Class hooks for Elementor

Apply these classes in Elementor for plugin CSS/JS targeting:

### Header
- `.gc-header-stripe` - Sticky top bar
- `.gc-header-call` - Call button (hidden on mobile)
- `.gc-nav-overlay--light` / `.gc-nav-overlay--dark` - Nav color variants

### Footer
- `.gc-footer` - Main footer wrapper
- `.gc-footer-zigzag` - Zigzag divider placement

### Components
- `.gc-testimonials-v1` - Testimonial slider
- `.gc-faq-accordion-v1` - FAQ accordion
- `.gc-trust-bar` - Trust bar
- `.gc-featured-projects-v1` - Featured projects grid
- `.gc-events-strip` - Events display
- `.gc-estimate-cta-v1` - Estimate CTA block
- `.gc-team-grid-v1` - Team member grid
- `.gc-process-steps-v1` - Build process steps

---

## Requirements

- WordPress 6.0+
- PHP 7.4+
- ACF Pro 6.0+
- Elementor Pro (recommended)

---

## Documentation

- See `TEMPLATE-LIBRARY-GUIDE.md` for Elementor template build instructions
- See `REST-SEEDING-GUIDE.md` for API import documentation
- See `Claude.MD` in the project root for full site planning documentation
