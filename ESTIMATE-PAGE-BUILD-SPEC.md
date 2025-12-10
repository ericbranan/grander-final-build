# Request an Estimate Page Build Specification

## Overview

The Request an Estimate page serves as a dedicated landing page for homeowners ready to begin a conversation about their project. It combines reassurance messaging with an inline form, trust indicators, and relevant FAQs to build confidence and reduce friction.

**Page slug:** `request-an-estimate`
**Template:** Default (Elementor Full Width)
**ACF Field Group:** `group_gc_estimate_fields`

---

## Section 1: Hero

### Purpose
Welcoming hero that sets expectations and encourages form completion.

### Elementor Structure

```
Section: gc-estimate-hero
├── Background: ACF Image (gc_estimate_hero_image) with overlay
├── Container: gc-estimate-hero__inner (max-width: 900px, centered)
│   ├── Heading H1: gc-estimate-hero__headline
│   │   └── Dynamic Tag: ACF Field → gc_estimate_hero_headline
│   └── Text Widget: gc-estimate-hero__subline
│       └── Dynamic Tag: ACF Field → gc_estimate_hero_subline
```

### ACF Bindings

| Element | ACF Field | Type |
|---------|-----------|------|
| Hero headline | `gc_estimate_hero_headline` | text |
| Hero subline | `gc_estimate_hero_subline` | textarea |
| Hero background | `gc_estimate_hero_image` | image |

### Final Copy

**Headline:**
```
Request an estimate
```

**Subline:**
```
Share your vision with us and receive a detailed, transparent estimate tailored to your project. No pressure, no surprises, just honest guidance to help you build with confidence.
```

### CSS Classes

- `.gc-estimate-hero` - Section wrapper
- `.gc-estimate-hero__inner` - Content container
- `.gc-estimate-hero__headline` - H1 styling
- `.gc-estimate-hero__subline` - Subline text

---

## Section 2: Two-Column Main Section

### Purpose
Primary content area with reassurance copy on the left and the estimate form on the right.

### Elementor Structure

```
Section: gc-estimate-main
├── Container: gc-estimate-main__inner (max-width: 1200px)
│   ├── Container: gc-estimate-main__copy (left column)
│   │   ├── Heading H2: gc-estimate-main__headline
│   │   │   └── Dynamic Tag: ACF Field → gc_estimate_section_headline
│   │   ├── Text Widget: gc-estimate-main__intro
│   │   │   └── Dynamic Tag: ACF Field → gc_estimate_reassurance_copy
│   │   │
│   │   ├── Container: gc-estimate-process
│   │   │   ├── Heading H3: "What happens next"
│   │   │   └── HTML Widget: gc-estimate-process__steps
│   │   │       └── Ordered list of process steps
│   │   │
│   │   ├── Container: gc-estimate-expectations
│   │   │   ├── Heading H3: "What to expect from your estimate"
│   │   │   └── HTML Widget: gc-estimate-expectations__list
│   │   │       └── Unordered list of expectations
│   │   │
│   │   └── Container: gc-estimate-promise
│   │       └── Text Widget: gc-estimate-promise__text
│   │           └── Dynamic Tag: ACF Field → gc_estimate_promise
│   │
│   └── Container: gc-estimate-main__form (right column)
│       ├── Heading H2: gc-estimate-form__headline
│       │   └── Dynamic Tag: ACF Field → gc_estimate_form_headline
│       ├── Text Widget: gc-estimate-form__subtext
│       │   └── Dynamic Tag: ACF Field → gc_estimate_form_subtext
│       └── Shortcode Widget: gc-estimate-form__container
│           └── Dynamic Tag: ACF Field → gc_estimate_form_shortcode
```

### ACF Bindings

| Element | ACF Field | Type |
|---------|-----------|------|
| Section headline | `gc_estimate_section_headline` | text |
| Reassurance copy | `gc_estimate_reassurance_copy` | textarea |
| Promise text | `gc_estimate_promise` | textarea |
| Form headline | `gc_estimate_form_headline` | text |
| Form subtext | `gc_estimate_form_subtext` | textarea |
| Form shortcode | `gc_estimate_form_shortcode` | text |

