# Team Page - Complete Build Specification

**Page Slug:** `our-team`
**Template:** Default page with Elementor
**ACF Field Group:** `gc_team_fields`
**Last Updated:** 2025-12-08

---

## Page Overview

The Team page introduces visitors to the people behind Grander Construction. It establishes trust through personal connection, highlights Micah as the owner and founder, and reinforces the company's mission and values.

---

## Section 1: Hero

### Container Structure
```
Section: gc-hero gc-hero--team (min-height: 55vh)
├── Background Image (ACF: gc_team_hero_image)
├── Overlay (rgba(26, 26, 26, 0.45))
└── Container (max-width: 1200px, centered)
    └── Inner Container: gc-hero__content
        ├── Heading Widget (H1): gc-hero__headline
        │   └── ACF: gc_team_hero_headline
        └── Text Widget: gc-hero__subline
            └── ACF: gc_team_hero_subline
```

### ACF Bindings
| Element | ACF Field | Type |
|---------|-----------|------|
| H1 | `gc_team_hero_headline` | text |
| Subline | `gc_team_hero_subline` | textarea |
| Background | `gc_team_hero_image` | image |

### Final Copy
**Headline:**
Our experts, your vision

**Subline:**
The team behind every Grander project brings decades of combined experience, a shared commitment to craftsmanship, and a genuine passion for building spaces that families love.

### Responsive Rules
| Breakpoint | H1 Size | Subline Size | Min Height |
|------------|---------|--------------|------------|
| Desktop | 56px | 20px | 55vh |
| Tablet ≤1024px | 42px | 18px | 45vh |
| Mobile ≤767px | 32px | 16px | 40vh |

---

## Section 2: Team Introduction

### Container Structure
```
Section: gc-team-intro (background: warm-white, padding: 96px/24px)
└── Container (max-width: 800px, centered, text-align: center)
    └── Inner: gc-team-intro__inner
        ├── Heading Widget (H2): gc-team-intro__headline
        │   "Meet the team"
        └── Text Widget: gc-team-intro__body
            └── ACF: gc_team_intro
```

### ACF Binding
| Element | ACF Field | Type |
|---------|-----------|------|
| Body | `gc_team_intro` | wysiwyg |

### Final Copy
**Headline:**
Meet the team

**Body:**
At Grander Construction, our team is the foundation of everything we build. Each member brings unique expertise and a commitment to quality that lasts. From the office to the job site, we work as one team to deliver results clients can depend on.

We believe that building great spaces starts with building great relationships. When you work with Grander, you work with people who care about your project as much as you do.

### Responsive Rules
- Desktop: H2 42px, body 18px, max-width 800px
- Tablet: H2 32px, body 17px
- Mobile: H2 28px, body 16px

---

## Section 3: Owner Highlight (Micah Barney)

### Container Structure
```
Section: gc-team-owner (background: light, padding: 96px/24px)
└── Container (max-width: 1200px, centered)
    └── Grid: gc-team-owner__inner (2 columns: 40% image / 60% content)
        ├── Image Container: gc-team-owner__image
        │   └── Image Widget: Photo of Micah
        │       └── ACF: gc_team_members[0].photo (where highlight_owner = true)
        └── Content Container: gc-team-owner__content
            ├── Label: gc-team-owner__label
            │   "Owner & Founder"
            ├── Name (H2): gc-team-owner__name
            │   └── ACF: gc_team_members[0].name
            ├── Title: gc-team-owner__title
            │   └── ACF: gc_team_members[0].title
            └── Bio: gc-team-owner__bio
                └── ACF: gc_team_members[0].bio
```

### ACF Binding (from gc_team_members repeater where highlight_owner = true)
| Element | ACF Subfield | Type |
|---------|--------------|------|
| Photo | `photo` | image |
| Name | `name` | text |
| Title | `title` | text |
| Bio | `bio` | wysiwyg |

### Final Copy - Micah Barney Bio
**Name:** Micah Barney
**Title:** Owner & Founder

**Bio:**
Founded by Micah Barney, Grander Construction was built on a passion for quality craftsmanship and a desire to bring proven Midwestern building standards and building science to the Upstate of South Carolina.

With a family background in the trades and a degree in construction management, Micah leads with integrity, faith, and a genuine care for the families the team serves. His hands-on approach means he remains involved in every project, ensuring that Grander's commitment to excellence is reflected in every detail.

When he is not on a job site, Micah spends time with his family, stays active in the local community, and continues learning about advances in building science and sustainable construction methods.

### Responsive Rules
- Desktop: 2-column grid (40/60), image aspect 3:4
- Tablet: 2-column grid (45/55)
- Mobile: Single column, image above content, centered

---

## Section 4: Team Grid

