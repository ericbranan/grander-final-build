# Grander Admin UI Notes

Documentation for the ACF Settings page admin UI enhancements.

## Overview

The Grander Settings page has custom styling to create a polished, app-like experience within WordPress admin. This maintains the thin-layer philosophy while providing a better UX for site administrators.

## Files

| File | Purpose |
|------|---------|
| `assets/css/grander-admin.css` | Admin-specific styles for settings pages |
| `assets/js/grander-admin.js` | Module navigation and UX enhancements |
| `includes/class-grander-assets.php` | Enqueues admin assets (scoped to settings pages) |

## Target Screens

The admin CSS/JS only loads on:

- `toplevel_page_grander-settings` (Grander Settings main page)

This scoping prevents style leakage to other admin screens.

## Design System

### Colors

Admin colors use CSS custom properties for theme compatibility:

```css
--gc-admin-gold: #B08D66;       /* Brand gold */
--gc-admin-gold-light: #D4BC9A; /* Light gold for hover states */
--gc-admin-brown: #4C2A19;      /* Brand brown */
--gc-admin-brown-light: #5C4A3D;/* Light brown for borders */
```

### Dark Theme Support

Automatically adapts for these WordPress admin color schemes:
- modern
- midnight
- coffee
- ectoplasm
- ocean
- sunrise

### Spacing Tokens

```css
--gc-admin-spacing-xs: 8px;
--gc-admin-spacing-sm: 12px;
--gc-admin-spacing-md: 16px;
--gc-admin-spacing-lg: 24px;
--gc-admin-spacing-xl: 32px;
```

## Components

### Page Header

Injected via JavaScript, replaces default WordPress H1:

```html
<div class="gc-admin-page">
    <div class="gc-admin-header">
        <h1 class="gc-admin-header__title">Grander Site Settings</h1>
        <p class="gc-admin-header__description">...</p>
    </div>
</div>
```

### Module Navigation

Quick-nav buttons to jump to ACF tab sections:

```html
<nav class="gc-admin-nav" role="navigation" aria-label="Settings sections">
    <a href="#" class="gc-admin-nav__item" data-section="announcement">
        <svg class="gc-admin-nav__icon">...</svg>
        Announcement
    </a>
    <!-- More items -->
</nav>
```

**Keyboard Navigation:**
- Tab: Move between buttons
- Enter/Space: Activate button
- Arrow keys: Move focus between buttons

### ACF Field Enhancements

The CSS enhances standard ACF markup without modifying ACF output:

- `.acf-postbox`: Card styling with rounded corners and shadow
- `.acf-fields`: Consistent padding
- `.acf-field`: Border separators
- `.acf-label`: Styled labels
- `.acf-input`: Enhanced focus states
- `.acf-tab-group`: Styled tab navigation

## Extending

### Adding New Settings Sections

1. Add a new nav item in `grander-admin.js` `initPageHeader()`:

```javascript
<a href="#gc-section-new" class="gc-admin-nav__item" data-section="newsection">
    <svg>...</svg>
    New Section
</a>
```

2. Add mapping in `mapSectionToTab()`:

```javascript
var mapping = {
    // existing...
    'newsection': 'Tab Label' // must match ACF tab label
};
```

### Adding New Settings Pages

1. Register the page with ACF
2. Add the hook to `class-grander-assets.php`:

```php
$allowed_hooks = array(
    'toplevel_page_grander-settings',
    'new_page_hook_name', // Add here
);
```

## Accessibility

- All interactive elements have visible focus states
- Navigation uses `role="navigation"` and `aria-label`
- Keyboard navigation supported (Tab, Enter, Space, Arrow keys)
- Color contrast meets WCAG AA requirements
- Focus indicators visible in all admin themes

## Maintenance

### When ACF Updates

The CSS targets ACF classes like `.acf-postbox`, `.acf-fields`, etc. If ACF Pro updates change these class names, the admin CSS may need updates.

Monitor for:
- Changed class names
- New wrapper elements
- Modified tab navigation structure

### Adding New Tab Sections

When adding new ACF tabs to Grander Settings:

1. The tab will automatically get styling from `.acf-tab-group` rules
2. Optionally add a nav button for quick access
3. Test in both light and dark admin themes

---

*Last updated: 2025-12-10*
*Version: 1.2.0*
