# Header & Footer Elementor Build Specification

Version: 1.0.0

Complete build instructions for Grander Construction header and footer Elementor templates. These specifications follow Modules 1-4 brand rules and the Elementor-first architecture.

---

## Brand Reference (Module 1)

| Token | Value |
|-------|-------|
| Gold | `#B08D66` |
| Deep Brown | `#4C2A19` |
| Warm White | `#FDFBF8` |
| Text Dark | `#333333` |
| Heading Font | Baskerville |
| Body Font | Corbel |
| Spacing | 16 / 24 / 32 / 48px only |

---

## Part 1: Header Template

### Overview

The header consists of two distinct layers:

1. **Top Stripe** — Sticky white bar with logo, search, CTA buttons
2. **Overlay Navigation** — Transparent menu positioned over hero images with color switching

### 1.1 Top Stripe Structure

Create as: **Site Header template** in Elementor Theme Builder

```
Container: .gc-header-stripe
├── Inner Container (max-width: 1200px, horizontal flex, centered)
│   ├── Left Group (flex-shrink: 0)
│   │   └── Image Widget: Logo
│   │       - Dynamic: gc_header_logo (ACF Options)
│   │       - Max height: 50px desktop, 40px mobile
│   │       - Link: Home URL
│   │
│   ├── Center Group (flex-grow: 1, justify: center)
│   │   └── [Reserved for search icon - optional]
│   │
│   └── Right Group (flex-shrink: 0, gap: 16px)
│       ├── Button Widget: Request an Estimate
│       │   - Class: gc-header-estimate-btn
│       │   - Text: "Request an Estimate"
│       │   - Action: Open Elementor Popup (estimate lightbox)
│       │   - Style: Gold background, Deep Brown text
│       │
│       └── Button Widget: Call Now
│           - Class: gc-header-call
│           - Dynamic text: gc_phone_number (ACF Options)
│           - Link: tel:{{phone_clean}}
│           - Style: Ghost/outline, Deep Brown border and text
│           - Note: Hidden on mobile via CSS class
```

### 1.2 Top Stripe Elementor Settings

**Section/Container Settings:**
- Layout: Flexbox, Row direction
- Content Width: Full Width
- Items Align: Center
- Padding: 12px 24px (desktop), 10px 16px (mobile)
- Background: `#FFFFFF`
- Position: Sticky, Top: 0
- Z-index: 1000

**CSS Classes to Apply:**
| Element | Class |
|---------|-------|
| Outer section | `gc-header-stripe` |
| Call button | `gc-header-call` |
| Estimate button | `gc-header-estimate-btn` |

### 1.3 Overlay Navigation Structure

The navigation layer sits BELOW the top stripe and OVER the hero image. It uses absolute/fixed positioning on hero sections.

```
Container: .gc-nav-overlay (add variant class dynamically)
├── Inner Container (max-width: 1200px, horizontal flex)
│   ├── Nav Menu Widget
│   │   - Menu: Primary Menu
│   │   - Layout: Horizontal
│   │   - Dropdown: On hover
│   │   - Breakpoint: Tablet (1024px)
│   │   - Mobile: Hamburger icon
│   │
│   └── Mobile Menu Container
│       - Full menu hierarchy (all levels)
│       - Request an Estimate button (visible in mobile menu)
```

### 1.4 Nav Color Variants

The navigation must switch between light and dark variants based on the hero background.

**Variant Classes:**
- `.gc-nav-overlay--light` — Light/white text for dark hero backgrounds
- `.gc-nav-overlay--dark` — Dark/brown text for light hero backgrounds

**ACF Field for Control:**
- Field: `gc_hero_nav_variant` (select: light/dark)
- Location: Each page that has a hero section
- Default: `light` (most heroes will be dark images)

**Implementation in Elementor:**

Option A: Use two nav sections with visibility conditions
```
Section 1: .gc-nav-overlay--light
  - Dynamic Visibility: gc_hero_nav_variant equals "light"
  - Text color: #FDFBF8

Section 2: .gc-nav-overlay--dark
  - Dynamic Visibility: gc_hero_nav_variant equals "dark"
  - Text color: #4C2A19
```