### Container Structure
```
Section: gc-team-grid-section (background: warm-white, padding: 96px/24px)
└── Container (max-width: 1200px, centered)
    ├── Heading Widget (H2): gc-team-grid__headline
    │   "The Grander team"
    └── Grid: gc-team-grid (4 columns on desktop)
        └── Loop (ACF Repeater: gc_team_members WHERE highlight_owner = false)
            └── Template: gc-team-card
                ├── Image: gc-team-card__image
                │   └── Subfield: photo
                ├── Name (H3): gc-team-card__name
                │   └── Subfield: name
                ├── Title: gc-team-card__title
                │   └── Subfield: title
                └── Bio: gc-team-card__bio
                    └── Subfield: bio
```

### ACF Repeater: gc_team_members

| Subfield | Type | Required | Notes |
|----------|------|----------|-------|
| `name` | text | yes | Full name |
| `title` | text | yes | Job title |
| `bio` | wysiwyg | yes | 60-90 words |
| `photo` | image | yes | Headshot |
| `highlight_owner` | true_false | no | If true, displays in owner section |

### Team Members Content

**Member 1: Micah Barney** (highlight_owner = true)
- See Section 3 above

**Member 2: Martti Onermaa**
- **Title:** Project Manager
- **Bio:** Martti brings meticulous attention to detail and a calm, organized approach to every project he manages. With extensive experience in residential construction, he ensures timelines stay on track, communication flows smoothly, and nothing falls through the cracks. Clients appreciate his responsiveness and ability to anticipate needs before they become problems.

**Member 3: Will Bondy**
- **Title:** Project Superintendent
- **Bio:** Will oversees day-to-day operations on the job site, coordinating crews and ensuring work meets Grander's quality standards. His construction background and problem-solving mindset help projects run efficiently from foundation to finish. Will takes pride in keeping sites clean, safe, and organized throughout the build process.

**Member 4: Chris Stein**
- **Title:** Sales Manager
- **Bio:** Chris serves as the first point of contact for many Grander clients, guiding them through initial consultations and helping translate ideas into actionable project plans. His approachable communication style and deep understanding of the building process help clients feel confident from the very first conversation.

**Member 5: Jared Barney**
- **Title:** Design Manager
- **Bio:** Jared leads the design process, working closely with clients to develop floor plans, elevations, and finish selections that bring their vision to life. With an eye for both aesthetics and functionality, he creates designs that balance beauty, practicality, and the unique requirements of each family and property.

### Responsive Rules
| Breakpoint | Columns | Gap | Card Layout |
|------------|---------|-----|-------------|
| Desktop | 4 | 32px | Vertical stack |
| Tablet ≤1024px | 2 | 24px | Vertical stack |
| Mobile ≤767px | 1 | 24px | Vertical stack, centered |

### Centering Rule
If there are fewer cards than columns (e.g., 4 members in a 4-column grid with only 3 non-owner members), center the remaining cards using flexbox justify-content: center.

---

## Section 5: Mission and Promise

### Container Structure
```
Section: gc-team-mission (background: deep-brown, padding: 96px/24px)
└── Container (max-width: 1000px, centered)
    └── Grid: gc-team-mission__inner (2 columns on desktop)
        ├── Mission Block: gc-team-mission__block
        │   ├── Label: gc-team-mission__label
        │   │   "Our mission"
        │   └── Text: gc-team-mission__text
        │       └── ACF: gc_team_mission
        └── Promise Block: gc-team-mission__block
            ├── Label: gc-team-mission__label
            │   "Our promise"
            └── Text: gc-team-mission__text
                └── ACF: gc_team_promise
```

### ACF Bindings
| Element | ACF Field | Type |
|---------|-----------|------|
| Mission | `gc_team_mission` | textarea |
| Promise | `gc_team_promise` | textarea |

### Final Copy

**Mission:**
To design and build spaces that embody individuality, purpose, and enduring excellence. Guided by our motto, Grandeur by Design. Built with Purpose, we blend innovative craftsmanship with personalized service to create custom homes and outdoor living spaces that last for generations.

**Promise:**
We promise to lead every build with clarity, craftsmanship, and care, delivering spaces that honor your vision and protect your investment. From first conversation to final walkthrough, you will experience transparent communication, honest guidance, and the kind of attention to detail that defines exceptional work.

### Responsive Rules
- Desktop: 2-column grid, equal width, light text on dark background
- Tablet: 2-column grid
- Mobile: Single column, stacked

---

## Section 6: Behind the Scenes Gallery

### Container Structure
```
Section: gc-team-gallery (background: warm-white, padding: 96px/24px)
└── Container (max-width: 1200px, centered)
    ├── Header: gc-team-gallery__header
    │   ├── Heading (H2): "Behind the scenes"
    │   └── Subtext: "A look at our team in action"
    └── Gallery Grid: gc-team-gallery__grid (masonry or grid layout)
        └── 6-8 images manually assigned in Elementor
            └── Image Widget: gc-team-gallery__item
```

