# About Our Company Page Build Specification

Version: 1.0.0

Complete build instructions for the Grander Construction About Our Company page in Elementor. This page uses Layout Pattern B (Standard hero → Content blocks → Testimonials → CTA) with brand story focus.

---

## Page Overview

| Property | Value |
|----------|-------|
| Page Title | About our company |
| Slug | `/about/` |
| Template | Elementor Full Width |
| Layout Pattern | B |
| Nav Variant | Light (dark hero background) |

---

## ACF Field Group: About Page (gc_about)

Location: Page → About our company

| Field Name | Type | Description |
|------------|------|-------------|
| gc_about_hero_headline | text | Hero headline |
| gc_about_hero_subline | textarea | Hero supporting text |
| gc_about_hero_image | image | Hero background image |
| gc_about_story_headline | text | Micah story section headline |
| gc_about_story_content | wysiwyg | Micah story full content |
| gc_about_story_image | image | Micah portrait or work photo |
| gc_about_values_headline | text | Values section headline |
| gc_about_values | repeater | Company values list |
| gc_about_values__icon | text | Icon class or SVG (subfield) |
| gc_about_values__title | text | Value title (subfield) |
| gc_about_values__description | textarea | Value description (subfield) |
| gc_about_why_headline | text | Why Grander headline |
| gc_about_why_content | wysiwyg | Why choose Grander content |
| gc_about_why_image | image | Supporting image |
| gc_about_cta_headline | text | Final CTA headline |
| gc_about_cta_body | textarea | CTA supporting text |
| gc_about_cta_button_label | text | CTA button label |

---

## Section-by-Section Build Instructions

### Section 1: Hero

**Layout:** Full-bleed, 60vh height, image background with overlay

```
Section: .gc-hero .gc-hero--about
├── Settings:
│   - Height: Min Height 60vh
│   - Content Position: Center
│   - Overflow: Hidden
│   - Data attribute: data-hero="true" data-nav-variant="light"
│
├── Background:
│   - Type: Image
│   - Dynamic: gc_about_hero_image (ACF About Page)
│   - Size: Cover
│   - Position: Center Center
│   - Overlay: Linear gradient (rgba(26,26,26,0.5) to rgba(26,26,26,0.6))
│
└── Container (max-width: 800px, centered, text-center)
    │
    ├── Heading Widget: Primary Headline
    │   - Dynamic: gc_about_hero_headline
    │   - Content: "Crafted for the way you live"
    │   - H1, Baskerville, 52px desktop / 40px tablet / 32px mobile
    │   - Color: Warm White (#FDFBF8)
    │   - Margin bottom: 24px
    │
    └── Text Widget: Subheadline
        - Dynamic: gc_about_hero_subline
        - Content: "A home should reflect the personality of its owner and the life that happens inside it."
        - Style: 20px desktop / 18px tablet / 16px mobile, Corbel
        - Color: Warm White (90% opacity)
        - Max width: 600px, centered
```

#### Hero Content (Final Copy)

**Headline:** Crafted for the way you live

**Subline:** A home should reflect the personality of its owner and the life that happens inside it.

---

### Section 2: Micah Story

**Layout:** Two-column, image left / text right on desktop, stacked on mobile

```
Section: .gc-about-story
├── Settings:
│   - Padding: 96px top / 96px bottom (desktop)
│   - Padding: 64px top / 64px bottom (tablet/mobile)
│   - Background: Warm White (#FDFBF8)
│
└── Container (max-width: 1200px, centered)
    │
    └── Inner Container (display: flex, gap: 64px)
        │
        ├── Column Left (width: 45%)
        │   │
        │   └── Image Widget
        │       - Dynamic: gc_about_story_image
        │       - Size: Large
        │       - Border radius: 8px
        │       - Aspect ratio: 4:5 (portrait)
        │       - Object fit: Cover
        │
        └── Column Right (width: 55%)
            │
            ├── Heading Widget: Section Headline
            │   - Dynamic: gc_about_story_headline
            │   - Content: "Building with integrity since day one"
            │   - H2, Baskerville, 42px desktop / 32px tablet / 28px mobile
            │   - Color: Deep Brown (#4C2A19)
            │   - Margin bottom: 32px
            │
            └── Text Editor Widget: Story Content
                - Dynamic: gc_about_story_content
                - Content: [See below]
                - Style: 17px, line-height 1.8, Corbel
                - Color: Text (#333333)

Responsive:
├── Tablet (1024px): Gap 48px, maintain 2-column
└── Mobile (767px): Stack vertically, image first, gap 32px
```