Option B: Use CSS custom property switching (see CSS section below)

### 1.5 Mobile Header Behavior

**Hamburger Menu Requirements:**
- Appears at tablet breakpoint (1024px)
- Opens full-screen overlay or slide-in panel
- Shows COMPLETE menu hierarchy (all levels, not just top)
- Includes "Request an Estimate" button
- Close button clearly visible

**Floating Phone Icon:**
- Created automatically by plugin JS
- Appears bottom-right on screens < 768px
- Class: `.gc-float-call`
- Links to tel: with `gc_phone_number`
- Gold background, Deep Brown icon

**Call Button Behavior:**
- `.gc-header-call` button hidden on mobile via CSS
- Replaced by floating phone icon

### 1.6 Header ACF Bindings

| Widget | ACF Field | Source |
|--------|-----------|--------|
| Logo image | `gc_header_logo` | Options |
| Phone text | `gc_phone_number` | Options |
| Phone link | `gc_phone_clean` | Options (no spaces/dashes) |

---

## Part 2: Footer Template

### Overview

Dark footer with zigzag SVG border, logo, navigation links, contact information, trust logos, and social icons.

Create as: **Site Footer template** in Elementor Theme Builder

### 2.1 Footer Structure

```
Section: Zigzag Divider
├── Shortcode Widget: [grander_zigzag_divider color="dark"]
│   - OR Image Widget with footer-zigzag-divider.svg
│   - Class: gc-footer-zigzag
│   - Full width, no padding
│   - Background: transparent (sits above footer)

Section: Main Footer (.gc-footer)
├── Background: #4C2A19 (Deep Brown)
├── Padding: 64px 24px (desktop), 48px 16px (mobile)
│
├── Container: Footer Grid (max-width: 1200px)
│   │
│   ├── Column 1: Logo & Tagline
│   │   ├── Image Widget: White logo
│   │   │   - Dynamic: gc_footer_logo_white (ACF Options)
│   │   │   - Class: gc-footer-logo
│   │   │   - Max width: 180px
│   │   │
│   │   └── Text Widget: Tagline (optional)
│   │       - Static: "Building with integrity since [year]"
│   │       - Color: rgba(255,255,255,0.7)
│   │
│   ├── Column 2: Quick Links
│   │   ├── Heading Widget: "Quick Links"
│   │   │   - Style: Baskerville, 18px, #FDFBF8
│   │   │
│   │   └── Nav Menu Widget or Icon List
│   │       - Links: Home, Custom Homes, Outdoor Spaces,
│   │                Pool Houses/Garages/ADUs, Sunrooms & Additions,
│   │                Build Process, Team, Gallery, Contact
│   │       - Color: rgba(255,255,255,0.8)
│   │       - Hover: #B08D66
│   │
│   ├── Column 3: Contact Info
│   │   ├── Heading Widget: "Contact"
│   │   │   - Style: Baskerville, 18px, #FDFBF8
│   │   │
│   │   ├── Text Widget: Phone
│   │   │   - Dynamic: gc_phone_number
│   │   │   - Link: tel:{{gc_phone_clean}}
│   │   │
│   │   ├── Text Widget: Email
│   │   │   - Dynamic: gc_contact_email (if exists)
│   │   │   - Link: mailto:{{email}}
│   │   │
│   │   └── Text Widget: Service Area
│   │       - Shortcode: [grander_service_area_line]
│   │       - OR Dynamic: gc_service_area_text
│   │
│   └── Column 4: Trust & Social
│       ├── Container: Trust Logos (horizontal)
│       │   ├── Image Widget: HBA Logo
│       │   │   - Dynamic: gc_footer_hba_logo
│       │   │   - Link: gc_footer_hba_url
│       │   │   - Max height: 50px
│       │   │
│       │   └── Image Widget: BBB Logo
│       │       - Dynamic: gc_footer_bbb_logo
│       │       - Link: gc_footer_bbb_url
│       │       - Max height: 50px
│       │
│       └── Container: Social Icons (horizontal, gap: 16px)
│           ├── Icon Widget: Instagram
│           │   - Link: gc_social_instagram_url
│           │   - Icon: fab fa-instagram
│           │   - Color: #FDFBF8, Hover: #B08D66
│           │
│           └── Icon Widget: Facebook
│               - Link: gc_social_facebook_url
│               - Icon: fab fa-facebook-f
│               - Color: #FDFBF8, Hover: #B08D66

Section: Copyright Bar
├── Background: #3D2214 (slightly darker brown)
├── Padding: 16px 24px
│
└── Container: (max-width: 1200px, flex, justify: space-between)
    ├── Text Widget: Copyright
    │   - "© [year] Grander Construction. All rights reserved."
    │   - Color: rgba(255,255,255,0.6)
    │   - Size: 14px
    │
    └── Text Widget: Credits (optional)
        - "Website by [Designer]"
        - Color: rgba(255,255,255,0.4)
```

