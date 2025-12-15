# Single Post Template Specification

**Template Type:** Theme Builder > Single
**Conditions:** Posts > All Posts
**Class Hook:** `gc-blog-single-v1`

---

## Overview

The Single Post template displays individual blog articles with a clean, readable layout. It includes back navigation, post metadata, content area with proper typography, author bio, CTA section, related posts, and a comments section with moderation.

---

## Design Specifications

### Colors
| Element | Color |
|---------|-------|
| Page Background | `#FFFFFF` |
| Category Badge BG | `#B08D66` |
| Category Badge Text | `#FFFFFF` |
| Meta Border | `#E8DFD5` |
| Blockquote Border | `#B08D66` |
| Related Posts BG | `#F5F3F0` |

### Typography
| Element | Font | Size | Weight |
|---------|------|------|--------|
| Post Title (H1) | Libre Baskerville | 64px/48px/36px | 700 |
| Content H2 | Libre Baskerville | 48px/36px/28px | 700 |
| Content H3 | Libre Baskerville | 32px/28px/24px | 700 |
| Body Text | Corbel | 18px | 400 |
| Meta Text | Corbel | 16px | 400/700 |

### Layout
| Property | Value |
|----------|-------|
| Content Max Width | 900px |
| Related Posts Width | 1200px |

---

## Container Tree

