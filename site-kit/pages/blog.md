# Blog Page Specification

**Slug:** `/blog/`
**Template:** Uses Blog Archive Template (Theme Builder)
**Blog Name:** "The Blueprint"

---

## Overview

The Blog page displays "The Blueprint"—Grander's blog featuring practical ideas, project highlights, material insights, and build process guidance for Upstate homeowners. The actual page behavior comes from the Blog Archive template.

---

## Page Configuration

### WordPress Setup
```
Page Setup:
├── Create page: "The Blueprint" at /blog/
├── Set as Posts Page: Settings > Reading > Posts page
└── Template assignment comes from Theme Builder Archive template
```

### Template Relationship
The `/blog/` URL displays content from the Blog Archive template spec (`templates/blog-archive.md`):
- Archive hero with "The Blueprint" title
- Search functionality
- 3-column post grid
- Pagination

---

## Content Strategy

### Blog Categories
```
├── Build Tips — Practical advice for homeowners
├── Project Spotlights — Featured completed projects
├── Materials & Products — Product recommendations and reviews
├── Design Inspiration — Design trends and ideas
├── Behind the Build — Process insights and construction details
└── Community — Local events, partnerships, news
```

### Sample Post Titles
```
├── "5 Questions to Ask Before Building a Custom Home"
├── "Why We Use ZIP System Sheathing on Every Project"
├── "Project Spotlight: The Thornwood Estate"
├── "Indoor-Outdoor Living: Design Ideas for the Upstate"
├── "Understanding Your Builder's Allowances"
├── "What Makes a High-Performance Home?"
├── "Choosing the Right Deck Material for SC Weather"
└── "Our Favorite Local Suppliers and Partners"
```

---

## SEO Configuration

### Meta Title
"The Blueprint | Grander Construction Blog"

### Meta Description
"Practical ideas, project highlights, material insights, and build process guidance for Upstate homeowners building custom homes and outdoor living spaces."

### Schema
- WebPage schema
- Blog schema on archive
- Article schema on individual posts

---

## ACF Options Fields

| Field | Type | Usage |
|-------|------|-------|
| `gc_blog_hero_headline` | Text | Archive title (default: "The Blueprint") |
| `gc_blog_hero_subline` | Textarea | Archive subtitle |
| `gc_blog_posts_per_page` | Number | Posts per page (default: 9) |

---

## Single Post Template

Individual blog posts use the Single Post template (`templates/single-post.md`):
- Back navigation
- Category badge
- Post title and meta
- Featured image
- Post content with typography
- Author bio
- CTA section
- Comments section
- Related posts

---

## Comments Configuration

**Comments appear ONLY on single post pages.**

WordPress Settings:
```
├── Allow comments: Yes (per post)
├── Require name and email: Yes
├── First-time comment moderation: Yes
├── Hold for links: 2+ links
├── Comment blacklist: Configure spam terms
```

---

## Implementation Checklist

- [ ] Create "The Blueprint" page at /blog/
- [ ] Set as Posts Page in Settings > Reading
- [ ] Verify Blog Archive template applies
- [ ] Create blog categories
- [ ] Configure ACF options fields
- [ ] Create sample posts (3-5)
- [ ] Configure comments settings
- [ ] Test archive display
- [ ] Test single post display
- [ ] Test comments functionality
- [ ] Test search within blog

---

End of Blog page specification.