### Final Copy

**Section Headline (H2):**
```
Let's discuss your project
```

**Reassurance Copy:**
```
Every custom home and outdoor living project is unique, which is why we take the time to understand your vision before providing an estimate. Our goal is to give you clear expectations, realistic timelines, and thoughtful options that align with your goals and budget.

We believe the estimate process should feel collaborative, not transactional. You will work directly with our team to explore possibilities, ask questions, and gain confidence in the path forward. There is no obligation and no pressure, just honest conversation about what it takes to bring your vision to life.
```

**What Happens Next (ordered list):**
```
1. Review your submission
   We will review the details you provide within one business day and reach out to schedule a brief phone consultation.

2. Initial consultation call
   During this 15 to 20 minute call, we will discuss your project goals, timeline, and any initial questions you have about the process.

3. Site visit or office meeting
   For most projects, we will schedule an in-person meeting to see the property, discuss design ideas, and gather the details needed for an accurate estimate.

4. Detailed estimate delivery
   You will receive an itemized estimate that breaks down costs transparently, so you understand exactly what is included and can make informed decisions.
```

**What to Expect (unordered list):**
```
- Transparent, itemized pricing with no hidden fees
- Realistic timelines based on current project schedules
- Multiple options when applicable to fit different budgets
- Clear communication throughout the process
- No pressure to commit until you are ready
```

**Promise Text:**
```
Our promise: We will never rush you into a decision. Building a custom home or outdoor living space is a significant investment, and you deserve a partner who respects your timeline and priorities. Take the time you need, and know that we are here when you are ready to move forward.
```

**Form Headline:**
```
Tell us about your project
```

**Form Subtext:**
```
Complete the form below and a member of our team will be in touch within one business day to discuss your project.
```

### CSS Classes

- `.gc-estimate-main` - Section wrapper
- `.gc-estimate-main__inner` - Two-column grid container
- `.gc-estimate-main__copy` - Left column
- `.gc-estimate-main__headline` - Section H2
- `.gc-estimate-main__intro` - Reassurance paragraph
- `.gc-estimate-process` - Process steps container
- `.gc-estimate-process__steps` - Ordered list
- `.gc-estimate-expectations` - Expectations container
- `.gc-estimate-expectations__list` - Unordered list
- `.gc-estimate-promise` - Promise container
- `.gc-estimate-promise__text` - Promise paragraph
- `.gc-estimate-main__form` - Right column (form)
- `.gc-estimate-form__headline` - Form section H2
- `.gc-estimate-form__subtext` - Form intro text
- `.gc-estimate-form__container` - Form wrapper

---

## Section 3: Trust Bar

### Purpose
Social proof strip showing credentials and affiliations.

### Elementor Structure

```
Section: gc-estimate-trust
├── Container: gc-estimate-trust__inner (max-width: 1200px)
│   ├── Heading H3: gc-estimate-trust__headline
│   │   └── Static: "Trusted by homeowners across the Upstate"
│   └── Container: gc-estimate-trust__items (flex row)
│       └── Loop Template: Trust Item
│           └── Dynamic: ACF Repeater → gc_trust_items (from options)
│               ├── Image Widget: gc-trust-item__logo
│               │   └── Subfield: gc_trust_items__logo
│               └── Text Widget: gc-trust-item__label
│                   └── Subfield: gc_trust_items__label
```

### ACF Bindings

| Element | ACF Field | Source |
|---------|-----------|--------|
| Trust items | `gc_trust_items` | Global Options |
| Item logo | `gc_trust_items__logo` | Repeater subfield |
| Item label | `gc_trust_items__label` | Repeater subfield |
| Item URL | `gc_trust_items__url` | Repeater subfield |

### Static Copy

**Headline:**
```
Trusted by homeowners across the Upstate
```

### CSS Classes

- `.gc-estimate-trust` - Section wrapper
- `.gc-estimate-trust__inner` - Content container
- `.gc-estimate-trust__headline` - Section headline
- `.gc-estimate-trust__items` - Flex container for items
- `.gc-trust-item` - Individual trust item
- `.gc-trust-item__logo` - Logo image
- `.gc-trust-item__label` - Item label text

