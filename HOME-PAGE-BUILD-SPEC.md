# Home Page Build Specification

Version: 1.0.0

Complete build instructions for the Grander Construction Home page in Elementor. This page uses Layout Pattern A (Full-bleed hero → Trust bar → Content → CTA) with multiple reusable templates.

---

## Page Overview

| Property | Value |
|----------|-------|
| Page Title | Home (or Grander Construction) |
| Slug | `/` (front page) |
| Template | Elementor Full Width |
| Layout Pattern | A |
| Nav Variant | Light (dark hero background) |

---

## Section-by-Section Build Instructions

### Section 1: Hero

**Layout:** Full-bleed, full viewport height, image or video background

```
Section: .gc-hero
├── Settings:
│   - Height: Fit to Screen (100vh)
│   - Content Position: Center
│   - Overflow: Hidden
│   - Data attribute: data-hero="true" data-nav-variant="light"
│
├── Background:
│   - Type: Image (or Video)
│   - Dynamic: gc_home_hero_image (ACF Home Page)
│   - Size: Cover
│   - Position: Center Center
│   - Overlay: Linear gradient (rgba(0,0,0,0.3) to rgba(0,0,0,0.5))
│
└── Container (max-width: 800px, centered, text-center)
    │
    ├── Heading Widget: Primary Headline
    │   - Dynamic: gc_home_hero_headline
    │   - Default: "Building the Upstate's finest homes"
    │   - H1, Baskerville, 56px desktop / 42px tablet / 36px mobile
    │   - Color: Warm White (#FDFBF8)
    │   - Margin bottom: 24px
    │
    ├── Text Widget: Subheadline
    │   - Dynamic: gc_home_hero_subheadline
    │   - Default: "Custom homes, outdoor spaces, and additions crafted with integrity"
    │   - Style: 20px, Warm White (90% opacity)
    │   - Max width: 600px
    │   - Margin bottom: 32px
    │
    └── Container: CTA Buttons (flex, gap: 16px, centered)
        │
        ├── Button Widget: Primary CTA
        │   - Text: gc_home_hero_cta_primary_label OR "Request an Estimate"
        │   - Link: gc_home_hero_cta_primary_url OR popup trigger
        │   - Style: Gold background, Deep Brown text
        │   - Class: gc-btn gc-btn--primary
        │
        └── Button Widget: Secondary CTA
            - Text: gc_home_hero_cta_secondary_label OR "View Our Work"
            - Link: gc_home_hero_cta_secondary_url OR /gallery/
            - Style: Ghost, white border and text
            - Class: gc-btn gc-btn--secondary-light
```

### ACF Bindings - Hero

| Widget | Field | Source |
|--------|-------|--------|
| Background image | `gc_home_hero_image` | Home Page |
| Headline | `gc_home_hero_headline` | Home Page |
| Subheadline | `gc_home_hero_subheadline` | Home Page |
| Primary CTA text | `gc_home_hero_cta_primary_label` | Home Page |
| Primary CTA link | `gc_home_hero_cta_primary_url` | Home Page |
| Secondary CTA text | `gc_home_hero_cta_secondary_label` | Home Page |
| Secondary CTA link | `gc_home_hero_cta_secondary_url` | Home Page |

---

### Section 2: Trust Bar

**Layout:** Horizontal badges strip below hero

```
Section: .gc-trust-bar
├── Background: Warm White (#FDFBF8)
├── Padding: 24px
│
└── [Insert Template: GC Trust Bar v1]
    - OR use shortcode: [grander_trust_bar]
```

---

### Section 3: Introduction / Welcome

**Layout:** Centered text with optional image accent

```
Section: .gc-home-intro
├── Background: White
├── Padding: 100px 24px (desktop) / 80px 24px (tablet) / 60px 16px (mobile)
│
└── Container (max-width: 800px, centered, text-center)
    │
    ├── Heading Widget: Section Title
    │   - Dynamic: gc_home_intro_headline
    │   - Default: "Crafting spaces that feel like home"
    │   - H2, Baskerville, 42px, Deep Brown
    │   - Margin bottom: 24px
    │
    └── Text Widget: Intro Copy
        - Dynamic: gc_home_intro_body
        - Default: [See copy below]
        - Style: 18px, Text Dark, line-height 1.8
        - Max width: 700px
```