### 2.2 Footer Grid Layout

**Desktop (4 columns):**
```
| Logo/Tagline | Quick Links | Contact | Trust/Social |
|    25%       |    25%      |   25%   |     25%      |
```

**Tablet (2x2):**
```
| Logo/Tagline | Quick Links |
|   Contact    | Trust/Social|
```

**Mobile (stacked):**
```
| Logo/Tagline |
| Quick Links  |
| Contact      |
| Trust/Social |
```

### 2.3 Footer CSS Classes

| Element | Class |
|---------|-------|
| Main footer section | `gc-footer` |
| Zigzag divider | `gc-footer-zigzag` |
| Logo image | `gc-footer-logo` |
| Trust logos container | `gc-footer-trust` |
| Social icons container | `gc-footer-social` |
| Copyright bar | `gc-footer-copyright` |

### 2.4 Footer ACF Bindings

| Widget | ACF Field | Source |
|--------|-----------|--------|
| White logo | `gc_footer_logo_white` | Options |
| Phone number | `gc_phone_number` | Options |
| Service area | `gc_service_area_text` | Options |
| HBA logo | `gc_footer_hba_logo` | Options |
| HBA link | `gc_footer_hba_url` | Options |
| BBB logo | `gc_footer_bbb_logo` | Options |
| BBB link | `gc_footer_bbb_url` | Options |
| Instagram URL | `gc_social_instagram_url` | Options |
| Facebook URL | `gc_social_facebook_url` | Options |

---

## Part 3: CSS Specifications

Add this CSS to the existing `grander-core.css` file or as Custom CSS in Elementor Site Settings.

### 3.1 Header CSS

