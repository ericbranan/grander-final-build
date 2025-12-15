# Estimate Lightbox Template Specification

**Template Type:** Global Popup / Elementor Popup
**Conditions:** Triggered by data attribute or class
**Class Hook:** `gc-estimate-lightbox`

---

## Overview

The Request an Estimate lightbox is a global popup modal that can be triggered from any CTA across the site. It features a two-column layout with reassurance content on the left and the estimate form on the right. All desktop and tablet CTAs should trigger this lightbox, with a normal link fallback for accessibility and mobile.

---

## Trigger Rules

### Desktop/Tablet Behavior
- CTAs open the estimate lightbox
- Lightbox closes on: X button, backdrop click, ESC key, or form success

### Mobile Behavior
- CTAs link directly to `/request-an-estimate/` page
- No lightbox on mobile (screen real estate constraint)

### Fallback for Accessibility
All lightbox triggers must include a normal `href` attribute pointing to `/request-an-estimate/` in case JavaScript fails to load.

---

## Design Specifications

### Dimensions
| Property | Desktop | Tablet | Mobile |
|----------|---------|--------|--------|
| Max Width | 900px | 90% | N/A (page) |
| Max Height | 90vh | 90vh | N/A |
| Border Radius | 12px | 12px | N/A |

### Layout
| Breakpoint | Layout |
|------------|--------|
| Desktop | 2 columns (40% info / 60% form) |
| Tablet (< 900px) | Single column (stacked) |

### Colors
| Element | Color |
|---------|-------|
| Overlay | `rgba(0, 0, 0, 0.65)` |
| Modal Background | `#FDFBF8` |
| Info Panel BG | `#4C2A19` |
| Form Panel BG | `#FFFFFF` |

---

## Container Tree

```
Container: .gc-estimate-lightbox-overlay
├── Position: Fixed
├── Top/Right/Bottom/Left: 0
├── Background: rgba(0, 0, 0, 0.65)
├── Z-index: 10001
├── Display: Flex
├── Align Items: Center
├── Justify Content: Center
├── Padding: 24px
├── Opacity: 0 (hidden)
├── Visibility: Hidden
├── Transition: opacity 0.3s, visibility 0.3s
│
└── Container: .gc-estimate-lightbox
    ├── Position: Relative
    ├── Width: 100%
    ├── Max Width: 900px
    ├── Max Height: 90vh
    ├── Background: #FDFBF8
    ├── Border Radius: 12px
    ├── Overflow: Hidden
    ├── Box Shadow: 0 8px 40px rgba(0,0,0,0.25)
    ├── Transform: translateY(20px) (animate in)
    │
    ├── Button: .gc-estimate-lightbox__close
    │   ├── Position: Absolute
    │   ├── Top: 16px
    │   ├── Right: 16px
    │   ├── Width/Height: 40px
    │   ├── Background: Transparent
    │   ├── Border: None
    │   ├── Border Radius: 50%
    │   ├── Cursor: Pointer
    │   ├── Z-index: 10
    │   ├── Icon: × (close)
    │   ├── Icon Size: 24px
    │   └── Hover: Background rgba(0,0,0,0.1)
    │
    └── Container: .gc-estimate-lightbox__content
        ├── Display: Grid
        ├── Grid Template Columns: 40% 60%
        ├── Max Height: 90vh
        │
        ├── Container: .gc-estimate-lightbox__info
        │   ├── Background: #4C2A19
        │   ├── Padding: 48px 32px
        │   ├── Display: Flex
        │   ├── Flex Direction: Column
        │   ├── Justify Content: Center
        │   │
        │   ├── Heading Widget: Title
        │   │   ├── Text: "Request an estimate"
        │   │   ├── Tag: H2
        │   │   ├── Font: Libre Baskerville, 32px, 700
        │   │   ├── Color: #FDFBF8
        │   │   ├── Line Height: 1.2
        │   │   └── Margin Bottom: 24px
        │   │
        │   ├── Text Widget: Reassurance Copy
        │   │   ├── Dynamic: gc_estimate_reassurance_copy
        │   │   ├── Default: "Tell us about your project and we'll provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget."
        │   │   ├── Font: Corbel, 16px
        │   │   ├── Color: rgba(253, 251, 248, 0.85)
        │   │   ├── Line Height: 1.7
        │   │   └── Margin Bottom: 32px
        │   │
        │   └── Container: .gc-estimate-lightbox__trust
        │       ├── Display: Flex
        │       ├── Flex Wrap: Wrap
        │       ├── Gap: 16px
        │       ├── Margin Top: Auto
        │       │
        │       ├── Container: .gc-estimate-lightbox__trust-item
        │       │   ├── Display: Flex
        │       │   ├── Align Items: Center
        │       │   ├── Gap: 8px
        │       │   ├── Font: Corbel, 13px
        │       │   ├── Color: rgba(253, 251, 248, 0.7)
        │       │   │
        │       │   ├── Icon: HBA Badge (or placeholder)
        │       │   └── Text: "HBA Member"
        │       │
        │       ├── Container: .gc-estimate-lightbox__trust-item
        │       │   ├── Icon: BBB Badge
        │       │   └── Text: "BBB Accredited"
        │       │
        │       └── Container: .gc-estimate-lightbox__trust-item
        │           ├── Icon: Shield
        │           └── Text: "Licensed & Insured"
        │
        └── Container: .gc-estimate-lightbox__form
            ├── Background: #FFFFFF
            ├── Padding: 48px 32px
            ├── Overflow Y: Auto
            ├── Max Height: 90vh
            │
            └── [Insert: GC Estimate Form v1]
                └── Shortcode: [gravityform id="X" title="false" description="false" ajax="true"]
                    OR custom form HTML per FORMS-LIGHTBOX-BUILD-SPEC.md
```

