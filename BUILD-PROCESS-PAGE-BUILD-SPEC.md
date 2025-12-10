# Build Process Page - Complete Build Specification

**Page slug:** `build-process`
**Template:** Default page with Elementor
**ACF Field Group:** `gc_process_fields`
**Last Updated:** 2025-12-08

---

## Page Overview

The Build Process page guides visitors through Grander Construction's project phases, setting expectations for communication, timeline, and deliverables. This page establishes trust by demonstrating a structured, professional approach to construction.

---

## Section 1: Hero

### Container Structure
```
Section: gc-hero gc-hero--process
├── Background Image (ACF: gc_hero_background_image)
├── Overlay (rgba(26, 26, 26, 0.5))
└── Container (max-width: 1200px, centered)
    └── Inner Container: gc-hero__content
        ├── Heading Widget (H1): gc-hero__headline
        └── Text Widget: gc-hero__subline
```

### ACF Bindings
| Element | ACF Field | Fallback |
|---------|-----------|----------|
| H1 | `gc_process_hero_headline` | "The build process, made clear" |
| Subline | `gc_process_hero_subline` | "Every project is unique, but our process stays consistent. You will always know what comes next." |
| Background | `gc_process_hero_image` | Project site image |

### Final Copy
**Headline:**
The build process, made clear

**Subline:**
Every project is unique, but our process stays consistent. You will always know what comes next, what decisions are needed, and how your schedule is taking shape.

### Responsive Rules
| Breakpoint | H1 Size | Subline Size | Min Height |
|------------|---------|--------------|------------|
| Desktop | 56px | 20px | 60vh |
| Tablet ≤1024px | 42px | 18px | 50vh |
| Mobile ≤767px | 32px | 16px | 45vh |

---

## Section 2: Process Introduction

### Container Structure
```
Section: gc-process-intro (background: warm-white, padding: 96px/24px)
└── Container (max-width: 800px, centered)
    └── Inner Container: gc-process-intro__inner
        ├── Heading Widget (H2): gc-process-intro__headline
        └── Text Widget: gc-process-intro__body
```

### ACF Bindings
| Element | ACF Field | Fallback |
|---------|-----------|----------|
| H2 | `gc_process_intro_headline` | "A process built on clarity" |
| Body | `gc_process_intro_body` | See final copy below |

### Final Copy
**Headline:**
A process built on clarity

**Body:**
Building a custom home or outdoor living space is a significant investment of time, energy, and resources. At Grander Construction, we guide you through every phase with transparent communication, realistic timelines, and the kind of attention to detail that leads to exceptional results.

Our process ensures you are never left wondering what happens next. From the initial consultation through final walkthrough, you will have a clear understanding of milestones, decisions, and deliverables.

### Responsive Rules
- Desktop: H2 42px, body 18px, text-align center
- Tablet: H2 32px, body 17px
- Mobile: H2 28px, body 16px

---

## Section 3: Process Phases Timeline

### Container Structure
```
Section: gc-process-phases (background: light, padding: 96px/24px)
└── Container (max-width: 1200px, centered)
    ├── Heading Widget (H2): gc-process-phases__headline
    │   "Your journey from vision to reality"
    └── Loop Container: gc-process-phases__timeline
        └── Repeater Loop (ACF: gc_process_phases)
            └── Template: gc-process-phase
                ├── Phase Number: gc-process-phase__number
                ├── Phase Connector Line: gc-process-phase__line
                ├── Phase Content: gc-process-phase__content
                │   ├── Phase Title (H3): gc-process-phase__title
                │   └── Phase Summary: gc-process-phase__summary
                └── Phase Icon (optional): gc-process-phase__icon
```

### ACF Repeater: gc_process_phases

| Subfield | Type | Purpose |
|----------|------|---------|
| `title` | text | Phase name |
| `summary` | textarea | 2-3 sentence description |
| `icon` | image | Optional icon/illustration |
| `order` | number | Display order |

### Final Copy - 11 Phases

**Phase 1: Initial phone call**
We start with a brief conversation to understand your vision, timeline, and budget range. This helps us determine if we are a good fit for your project before committing time on either side.

**Phase 2: Consultation meeting**
A deeper dive into your project goals, design preferences, and site considerations. We review examples of past work, discuss material options, and answer questions about our approach.

**Phase 3: Project execution schedule**
We develop a preliminary timeline showing major milestones from design through completion. This gives you a realistic view of the overall project duration and key decision points.

**Phase 4: Site or office visit**
We visit your property to evaluate site conditions, measure accurately, and discuss placement options. If the project involves existing structures, we assess current conditions and potential challenges.

