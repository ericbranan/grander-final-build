# Home Page Specification

**Slug:** `/` (Front Page)
**Template:** Elementor Full Width
**Layout Pattern:** A (Full-bleed hero → Trust bar → Content → CTA)
**Nav Variant:** Light (dark hero background)

---

## Overview

The Home page serves as the primary landing experience for Grander Construction, showcasing the brand promise, service offerings, build process, testimonials, and a strong call-to-action for estimate requests.

---

## Section-by-Section Specification

### Section 1: Hero

**Class:** `.gc-hero`
**Height:** 100vh (Fit to Screen)
**Background:** Image/Video with overlay

```
Container Tree:
Section: .gc-hero
├── Height: 100vh
├── Background:
│   ├── Type: Image (or Video)
│   ├── Dynamic: gc_home_hero_image (ACF)
│   ├── Size: Cover
│   ├── Position: Center
│   └── Overlay: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5))
├── Data Attributes: data-hero="true" data-nav-variant="light"
│
└── Container: (max-width: 800px, centered, text-center)
    │
    ├── Heading Widget: H1
    │   ├── Dynamic: gc_home_hero_headline
    │   ├── Default: "Building the Upstate's finest homes"
    │   ├── Font: Libre Baskerville, 56px/42px/36px, 700
    │   ├── Color: #FDFBF8
    │   └── Margin Bottom: 24px
    │
    ├── Text Widget: Subheadline
    │   ├── Dynamic: gc_home_hero_subheadline
    │   ├── Default: "Custom homes, outdoor spaces, and additions crafted with integrity"
    │   ├── Font: Corbel, 20px, rgba(253,251,248,0.9)
    │   ├── Max Width: 600px
    │   └── Margin Bottom: 32px
    │
    └── Container: CTA Buttons (flex, gap: 16px, centered)
        ├── Button: Primary CTA
        │   ├── Text: "Request an Estimate"
        │   ├── Class: gc-btn gc-btn--primary gc-estimate-trigger
        │   ├── Link Fallback: /request-an-estimate/
        │   └── Data: data-gc-estimate-trigger="true"
        │
        └── Button: Secondary CTA
            ├── Text: "View Our Work"
            ├── Link: /gallery/
            └── Class: gc-btn gc-btn--secondary-light
```

**Image Placeholder:** Hero background should depict a stunning Grander-built custom home exterior, possibly at golden hour, showing quality craftsmanship and architectural detail.

---

### Section 2: Trust Bar