```
Section: .gc-blog-single-v1
├── Background: #FFFFFF
│
├── Section 1: Back Navigation
│   ├── Container: (max-width: 900px, centered)
│   ├── Background: #FFFFFF
│   ├── Padding: 60px 24px 0
│   │
│   └── Button Widget: Back to Articles
│       ├── Text: "Back to Articles"
│       ├── Link: /blog/
│       ├── Icon: Arrow Left (before text)
│       ├── Icon Spacing: 8px
│       ├── Typography: Corbel, 16px, 700, uppercase, letter-spacing: 1px
│       ├── Background: Transparent
│       ├── Text Color: #4C2A19
│       ├── Border: 1px solid #E8DFD5
│       ├── Border Radius: 0px
│       ├── Padding: 12px 20px
│       ├── Hover Background: #F5F3F0
│       ├── Hover Border Color: #B08D66
│       ├── Margin Bottom: 40px
│       └── Class: gc-back-button
│
├── Section 2: Post Header
│   ├── Container: (max-width: 900px, centered)
│   ├── Padding: 0 24px
│   │
│   ├── Post Terms Widget: Category Badge
│   │   ├── Taxonomy: Categories
│   │   ├── Show: First category only
│   │   ├── Display: Inline block
│   │   ├── Background: #B08D66
│   │   ├── Text Color: #FFFFFF
│   │   ├── Padding: 8px 16px
│   │   ├── Font: Corbel, 12px, 700, uppercase
│   │   ├── Letter Spacing: 1px
│   │   ├── Border Radius: 0px
│   │   ├── Margin Bottom: 24px
│   │   └── Class: gc-post-category
│   │
│   ├── Post Title Widget:
│   │   ├── Tag: H1
│   │   ├── Font: Libre Baskerville
│   │   ├── Size: 64px / 48px / 36px
│   │   ├── Weight: 700
│   │   ├── Color: #4C2A19
│   │   ├── Line Height: 1.1
│   │   ├── Letter Spacing: -1px
│   │   ├── Margin Bottom: 28px
│   │   └── Class: gc-post-title
│   │
│   ├── Post Info Widget: Meta Row (.gc-post-meta)
│   │   ├── Display: Flex row, wrap
│   │   ├── Gap: 24px
│   │   ├── Padding Bottom: 32px
│   │   ├── Margin Bottom: 40px
│   │   ├── Border Bottom: 2px solid #E8DFD5
│   │   │
│   │   ├── Author:
│   │   │   ├── Icon: User (before text)
│   │   │   ├── Icon Size: 18px
│   │   │   ├── Icon Color: #B08D66
│   │   │   ├── Text: {post_author}
│   │   │   ├── Font: Corbel, 16px, 700
│   │   │   └── Color: #231F20
│   │   │
│   │   ├── Date:
│   │   │   ├── Icon: Calendar (before text)
│   │   │   ├── Icon Size: 18px
│   │   │   ├── Icon Color: #B08D66
│   │   │   ├── Text: {post_date} (Month Day, Year)
│   │   │   ├── Font: Corbel, 16px
│   │   │   └── Color: #231F20
│   │   │
│   │   └── Read Time (optional):
│   │       ├── Icon: Clock (before text)
│   │       ├── Icon Size: 18px
│   │       ├── Icon Color: #B08D66
│   │       ├── Text: {gc_post_read_time} or calculated
│   │       └── Font: Corbel, 16px
│   │
│   └── Featured Image Widget:
│       ├── Size: Full
│       ├── Alignment: Full width of container
│       ├── Border Radius: 0px
│       ├── Box Shadow: 0 12px 24px rgba(35,31,32,0.15)
│       ├── Margin Bottom: 60px
│       └── Class: gc-featured-image
│
├── Section 3: Post Content
│   ├── Container: (max-width: 900px, centered)
│   ├── Padding: 0 24px
│   │
│   └── Post Content Widget: (.gc-post-content)
│       ├── Typography:
│       │   ├── Body Font: Corbel
│       │   ├── Body Size: 18px
│       │   ├── Body Color: #231F20
│       │   ├── Body Line Height: 1.7
│       │   └── Paragraph Margin Bottom: 28px
│       │
│       ├── H2 Styling:
│       │   ├── Font: Libre Baskerville
│       │   ├── Size: 48px / 36px / 28px
│       │   ├── Weight: 700
│       │   ├── Color: #4C2A19
│       │   ├── Margin Top: 60px
│       │   ├── Margin Bottom: 24px
│       │   ├── Line Height: 1.2
│       │   └── Letter Spacing: -0.5px
│       │
│       ├── H3 Styling:
│       │   ├── Font: Libre Baskerville
│       │   ├── Size: 32px / 28px / 24px
│       │   ├── Weight: 700
│       │   ├── Color: #4C2A19
│       │   ├── Margin Top: 48px
│       │   └── Margin Bottom: 20px
│       │
│       ├── Lists:
│       │   ├── Bullet Color: #B08D66
│       │   └── Item Spacing: 12px
│       │
│       ├── Links:
│       │   ├── Color: #B08D66
│       │   └── Hover: #4C2A19 with underline
│       │
│       └── Blockquotes:
│           ├── Border Left: 4px solid #B08D66
│           ├── Padding Left: 24px
│           ├── Font Style: Italic
│           └── Color: #4C2A19
│
├── Section 4: Author Bio
│   ├── Container: (max-width: 900px, centered)
│   ├── Padding: 0 24px
│   ├── Margin Top: 80px
│   │
│   └── Container: .gc-author-box
│       ├── Background: #F5F3F0
│       ├── Padding: 40px
│       ├── Display: Flex row
│       ├── Gap: 28px
│       ├── Flex Wrap: Wrap (mobile)
│       │
│       ├── Container: Author Avatar (100px × 100px)
│       │   ├── Background: #B08D66
│       │   ├── Border Radius: 50% OR 0
│       │   ├── Display: Flex center
│       │   │
│       │   └── If no photo, show initial:
│       │       ├── Font: Libre Baskerville, 42px, 700
│       │       └── Color: #FFFFFF
│       │
│       └── Container: Author Info
│           ├── Author Name:
│           │   ├── Dynamic: Author Meta > Name
│           │   ├── Font: Corbel, 24px, 700
│           │   ├── Color: #231F20
│           │   └── Margin Bottom: 12px
│           │
│           └── Author Bio:
│               ├── Dynamic: Author Meta > Bio
│               ├── Default (Micah): "Founder of Grander Construction with extensive experience in custom home building, outdoor living spaces, and luxury construction across Upstate South Carolina. Micah leads our team with a commitment to exceptional craftsmanship and client satisfaction."
│               ├── Font: Corbel, 16px
│               ├── Color: #231F20
│               └── Line Height: 1.7
│
├── Section 5: Post CTA
│   ├── Container: (max-width: 900px, centered)
│   ├── Padding: 60px 24px 0
│   ├── Margin Top: 60px
│   ├── Border Top: 2px solid #E8DFD5
│   ├── Text Align: Center
│   │
│   ├── Heading Widget:
│   │   ├── Text: "Ready to start your project?"
│   │   ├── Tag: H3
│   │   ├── Font: Libre Baskerville, 36px/30px/26px, 700
│   │   ├── Color: #4C2A19
│   │   └── Margin Bottom: 20px
│   │
│   ├── Text Widget:
│   │   ├── Text: "Contact Grander Construction today to discuss your custom home vision"
│   │   ├── Font: Corbel, 18px
│   │   ├── Color: #231F20
│   │   ├── Line Height: 1.7
│   │   └── Margin Bottom: 32px
│   │
│   └── Button Widget:
│       ├── Text: "Schedule Consultation"
│       ├── Link: /contact/ OR lightbox trigger
│       ├── Class: gc-btn gc-btn--brown gc-estimate-trigger
│       ├── Data Attribute: data-gc-estimate-trigger="true"
│       ├── Background: #4C2A19
│       ├── Text Color: #FFFFFF
│       ├── Padding: 18px 40px
│       ├── Hover Background: #B08D66
│       └── Hover Transform: translateY(-2px)
│
├── Section 6: Comments (.gc-comments)
│   ├── Container: (max-width: 900px, centered)
│   ├── Margin Top: 80px
│   ├── Padding: 80px 24px 0
│   ├── Border Top: 2px solid #E8DFD5
│   │
│   ├── Heading Widget:
│   │   ├── Text: "Comments" or "{comment_count} Comments"
│   │   ├── Tag: H3
│   │   ├── Font: Libre Baskerville, 32px, 700
│   │   ├── Color: #4C2A19
│   │   └── Margin Bottom: 48px
│   │
│   ├── Comments List:
│   │   └── [WordPress native comments or custom loop]
│   │       ├── .gc-comment
│   │       │   ├── Padding: 32px 0
│   │       │   ├── Border Bottom: 1px solid #E8DFD5
│   │       │   │
│   │       │   ├── .gc-comment__author (Corbel, 16px, 700, #4C2A19)
│   │       │   ├── .gc-comment__date (Corbel, 14px, #666666)
│   │       │   └── .gc-comment__content (Corbel, 16px, 1.7 line-height)
│   │
│   └── Comment Form:
│       ├── Heading: "Leave a Comment"
│       ├── Font: Libre Baskerville, 24px, 700
│       ├── Form Fields: Name, Email, Comment
│       ├── Submit Button: gc-btn gc-btn--primary
│       └── Note: "Your email address will not be published."
│
└── Section 7: Related Posts (Optional)
    ├── Container: (max-width: 1200px, centered)
    ├── Background: #F5F3F0
    ├── Padding: 80px 24px
    ├── Margin Top: 80px
    │
    ├── Heading Widget:
    │   ├── Text: "More from The Blueprint"
    │   ├── Tag: H3
    │   ├── Font: Libre Baskerville, 36px, 700
    │   ├── Color: #4C2A19
    │   ├── Alignment: Center
    │   └── Margin Bottom: 48px
    │
    └── Posts Widget: .gc-related-posts
        ├── Source: Related (same category)
        ├── Columns: 3 / 2 / 1
        ├── Posts Count: 3
        ├── Exclude Current Post: Yes
        └── Card Styling: Same as archive grid
```