```css
/* ==========================================================================
   Header - Top Stripe
   ========================================================================== */

.gc-header-stripe {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: #FFFFFF;
    transition: box-shadow 0.3s ease;
}

.gc-header-stripe--scrolled {
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
}

/* Call button - hide on mobile */
.gc-header-call {
    /* Styling in Elementor */
}

@media (max-width: 767px) {
    .gc-header-call {
        display: none !important;
    }
}

/* Estimate button */
.gc-header-estimate-btn {
    background: #B08D66 !important;
    color: #4C2A19 !important;
    border: none !important;
    font-family: 'Corbel', sans-serif;
    font-weight: 600;
    padding: 12px 24px !important;
    transition: background 0.2s ease, transform 0.2s ease;
}

.gc-header-estimate-btn:hover {
    background: #9A7A58 !important;
    transform: translateY(-1px);
}

/* ==========================================================================
   Header - Overlay Navigation
   ========================================================================== */

.gc-nav-overlay {
    position: absolute;
    top: 70px; /* Below the stripe */
    left: 0;
    right: 0;
    z-index: 999;
    padding: 16px 24px;
}

/* Light variant - for dark hero backgrounds */
.gc-nav-overlay--light,
.gc-nav-overlay--light a,
.gc-nav-overlay--light .elementor-nav-menu > li > a {
    color: #FDFBF8 !important;
}

.gc-nav-overlay--light .elementor-nav-menu > li > a:hover {
    color: #B08D66 !important;
}

/* Dark variant - for light hero backgrounds */
.gc-nav-overlay--dark,
.gc-nav-overlay--dark a,
.gc-nav-overlay--dark .elementor-nav-menu > li > a {
    color: #4C2A19 !important;
}

.gc-nav-overlay--dark .elementor-nav-menu > li > a:hover {
    color: #B08D66 !important;
}

/* Dropdown menus - always dark on light background */
.gc-nav-overlay .elementor-nav-menu--dropdown {
    background: #FFFFFF;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
}

.gc-nav-overlay .elementor-nav-menu--dropdown a {
    color: #333333 !important;
}

.gc-nav-overlay .elementor-nav-menu--dropdown a:hover {
    color: #B08D66 !important;
    background: #FDFBF8;
}

/* ==========================================================================
   Mobile Menu
   ========================================================================== */

.gc-mobile-menu-panel {
    position: fixed;
    top: 0;
    right: -100%;
    width: 100%;
    max-width: 400px;
    height: 100vh;
    background: #FFFFFF;
    z-index: 10000;
    transition: right 0.3s ease;
    overflow-y: auto;
    padding: 80px 24px 24px;
}

.gc-mobile-menu-panel.is-open {
    right: 0;
}

.gc-mobile-menu-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    font-size: 28px;
    cursor: pointer;
    color: #4C2A19;
}

.gc-mobile-menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.gc-mobile-menu-overlay.is-visible {
    opacity: 1;
    visibility: visible;
}

/* Mobile menu items - show full hierarchy */
.gc-mobile-menu-panel .menu-item {
    border-bottom: 1px solid #E5E5E5;
}

.gc-mobile-menu-panel .menu-item a {
    display: block;
    padding: 16px 0;
    color: #333333;
    text-decoration: none;
    font-size: 18px;
}

.gc-mobile-menu-panel .sub-menu {
    padding-left: 16px;
}

.gc-mobile-menu-panel .sub-menu .menu-item {
    border-bottom: none;
}

.gc-mobile-menu-panel .sub-menu a {
    font-size: 16px;
    padding: 12px 0;
    color: #666666;
}

/* Mobile estimate button */
.gc-mobile-menu-estimate {
    display: block;
    width: 100%;
    margin-top: 24px;
    padding: 16px;
    background: #B08D66;
    color: #4C2A19;
    text-align: center;
    text-decoration: none;
    font-weight: 600;
    border-radius: 4px;
}

/* ==========================================================================
   Floating Call Icon (mobile)
   ========================================================================== */

.gc-float-call {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9998;
    display: none;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    background: #B08D66;
    color: #4C2A19;
    border-radius: 50%;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.gc-float-call:hover,
.gc-float-call:focus {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
    color: #4C2A19;
}

.gc-float-call svg {
    width: 24px;
    height: 24px;
}

@media (max-width: 767px) {
    .gc-float-call {
        display: flex;
    }
}
```

### 3.2 Footer CSS