**Default Intro Copy:**
> For over two decades, Grander Construction has been building custom homes, outdoor living spaces, and thoughtful additions throughout the Upstate. We believe in doing things right—with quality materials, skilled craftsmanship, and the kind of personal attention that makes every project feel like a partnership.

### ACF Bindings - Intro

| Widget | Field | Source |
|--------|-------|--------|
| Headline | `gc_home_intro_headline` | Home Page |
| Body | `gc_home_intro_body` | Home Page |

---

### Section 4: Service Cards (Expert Offerings)

**Layout:** 2x2 grid of service category cards

```
Section: .gc-service-cards-v1
├── Background: Warm White
├── Padding: 100px 24px
│
└── Container (max-width: 1200px, centered)
    │
    ├── Container: Header Row (text-center, margin-bottom: 48px)
    │   └── Heading Widget: Section Title
    │       - Text: "Expert Offerings"
    │       - H2, Baskerville, 36px, Deep Brown
    │
    └── Container: Card Grid
        - Display: Grid
        - Columns: 2 (desktop), 2 (tablet), 1 (mobile)
        - Gap: 24px
        │
        ├── Card 1: Custom Homes
        │   └── Container: .gc-service-card
        │       ├── .gc-service-card__image
        │       │   - Image: Custom home hero image
        │       │
        │       └── .gc-service-card__content
        │           ├── .gc-service-card__title: "Custom Homes"
        │           ├── .gc-service-card__summary: "Thoughtfully designed homes..."
        │           └── .gc-service-card__button: "Explore" → /custom-homes/
        │
        ├── Card 2: Outdoor Spaces
        │   └── [Same structure]
        │       - Title: "Outdoor Spaces"
        │       - Summary: "Porches, patios, coverings, decks..."
        │       - Link: /outdoor-spaces/
        │
        ├── Card 3: Pool Houses, Garages & ADUs
        │   └── [Same structure]
        │       - Title: "Pool Houses, Garages & ADUs"
        │       - Summary: "Multi-purpose structures..."
        │       - Link: /pool-houses-garages-adus/
        │
        └── Card 4: Sunrooms & Additions
            └── [Same structure]
                - Title: "Sunrooms & Additions"
                - Summary: "Light-filled expansions..."
                - Link: /sunrooms-additions/
```

**Static Card Content:**

| Service | Summary |
|---------|---------|
| Custom Homes | Thoughtfully designed homes that balance timeless style, modern comfort, and high-performance details. |
| Outdoor Spaces | Porches, patios, coverings, decks, and pavilions that extend how you live outside with year-round comfort. |
| Pool Houses, Garages & ADUs | Multi-purpose structures that add function, storage, and flexible living space without compromising aesthetics. |
| Sunrooms & Additions | Light-filled expansions that connect your existing home to new possibilities in comfort and layout. |

---

### Section 5: Featured Projects

**Layout:** Carousel of selected projects

```
Section: .gc-featured-projects-v1
├── Background: White
├── Padding: 100px 24px
│
└── [Insert Template: GC Featured Projects v1]
    │
    └── Data source: gc_featured_projects (Options)
```

### ACF Bindings - Featured Projects

| Widget | Field | Source |
|--------|-------|--------|
| Projects relationship | `gc_featured_projects` | Options |

---

### Section 6: Build Process Overview

**Layout:** Numbered steps with icons

```
Section: .gc-process-overview-v1
├── Background: Warm White
├── Padding: 100px 24px
│
└── Container (max-width: 1200px, centered)
    │
    ├── Container: Header (text-center, margin-bottom: 48px)
    │   ├── Heading Widget: Section Title
    │   │   - Text: "Our Build Process"
    │   │   - H2, Baskerville, 36px, Deep Brown
    │   │
    │   └── Text Widget: Subtitle
    │       - Text: "A clear path from concept to completion"
    │       - Style: 18px, Text Muted
    │
    └── Container: Steps Grid
        - Display: Grid
        - Columns: 4 (desktop), 2 (tablet), 1 (mobile)
        - Gap: 32px
        │
        ├── Step 1: Discovery
        │   └── Container: .gc-process-overview__step
        │       ├── .gc-process-overview__number: "01"
        │       ├── .gc-process-overview__icon (optional)
        │       ├── .gc-process-overview__label: "Discovery"
        │       └── .gc-process-overview__desc: "We learn about your vision..."
        │
        ├── Step 2: Design
        │   └── [Same structure]
        │
        ├── Step 3: Build
        │   └── [Same structure]
        │
        └── Step 4: Complete
            └── [Same structure]
    │
    └── Container: CTA (text-center, margin-top: 48px)
        └── Button Widget
            - Text: "Learn About Our Process"
            - Link: /build-process/
            - Style: Gold background
```

