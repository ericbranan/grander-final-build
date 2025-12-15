# Header Template Specification

**Template Type:** Theme Builder > Header
**Conditions:** Entire Site
**Class Hook:** `gc-header-v1`

---

## Overview

The Grander Construction header features a transparent design that overlays hero sections, with intelligent color switching between light and dark variants based on page context. The header includes the logo, primary navigation with dropdowns, and a primary CTA button.

---

## Design Specifications

### Dimensions
| Property | Desktop | Tablet | Mobile |
|----------|---------|--------|--------|
| Height | 80px | 70px | 60px |
| Position | Sticky | Sticky | Sticky |
| Max Width | Full (stretched) | Full | Full |
| Content Width | 1200px | 100% | 100% |
| Padding | 0 40px | 0 24px | 0 16px |

### Color Variants

**Light Variant (Dark Hero Background):**
| Element | Color |
|---------|-------|
| Logo | White version or inverted |
| Nav Links | `#FFFFFF` |
| Nav Links Hover | `#B08D66` (Gold) |
| CTA Button | Gold background, Deep Brown text |
| Background | Transparent |

**Dark Variant (Light Background):**
| Element | Color |
|---------|-------|
| Logo | Dark version |
| Nav Links | `#4C2A19` (Deep Brown) |
| Nav Links Hover | `#B08D66` (Gold) |
| CTA Button | Gold background, Deep Brown text |
| Background | `#FFFFFF` with 95% opacity on scroll |

---

## Container Tree

```
Section: .gc-header-v1
├── Settings:
│   - Full Width (stretched)
│   - Position: Sticky
│   - Top: 0
│   - Z-index: 1000
│   - Background: Transparent (initial)
│   - Transition: background 0.3s ease
│
└── Container: .gc-header__inner (max-width: 1200px, centered)
    ├── Display: Flex
    ├── Justify Content: Space Between
    ├── Align Items: Center
    ├── Min Height: 80px (desktop), 70px (tablet), 60px (mobile)
    │
    ├── Container: .gc-header__logo
    │   └── Image Widget: Logo
    │       ├── Dynamic: gc_header_logo OR gc_header_logo_light (per variant)
    │       ├── Width: 180px (desktop), 150px (tablet), 130px (mobile)
    │       ├── Link: /
    │       └── Alt: "Grander Construction"
    │
    ├── Container: .gc-header__nav (desktop only)
    │   └── Nav Menu Widget: Primary Menu
    │       ├── Menu: primary-menu
    │       ├── Pointer: None
    │       ├── Layout: Horizontal
    │       ├── Space Between Items: 32px
    │       ├── Typography:
    │       │   ├── Font: Corbel
    │       │   ├── Size: 15px
    │       │   ├── Weight: 600
    │       │   └── Color: variant-dependent
    │       │
    │       └── Dropdown Settings:
    │           ├── Pointer: None
    │           ├── Hover Animation: Fade
    │           ├── Width: 220px
    │           ├── Background: #FFFFFF
    │           ├── Border Radius: 0 0 4px 4px
    │           ├── Box Shadow: 0 4px 12px rgba(0,0,0,0.1)
    │           ├── Padding: 12px 0
    │           ├── Item Padding: 10px 20px
    │           └── Item Hover Background: #F5F3F0
    │
    ├── Container: .gc-header__actions (flex, gap: 16px, align: center)
    │   │
    │   ├── Button Widget: CTA Button (desktop/tablet)
    │   │   ├── Text: "Request an Estimate"
    │   │   ├── Link: /request-an-estimate/ (fallback)
    │   │   ├── Data Attribute: data-gc-estimate-trigger="true"
    │   │   ├── Class: gc-btn gc-btn--primary gc-estimate-trigger
    │   │   ├── Typography: Corbel, 14px, 600
    │   │   ├── Padding: 12px 24px
    │   │   └── Hide on Mobile: Yes
    │   │
    │   └── Button Widget: Mobile Menu Toggle (mobile only)
    │       ├── Icon: Hamburger (3 lines)
    │       ├── Size: 28px
    │       ├── Color: variant-dependent
    │       ├── Class: gc-mobile-menu-toggle
    │       └── Show on: Mobile only
    │
    └── Container: .gc-mobile-menu (mobile only, hidden by default)
        ├── Position: Fixed
        ├── Top: 60px
        ├── Left: 0
        ├── Width: 100%
        ├── Height: calc(100vh - 60px)
        ├── Background: #FFFFFF
        ├── Padding: 24px
        ├── Transform: translateX(-100%)
        ├── Transition: transform 0.3s ease
        │
        └── Nav Menu Widget: Mobile Menu
            ├── Menu: primary-menu
            ├── Layout: Vertical
            ├── Typography: Baskerville, 22px, 600
            ├── Color: #4C2A19
            ├── Item Padding: 16px 0
            ├── Border Bottom: 1px solid #E8DFD5
            │
            └── After menu items:
                └── Button: "Request an Estimate"
                    ├── Link: /request-an-estimate/
                    ├── Class: gc-btn gc-btn--primary gc-btn--full
                    └── Margin Top: 32px
```

