# Blog Templates Build Specification

**Template Type:** Theme Builder → Archive (Blog Archive) + Single (Blog Single Post)
**Last Updated:** 2025-12-10
**Status:** Ready for Implementation

---

## Overview

This specification covers two related templates:
1. **Blog Archive Template** - Displays the blog listing page with search and post grid
2. **Blog Single Post Template** - Displays individual blog post content

Both templates use the title "The Blueprint" as the blog section name per the Site Plan Master document.

---

## Visual Design Reference

Based on `blog_preview.tsx` artifact analysis:

### Color Palette
| Token | Hex | Usage |
|-------|-----|-------|
| Primary Gold | `#B08D66` | Category badges, icons, accents |
| Deep Brown | `#4C2A19` | Headlines, buttons |
| Text Dark | `#231F20` | Body text, card titles |
| Warm Background | `#F5F3F0` | Archive page background |
| White | `#FFFFFF` | Cards, single post background |
| Border Light | `#E8DFD5` | Borders, dividers |

### Typography
| Element | Font | Size | Weight | Color |
|---------|------|------|--------|-------|
| Archive H1 | Libre Baskerville | 64px desktop / 48px tablet / 36px mobile | 700 | Deep Brown |
| Card Title | Libre Baskerville | 30px | 700 | Text Dark |
| Single H1 | Libre Baskerville | 64px desktop / 48px tablet / 36px mobile | 700 | Deep Brown |
| Single H2 | Libre Baskerville | 48px desktop / 36px tablet / 28px mobile | 700 | Deep Brown |
| Body Text | Corbel | 18px | 400 | Text Dark |
| Category Badge | Corbel | 12px | 700, uppercase | White on Gold |
| Meta Text | Corbel | 14-16px | 400 | Text Dark |

### Card Styling
- Border radius: 0px (sharp corners)
- Top border: 3px solid `#B08D66`
- Shadow: `0 8px 20px rgba(35,31,32,0.08)`
- Hover shadow: `0 12px 30px rgba(35,31,32,0.12)`
- Hover transform: `translateY(-4px)`

---

## Part 1: Blog Archive Template

### Template Configuration
- **Template Type:** Archive
- **Conditions:** Posts Archive, Post Categories
- **Class Hook:** `gc-blog-archive-v1`

---

### Section 1: Archive Hero

**Purpose:** Title area with optional search functionality

**Container Settings:**
- Full width
- Background: `#F5F3F0` (Warm Background)
- Padding: 80px top, 60px bottom (desktop)
- Padding: 60px top, 40px bottom (mobile)

**Layout:** Single column, centered

#### Widget 1.1: Archive Title (Heading)
- **Content:**
  - If ACF field exists: `{gc_blog_hero_headline}` from ACF Options → Blog Settings
  - Default fallback: "The Blueprint"
- **HTML Tag:** H1
- **Alignment:** Center
- **Typography:**
  - Font: Libre Baskerville
  - Size: 64px desktop / 48px tablet / 36px mobile
  - Weight: 700
  - Color: `#4C2A19`
  - Letter spacing: -1px
  - Line height: 1.1em
- **Class:** `gc-archive-title`

#### Widget 1.2: Archive Subtitle (Text Editor)
- **Content:**
  - If ACF field exists: `{gc_blog_hero_subline}` from ACF Options
  - Default: "Practical ideas, project highlights, material insights, and build process guidance for Upstate homeowners."
- **Alignment:** Center
- **Typography:**
  - Font: Corbel
  - Size: 18px
  - Color: `#231F20`
  - Line height: 1.7em
- **Max width:** 600px (use CSS or container width)
- **Margin:** 0 auto 40px

#### Widget 1.3: Search Form (Search Form Widget)
- **Style:** Minimal
- **Max width:** 700px
- **Alignment:** Center
- **Input Styling:**
  - Background: `#FFFFFF`
  - Border: 1px solid `#E8DFD5`
  - Border radius: 0px
  - Padding: 16px 18px 16px 50px
  - Font: Corbel, 16px
  - Shadow: `0 4px 8px rgba(76,42,25,0.1)`
  - Focus border color: `#B08D66`
