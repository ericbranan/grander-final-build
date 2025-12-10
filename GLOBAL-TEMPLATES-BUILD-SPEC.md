# Global Templates Build Specification

Version: 1.0.0

Complete build instructions for all 12 global Elementor templates for Grander Construction. These are reusable section templates that can be inserted across multiple pages.

---

## Brand Reference (Module 1)

| Token | Value |
|-------|-------|
| Gold | `#B08D66` |
| Deep Brown | `#4C2A19` |
| Warm White | `#FDFBF8` |
| Text Dark | `#333333` |
| Text Muted | `#666666` |
| Heading Font | Baskerville |
| Body Font | Corbel |
| Max Width | 1200px |
| Vertical Padding | 100px (desktop) / 80px (tablet) / 60px (mobile) |
| Spacing Tokens | 16 / 24 / 32 / 48px only |

---

## Template List Overview

| # | Template Name | Class | Used On |
|---|---------------|-------|---------|
| 1 | Testimonial Slider | `.gc-testimonials-v1` | Home, Team, Services |
| 2 | FAQ Accordion | `.gc-faq-accordion-v1` | Process, Services, Contact |
| 3 | Trust Bar | `.gc-trust-bar` | Home, Services Landing, Contact |
| 4 | Events Strip | `.gc-events-strip` | Home, Contact (when enabled) |
| 5 | Social Feed | `.gc-social-feed-v1` | Home |
| 6 | Featured Projects | `.gc-featured-projects-v1` | Home, Services |
| 7 | Estimate Form | `.gc-estimate-form-v1` | Estimate page |
| 8 | Estimate Lightbox | `.gc-estimate-lightbox` | Popup/Modal |
| 9 | Service Portfolio | `.gc-portfolio-block-v1` | Service pages |
| 10 | Announcement Bar | `.gc-announcement-bar` | Site-wide (conditional) |
| 11 | Service Area Microline | `.gc-service-area-line` | Footer, Contact |
| 12 | Gallery Filter | `.gc-gallery-filter-v1` | Gallery page |

---

## Template 1: Testimonial Slider

### Overview
Horizontal carousel displaying client testimonials with quote, author name, and optional location.

### Elementor Structure

```
Section: .gc-testimonials-v1
├── Container (max-width: 1200px, centered)
│   ├── Heading Widget: Section Title
│   │   - Text: "What Our Clients Say"
│   │   - H2, Baskerville, 36px, Deep Brown
│   │   - Margin bottom: 48px
│   │
│   └── Loop Carousel Widget
│       - Source: Testimonial CPT or gc_testimonials repeater
│       - Posts per page: 5
│       - Slides to show: 1 (mobile) / 2 (tablet) / 3 (desktop)
│       - Autoplay: Yes (5 seconds)
│       - Navigation: Arrows (gold), Dots (gold)
│       │
│       └── Loop Item Template:
│           Container: .gc-testimonial-card
│           ├── Background: Warm White
│           ├── Padding: 32px
│           ├── Border radius: 8px
│           ├── Box shadow: 0 2px 8px rgba(0,0,0,0.06)
│           │
│           ├── Icon Widget: Quote Mark (optional)
│           │   - Icon: fa-quote-left
│           │   - Size: 24px
│           │   - Color: Gold, opacity 0.3
│           │
│           ├── Text Widget: Quote (.gc-testimonial-quote)
│           │   - Dynamic: gc_testimonial_quote
│           │   - Style: 18px, italic, Deep Brown
│           │   - Line height: 1.6
│           │   - Margin bottom: 24px
│           │
│           └── Container: Author Info (.gc-testimonial-author)
│               ├── Text Widget: Name
│               │   - Dynamic: {gc_testimonial_first_name} {gc_testimonial_last_initial}.
│               │   - Style: 16px, bold, Deep Brown
│               │
│               └── Text Widget: Location (.gc-testimonial-city)
│                   - Dynamic: gc_testimonial_city (optional)
│                   - Style: 14px, Text Muted
```

### ACF Bindings

**Option A: Using Testimonial CPT**
| Widget | Dynamic Tag | Field |
|--------|-------------|-------|
| Quote | ACF Field | `gc_testimonial_quote` |
| First Name | ACF Field | `gc_testimonial_first_name` |
| Last Initial | ACF Field | `gc_testimonial_last_initial` |
| City | ACF Field | `gc_testimonial_city` |