#### Micah Story Content (Final Copy)

Founded by Micah Barney, Grander Construction was built on a passion for quality craftsmanship and a desire to bring proven Midwestern building standards and building science to the Upstate of South Carolina.

With a family background in the trades and a degree in construction management, Micah leads with integrity, faith, and a genuine care for the families the team serves. Every project begins with a conversation, not a sales pitch, because understanding how you live is the first step to building something that truly fits.

Grander Construction takes its name from the belief that homes should be more than shelter. They should elevate daily life, support the people inside them, and stand as lasting investments built to weather time, climate, and changing needs.

From custom homes to outdoor living spaces, every detail reflects a commitment to doing things the right way, even when no one is watching.

---

### Section 3: Company Values

**Layout:** Centered headline with value cards in grid below

```
Section: .gc-about-values
├── Settings:
│   - Padding: 96px top / 96px bottom (desktop)
│   - Padding: 64px top / 64px bottom (tablet/mobile)
│   - Background: Light (#FAFAF8)
│
└── Container (max-width: 1200px, centered)
    │
    ├── Heading Widget: Section Headline
    │   - Dynamic: gc_about_values_headline
    │   - Content: "What we stand for"
    │   - H2, Baskerville, 42px, centered
    │   - Color: Deep Brown (#4C2A19)
    │   - Margin bottom: 48px
    │
    └── Container: Values Grid
        - Display: Grid
        - Columns: 3 (desktop), 2 (tablet), 1 (mobile)
        - Gap: 32px
        │
        └── [Loop: gc_about_values repeater]
            │
            └── Container: Value Card (.gc-value-card)
                │
                ├── Icon Widget (optional)
                │   - Dynamic: gc_about_values__icon
                │   - Size: 48px
                │   - Color: Gold (#B08D66)
                │   - Margin bottom: 16px
                │
                ├── Heading Widget: Value Title
                │   - Dynamic: gc_about_values__title
                │   - H3, Baskerville, 24px
                │   - Color: Deep Brown (#4C2A19)
                │   - Margin bottom: 12px
                │
                └── Text Widget: Value Description
                    - Dynamic: gc_about_values__description
                    - Style: 15px, line-height 1.6
                    - Color: Text (#333333)
```

#### Values Content (Final Copy)

**Value 1: Integrity**
We do what we say we will do. Every estimate, timeline, and promise is honored because trust is the foundation of every project we build.

**Value 2: Craftsmanship**
Quality is never an accident. It comes from attention to detail, proven methods, and a refusal to cut corners even when no one is watching.

**Value 3: Purpose**
Every space we create serves the people who live in it. We design around your life, not the other way around.

**Value 4: Communication**
You will never wonder what is happening with your project. Clear, proactive updates keep you informed and confident from start to finish.

**Value 5: Lasting quality**
We build homes meant to stand for generations. Durable materials, smart building science, and thoughtful design protect your investment for the long term.

---

### Section 4: Why Grander

**Layout:** Two-column, text left / image right on desktop (opposite of story section)

```
Section: .gc-about-why
├── Settings:
│   - Padding: 96px top / 96px bottom (desktop)
│   - Padding: 64px top / 64px bottom (tablet/mobile)
│   - Background: Warm White (#FDFBF8)
│
└── Container (max-width: 1200px, centered)
    │
    └── Inner Container (display: flex, gap: 64px)
        │
        ├── Column Left (width: 55%)
        │   │
        │   ├── Heading Widget: Section Headline
        │   │   - Dynamic: gc_about_why_headline
        │   │   - Content: "Why families choose Grander"
        │   │   - H2, Baskerville, 42px desktop / 32px tablet / 28px mobile
        │   │   - Color: Deep Brown (#4C2A19)
        │   │   - Margin bottom: 32px
        │   │
        │   └── Text Editor Widget: Why Content
        │       - Dynamic: gc_about_why_content
        │       - Content: [See below]
        │       - Style: 17px, line-height 1.8
        │       - Color: Text (#333333)
        │
        └── Column Right (width: 45%)
            │
            └── Image Widget
                - Dynamic: gc_about_why_image
                - Size: Large
                - Border radius: 8px
                - Object fit: Cover

Responsive:
├── Tablet (1024px): Gap 48px, maintain 2-column
└── Mobile (767px): Stack vertically, text first, gap 32px
```

