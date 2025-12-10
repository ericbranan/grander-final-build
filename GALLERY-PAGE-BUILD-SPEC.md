# Gallery Page Build Specification

Version: 2025-12-08
Status: Production Ready
Template: Single page (gallery)

---

## Overview

The Gallery page showcases all Grander Construction projects in a filterable grid layout. Users can filter by service category and project tags to find specific project types. Each project card links to a lightbox view or project detail.

---

## Section 1: Hero

### Container Hierarchy

```
Section: gc-hero gc-hero--gallery
├── Container: gc-hero__overlay
│   └── Container: gc-hero__content (max-width: 900px, centered)
│       ├── Heading H1: gc-hero__headline
│       │   └── ACF: gc_gallery_hero_headline
│       └── Text: gc-hero__subline
│           └── ACF: gc_gallery_hero_subline
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, min-height: 50vh, background: ACF image gc_gallery_hero_image with overlay |
| Overlay | Container | Background: linear-gradient(180deg, rgba(44,33,26,0.5) 0%, rgba(44,33,26,0.7) 100%) |
| Content | Container | Max-width: 900px, margin: 0 auto, padding: 120px 24px 80px, text-align: center |
| Headline | Heading | H1, Baskerville, 52px desktop, color: #FFFFFF |
| Subline | Text | Corbel, 20px, color: rgba(255,255,255,0.9), max-width: 700px, margin: 0 auto |

### ACF Bindings

| Element | Field Name | Type |
|---------|------------|------|
| Headline | gc_gallery_hero_headline | text |
| Subline | gc_gallery_hero_subline | textarea |
| Background | gc_gallery_hero_image | image |

### Final Copy

**Headline:** Our project gallery

**Subline:** A curated collection of custom homes and outdoor living spaces built with purpose across Upstate South Carolina. Browse by category or explore the full portfolio.

---

## Section 2: Introduction

### Container Hierarchy

```
Section: gc-gallery-intro
└── Container: gc-gallery-intro__inner (max-width: 800px, centered)
    └── Text: gc-gallery-intro__text
        └── ACF: gc_gallery_intro
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, background: var(--gc-warm-white), padding: 64px 24px |
| Inner | Container | Max-width: 800px, margin: 0 auto, text-align: center |
| Text | Text Editor | Corbel, 18px, line-height: 1.7, color: var(--gc-deep-brown) |

### ACF Binding

| Element | Field Name | Type |
|---------|------------|------|
| Text | gc_gallery_intro | wysiwyg |

### Final Copy

Every project in this gallery represents a family's vision brought to life through thoughtful design and quality construction. From full custom home builds to outdoor living transformations, each space reflects the Grander commitment to craftsmanship, durability, and personalized service. We invite you to explore and imagine what we might create together.

---

## Section 3: Filter Bar

### Container Hierarchy