**Option B: Using Global Options Repeater**
| Widget | Dynamic Tag | Source |
|--------|-------------|--------|
| Quote | ACF Repeater | Options > gc_testimonials > quote |
| First Name | ACF Repeater | Options > gc_testimonials > first_name |
| Last Initial | ACF Repeater | Options > gc_testimonials > last_initial |
| Location | ACF Repeater | Options > gc_testimonials > location |

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-testimonials-v1` |
| Card | `gc-testimonial-card` |
| Quote text | `gc-testimonial-quote` |
| Author container | `gc-testimonial-author` |
| Location | `gc-testimonial-city` |

### Responsive Rules

| Breakpoint | Slides | Card Padding |
|------------|--------|--------------|
| Desktop | 3 | 32px |
| Tablet | 2 | 24px |
| Mobile | 1 | 24px |

---

## Template 2: FAQ Accordion

### Overview
Expandable accordion displaying questions and answers, filtered by FAQ group taxonomy.

### Elementor Structure

```
Section: .gc-faq-accordion-v1
├── Container (max-width: 900px, centered)
│   ├── Heading Widget: Section Title
│   │   - Text: "Frequently Asked Questions"
│   │   - H2, Baskerville, 36px, Deep Brown
│   │   - Margin bottom: 48px
│   │
│   └── Loop Grid Widget OR Accordion Widget
│       - Source: FAQ CPT
│       - Filter by: faq_group taxonomy (page-specific)
│       - Order: Menu order or Date
│       │
│       └── Loop Item Template:
│           Container: .gc-faq-item
│           ├── Border bottom: 1px solid #E5E5E5
│           │
│           ├── Container: .gc-faq-question (clickable)
│           │   ├── Padding: 24px 0
│           │   ├── Cursor: pointer
│           │   ├── Display: flex, justify-between
│           │   │
│           │   ├── Heading Widget: Question
│           │   │   - Dynamic: Post Title
│           │   │   - H3, Corbel, 18px, bold, Deep Brown
│           │   │
│           │   └── Icon Widget: Toggle Icon
│           │       - Icon: + (closed) / × (open)
│           │       - Controlled by CSS ::after
│           │
│           └── Container: .gc-faq-answer
│               - Padding: 0 0 24px
│               - Display: none (shown when .gc-faq-item--open)
│               │
│               └── Text Widget: Answer
│                   - Dynamic: ACF Field > gc_faq_answer
│                   - Style: 16px, Text Dark, line-height 1.7
```

### ACF Bindings

| Widget | Dynamic Tag | Field |
|--------|-------------|-------|
| Question | Post Title | (native) |
| Answer | ACF Field | `gc_faq_answer` |

### Filtering by Page Context

Each page should set which FAQ groups to display:

| Page | ACF Field | Example Terms |
|------|-----------|---------------|
| Build Process | `gc_process_faq_groups` | build-process |
| Custom Homes | `gc_service_faq_groups` | custom-homes, services-general |
| Contact | `gc_contact_faq_groups` | contact, estimate |

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-faq-accordion-v1` |
| Item | `gc-faq-item` |
| Question | `gc-faq-question` |
| Answer | `gc-faq-answer` |
| Open state | `gc-faq-item--open` |

### JS Behavior
The plugin automatically handles:
- Click on `.gc-faq-question` toggles `.gc-faq-item--open`
- Only one item open at a time (accordion mode)
- Keyboard accessibility (Enter/Space to toggle)

---

## Template 3: Trust Bar

### Overview
Horizontal strip of trust badges (HBA, BBB, Licensed & Insured, etc.) from global options.

### Elementor Structure

```
Section: .gc-trust-bar
├── Background: Warm White or transparent
├── Padding: 24px
│
└── Container: .gc-trust-bar__inner (flex, center, wrap, gap: 32px)
    │
    └── [For each gc_trust_items repeater item:]
        Container: .gc-trust-bar__item (flex, center, gap: 12px)
        │
        ├── Link Wrapper: .gc-trust-bar__link (if URL exists)
        │   ├── Image Widget: .gc-trust-bar__logo
        │   │   - Dynamic: gc_trust_items > logo
        │   │   - Max height: 40px
        │   │
        │   └── Text Widget: .gc-trust-bar__label
        │       - Dynamic: gc_trust_items > label
        │       - Style: 14px, Text Muted
```