- **Search Icon:**
  - Color: `#B08D66`
  - Position: Inside left
  - Size: 20px
- **Class:** `gc-blog-search`

---

### Section 2: Posts Grid

**Purpose:** Display blog posts in a responsive card grid

**Container Settings:**
- Content width: 1200px
- Background: `#F5F3F0`
- Padding: 0px top, 60px bottom

#### Widget 2.1: Posts Widget (Elementor Pro Posts)
- **Skin:** Classic
- **Columns:** 3 desktop / 2 tablet / 1 mobile
- **Gap:** 30px

**Card Layout:**
- **Image Position:** Top (Above content)
- **Image Size:** Custom ratio 16:10.5 (or aspect ratio ~1.52:1)
- **Image Height:** 280px fixed

**Card Styling:**
- Background: `#FFFFFF`
- Border radius: 0px
- Border top: 3px solid `#B08D66`
- Box shadow: `0 8px 20px rgba(35,31,32,0.08)`
- Hover box shadow: `0 12px 30px rgba(35,31,32,0.12)`
- Hover transform: `translateY(-4px)`
- Transition: all 0.3s ease

**Card Content Padding:** 32px 28px

**Meta Data Display:**
1. **Category Badge:**
   - Show: Yes
   - Position: Above title
   - Style: Solid background
   - Background: `#B08D66`
   - Text color: `#FFFFFF`
   - Padding: 8px 16px
   - Font: Corbel, 12px, 700, uppercase
   - Letter spacing: 1px
   - Margin bottom: 16px

2. **Title:**
   - HTML Tag: H2
   - Font: Libre Baskerville
   - Size: 30px desktop / 26px tablet / 24px mobile
   - Weight: 700
   - Color: `#231F20`
   - Line height: 1.3em
   - Margin bottom: 14px

3. **Excerpt:**
   - Show: Yes
   - Length: ~150 characters
   - Font: Corbel, 16px
   - Color: `#231F20`
   - Line height: 1.7em
   - Margin bottom: 20px

4. **Meta Row (below excerpt):**
   - Display: Flex row with wrap
   - Gap: 20px
   - Border top: 1px solid `#E8DFD5`
   - Padding top: 20px
   - Font: Corbel, 14px
   - Color: `#231F20`
   - Icon color: `#B08D66`
   - Icon size: 16px
   - Show: Author, Date, Read Time (if available)

**Pagination:**
- Type: Numbers with arrows
- Alignment: Center
- Style: Minimal
- Active color: `#B08D66`
- Margin top: 60px

**Query:**
- Source: Posts
- Posts per page: 9 (or from `{gc_blog_posts_per_page}` if field exists)
- Order by: Date (descending)

**Class:** `gc-posts-grid-v1`

---

### Section 3: No Results Message (Conditional)

**Purpose:** Display when no posts match search/filter

**Condition:** Show only when archive has no posts

**Container Settings:**
- Full width
- Background: `#F5F3F0`
- Padding: 80px top/bottom
- Text align: Center

#### Widget 3.1: No Results Text
- **Content:** "No articles found matching your search."
- **Font:** Corbel, 18px
- **Color:** `#231F20`

---

### Blog Archive Custom CSS

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

## Part 2: Blog Single Post Template

### Template Configuration
- **Template Type:** Single
- **Conditions:** Posts → All Posts
- **Class Hook:** `gc-blog-single-v1`

---

### Section 1: Back Navigation

**Purpose:** Allow users to return to blog archive

**Container Settings:**
- Content width: 900px
- Background: `#FFFFFF`
- Padding: 60px top, 0px bottom

#### Widget 1.1: Back to Articles Button
- **Type:** Button
- **Text:** "Back to Articles"
- **Link:** `/blog/` (or blog archive URL)
- **Icon:** Arrow Left (before text)
- **Icon spacing:** 8px
- **Typography:**
  - Font: Corbel
  - Size: 16px
  - Weight: 700
  - Text transform: Uppercase
  - Letter spacing: 1px
- **Style:**
  - Background: Transparent
  - Text color: `#4C2A19`
  - Border: 1px solid `#E8DFD5`
  - Border radius: 0px
  - Padding: 12px 20px
