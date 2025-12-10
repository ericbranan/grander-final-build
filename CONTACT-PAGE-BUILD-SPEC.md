# Contact Page Build Specification

Version: 2025-12-08
Status: Production Ready
Template: Single page (contact)

---

## Overview

The Contact page serves as the primary entry point for potential clients to reach Grander Construction. It combines a welcoming introduction, the global estimate form, location information via map, and a comprehensive FAQ section to address common questions before they're asked.

---

## Section 1: Hero

### Container Hierarchy

```
Section: gc-hero gc-hero--contact
├── Container: gc-hero__overlay
│   └── Container: gc-hero__content (max-width: 800px, centered)
│       ├── Heading H1: gc-hero__headline
│       │   └── ACF: gc_contact_hero_headline
│       └── Text: gc-hero__subline
│           └── ACF: gc_contact_hero_subline
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, min-height: 45vh, background: ACF image gc_contact_hero_image with overlay |
| Overlay | Container | Background: linear-gradient(180deg, rgba(44,33,26,0.5) 0%, rgba(44,33,26,0.7) 100%) |
| Content | Container | Max-width: 800px, margin: 0 auto, padding: 100px 24px 72px, text-align: center |
| Headline | Heading | H1, Baskerville, 52px desktop, color: #FFFFFF |
| Subline | Text | Corbel, 18px, color: rgba(255,255,255,0.9), max-width: 600px, margin: 0 auto |

### ACF Bindings

| Element | Field Name | Type |
|---------|------------|------|
| Headline | gc_contact_hero_headline | text |
| Subline | gc_contact_hero_subline | textarea |
| Background | gc_contact_hero_image | image |

### Final Copy

**Headline:** Let's start a conversation

**Subline:** Whether you're ready to begin or just exploring ideas, our team is here to help. Reach out and let's discuss how we can bring your vision to life.

---

## Section 2: Introduction & Contact Info

### Container Hierarchy

```
Section: gc-contact-intro
└── Container: gc-contact-intro__inner (max-width: 1100px, centered)
    └── Container: gc-contact-intro__grid (2 columns: 60/40)
        │
        ├── Container: gc-contact-intro__content (left column)
        │   ├── Heading H2: gc-contact-intro__headline
        │   │   └── Text: "Get in touch"
        │   └── Text: gc-contact-intro__text
        │       └── ACF: gc_contact_intro
        │
        └── Container: gc-contact-intro__info (right column)
            ├── Container: gc-contact-info-item
            │   ├── Icon: gc-contact-info-item__icon (phone)
            │   └── Container: gc-contact-info-item__content
            │       ├── Text: gc-contact-info-item__label ("Call us")
            │       └── Link: gc-contact-info-item__value
            │           └── ACF Options: gc_phone_number
            │
            ├── Container: gc-contact-info-item
            │   ├── Icon: gc-contact-info-item__icon (email)
            │   └── Container: gc-contact-info-item__content
            │       ├── Text: gc-contact-info-item__label ("Email us")
            │       └── Link: gc-contact-info-item__value
            │           └── ACF Options: gc_email_address
            │
            ├── Container: gc-contact-info-item
            │   ├── Icon: gc-contact-info-item__icon (location)
            │   └── Container: gc-contact-info-item__content
            │       ├── Text: gc-contact-info-item__label ("Visit us")
            │       └── Text: gc-contact-info-item__value
            │           └── ACF Options: gc_office_address
            │
            └── Container: gc-contact-info-item
                ├── Icon: gc-contact-info-item__icon (clock)
                └── Container: gc-contact-info-item__content
                    ├── Text: gc-contact-info-item__label ("Office hours")
                    └── Text: gc-contact-info-item__value
                        └── ACF Options: gc_office_hours
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, background: #FFFFFF, padding: 80px 24px |
| Inner | Container | Max-width: 1100px, margin: 0 auto |
| Grid | Container | Display: grid, grid-template-columns: 1.5fr 1fr, gap: 64px, align: start |
| Content | Container | - |
| Headline | Heading | H2, Baskerville, 36px, color: var(--gc-deep-brown), margin-bottom: 24px |
| Text | Text Editor | Corbel, 17px, line-height: 1.7, color: var(--gc-deep-brown) |
| Info Column | Container | Background: var(--gc-warm-white), padding: 32px, border-radius: 8px |
| Info Item | Container | Display: flex, gap: 16px, margin-bottom: 24px |
| Icon | Icon | Size: 24px, color: var(--gc-gold) |
| Label | Text | Corbel, 12px, uppercase, letter-spacing: 0.5px, color: var(--gc-medium-brown), margin-bottom: 4px |
| Value | Text/Link | Corbel, 16px, color: var(--gc-deep-brown), font-weight: 500 |

