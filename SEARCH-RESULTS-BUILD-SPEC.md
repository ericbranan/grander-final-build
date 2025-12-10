# Search Results Template Build Specification

**Template Type:** Theme Builder ’ Search Results
**Last Updated:** 2025-12-10
**Status:** Ready for Implementation

---

## Overview

The Search Results template displays WordPress search results in a clean, branded layout that matches the overall Grander Construction design system. It provides clear visual hierarchy for different content types (posts, pages, projects) and helpful messaging for empty results.

---

## Visual Design Reference

Based on `blog_preview.tsx` artifact and global design system:

### Color Palette
| Token | Hex | Usage |
|-------|-----|-------|
| Primary Gold | `#B08D66` | Accents, category badges |
| Deep Brown | `#4C2A19` | Headlines, buttons |
| Text Dark | `#231F20` | Body text, titles |
| Warm Background | `#F5F3F0` | Page background |
| White | `#FFFFFF` | Cards, containers |
| Border Light | `#E8DFD5` | Borders, dividers |

### Typography
| Element | Font | Size | Weight | Color |
|---------|------|------|--------|-------|
| Page Title | Libre Baskerville | 48px desktop / 36px mobile | 700 | Deep Brown |
| Result Title | Libre Baskerville | 24px | 700 | Deep Brown |
| Content Type Badge | Corbel | 11px | 700, uppercase | White on Gold |
| Excerpt | Corbel | 16px | 400 | Text Dark |
| Meta Info | Corbel | 14px | 400 | Medium Brown |

---

## Template Configuration

- **Template Type:** Search Results
- **Conditions:** Search Results
- **Class Hook:** `gc-search-results-v1`

---

## Section 1: Search Header

**Purpose:** Display search query and provide new search functionality

**Container Settings:**
- Full width
- Background: `#F5F3F0` (Warm Background)
- Padding: 80px top, 48px bottom desktop / 60px top, 32px bottom mobile
- Text align: Center

### Widget 1.1: Search Results Title (Heading)
- **Content:** Dynamic - "Search results for: `{search_query}`"
- **HTML Tag:** H1
- **Typography:**
  - Font: Libre Baskerville
  - Size: 48px desktop / 36px tablet / 30px mobile
  - Weight: 700
  - Color: `#4C2A19`
  - Line height: 1.2em
- **Margin bottom:** 16px
- **Class:** `gc-search-title`

### Widget 1.2: Results Count (Text Editor)
- **Content:** Dynamic - "`{found_posts}` results found"
- **Typography:**
  - Font: Corbel
  - Size: 16px
  - Color: `#666666`
- **Margin bottom:** 32px
- **Class:** `gc-search-count`

### Widget 1.3: Search Form (Search Form Widget)
- **Max width:** 600px centered
- **Style:** Minimal
- **Input Styling:**
  - Background: `#FFFFFF`
  - Border: 1px solid `#E8DFD5`
  - Border radius: 0px
  - Padding: 14px 18px 14px 48px
  - Font: Corbel, 16px
  - Shadow: `0 2px 8px rgba(76,42,25,0.08)`
- **Search Icon:**
  - Position: Inside left
  - Color: `#B08D66`
  - Size: 20px
- **Button:**
  - Text: "Search"
  - Background: `#4C2A19`
  - Color: `#FFFFFF`
  - Border radius: 0px
- **Class:** `gc-search-form`

---

## Section 2: Search Results Grid

**Purpose:** Display search results as a grid of cards

**Container Settings:**
- Content width: 1200px
- Background: `#F5F3F0`
- Padding: 0px top, 80px bottom

### Widget 2.1: Archive Posts (Posts Widget or Loop Grid)

**Query Settings:**
- Source: Search Query (automatic)
- Posts per page: 12
- Order by: Relevance

**Grid Layout:**
- Columns: 3 desktop / 2 tablet / 1 mobile
- Gap: 30px

### Result Card Template

**Card Container:**
- Background: `#FFFFFF`
- Border radius: 0px
- Border top: 3px solid `#B08D66`
- Box shadow: `0 8px 20px rgba(35,31,32,0.08)`
- Padding: 28px
- Cursor: Pointer
- Transition: all 0.3s ease
- Class: `gc-search-card`

**Card Hover:**
- Transform: `translateY(-4px)`
- Box shadow: `0 12px 30px rgba(35,31,32,0.12)`

**Card Elements:**

1. **Content Type Badge:**
   - Content: Dynamic post type label (Post, Page, Project, FAQ)
   - Display: Inline block
   - Background: `#B08D66`
   - Color: `#FFFFFF`
   - Padding: 5px 10px
   - Font: Corbel, 11px, 700, uppercase
   - Letter spacing: 1px
   - Margin bottom: 14px

2. **Result Title:**
   - Content: `{post_title}`
   - HTML Tag: H3
   - Font: Libre Baskerville
   - Size: 24px desktop / 22px mobile
   - Weight: 700
   - Color: `#231F20`
   - Line height: 1.3em
   - Margin bottom: 12px
   - Link: `{permalink}`

