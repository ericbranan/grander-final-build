# Our Team Page Specification

**Slug:** `/our-team/`
**Template:** Elementor Full Width
**Layout Pattern:** Team grid with bios

---

## Overview

The Our Team page introduces the people behind Grander Construction, building trust and personal connection with potential clients.

---

## Section-by-Section Specification

### Section 1: Hero

**Class:** `.gc-hero--short`
**Height:** 40vh min

```
Hero Content:
├── H1: "Meet Our Team"
├── Subline: "Experienced professionals dedicated to building your vision"
└── Background: Team group photo or job site with team
```

---

### Section 2: Leadership

**Class:** `.gc-team-leadership`
**Background:** White
**Padding:** 100px 24px

```
Container Tree:
Section: .gc-team-leadership
│
├── Subhead: "Leadership"
│
└── Container: Founder Card (2-column layout)
    │
    ├── Image Column (40%)
    │   └── Image Placeholder: Professional headshot of Micah Grander
    │       ├── Border Radius: 0
    │       └── Aspect Ratio: 1:1 or 3:4
    │
    └── Content Column (60%)
        ├── Name: "Micah Grander"
        ├── Title: "Founder & President"
        │
        ├── Bio:
        │   "Micah founded Grander Construction with a clear vision: build homes the way he would build his own. With roots in the Midwest and decades of experience in construction, he brings a detail-oriented approach and genuine care to every project.
        │
        │   Before starting Grander, Micah honed his craft working on projects ranging from residential homes to commercial buildings. He saw an opportunity to bring Midwestern building standards—known for durability and energy efficiency—to the Upstate.
        │
        │   When he's not on a job site, Micah can be found spending time with his family, exploring the outdoors, or mentoring the next generation of builders."
        │
        └── Contact: Email link (optional)
```

---

### Section 3: Team Grid

**Class:** `.gc-team-grid`
**Background:** Warm White
**Padding:** 80px 24px

```
Container Tree:
Section: .gc-team-grid
│
├── Heading: "The Grander Team"
│   └── Alignment: Center
│
└── Grid: 3 columns (desktop) / 2 (tablet) / 1 (mobile), gap: 32px
    │
    ├── Team Member Card: [Repeat for each member]
    │   ├── Image Placeholder: Headshot
    │   │   ├── Aspect Ratio: 1:1
    │   │   └── Hover: Slight zoom or overlay
    │   ├── Name: "Team Member Name"
    │   ├── Title: "Position Title"
    │   └── Short Bio: 2-3 sentences about role and experience
    │
    ├── Example Members:
    │   ├── Project Manager
    │   ├── Lead Carpenter
    │   ├── Design Consultant
    │   ├── Site Supervisor
    │   └── Office Manager
```

---

### Section 4: Why Our Team

**Class:** `.gc-team-why`
**Background:** White
**Padding:** 80px 24px

```
Container Tree:
Section: .gc-team-why
│
├── Heading: "What Sets Our Team Apart"
│
└── Grid: 3 columns
    ├── Item 1:
    │   ├── Icon: Award
    │   ├── Title: "Experience"
    │   └── Text: "Our team brings decades of combined experience across residential and commercial construction."
    │
    ├── Item 2:
    │   ├── Icon: Certificate
    │   ├── Title: "Training"
    │   └── Text: "We invest in ongoing education and certifications to stay ahead of industry best practices."
    │
    └── Item 3:
        ├── Icon: Heart
        ├── Title: "Dedication"
        └── Text: "Every team member treats your project as if it were their own home."
```

---

### Section 5: Join Our Team (Optional)

**Class:** `.gc-team-careers`
**Background:** Warm White
**Padding:** 60px 24px

```
Container Tree:
Section: .gc-team-careers
│
└── Container: (max-width: 700px, centered, text-center)
    ├── Heading: "Interested in Joining Our Team?"
    ├── Text: "We're always looking for talented craftspeople who share our values."
    └── Button: "View Open Positions" → /careers/ (or mailto:)
```

---

### Section 6: CTA

```
Standard CTA Section:
├── Background: Deep Brown
├── Heading: "Let's Build Together"
├── Text: "Ready to work with a team that cares about your project as much as you do?"
└── Button: "Request an Estimate" (lightbox trigger)
```

---

## Team Member Card Styling

```css
.gc-team-card {
    background: #FFFFFF;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}

.gc-team-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
}

.gc-team-card__image {
    width: 100%;
    aspect-ratio: 1;
    object-fit: cover;
}

.gc-team-card__content {
    padding: 24px;
    text-align: center;
}

.gc-team-card__name {
    font-family: var(--gc-font-heading);
    font-size: 22px;
    color: #4C2A19;
    margin-bottom: 4px;
}

.gc-team-card__title {
    font-size: 14px;
    color: #B08D66;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 12px;
}

.gc-team-card__bio {
    font-size: 15px;
    color: #666666;
    line-height: 1.6;
}
```

---

## Image Placeholders

1. **Hero:** Group photo of team on site
2. **Founder:** Professional headshot of Micah
3. **Team Members:** Individual headshots (consistent style/background)

---

## Implementation Checklist

- [ ] Create Our Team page at /our-team/
- [ ] Build hero section
- [ ] Build leadership/founder section
- [ ] Build team grid with cards
- [ ] Add "What Sets Us Apart" section
- [ ] Add careers section (optional)
- [ ] Build final CTA
- [ ] Add team member content/photos
- [ ] Test responsive

---

End of Our Team page specification.