---

## Section 4: FAQ Section

### Purpose
Address common estimate-related questions to reduce friction and build confidence.

### Elementor Structure

```
Section: gc-estimate-faq
├── Container: gc-estimate-faq__inner (max-width: 900px)
│   ├── Container: gc-estimate-faq__header
│   │   ├── Heading H2: gc-estimate-faq__headline
│   │   │   └── Dynamic Tag: ACF Field → gc_estimate_faq_headline
│   │   └── Text Widget: gc-estimate-faq__subtext
│   │       └── Dynamic Tag: ACF Field → gc_estimate_faq_subtext
│   │
│   └── Container: gc-estimate-faq__list
│       └── Loop Template: FAQ Accordion Item
│           └── Query: FAQ CPT filtered by faq_group = "estimate"
│               └── Template: gc-faq-item
│                   ├── Button: gc-faq-item__question
│                   │   └── Dynamic: Post Title
│                   └── Container: gc-faq-item__answer
│                       └── Dynamic: ACF Field → gc_faq_answer
```

### ACF Bindings

| Element | ACF Field | Type |
|---------|-----------|------|
| FAQ headline | `gc_estimate_faq_headline` | text |
| FAQ subtext | `gc_estimate_faq_subtext` | textarea |
| FAQ group | `gc_estimate_faq_group` | taxonomy |

### Final Copy

**Headline:**
```
Questions about the estimate process
```

**Subtext:**
```
Answers to the questions we hear most often from homeowners considering a custom build or outdoor living project.
```

### FAQ Seed Content (faq_group: "estimate")

**Q: How much does a custom home or outdoor living project cost?**
```
Every project is unique, and costs depend on factors like size, materials, site conditions, and design complexity. We do not quote a standard price per square foot because that approach often leads to unrealistic expectations. Instead, we provide detailed, itemized estimates based on your specific project so you know exactly what to expect.
```

**Q: How long does it take to receive an estimate?**
```
After our initial consultation and site visit, most estimates are delivered within two to three weeks. Complex projects may require additional time to ensure accuracy. We will always communicate timelines clearly so you know when to expect your estimate.
```

**Q: Is there a fee for the estimate?**
```
Initial consultations and preliminary estimates are provided at no cost. For projects that require detailed design work or engineering, there may be a design fee that is credited toward your project if you choose to move forward with Grander Construction.
```

**Q: What if the estimate is higher than my budget?**
```
We understand that budget is a primary concern. If the initial estimate exceeds your target, we will work with you to explore alternatives, whether that means adjusting scope, phasing the project, or selecting different materials. Our goal is to find a path that works for you.
```

**Q: How detailed will the estimate be?**
```
Our estimates are fully itemized, breaking down costs by category so you can see exactly where your investment goes. This transparency helps you make informed decisions and reduces the risk of unexpected costs during construction.
```

**Q: Do I need to have plans or designs before requesting an estimate?**
```
Not at all. Many clients come to us with just an idea or inspiration photos. Our team can help you develop the concept through our design process. If you already have plans from an architect, we are happy to work with those as well.
```

### CSS Classes

- `.gc-estimate-faq` - Section wrapper
- `.gc-estimate-faq__inner` - Content container
- `.gc-estimate-faq__header` - Header container
- `.gc-estimate-faq__headline` - Section H2
- `.gc-estimate-faq__subtext` - Supporting text
- `.gc-estimate-faq__list` - FAQ items container
- `.gc-faq-item` - Individual FAQ item
- `.gc-faq-item__question` - Question button
- `.gc-faq-item__answer` - Answer container

---

## Section 5: Final CTA

### Purpose
Secondary call-to-action for users who prefer phone contact.

### Elementor Structure