3. **Excerpt:**
   - Content: `{excerpt}` (150 characters max)
   - Font: Corbel, 16px
   - Color: `#231F20`
   - Line height: 1.6em
   - Margin bottom: 16px

4. **Meta Row:**
   - Display: Flex row
   - Gap: 16px
   - Border top: 1px solid `#E8DFD5`
   - Padding top: 16px
   - Font: Corbel, 14px
   - Color: `#666666`

   **Meta Items:**
   - Date: `{post_date}` (format: "Oct 8, 2025")
   - Category (if applicable): First category name
   - Author (for posts): `{post_author}`

5. **Read More Link:**
   - Text: "View ’"
   - Font: Corbel, 14px, 600
   - Color: `#B08D66`
   - Transition: color 0.2s
   - Hover color: `#4C2A19`

**Class:** `gc-search-results-grid`

---

## Section 3: No Results Message

**Purpose:** Display when search returns no results

**Condition:** Show only when no results found

**Container Settings:**
- Content width: 700px centered
- Background: `#F5F3F0`
- Padding: 80px top/bottom
- Text align: Center

### Widget 3.1: No Results Icon (Icon)
- **Icon:** Search or magnifying glass
- **Size:** 64px
- **Color:** `#D4C4B5`
- **Margin bottom:** 24px

### Widget 3.2: No Results Heading (Heading)
- **Content:** "No results found"
- **HTML Tag:** H2
- **Typography:**
  - Font: Libre Baskerville
  - Size: 36px
  - Weight: 700
  - Color: `#4C2A19`
- **Margin bottom:** 16px

### Widget 3.3: No Results Message (Text Editor)
- **Content:** "We couldn't find any content matching your search. Try different keywords or browse our pages below."
- **Typography:**
  - Font: Corbel
  - Size: 17px
  - Color: `#666666`
  - Line height: 1.7em
- **Max width:** 500px centered
- **Margin bottom:** 40px

### Widget 3.4: Suggested Links (Icon List or Button Group)
- **Links:**
  - "View our services" ’ `/services/`
  - "Browse the gallery" ’ `/gallery/`
  - "Contact us" ’ `/contact/`
- **Style:**
  - Display: Flex row with wrap
  - Gap: 16px
  - Justify: Center
- **Button Style:**
  - Background: Transparent
  - Border: 1px solid `#4C2A19`
  - Color: `#4C2A19`
  - Padding: 12px 24px
  - Font: Corbel, 14px, 600
  - Hover: Background `#4C2A19`, Color `#FFFFFF`

### Widget 3.5: New Search Form (Search Form Widget)
- **Max width:** 500px centered
- **Margin top:** 48px
- **Same styling as header search form**

---

## Section 4: Pagination

**Purpose:** Navigate through multiple pages of results

**Container Settings:**
- Content width: 1200px
- Background: `#F5F3F0`
- Padding: 0px top, 60px bottom
- Text align: Center

### Widget 4.1: Pagination (Archive Posts Pagination or Post Navigation)
- **Type:** Numbers with arrows
- **Alignment:** Center

**Styling:**
- Number links:
  - Font: Corbel, 16px, 600
  - Color: `#4C2A19`
  - Padding: 10px 16px
  - Border: 1px solid `#E8DFD5`
  - Background: `#FFFFFF`
- Active page:
  - Background: `#B08D66`
  - Color: `#FFFFFF`
  - Border color: `#B08D66`
- Hover:
  - Background: `#F5F3F0`
  - Border color: `#B08D66`
- Prev/Next Arrows:
  - Size: 20px
  - Color: `#4C2A19`

---

## Custom CSS

