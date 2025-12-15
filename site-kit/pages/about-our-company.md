# About Our Company Page Specification

**Slug:** `/about/`
**Template:** Elementor Full Width
**Layout Pattern:** B (Hero → Content → Values → CTA)

---

## Overview

The About page tells the Grander Construction story, introducing the company's history, mission, values, and commitment to quality. It builds trust and establishes the brand voice.

---

## Section-by-Section Specification

### Section 1: Hero

**Class:** `.gc-hero .gc-hero--short`
**Height:** 45vh min

```
Container Tree:
Section: .gc-hero--about
├── Height: 45vh min
├── Background:
│   ├── Image Placeholder: Team working on site or completed project
│   ├── Size: Cover
│   └── Overlay: gradient
├── Data: data-hero="true" data-nav-variant="light"
│
└── Container: (max-width: 800px, centered, text-center)
    │
    ├── Heading Widget: H1
    │   ├── Text: "Built on Integrity"
    │   ├── Font: Libre Baskerville, 52px/40px/32px
    │   ├── Color: #FDFBF8
    │   └── Margin Bottom: 20px
    │
    └── Text Widget: Subheadline
        ├── Text: "A family-owned builder committed to exceptional craftsmanship and lasting relationships"
        ├── Font: Corbel, 18px
        └── Color: rgba(253,251,248,0.9)
```

---

### Section 2: Our Story

**Class:** `.gc-about-story`
**Background:** White
**Padding:** 100px 24px

```
Container Tree:
Section: .gc-about-story
├── Background: #FFFFFF
│
└── Container: (max-width: 1100px, centered)
    └── Grid: 2 columns (55% text / 45% image), gap: 64px
        │
        ├── Column 1: Content
        │   ├── Subhead: "Our Story"
        │   │   └── Class: gc-subhead (gold, uppercase, 14px)
        │   │
        │   ├── Heading: H2
        │   │   ├── Text: "More than builders—we're partners in your vision"
        │   │   ├── Font: Libre Baskerville, 36px
        │   │   └── Margin Bottom: 24px
        │   │
        │   └── Text Widget: Story Copy
        │       ├── Copy:
        │       │   "Grander Construction was founded on a simple belief: that building a home should be a partnership, not just a transaction.
        │       │
        │       │   For over two decades, we've been crafting custom homes, outdoor living spaces, and thoughtful additions throughout the Upstate. What started as a small operation has grown into a trusted name in the community—but our approach hasn't changed.
        │       │
        │       │   We still answer our own phones. We still walk every job site. And we still treat every project like it's our own home on the line.
        │       │
        │       │   Our Midwestern roots taught us the value of honest work and straight talk. We bring those values to every conversation, every estimate, and every nail we drive."
        │       ├── Font: Corbel, 17px, line-height: 1.8
        │       └── Color: #333333
        │
        └── Column 2: Image
            └── Image Placeholder: Micah on a job site or team photo
                ├── Border Radius: 8px
                └── Shadow: 0 12px 24px rgba(0,0,0,0.1)
```

---

### Section 3: Mission Statement

**Class:** `.gc-about-mission`
**Background:** Warm White
**Padding:** 80px 24px

```
Container Tree:
Section: .gc-about-mission
├── Background: #F5F3F0
│
└── Container: (max-width: 900px, centered, text-center)
    │
    ├── Icon Widget: Quote icon or decorative element
    │   ├── Color: #B08D66
    │   └── Size: 48px
    │
    └── Text Widget: Mission
        ├── Copy: "We build homes that stand the test of time, relationships that last even longer, and a reputation earned one project at a time."
        ├── Font: Libre Baskerville, 28px, italic
        ├── Color: #4C2A19
        └── Line Height: 1.5
```

---

### Section 4: Our Values

**Class:** `.gc-about-values`
**Background:** White
**Padding:** 100px 24px