---

## Primary Navigation Structure

| Label | URL | Type | Children |
|-------|-----|------|----------|
| Home | `/` | Link | — |
| About | — | Dropdown | About Our Company, Our Team |
| Services | `#` | Dropdown (no page) | Custom Homes, Outdoor Spaces, Pool Houses Garages ADUs, Sunrooms and Additions |
| Our Approach | `#` | Dropdown (no page) | Build Process, Performance Building |
| Gallery | `/gallery/` | Link | — |
| The Blueprint | `/blog/` | Link | — |
| Contact | `/contact/` | Link | — |

**Important Navigation Rules:**
- "Services" has no physical landing page; URL is `#`
- "Our Approach" has no physical landing page; URL is `#`
- Dropdowns should open on hover (desktop) or tap (mobile)

---

## JavaScript Requirements

### Scroll Behavior
```javascript
// Header scroll effect
window.addEventListener('scroll', function() {
    const header = document.querySelector('.gc-header-v1');
    if (window.scrollY > 50) {
        header.classList.add('is-scrolled');
    } else {
        header.classList.remove('is-scrolled');
    }
});
```

### Variant Switching
```javascript
// Detect hero variant and apply header color
document.addEventListener('DOMContentLoaded', function() {
    const hero = document.querySelector('[data-hero="true"]');
    const header = document.querySelector('.gc-header-v1');

    if (hero && hero.dataset.navVariant === 'light') {
        header.classList.add('gc-header--light');
    } else {
        header.classList.add('gc-header--dark');
    }
});
```

### Mobile Menu Toggle
```javascript
// Mobile menu toggle
document.querySelector('.gc-mobile-menu-toggle').addEventListener('click', function() {
    document.querySelector('.gc-mobile-menu').classList.toggle('is-open');
    document.body.classList.toggle('menu-open');
});
```

---

## CSS Additions

```css
/* Header Scroll State */
.gc-header-v1.is-scrolled {
    background: rgba(255, 255, 255, 0.98);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

.gc-header-v1.is-scrolled.gc-header--light {
    /* Switch to dark variant when scrolled */
}

.gc-header-v1.is-scrolled .gc-header__nav a {
    color: #4C2A19;
}

/* Mobile Menu Open State */
.gc-mobile-menu.is-open {
    transform: translateX(0);
}

body.menu-open {
    overflow: hidden;
}

/* Dropdown Indicators */
.gc-header__nav .menu-item-has-children > a::after {
    content: '';
    display: inline-block;
    width: 8px;
    height: 8px;
    margin-left: 6px;
    border-right: 2px solid currentColor;
    border-bottom: 2px solid currentColor;
    transform: rotate(45deg) translateY(-2px);
    transition: transform 0.2s ease;
}

.gc-header__nav .menu-item-has-children:hover > a::after {
    transform: rotate(-135deg) translateY(2px);
}
```

---

## Responsive Behavior

### Desktop (1025px+)
- Full horizontal navigation visible
- CTA button visible
- Mobile menu toggle hidden
- Dropdowns on hover

### Tablet (768px - 1024px)
- Navigation may switch to hamburger at 900px
- CTA button smaller padding
- Reduced logo size

### Mobile (767px and below)
- Logo + hamburger only
- Full-screen mobile menu on toggle
- Vertical navigation with accordions for dropdowns
- CTA button at bottom of mobile menu

---

## ACF Dynamic Tags

| Element | Field | Source |
|---------|-------|--------|
| Logo (dark) | `gc_header_logo` | Options |
| Logo (light) | `gc_header_logo_light` | Options |
| CTA Text | `gc_header_cta_text` | Options (default: "Request an Estimate") |
| CTA URL | `gc_header_cta_url` | Options (default: /request-an-estimate/) |

---

## Implementation Checklist

- [ ] Create Header template in Theme Builder
- [ ] Set condition: Entire Site
- [ ] Build outer section with sticky positioning
- [ ] Add logo with dynamic source
- [ ] Configure nav menu with dropdowns
- [ ] Add CTA button with lightbox trigger
- [ ] Build mobile menu toggle
- [ ] Build mobile menu panel
- [ ] Add scroll JavaScript
- [ ] Add variant switching JavaScript
- [ ] Test light/dark variants on different pages
- [ ] Test responsive behavior at all breakpoints
- [ ] Verify dropdown behavior
- [ ] Verify mobile menu opens/closes correctly

---

End of header template specification.