```css
/* Search Results Template Styles */
.gc-search-results-v1 {
  background-color: #F5F3F0;
}

/* Search header */
.gc-search-title {
  color: #4C2A19;
  font-family: 'Libre Baskerville', serif;
}

.gc-search-count {
  color: #666666;
}

/* Search form */
.gc-search-form input[type="search"] {
  border-radius: 0;
  border: 1px solid #E8DFD5;
  transition: all 0.3s ease;
}

.gc-search-form input[type="search"]:focus {
  border-color: #B08D66;
  box-shadow: 0 0 0 3px rgba(176,141,102,0.1);
}

.gc-search-form button {
  background: #4C2A19;
  border-radius: 0;
  transition: background 0.2s ease;
}

.gc-search-form button:hover {
  background: #B08D66;
}

/* Search result cards */
.gc-search-card {
  background: #FFFFFF;
  border-top: 3px solid #B08D66;
  box-shadow: 0 8px 20px rgba(35,31,32,0.08);
  padding: 28px;
  transition: all 0.3s ease;
}

.gc-search-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 30px rgba(35,31,32,0.12);
}

/* Content type badge */
.gc-search-card .gc-content-type {
  display: inline-block;
  background: #B08D66;
  color: #FFFFFF;
  padding: 5px 10px;
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 14px;
}

/* Different badge colors by content type */
.gc-search-card[data-type="project"] .gc-content-type {
  background: #4C2A19;
}

.gc-search-card[data-type="page"] .gc-content-type {
  background: #5C4A3D;
}

.gc-search-card[data-type="faq"] .gc-content-type {
  background: #8B7355;
}

/* Result title */
.gc-search-card .gc-result-title {
  font-family: 'Libre Baskerville', serif;
  font-size: 24px;
  font-weight: 700;
  color: #231F20;
  line-height: 1.3em;
  margin-bottom: 12px;
}

.gc-search-card .gc-result-title a {
  color: inherit;
  text-decoration: none;
  transition: color 0.2s ease;
}

.gc-search-card .gc-result-title a:hover {
  color: #B08D66;
}

/* Excerpt */
.gc-search-card .gc-result-excerpt {
  font-size: 16px;
  color: #231F20;
  line-height: 1.6em;
  margin-bottom: 16px;
}

/* Meta row */
.gc-search-card .gc-result-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 16px;
  border-top: 1px solid #E8DFD5;
  padding-top: 16px;
  font-size: 14px;
  color: #666666;
}

/* Read more link */
.gc-search-card .gc-read-more {
  color: #B08D66;
  font-weight: 600;
  font-size: 14px;
  text-decoration: none;
  transition: color 0.2s ease;
}

.gc-search-card .gc-read-more:hover {
  color: #4C2A19;
}

/* No results styling */
.gc-no-results {
  text-align: center;
  padding: 80px 24px;
}

.gc-no-results__icon {
  color: #D4C4B5;
  margin-bottom: 24px;
}

.gc-no-results__heading {
  font-family: 'Libre Baskerville', serif;
  font-size: 36px;
  color: #4C2A19;
  margin-bottom: 16px;
}

.gc-no-results__message {
  font-size: 17px;
  color: #666666;
  line-height: 1.7em;
  max-width: 500px;
  margin: 0 auto 40px;
}

.gc-no-results__links {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 16px;
  margin-bottom: 48px;
}

.gc-no-results__link {
  background: transparent;
  border: 1px solid #4C2A19;
  color: #4C2A19;
  padding: 12px 24px;
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s ease;
}

.gc-no-results__link:hover {
  background: #4C2A19;
  color: #FFFFFF;
}

/* Pagination */
.gc-search-pagination {
  text-align: center;
  padding: 40px 0 60px;
}

.gc-search-pagination .page-numbers {
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.gc-search-pagination a,
.gc-search-pagination span {
  padding: 10px 16px;
  border: 1px solid #E8DFD5;
  background: #FFFFFF;
  color: #4C2A19;
  font-size: 16px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s ease;
}

.gc-search-pagination .current {
  background: #B08D66;
  color: #FFFFFF;
  border-color: #B08D66;
}

.gc-search-pagination a:hover {
  background: #F5F3F0;
  border-color: #B08D66;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
  .gc-search-results-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 767px) {
  .gc-search-results-grid {
    grid-template-columns: 1fr;
  }

  .gc-search-card .gc-result-title {
    font-size: 22px;
  }

  .gc-no-results__heading {
    font-size: 28px;
  }

  .gc-no-results__links {
    flex-direction: column;
    align-items: center;
  }

  .gc-no-results__link {
    width: 100%;
    max-width: 280px;
    text-align: center;
  }
}
```

---

## Content Type Detection

To show appropriate badges for different content types, use this logic:

### PHP/Elementor Approach
```php
// In a custom widget or via Elementor's dynamic tags
function get_content_type_label($post) {
    $type = get_post_type($post);

    switch($type) {
        case 'post':
            return 'Blog Post';
        case 'page':
            return 'Page';
        case 'project':
            return 'Project';
        case 'faq':
            return 'FAQ';
        case 'testimonial':
            return 'Testimonial';
        default:
            return ucfirst($type);
    }
}
```

### Elementor Conditional Display
- For Posts widget, use the "Badge" feature
- Set badge text to show post type dynamically
- Use custom CSS with data attributes for different colors

---

## Implementation Checklist

- [ ] Create Search Results template in Theme Builder
- [ ] Set conditions: Search Results
- [ ] Build Section 1: Search header with title and form
- [ ] Build Section 2: Results grid with Posts widget
- [ ] Configure result card styling
- [ ] Build Section 3: No results message (conditional)
- [ ] Build Section 4: Pagination
- [ ] Add custom CSS
- [ ] Test with various search queries
- [ ] Test with empty/no results
- [ ] Test responsive behavior
- [ ] Verify all post types appear correctly
- [ ] Test pagination with multiple pages of results

---

## Notes for Implementation

1. **Post Types Included:** Ensure search includes: Posts, Pages, Projects, FAQs. Exclude Testimonials from public search.

2. **Relevance Ranking:** WordPress default relevance works well. For advanced ranking, consider Relevanssi plugin.

3. **Excerpt Length:** Limit excerpts to ~150 characters for consistent card heights.

4. **Badge Colors:** Use different badge colors for content types to help users quickly identify result types.

5. **Search Form Styling:** Match the search form styling across header, search results, and 404 page for consistency.

6. **Empty State:** The "No Results" section should only appear when `$wp_query->found_posts === 0`.

7. **Performance:** For sites with many posts, consider limiting searchable post types and using proper indexing.
