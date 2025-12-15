# Footer Template Specification

**Template Type:** Theme Builder > Footer
**Conditions:** Entire Site
**Class Hook:** `gc-footer-v1`

---

## Overview

The Grander Construction footer features a deep brown background with organized navigation, contact information, social links, and a secondary CTA. It includes a trust bar section and copyright strip.

---

## Design Specifications

### Colors
| Element | Color |
|---------|-------|
| Background | `#4C2A19` (Deep Brown) |
| Text | `rgba(253, 251, 248, 0.85)` |
| Headings | `#FDFBF8` (Warm White) |
| Links | `rgba(253, 251, 248, 0.85)` |
| Links Hover | `#B08D66` (Gold) |
| Copyright Bar BG | `#3D2214` (Darker Brown) |

### Typography
| Element | Font | Size | Weight |
|---------|------|------|--------|
| Column Headings | Libre Baskerville | 18px | 700 |
| Nav Links | Corbel | 15px | 400 |
| Body Text | Corbel | 15px | 400 |
| Copyright | Corbel | 13px | 400 |

---

## Container Tree

```
Section: .gc-footer-v1
├── Background: #4C2A19
├── Padding: 80px 24px 0 (desktop) / 60px 24px 0 (mobile)
│
├── Container: .gc-footer__inner (max-width: 1200px, centered)
│   │
│   ├── Container: .gc-footer__grid (4 columns desktop, 2 tablet, 1 mobile)
│   │   ├── Gap: 48px (desktop), 32px (mobile)
│   │   │
│   │   ├── Column 1: .gc-footer__brand
│   │   │   ├── Image Widget: Footer Logo
│   │   │   │   ├── Dynamic: gc_footer_logo
│   │   │   │   ├── Width: 180px
│   │   │   │   └── Margin Bottom: 24px
│   │   │   │
│   │   │   ├── Text Widget: Tagline
│   │   │   │   ├── Dynamic: gc_footer_tagline
│   │   │   │   ├── Default: "Building the Upstate's finest homes with integrity, craftsmanship, and care."
│   │   │   │   ├── Color: rgba(253, 251, 248, 0.85)
│   │   │   │   ├── Font Size: 15px
│   │   │   │   └── Line Height: 1.7
│   │   │   │
│   │   │   └── Container: .gc-footer__social (flex, gap: 12px)
│   │   │       ├── Margin Top: 24px
│   │   │       │
│   │   │       ├── Icon Widget: Facebook
│   │   │       │   ├── Icon: fab fa-facebook-f
│   │   │       │   ├── Link: gc_social_facebook_url
│   │   │       │   ├── Size: 18px
│   │   │       │   ├── Color: rgba(253, 251, 248, 0.7)
│   │   │       │   └── Hover Color: #B08D66
│   │   │       │
│   │   │       ├── Icon Widget: Instagram
│   │   │       │   ├── Icon: fab fa-instagram
│   │   │       │   ├── Link: gc_social_instagram_url
│   │   │       │   └── [Same styling]
│   │   │       │
│   │   │       ├── Icon Widget: LinkedIn
│   │   │       │   ├── Icon: fab fa-linkedin-in
│   │   │       │   ├── Link: gc_social_linkedin_url
│   │   │       │   └── [Same styling]
│   │   │       │
│   │   │       └── Icon Widget: Houzz (optional)
│   │   │           ├── Icon: fab fa-houzz
│   │   │           ├── Link: gc_social_houzz_url
│   │   │           └── [Same styling]
│   │   │
│   │   ├── Column 2: .gc-footer__nav
│   │   │   ├── Heading Widget: Column Title
│   │   │   │   ├── Text: "Quick Links"
│   │   │   │   ├── Tag: H4
│   │   │   │   ├── Font: Libre Baskerville, 18px, 700
│   │   │   │   ├── Color: #FDFBF8
│   │   │   │   └── Margin Bottom: 20px
│   │   │   │
│   │   │   └── Nav Menu Widget OR Icon List:
│   │   │       ├── Items:
│   │   │       │   ├── About Us → /about/
│   │   │       │   ├── Our Team → /our-team/
│   │   │       │   ├── Build Process → /build-process/
│   │   │       │   ├── Gallery → /gallery/
│   │   │       │   ├── The Blueprint → /blog/
│   │   │       │   └── Contact → /contact/
│   │   │       ├── Typography: Corbel, 15px
│   │   │       ├── Color: rgba(253, 251, 248, 0.85)
│   │   │       ├── Hover Color: #B08D66
│   │   │       └── Item Spacing: 12px
│   │   │
│   │   ├── Column 3: .gc-footer__services
│   │   │   ├── Heading Widget: Column Title
│   │   │   │   ├── Text: "Services"
│   │   │   │   └── [Same heading styling]
│   │   │   │
│   │   │   └── Icon List Widget:
│   │   │       ├── Items:
│   │   │       │   ├── Custom Homes → /custom-homes/
│   │   │       │   ├── Outdoor Spaces → /outdoor-spaces/
│   │   │       │   ├── Pool Houses & Garages → /pool-houses-garages-adus/
│   │   │       │   ├── Sunrooms & Additions → /sunrooms-additions/
│   │   │       │   └── Performance Building → /performance-building/
│   │   │       └── [Same link styling]
│   │   │
│   │   └── Column 4: .gc-footer__contact
│   │       ├── Heading Widget: Column Title
│   │       │   ├── Text: "Contact"
│   │       │   └── [Same heading styling]
│   │       │
│   │       ├── Container: .gc-footer__contact-item (margin-bottom: 16px)
│   │       │   ├── Icon Widget: Phone Icon
│   │       │   │   ├── Icon: fas fa-phone
│   │       │   │   ├── Size: 16px
│   │       │   │   └── Color: #B08D66
│   │       │   │
│   │       │   └── Text Widget: Phone Number
│   │       │       ├── Dynamic: gc_phone_number
│   │       │       ├── Link: tel:{gc_phone_number}
│   │       │       └── [Link styling]
│   │       │
│   │       ├── Container: .gc-footer__contact-item
│   │       │   ├── Icon: fas fa-envelope
│   │       │   └── Text: gc_email_address (mailto: link)
│   │       │
│   │       ├── Container: .gc-footer__contact-item
│   │       │   ├── Icon: fas fa-map-marker-alt
│   │       │   └── Text: gc_office_address (multi-line)
│   │       │
│   │       └── Container: .gc-footer__contact-item
│   │           ├── Icon: fas fa-clock
│   │           └── Text: gc_office_hours
│   │
│   └── Container: .gc-footer__cta (centered, margin-top: 48px, padding: 48px 0, border-top: 1px solid rgba(255,255,255,0.1))
│       ├── Text Widget: CTA Text
│       │   ├── Text: "Ready to discuss your project?"
│       │   ├── Font: Libre Baskerville, 24px, 700
│       │   ├── Color: #FDFBF8
│       │   └── Margin Bottom: 20px
│       │
│       └── Button Widget: CTA Button
│           ├── Text: "Request an Estimate"
│           ├── Link: /request-an-estimate/ (fallback)
│           ├── Class: gc-btn gc-btn--primary gc-estimate-trigger
│           └── Data Attribute: data-gc-estimate-trigger="true"
│
└── Section: .gc-footer__copyright
    ├── Background: #3D2214
    ├── Padding: 20px 24px
    │
    └── Container: .gc-footer__copyright-inner (max-width: 1200px, centered)
        ├── Display: Flex
        ├── Justify Content: Space Between
        ├── Align Items: Center
        ├── Flex Wrap: Wrap
        ├── Gap: 16px
        │
        ├── Text Widget: Copyright Text
        │   ├── Text: "© {year} Grander Construction. All rights reserved."
        │   ├── Dynamic: Use Elementor dynamic tag for year
        │   ├── Font: Corbel, 13px
        │   └── Color: rgba(253, 251, 248, 0.6)
        │
        └── Container: .gc-footer__legal-links (flex, gap: 24px)
            ├── Text/Link: Privacy Policy → /privacy-policy/
            ├── Text/Link: Terms of Service → /terms-of-service/
            └── Font: Corbel, 13px, color: rgba(253,251,248,0.6)
```