```
Section: gc-gallery-filters
└── Container: gc-gallery-filters__inner (max-width: 1200px, centered)
    ├── Container: gc-gallery-filters__group gc-gallery-filters__group--categories
    │   ├── Text: gc-gallery-filters__label ("Filter by service")
    │   └── Container: gc-gallery-filters__buttons
    │       ├── Button: gc-filter-btn gc-filter-btn--active [data-filter="all"]
    │       │   └── Text: "All projects"
    │       ├── Button: gc-filter-btn [data-filter="custom-homes"]
    │       │   └── Text: "Custom homes"
    │       ├── Button: gc-filter-btn [data-filter="outdoor-spaces"]
    │       │   └── Text: "Outdoor spaces"
    │       ├── Button: gc-filter-btn [data-filter="pool-houses-garages-adus"]
    │       │   └── Text: "Pool houses and more"
    │       └── Button: gc-filter-btn [data-filter="sunrooms-additions"]
    │           └── Text: "Sunrooms and additions"
    │
    └── Container: gc-gallery-filters__group gc-gallery-filters__group--tags
        ├── Text: gc-gallery-filters__label ("Refine by feature")
        └── Container: gc-gallery-filters__tags
            ├── Button: gc-tag-btn [data-tag="covered-patio"]
            │   └── Text: "Covered patio"
            ├── Button: gc-tag-btn [data-tag="fireplace"]
            │   └── Text: "Fireplace"
            ├── Button: gc-tag-btn [data-tag="pool"]
            │   └── Text: "Pool"
            ├── Button: gc-tag-btn [data-tag="outdoor-kitchen"]
            │   └── Text: "Outdoor kitchen"
            ├── Button: gc-tag-btn [data-tag="screen-porch"]
            │   └── Text: "Screen porch"
            └── Button: gc-tag-btn [data-tag="modern"]
            │   └── Text: "Modern"
            └── Button: gc-tag-btn gc-tag-btn--clear [data-tag="clear"]
                └── Text: "Clear filters"
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, background: #FFFFFF, padding: 48px 24px, border-bottom: 1px solid var(--gc-border-light) |
| Inner | Container | Max-width: 1200px, margin: 0 auto |
| Filter Group | Container | Flex row, gap: 16px, align: center, margin-bottom: 24px |
| Label | Text | Corbel, 14px, font-weight: 600, color: var(--gc-medium-brown), text-transform: uppercase, letter-spacing: 0.5px |
| Buttons Container | Container | Flex row, flex-wrap: wrap, gap: 12px |
| Filter Button | Button | Corbel, 15px, padding: 10px 20px, border-radius: 4px, border: 1px solid var(--gc-border-medium), background: transparent, color: var(--gc-deep-brown) |
| Tag Button | Button | Corbel, 14px, padding: 8px 16px, border-radius: 20px, border: 1px solid var(--gc-border-light), background: transparent, color: var(--gc-medium-brown) |

### Filter Button States

**Default (.gc-filter-btn):**
- Background: transparent
- Border: 1px solid #D4C4B5
- Color: var(--gc-deep-brown)

**Hover (.gc-filter-btn:hover):**
- Background: var(--gc-warm-white)
- Border-color: var(--gc-gold)

**Active (.gc-filter-btn--active):**
- Background: var(--gc-deep-brown)
- Border-color: var(--gc-deep-brown)
- Color: #FFFFFF

### Tag Button States

**Default (.gc-tag-btn):**
- Background: transparent
- Border: 1px solid #E8E0D8
- Color: var(--gc-medium-brown)

**Hover (.gc-tag-btn:hover):**
- Background: var(--gc-warm-white)
- Border-color: var(--gc-gold)

**Active (.gc-tag-btn--active):**
- Background: var(--gc-gold)
- Border-color: var(--gc-gold)
- Color: var(--gc-deep-brown)

**Clear (.gc-tag-btn--clear):**
- Border-style: dashed
- Opacity: 0.7 when no tags selected

### Taxonomy Connections

The filter buttons connect to taxonomies registered in grander-core:

| Filter Type | Taxonomy | Terms |
|-------------|----------|-------|
| Service Category | service_category | custom-homes, outdoor-spaces, pool-houses-garages-adus, sunrooms-additions |
| Project Tags | project_tag | covered-patio, fireplace, pool, outdoor-kitchen, screen-porch, modern, farmhouse, contemporary, etc. |

### JavaScript Filter Logic

The filtering uses data attributes and JavaScript to show/hide project cards:

```javascript
// Filter by service_category
document.querySelectorAll('.gc-filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const filter = this.dataset.filter;
        // Update active state
        document.querySelectorAll('.gc-filter-btn').forEach(b => b.classList.remove('gc-filter-btn--active'));
        this.classList.add('gc-filter-btn--active');
        // Filter projects
        filterProjects();
    });
});

// Filter by project_tag (toggle, multiple allowed)
document.querySelectorAll('.gc-tag-btn:not(.gc-tag-btn--clear)').forEach(btn => {
    btn.addEventListener('click', function() {
        this.classList.toggle('gc-tag-btn--active');
        filterProjects();
    });
});

