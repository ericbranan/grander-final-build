# Blog Build Specification (The Blueprint)

Version: 2025-12-08
Status: Production Ready
Templates: Archive page + Single post template

---

## Overview

The Blueprint is Grander Construction's blog, featuring practical ideas, project highlights, material insights, and build process guidance for Upstate homeowners. This specification covers both the archive listing page and the single post template.

---

# PART 1: BLOG ARCHIVE PAGE

## Section 1: Hero

### Container Hierarchy

```
Section: gc-hero gc-hero--blog
├── Container: gc-hero__overlay
│   └── Container: gc-hero__content (max-width: 800px, centered)
│       ├── Heading H1: gc-hero__headline
│       │   └── ACF: gc_blog_hero_headline
│       └── Text: gc-hero__intro
│           └── ACF: gc_blog_hero_intro
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, min-height: 45vh, background: ACF image gc_blog_hero_image with overlay |
| Overlay | Container | Background: linear-gradient(180deg, rgba(44,33,26,0.5) 0%, rgba(44,33,26,0.7) 100%) |
| Content | Container | Max-width: 800px, margin: 0 auto, padding: 100px 24px 72px, text-align: center |
| Headline | Heading | H1, Baskerville, 52px desktop, color: #FFFFFF |
| Intro | Text | Corbel, 18px, color: rgba(255,255,255,0.9), max-width: 650px, margin: 0 auto, line-height: 1.7 |

### ACF Bindings

| Element | Field Name | Type |
|---------|------------|------|
| Headline | gc_blog_hero_headline | text |
| Intro | gc_blog_hero_intro | textarea |
| Background | gc_blog_hero_image | image |

### Final Copy

**Headline:** The Blueprint

**Intro:** Practical ideas, project highlights, and expert guidance for homeowners planning custom builds and outdoor living spaces in Upstate South Carolina. From material choices to design inspiration, our team shares the insights that help you build with confidence.

---

## Section 2: Posts Grid

### Container Hierarchy

```
Section: gc-blog-archive
└── Container: gc-blog-archive__inner (max-width: 1200px, centered)
    ├── Container: gc-blog-archive__header (optional)
    │   └── Text: gc-blog-archive__count
    │       └── Dynamic: "X articles"
    │
    └── Container: gc-blog-archive__grid
        └── Loop Grid: Query Posts CPT
            └── Loop Item Template: gc-post-card
```

### Elementor Loop Grid Settings

| Setting | Value |
|---------|-------|
| Source | Posts (standard WP posts) |
| Posts per page | 9 (with pagination) |
| Order by | Date (descending) |
| Template | Post Card (saved template) |
| Columns | 3 (desktop), 2 (tablet), 1 (mobile) |
| Gap | 32px |
| Pagination | Numbers + Previous/Next |

### Post Card Template (Loop Item)

```
Container: gc-post-card
├── Container: gc-post-card__image-wrap
│   └── Image: gc-post-card__image
│       └── Dynamic: Featured Image (medium_large)
│
└── Container: gc-post-card__content
    ├── Text: gc-post-card__date
    │   └── Dynamic: Post Date (F j, Y format)
    ├── Heading H2: gc-post-card__title
    │   └── Dynamic: Post Title
    ├── Text: gc-post-card__excerpt
    │   └── Dynamic: Post Excerpt (truncated to ~120 chars)
    └── Link: gc-post-card__link
        └── Text: "Read more"
        └── Dynamic: Post URL
```

### Elementor Settings for Post Card

| Element | Widget | Settings |
|---------|--------|----------|
| Card Container | Container | Background: #FFFFFF, border-radius: 8px, overflow: hidden, box-shadow: 0 2px 8px rgba(0,0,0,0.06), transition: all 0.3s ease |
| Image Wrap | Container | Position: relative, aspect-ratio: 16/10, overflow: hidden |
| Image | Image | Object-fit: cover, width: 100%, height: 100%, transition: transform 0.4s ease |
| Content | Container | Padding: 28px |
| Date | Text | Corbel, 13px, text-transform: uppercase, letter-spacing: 0.5px, color: var(--gc-medium-brown), margin-bottom: 12px |
| Title | Heading | H2, Baskerville, 22px, color: var(--gc-deep-brown), line-height: 1.35, margin-bottom: 12px |
| Excerpt | Text | Corbel, 15px, color: var(--gc-medium-brown), line-height: 1.6, margin-bottom: 16px |
| Link | Text | Corbel, 14px, font-weight: 600, color: var(--gc-gold), text-decoration: none |

### Post Card Hover States

```css
.gc-post-card:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    transform: translateY(-4px);
}