**Step Content:**

| Step | Label | Description |
|------|-------|-------------|
| 01 | Discovery | We learn about your vision, needs, and budget through an initial consultation. |
| 02 | Design | Our team develops detailed plans that bring your ideas to life. |
| 03 | Build | Expert craftsmen execute your project with quality and precision. |
| 04 | Complete | We walk through every detail to ensure your complete satisfaction. |

---

### Section 7: Testimonials

**Layout:** Carousel slider of client quotes

```
Section: .gc-testimonials-v1
├── Background: White
├── Padding: 100px 24px
│
└── [Insert Template: GC Testimonial Slider v1]
    │
    └── Data source: Testimonial CPT or gc_testimonials (Options)
```

---

### Section 8: Events Strip (Conditional)

**Layout:** Card-based upcoming events display

```
Section: .gc-events-strip
├── Visibility: Show only if gc_events_enabled = true
├── Background: Warm White
├── Padding: 80px 24px
│
└── [Insert Template: GC Events Strip v1]
    - OR use shortcode: [grander_events_strip]
```

**Note:** This section is hidden by default at launch.

---

### Section 9: Social Feed

**Layout:** Instagram grid from Smash Balloon

```
Section: .gc-social-feed-v1
├── Background: Warm White
├── Padding: 80px 24px
│
└── Container (max-width: 1200px, centered)
    │
    ├── Heading Widget: Section Title
    │   - Text: "Follow Along"
    │   - H2, Baskerville, 36px, Deep Brown
    │   - Text align: center
    │   - Margin bottom: 16px
    │
    ├── Text Widget: Instagram Handle
    │   - Dynamic: @{gc_social_instagram_handle} OR "@granderconstruction"
    │   - Link: gc_social_instagram_url
    │   - Style: 16px, Gold, centered
    │   - Margin bottom: 48px
    │
    └── Shortcode Widget
        - Shortcode: [instagram-feed feed=1]
        - 8-12 images, grid layout
```

### ACF Bindings - Social

| Widget | Field | Source |
|--------|-------|--------|
| Instagram URL | `gc_social_instagram_url` | Options |
| Handle display | Static or custom field | Options |

---

### Section 10: Final CTA

**Layout:** Bold call-to-action section

```
Section: .gc-home-final-cta
├── Background: Deep Brown (#4C2A19)
├── Padding: 100px 24px
│
└── Container (max-width: 800px, centered, text-center)
    │
    ├── Heading Widget: CTA Headline
    │   - Dynamic: gc_home_cta_headline
    │   - Default: "Ready to build something exceptional?"
    │   - H2, Baskerville, 42px, Warm White
    │   - Margin bottom: 24px
    │
    ├── Text Widget: CTA Body
    │   - Dynamic: gc_home_cta_body
    │   - Default: "Let's discuss your project and explore how we can bring your vision to life."
    │   - Style: 18px, Warm White (80% opacity)
    │   - Margin bottom: 32px
    │
    └── Button Widget: CTA Button
        - Text: "Request an Estimate"
        - Link: Popup trigger (estimate lightbox)
        - Style: Gold background, Deep Brown text
        - Class: gc-btn gc-btn--primary
```

### ACF Bindings - Final CTA

| Widget | Field | Source |
|--------|-------|--------|
| Headline | `gc_home_cta_headline` | Home Page |
| Body | `gc_home_cta_body` | Home Page |

---

## Complete Section Summary

| # | Section | Template to Insert | Background | Padding |
|---|---------|-------------------|------------|---------|
| 1 | Hero | Custom build | Image/Video | 100vh |
| 2 | Trust Bar | GC Trust Bar v1 | Warm White | 24px |
| 3 | Introduction | Custom build | White | 100/80/60px |
| 4 | Service Cards | Custom build | Warm White | 100/80/60px |
| 5 | Featured Projects | GC Featured Projects v1 | White | 100/80/60px |
| 6 | Process Overview | Custom build | Warm White | 100/80/60px |
| 7 | Testimonials | GC Testimonial Slider v1 | White | 100/80/60px |
| 8 | Events Strip | GC Events Strip v1 | Warm White | 80/60/48px |
| 9 | Social Feed | Custom + shortcode | Warm White | 80/60/48px |
| 10 | Final CTA | Custom build | Deep Brown | 100/80/60px |