// Clear all tag filters
document.querySelector('.gc-tag-btn--clear').addEventListener('click', function() {
    document.querySelectorAll('.gc-tag-btn--active').forEach(b => b.classList.remove('gc-tag-btn--active'));
    filterProjects();
});

function filterProjects() {
    const activeCategory = document.querySelector('.gc-filter-btn--active').dataset.filter;
    const activeTags = Array.from(document.querySelectorAll('.gc-tag-btn--active')).map(b => b.dataset.tag);

    document.querySelectorAll('.gc-project-card').forEach(card => {
        const cardCategory = card.dataset.category;
        const cardTags = card.dataset.tags ? card.dataset.tags.split(',') : [];

        let showByCategory = (activeCategory === 'all' || cardCategory === activeCategory);
        let showByTags = (activeTags.length === 0 || activeTags.some(tag => cardTags.includes(tag)));

        card.style.display = (showByCategory && showByTags) ? '' : 'none';
    });

    // Update project count
    updateProjectCount();
}
```

---

## Section 4: Project Grid

### Container Hierarchy

```
Section: gc-gallery-grid
└── Container: gc-gallery-grid__inner (max-width: 1200px, centered)
    ├── Container: gc-gallery-grid__header
    │   ├── Text: gc-gallery-grid__count
    │   │   └── Dynamic: "Showing X projects"
    │   └── Select: gc-gallery-grid__sort (optional)
    │       └── Options: "Newest first", "Oldest first", "A-Z"
    │
    └── Container: gc-gallery-grid__items (CSS Grid: 3 columns)
        └── Loop Grid: Query Projects CPT
            └── Loop Item Template: gc-project-card
```

### Elementor Loop Grid Settings

| Setting | Value |
|---------|-------|
| Source | Projects CPT |
| Posts per page | 12 (with Load More) |
| Order by | Date (descending) |
| Template | Project Card (saved template) |
| Columns | 3 (desktop), 2 (tablet), 1 (mobile) |
| Gap | 32px |

### Project Card Template (Loop Item)

```
Container: gc-project-card [data-category="{service_category.slug}"] [data-tags="{project_tag.slugs}"]
├── Container: gc-project-card__image-wrap
│   ├── Image: gc-project-card__image
│   │   └── Dynamic: Featured Image (large)
│   └── Container: gc-project-card__overlay
│       └── Icon: gc-project-card__expand (expand icon)
│
└── Container: gc-project-card__content
    ├── Text: gc-project-card__category
    │   └── Dynamic: service_category term name
    ├── Heading H3: gc-project-card__title
    │   └── Dynamic: Post Title
    └── Text: gc-project-card__location
        └── Dynamic: gc_project_location_city + ", " + gc_project_location_state
```

### Elementor Settings for Project Card

| Element | Widget | Settings |
|---------|--------|----------|
| Card Container | Container | Background: #FFFFFF, border-radius: 8px, overflow: hidden, box-shadow: 0 2px 8px rgba(0,0,0,0.06), cursor: pointer |
| Image Wrap | Container | Position: relative, aspect-ratio: 4/3, overflow: hidden |
| Image | Image | Object-fit: cover, width: 100%, height: 100%, transition: transform 0.4s ease |
| Overlay | Container | Position: absolute, inset: 0, background: rgba(44,33,26,0), opacity: 0, transition: all 0.3s ease, display: flex, align: center, justify: center |
| Expand Icon | Icon | Color: #FFFFFF, size: 32px, opacity: 0, transform: scale(0.8) |
| Content | Container | Padding: 24px |
| Category | Text | Corbel, 12px, text-transform: uppercase, letter-spacing: 1px, color: var(--gc-gold), margin-bottom: 8px |
| Title | Heading | H3, Baskerville, 22px, color: var(--gc-deep-brown), margin-bottom: 8px, line-height: 1.3 |
| Location | Text | Corbel, 14px, color: var(--gc-medium-brown) |

### Project Card Hover States

```css
.gc-project-card:hover .gc-project-card__image {
    transform: scale(1.05);
}