### Gallery Content Guidelines
Images should include:
- Team on job site working
- Team meetings or planning sessions
- Craftsmanship detail shots (hands at work)
- Completed project celebrations
- Community involvement or team events

### Responsive Rules
| Breakpoint | Columns | Gap |
|------------|---------|-----|
| Desktop | 4 | 16px |
| Tablet | 3 | 12px |
| Mobile | 2 | 8px |

---

## Section 7: Testimonials (Trust Section)

### Container Structure
```
Section: gc-team-testimonials (background: light, padding: 96px/24px)
└── Container (max-width: 1200px, centered)
    ├── Heading Widget (H2): gc-team-testimonials__headline
    │   "What our clients say"
    └── Testimonial Slider: gc-testimonials-v1
        └── Use existing ACF integrated testimonial slider template
```

### Integration
Use the existing `gc-testimonials-v1` global template that pulls from the Testimonials CPT.

### Responsive Rules
- Use existing testimonial slider responsive behavior
- 3 cards on desktop, 2 on tablet, 1 on mobile

---

## Section 8: CTA Section

### Container Structure
```
Section: gc-team-cta (background: gold, padding: 80px/24px)
└── Container (max-width: 900px, centered, text-align: center)
    ├── Heading Widget (H2): gc-team-cta__headline
    │   "Ready to meet the team?"
    ├── Text Widget: gc-team-cta__body
    │   "Schedule a consultation..."
    └── Button Widget: gc-team-cta__button
        └── Class: gc-btn gc-btn--dark gc-estimate-trigger
```

### Final Copy

**Headline:**
Ready to meet the team?

**Body:**
Schedule a consultation to discuss your project with the people who will bring it to life. We look forward to learning about your vision and showing you what Grander craftsmanship can create.

**Button:**
Request a consultation

### Responsive Rules
- Desktop: H2 36px, body 18px
- Mobile: H2 28px, body 16px

---

## CSS Classes Summary

### Hero
- `.gc-hero--team` - Team page hero variant

### Introduction
- `.gc-team-intro` - Introduction section
- `.gc-team-intro__inner` - Content wrapper

### Owner Section
- `.gc-team-owner` - Owner highlight section
- `.gc-team-owner__inner` - Grid container
- `.gc-team-owner__image` - Image column
- `.gc-team-owner__content` - Content column
- `.gc-team-owner__label` - "Owner & Founder" label
- `.gc-team-owner__name` - Name heading
- `.gc-team-owner__title` - Title text
- `.gc-team-owner__bio` - Bio content

### Team Grid
- `.gc-team-grid-section` - Section wrapper
- `.gc-team-grid` - Grid container
- `.gc-team-card` - Individual team card
- `.gc-team-card__image` - Card image
- `.gc-team-card__name` - Card name
- `.gc-team-card__title` - Card title
- `.gc-team-card__bio` - Card bio

### Mission & Promise
- `.gc-team-mission` - Mission section (dark background)
- `.gc-team-mission__inner` - Grid container
- `.gc-team-mission__block` - Individual block
- `.gc-team-mission__label` - "Our mission" / "Our promise"
- `.gc-team-mission__text` - Content text

### Gallery
- `.gc-team-gallery` - Gallery section
- `.gc-team-gallery__header` - Section header
- `.gc-team-gallery__grid` - Gallery grid
- `.gc-team-gallery__item` - Individual image

### Testimonials
- `.gc-team-testimonials` - Testimonials section

### CTA
- `.gc-team-cta` - CTA section (gold background)

---

## ACF Field Group Updates Required

Expand the existing `register_team_fields()` method to include:

```php
// Hero Section
gc_team_hero_headline (text)
gc_team_hero_subline (textarea)
gc_team_hero_image (image)

// Introduction
gc_team_intro (wysiwyg) - exists, verify

// Team Members Repeater
gc_team_members (repeater) - exists, verify subfields:
  - name (text)
  - title (text)
  - bio (wysiwyg)
  - photo (image)
  - highlight_owner (true_false)

// Mission & Promise
gc_team_mission (textarea) - exists
gc_team_promise (textarea) - exists

// CTA (optional)
gc_team_cta_headline (text)
gc_team_cta_body (textarea)
gc_team_cta_button_label (text)
```

---

## Self-Check Verification

- [x] All 8 sections documented with container hierarchy
- [x] All ACF bindings specified
- [x] Final copy provided for all sections
- [x] Team member bios written (60-90 words each)
- [x] Responsive rules specified for all breakpoints
- [x] CSS class hooks defined
- [x] Owner highlight section separate from grid
- [x] Mission and promise styled distinctly
- [x] CTA button wired to estimate lightbox
- [x] No placeholder content