**Phase 5: Establish start date**
Based on your timeline preferences and our production schedule, we lock in a target start date. This allows both parties to plan accordingly.

**Phase 6: Design package and project quote**
Our design team delivers detailed drawings, specifications, and an itemized quote. Every element is broken out so you understand exactly where your investment goes.

**Phase 7: Design alterations**
You have one to three structured revision rounds to refine the design. We work through adjustments collaboratively until the plan matches your vision.

**Phase 8: Review and modify quote**
As design changes occur, the quote is updated in parallel. You always know how modifications affect the overall investment before making final decisions.

**Phase 9: Deposit and agreement**
Once the design and budget are approved, we formalize the agreement and collect the deposit. This reserves your spot in our production schedule.

**Phase 10: Project construction**
Our team executes the build with regular progress updates. You will receive milestone notifications, photo documentation, and direct access to your project manager.

**Phase 11: Final walkthrough and documentation**
We complete a detailed walkthrough to confirm everything meets your expectations. Professional photography and video capture the finished project for your records.

### Visual Layout
- Desktop: Vertical timeline with alternating left/right content
- Phase numbers displayed in gold circles (56px)
- Connecting vertical line (2px, gold) between phases
- Content cards with subtle shadow on hover

### Responsive Rules
| Breakpoint | Layout | Number Size | Title Size |
|------------|--------|-------------|------------|
| Desktop | Alternating L/R | 56px | 24px |
| Tablet ≤1024px | Alternating L/R | 48px | 22px |
| Mobile ≤767px | Single column, left-aligned | 40px | 20px |

---

## Section 4: What to Expect

### Container Structure
```
Section: gc-process-expect (background: warm-white, padding: 96px/24px)
└── Container (max-width: 1200px, centered)
    └── Two-column grid: gc-process-expect__inner
        ├── Left: gc-process-expect__content
        │   ├── Heading Widget (H2): gc-process-expect__headline
        │   └── Text Widget: gc-process-expect__body (WYSIWYG)
        └── Right: gc-process-expect__visual
            └── Image or icon grid
```

### ACF Bindings
| Element | ACF Field | Fallback |
|---------|-----------|----------|
| H2 | `gc_process_what_to_expect_heading` | "What to expect" |
| Body | `gc_process_what_to_expect_body` | See final copy below |
| Image | `gc_process_expect_image` | Optional supporting image |

### Final Copy
**Headline:**
What to expect working with us

**Body:**
**Communication that keeps you informed.**
You will never be left wondering where your project stands. Our team provides regular updates, responds to questions promptly, and keeps you in the loop on any changes or decisions needed.

**Realistic timelines you can trust.**
We set expectations honestly from the start. When delays occur due to weather, materials, or inspections, you will know immediately and understand how it affects your schedule.

**Decisions made easier.**
Material selections and design choices can feel overwhelming. We guide you through options, provide clear recommendations, and help you make confident decisions without second-guessing.

**Quality without surprises.**
Our itemized quotes show exactly where your investment goes. There are no hidden fees or surprise charges. What we quote is what you pay, adjusted only for changes you approve.

### Visual Layout
- Two-column grid: 55% content / 45% image
- Content includes bullet-style paragraphs with bold lead-ins
- Image: craftsmanship detail shot or team meeting photo

### Responsive Rules
- Tablet: 50/50 split, smaller image
- Mobile: Single column, content first, image below

---

## Section 5: FAQ Section

### Container Structure
```
Section: gc-process-faq (background: light, padding: 96px/24px)
└── Container (max-width: 900px, centered)
    ├── Heading Widget (H2): gc-process-faq__headline
    │   "Common questions about the process"
    └── FAQ Accordion: gc-faq-accordion-v1
        └── Dynamic Loop (FAQ CPT filtered by gc_process_faq_group)
            └── Template: gc-faq-item
                ├── Question (button): gc-faq-question
                └── Answer (panel): gc-faq-answer
```

### ACF Binding
| Element | ACF Field | Purpose |
|---------|-----------|---------|
| FAQ Group | `gc_process_faq_group` | Filter FAQs by "build-process" context |

### FAQ Content (from global FAQ library, context: build-process)

**Q: What are the main phases of the Grander build process?**
A: Our process includes eleven key phases: initial phone call, consultation meeting, project execution schedule, site visit, establishing start date, design package and quote, design alterations, quote review, deposit and agreement, project construction, and final walkthrough with documentation.

**Q: How long will my project take?**
A: Timeline varies by project scope and complexity. During the consultation, we provide a realistic estimate based on your specific project. Custom homes typically require 8 to 14 months from groundbreaking to completion, while outdoor living projects may range from 6 weeks to several months.

