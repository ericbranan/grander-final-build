# Search Results Template Specification

**Template Type:** Theme Builder > Search Results (Archive)
**Conditions:** Search Results
**Class Hook:** `gc-search-results-v1`

---

## Overview

The Search Results template displays search query results in a clean, scannable format. It shows the search term, result count, and a list of matching content with excerpts and links.

---

## Design Specifications

### Colors
| Element | Color |
|---------|-------|
| Page Background | `#F5F3F0` |
| Result Card BG | `#FFFFFF` |
| Result Card Border | `1px solid #E8DFD5` |
| Highlight/Query | `#B08D66` |

### Typography
| Element | Font | Size | Weight |
|---------|------|------|--------|
| Page Title | Libre Baskerville | 48px/40px/32px | 700 |
| Result Title | Libre Baskerville | 24px | 700 |
| Result Excerpt | Corbel | 16px | 400 |
| Result Meta | Corbel | 14px | 400 |

---

## Container Tree

```
Section: .gc-search-results-v1
├── Background: #F5F3F0
│
├── Section 1: Search Header
│   ├── Background: #F5F3F0
│   ├── Padding: 80px 24px 40px (desktop) / 60px 24px 32px (mobile)
│   │
│   └── Container: (max-width: 900px, centered, text-align: center)
│       │
│       ├── Heading Widget: Page Title
│       │   ├── Text: "Search Results"
│       │   ├── Tag: H1
│       │   ├── Font: Libre Baskerville
│       │   ├── Size: 48px / 40px / 32px
│       │   ├── Weight: 700
│       │   ├── Color: #4C2A19
│       │   └── Margin Bottom: 16px
│       │
│       ├── Text Widget: Query Display
│       │   ├── Dynamic: Search query term
│       │   ├── Format: "Results for: "{search_query}""
│       │   ├── Font: Corbel, 18px
│       │   ├── Color: #231F20
│       │   ├── Query term color: #B08D66 (highlighted)
│       │   └── Margin Bottom: 8px
│       │
│       └── Text Widget: Result Count
│           ├── Dynamic: {found_posts} results found
│           ├── Font: Corbel, 16px
│           ├── Color: #666666
│           └── Margin Bottom: 40px
│
├── Section 2: Search Form (Refine Search)
│   ├── Container: (max-width: 700px, centered)
│   ├── Padding: 0 24px 48px
│   │
│   └── Search Form Widget:
│       ├── Class: gc-search-form
│       ├── Style: Minimal
│       ├── Placeholder: "Search again..."
│       ├── Input Background: #FFFFFF
│       ├── Input Border: 1px solid #E8DFD5
│       ├── Input Border Radius: 0px
│       ├── Input Padding: 16px 18px 16px 50px
│       ├── Focus Border Color: #B08D66
│       ├── Search Icon Color: #B08D66
│       ├── Search Icon Position: Inside Left
│       └── Box Shadow: 0 2px 8px rgba(76,42,25,0.08)
│
├── Section 3: Results List
│   ├── Container: (max-width: 900px, centered)
│   ├── Padding: 0 24px 80px
│   │
│   └── Archive Posts Widget OR Loop Grid:
│       ├── Class: gc-search-results-list
│       ├── Layout: List (single column)
│       ├── Gap: 24px
│       │
│       └── Result Item: .gc-search-result
│           ├── Background: #FFFFFF
│           ├── Border: 1px solid #E8DFD5
│           ├── Border Radius: 0px
│           ├── Padding: 32px
│           ├── Transition: all 0.2s ease
│           ├── Hover: Border color #B08D66, slight shadow
│           │
│           ├── Container: .gc-search-result__header
│           │   ├── Display: Flex
│           │   ├── Justify Content: Space Between
│           │   ├── Align Items: Baseline
│           │   ├── Flex Wrap: Wrap
│           │   ├── Gap: 12px
│           │   ├── Margin Bottom: 12px
│           │   │
│           │   ├── Heading Widget: Result Title
│           │   │   ├── Tag: H2
│           │   │   ├── Link: Post/Page URL
│           │   │   ├── Font: Libre Baskerville, 24px, 700
│           │   │   ├── Color: #4C2A19
│           │   │   ├── Hover Color: #B08D66
│           │   │   └── Line Height: 1.3
│           │   │
│           │   └── Text Widget: Post Type Badge
│           │       ├── Dynamic: Post type label (Post, Page, Project)
│           │       ├── Font: Corbel, 12px, 600, uppercase
│           │       ├── Color: #666666
│           │       ├── Background: #F5F3F0
│           │       ├── Padding: 4px 10px
│           │       └── Border Radius: 2px
│           │
│           ├── Text Widget: Excerpt
│           │   ├── Dynamic: Post excerpt or auto-generated
│           │   ├── Length: 200 characters
│           │   ├── Font: Corbel, 16px
│           │   ├── Color: #231F20
│           │   ├── Line Height: 1.7
│           │   └── Margin Bottom: 16px
│           │
│           └── Container: .gc-search-result__meta
│               ├── Display: Flex
│               ├── Gap: 20px
│               ├── Font: Corbel, 14px
│               ├── Color: #666666
│               │
│               ├── Date: {post_date}
│               └── URL breadcrumb: {permalink} (truncated)
│
└── Section 4: No Results (Conditional)
    ├── Show: When no results found
    ├── Container: (max-width: 700px, centered, text-align: center)
    ├── Padding: 80px 24px
    │
    ├── Icon Widget: Search icon or illustration
    │   ├── Size: 64px
    │   ├── Color: #B08D66
    │   └── Margin Bottom: 24px
    │
    ├── Heading Widget:
    │   ├── Text: "No results found"
    │   ├── Tag: H2
    │   ├── Font: Libre Baskerville, 32px, 700
    │   ├── Color: #4C2A19
    │   └── Margin Bottom: 16px
    │
    ├── Text Widget:
    │   ├── Text: "We couldn't find anything matching your search. Try different keywords or browse our pages below."
    │   ├── Font: Corbel, 17px
    │   ├── Color: #666666
    │   └── Margin Bottom: 32px
    │
    └── Container: Quick Links
        ├── Display: Flex
        ├── Justify Content: Center
        ├── Gap: 16px
        ├── Flex Wrap: Wrap
        │
        ├── Button: "View Services" → /#services (or first service page)
        ├── Button: "Our Gallery" → /gallery/
        └── Button: "Contact Us" → /contact/
```