.gc-project-card:hover .gc-project-card__overlay {
    background: rgba(44,33,26,0.6);
    opacity: 1;
}

.gc-project-card:hover .gc-project-card__expand {
    opacity: 1;
    transform: scale(1);
}

.gc-project-card:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
}
```

### Dynamic Tag Bindings

| Element | Dynamic Tag | Source |
|---------|-------------|--------|
| data-category | Custom Attribute | service_category taxonomy slug |
| data-tags | Custom Attribute | project_tag taxonomy slugs (comma-separated) |
| Featured Image | Featured Image | Post thumbnail (large size) |
| Category Text | Term Name | service_category |
| Title | Post Title | Post title |
| City | ACF Field | gc_project_location_city |
| State | ACF Field | gc_project_location_state |

### Load More Button

```
Container: gc-gallery-grid__load-more
└── Button: gc-btn gc-btn--outline gc-load-more-btn
    └── Text: "Load more projects"
```

| Element | Widget | Settings |
|---------|--------|----------|
| Container | Container | Margin-top: 48px, text-align: center |
| Button | Button | Corbel, 16px, padding: 14px 32px, border: 2px solid var(--gc-deep-brown), background: transparent, color: var(--gc-deep-brown), border-radius: 4px |

---

## Section 5: Project Lightbox

When a project card is clicked, open a lightbox showing the project gallery.

### Lightbox Structure

```
Container: gc-project-lightbox (hidden by default)
├── Container: gc-project-lightbox__backdrop
│
└── Container: gc-project-lightbox__content
    ├── Button: gc-project-lightbox__close
    │   └── Icon: X (close)
    │
    ├── Container: gc-project-lightbox__gallery
    │   ├── Container: gc-project-lightbox__main-image
    │   │   └── Image: Main gallery image
    │   │
    │   └── Container: gc-project-lightbox__nav
    │       ├── Button: gc-project-lightbox__prev
    │       │   └── Icon: Arrow left
    │       └── Button: gc-project-lightbox__next
    │           └── Icon: Arrow right
    │
    └── Container: gc-project-lightbox__info
        ├── Text: gc-project-lightbox__category
        ├── Heading H2: gc-project-lightbox__title
        ├── Text: gc-project-lightbox__location
        ├── Text: gc-project-lightbox__summary
        │   └── ACF: gc_project_short_summary
        │
        └── Container: gc-project-lightbox__thumbs
            └── Loop: Gallery thumbnails (clickable)
```

### Lightbox Behavior

1. Click project card → Open lightbox with project data
2. Load project gallery images via AJAX or data attributes
3. Navigate with arrows or thumbnail clicks
4. Close with X button, backdrop click, or Escape key
5. Keyboard navigation: Left/Right arrows for gallery

### Lightbox JavaScript Integration

```javascript
// Open lightbox
document.querySelectorAll('.gc-project-card').forEach(card => {
    card.addEventListener('click', function(e) {
        e.preventDefault();
        const projectId = this.dataset.projectId;
        openProjectLightbox(projectId);
    });
});

async function openProjectLightbox(projectId) {
    // Fetch project data via REST API
    const response = await fetch(`/wp-json/wp/v2/project/${projectId}?_embed`);
    const project = await response.json();

    // Populate lightbox
    populateLightbox(project);

    // Show lightbox
    document.querySelector('.gc-project-lightbox').classList.add('gc-project-lightbox--active');
    document.body.classList.add('gc-lightbox-open');
}
```

---

## Section 6: Empty State

When no projects match the current filters, show a friendly message.

### Container Hierarchy

```
Container: gc-gallery-empty (hidden by default)
├── Icon: gc-gallery-empty__icon
│   └── Icon: search or folder
├── Heading H3: gc-gallery-empty__title
│   └── Text: "No projects match your filters"
└── Text: gc-gallery-empty__message
    └── Text: "Try adjusting your filter selections or browse all projects."
└── Button: gc-gallery-empty__reset
    └── Text: "View all projects"