#### Why Grander Content (Final Copy)

Choosing a builder is one of the most important decisions you will make. At Grander Construction, we understand that this is not just a transaction. It is a partnership built on trust, expertise, and shared vision.

**Midwestern standards, Upstate roots.** Micah brought building practices from the Midwest, where harsh winters demand homes that perform. That same rigor applies to every project in the Upstate, delivering comfort and efficiency that most local builders overlook.

**Science meets craftsmanship.** We combine traditional carpentry skills with modern building science. Continuous air barriers, high performance insulation, and moisture management are standard, not upgrades.

**Transparent from day one.** You will receive detailed, itemized quotes, realistic timelines, and honest guidance. If something changes, you will know immediately and understand why.

**Your project, your priorities.** We listen before we build. Every home and outdoor space reflects the family inside it, not a cookie cutter template.

---

### Section 5: Testimonials

**Layout:** Insert global testimonial slider template

```
Section: .gc-about-testimonials
├── Settings:
│   - Padding: 96px top / 96px bottom (desktop)
│   - Padding: 64px top / 64px bottom (tablet/mobile)
│   - Background: Deep Brown (#4C2A19)
│
└── Container (max-width: 1200px, centered)
    │
    ├── Heading Widget: Section Headline
    │   - Content: "What our clients say"
    │   - H2, Baskerville, 42px, centered
    │   - Color: Warm White (#FDFBF8)
    │   - Margin bottom: 48px
    │
    └── [Insert Template: GC Testimonials Slider v1]
        - Query: testimonial CPT
        - Display: 3 visible, slider navigation
        - Style: Light text on dark background variant
```

---

### Section 6: Final CTA

**Layout:** Centered text with single CTA button

```
Section: .gc-about-cta
├── Settings:
│   - Padding: 96px top / 96px bottom (desktop)
│   - Padding: 64px top / 64px bottom (tablet/mobile)
│   - Background: Gold (#B08D66)
│
└── Container (max-width: 700px, centered, text-center)
    │
    ├── Heading Widget: CTA Headline
    │   - Dynamic: gc_about_cta_headline
    │   - Content: "Ready to build something meaningful?"
    │   - H2, Baskerville, 42px desktop / 32px tablet / 28px mobile
    │   - Color: Deep Brown (#4C2A19)
    │   - Margin bottom: 24px
    │
    ├── Text Widget: CTA Body
    │   - Dynamic: gc_about_cta_body
    │   - Content: "Let us show you what thoughtful design and quality construction can do for your family."
    │   - Style: 18px, line-height 1.6
    │   - Color: Deep Brown (90% opacity)
    │   - Margin bottom: 32px
    │
    └── Button Widget: Primary CTA
        - Dynamic: gc_about_cta_button_label
        - Content: "Request an estimate"
        - Class: gc-btn gc-btn--secondary gc-estimate-trigger
        - Attribute: data-gc-estimate-trigger
```

#### CTA Content (Final Copy)

**Headline:** Ready to build something meaningful?

**Body:** Let us show you what thoughtful design and quality construction can do for your family.

**Button:** Request an estimate

---

## CSS Classes Applied

| Section | Classes |
|---------|---------|
| Hero | `.gc-hero`, `.gc-hero--about` |
| Micah Story | `.gc-about-story` |
| Values | `.gc-about-values` |
| Value Card | `.gc-value-card` |
| Why Grander | `.gc-about-why` |
| Testimonials | `.gc-about-testimonials` |
| Final CTA | `.gc-about-cta` |

---

## Additional CSS