### ACF Bindings

| Element | Field Name | Type |
|---------|------------|------|
| Intro Text | gc_contact_intro | wysiwyg |
| Phone | gc_phone_number | text (options) |
| Email | gc_email_address | text (options) |
| Address | gc_office_address | textarea (options) |
| Hours | gc_office_hours | text (options) |

### Final Copy

**Headline:** Get in touch

**Intro Text:**
We believe great projects start with great conversations. Whether you have a detailed vision or are just beginning to explore the possibilities, we're here to listen, guide, and help you take the next step.

Our team responds to all inquiries within one business day. For project discussions, we'll schedule a convenient time to talk through your goals, timeline, and any questions you might have.

**Contact Info:**
- **Call us:** (864) 555-0123
- **Email us:** info@granderconstruction.com
- **Visit us:** 123 Main Street, Greenville, SC 29601
- **Office hours:** Monday – Friday, 8am – 5pm

---

## Section 3: Contact Form

### Container Hierarchy

```
Section: gc-contact-form-section
└── Container: gc-contact-form-section__inner (max-width: 800px, centered)
    ├── Container: gc-contact-form__header
    │   ├── Heading H2: gc-contact-form__headline
    │   │   └── Text: "Request an estimate"
    │   └── Text: gc-contact-form__subtext
    │       └── Text: "Tell us about your project..."
    │
    └── Container: gc-contact-form__wrapper
        └── Shortcode: gc_estimate_form_shortcode
            └── [gravityform id="X" title="false" description="false"]
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, background: var(--gc-warm-white), padding: 80px 24px |
| Inner | Container | Max-width: 800px, margin: 0 auto |
| Header | Container | Text-align: center, margin-bottom: 48px |
| Headline | Heading | H2, Baskerville, 36px, color: var(--gc-deep-brown), margin-bottom: 16px |
| Subtext | Text | Corbel, 17px, color: var(--gc-medium-brown), max-width: 550px, margin: 0 auto |
| Wrapper | Container | Background: #FFFFFF, padding: 48px, border-radius: 8px, box-shadow: 0 2px 12px rgba(0,0,0,0.06) |

### Form Structure (from Module 5)

The contact form uses the same global estimate form template:

```
Form: gc-form gc-estimate-form
├── Row 1: Name fields (2 columns)
│   ├── Field: gc_first_name (required)
│   └── Field: gc_last_name (required)
│
├── Row 2: Contact fields (2 columns)
│   ├── Field: gc_email (required, email validation)
│   └── Field: gc_phone (required, phone validation)
│
├── Row 3: Project type (1 column)
│   └── Select: gc_project_type
│       └── Options: Custom home, Outdoor spaces, Pool house/Garage/ADU, Sunroom/Addition, Other
│
├── Row 4: Address fields
│   ├── Field: gc_project_address (autocomplete enabled)
│   ├── Field: gc_project_city (auto-fill from autocomplete)
│   └── Field: gc_project_state (auto-fill from autocomplete)
│
├── Row 5: Project description (1 column)
│   └── Textarea: gc_project_description (required, min 20 chars)
│
├── Row 6: Timeline (1 column)
│   └── Select: gc_project_timeline
│       └── Options: Within 3 months, 3-6 months, 6-12 months, 12+ months, Just exploring
│
├── Row 7: How did you hear (1 column)
│   └── Select: gc_referral_source
│       └── Options: Google search, Social media, Referral, Home show, Magazine, Other
│
└── Row 8: Submit
    └── Button: Submit request