### Implementation Options

**Option A: Use Shortcode (Recommended)**
```
[grander_trust_bar]
```

**Option B: Manual Build with ACF Repeater Widget**
Use Elementor Pro's ACF Repeater widget or a Loop Grid with custom query.

### ACF Bindings (Global Options)

| Widget | Repeater Field |
|--------|----------------|
| Logo | `gc_trust_items` > `logo` |
| Label | `gc_trust_items` > `label` |
| Link | `gc_trust_items` > `url` |
| Order | `gc_trust_items` > `order` |

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-trust-bar` |
| Inner container | `gc-trust-bar__inner` |
| Item | `gc-trust-bar__item` |
| Link | `gc-trust-bar__link` |
| Logo | `gc-trust-bar__logo` |
| Label | `gc-trust-bar__label` |

---

## Template 4: Events Strip

### Overview
Displays upcoming events from global options. Hidden when events are disabled.

### Elementor Structure

```
Section: .gc-events-strip
├── Visibility: Show only if gc_events_enabled = true
├── Background: Warm White
├── Padding: 48px 24px
│
└── Container (max-width: 1200px, centered)
    ├── Heading Widget: Section Title
    │   - Text: "Upcoming Events"
    │   - H2, Baskerville, 30px, Deep Brown
    │   - Margin bottom: 32px
    │
    └── Container: .gc-events-strip__inner (flex column, gap: 24px)
        │
        └── [For each gc_events repeater item:]
            Container: .gc-events-strip__event
            ├── Background: White
            ├── Padding: 24px
            ├── Border radius: 8px
            ├── Box shadow: 0 1px 3px rgba(0,0,0,0.1)
            ├── Display: flex, space-between, wrap
            │
            ├── Container: .gc-events-strip__content (flex: 1)
            │   ├── Heading Widget: .gc-events-strip__title
            │   │   - Dynamic: gc_events > name
            │   │   - H3, 20px, bold, Deep Brown
            │   │
            │   ├── Container: .gc-events-strip__meta (flex, gap)
            │   │   ├── Text Widget: .gc-events-strip__date
            │   │   │   - Dynamic: gc_events > date_range
            │   │   │
            │   │   └── Text Widget: .gc-events-strip__location
            │   │       - Dynamic: gc_events > location (if exists)
            │   │
            │   └── Text Widget: .gc-events-strip__summary
            │       - Dynamic: gc_events > summary
            │       - Style: 15px, Text Dark
            │
            └── Button Widget: .gc-events-strip__button
                - Dynamic text: gc_events > cta_label
                - Dynamic link: gc_events > cta_url
                - Style: Gold background, Deep Brown text
```

### Implementation Options

**Option A: Use Shortcode (Recommended)**
```
[grander_events_strip]
```
The shortcode automatically:
- Checks `gc_events_enabled`
- Filters out past events
- Renders nothing if no events

**Option B: Manual Build**
Use conditional visibility on the section to check `gc_events_enabled`.

### ACF Bindings (Global Options)

| Widget | Field |
|--------|-------|
| Toggle visibility | `gc_events_enabled` |
| Event name | `gc_events` > `name` |
| Date range | `gc_events` > `date_range` |
| Summary | `gc_events` > `summary` |
| Button text | `gc_events` > `cta_label` |
| Button URL | `gc_events` > `cta_url` |

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-events-strip` |
| Inner | `gc-events-strip__inner` |
| Event card | `gc-events-strip__event` |
| Title | `gc-events-strip__title` |
| Date | `gc-events-strip__date` |
| Location | `gc-events-strip__location` |
| Summary | `gc-events-strip__summary` |
| Button | `gc-events-strip__button` |

---

## Template 5: Social Feed

### Overview
Instagram feed grid embedded from Smash Balloon or similar plugin.

### Elementor Structure

```
Section: .gc-social-feed-v1
├── Background: Warm White
├── Padding: 80px 24px
│
└── Container (max-width: 1200px, centered)
    ├── Heading Widget: Section Title
    │   - Text: "Follow Along @GranderConstruction"
    │   - H2, Baskerville, 36px, Deep Brown
    │   - Text align: center
    │   - Margin bottom: 48px
    │
    └── Shortcode Widget
        - Shortcode: [instagram-feed feed=1]
        - OR: Smash Balloon Instagram widget
        - Display: 8-12 images grid
```