---

## Responsive Behavior

### Desktop (1025px+)
- 4-column grid layout
- All elements visible
- Horizontal copyright bar with flex space-between

### Tablet (768px - 1024px)
- 2-column grid (2x2)
- Reduced spacing
- Copyright stacks if needed

### Mobile (767px and below)
- Single column layout
- All sections stack vertically
- Social icons centered
- Copyright text centered
- Legal links stack or wrap

---

## ACF Dynamic Tags

| Element | Field | Source |
|---------|-------|--------|
| Footer Logo | `gc_footer_logo` | Options |
| Tagline | `gc_footer_tagline` | Options |
| Phone | `gc_phone_number` | Options |
| Email | `gc_email_address` | Options |
| Address | `gc_office_address` | Options |
| Hours | `gc_office_hours` | Options |
| Facebook | `gc_social_facebook_url` | Options |
| Instagram | `gc_social_instagram_url` | Options |
| LinkedIn | `gc_social_linkedin_url` | Options |
| Houzz | `gc_social_houzz_url` | Options |

---

## CSS Additions

```css
/* Footer Base */
.gc-footer-v1 {
    background: #4C2A19;
    color: rgba(253, 251, 248, 0.85);
}

.gc-footer__grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 48px;
}

/* Footer Links */
.gc-footer-v1 a {
    color: rgba(253, 251, 248, 0.85);
    text-decoration: none;
    transition: color 0.2s ease;
}

.gc-footer-v1 a:hover {
    color: #B08D66;
}

/* Social Icons */
.gc-footer__social a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    transition: background 0.2s ease;
}

.gc-footer__social a:hover {
    background: #B08D66;
}

.gc-footer__social a:hover svg {
    color: #4C2A19;
}

/* Contact Items */
.gc-footer__contact-item {
    display: flex;
    gap: 12px;
    margin-bottom: 16px;
}

.gc-footer__contact-item svg {
    flex-shrink: 0;
    margin-top: 4px;
}

/* Copyright Bar */
.gc-footer__copyright {
    background: #3D2214;
}

/* Responsive */
@media (max-width: 1024px) {
    .gc-footer__grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 32px;
    }
}

@media (max-width: 767px) {
    .gc-footer__grid {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .gc-footer__social {
        justify-content: center;
    }

    .gc-footer__contact-item {
        justify-content: center;
    }

    .gc-footer__copyright-inner {
        flex-direction: column;
        text-align: center;
    }
}
```

---

## Implementation Checklist

- [ ] Create Footer template in Theme Builder
- [ ] Set condition: Entire Site
- [ ] Build main section with deep brown background
- [ ] Create 4-column grid layout
- [ ] Add brand column with logo and tagline
- [ ] Add Quick Links navigation column
- [ ] Add Services navigation column
- [ ] Add Contact information column
- [ ] Add social media icons with links
- [ ] Add footer CTA section
- [ ] Add copyright bar with legal links
- [ ] Connect all ACF dynamic tags
- [ ] Test responsive behavior at all breakpoints
- [ ] Verify all links are correct
- [ ] Test social icon hover states
- [ ] Verify phone/email are clickable

---

End of footer template specification.