```css
/* ==========================================================================
   Footer - Zigzag Divider
   ========================================================================== */

.gc-footer-zigzag {
    width: 100%;
    line-height: 0;
    margin-bottom: -1px; /* Prevent gap */
}

.gc-footer-zigzag svg {
    width: 100%;
    height: 40px;
    display: block;
    fill: #4C2A19;
}

/* ==========================================================================
   Footer - Main Section
   ========================================================================== */

.gc-footer {
    background: #4C2A19;
    color: #FDFBF8;
}

.gc-footer a {
    color: rgba(253, 251, 248, 0.8);
    text-decoration: none;
    transition: color 0.2s ease;
}

.gc-footer a:hover {
    color: #B08D66;
}

/* Footer headings */
.gc-footer h3,
.gc-footer h4,
.gc-footer .elementor-heading-title {
    font-family: 'Baskerville', 'Times New Roman', serif;
    font-size: 18px;
    color: #FDFBF8;
    margin-bottom: 16px;
}

/* Footer logo */
.gc-footer-logo {
    max-width: 180px;
    height: auto;
}

/* Footer links list */
.gc-footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.gc-footer-links li {
    margin-bottom: 8px;
}

.gc-footer-links a {
    font-size: 15px;
}

/* Trust logos */
.gc-footer-trust {
    display: flex;
    gap: 24px;
    align-items: center;
    margin-bottom: 24px;
}

.gc-footer-trust img {
    max-height: 50px;
    width: auto;
    filter: brightness(0) invert(1); /* Make logos white */
    opacity: 0.9;
    transition: opacity 0.2s ease;
}

.gc-footer-trust a:hover img {
    opacity: 1;
}

/* Social icons */
.gc-footer-social {
    display: flex;
    gap: 16px;
}

.gc-footer-social a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border: 1px solid rgba(253, 251, 248, 0.3);
    border-radius: 50%;
    color: #FDFBF8;
    transition: all 0.2s ease;
}

.gc-footer-social a:hover {
    background: #B08D66;
    border-color: #B08D66;
    color: #4C2A19;
}

.gc-footer-social svg,
.gc-footer-social i {
    width: 18px;
    height: 18px;
    font-size: 18px;
}

/* Service area line */
.gc-footer .gc-service-area-line {
    font-size: 14px;
    color: rgba(253, 251, 248, 0.6);
    margin-top: 16px;
}

/* ==========================================================================
   Footer - Copyright Bar
   ========================================================================== */

.gc-footer-copyright {
    background: #3D2214;
    padding: 16px 24px;
    font-size: 14px;
    color: rgba(253, 251, 248, 0.6);
}

.gc-footer-copyright a {
    color: rgba(253, 251, 248, 0.6);
}

.gc-footer-copyright a:hover {
    color: #B08D66;
}

/* ==========================================================================
   Footer - Responsive
   ========================================================================== */

@media (max-width: 1024px) {
    .gc-footer-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 767px) {
    .gc-footer-grid {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .gc-footer-trust,
    .gc-footer-social {
        justify-content: center;
    }

    .gc-footer-logo {
        margin: 0 auto 16px;
    }
}
```

---

## Part 4: JavaScript Specifications

Add this JavaScript to the existing `grander-core.js` file.

### 4.1 Header JavaScript