---

## Comments Configuration

**Important:** Comments appear ONLY on single post pages.

### Moderation Settings (WordPress)
| Setting | Value |
|---------|-------|
| Allow comments | Yes (per post) |
| Require name and email | Yes |
| Comment author must have prior approval | Yes (first-time) |
| Hold for moderation if contains links | 2+ links |
| Comment moderation | Enable |
| Comment blacklist | Configure common spam terms |

---

## Responsive Behavior

### Desktop (1025px+)
- Full typography sizes
- 900px content width
- Author bio in row layout
- 3-column related posts

### Tablet (768px - 1024px)
- Reduced heading sizes
- Author bio may wrap
- 2-column related posts

### Mobile (767px and below)
- Smallest heading sizes
- Author bio stacks vertically (centered)
- 1-column related posts
- Full-width buttons

---

## CSS Additions

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
}

.gc-post-content h3 {
    font-family: 'Libre Baskerville', serif;
    font-size: 32px;
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

.gc-post-content ul li::marker {
    color: #B08D66;
}

/* Comments */
.gc-comments {
    margin-top: 80px;
    padding-top: 80px;
    border-top: 2px solid #E8DFD5;
}

@media (max-width: 767px) {
    .gc-post-content h2 { font-size: 28px; margin-top: 40px; }
    .gc-post-content h3 { font-size: 24px; margin-top: 32px; }
    .gc-author-box { flex-direction: column; text-align: center; }
}
```

---

## Implementation Checklist

- [ ] Create Single template in Theme Builder
- [ ] Set conditions: All Posts
- [ ] Build back navigation section
- [ ] Build post header with category, title, meta
- [ ] Add featured image with shadow
- [ ] Configure post content typography
- [ ] Build author bio box
- [ ] Add post CTA section
- [ ] Add comments section with form
- [ ] Add related posts section (optional)
- [ ] Configure WordPress comment settings
- [ ] Add custom CSS
- [ ] Test responsive at all breakpoints
- [ ] Test with sample posts
- [ ] Verify comments display and submit
- [ ] Test comment moderation flow

---

End of single post template specification.