```
Section: gc-estimate-cta
├── Container: gc-estimate-cta__inner (max-width: 900px, centered)
│   ├── Heading H2: gc-estimate-cta__headline
│   │   └── Dynamic Tag: ACF Field → gc_estimate_cta_headline
│   ├── Text Widget: gc-estimate-cta__body
│   │   └── Dynamic Tag: ACF Field → gc_estimate_cta_body
│   └── Container: gc-estimate-cta__actions
│       ├── Button: gc-estimate-cta__phone
│       │   └── Dynamic Tag: ACF Field → gc_phone_number (from options)
│       └── Button: gc-estimate-cta__scroll
│           └── Static: "Fill out the form above" (scrolls to form)
```

### ACF Bindings

| Element | ACF Field | Source |
|---------|-----------|--------|
| CTA headline | `gc_estimate_cta_headline` | Page field |
| CTA body | `gc_estimate_cta_body` | Page field |
| Phone number | `gc_phone_number` | Global Options |

### Final Copy

**Headline:**
```
Prefer to talk?
```

**Body:**
```
If you would rather discuss your project over the phone, we are happy to help. Give us a call during business hours and a member of our team will answer your questions and help you take the next step.
```

### CSS Classes

- `.gc-estimate-cta` - Section wrapper
- `.gc-estimate-cta__inner` - Content container
- `.gc-estimate-cta__headline` - CTA H2
- `.gc-estimate-cta__body` - CTA text
- `.gc-estimate-cta__actions` - Button container
- `.gc-estimate-cta__phone` - Phone button
- `.gc-estimate-cta__scroll` - Scroll to form button

---

## Responsive Behavior

### Desktop (1025px+)

| Element | Behavior |
|---------|----------|
| Hero | Full-width, 400px min-height, centered content |
| Main section | Two-column grid: 55% copy / 45% form |
| Trust bar | Horizontal row, logos centered with even spacing |
| FAQ section | Full-width accordion, 900px max-width |
| CTA section | Centered with horizontal button row |

### Tablet (768px - 1024px)

| Element | Behavior |
|---------|----------|
| Hero | Reduced height (350px), smaller typography |
| Main section | Single column, copy stacked above form |
| Trust bar | 2x2 or 3-up grid for logos |
| FAQ section | Slightly reduced padding |
| CTA section | Buttons may stack |

### Mobile (< 768px)

| Element | Behavior |
|---------|----------|
| Hero | 300px min-height, compact typography |
| Main section | Single column, full-width form |
| Trust bar | Vertical stack, centered logos |
| FAQ section | Full-width, touch-friendly tap targets |
| CTA section | Stacked buttons, full-width |

---

## Form Configuration

The estimate form uses the global Gravity Forms form stored in `gc_estimate_form_shortcode`.

### Recommended Form Fields

1. **First Name** (required)
2. **Last Name** (required)
3. **Email** (required)
4. **Phone** (required)
5. **Project Address** (with Google Places autocomplete)
6. **City** (auto-filled from address)
7. **State** (auto-filled from address)
8. **Project Type** (dropdown: Custom Home, Outdoor Space, Pool House/Garage/ADU, Sunroom/Addition, Other)
9. **Estimated Budget Range** (dropdown: ranges)
10. **Preferred Timeline** (dropdown: timeline options)
11. **Project Description** (textarea, required)
12. **How did you hear about us?** (dropdown)

### Form Styling

The form inherits global Gravity Forms styling from grander-core.css. The `.gc-estimate-form__container` wrapper applies consistent styling.

---

## Implementation Checklist

- [ ] Create page in WordPress with slug `request-an-estimate`
- [ ] Build hero section in Elementor with ACF bindings
- [ ] Build two-column main section with copy and form
- [ ] Implement trust bar with options repeater
- [ ] Build FAQ section with CPT query
- [ ] Build final CTA section
- [ ] Test responsive behavior at all breakpoints
- [ ] Verify form submission and validation
- [ ] Test FAQ accordion functionality
- [ ] Verify all ACF fields populate correctly

---

## Notes

- The form on this page is the same form used in the estimate lightbox
- FAQ items should be tagged with `faq_group: estimate` taxonomy
- Trust bar pulls from global options, same as other pages
- Page serves as both a standalone destination and SEO landing page