---

## Search Configuration

### WordPress Search Settings
- Search includes: Posts, Pages
- Exclude from search: 404, Privacy Policy, Terms (if applicable)
- Order by: Relevance, then date

### Query Adjustments (functions.php or plugin)
```php
// Customize search to exclude specific post types
add_filter('pre_get_posts', function($query) {
    if ($query->is_search() && $query->is_main_query() && !is_admin()) {
        $query->set('post_type', array('post', 'page', 'project'));
    }
    return $query;
});
```

---

## Responsive Behavior

### Desktop (1025px+)
- Full title size
- 900px max-width results
- Post type badge inline with title

### Tablet (768px - 1024px)
- Smaller title (40px)
- Same layout

### Mobile (767px and below)
- Smallest title (32px)
- Post type badge wraps below title
- Full-width result cards
- Stacked quick links in no-results state

---

## CSS Additions

```css
/* Search Results Styles */
.gc-search-results-v1 {
    background-color: #F5F3F0;
}

/* Query highlight */
.gc-search-query {
    color: #B08D66;
    font-style: italic;
}

/* Result card */
.gc-search-result {
    background: #FFFFFF;
    border: 1px solid #E8DFD5;
    padding: 32px;
    transition: all 0.2s ease;
}

.gc-search-result:hover {
    border-color: #B08D66;
    box-shadow: 0 4px 12px rgba(76,42,25,0.08);
}

/* Result title link */
.gc-search-result h2 a {
    color: #4C2A19;
    text-decoration: none;
    transition: color 0.2s ease;
}

.gc-search-result h2 a:hover {
    color: #B08D66;
}

/* Post type badge */
.gc-search-result__type {
    background: #F5F3F0;
    color: #666666;
    padding: 4px 10px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 2px;
}

/* No results */
.gc-no-results-icon {
    opacity: 0.5;
}

@media (max-width: 767px) {
    .gc-search-result {
        padding: 24px;
    }

    .gc-search-result__header {
        flex-direction: column;
        align-items: flex-start;
    }
}
```

---

## Implementation Checklist

- [ ] Create Search Results template in Theme Builder
- [ ] Set condition: Search Results
- [ ] Build header with title and query display
- [ ] Add refine search form
- [ ] Configure results loop/grid
- [ ] Style result cards with hover states
- [ ] Add post type badges
- [ ] Build no-results fallback section
- [ ] Add quick links for no-results state
- [ ] Configure WordPress search settings
- [ ] Add custom CSS
- [ ] Test with various search queries
- [ ] Test no-results state
- [ ] Test responsive at all breakpoints

---

End of search results template specification.