```css
/* ==========================================================================
   About Page - Story Section
   ========================================================================== */

.gc-about-story {
    background: var(--gc-warm-white);
}

.gc-about-story__inner {
    display: flex;
    gap: 64px;
    align-items: center;
}

.gc-about-story__image {
    flex: 0 0 45%;
}

.gc-about-story__image img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    aspect-ratio: 4 / 5;
    object-fit: cover;
}

.gc-about-story__content {
    flex: 1;
}

.gc-about-story__content h2 {
    font-family: var(--gc-font-heading);
    font-size: 42px;
    color: var(--gc-deep-brown);
    margin-bottom: 32px;
    line-height: 1.2;
}

.gc-about-story__content p {
    font-size: 17px;
    line-height: 1.8;
    color: var(--gc-text);
    margin-bottom: 24px;
}

.gc-about-story__content p:last-child {
    margin-bottom: 0;
}

@media (max-width: 1024px) {
    .gc-about-story__inner {
        gap: 48px;
    }

    .gc-about-story__content h2 {
        font-size: 32px;
    }
}

@media (max-width: 767px) {
    .gc-about-story__inner {
        flex-direction: column;
        gap: 32px;
    }

    .gc-about-story__image {
        flex: none;
        width: 100%;
    }

    .gc-about-story__content h2 {
        font-size: 28px;
    }
}

/* ==========================================================================
   About Page - Values Section
   ========================================================================== */

.gc-about-values {
    background: var(--gc-light);
}

.gc-about-values h2 {
    font-family: var(--gc-font-heading);
    font-size: 42px;
    color: var(--gc-deep-brown);
    text-align: center;
    margin-bottom: 48px;
}

.gc-values-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
}

@media (max-width: 1024px) {
    .gc-values-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .gc-about-values h2 {
        font-size: 32px;
    }
}

@media (max-width: 767px) {
    .gc-values-grid {
        grid-template-columns: 1fr;
    }

    .gc-about-values h2 {
        font-size: 28px;
        margin-bottom: 32px;
    }
}

.gc-value-card {
    background: #FFFFFF;
    padding: 32px;
    border-radius: 8px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gc-value-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.gc-value-card__icon {
    font-size: 48px;
    color: var(--gc-gold);
    margin-bottom: 16px;
}

.gc-value-card__icon svg {
    width: 48px;
    height: 48px;
}

.gc-value-card h3 {
    font-family: var(--gc-font-heading);
    font-size: 24px;
    color: var(--gc-deep-brown);
    margin-bottom: 12px;
}

.gc-value-card p {
    font-size: 15px;
    line-height: 1.6;
    color: var(--gc-text);
    margin: 0;
}

/* ==========================================================================
   About Page - Why Grander Section
   ========================================================================== */

.gc-about-why {
    background: var(--gc-warm-white);
}

.gc-about-why__inner {
    display: flex;
    gap: 64px;
    align-items: center;
}

.gc-about-why__content {
    flex: 1;
}

.gc-about-why__content h2 {
    font-family: var(--gc-font-heading);
    font-size: 42px;
    color: var(--gc-deep-brown);
    margin-bottom: 32px;
    line-height: 1.2;
}

.gc-about-why__content p {
    font-size: 17px;
    line-height: 1.8;
    color: var(--gc-text);
    margin-bottom: 24px;
}

.gc-about-why__content p:last-child {
    margin-bottom: 0;
}

.gc-about-why__content strong {
    color: var(--gc-deep-brown);
}

.gc-about-why__image {
    flex: 0 0 45%;
}

.gc-about-why__image img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    object-fit: cover;
}

@media (max-width: 1024px) {
    .gc-about-why__inner {
        gap: 48px;
    }

    .gc-about-why__content h2 {
        font-size: 32px;
    }
}

@media (max-width: 767px) {
    .gc-about-why__inner {
        flex-direction: column;
        gap: 32px;
    }

    .gc-about-why__image {
        flex: none;
        width: 100%;
        order: 2;
    }

    .gc-about-why__content {
        order: 1;
    }

    .gc-about-why__content h2 {
        font-size: 28px;
    }
}

/* ==========================================================================
   About Page - Testimonials Section
   ========================================================================== */

.gc-about-testimonials {
    background: var(--gc-deep-brown);
}

.gc-about-testimonials h2 {
    font-family: var(--gc-font-heading);
    font-size: 42px;
    color: var(--gc-warm-white);
    text-align: center;
    margin-bottom: 48px;
}

@media (max-width: 767px) {
    .gc-about-testimonials h2 {
        font-size: 28px;
        margin-bottom: 32px;
    }
}

/* ==========================================================================
   About Page - CTA Section
   ========================================================================== */

.gc-about-cta {
    background: var(--gc-gold);
    text-align: center;
}

.gc-about-cta h2 {
    font-family: var(--gc-font-heading);
    font-size: 42px;
    color: var(--gc-deep-brown);
    margin-bottom: 24px;
    line-height: 1.2;
}

.gc-about-cta p {
    font-size: 18px;
    line-height: 1.6;
    color: rgba(76, 42, 25, 0.9);
    max-width: 600px;
    margin: 0 auto 32px;
}

@media (max-width: 767px) {
    .gc-about-cta h2 {
        font-size: 28px;
    }

    .gc-about-cta p {
        font-size: 16px;
    }
}
```

