# Blog Archive Template Specification

**Template Type:** Theme Builder > Archive
**Conditions:** Posts Archive, Post Categories
**Class Hook:** `gc-blog-archive-v1`

---

## Overview

The Blog Archive template displays "The Blueprint" blog listing with a hero section, search functionality, and a responsive grid of post cards. The design uses a warm background with white cards featuring gold accent borders.

---

## Design Specifications

### Colors
| Element | Color |
|---------|-------|
| Page Background | `#F5F3F0` (Warm Background) |
| Card Background | `#FFFFFF` |
| Card Border Top | `3px solid #B08D66` |
| Card Shadow | `0 8px 20px rgba(35,31,32,0.08)` |
| Category Badge BG | `#B08D66` |
| Category Badge Text | `#FFFFFF` |

### Typography
| Element | Font | Size | Weight |
|---------|------|------|--------|
| Archive Title (H1) | Libre Baskerville | 64px/48px/36px | 700 |
| Archive Subtitle | Corbel | 18px | 400 |
| Card Title (H2) | Libre Baskerville | 30px/26px/24px | 700 |
| Card Excerpt | Corbel | 16px | 400 |
| Meta Text | Corbel | 14px | 400 |

---

## Container Tree

```
Section: .gc-blog-archive-v1
├── Background: #F5F3F0
│
├── Section 1: .gc-archive-hero
│   ├── Background: #F5F3F0
│   ├── Padding: 80px 24px 60px (desktop) / 60px 24px 40px (mobile)
│   │
│   └── Container: (max-width: 800px, centered, text-align: center)
│       │
│       ├── Heading Widget: Archive Title
│       │   ├── Dynamic: gc_blog_hero_headline (ACF Options)
│       │   ├── Default: "The Blueprint"
│       │   ├── Tag: H1
│       │   ├── Font: Libre Baskerville
│       │   ├── Size: 64px (desktop) / 48px (tablet) / 36px (mobile)
│       │   ├── Weight: 700
│       │   ├── Color: #4C2A19
│       │   ├── Letter Spacing: -1px
│       │   └── Line Height: 1.1
│       │
│       ├── Text Widget: Archive Subtitle
│       │   ├── Dynamic: gc_blog_hero_subline (ACF Options)
│       │   ├── Default: "Practical ideas, project highlights, material insights, and build process guidance for Upstate homeowners."
│       │   ├── Font: Corbel, 18px
│       │   ├── Color: #231F20
│       │   ├── Line Height: 1.7
│       │   ├── Max Width: 600px
│       │   └── Margin: 0 auto 40px
│       │
│       └── Search Form Widget: Blog Search
│           ├── Class: gc-blog-search
│           ├── Style: Minimal
│           ├── Max Width: 700px
│           ├── Alignment: Center
│           ├── Input Background: #FFFFFF
│           ├── Input Border: 1px solid #E8DFD5
│           ├── Input Border Radius: 0px
│           ├── Input Padding: 16px 18px 16px 50px
│           ├── Input Font: Corbel, 16px
│           ├── Input Shadow: 0 4px 8px rgba(76,42,25,0.1)
│           ├── Focus Border Color: #B08D66
│           ├── Search Icon Color: #B08D66
│           ├── Search Icon Position: Inside Left
│           └── Search Icon Size: 20px
│
├── Section 2: .gc-posts-section
│   ├── Background: #F5F3F0
│   ├── Padding: 0 24px 60px
│   │
│   └── Container: (max-width: 1200px, centered)
│       │
│       └── Posts Widget: .gc-posts-grid-v1
│           ├── Skin: Classic
│           ├── Columns: 3 (desktop) / 2 (tablet) / 1 (mobile)
│           ├── Gap: 30px
│           │
│           ├── Query:
│           │   ├── Source: Posts
│           │   ├── Posts Per Page: 9 (or gc_blog_posts_per_page)
│           │   └── Order By: Date (descending)
│           │
│           ├── Card Layout:
│           │   ├── Image Position: Top
│           │   ├── Image Size: Custom ratio 16:10.5
│           │   ├── Image Height: 280px
│           │   │
│           │   ├── Card Styling:
│           │   │   ├── Background: #FFFFFF
│           │   │   ├── Border Radius: 0px
│           │   │   ├── Border Top: 3px solid #B08D66
│           │   │   ├── Box Shadow: 0 8px 20px rgba(35,31,32,0.08)
│           │   │   ├── Hover Shadow: 0 12px 30px rgba(35,31,32,0.12)
│           │   │   ├── Hover Transform: translateY(-4px)
│           │   │   └── Transition: all 0.3s ease
│           │   │
│           │   └── Card Content Padding: 32px 28px
│           │
│           ├── Meta Display:
│           │   │
│           │   ├── Category Badge:
│           │   │   ├── Show: Yes
│           │   │   ├── Position: Above title
│           │   │   ├── Background: #B08D66
│           │   │   ├── Text Color: #FFFFFF
│           │   │   ├── Padding: 8px 16px
│           │   │   ├── Font: Corbel, 12px, 700, uppercase
│           │   │   ├── Letter Spacing: 1px
│           │   │   └── Margin Bottom: 16px
│           │   │
│           │   ├── Title:
│           │   │   ├── Tag: H2
│           │   │   ├── Font: Libre Baskerville
│           │   │   ├── Size: 30px / 26px / 24px
│           │   │   ├── Weight: 700
│           │   │   ├── Color: #231F20
│           │   │   ├── Line Height: 1.3
│           │   │   └── Margin Bottom: 14px
│           │   │
│           │   ├── Excerpt:
│           │   │   ├── Show: Yes
│           │   │   ├── Length: ~150 characters
│           │   │   ├── Font: Corbel, 16px
│           │   │   ├── Color: #231F20
│           │   │   ├── Line Height: 1.7
│           │   │   └── Margin Bottom: 20px
│           │   │
│           │   └── Meta Row:
│           │       ├── Display: Flex row, wrap
│           │       ├── Gap: 20px
│           │       ├── Border Top: 1px solid #E8DFD5
│           │       ├── Padding Top: 20px
│           │       ├── Font: Corbel, 14px
│           │       ├── Color: #231F20
│           │       ├── Icon Color: #B08D66
│           │       ├── Icon Size: 16px
│           │       └── Show: Author, Date, Read Time
│           │
│           └── Pagination:
│               ├── Type: Numbers with arrows
│               ├── Alignment: Center
│               ├── Style: Minimal
│               ├── Active Color: #B08D66
│               └── Margin Top: 60px
│
└── Section 3: .gc-no-results (Conditional - show when no posts)
    ├── Background: #F5F3F0
    ├── Padding: 80px 24px
    ├── Text Align: Center
    │
    └── Text Widget:
        ├── Text: "No articles found matching your search."
        ├── Font: Corbel, 18px
        └── Color: #231F20
```

