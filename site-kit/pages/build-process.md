# Build Process Page Specification

**Slug:** `/build-process/`
**Template:** Elementor Full Width
**Parent Navigation:** "Our Approach" dropdown (no landing page)
**Layout Pattern:** Timeline/Steps layout

---

## Overview

The Build Process page details Grander's approach to construction from initial consultation through project completion. It sets expectations and builds confidence in the methodology.

---

## Section-by-Section Specification

### Section 1: Hero

**Class:** `.gc-hero--short`
**Height:** 45vh min

```
Hero Content:
├── H1: "Our Build Process"
├── Subline: "A clear, transparent path from first conversation to final walkthrough"
└── Background: Job site in progress or architectural plans
```

---

### Section 2: Introduction

**Background:** White
**Padding:** 80px 24px

```
Container: (max-width: 800px, centered, text-center)
├── Text:
│   "At Grander Construction, we believe great projects start with great communication. Our proven process keeps you informed, involved, and confident at every stage—from the first sketch to the final nail."
└── Font: Corbel, 18px, line-height: 1.8
```

---

### Section 3: Process Timeline

**Class:** `.gc-process-timeline`
**Background:** Warm White
**Padding:** 100px 24px

```
Container Tree:
Section: .gc-process-timeline
│
└── Container: (max-width: 1000px, centered)
    │
    └── Timeline/Steps: (alternating left/right layout or vertical)
        │
        ├── Step 1: Discovery
        │   ├── Number: "01"
        │   ├── Title: "Discovery & Consultation"
        │   ├── Description:
        │   │   "Every project begins with a conversation. We'll meet to discuss your vision, lifestyle needs, budget parameters, and timeline expectations. This is where we learn what matters most to you.
        │   │
        │   │   What to expect:
        │   │   • Initial phone or in-person consultation
        │   │   • Site visit (if applicable)
        │   │   • Discussion of scope and goals
        │   │   • Preliminary budget conversation"
        │   └── Image Placeholder: Consultation meeting or site visit
        │
        ├── Step 2: Planning & Design
        │   ├── Number: "02"
        │   ├── Title: "Planning & Design"
        │   ├── Description:
        │   │   "With your vision in hand, our team develops detailed plans that bring your ideas to life. We work with architects and designers to create blueprints that balance aesthetics, function, and budget.
        │   │
        │   │   What to expect:
        │   │   • Conceptual drawings and floor plans
        │   │   • Material and finish selections
        │   │   • Detailed specifications
        │   │   • Engineering and permitting coordination"
        │   └── Image Placeholder: Blueprint or design meeting
        │
        ├── Step 3: Pre-Construction
        │   ├── Number: "03"
        │   ├── Title: "Pre-Construction"
        │   ├── Description:
        │   │   "Before breaking ground, we finalize every detail. You'll receive a comprehensive proposal with itemized costs, a realistic timeline, and a clear scope of work. No surprises, no hidden fees.
        │   │
        │   │   What to expect:
        │   │   • Final contract and detailed budget
        │   │   • Material ordering and lead time planning
        │   │   • Subcontractor scheduling
        │   │   • HOA and permit submissions"
        │   └── Image Placeholder: Contract signing or planning session
        │
        ├── Step 4: Construction
        │   ├── Number: "04"
        │   ├── Title: "Construction"
        │   ├── Description:
        │   │   "This is where your vision becomes reality. Our skilled craftsmen execute the plan with precision and care, maintaining clean job sites and consistent communication throughout.
        │   │
        │   │   What to expect:
        │   │   • Regular progress updates
        │   │   • Weekly site meetings (as needed)
        │   │   • Quality inspections at key milestones
        │   │   • Open communication with your project manager"
        │   └── Image Placeholder: Construction in progress
        │
        └── Step 5: Completion & Walkthrough
            ├── Number: "05"
            ├── Title: "Completion & Walkthrough"
            ├── Description:
            │   "As we approach completion, we conduct thorough quality checks and prepare for your final walkthrough. We'll review every detail together, address any items, and ensure you're completely satisfied.
            │
            │   What to expect:
            │   • Comprehensive punch list review
            │   • Final walkthrough with you
            │   • Warranty documentation
            │   • Maintenance guidance and recommendations"
            └── Image Placeholder: Completed project or happy client walkthrough
```

---

### Section 4: What Makes Us Different

**Background:** White
**Padding:** 80px 24px

```
Container: (max-width: 1000px, centered)
│
├── Heading: "The Grander Difference"
│
└── Grid: 3 columns
    ├── Item: Clear Communication
    │   └── "You'll always know where your project stands. Regular updates, responsive answers, no guessing."
    │
    ├── Item: Transparent Pricing
    │   └── "Detailed, itemized estimates before work begins. We stick to our quotes."
    │
    └── Item: Quality Focus
        └── "We don't rush. Every project gets the time and attention it deserves."
```

---

### Section 5: FAQ

**Background:** Warm White
**Padding:** 80px 24px

```
FAQ Items:
├── Q: "How long does a typical custom home take to build?"
│   └── A: "Timeline varies based on size and complexity, but most custom homes take 8-14 months from groundbreaking to completion. We'll provide a realistic timeline during the planning phase."
│
├── Q: "Can I make changes during construction?"
│   └── A: "We accommodate changes when possible, though they may affect timeline and budget. We'll discuss any change orders clearly before proceeding."
│
├── Q: "How do I stay informed during the build?"
│   └── A: "Your project manager provides regular updates via your preferred method—phone, email, or in-person. We encourage site visits and maintain an open-door policy."
│
└── Q: "What warranties do you offer?"
    └── A: "We provide a comprehensive warranty covering workmanship and materials. Specific terms vary by project type and are detailed in your contract."
```

---

### Section 6: CTA

```
Standard CTA:
├── Background: Deep Brown
├── Heading: "Ready to Start the Conversation?"
├── Text: "The first step is simple—let's talk about your project."
└── Button: "Request an Estimate" (lightbox trigger)
```

---

## Timeline Styling

```css
.gc-process-step {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    align-items: center;
    padding: 48px 0;
    border-bottom: 1px solid var(--gc-border-light);
}

.gc-process-step:nth-child(even) {
    direction: rtl;
}

.gc-process-step:nth-child(even) > * {
    direction: ltr;
}

.gc-process-step__number {
    font-family: var(--gc-font-heading);
    font-size: 72px;
    color: var(--gc-gold);
    opacity: 0.3;
    margin-bottom: 16px;
}

.gc-process-step__title {
    font-family: var(--gc-font-heading);
    font-size: 28px;
    color: var(--gc-deep-brown);
    margin-bottom: 16px;
}

.gc-process-step__description {
    font-size: 16px;
    line-height: 1.8;
}

.gc-process-step__image {
    border-radius: 8px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
}

@media (max-width: 768px) {
    .gc-process-step {
        grid-template-columns: 1fr;
    }
    .gc-process-step:nth-child(even) {
        direction: ltr;
    }
}
```

---

## Internal Links

| Element | Destination |
|---------|-------------|
| CTA | Lightbox (fallback: /request-an-estimate/) |

---

## Implementation Checklist

- [ ] Create Build Process page at /build-process/
- [ ] Build hero section
- [ ] Build introduction section
- [ ] Build 5-step timeline
- [ ] Add "What Makes Us Different" section
- [ ] Add FAQ accordion
- [ ] Build final CTA
- [ ] Add step images
- [ ] Test responsive

---

End of Build Process page specification.