---

## Responsive Behavior Summary

### Desktop (1025px+)
- Hero: 60vh height, centered content
- Story: Two-column (45% image / 55% text), 64px gap
- Values: 3-column grid, 32px gap
- Why Grander: Two-column (55% text / 45% image), 64px gap
- All sections: 96px vertical padding

### Tablet (768px - 1024px)
- Hero: 60vh height maintained
- Story: Two-column maintained, 48px gap
- Values: 2-column grid
- Why Grander: Two-column maintained, 48px gap
- All sections: 64px vertical padding
- Typography scales down one step

### Mobile (767px and below)
- Hero: Min-height 50vh
- Story: Single column, stacked (image first)
- Values: Single column grid
- Why Grander: Single column, stacked (text first, image second)
- All sections: 64px vertical padding, 16px horizontal
- Typography scales to mobile sizes

---

## ACF Bindings Summary

| Widget | Field Name | Field Group |
|--------|------------|-------------|
| Hero headline | gc_about_hero_headline | gc_about |
| Hero subline | gc_about_hero_subline | gc_about |
| Hero background | gc_about_hero_image | gc_about |
| Story headline | gc_about_story_headline | gc_about |
| Story content | gc_about_story_content | gc_about |
| Story image | gc_about_story_image | gc_about |
| Values headline | gc_about_values_headline | gc_about |
| Values repeater | gc_about_values | gc_about |
| Why headline | gc_about_why_headline | gc_about |
| Why content | gc_about_why_content | gc_about |
| Why image | gc_about_why_image | gc_about |
| CTA headline | gc_about_cta_headline | gc_about |
| CTA body | gc_about_cta_body | gc_about |
| CTA button | gc_about_cta_button_label | gc_about |

---

## Templates Inserted

| Section | Template |
|---------|----------|
| Testimonials | GC Testimonials Slider v1 |

---

## Completion Checklist

- [ ] Hero section with dynamic background and text
- [ ] Micah story section with image and full copy
- [ ] Values section with 5 value cards
- [ ] Why Grander section with formatted content
- [ ] Testimonials slider inserted
- [ ] Final CTA with estimate lightbox trigger
- [ ] All ACF fields connected
- [ ] Responsive behavior verified at all breakpoints
- [ ] CSS added to grander-core.css
- [ ] Nav variant set to light for hero overlay
- [ ] Data attributes added for JS targeting

---

## Notes for Implementation

1. **Hero Image:** Use a wide landscape photo of a completed Grander home or the team at work. Dark enough to support light text overlay, or rely on the gradient overlay.

2. **Story Image:** Ideally a professional portrait of Micah, or a candid shot of him on site. If unavailable, use a representative project photo.

3. **Why Grander Image:** Choose a detail shot showing quality craftsmanship (trim work, framing detail, or finished interior).

4. **Testimonials:** The slider pulls from the testimonial CPT. On this page, show general testimonials (not filtered by service category).

5. **CTA Button:** Uses `gc-estimate-trigger` class and `data-gc-estimate-trigger` attribute to open the global estimate lightbox.

---

End of About Our Company Page Build Specification.