**Q: When do we finalize design selections?**
A: Most selections are confirmed during the design package phase, with one to three structured revision rounds. We provide a clear selection schedule so you know exactly when each decision is needed.

**Q: How will communication work during the build?**
A: You will have direct access to your project manager and receive regular progress updates. We document milestones with photos and notify you promptly of any changes or decisions needed.

**Q: What happens if we discover an issue mid-project?**
A: We address obstacles quickly and fairly. If unforeseen conditions arise, we present options and work with you to find solutions that protect quality and maintain trust.

**Q: Can we make changes after construction begins?**
A: Yes, though changes during construction may affect timeline and budget. We document all change orders clearly and get your written approval before proceeding.

### Responsive Rules
- Max-width 900px for readability
- Desktop: H2 36px
- Mobile: H2 28px, full-width accordion

---

## Section 6: CTA Section

### Container Structure
```
Section: gc-process-cta (background: deep-brown, padding: 96px/24px)
└── Container (max-width: 700px, centered, text-align: center)
    ├── Heading Widget (H2): gc-process-cta__headline
    ├── Text Widget: gc-process-cta__body
    └── Button Widget: gc-process-cta__button
        └── Class: gc-btn gc-btn--primary gc-estimate-trigger
        └── data-gc-estimate-trigger attribute
```

### ACF Bindings
| Element | ACF Field | Fallback |
|---------|-----------|----------|
| H2 | `gc_process_cta_headline` | "Ready to begin?" |
| Body | `gc_process_cta_body` | See final copy |
| Button | `gc_process_cta_button_label` | "Request an estimate" |

### Final Copy
**Headline:**
Ready to begin?

**Body:**
Let us walk you through the process and answer your questions. Request an estimate to start the conversation about your custom home or outdoor living project.

**Button:**
Request an estimate

### Button Behavior
- Triggers global estimate lightbox via `gc-estimate-trigger` class
- Uses `data-gc-estimate-trigger` attribute for JS binding

### Responsive Rules
- Desktop: H2 42px white, body 18px rgba(white, 0.85)
- Mobile: H2 28px, body 16px

---

## ACF Field Group Updates Required

The current `register_process_fields()` method needs expansion to include:

```php
// Hero Section
gc_process_hero_headline (text)
gc_process_hero_subline (textarea)
gc_process_hero_image (image)

// Intro Section
gc_process_intro_headline (text)
gc_process_intro_body (textarea)

// Process Phases (existing repeater - gc_process_phases)
// Already has: title, summary, icon, order

// What to Expect Section
gc_process_what_to_expect_heading (text) - exists
gc_process_what_to_expect_body (wysiwyg) - upgrade from textarea
gc_process_expect_image (image)

// FAQ Section
gc_process_faq_group (select) - exists

// CTA Section
gc_process_cta_headline (text)
gc_process_cta_body (textarea)
gc_process_cta_button_label (text)
```

---

## CSS Classes Summary

| Class | Purpose |
|-------|---------|
| `.gc-hero--process` | Hero variant for Build Process page |
| `.gc-process-intro` | Introduction section wrapper |
| `.gc-process-phases` | Timeline section wrapper |
| `.gc-process-phase` | Individual phase card |
| `.gc-process-phase__number` | Phase number circle |
| `.gc-process-phase__line` | Connecting line between phases |
| `.gc-process-phase__title` | Phase title |
| `.gc-process-phase__summary` | Phase description |
| `.gc-process-expect` | What to expect section |
| `.gc-process-faq` | FAQ section wrapper |
| `.gc-process-cta` | Final CTA section |

---

## Elementor Widget Settings

### Hero Section
- Section: Full Width, Min-Height 60vh
- Background: ACF Image with overlay
- Content: Centered, max-width 800px

### Process Timeline
- Use Loop Grid or manual repeater approach
- Container widget for each phase
- Flexbox/grid for alternating layout

### FAQ Accordion
- Elementor Accordion widget with ACF loop
- Or custom shortcode if needed for FAQ CPT

### CTA Section
- Section: Full Width, background deep-brown
- Content: Centered, max-width 700px
- Button: Primary style, estimate trigger

---

## Self-Check Verification

- [ ] All ACF bindings documented
- [ ] Final copy provided for all sections
- [ ] Responsive rules specified for all breakpoints
- [ ] CSS class hooks defined
- [ ] Button behavior documented
- [ ] FAQ integration approach specified
- [ ] No placeholder content
- [ ] Typography follows Module 1 spec (Baskerville/Corbel)
- [ ] Spacing follows Module 1 tokens (16/24/32/48/96px)