- **Hover:**
  - Background: `#F5F3F0`
  - Border color: `#B08D66`
- **Margin bottom:** 40px
- **Class:** `gc-back-button`

---

### Section 2: Post Header

**Purpose:** Display post metadata, title, and featured image

**Container Settings:**
- Content width: 900px
- Background: `#FFFFFF`
- Padding: 0px

#### Widget 2.1: Category Badge (Post Terms)
- **Taxonomy:** Categories
- **Show:** First category only
- **Style:**
  - Display: Inline block
  - Background: `#B08D66`
  - Text color: `#FFFFFF`
  - Padding: 8px 16px
  - Font: Corbel, 12px, 700, uppercase
  - Letter spacing: 1px
  - Border radius: 0px
- **Margin bottom:** 24px
- **Class:** `gc-post-category`

#### Widget 2.2: Post Title (Post Title)
- **HTML Tag:** H1
- **Typography:**
  - Font: Libre Baskerville
  - Size: 64px desktop / 48px tablet / 36px mobile
  - Weight: 700
  - Color: `#4C2A19`
  - Line height: 1.1em
  - Letter spacing: -1px
- **Margin bottom:** 28px
- **Class:** `gc-post-title`

#### Widget 2.3: Post Meta Row (Post Info)
- **Display:** Flex row with wrap
- **Gap:** 24px
- **Padding bottom:** 32px
- **Margin bottom:** 40px
- **Border bottom:** 2px solid `#E8DFD5`

**Meta Items:**
1. **Author:**
   - Icon: User (before text)
   - Icon size: 18px
   - Icon color: `#B08D66`
   - Text: `{post_author}`
   - Font: Corbel, 16px, 700
   - Color: `#231F20`

2. **Date:**
   - Icon: Calendar (before text)
   - Icon size: 18px
   - Icon color: `#B08D66`
   - Text: `{post_date}` (format: "Month Day, Year")
   - Font: Corbel, 16px
   - Color: `#231F20`

3. **Read Time (optional):**
   - Icon: Clock (before text)
   - Icon size: 18px
   - Icon color: `#B08D66`
   - Text: `{gc_post_read_time}` from ACF or estimated
   - Font: Corbel, 16px
   - Color: `#231F20`

- **Class:** `gc-post-meta`

#### Widget 2.4: Featured Image (Featured Image)
- **Size:** Full
- **Alignment:** Left (full width of container)
- **Border radius:** 0px
- **Box shadow:** `0 12px 24px rgba(35,31,32,0.15)`
- **Margin bottom:** 60px
- **Class:** `gc-featured-image`

---

### Section 3: Post Content

**Purpose:** Display the main post content

**Container Settings:**
- Content width: 900px
- Background: `#FFFFFF`
- Padding: 0px

#### Widget 3.1: Post Content (Post Content)
- **Typography:**
  - Body font: Corbel
  - Body size: 18px
  - Body color: `#231F20`
  - Body line height: 1.7em
  - Paragraph margin bottom: 28px

**Content H2 Styling:**
- Font: Libre Baskerville
- Size: 48px desktop / 36px tablet / 28px mobile
- Weight: 700
- Color: `#4C2A19`
- Margin top: 60px
- Margin bottom: 24px
- Line height: 1.2em
- Letter spacing: -0.5px

**Content H3 Styling:**
- Font: Libre Baskerville
- Size: 32px desktop / 28px tablet / 24px mobile
- Weight: 700
- Color: `#4C2A19`
- Margin top: 48px
- Margin bottom: 20px

**Lists:**
- Bullet color: `#B08D66`
- Spacing: 12px between items

**Links:**
- Color: `#B08D66`
- Hover: `#4C2A19` with underline

**Blockquotes:**
- Border left: 4px solid `#B08D66`
- Padding left: 24px
- Font style: Italic
- Color: `#4C2A19`

- **Class:** `gc-post-content`

---

### Section 4: Author Bio Box

**Purpose:** Display author information after post content

**Container Settings:**
- Content width: 900px
- Background: `#FFFFFF`
- Padding: 0px
- Margin top: 80px