---

## ACF Dynamic Tags

| Element | Field | Source |
|---------|-------|--------|
| Archive Title | `gc_blog_hero_headline` | Options |
| Archive Subtitle | `gc_blog_hero_subline` | Options |
| Posts Per Page | `gc_blog_posts_per_page` | Options (default: 9) |

---

## Search Behavior

- Search form submits to WordPress search
- Results filtered to posts only
- Consider adding AJAX search with live results (enhancement)

---

## Responsive Behavior

### Desktop (1025px+)
- 3-column grid
- Full hero padding
- Search form 700px max-width

### Tablet (768px - 1024px)
- 2-column grid
- Reduced padding
- Smaller title (48px)

### Mobile (767px and below)
- 1-column grid
- Stacked cards full width
- Smaller title (36px)
- Reduced padding

---

## CSS Additions

```css
/* Blog Archive Styles */
.gc-blog-archive-v1 {
    background-color: #F5F3F0;
}

/* Search form styling */
.gc-blog-search input[type="search"] {
    border-radius: 0;
    transition: all 0.3s ease;
}

.gc-blog-search input[type="search"]:focus {
    border-color: #B08D66;
    border-width: 2px;
    box-shadow: 0 0 0 3px rgba(176,141,102,0.1);
}

/* Post card hover effects */
.gc-posts-grid-v1 article {
    transition: all 0.3s ease;
}

.gc-posts-grid-v1 article:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(35,31,32,0.12);
}

/* Category badge styling */
.gc-posts-grid-v1 .elementor-post__badge {
    background-color: #B08D66;
    color: #FFFFFF;
    padding: 8px 16px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 0;
}

/* Meta icons */
.gc-posts-grid-v1 .elementor-post__meta-data svg {
    color: #B08D66;
}
```

---

## Implementation Checklist

- [ ] Create Archive template in Theme Builder
- [ ] Set conditions: Posts Archive, Post Categories
- [ ] Build hero section with title and subtitle
- [ ] Add search form with styling
- [ ] Configure Posts widget with correct query
- [ ] Style post cards with gold border and shadows
- [ ] Configure category badges
- [ ] Set up pagination
- [ ] Add no-results fallback section
- [ ] Add custom CSS
- [ ] Test responsive at all breakpoints
- [ ] Test search functionality
- [ ] Test pagination
- [ ] Verify card hover states

---

End of blog archive template specification.
