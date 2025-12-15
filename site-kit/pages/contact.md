# Contact Page Specification

**Slug:** `/contact/`
**Template:** Elementor Full Width

---

## Overview

The Contact page serves as the primary entry point for potential clients to reach Grander Construction. It combines a welcoming introduction, the global estimate form, location information via map, and a comprehensive FAQ section.

---

## Section Structure

### Section 1: Hero

**Class:** `.gc-hero--contact`
**Height:** 45vh min

```
├── H1: "Let's start a conversation"
├── Subline: "Whether you're ready to begin or just exploring ideas, our team is here to help. Reach out and let's discuss how we can bring your vision to life."
└── Background: Office exterior or team meeting image
```

---

### Section 2: Introduction & Contact Info

**Background:** White
**Layout:** 2 columns (60/40)

```
Container Tree:
├── Left Column: Content
│   ├── H2: "Get in touch"
│   └── Body:
│       "We believe great projects start with great conversations. Whether you have a detailed vision or are just beginning to explore the possibilities, we're here to listen, guide, and help you take the next step.
│
│       Our team responds to all inquiries within one business day. For project discussions, we'll schedule a convenient time to talk through your goals, timeline, and any questions you might have."
│
└── Right Column: Contact Info Card
    ├── Background: #F5F3F0
    ├── Padding: 32px
    ├── Border Radius: 8px
    │
    ├── Item: Phone
    │   ├── Icon: Phone
    │   ├── Label: "Call us"
    │   └── Value: "(864) 555-0123" (linked tel:)
    │
    ├── Item: Email
    │   ├── Icon: Envelope
    │   ├── Label: "Email us"
    │   └── Value: "info@granderconstruction.com" (linked mailto:)
    │
    ├── Item: Address
    │   ├── Icon: Map marker
    │   ├── Label: "Visit us"
    │   └── Value: "123 Main Street, Greenville, SC 29601"
    │
    └── Item: Hours
        ├── Icon: Clock
        ├── Label: "Office hours"
        └── Value: "Monday – Friday, 8am – 5pm"
```

---

### Section 3: Contact Form

**Background:** Warm White

```
Container: (max-width: 800px, centered)
├── Header
│   ├── H2: "Request an estimate"
│   └── Subtext: "Tell us about your project and we'll provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget."
│
└── Form Container
    ├── Background: #FFFFFF
    ├── Padding: 48px
    ├── Border Radius: 8px
    ├── Box Shadow: 0 2px 12px rgba(0,0,0,0.06)
    │
    └── [Insert: GC Estimate Form v1]
        └── Shortcode: [gravityform id="X" title="false" description="false"]
```

---

### Section 4: Map

**Background:** Border Light

```
Container: Full width
├── Height: 400px (desktop), 300px (mobile)
├── Aspect Ratio: 16:9 desktop, 4:3 mobile
│
└── Google Maps Embed
    ├── Location: Grander Construction office address
    ├── Style: Slight grayscale (20%)
    └── Zoom: Street level
```

---

### Section 5: FAQ

**Background:** White

```
Container: (max-width: 900px, centered)
│
├── Header
│   ├── H2: "Common questions"
│   └── Subtext: "Find answers to frequently asked questions about working with Grander Construction, our process, and what to expect."
│
└── FAQ Accordion (.gc-faq-accordion-v1)
    │
    ├── Q: "How much should I expect to invest in a custom home or major project?"
    │   └── A: "Every project is unique, so we don't quote a standard price per square foot. During our consultation, we'll discuss your goals, design preferences, and site conditions to provide an itemized estimate that reflects the true scope of your project."
    │
    ├── Q: "What areas do you serve?"
    │   └── A: "We primarily serve the Upstate of South Carolina, including Greenville, Spartanburg, Anderson, and surrounding communities. We also take on select projects in Western North Carolina for the right fit."
    │
    ├── Q: "Do you build barndominiums?"
    │   └── A: "Yes. We approach barndominiums with the same framing methods and attention to detail as our custom homes, ensuring structural integrity and long term durability."
    │
    ├── Q: "Can you help with HOA approvals and permits?"
    │   └── A: "Absolutely. Our in house design team handles HOA submissions and permit coordination, keeping your project on track without adding stress to your schedule."
    │
    ├── Q: "How do I know my project will stay on budget?"
    │   └── A: "We provide detailed, itemized quotes before any work begins. This transparency helps you understand exactly where your investment goes and prevents surprises down the road."
    │
    ├── Q: "Can you help me find land?"
    │   └── A: "While we don't sell land directly, we work with trusted realtor partners who specialize in buildable lots throughout the Upstate. We're happy to make introductions."
    │
    ├── Q: "What sets Grander apart from other builders?"
    │   └── A: "We combine Midwestern building standards with proven building science, bringing a level of craftsmanship and energy efficiency that's uncommon in the region. Our team prioritizes clear communication, integrity, and genuine care for every family we serve."
    │
    └── Q: "How quickly can my project get started?"
        └── A: "Timeline depends on project scope, design complexity, and current scheduling. During your consultation, we'll provide a realistic start date and keep you informed as we move through the planning phases."
```

---

### Section 6: CTA (Optional)

**Background:** Deep Brown

```
├── H3: "Prefer to talk by phone?"
├── Body: "Our team is available Monday through Friday, 8am to 5pm. Give us a call and we'll be happy to answer your questions or schedule a consultation."
└── Button: "Call (864) 555-0123" → tel:8645550123
    └── Style: Outline, white border
```

---

## ACF Fields

| Field | Type | Source |
|-------|------|--------|
| `gc_contact_hero_headline` | Text | Page |
| `gc_contact_hero_subline` | Textarea | Page |
| `gc_contact_hero_image` | Image | Page |
| `gc_contact_intro` | Wysiwyg | Page |
| `gc_phone_number` | Text | Options |
| `gc_email_address` | Text | Options |
| `gc_office_address` | Textarea | Options |
| `gc_office_hours` | Text | Options |
| `gc_contact_map_embed` | Textarea | Options |

---

## Implementation Checklist

- [ ] Create Contact page at /contact/
- [ ] Build hero section
- [ ] Build 2-column intro with contact card
- [ ] Add estimate form section
- [ ] Add Google Maps embed
- [ ] Build FAQ accordion
- [ ] Add optional phone CTA section
- [ ] Configure ACF fields
- [ ] Test form submission
- [ ] Test phone/email links
- [ ] Test FAQ accordion
- [ ] Test responsive

---

End of Contact page specification.