```javascript
/**
 * Header Scroll State
 * Adds .gc-header-stripe--scrolled class when page is scrolled
 */
function initHeaderScroll() {
    var headerStripe = document.querySelector('.gc-header-stripe');
    if (!headerStripe) return;

    var scrollThreshold = 50;
    var ticking = false;

    function updateScrollState() {
        var scrolled = window.scrollY > scrollThreshold;
        headerStripe.classList.toggle('gc-header-stripe--scrolled', scrolled);
    }

    updateScrollState();

    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                updateScrollState();
                ticking = false;
            });
            ticking = true;
        }
    }, { passive: true });
}

/**
 * Mobile Menu Toggle
 * Handles opening/closing of mobile menu panel
 */
function initMobileMenu() {
    var menuToggle = document.querySelector('.gc-mobile-menu-toggle');
    var menuPanel = document.querySelector('.gc-mobile-menu-panel');
    var menuOverlay = document.querySelector('.gc-mobile-menu-overlay');
    var menuClose = document.querySelector('.gc-mobile-menu-close');

    if (!menuToggle || !menuPanel) return;

    function openMenu() {
        menuPanel.classList.add('is-open');
        if (menuOverlay) menuOverlay.classList.add('is-visible');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        menuPanel.classList.remove('is-open');
        if (menuOverlay) menuOverlay.classList.remove('is-visible');
        document.body.style.overflow = '';
    }

    menuToggle.addEventListener('click', openMenu);
    if (menuClose) menuClose.addEventListener('click', closeMenu);
    if (menuOverlay) menuOverlay.addEventListener('click', closeMenu);

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && menuPanel.classList.contains('is-open')) {
            closeMenu();
        }
    });
}

/**
 * Mobile Floating Call Icon
 * Creates floating phone button on mobile
 */
function initMobileCallIcon() {
    var config = window.granderCoreData || {};
    if (!config.phoneClean) return;

    // Check if icon already exists
    if (document.querySelector('.gc-float-call')) return;

    var floatIcon = document.createElement('a');
    floatIcon.href = 'tel:' + config.phoneClean;
    floatIcon.className = 'gc-float-call';
    floatIcon.setAttribute('aria-label', 'Call us at ' + (config.phoneNumber || config.phoneClean));
    floatIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>';

    document.body.appendChild(floatIcon);
}

/**
 * Nav Color Switch (Optional - for dynamic switching)
 * Watches hero section and adjusts nav color based on scroll position
 */
function initNavColorSwitch() {
    var navOverlay = document.querySelector('.gc-nav-overlay');
    var heroSection = document.querySelector('.gc-hero, [data-hero="true"]');

    if (!navOverlay || !heroSection) return;

    // Get variant from data attribute or ACF field
    var variant = heroSection.dataset.navVariant || 'light';

    // Apply initial variant
    navOverlay.classList.remove('gc-nav-overlay--light', 'gc-nav-overlay--dark');
    navOverlay.classList.add('gc-nav-overlay--' + variant);

    // Optional: Switch to dark when scrolled past hero
    var heroHeight = heroSection.offsetHeight;
    var headerHeight = document.querySelector('.gc-header-stripe')?.offsetHeight || 70;

    window.addEventListener('scroll', function() {
        if (window.scrollY > heroHeight - headerHeight) {
            navOverlay.classList.remove('gc-nav-overlay--light');
            navOverlay.classList.add('gc-nav-overlay--dark');
        } else {
            navOverlay.classList.remove('gc-nav-overlay--dark');
            navOverlay.classList.add('gc-nav-overlay--' + variant);
        }
    }, { passive: true });
}

// Initialize all header functions
document.addEventListener('DOMContentLoaded', function() {
    initHeaderScroll();
    initMobileMenu();
    initMobileCallIcon();
    initNavColorSwitch();
});
```

---

## Part 5: Responsive Breakpoints

| Breakpoint | Width | Header Changes | Footer Changes |
|------------|-------|----------------|----------------|
| Desktop | > 1024px | Full nav visible, both buttons | 4-column grid |
| Tablet | 768-1024px | Hamburger menu appears | 2x2 grid |
| Mobile | < 768px | Call button hidden, float icon appears | Single column, centered |

---

## Part 6: Implementation Checklist

### Header Checklist

- [ ] Create Site Header template in Theme Builder
- [ ] Build top stripe container with logo, estimate button, call button
- [ ] Apply `.gc-header-stripe` class
- [ ] Apply `.gc-header-call` class to call button
- [ ] Set position: sticky on container
- [ ] Create navigation section with menu widget
- [ ] Configure hamburger at tablet breakpoint
- [ ] Apply nav variant class (light/dark)
- [ ] Test scroll state shadow appears
- [ ] Test call button hides on mobile
- [ ] Test floating phone icon appears on mobile
- [ ] Test mobile menu opens full hierarchy
- [ ] Test estimate button opens popup

### Footer Checklist

- [ ] Create Site Footer template in Theme Builder
- [ ] Add zigzag divider section with shortcode or SVG
- [ ] Apply `.gc-footer-zigzag` class
- [ ] Build main footer section with 4-column grid
- [ ] Apply `.gc-footer` class
- [ ] Add logo with ACF dynamic binding
- [ ] Add quick links navigation
- [ ] Add contact info with phone dynamic tag
- [ ] Add service area shortcode
- [ ] Add trust logos with ACF bindings
- [ ] Add social icons with ACF URL bindings
- [ ] Add copyright bar section
- [ ] Test responsive layout at all breakpoints
- [ ] Test all links work
- [ ] Test trust logos display correctly

---

## Part 7: Elementor Export JSON

When templates are complete, export both from Elementor:
1. Go to Templates > Theme Builder
2. Right-click each template > Export
3. Save as:
   - `gc-header-template.json`
   - `gc-footer-template.json`

These can be imported on production or other sites.

---

End of specification.