```
Container Tree:
Section: .gc-about-values
├── Background: #FFFFFF
│
└── Container: (max-width: 1200px, centered)
    │
    ├── Heading: "What We Stand For"
    │   └── Alignment: Center, Margin Bottom: 48px
    │
    └── Grid: 3 columns (desktop) / 1 (mobile), gap: 40px
        │
        ├── Value 1: Integrity
        │   ├── Icon: Shield or checkmark
        │   │   └── Color: #B08D66, Size: 48px
        │   ├── Title: "Integrity"
        │   └── Description: "We say what we mean, do what we say, and build what we promise. No surprises, no shortcuts, no excuses."
        │
        ├── Value 2: Craftsmanship
        │   ├── Icon: Tools or hammer
        │   ├── Title: "Craftsmanship"
        │   └── Description: "Every joint, every finish, every detail matters. We take pride in work that will stand for generations."
        │
        ├── Value 3: Partnership
        │   ├── Icon: Handshake or people
        │   ├── Title: "Partnership"
        │   └── Description: "Your project is a collaboration. We listen, we communicate, and we make decisions together."
        │
        ├── Value 4: Quality
        │   ├── Icon: Star or award
        │   ├── Title: "Quality"
        │   └── Description: "From materials to methods, we choose what lasts. Quality isn't a premium—it's our standard."
        │
        ├── Value 5: Transparency
        │   ├── Icon: Eye or document
        │   ├── Title: "Transparency"
        │   └── Description: "Clear communication, honest estimates, and no hidden costs. You'll always know where your project stands."
        │
        └── Value 6: Community
            ├── Icon: Home or heart
            ├── Title: "Community"
            └── Description: "We live here too. Every home we build makes our community stronger and more beautiful."
```

---

### Section 5: Team Teaser

**Class:** `.gc-about-team-teaser`
**Background:** Warm White
**Padding:** 80px 24px

```
Container Tree:
Section: .gc-about-team-teaser
├── Background: #F5F3F0
│
└── Container: (max-width: 1000px, centered, text-center)
    │
    ├── Heading: "Meet the People Behind Every Project"
    │   └── Margin Bottom: 20px
    │
    ├── Text: "Our team brings decades of combined experience in custom construction, design, and project management."
    │   └── Margin Bottom: 32px
    │
    └── Button: "Meet Our Team" → /our-team/
        └── Class: gc-btn gc-btn--primary
```

---

### Section 6: Credentials

**Class:** `.gc-about-credentials`
**Background:** White
**Padding:** 80px 24px

```
Container Tree:
Section: .gc-about-credentials
├── Background: #FFFFFF
│
└── Container: (max-width: 1000px, centered)
    │
    ├── Heading: "Licensed, Insured, Trusted"
    │   └── Alignment: Center
    │
    └── Grid: Credential badges/logos (flex, centered, gap: 48px)
        ├── HBA Member badge
        ├── BBB Accredited badge
        ├── SC Licensed Contractor badge
        └── Fully Insured badge
```

---

### Section 7: CTA

**Class:** `.gc-about-cta`
**Background:** Deep Brown
**Padding:** 100px 24px

```
Container Tree:
Section: .gc-about-cta
├── Background: #4C2A19
│
└── Container: (max-width: 800px, centered, text-center)
    │
    ├── Heading: "Ready to Start Your Project?"
    │   ├── Font: Libre Baskerville, 42px
    │   └── Color: #FDFBF8
    │
    ├── Text: "Let's discuss your vision and explore how we can bring it to life."
    │   └── Color: rgba(253,251,248,0.8)
    │
    └── Button: "Request an Estimate"
        ├── Class: gc-btn gc-btn--primary gc-estimate-trigger
        └── Data: data-gc-estimate-trigger="true"
```

---

## Copy Summary

| Section | Headline |
|---------|----------|
| Hero | "Built on Integrity" |
| Story | "More than builders—we're partners in your vision" |
| Mission | Quote about building homes and relationships |
| Values | "What We Stand For" |
| Team Teaser | "Meet the People Behind Every Project" |
| Credentials | "Licensed, Insured, Trusted" |
| CTA | "Ready to Start Your Project?" |

---

## Internal Links

| Element | Destination |
|---------|-------------|
| Team CTA | /our-team/ |
| Footer CTA | Lightbox (fallback: /request-an-estimate/) |

---

## Image Placeholders

1. **Hero:** Team photo or completed project exterior
2. **Story:** Micah/founder on job site, candid work photo
3. **Value Icons:** Simple line icons in gold color

---

## Implementation Checklist

- [ ] Create About page at /about/
- [ ] Build hero with short height
- [ ] Build two-column story section
- [ ] Add mission statement quote section
- [ ] Build values grid (6 values)
- [ ] Add team teaser section
- [ ] Add credentials section
- [ ] Build final CTA
- [ ] Test responsive
- [ ] Verify all links

---

End of About page specification.