```

### ACF Binding

| Element | Field Name | Type |
|---------|------------|------|
| Form Shortcode | gc_estimate_form_shortcode | text (options) |

### Final Copy

**Headline:** Request an estimate

**Subtext:** Tell us about your project and we'll provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget.

---

## Section 4: Map

### Container Hierarchy

```
Section: gc-contact-map
└── Container: gc-contact-map__inner (full width)
    └── Container: gc-contact-map__embed
        └── HTML/Embed: Google Maps iframe
            └── ACF: gc_contact_map_embed
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, padding: 0, background: var(--gc-border-light) |
| Inner | Container | Max-width: 100%, padding: 0 |
| Embed | Container | Width: 100%, aspect-ratio: 16/9 on desktop, 4/3 on mobile |
| iframe | HTML | width: 100%, height: 100%, border: 0, filter: grayscale(20%) |

### ACF Binding

| Element | Field Name | Type |
|---------|------------|------|
| Map Embed | gc_contact_map_embed | oembed or textarea |

### Map Styling Notes

- Apply subtle grayscale filter (20%) to match brand aesthetic
- Remove default Google branding where possible via iframe parameters
- Ensure responsive aspect ratio (16:9 desktop, 4:3 tablet, 1:1 or taller mobile)

### Example Embed Code

```html
<iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d..."
    width="100%"
    height="450"
    style="border:0; filter: grayscale(20%);"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
</iframe>
```

---

## Section 5: FAQ

### Container Hierarchy

```
Section: gc-contact-faq
└── Container: gc-contact-faq__inner (max-width: 900px, centered)
    ├── Container: gc-contact-faq__header
    │   ├── Heading H2: gc-contact-faq__headline
    │   │   └── Text: "Common questions"
    │   └── Text: gc-contact-faq__subtext
    │       └── Text: "Find answers to frequently asked questions..."
    │
    └── Container: gc-faq-accordion-v1
        └── Loop: FAQ CPT filtered by gc_contact_faq_groups
            └── Container: gc-faq-item
                ├── Container: gc-faq-question
                │   ├── Text: Question text (Post Title)
                │   └── Icon: gc-faq-toggle (plus/minus)
                └── Container: gc-faq-answer
                    └── Text: Answer text (gc_faq_answer)
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, background: #FFFFFF, padding: 80px 24px 96px |
| Inner | Container | Max-width: 900px, margin: 0 auto |
| Header | Container | Text-align: center, margin-bottom: 48px |
| Headline | Heading | H2, Baskerville, 36px, color: var(--gc-deep-brown), margin-bottom: 16px |
| Subtext | Text | Corbel, 17px, color: var(--gc-medium-brown) |
| Accordion | Container | - |

### FAQ Accordion Styling (from global template)

```css
.gc-faq-item {
    border-bottom: 1px solid var(--gc-border-light);
}

.gc-faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 0;
    cursor: pointer;
    font-family: 'Libre Baskerville', Baskerville, serif;
    font-size: 18px;
    color: var(--gc-deep-brown);
}

.gc-faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    font-family: Corbel, sans-serif;
    font-size: 16px;
    line-height: 1.7;
    color: var(--gc-medium-brown);
}