#### Widget 4.1: Author Box Container (Inner Section)
- **Background:** `#F5F3F0`
- **Padding:** 40px
- **Layout:** Flex row
- **Gap:** 28px
- **Flex wrap:** Wrap on mobile

**Column A: Author Avatar (40% on desktop, 100% mobile)**
- **Type:** Spacer with background OR Author Box with image
- **Size:** 100px × 100px
- **Background:** `#B08D66`
- **Content:** Author initial letter (if no photo)
- **Initial styling:**
  - Font: Libre Baskerville
  - Size: 42px
  - Weight: 700
  - Color: `#FFFFFF`
  - Display: Flex center

**Column B: Author Info (60% on desktop, 100% mobile)**
- **Author Name:**
  - Type: Dynamic Tag → Author Meta → Name
  - Font: Corbel, 24px, 700
  - Color: `#231F20`
  - Margin bottom: 12px

- **Author Bio:**
  - Type: Dynamic Tag → Author Meta → Bio OR Text Editor with default
  - Default for Micah: "Founder of Grander Construction with extensive experience in custom home building, outdoor living spaces, and luxury construction across Upstate South Carolina. Micah leads our team with a commitment to exceptional craftsmanship and client satisfaction."
  - Font: Corbel, 16px
  - Color: `#231F20`
  - Line height: 1.7em

- **Class:** `gc-author-box`

---

### Section 5: Post CTA

**Purpose:** Encourage contact after reading

**Container Settings:**
- Content width: 900px
- Background: `#FFFFFF`
- Padding: 60px top
- Margin top: 60px
- Border top: 2px solid `#E8DFD5`
- Text align: Center

#### Widget 5.1: CTA Heading
- **Content:** "Ready to start your project?"
- **HTML Tag:** H3
- **Typography:**
  - Font: Libre Baskerville
  - Size: 36px desktop / 30px tablet / 26px mobile
  - Weight: 700
  - Color: `#4C2A19`
- **Margin bottom:** 20px

#### Widget 5.2: CTA Text
- **Content:** "Contact Grander Construction today to discuss your custom home vision"
- **Font:** Corbel, 18px
- **Color:** `#231F20`
- **Line height:** 1.7em
- **Margin bottom:** 32px

#### Widget 5.3: CTA Button
- **Text:** "Schedule Consultation"
- **Link:** `/contact/` or Estimate lightbox trigger
- **Typography:**
  - Font: Corbel
  - Size: 16px
  - Weight: 700
  - Text transform: Uppercase
  - Letter spacing: 1px
- **Style:**
  - Background: `#4C2A19`
  - Text color: `#FFFFFF`
  - Border radius: 0px
  - Padding: 18px 40px
  - Box shadow: `0 4px 8px rgba(76,42,25,0.2)`
- **Hover:**
  - Background: `#B08D66`
  - Transform: `translateY(-2px)`
  - Box shadow: `0 6px 12px rgba(76,42,25,0.25)`
- **Class:** `gc-cta-button`

---

### Section 6: Related Posts (Optional)

**Purpose:** Show related content to keep visitors engaged

**Container Settings:**
- Content width: 1200px
- Background: `#F5F3F0`
- Padding: 80px top/bottom
- Margin top: 80px

#### Widget 6.1: Section Title
- **Content:** "More from The Blueprint"
- **HTML Tag:** H3
- **Typography:**
  - Font: Libre Baskerville
  - Size: 36px
  - Weight: 700
  - Color: `#4C2A19`
- **Alignment:** Center
- **Margin bottom:** 48px

#### Widget 6.2: Related Posts Grid (Posts Widget)
- **Source:** Related (same category)
- **Columns:** 3 desktop / 2 tablet / 1 mobile
- **Posts count:** 3
- **Exclude current post:** Yes
- **Card styling:** Same as archive grid cards
- **Class:** `gc-related-posts`

---

### Blog Single Post Custom CSS

