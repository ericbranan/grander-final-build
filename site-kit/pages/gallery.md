# Gallery Page Specification

**Slug:** `/gallery/`
**Template:** Elementor Full Width
**Class Hook:** `gc-gallery-v1`

---

## Overview

The Gallery page showcases Grander's completed projects with a filterable grid of images organized by project type.

---

## Section Structure

### Section 1: Hero
```
├── H1: "Our Work"
├── Subline: "Browse our portfolio of custom homes, outdoor spaces, and additions throughout the Upstate"
└── Background: Collage or featured project image
```

### Section 2: Filter Bar

**Class:** `.gc-gallery-filter-v1`
**Background:** White

```
Container Tree:
Section: .gc-gallery-filter-section
├── Background: #FFFFFF
├── Padding: 40px 24px
├── Position: Sticky (optional)
│
└── Container: .gc-gallery-filter-v1 (flex, centered, wrap, gap: 16px)
    │
    ├── Filter Button: "All Projects" (active by default)
    ├── Filter Button: "Custom Homes"
    ├── Filter Button: "Outdoor Spaces"
    ├── Filter Button: "Pool Houses & Garages"
    ├── Filter Button: "Sunrooms & Additions"
    └── Filter Button: "Renovations" (optional)

    Styling:
    ├── Background: Transparent
    ├── Border: 2px solid #E8DFD5
    ├── Border Radius: 0px
    ├── Padding: 10px 24px
    ├── Font: Corbel, 14px, 600, uppercase
    ├── Color: #333333
    │
    └── Active/Hover:
        ├── Background: #B08D66
        ├── Border Color: #B08D66
        └── Color: #4C2A19
```

### Section 3: Project Grid

**Class:** `.gc-gallery-grid`
**Background:** Warm White

```
Container Tree:
Section: .gc-gallery-grid-section
├── Background: #F5F3F0
├── Padding: 60px 24px 80px
│
└── Container: .gc-gallery-grid (max-width: 1400px, centered)
    ├── Display: Grid
    ├── Columns: 3 (desktop) / 2 (tablet) / 1 (mobile)
    ├── Gap: 24px
    │
    └── Gallery Items: (repeat for each project)
        │
        └── Container: .gc-gallery-item
            ├── Position: Relative
            ├── Overflow: Hidden
            ├── Border Radius: 0px
            ├── Cursor: Pointer
            ├── Data Attribute: data-category="custom-homes"
            │
            ├── Image:
            │   ├── Aspect Ratio: 4:3
            │   ├── Object Fit: Cover
            │   ├── Transition: transform 0.4s ease
            │   └── Hover: Scale(1.05)
            │
            └── Overlay: .gc-gallery-item__overlay
                ├── Position: Absolute
                ├── Bottom: 0
                ├── Left/Right: 0
                ├── Background: linear-gradient(transparent, rgba(76,42,25,0.8))
                ├── Padding: 24px
                ├── Opacity: 0
                ├── Transition: opacity 0.3s ease
                ├── Hover: Opacity 1
                │
                ├── Title: "Project Name"
                │   ├── Font: Libre Baskerville, 20px, 700
                │   └── Color: #FFFFFF
                │
                ├── Category: "Custom Home"
                │   ├── Font: Corbel, 12px, 600, uppercase
                │   └── Color: #B08D66
                │
                └── Location: "Greenville, SC"
                    ├── Font: Corbel, 14px
                    └── Color: rgba(255,255,255,0.8)
```

### Section 4: Lightbox Behavior

```
Lightbox Configuration:
├── Trigger: Click on gallery item
├── Content: Full-resolution image with navigation
├── Navigation: Previous/Next arrows
├── Counter: "1 of 12"
├── Close: X button, backdrop click, ESC key
├── Caption: Project name, category, location
└── Sharing: Disabled
```

### Section 5: CTA

```
Standard CTA:
├── Background: Deep Brown
├── Heading: "Inspired by What You See?"
├── Text: "Let's discuss how we can create something exceptional for you."
└── Button: "Request an Estimate" (lightbox trigger)
```

---

## Filter JavaScript

```javascript
// Gallery Filter
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.gc-gallery-filter__btn');
    const galleryItems = document.querySelectorAll('.gc-gallery-item');

    filterButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Update active state
            filterButtons.forEach(btn => btn.classList.remove('is-active'));
            button.classList.add('is-active');

            // Filter items
            const category = button.dataset.filter;

            galleryItems.forEach(function(item) {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                    setTimeout(() => item.classList.add('is-visible'), 10);
                } else {
                    item.classList.remove('is-visible');
                    setTimeout(() => item.style.display = 'none', 300);
                }
            });
        });
    });
});
```

---

## CSS Additions

```css
.gc-gallery-item {
    position: relative;
    overflow: hidden;
}

.gc-gallery-item img {
    width: 100%;
    aspect-ratio: 4/3;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.gc-gallery-item:hover img {
    transform: scale(1.05);
}

.gc-gallery-item__overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(76,42,25,0.85));
    padding: 24px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gc-gallery-item:hover .gc-gallery-item__overlay {
    opacity: 1;
}

/* Filter animation */
.gc-gallery-item {
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.gc-gallery-item:not(.is-visible) {
    opacity: 0;
    transform: scale(0.95);
}
```

---

## Sample Projects Data

| Project | Category | Location |
|---------|----------|----------|
| Thornwood Estate | Custom Homes | Travelers Rest, SC |
| Lakeside Retreat | Custom Homes | Lake Keowee, SC |
| Woodland Barndominium | Custom Homes | Spartanburg, SC |
| Covered Pavilion | Outdoor Spaces | Greenville, SC |
| Outdoor Kitchen | Outdoor Spaces | Simpsonville, SC |
| Pool House | Pool Houses | Greer, SC |
| Garage with Apartment | Pool Houses | Easley, SC |
| Four-Season Sunroom | Sunrooms | Mauldin, SC |

---

## Implementation Checklist

- [ ] Create Gallery page at /gallery/
- [ ] Build hero section
- [ ] Build filter bar with JavaScript
- [ ] Set up gallery grid (ACF repeater or CPT)
- [ ] Configure lightbox behavior
- [ ] Add hover overlays
- [ ] Build CTA section
- [ ] Add sample project data
- [ ] Test filter functionality
- [ ] Test lightbox on all devices
- [ ] Test responsive

---

End of Gallery page specification.