.gc-post-card:hover .gc-post-card__image {
    transform: scale(1.05);
}

.gc-post-card:hover .gc-post-card__link {
    text-decoration: underline;
}
```

### Dynamic Tag Bindings

| Element | Dynamic Tag | Source |
|---------|-------------|--------|
| Featured Image | Featured Image | Post thumbnail (medium_large) |
| Date | Post Date | Custom format: F j, Y |
| Title | Post Title | Post title with link |
| Excerpt | Post Excerpt | Excerpt or auto-generated |
| Link | Post URL | Permalink |

---

## Section 3: Pagination

### Container Hierarchy

```
Section: gc-blog-pagination
└── Container: gc-blog-pagination__inner (max-width: 1200px, centered)
    └── Pagination Widget: gc-pagination
        ├── Link: gc-pagination__prev
        │   └── Text: "← Previous"
        ├── Numbers: gc-pagination__numbers
        │   └── 1, 2, 3... (active state for current)
        └── Link: gc-pagination__next
            └── Text: "Next →"
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Background: var(--gc-warm-white), padding: 48px 24px 96px |
| Inner | Container | Max-width: 1200px, margin: 0 auto, text-align: center |
| Pagination | Pagination | Corbel font, 15px, gap: 8px |

### Pagination States

**Number Default:**
- Color: var(--gc-medium-brown)
- Background: transparent
- Padding: 8px 14px
- Border-radius: 4px

**Number Hover:**
- Background: var(--gc-warm-white)
- Color: var(--gc-deep-brown)

**Number Active:**
- Background: var(--gc-deep-brown)
- Color: #FFFFFF

**Prev/Next:**
- Color: var(--gc-gold)
- Font-weight: 600

---

# PART 2: SINGLE POST TEMPLATE

## Section 1: Post Hero

### Container Hierarchy

```
Section: gc-post-hero
├── Container: gc-post-hero__image-wrap
│   └── Image: gc-post-hero__image
│       └── Dynamic: Featured Image (full)
│
└── Container: gc-post-hero__content
    └── Container: gc-post-hero__inner (max-width: 800px, centered)
        ├── Text: gc-post-hero__category (optional)
        │   └── Dynamic: Primary Category
        ├── Heading H1: gc-post-hero__title
        │   └── Dynamic: Post Title
        ├── Text: gc-post-hero__subtitle (optional)
        │   └── ACF: gc_post_subtitle
        └── Container: gc-post-hero__meta
            ├── Text: gc-post-hero__date
            │   └── Dynamic: Post Date
            └── Text: gc-post-hero__author (optional)
                └── Dynamic: Author Name
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Full width, position: relative |
| Image Wrap | Container | Width: 100%, height: 50vh (min 400px, max 600px), overflow: hidden |
| Image | Image | Object-fit: cover, width: 100%, height: 100% |
| Content | Container | Background: #FFFFFF, margin-top: -80px, position: relative, z-index: 2, padding: 48px 24px |
| Inner | Container | Max-width: 800px, margin: 0 auto, text-align: center |
| Category | Text | Corbel, 12px, text-transform: uppercase, letter-spacing: 1px, color: var(--gc-gold), margin-bottom: 16px |
| Title | Heading | H1, Baskerville, 42px desktop, 32px mobile, color: var(--gc-deep-brown), line-height: 1.25, margin-bottom: 16px |
| Subtitle | Text | Corbel, 18px, color: var(--gc-medium-brown), font-style: italic, margin-bottom: 24px |
| Meta | Container | Flex row, gap: 16px, justify: center, align: center |
| Date | Text | Corbel, 14px, color: var(--gc-medium-brown) |
| Author | Text | Corbel, 14px, color: var(--gc-medium-brown) |

### Dynamic Bindings

| Element | Dynamic Tag | Source |
|---------|-------------|--------|
| Featured Image | Featured Image | Post thumbnail (full) |
| Category | Term Name | Primary category |
| Title | Post Title | Post title |
| Subtitle | ACF Field | gc_post_subtitle (optional) |
| Date | Post Date | Format: F j, Y |
| Author | Author Name | Post author display name |

---

## Section 2: Post Content

### Container Hierarchy

```
Section: gc-post-content
└── Container: gc-post-content__inner (max-width: 720px, centered)
    └── Post Content Widget: gc-post-body
        └── Dynamic: Post Content
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Background: #FFFFFF, padding: 48px 24px 64px |
| Inner | Container | Max-width: 720px, margin: 0 auto |
| Post Content | Post Content | Typography settings below |