---

## Home Page ACF Fields Summary

All fields are under the "Home Page" field group, attached to the Home page only.

### Hero Fields
| Field Name | Type | Default |
|------------|------|---------|
| `gc_home_hero_image` | Image | Required |
| `gc_home_hero_headline` | Text | "Building the Upstate's finest homes" |
| `gc_home_hero_subheadline` | Textarea | "Custom homes, outdoor spaces..." |
| `gc_home_hero_cta_primary_label` | Text | "Request an Estimate" |
| `gc_home_hero_cta_primary_url` | URL | # (popup trigger) |
| `gc_home_hero_cta_secondary_label` | Text | "View Our Work" |
| `gc_home_hero_cta_secondary_url` | URL | /gallery/ |

### Intro Fields
| Field Name | Type | Default |
|------------|------|---------|
| `gc_home_intro_headline` | Text | "Crafting spaces that feel like home" |
| `gc_home_intro_body` | Wysiwyg | [Intro copy] |

### CTA Fields
| Field Name | Type | Default |
|------------|------|---------|
| `gc_home_cta_headline` | Text | "Ready to build something exceptional?" |
| `gc_home_cta_body` | Textarea | "Let's discuss your project..." |

---

## CSS for Home Page Sections

```css
/* ==========================================================================
   Home Page - Hero
   ========================================================================== */

.gc-hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gc-hero__content {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 0 24px;
}

.gc-hero h1 {
    font-family: var(--gc-font-heading);
    font-size: 56px;
    color: var(--gc-warm-white);
    margin-bottom: 24px;
    line-height: 1.1;
}

.gc-hero p {
    font-size: 20px;
    color: rgba(253, 251, 248, 0.9);
    max-width: 600px;
    margin: 0 auto 32px;
    line-height: 1.6;
}

@media (max-width: 1024px) {
    .gc-hero h1 {
        font-size: 42px;
    }

    .gc-hero p {
        font-size: 18px;
    }
}

@media (max-width: 767px) {
    .gc-hero h1 {
        font-size: 36px;
    }

    .gc-hero p {
        font-size: 16px;
    }
}

/* ==========================================================================
   Home Page - Introduction
   ========================================================================== */

.gc-home-intro {
    text-align: center;
}

.gc-home-intro h2 {
    font-family: var(--gc-font-heading);
    font-size: 42px;
    color: var(--gc-deep-brown);
    margin-bottom: 24px;
}

.gc-home-intro p {
    font-size: 18px;
    color: var(--gc-text);
    line-height: 1.8;
    max-width: 700px;
    margin: 0 auto;
}

@media (max-width: 767px) {
    .gc-home-intro h2 {
        font-size: 32px;
    }

    .gc-home-intro p {
        font-size: 16px;
    }
}

/* ==========================================================================
   Home Page - Process Overview
   ========================================================================== */

.gc-process-overview-v1 {
    text-align: center;
}

.gc-process-overview__step {
    text-align: center;
    padding: 24px;
}

.gc-process-overview__number {
    font-family: var(--gc-font-heading);
    font-size: 48px;
    color: var(--gc-gold);
    margin-bottom: 16px;
    line-height: 1;
}

.gc-process-overview__icon {
    font-size: 32px;
    color: var(--gc-gold);
    margin-bottom: 16px;
}

.gc-process-overview__label {
    font-family: var(--gc-font-heading);
    font-size: 22px;
    color: var(--gc-deep-brown);
    margin-bottom: 12px;
}

.gc-process-overview__desc {
    font-size: 15px;
    color: var(--gc-text-muted);
    line-height: 1.6;
}

/* ==========================================================================
   Home Page - Final CTA
   ========================================================================== */

.gc-home-final-cta {
    background: var(--gc-deep-brown);
    text-align: center;
}

.gc-home-final-cta h2 {
    font-family: var(--gc-font-heading);
    font-size: 42px;
    color: var(--gc-warm-white);
    margin-bottom: 24px;
}

.gc-home-final-cta p {
    font-size: 18px;
    color: rgba(253, 251, 248, 0.8);
    max-width: 600px;
    margin: 0 auto 32px;
    line-height: 1.6;
}

@media (max-width: 767px) {
    .gc-home-final-cta h2 {
        font-size: 32px;
    }

    .gc-home-final-cta p {
        font-size: 16px;
    }
}

/* ==========================================================================
   Button Styles
   ========================================================================== */

.gc-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 16px 32px;
    font-family: var(--gc-font-body);
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 4px;
    transition: all 0.2s ease;
    cursor: pointer;
    border: 2px solid transparent;
}

.gc-btn--primary {
    background: var(--gc-gold);
    color: var(--gc-deep-brown);
    border-color: var(--gc-gold);
}

.gc-btn--primary:hover {
    background: #9A7A58;
    border-color: #9A7A58;
    transform: translateY(-2px);
}

.gc-btn--secondary {
    background: transparent;
    color: var(--gc-deep-brown);
    border-color: var(--gc-deep-brown);
}

.gc-btn--secondary:hover {
    background: var(--gc-deep-brown);
    color: var(--gc-warm-white);
}

.gc-btn--secondary-light {
    background: transparent;
    color: var(--gc-warm-white);
    border-color: var(--gc-warm-white);
}

.gc-btn--secondary-light:hover {
    background: var(--gc-warm-white);
    color: var(--gc-deep-brown);
}
```