.gc-faq-item--open .gc-faq-answer {
    max-height: 500px;
    padding-bottom: 24px;
}
```

### ACF Binding

| Element | Field Name | Type |
|---------|------------|------|
| FAQ Groups | gc_contact_faq_groups | taxonomy (faq_group) |

### Final Copy

**Headline:** Common questions

**Subtext:** Find answers to frequently asked questions about working with Grander Construction, our process, and what to expect.

### FAQ Seed Content (Contact Group)

These FAQs should be assigned to the "contact" faq_group:

**Q: How much should I expect to invest in a custom home or major project?**
A: Every project is unique, so we don't quote a standard price per square foot. During our consultation, we'll discuss your goals, design preferences, and site conditions to provide an itemized estimate that reflects the true scope of your project.

**Q: What areas do you serve?**
A: We primarily serve the Upstate of South Carolina, including Greenville, Spartanburg, Anderson, and surrounding communities. We also take on select projects in Western North Carolina for the right fit.

**Q: Do you build barndominiums?**
A: Yes. We approach barndominiums with the same framing methods and attention to detail as our custom homes, ensuring structural integrity and long term durability.

**Q: Can you help with HOA approvals and permits?**
A: Absolutely. Our in house design team handles HOA submissions and permit coordination, keeping your project on track without adding stress to your schedule.

**Q: How do I know my project will stay on budget?**
A: We provide detailed, itemized quotes before any work begins. This transparency helps you understand exactly where your investment goes and prevents surprises down the road.

**Q: Can you help me find land?**
A: While we don't sell land directly, we work with trusted realtor partners who specialize in buildable lots throughout the Upstate. We're happy to make introductions.

**Q: What sets Grander apart from other builders?**
A: We combine Midwestern building standards with proven building science, bringing a level of craftsmanship and energy efficiency that's uncommon in the region. Our team prioritizes clear communication, integrity, and genuine care for every family we serve.

**Q: How quickly can my project get started?**
A: Timeline depends on project scope, design complexity, and current scheduling. During your consultation, we'll provide a realistic start date and keep you informed as we move through the planning phases.

---

## Section 6: CTA (Optional)

### Container Hierarchy

```
Section: gc-contact-cta
└── Container: gc-contact-cta__inner (max-width: 900px, centered)
    ├── Heading H2: gc-contact-cta__headline
    │   └── Text: "Prefer to talk by phone?"
    ├── Text: gc-contact-cta__body
    │   └── Text: "Our team is available during business hours..."
    └── Button: gc-btn gc-btn--outline
        └── Link: tel:gc_phone_number
        └── Text: "Call (864) 555-0123"
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Background: var(--gc-deep-brown), padding: 72px 24px |
| Inner | Container | Max-width: 900px, margin: 0 auto, text-align: center |
| Headline | Heading | H2, Baskerville, 32px, color: #FFFFFF, margin-bottom: 16px |
| Body | Text | Corbel, 17px, color: rgba(255,255,255,0.9), margin-bottom: 28px |
| Button | Button | Outline style, border: 2px solid #FFFFFF, color: #FFFFFF, padding: 14px 28px |

### Final Copy

**Headline:** Prefer to talk by phone?

**Body:** Our team is available Monday through Friday, 8am to 5pm. Give us a call and we'll be happy to answer your questions or schedule a consultation.

**Button:** Call (864) 555-0123

---

## Responsive Rules

### Desktop (1025px+)

| Element | Specification |
|---------|---------------|
| Hero height | 45vh min |
| Hero headline | 52px |
| Intro grid | 2 columns (60/40) |
| Intro gap | 64px |
| Form max-width | 800px |
| Form padding | 48px |
| Map aspect | 16:9 |
| FAQ max-width | 900px |
| Section padding | 80px 24px |

### Tablet (768px - 1024px)

| Element | Specification |
|---------|---------------|
| Hero height | 40vh min |
| Hero headline | 40px |
| Intro grid | 1 column (stacked) |
| Info card | Full width, margin-top: 40px |
| Form padding | 40px |
| Map aspect | 4:3 |
| FAQ question | 17px |
| Section padding | 64px 24px |