### Typography for Post Body

```css
.gc-post-body {
    font-family: Corbel, 'Lucida Grande', sans-serif;
    font-size: 17px;
    line-height: 1.8;
    color: var(--gc-deep-brown);
}

.gc-post-body h2 {
    font-family: 'Libre Baskerville', Baskerville, serif;
    font-size: 28px;
    font-weight: 400;
    line-height: 1.3;
    color: var(--gc-deep-brown);
    margin: 48px 0 24px;
}

.gc-post-body h3 {
    font-family: 'Libre Baskerville', Baskerville, serif;
    font-size: 22px;
    font-weight: 400;
    line-height: 1.35;
    color: var(--gc-deep-brown);
    margin: 40px 0 20px;
}

.gc-post-body h4 {
    font-family: Corbel, 'Lucida Grande', sans-serif;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.4;
    color: var(--gc-deep-brown);
    margin: 32px 0 16px;
}

.gc-post-body p {
    margin: 0 0 24px;
}

.gc-post-body ul,
.gc-post-body ol {
    margin: 0 0 24px;
    padding-left: 24px;
}

.gc-post-body li {
    margin-bottom: 8px;
}

.gc-post-body blockquote {
    border-left: 4px solid var(--gc-gold);
    padding-left: 24px;
    margin: 32px 0;
    font-style: italic;
    color: var(--gc-medium-brown);
}

.gc-post-body img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 32px 0;
}

.gc-post-body a {
    color: var(--gc-gold);
    text-decoration: underline;
}

.gc-post-body a:hover {
    color: var(--gc-deep-brown);
}
```

---

## Section 3: Post Tags (Optional)

### Container Hierarchy

```
Section: gc-post-tags
└── Container: gc-post-tags__inner (max-width: 720px, centered)
    ├── Text: gc-post-tags__label
    │   └── "Tags:"
    └── Container: gc-post-tags__list
        └── Dynamic: Post Tags
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Background: #FFFFFF, padding: 0 24px 48px |
| Inner | Container | Max-width: 720px, margin: 0 auto, display: flex, align: center, gap: 12px, flex-wrap: wrap |
| Label | Text | Corbel, 14px, font-weight: 600, color: var(--gc-medium-brown) |
| Tags | Post Info | Tags with links, Corbel 13px, padding: 6px 12px, background: var(--gc-warm-white), border-radius: 4px |

---

## Section 4: Author Box (Optional)

### Container Hierarchy

```
Section: gc-post-author
└── Container: gc-post-author__inner (max-width: 720px, centered)
    └── Container: gc-post-author__box
        ├── Image: gc-post-author__avatar
        │   └── Dynamic: Author Avatar
        └── Container: gc-post-author__info
            ├── Text: gc-post-author__label
            │   └── "Written by"
            ├── Heading H4: gc-post-author__name
            │   └── Dynamic: Author Display Name
            └── Text: gc-post-author__bio
                └── Dynamic: Author Bio
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Background: var(--gc-warm-white), padding: 48px 24px |
| Inner | Container | Max-width: 720px, margin: 0 auto |
| Box | Container | Background: #FFFFFF, padding: 32px, border-radius: 8px, display: flex, gap: 24px, align: flex-start |
| Avatar | Image | Width: 80px, height: 80px, border-radius: 50%, object-fit: cover |
| Label | Text | Corbel, 12px, text-transform: uppercase, letter-spacing: 0.5px, color: var(--gc-medium-brown), margin-bottom: 4px |
| Name | Heading | H4, Baskerville, 20px, color: var(--gc-deep-brown), margin-bottom: 8px |
| Bio | Text | Corbel, 15px, color: var(--gc-medium-brown), line-height: 1.6 |