---

## Build Checklist

### Before Starting
- [ ] Ensure all ACF fields are registered (Option A complete)
- [ ] Ensure Header/Footer templates built (Option B complete)
- [ ] Ensure global templates available (Option D complete)

### Hero Section
- [ ] Create section with 100vh height
- [ ] Add background image with ACF binding
- [ ] Add gradient overlay
- [ ] Add headline, subheadline, buttons with ACF bindings
- [ ] Set data-hero="true" and data-nav-variant="light"
- [ ] Test responsive at all breakpoints

### Trust Bar
- [ ] Insert GC Trust Bar v1 template
- [ ] OR add shortcode widget
- [ ] Verify badges display

### Introduction
- [ ] Create centered container (800px max)
- [ ] Add headline and body with ACF bindings
- [ ] Verify typography matches specs

### Service Cards
- [ ] Create 2x2 grid layout
- [ ] Build 4 service cards with images
- [ ] Add static content per card
- [ ] Link each to correct service page
- [ ] Test hover states

### Featured Projects
- [ ] Insert GC Featured Projects v1 template
- [ ] Verify projects pulling from gc_featured_projects
- [ ] Test carousel navigation

### Process Overview
- [ ] Create 4-column grid (1 on mobile)
- [ ] Add 4 steps with numbers and descriptions
- [ ] Add CTA button to /build-process/

### Testimonials
- [ ] Insert GC Testimonial Slider v1 template
- [ ] Verify testimonials displaying
- [ ] Test carousel functionality

### Events Strip
- [ ] Insert GC Events Strip v1 template
- [ ] Verify conditional visibility working
- [ ] Test with gc_events_enabled toggle

### Social Feed
- [ ] Add section heading and Instagram handle
- [ ] Add Smash Balloon shortcode
- [ ] Configure feed display settings

### Final CTA
- [ ] Create section with Deep Brown background
- [ ] Add headline and body with ACF bindings
- [ ] Add estimate button with popup trigger
- [ ] Test popup opens correctly

### Final Review
- [ ] Preview on desktop, tablet, mobile
- [ ] Verify all ACF fields populated
- [ ] Check all links work
- [ ] Test estimate popup
- [ ] Verify header nav color switching works

---

## Data Entry Checklist

After building the page, enter this content in WordPress:

### Home Page ACF Fields
- [ ] Upload hero background image
- [ ] Enter hero headline
- [ ] Enter hero subheadline
- [ ] Set CTA button labels and links
- [ ] Enter intro headline
- [ ] Enter intro body copy
- [ ] Enter final CTA headline
- [ ] Enter final CTA body

### Global Options
- [ ] Add trust bar items (logo, label, URL for each)
- [ ] Select featured projects (3-6)
- [ ] Add testimonials (CPT or options repeater)
- [ ] Configure events (if enabled)
- [ ] Set Instagram URL

---

End of specification.