### Implementation Notes

1. Install Smash Balloon Instagram Feed plugin (or alternative)
2. Configure to pull from @granderconstruction
3. Create feed with:
   - Grid layout
   - 8-12 images
   - 4 columns desktop, 3 tablet, 2 mobile
   - Square crop
4. Use plugin's shortcode in Elementor

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-social-feed-v1` |

### Fallback
If no social feed plugin is available, display a static CTA to follow on Instagram with icon and button.

---

## Template 6: Featured Projects Carousel

### Overview
Carousel of selected projects with image, title, location, and link.

### Elementor Structure

```
Section: .gc-featured-projects-v1
├── Background: Warm White
├── Padding: 100px 24px
│
└── Container (max-width: 1200px, centered)
    ├── Container: Header Row (flex, space-between)
    │   ├── Heading Widget: Section Title
    │   │   - Text: "Featured Work"
    │   │   - H2, Baskerville, 36px, Deep Brown
    │   │
    │   └── Button Widget: View All
    │       - Text: "View All Projects"
    │       - Link: /gallery/
    │       - Style: Ghost, Deep Brown border
    │
    └── Loop Carousel Widget
        - Source: Relationship field > gc_featured_projects (Options)
        - OR: Project CPT with featured tag
        - Slides: 3 (desktop), 2 (tablet), 1 (mobile)
        - Gap: 24px
        - Navigation: Arrows
        │
        └── Loop Item Template:
            Container: .gc-project-card
            ├── Overflow: hidden
            ├── Border radius: 8px
            ├── Cursor: pointer
            │
            ├── Container: .gc-project-image
            │   ├── Aspect ratio: 4:3
            │   │
            │   └── Image Widget
            │       - Dynamic: Featured Image or gc_project_gallery[0]
            │       - Object fit: cover
            │       - Hover: scale 1.05
            │
            └── Container: .gc-project-info
                ├── Padding: 24px
                ├── Background: White
                │
                ├── Heading Widget: .gc-project-title
                │   - Dynamic: Post Title
                │   - H3, Corbel, 20px, bold, Deep Brown
                │
                ├── Text Widget: .gc-project-location
                │   - Dynamic: {gc_project_location_city}, {gc_project_location_state}
                │   - Style: 14px, Text Muted
                │
                └── Text Widget: .gc-project-summary (optional)
                    - Dynamic: gc_project_short_summary
                    - Truncate: 100 chars
```

### ACF Bindings

| Widget | Field | Source |
|--------|-------|--------|
| Projects (Home) | `gc_featured_projects` | Options |
| Projects (Service) | `gc_service_featured_projects` | Page |
| Image | Featured Image or `gc_project_gallery` | Post |
| Title | Post Title | Post |
| City | `gc_project_location_city` | Post |
| State | `gc_project_location_state` | Post |
| Summary | `gc_project_short_summary` | Post |

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-featured-projects-v1` |
| Card | `gc-project-card` |
| Image container | `gc-project-image` |
| Info container | `gc-project-info` |
| Title | `gc-project-title` |
| Location | `gc-project-location` |
| Summary | `gc-project-summary` |

---

## Template 7: Estimate Form

### Overview
Full estimate request form for the dedicated Estimate page.

### Elementor Structure

```
Section: .gc-estimate-form-v1
├── Background: Warm White
├── Padding: 80px 24px
│
└── Container (max-width: 800px, centered)
    ├── Heading Widget: Form Title
    │   - Dynamic: gc_estimate_form_headline
    │   - Default: "Request an Estimate"
    │   - H1, Baskerville, 42px, Deep Brown
    │   - Text align: center
    │
    ├── Text Widget: Form Description
    │   - Dynamic: gc_estimate_reassurance_copy
    │   - Style: 18px, Text Dark, centered
    │   - Margin bottom: 48px
    │
    ├── Shortcode Widget: Gravity Form
    │   - Dynamic shortcode: gc_estimate_form_shortcode
    │   - OR: [grander_estimate_form]
    │
    └── Container: Trust Reassurance (optional)
        - Use Trust Bar template below form
        - Or static text: "Licensed • Insured • BBB Accredited"
```