---

## Section 5: Related Posts

### Container Hierarchy

```
Section: gc-related-posts
└── Container: gc-related-posts__inner (max-width: 1200px, centered)
    ├── Heading H2: gc-related-posts__headline
    │   └── Text: "More from The Blueprint"
    │
    └── Container: gc-related-posts__grid (3 columns)
        └── Loop Grid: Related Posts Query
            └── Loop Item: gc-post-card (same as archive)
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Background: #FFFFFF, padding: 64px 24px 96px |
| Inner | Container | Max-width: 1200px, margin: 0 auto |
| Headline | Heading | H2, Baskerville, 32px, color: var(--gc-deep-brown), text-align: center, margin-bottom: 48px |
| Grid | Loop Grid | 3 columns desktop, 2 tablet, 1 mobile, gap: 32px |

### Related Posts Query

| Setting | Value |
|---------|-------|
| Source | Posts |
| Posts per page | 3 |
| Exclude | Current post ID |
| Order by | Date (descending) |
| Taxonomy filter | Same category as current (optional) |

---

## Section 6: Post CTA

### Container Hierarchy

```
Section: gc-post-cta
└── Container: gc-post-cta__inner (max-width: 900px, centered)
    ├── Heading H2: gc-post-cta__headline
    │   └── Text: "Ready to bring your vision to life?"
    ├── Text: gc-post-cta__body
    │   └── Text: "Whether you're planning a custom home, outdoor living space, or addition, our team is ready to help you take the next step."
    └── Button: gc-btn gc-btn--primary gc-estimate-trigger
        └── Text: "Request an estimate"