```

---

## Section 7: CTA

### Container Hierarchy

```
Section: gc-gallery-cta
└── Container: gc-gallery-cta__inner (max-width: 900px, centered)
    ├── Heading H2: gc-gallery-cta__headline
    │   └── ACF: gc_gallery_cta_headline
    ├── Text: gc-gallery-cta__body
    │   └── ACF: gc_gallery_cta_body
    └── Button: gc-btn gc-btn--primary gc-estimate-trigger
        └── ACF: gc_gallery_cta_button_label
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, background: var(--gc-deep-brown), padding: 96px 24px |
| Inner | Container | Max-width: 900px, margin: 0 auto, text-align: center |
| Headline | Heading | H2, Baskerville, 40px, color: #FFFFFF, margin-bottom: 24px |
| Body | Text | Corbel, 18px, color: rgba(255,255,255,0.9), margin-bottom: 32px, max-width: 700px, margin-left/right: auto |
| Button | Button | gc-btn gc-btn--primary gc-estimate-trigger |

### ACF Bindings

| Element | Field Name | Type |
|---------|------------|------|
| Headline | gc_gallery_cta_headline | text |
| Body | gc_gallery_cta_body | textarea |
| Button Label | gc_gallery_cta_button_label | text |

### Final Copy

**Headline:** Ready to see your vision come to life?

**Body:** Every project in our gallery started with a conversation. Whether you have a clear plan or just the beginning of an idea, our team is ready to help you explore the possibilities.

**Button:** Request an estimate

---

## Responsive Rules

### Desktop (1025px+)

| Element | Specification |
|---------|---------------|
| Hero height | 50vh min |
| Hero headline | 52px |
| Grid columns | 3 |
| Grid gap | 32px |
| Card title | 22px |
| Filter buttons | Inline row |
| Tag buttons | Inline row, wrap |

### Tablet (768px - 1024px)

| Element | Specification |
|---------|---------------|
| Hero height | 45vh min |
| Hero headline | 40px |
| Grid columns | 2 |
| Grid gap | 24px |
| Card title | 20px |
| Filter buttons | Wrap to 2 rows if needed |
| Tag buttons | Wrap |
| Section padding | 64px 24px |

### Mobile (767px and below)

| Element | Specification |
|---------|---------------|
| Hero height | 40vh min |
| Hero headline | 32px |
| Hero subline | 16px |
| Grid columns | 1 |
| Grid gap | 24px |
| Card title | 20px |
| Filter section | Stack vertically |
| Filter buttons | Full width, stack |
| Tag buttons | Smaller padding, wrap tightly |
| Section padding | 48px 16px |
| CTA headline | 28px |

---

## CSS Class Reference

### Section Classes

| Class | Purpose |
|-------|---------|
| .gc-hero--gallery | Hero variant for gallery page |
| .gc-gallery-intro | Introduction section |
| .gc-gallery-filters | Filter bar section |
| .gc-gallery-grid | Project grid section |
| .gc-gallery-cta | CTA section |

### Filter Classes

| Class | Purpose |
|-------|---------|
| .gc-gallery-filters__group | Filter group container |
| .gc-gallery-filters__label | Filter group label |
| .gc-gallery-filters__buttons | Filter buttons container |
| .gc-filter-btn | Service category filter button |
| .gc-filter-btn--active | Active category filter |
| .gc-tag-btn | Project tag filter button |
| .gc-tag-btn--active | Active tag filter |
| .gc-tag-btn--clear | Clear all tags button |

### Grid Classes

| Class | Purpose |
|-------|---------|
| .gc-gallery-grid__inner | Grid container |
| .gc-gallery-grid__header | Header with count/sort |
| .gc-gallery-grid__count | Project count display |
| .gc-gallery-grid__items | Grid items container |
| .gc-load-more-btn | Load more button |

### Card Classes