**Class:** `.gc-trust-bar`
**Background:** Warm White (#FDFBF8)
**Padding:** 24px

```
Container Tree:
Section: .gc-trust-bar
├── Background: #FDFBF8
├── Padding: 24px
│
└── Container: (max-width: 1200px, centered)
    └── Trust Bar Items (Flex, justify: center, gap: 48px, wrap)
        ├── Item: HBA Logo + "HBA Member"
        ├── Item: BBB Logo + "BBB Accredited"
        ├── Item: Shield Icon + "Licensed & Insured"
        └── Item: Star Icon + "20+ Years Experience"
```

---

### Section 3: Introduction

**Class:** `.gc-home-intro`
**Background:** White
**Padding:** 100px/80px/60px

```
Container Tree:
Section: .gc-home-intro
├── Background: #FFFFFF
├── Padding: 100px 24px
│
└── Container: (max-width: 800px, centered, text-center)
    │
    ├── Heading Widget: H2
    │   ├── Dynamic: gc_home_intro_headline
    │   ├── Default: "Crafting spaces that feel like home"
    │   ├── Font: Libre Baskerville, 42px, 700
    │   ├── Color: #4C2A19
    │   └── Margin Bottom: 24px
    │
    └── Text Widget: Body
        ├── Dynamic: gc_home_intro_body
        ├── Default: "For over two decades, Grander Construction has been building custom homes, outdoor living spaces, and thoughtful additions throughout the Upstate. We believe in doing things right—with quality materials, skilled craftsmanship, and the kind of personal attention that makes every project feel like a partnership."
        ├── Font: Corbel, 18px, line-height: 1.8
        ├── Color: #333333
        └── Max Width: 700px
```

---

### Section 4: Service Cards

**Class:** `.gc-service-cards-v1`
**Background:** Warm White (#F5F3F0)
**Padding:** 100px 24px

```
Container Tree:
Section: .gc-service-cards-v1
├── Background: #F5F3F0
│
└── Container: (max-width: 1200px, centered)
    │
    ├── Heading Widget: H2
    │   ├── Text: "Expert Offerings"
    │   ├── Alignment: Center
    │   └── Margin Bottom: 48px
    │
    └── Container: Card Grid (2x2, gap: 24px)
        │
        ├── Card 1: Custom Homes
        │   ├── Image Placeholder: Custom home exterior
        │   ├── Title: "Custom Homes"
        │   ├── Summary: "Thoughtfully designed homes that balance timeless style, modern comfort, and high-performance details."
        │   ├── Button: "Explore" → /custom-homes/
        │   └── Class: gc-service-card
        │
        ├── Card 2: Outdoor Spaces
        │   ├── Image Placeholder: Covered patio or outdoor living area
        │   ├── Title: "Outdoor Spaces"
        │   ├── Summary: "Porches, patios, coverings, decks, and pavilions that extend how you live outside with year-round comfort."
        │   └── Button: "Explore" → /outdoor-spaces/
        │
        ├── Card 3: Pool Houses, Garages & ADUs
        │   ├── Image Placeholder: Pool house or detached garage
        │   ├── Title: "Pool Houses, Garages & ADUs"
        │   ├── Summary: "Multi-purpose structures that add function, storage, and flexible living space without compromising aesthetics."
        │   └── Button: "Explore" → /pool-houses-garages-adus/
        │
        └── Card 4: Sunrooms & Additions
            ├── Image Placeholder: Sunroom interior with natural light
            ├── Title: "Sunrooms & Additions"
            ├── Summary: "Light-filled expansions that connect your existing home to new possibilities in comfort and layout."
            └── Button: "Explore" → /sunrooms-additions/
```

---

### Section 5: Featured Projects

**Class:** `.gc-featured-projects-v1`
**Background:** White
**Template:** Insert GC Featured Projects v1 template

```
Container Tree:
Section: .gc-featured-projects-v1
├── Background: #FFFFFF
├── Padding: 100px 24px
│
└── [Insert Template: GC Featured Projects v1]
    └── Data Source: gc_featured_projects (ACF Options - Relationship)
```

---

### Section 6: Build Process Overview

**Class:** `.gc-process-overview-v1`
**Background:** Warm White
**Padding:** 100px 24px

```
Container Tree:
Section: .gc-process-overview-v1
├── Background: #F5F3F0
│
└── Container: (max-width: 1200px, centered)
    │
    ├── Container: Header (text-center, margin-bottom: 48px)
    │   ├── Heading: "Our Build Process"
    │   └── Subtext: "A clear path from concept to completion"
    │
    ├── Container: Steps Grid (4 columns / 2 tablet / 1 mobile, gap: 32px)
    │   │
    │   ├── Step 1:
    │   │   ├── Number: "01"
    │   │   ├── Label: "Discovery"
    │   │   └── Description: "We learn about your vision, needs, and budget through an initial consultation."
    │   │
    │   ├── Step 2:
    │   │   ├── Number: "02"
    │   │   ├── Label: "Design"
    │   │   └── Description: "Our team develops detailed plans that bring your ideas to life."
    │   │
    │   ├── Step 3:
    │   │   ├── Number: "03"
    │   │   ├── Label: "Build"
    │   │   └── Description: "Expert craftsmen execute your project with quality and precision."
    │   │
    │   └── Step 4:
    │       ├── Number: "04"
    │       ├── Label: "Complete"
    │       └── Description: "We walk through every detail to ensure your complete satisfaction."
    │
    └── Container: CTA (text-center, margin-top: 48px)
        └── Button: "Learn About Our Process" → /build-process/
            └── Class: gc-btn gc-btn--primary
```

---

### Section 7: Testimonials

**Class:** `.gc-testimonials-v1`
**Background:** White
**Template:** Insert GC Testimonial Slider v1

```
Container Tree:
Section: .gc-testimonials-v1
├── Background: #FFFFFF
├── Padding: 100px 24px
│
└── [Insert Template: GC Testimonial Slider v1]
    └── Data Source: Testimonial CPT or gc_testimonials (Options)
```

---

### Section 8: Social Feed

**Class:** `.gc-social-feed-v1`
**Background:** Warm White
**Padding:** 80px 24px

```
Container Tree:
Section: .gc-social-feed-v1
├── Background: #F5F3F0
│
└── Container: (max-width: 1200px, centered)
    │
    ├── Heading: "Follow Along"
    │   └── Alignment: Center
    │
    ├── Text: "@granderconstruction"
    │   ├── Link: gc_social_instagram_url
    │   ├── Color: #B08D66
    │   └── Margin Bottom: 48px
    │
    └── Shortcode Widget:
        └── [instagram-feed feed=1]
```

---

### Section 9: Final CTA

**Class:** `.gc-home-final-cta`
**Background:** Deep Brown (#4C2A19)
**Padding:** 100px 24px

```
Container Tree:
Section: .gc-home-final-cta
├── Background: #4C2A19
│
└── Container: (max-width: 800px, centered, text-center)
    │
    ├── Heading Widget: H2
    │   ├── Dynamic: gc_home_cta_headline
    │   ├── Default: "Ready to build something exceptional?"
    │   ├── Font: Libre Baskerville, 42px, 700
    │   ├── Color: #FDFBF8
    │   └── Margin Bottom: 24px
    │
    ├── Text Widget:
    │   ├── Dynamic: gc_home_cta_body
    │   ├── Default: "Let's discuss your project and explore how we can bring your vision to life."
    │   ├── Font: Corbel, 18px
    │   ├── Color: rgba(253,251,248,0.8)
    │   └── Margin Bottom: 32px
    │
    └── Button Widget:
        ├── Text: "Request an Estimate"
        ├── Class: gc-btn gc-btn--primary gc-estimate-trigger
        ├── Link Fallback: /request-an-estimate/
        └── Data: data-gc-estimate-trigger="true"
```

---

## ACF Fields Summary

| Field | Type | Default |
|-------|------|---------|
| `gc_home_hero_image` | Image | Required |
| `gc_home_hero_headline` | Text | "Building the Upstate's finest homes" |
| `gc_home_hero_subheadline` | Textarea | "Custom homes, outdoor spaces..." |
| `gc_home_intro_headline` | Text | "Crafting spaces that feel like home" |
| `gc_home_intro_body` | Wysiwyg | [Intro copy] |
| `gc_home_cta_headline` | Text | "Ready to build something exceptional?" |
| `gc_home_cta_body` | Textarea | "Let's discuss your project..." |

---

## Internal Links

| Element | Destination |
|---------|-------------|
| Hero CTA Primary | Lightbox (fallback: /request-an-estimate/) |
| Hero CTA Secondary | /gallery/ |
| Service Card 1 | /custom-homes/ |
| Service Card 2 | /outdoor-spaces/ |
| Service Card 3 | /pool-houses-garages-adus/ |
| Service Card 4 | /sunrooms-additions/ |
| Process CTA | /build-process/ |
| Final CTA | Lightbox (fallback: /request-an-estimate/) |

---

## Implementation Checklist

- [ ] Create Home page in WordPress
- [ ] Set as Front Page
- [ ] Build Hero section with ACF bindings
- [ ] Add Trust Bar
- [ ] Build Introduction section
- [ ] Build Service Cards grid (2x2)
- [ ] Insert Featured Projects template
- [ ] Build Process Overview section
- [ ] Insert Testimonials template
- [ ] Add Social Feed section
- [ ] Build Final CTA section
- [ ] Verify all lightbox triggers work
- [ ] Test responsive at all breakpoints
- [ ] Enter ACF content

---

End of home page specification.