```

### Elementor Settings

| Element | Widget | Settings |
|---------|--------|----------|
| Section | Container | Background: var(--gc-deep-brown), padding: 80px 24px |
| Inner | Container | Max-width: 900px, margin: 0 auto, text-align: center |
| Headline | Heading | H2, Baskerville, 36px, color: #FFFFFF, margin-bottom: 20px |
| Body | Text | Corbel, 18px, color: rgba(255,255,255,0.9), margin-bottom: 32px, max-width: 700px, margin-left/right: auto |
| Button | Button | gc-btn gc-btn--primary gc-estimate-trigger |

### Final Copy

**Headline:** Ready to bring your vision to life?

**Body:** Whether you're planning a custom home, outdoor living space, or addition, our team is ready to help you take the next step.

**Button:** Request an estimate

---

## Responsive Rules

### Desktop (1025px+)

| Element | Specification |
|---------|---------------|
| Archive hero height | 45vh min |
| Archive hero headline | 52px |
| Post grid columns | 3 |
| Post card title | 22px |
| Single hero image | 50vh (400-600px) |
| Single title | 42px |
| Post body font | 17px |
| Post body max-width | 720px |
| Related posts columns | 3 |

### Tablet (768px - 1024px)

| Element | Specification |
|---------|---------------|
| Archive hero height | 40vh min |
| Archive hero headline | 40px |
| Post grid columns | 2 |
| Post card title | 20px |
| Single hero image | 45vh |
| Single title | 36px |
| Post body font | 16px |
| Related posts columns | 2 |
| Section padding | 48px 24px |

### Mobile (767px and below)

| Element | Specification |
|---------|---------------|
| Archive hero height | 35vh min |
| Archive hero headline | 32px |
| Archive intro | 16px |
| Post grid columns | 1 |
| Post card title | 20px |
| Single hero image | 40vh |
| Single title | 28px |
| Single hero margin-top | -60px |
| Post body font | 16px |
| Post body max-width | 100% |
| Related posts columns | 1 |
| Section padding | 40px 16px |
| Author box | Stack vertically |

---

## CSS Class Reference

### Archive Classes

| Class | Purpose |
|-------|---------|
| .gc-hero--blog | Blog archive hero variant |
| .gc-blog-archive | Archive section |
| .gc-blog-archive__grid | Posts grid container |
| .gc-post-card | Individual post card |
| .gc-post-card__image-wrap | Image container |
| .gc-post-card__image | Featured image |
| .gc-post-card__content | Card content area |
| .gc-post-card__date | Publish date |
| .gc-post-card__title | Post title |
| .gc-post-card__excerpt | Excerpt text |
| .gc-post-card__link | Read more link |
| .gc-blog-pagination | Pagination section |
| .gc-pagination | Pagination wrapper |

### Single Post Classes

| Class | Purpose |
|-------|---------|
| .gc-post-hero | Hero section |
| .gc-post-hero__image-wrap | Hero image container |
| .gc-post-hero__content | Content overlay |
| .gc-post-hero__title | Post title |
| .gc-post-hero__meta | Date/author meta |
| .gc-post-content | Main content section |
| .gc-post-body | Post content wrapper |
| .gc-post-tags | Tags section |
| .gc-post-author | Author box section |
| .gc-related-posts | Related posts section |
| .gc-post-cta | Call to action section |

---

## ACF Field Summary

### Blog Archive Page Fields (group_gc_blog_fields)

| Field Name | Type | Default | Description |
|------------|------|---------|-------------|
| gc_blog_hero_headline | text | The Blueprint | H1 hero headline |
| gc_blog_hero_intro | textarea | (see copy above) | Hero intro paragraph |
| gc_blog_hero_image | image | - | Hero background image |

### Single Post Fields (group_gc_post_fields)

| Field Name | Type | Default | Description |
|------------|------|---------|-------------|
| gc_post_subtitle | text | - | Optional subtitle below title |
| gc_post_hide_author | true_false | false | Hide author box |
| gc_post_hide_related | true_false | false | Hide related posts |
| gc_post_custom_cta_headline | text | - | Override default CTA headline |
| gc_post_custom_cta_body | textarea | - | Override default CTA body |

---

## Blog Categories (Recommended)

Create these categories for content organization:

| Category | Slug | Description |
|----------|------|-------------|
| Build Process | build-process | Planning, timelines, phases |
| Design Inspiration | design-inspiration | Style ideas, trends |
| Materials & Methods | materials-methods | Product insights, techniques |
| Project Spotlights | project-spotlights | Featured project stories |
| Homeowner Tips | homeowner-tips | Practical advice |

---

## Sample Blog Posts (from CLAUDE.md)

### Suggested Titles

1. What high performance building means for Upstate homes
2. How to plan a sunroom or addition without disrupting your lifestyle
3. Designing outdoor living spaces that feel integrated
4. Pool houses, garages, and ADUs that add real value
5. Choosing finishes that hold up in the South
6. A clear look at the Grander build process

---

## Implementation Notes

1. **Elementor Theme Builder** - Create both archive and single templates in Theme Builder. Set conditions appropriately.

2. **Archive Template Condition**: Posts Archive (all categories)

3. **Single Template Condition**: All Posts

4. **Post Card Reuse** - The same gc-post-card template is used in both the archive grid and the related posts section on single posts.

5. **Excerpt Length** - Set WordPress excerpt length to ~120 characters or use Elementor's excerpt length control.

6. **Featured Image Requirement** - All posts should have featured images. Consider a fallback pattern image if needed.

7. **SEO Considerations** - The archive intro paragraph provides keyword-rich content for search engines while remaining useful for visitors.

---

## Build Checklist

### Archive Page
- [ ] Create blog archive page (if using Elementor Pro pages) or archive template
- [ ] Add Hero section with ACF bindings
- [ ] Create Loop Item template for post cards
- [ ] Configure Loop Grid with pagination
- [ ] Style pagination numbers and arrows
- [ ] Test responsive breakpoints
- [ ] Verify existing posts display correctly

### Single Post Template
- [ ] Create single post template in Theme Builder
- [ ] Add Hero section with featured image and title
- [ ] Add Post Content widget with typography styles
- [ ] Add Tags section (optional)
- [ ] Add Author Box (optional)
- [ ] Add Related Posts section with Loop Grid
- [ ] Add CTA section
- [ ] Test with existing posts
- [ ] Verify responsive behavior

---

End of specification.
