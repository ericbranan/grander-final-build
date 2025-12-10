# Grander Core Changelog

All notable changes to the grander-core plugin will be documented in this file.

## Versioning Convention

This plugin follows semantic versioning: MAJOR.MINOR.PATCH

- **MAJOR**: Breaking changes to templates, shortcodes, or ACF field names
- **MINOR**: New features, new shortcodes, new ACF fields (backwards compatible)
- **PATCH**: Bug fixes, CSS adjustments, documentation updates

Update the version number in `grander-core.php` header when releasing changes.

---

## [1.2.0] - 2025-12-10

### Added
- **Admin UI enhancement** for ACF Settings pages
  - New `grander-admin.css` with card-based layout and brand colors
  - New `grander-admin.js` with module navigation and smooth scrolling
  - Custom page header with description
  - Quick-nav buttons for settings sections (Announcement, Contact, Trust Bar, Footer, Estimate)
  - Dark admin theme support
  - Responsive design for narrow admin widths
- **Deployment checklists** document (`DEPLOYMENT-CHECKLISTS.md`)
- Additional `.gitignore` rules for object cache and build artifacts

### Changed
- Updated `class-grander-assets.php` to properly scope admin CSS/JS to settings pages only
- Admin styles now load after ACF input styles for proper cascade

### Architecture
- Admin UI stays within WordPress conventions
- Uses Grander brand colors (gold, brown) subtly for polish
- No interference with ACF field functionality
- CSS scoped to `.toplevel_page_grander-settings` to prevent leakage

---

## [1.1.0] - 2025-12-10

### Changed
- **CSS drastically reduced** from 7638 lines (165KB) to 567 lines (13.5KB) - 92% reduction
- **JS reduced** from 1220 lines to 242 lines - 80% reduction
- Removed all page layout CSS that was competing with Elementor templates
- Removed all DOM-manipulating JavaScript
- Plugin now provides ONLY:
  - CSS custom properties (brand tokens)
  - Shortcode output styling
  - Behavior state classes (FAQ accordion, lightbox, header scroll)
  - Mobile floating call icon

### Fixed
- Visual mismatch caused by plugin CSS overriding Elementor templates
- LiteSpeed cache files cleared (were serving stale combined CSS/JS)

### Architecture Clarification
- **Elementor**: Owns all markup, layout, spacing, typography, colors
- **grander-core CSS**: Provides brand tokens and shortcode styling only
- **grander-core JS**: Provides enhancement behaviors only (5 functions)

---

## [1.0.0] - 2025-11-XX

### Added
- Initial plugin release
- Custom Post Types: project, testimonial, faq, gc_event
- Taxonomies: service_category, project_tag, faq_group
- ACF field groups for all page types and CPTs
- Shortcodes: zigzag_divider, service_area_line, trust_bar, events_strip, phone_link, estimate_form, estimate_lightbox
- REST API endpoints for all CPTs and taxonomies
- Global options page for site-wide settings
- Custom REST endpoint for ACF options: /wp-json/grander/v1/options

### Security
- All shortcode output uses proper escaping (esc_html, esc_attr, esc_url)
- All ACF field access checks for function_exists('get_field')
- REST endpoints respect WordPress capabilities

---

## Upgrade Notes

### Upgrading to 1.1.0

After deploying version 1.1.0, you MUST clear all caches:

1. **LiteSpeed Cache**: Go to LiteSpeed Cache > Dashboard > Purge All
2. **Elementor Cache**: Go to Elementor > Tools > Regenerate CSS & Data
3. **Browser Cache**: Hard refresh with Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows)

Failure to clear caches will result in the old bloated CSS being served from cache.

---

## Known Issues

### Elementor Hardcoded Fonts
Some Elementor widgets have hardcoded font-family values instead of using Global Typography. This is a UI issue, not a plugin issue. To fix:
1. Edit the widget in Elementor
2. Go to Style > Typography
3. Change from custom value to "Default" to inherit from Global Settings

Affected templates: post-5057 (Home page)

---

## Future Roadmap

- Events module activation when client has home shows to promote
- Performance building page completion
- Gallery filtering enhancements
- REST seeding script for bulk content import