### ACF Bindings (Estimate Page)

| Widget | Field |
|--------|-------|
| Headline | `gc_estimate_form_headline` |
| Reassurance copy | `gc_estimate_reassurance_copy` |
| Form shortcode | `gc_estimate_form_shortcode` |

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-estimate-form-v1` |
| Form wrapper | `gc-estimate-form` |

---

## Template 8: Estimate Lightbox (Popup)

### Overview
Modal popup containing the estimate form, triggered from buttons across the site.

### Elementor Structure (Popup Template)

```
Popup: .gc-estimate-lightbox
├── Settings:
│   - Width: 900px (desktop), 100% (mobile)
│   - Height: Auto
│   - Position: Center
│   - Animation: Fade in
│   - Close button: Top right
│   - Overlay: Dark (#000, 60% opacity)
│
└── Container: Two Column Layout (50/50, stack on mobile)
    │
    ├── Column 1: Left Content
    │   ├── Padding: 48px
    │   ├── Background: Deep Brown
    │   │
    │   ├── Heading Widget
    │   │   - Text: "Request an Estimate"
    │   │   - H2, Baskerville, 32px, Warm White
    │   │   - Margin bottom: 24px
    │   │
    │   ├── Text Widget
    │   │   - Dynamic: gc_estimate_reassurance_copy
    │   │   - Style: 16px, Warm White (80% opacity)
    │   │   - Margin bottom: 32px
    │   │
    │   └── Container: Mini Trust Bar
    │       - Icons only: HBA, BBB, Licensed
    │       - Small, white/gold
    │
    └── Column 2: Form
        ├── Padding: 48px
        ├── Background: White
        │
        └── Shortcode Widget
            - [grander_estimate_form]
            - Gravity Forms renders here
```

### Popup Trigger Setup

In Elementor, any button can trigger this popup:
1. Set button Link > Dynamic > Popup
2. Select "gc-estimate-lightbox" popup
3. Action: Open Popup

### CSS Classes

| Element | Class |
|---------|-------|
| Popup container | `gc-estimate-lightbox` |
| Left column | `gc-estimate-lightbox__info` |
| Right column | `gc-estimate-lightbox__form` |

---

## Template 9: Service Portfolio Block

### Overview
Portfolio showcase section for individual service pages, using repeater field.

### Elementor Structure

```
Section: .gc-portfolio-block-v1
├── Background: White
├── Padding: 80px 24px
│
└── Container (max-width: 1200px, centered)
    │
    └── Loop/Repeater: gc_service_portfolio_sections
        │
        └── [For each portfolio section:]
            Container: .gc-portfolio-section
            ├── Margin bottom: 80px
            │
            ├── Container: Header Row
            │   ├── Heading Widget: .gc-portfolio-title
            │   │   - Dynamic: gc_service_portfolio_sections > title
            │   │   - H3, Baskerville, 28px, Deep Brown
            │   │
            │   └── Text Widget: .gc-portfolio-location
            │       - Dynamic: gc_service_portfolio_sections > location
            │       - Style: 16px, Text Muted
            │
            ├── Text Widget: .gc-portfolio-summary
            │   - Dynamic: gc_service_portfolio_sections > summary
            │   - Style: 16px, Text Dark
            │   - Max width: 800px
            │   - Margin bottom: 32px
            │
            ├── Container: .gc-portfolio-design-image (conditional)
            │   - Visibility: gc_service_portfolio_sections > has_design_image = true
            │   │
            │   ├── Text Widget: Label
            │   │   - Text: "Design Rendering"
            │   │   - Style: 12px, uppercase, Text Muted
            │   │
            │   └── Image Widget
            │       - Dynamic: gc_service_portfolio_sections > design_image
            │       - Max width: 600px
            │       - Margin bottom: 24px
            │
            └── Gallery Widget: .gc-portfolio-gallery
                - Dynamic: gc_service_portfolio_sections > gallery
                - Columns: 4 (desktop), 3 (tablet), 2 (mobile)
                - Gap: 16px
                - Lightbox: Enabled
                - Aspect ratio: 4:3
```

### ACF Bindings (Service Page)

| Widget | Repeater Subfield |
|--------|-------------------|
| Title | `gc_service_portfolio_sections` > `title` |
| Location | `gc_service_portfolio_sections` > `location` |
| Summary | `gc_service_portfolio_sections` > `summary` |
| Design toggle | `gc_service_portfolio_sections` > `has_design_image` |
| Design image | `gc_service_portfolio_sections` > `design_image` |
| Gallery | `gc_service_portfolio_sections` > `gallery` |

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-portfolio-block-v1` |
| Portfolio section | `gc-portfolio-section` |
| Title | `gc-portfolio-title` |
| Location | `gc-portfolio-location` |
| Summary | `gc-portfolio-summary` |
| Design image | `gc-portfolio-design-image` |
| Gallery | `gc-portfolio-gallery` |

---

## Template 10: Announcement Bar

### Overview
Site-wide announcement bar that appears at the very top when enabled.

### Elementor Structure

```
Section: .gc-announcement-bar
├── Visibility: gc_announcement_enabled = true
├── Position: Relative (above header)
├── Background: Gold
├── Padding: 12px 24px
│
└── Container (max-width: 1200px, flex, center, space-between)
    │
    ├── Text Widget: Message
    │   - Dynamic: gc_announcement_text
    │   - Style: 14px, Deep Brown, centered
    │
    └── Button Widget: Dismiss (optional)
        - Icon: × (close)
        - Style: Ghost, no border
        - JS: Sets cookie to hide for session
```

### ACF Bindings (Global Options)

| Widget | Field |
|--------|-------|
| Toggle | `gc_announcement_enabled` |
| Text | `gc_announcement_text` |
| Link (optional) | `gc_announcement_url` |

### CSS Classes

| Element | Class |
|---------|-------|
| Bar | `gc-announcement-bar` |

### CSS

```css
.gc-announcement-bar {
    background: var(--gc-gold);
    padding: 12px 24px;
    text-align: center;
}

.gc-announcement-bar p {
    margin: 0;
    color: var(--gc-deep-brown);
    font-size: 14px;
    font-family: var(--gc-font-body);
}

.gc-announcement-bar a {
    color: var(--gc-deep-brown);
    text-decoration: underline;
    font-weight: 600;
}
```

---

## Template 11: Service Area Microline

### Overview
Single line displaying service area, used in footer and contact page.

### Implementation

**Option A: Use Shortcode**
```
[grander_service_area_line]
```

**Option B: Text Widget with Dynamic Tag**
- Dynamic: ACF Field > Options > `gc_service_area_text`

### Elementor Structure

```
Text Widget: .gc-service-area-line
├── Dynamic: gc_service_area_text
├── Style: 14px, Text Muted, centered
├── Example output: "Serving Greenville, Anderson, Spartanburg, and the Upstate SC region"
```

### ACF Binding

| Widget | Field | Source |
|--------|-------|--------|
| Text | `gc_service_area_text` | Options |

### CSS Class

| Element | Class |
|---------|-------|
| Text | `gc-service-area-line` |

---

## Template 12: Gallery Filter

### Overview
Filterable gallery grid for the main Gallery page with service category filters.

### Elementor Structure

```
Section: .gc-gallery-filter-v1
├── Background: Warm White
├── Padding: 80px 24px
│
└── Container (max-width: 1200px, centered)
    │
    ├── Container: Filter Buttons (.gc-gallery-filters)
    │   ├── Display: flex, center, wrap, gap: 16px
    │   ├── Margin bottom: 48px
    │   │
    │   ├── Button: All
    │   │   - Text: "All Projects"
    │   │   - Class: gc-filter-btn gc-filter-btn--active
    │   │   - Data attribute: data-filter="*"
    │   │
    │   ├── Button: Custom Homes
    │   │   - Text: "Custom Homes"
    │   │   - Class: gc-filter-btn
    │   │   - Data attribute: data-filter="custom-homes"
    │   │
    │   ├── Button: Outdoor Spaces
    │   │   - Text: "Outdoor Spaces"
    │   │   - Class: gc-filter-btn
    │   │   - Data attribute: data-filter="outdoor-spaces"
    │   │
    │   ├── Button: Pool Houses, Garages & ADUs
    │   │   - Class: gc-filter-btn
    │   │   - Data attribute: data-filter="pool-houses-garages-adus"
    │   │
    │   └── Button: Sunrooms & Additions
    │       - Class: gc-filter-btn
    │       - Data attribute: data-filter="sunrooms-additions"
    │
    └── Loop Grid: .gc-gallery-grid
        - Source: Project CPT
        - Order: Date DESC
        - Columns: 4 (desktop), 3 (tablet), 2 (mobile)
        - Gap: 16px
        - Each item gets: data-category="{service_category_slug}"
        │
        └── Loop Item Template:
            Container: .gc-gallery-item
            ├── Data attribute: data-category from service_category
            │
            ├── Container: .gc-gallery-image
            │   ├── Aspect ratio: 4:3
            │   ├── Overflow: hidden
            │   │
            │   └── Image Widget
            │       - Dynamic: Featured Image or gc_project_gallery[0]
            │       - Object fit: cover
            │       - Hover: scale 1.05, overlay
            │
            └── Container: .gc-gallery-overlay (on hover)
                ├── Position: absolute, full cover
                ├── Background: rgba(76, 42, 25, 0.8)
                ├── Opacity: 0 → 1 on hover
                │
                ├── Heading Widget
                │   - Dynamic: Post Title
                │   - H3, Warm White, 18px
                │
                └── Text Widget
                    - Dynamic: gc_project_location_city
                    - Warm White, 14px
```

### JS for Filtering

```javascript
/**
 * Gallery Filter
 * Filters gallery items by service category
 */
function initGalleryFilter() {
    var filterBtns = document.querySelectorAll('.gc-filter-btn');
    var galleryItems = document.querySelectorAll('.gc-gallery-item');

    if (!filterBtns.length || !galleryItems.length) return;

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var filter = this.dataset.filter;

            // Update active state
            filterBtns.forEach(function(b) {
                b.classList.remove('gc-filter-btn--active');
            });
            this.classList.add('gc-filter-btn--active');

            // Filter items
            galleryItems.forEach(function(item) {
                var category = item.dataset.category;
                if (filter === '*' || category === filter) {
                    item.style.display = '';
                    item.classList.remove('gc-gallery-item--hidden');
                } else {
                    item.style.display = 'none';
                    item.classList.add('gc-gallery-item--hidden');
                }
            });
        });
    });
}

document.addEventListener('DOMContentLoaded', initGalleryFilter);
```

### CSS Classes

| Element | Class |
|---------|-------|
| Section | `gc-gallery-filter-v1` |
| Filters container | `gc-gallery-filters` |
| Filter button | `gc-filter-btn` |
| Active filter | `gc-filter-btn--active` |
| Grid | `gc-gallery-grid` |
| Item | `gc-gallery-item` |
| Image container | `gc-gallery-image` |
| Overlay | `gc-gallery-overlay` |

### CSS for Filter Buttons

```css
.gc-gallery-filters {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 16px;
    margin-bottom: 48px;
}

.gc-filter-btn {
    padding: 12px 24px;
    background: transparent;
    border: 1px solid var(--gc-deep-brown);
    color: var(--gc-deep-brown);
    font-family: var(--gc-font-body);
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.gc-filter-btn:hover,
.gc-filter-btn--active {
    background: var(--gc-deep-brown);
    color: var(--gc-warm-white);
}

.gc-gallery-item {
    transition: opacity 0.3s ease;
}

.gc-gallery-item--hidden {
    opacity: 0;
}
```

---

## Summary: Template Checklist

### Build Order (Recommended)

1. [ ] Trust Bar (simple, reused often)
2. [ ] Service Area Microline (simple text)
3. [ ] Announcement Bar (conditional display)
4. [ ] FAQ Accordion (uses plugin JS)
5. [ ] Testimonial Slider (carousel)
6. [ ] Featured Projects (carousel)
7. [ ] Events Strip (conditional)
8. [ ] Social Feed (requires plugin)
9. [ ] Estimate Form (page template)
10. [ ] Estimate Lightbox (popup)
11. [ ] Service Portfolio (repeater-based)
12. [ ] Gallery Filter (requires JS)

### Save Each as Template

After building each template:
1. Right-click section > Save as Template
2. Name: "GC [Template Name] v1"
3. Example: "GC Testimonial Slider v1"

### Insert on Pages

Use Elementor's "Add Template" feature to insert saved templates on pages.

---

End of specification.