---

## Form Fields (Required)

| # | Field | ID | Type | Required |
|---|-------|-----|------|----------|
| 1 | First Name | `gc_first_name` | text | Yes |
| 2 | Last Name | `gc_last_name` | text | Yes |
| 3 | Email | `gc_email` | email | Yes |
| 4 | Phone | `gc_phone` | tel | Yes |
| 5 | Project Type | `gc_project_type` | select | Yes |
| 6 | Project Address | `gc_project_address` | text | Yes (autocomplete) |
| 7 | City | `gc_project_city` | text | Yes (auto-fill) |
| 8 | State | `gc_project_state` | text | Yes (auto-fill) |
| 9 | Project Description | `gc_project_description` | textarea | Yes |
| 10 | Budget Range | `gc_budget_range` | select | No |
| 11 | Timeline | `gc_timeline` | select | No |
| 12 | Submit | — | button | — |

---

## JavaScript Requirements

### Lightbox Controller
```javascript
function initEstimateLightbox() {
    var overlay = document.querySelector('.gc-estimate-lightbox-overlay');
    var lightbox = document.querySelector('.gc-estimate-lightbox');
    var closeBtn = document.querySelector('.gc-estimate-lightbox__close');
    var triggers = document.querySelectorAll('[data-gc-estimate-trigger], .gc-estimate-trigger');

    if (!overlay || !lightbox) return;

    function openLightbox() {
        overlay.classList.add('is-active');
        document.body.style.overflow = 'hidden';
        setTimeout(function() {
            var firstInput = lightbox.querySelector('input, select, textarea');
            if (firstInput) firstInput.focus();
        }, 100);
    }

    function closeLightbox() {
        overlay.classList.remove('is-active');
        document.body.style.overflow = '';
    }

    // Open on trigger click
    triggers.forEach(function(trigger) {
        trigger.addEventListener('click', function(e) {
            // Only prevent default on desktop/tablet
            if (window.innerWidth > 767) {
                e.preventDefault();
                openLightbox();
            }
            // On mobile, let the normal link work
        });
    });

    // Close handlers
    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) closeLightbox();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && overlay.classList.contains('is-active')) {
            closeLightbox();
        }
    });

    window.gcEstimateLightbox = { open: openLightbox, close: closeLightbox };
}
```

---

## Trigger Implementation

### Button Trigger (Recommended)
```html
<a href="/request-an-estimate/"
   class="gc-btn gc-btn--primary gc-estimate-trigger"
   data-gc-estimate-trigger="true">
    Request an Estimate
</a>
```

### Header CTA
```html
<button class="gc-btn gc-btn--primary gc-estimate-trigger"
        data-gc-estimate-trigger="true"
        aria-haspopup="dialog">
    Request an Estimate
</button>
```

---

## Success State

After successful form submission, display:

```html
<div class="gc-form-success">
    <div class="gc-form-success__icon">
        <svg><!-- Checkmark icon --></svg>
    </div>
    <h3>Thank you!</h3>
    <p>Our team will review your project details and contact you within 1-2 business days with next steps.</p>
</div>
```

Then close lightbox after 3 seconds or on user action.

---

## Responsive Behavior

### Desktop (1025px+)
- 2-column layout (40/60 split)
- Lightbox opens centered in viewport
- Max width 900px

### Tablet (768px - 900px)
- Single column layout (stacked)
- Info panel on top, form below
- Scrollable content

### Mobile (767px and below)
- Lightbox disabled
- CTAs link directly to `/request-an-estimate/` page
- JavaScript detects viewport and allows normal navigation

---

## Placement

The lightbox HTML must be injected into the footer of every page. Options:

1. **Elementor Popup** — Create as popup template with manual trigger
2. **Footer Template** — Include in footer template as hidden element
3. **PHP Injection** — Add via `wp_footer` hook in theme/plugin

---

## Implementation Checklist

- [ ] Create lightbox HTML structure
- [ ] Add to footer template or as Elementor popup
- [ ] Style overlay and modal
- [ ] Build info panel with trust badges
- [ ] Insert estimate form (Gravity Forms or custom)
- [ ] Implement JavaScript controller
- [ ] Add trigger attributes to all CTAs site-wide
- [ ] Test open/close behavior
- [ ] Test ESC key close
- [ ] Test backdrop click close
- [ ] Test form submission and success state
- [ ] Verify mobile fallback (links to page)
- [ ] Test on multiple page types
- [ ] Verify accessibility (focus trap, ARIA)

---

End of estimate lightbox template specification.