### Mobile (767px and below)

| Element | Specification |
|---------|---------------|
| Hero height | 35vh min |
| Hero headline | 32px |
| Hero subline | 16px |
| Intro headline | 28px |
| Info items | Stack with 20px gap |
| Form padding | 24px |
| Form fields | Full width (1 column) |
| Map aspect | 1:1 or taller |
| FAQ question | 16px |
| Section padding | 48px 16px |
| CTA headline | 26px |

---

## CSS Class Reference

### Section Classes

| Class | Purpose |
|-------|---------|
| .gc-hero--contact | Contact hero variant |
| .gc-contact-intro | Introduction section |
| .gc-contact-form-section | Form section |
| .gc-contact-map | Map section |
| .gc-contact-faq | FAQ section |
| .gc-contact-cta | Phone CTA section |

### Component Classes

| Class | Purpose |
|-------|---------|
| .gc-contact-intro__grid | 2-column intro layout |
| .gc-contact-intro__content | Left content column |
| .gc-contact-intro__info | Right info card |
| .gc-contact-info-item | Single contact info row |
| .gc-contact-info-item__icon | Info item icon |
| .gc-contact-info-item__label | Info item label |
| .gc-contact-info-item__value | Info item value |
| .gc-contact-form__wrapper | Form container with shadow |
| .gc-contact-map__embed | Map iframe container |

---

## ACF Field Summary

### Contact Page Fields (group_gc_contact_fields)

| Field Name | Type | Default | Description |
|------------|------|---------|-------------|
| gc_contact_hero_headline | text | Let's start a conversation | H1 hero headline |
| gc_contact_hero_subline | textarea | (see copy above) | Hero supporting text |
| gc_contact_hero_image | image | - | Hero background image |
| gc_contact_intro | wysiwyg | (see copy above) | Introduction paragraphs |
| gc_contact_faq_groups | taxonomy | contact | FAQ groups to display |

### Global Options Fields Used

| Field Name | Type | Description |
|------------|------|-------------|
| gc_phone_number | text | Company phone |
| gc_email_address | text | Company email |
| gc_office_address | textarea | Office address |
| gc_office_hours | text | Business hours |
| gc_estimate_form_shortcode | text | Gravity Forms shortcode |
| gc_contact_map_embed | textarea/oembed | Google Maps embed code |

---

## JavaScript Requirements

The Contact page uses existing JS from grander-core.js:

1. **FAQ Accordion** - `initFAQAccordion()` handles expand/collapse
2. **Form Validation** - `initFormValidation()` handles client-side validation
3. **Address Autocomplete** - `initEstimateAddressAutocomplete()` handles Google Places

No additional JavaScript needed for this page.

---

## Implementation Notes

1. **Form Reuse** - The contact form is the same global estimate form used across the site. Use the same shortcode stored in `gc_estimate_form_shortcode`.

2. **FAQ Filtering** - Query FAQs where faq_group taxonomy includes "contact" term.

3. **Map Grayscale** - Apply CSS filter to match brand. Can also use Snazzy Maps for custom styling.

4. **Phone Links** - Use `tel:` protocol for phone numbers to enable click-to-call on mobile.

5. **Email Links** - Use `mailto:` protocol for email addresses.

6. **Office Address** - Consider linking to Google Maps directions.

---

## Build Checklist

- [ ] Create Contact page in WordPress
- [ ] Add Hero section with ACF bindings
- [ ] Add Intro section with 2-column layout
- [ ] Configure contact info cards
- [ ] Add Form section with global estimate form
- [ ] Add Map section with embed code
- [ ] Add FAQ section with accordion template
- [ ] Create "contact" FAQ group and add FAQs
- [ ] Add optional CTA section
- [ ] Test responsive breakpoints
- [ ] Test form submission
- [ ] Test address autocomplete
- [ ] Verify phone/email links work
- [ ] Test FAQ accordion behavior

---

End of specification.