```css
/* Single Post Styles */
.gc-blog-single-v1 {
  background-color: #FFFFFF;
}

/* Back button hover */
.gc-back-button:hover {
  background-color: #F5F3F0;
  border-color: #B08D66;
}

/* Content typography */
.gc-post-content h2 {
  font-family: 'Libre Baskerville', serif;
  font-size: 48px;
  font-weight: 700;
  color: #4C2A19;
  margin-top: 60px;
  margin-bottom: 24px;
  line-height: 1.2em;
  letter-spacing: -0.5px;
}

.gc-post-content h3 {
  font-family: 'Libre Baskerville', serif;
  font-size: 32px;
  font-weight: 700;
  color: #4C2A19;
  margin-top: 48px;
  margin-bottom: 20px;
}

.gc-post-content p {
  margin-bottom: 28px;
}

.gc-post-content a {
  color: #B08D66;
  transition: color 0.2s ease;
}

.gc-post-content a:hover {
  color: #4C2A19;
  text-decoration: underline;
}

.gc-post-content blockquote {
  border-left: 4px solid #B08D66;
  padding-left: 24px;
  font-style: italic;
  color: #4C2A19;
  margin: 32px 0;
}

.gc-post-content ul,
.gc-post-content ol {
  margin-bottom: 28px;
  padding-left: 24px;
}

.gc-post-content li {
  margin-bottom: 12px;
}

.gc-post-content ul li::marker {
  color: #B08D66;
}

/* Author box */
.gc-author-box {
  display: flex;
  flex-wrap: wrap;
  gap: 28px;
}

/* CTA button hover */
.gc-cta-button:hover {
  background-color: #B08D66 !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 12px rgba(76,42,25,0.25);
}

/* Responsive adjustments */
@media (max-width: 1024px) {
  .gc-post-content h2 {
    font-size: 36px;
  }

  .gc-post-content h3 {
    font-size: 28px;
  }
}

@media (max-width: 767px) {
  .gc-post-content h2 {
    font-size: 28px;
    margin-top: 40px;
    margin-bottom: 20px;
  }

  .gc-post-content h3 {
    font-size: 24px;
    margin-top: 32px;
  }

  .gc-author-box {
    flex-direction: column;
    text-align: center;
  }
}
```

---

## ACF Fields Reference

### Blog Settings (ACF Options Page)
| Field Name | Type | Location | Notes |
|------------|------|----------|-------|
| `gc_blog_hero_headline` | Text | Options | Default: "The Blueprint" |
| `gc_blog_hero_subline` | Textarea | Options | Archive subtitle |
| `gc_blog_posts_per_page` | Number | Options | Default: 9 |

### Post-Level Fields (Per Post)
| Field Name | Type | Notes |
|------------|------|-------|
| `gc_post_read_time` | Text | Optional, e.g. "5 min read" |
| `gc_post_featured` | True/False | Mark as featured post |

---

## Implementation Checklist

### Blog Archive Template
- [ ] Create new Archive template in Theme Builder
- [ ] Set conditions: Posts Archive, Post Categories
- [ ] Build Section 1: Archive Hero with search
- [ ] Build Section 2: Posts Grid with proper card styling
- [ ] Configure pagination
- [ ] Add custom CSS
- [ ] Test responsive behavior
- [ ] Test search functionality

### Blog Single Post Template
- [ ] Create new Single template in Theme Builder
- [ ] Set conditions: All Posts
- [ ] Build Section 1: Back navigation
- [ ] Build Section 2: Post header with meta
- [ ] Build Section 3: Post content with typography
- [ ] Build Section 4: Author bio box
- [ ] Build Section 5: Post CTA
- [ ] Build Section 6: Related posts (optional)
- [ ] Add custom CSS
- [ ] Test responsive behavior
- [ ] Test with sample posts

---

## Notes for Implementation

1. **Card Hover Effects:** The Posts widget may require custom CSS to achieve the exact hover transform and shadow transitions shown in the design.

2. **Category Badge Styling:** Default Elementor badges may need custom CSS to match the specific gold background and typography.

3. **Author Bio Fallback:** If no author bio is set, use a default bio text. For Micah specifically, use the provided founder bio.

4. **Read Time:** This can be calculated manually and added via ACF field, or use a WordPress plugin that auto-calculates reading time.

5. **Search Styling:** The search form widget may need custom CSS to match the design exactly, especially for focus states.

6. **Related Posts:** If Elementor Pro's related posts query doesn't provide desired results, consider using a custom query based on categories.