| Class | Purpose |
|-------|---------|
| .gc-project-card | Project card container |
| .gc-project-card__image-wrap | Image wrapper with aspect ratio |
| .gc-project-card__image | Project image |
| .gc-project-card__overlay | Hover overlay |
| .gc-project-card__expand | Expand icon |
| .gc-project-card__content | Card content area |
| .gc-project-card__category | Service category label |
| .gc-project-card__title | Project title |
| .gc-project-card__location | City, State location |

### Lightbox Classes

| Class | Purpose |
|-------|---------|
| .gc-project-lightbox | Lightbox container |
| .gc-project-lightbox--active | Lightbox visible state |
| .gc-project-lightbox__backdrop | Dark backdrop |
| .gc-project-lightbox__content | Lightbox content wrapper |
| .gc-project-lightbox__close | Close button |
| .gc-project-lightbox__gallery | Gallery viewer area |
| .gc-project-lightbox__info | Project info panel |
| .gc-project-lightbox__thumbs | Thumbnail navigation |

---

## ACF Field Summary

### Gallery Page Fields (group_gc_gallery_fields)

| Field Name | Type | Default | Description |
|------------|------|---------|-------------|
| gc_gallery_hero_headline | text | Our project gallery | H1 hero headline |
| gc_gallery_hero_subline | textarea | (see copy above) | Hero supporting text |
| gc_gallery_hero_image | image | - | Hero background image |
| gc_gallery_intro | wysiwyg | (see copy above) | Introduction paragraph |
| gc_gallery_filter_enabled | true_false | true | Enable/disable filter bar |
| gc_gallery_cta_headline | text | Ready to see your vision come to life? | CTA headline |
| gc_gallery_cta_body | textarea | (see copy above) | CTA body text |
| gc_gallery_cta_button_label | text | Request an estimate | CTA button label |

### Project CPT Fields Referenced

| Field Name | Type | Description |
|------------|------|-------------|
| gc_project_location_city | text | Project city |
| gc_project_location_state | text | Project state (default: SC) |
| gc_project_short_summary | textarea | Brief project description |
| gc_project_gallery | gallery | Project photo gallery |

### Taxonomies Used

| Taxonomy | Slug | Purpose |
|----------|------|---------|
| Service Category | service_category | Primary filter (Custom homes, Outdoor spaces, etc.) |
| Project Tags | project_tag | Secondary filter (features, styles) |

---

## JavaScript File Requirements

Add to grander-core.js:

1. Filter button click handlers
2. Tag toggle handlers
3. Filter logic function
4. Project count updater
5. Lightbox open/close/navigate
6. Load more pagination
7. Keyboard navigation (Escape to close, arrows for gallery)

---

## Implementation Notes

1. **Elementor Loop Grid** - Use Elementor Pro's Loop Grid widget for the project grid. Create a saved Loop Item template for the project card.

2. **Data Attributes** - Project cards must output data-category and data-tags attributes for JavaScript filtering. Use Elementor's custom attributes feature or output via PHP.

3. **Lightbox Choice** - Can use Elementor's built-in lightbox for gallery images, or build custom lightbox for richer project detail view.

4. **Load More** - Elementor Loop Grid has built-in pagination options. Choose "Load More" button style.

5. **Filter Persistence** - Consider URL parameters for filter state so users can share filtered views.

6. **Mobile Filters** - On mobile, consider collapsing filters into a slide-out panel or accordion to save space.

7. **Performance** - Lazy load images in the grid. Use appropriate image sizes (medium_large for grid, full for lightbox).

---

## Build Checklist

- [ ] Create Gallery page in WordPress
- [ ] Add Hero section with ACF bindings
- [ ] Add Introduction section
- [ ] Build filter bar with all buttons
- [ ] Create Loop Item template for project cards
- [ ] Configure Loop Grid with Projects CPT query
- [ ] Add data attributes to project cards
- [ ] Implement JavaScript filtering
- [ ] Build lightbox functionality
- [ ] Add CTA section
- [ ] Test responsive breakpoints
- [ ] Test filter combinations
- [ ] Test lightbox on all devices
- [ ] Verify Load More pagination

---

End of specification.
