# Request an Estimate Page Specification

**Slug:** `/request-an-estimate/`
**Template:** Elementor Full Width

---

## Overview

The Request an Estimate page exists as a real page for SEO purposes and as a fallback for lightbox triggers. Most desktop and tablet CTAs open the estimate lightbox, but this page provides:
- Direct access via URL
- Mobile CTA destination (no lightbox on mobile)
- SEO landing page for "request estimate" queries
- Accessibility fallback when JavaScript fails

---

## Non-Negotiable Requirements

1. **Page Must Exist** — Real page at `/request-an-estimate/` for SEO and direct access
2. **Lightbox Fallback** — All CTA lightbox triggers link here as fallback
3. **Mobile Destination** — Mobile CTAs link directly here (no lightbox)
4. **Same Form** — Uses identical form as lightbox

---

## Section Structure

### Section 1: Hero

**Class:** `.gc-hero--short`
**Height:** 35vh min

```
├── H1: "Request an Estimate"
├── Subline: "Tell us about your project and let's explore the possibilities together"
└── Background: Subtle construction/planning image or solid warm background
```

---

### Section 2: Form Section

**Background:** White
**Layout:** 2 columns (40/60)

```
Container Tree:
Section: .gc-estimate-page-form
├── Background: #FFFFFF
├── Padding: 80px 24px
│
└── Container: (max-width: 1100px, centered)
    └── Grid: 2 columns (40% / 60%)
        │
        ├── Left Column: Info Panel
        │   ├── Background: #4C2A19
        │   ├── Padding: 48px 32px
        │   ├── Border Radius: 8px (or 0)
        │   │
        │   ├── H2: "Let's discuss your project"
        │   │   ├── Font: Libre Baskerville, 32px, 700
        │   │   └── Color: #FDFBF8
        │   │
        │   ├── Body:
        │   │   ├── Text: "Tell us about your project and we'll provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget."
        │   │   ├── Font: Corbel, 16px
        │   │   ├── Color: rgba(253,251,248,0.85)
        │   │   └── Line Height: 1.7
        │   │
        │   ├── Divider: 1px rgba(255,255,255,0.2)
        │   │
        │   ├── What to Expect:
        │   │   ├── Heading: "What to expect"
        │   │   │   └── Font: Corbel, 14px, 700, uppercase
        │   │   │
        │   │   └── List:
        │   │       ├── ✓ Response within 1 business day
        │   │       ├── ✓ No obligation consultation
        │   │       ├── ✓ Detailed project discussion
        │   │       └── ✓ Clear next steps
        │   │
        │   └── Trust Badges:
        │       ├── Display: Flex, wrap, gap: 16px
        │       ├── Item: "HBA Member"
        │       ├── Item: "BBB Accredited"
        │       └── Item: "Licensed & Insured"
        │
        └── Right Column: Form Panel
            ├── Background: #FFFFFF
            ├── Padding: 48px
            ├── Border: 1px solid #E8DFD5
            ├── Border Radius: 8px (or 0)
            │
            └── [Insert: GC Estimate Form v1]
                └── Shortcode: [gravityform id="X" title="false" description="false" ajax="true"]
```

---

### Section 3: Alternative Contact

**Background:** Warm White

```
Container: (max-width: 700px, centered, text-center)
│
├── Heading: "Prefer to talk?"
│   └── Font: Libre Baskerville, 24px
│
├── Text: "Call us directly and we'll be happy to answer your questions"
│
└── Phone Number:
    ├── Text: "(864) 555-0123"
    ├── Link: tel:8645550123
    ├── Font: Libre Baskerville, 28px, 700
    └── Color: #B08D66
```

---

### Section 4: What Happens Next

**Background:** White

```
Container: (max-width: 1000px, centered)
│
├── Heading: "What happens after you submit"
│
└── Steps Grid: 3 columns
    │
    ├── Step 1:
    │   ├── Number: "1"
    │   ├── Title: "We review your project"
    │   └── Description: "Our team reads through your submission to understand your goals and requirements."
    │
    ├── Step 2:
    │   ├── Number: "2"
    │   ├── Title: "We reach out"
    │   └── Description: "Within 1 business day, we'll contact you to schedule a consultation."
    │
    └── Step 3:
        ├── Number: "3"
        ├── Title: "We discuss details"
        └── Description: "During our call or meeting, we'll explore your vision and answer all your questions."
```

---

## Form Fields

Uses identical form as lightbox (GC Estimate Form v1):

| # | Field | ID | Required |
|---|-------|-----|----------|
| 1 | First Name | `gc_first_name` | Yes |
| 2 | Last Name | `gc_last_name` | Yes |
| 3 | Email | `gc_email` | Yes |
| 4 | Phone | `gc_phone` | Yes |
| 5 | Project Type | `gc_project_type` | Yes |
| 6 | Project Address | `gc_project_address` | Yes |
| 7 | City | `gc_project_city` | Yes |
| 8 | State | `gc_project_state` | Yes |
| 9 | Description | `gc_project_description` | Yes |
| 10 | Budget Range | `gc_budget_range` | No |
| 11 | Timeline | `gc_timeline` | No |

---

## Success State

After form submission:

```
Success Message:
├── Icon: Checkmark in gold circle
├── Heading: "Thank you!"
├── Body: "Our team will review your project details and contact you within 1-2 business days with next steps."
└── Optional: "Return to Home" link
```

---

## SEO Configuration

### Meta Title
"Request an Estimate | Grander Construction"

### Meta Description
"Request a free estimate for your custom home, outdoor space, or addition project. Grander Construction serves Greenville, Spartanburg, and the Upstate of South Carolina."

### Focus Keywords
- request estimate
- free estimate
- custom home estimate
- construction quote
- Greenville builder estimate

---

## Responsive Behavior

### Desktop (1025px+)
- 2-column layout (40/60)
- Full info panel visible

### Tablet (768px - 1024px)
- 2-column layout maintained
- Reduced padding

### Mobile (767px and below)
- Single column (stacked)
- Info panel above form
- Simplified trust badges
- Full-width form

---

## Implementation Checklist

- [ ] Create page at /request-an-estimate/
- [ ] Build hero section
- [ ] Build 2-column form section
- [ ] Add info panel with trust badges
- [ ] Insert estimate form (same as lightbox)
- [ ] Add alternative contact section
- [ ] Add "What happens next" section
- [ ] Configure form success message
- [ ] Add SEO meta tags
- [ ] Test form submission
- [ ] Test address autocomplete
- [ ] Verify all lightbox CTAs link here as fallback
- [ ] Test on mobile (primary destination)
- [ ] Test responsive

---

End of Request an Estimate page specification.
