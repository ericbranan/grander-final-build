# WordPress Configuration Checklist

Version: 1.0.0

This document covers all WordPress settings required for the Grander Construction site, including comments moderation, permalinks, redirects, image requirements, and schema outputs.

---

## 1. General Settings

### Settings > General
| Setting | Value |
|---------|-------|
| Site Title | Grander Construction |
| Tagline | Custom Homes & Outdoor Living |
| WordPress Address | https://granderconstruction.com |
| Site Address | https://granderconstruction.com |
| Admin Email | admin@granderconstruction.com |
| Timezone | America/New_York |
| Date Format | F j, Y |
| Time Format | g:i a |

---

## 2. Reading Settings

### Settings > Reading
| Setting | Value |
|---------|-------|
| Your homepage displays | A static page |
| Homepage | Home |
| Posts page | The Blueprint (Blog) |
| Search engine visibility | Unchecked (allow indexing) |

---

## 3. Permalink Settings

### Settings > Permalinks
| Setting | Value |
|---------|-------|
| Common Settings | Post name |
| Custom Structure | `/%postname%/` |
| Category base | (leave empty) |
| Tag base | (leave empty) |

### Expected URL Structure
```
/                           → Home
/about/                     → About Our Company
/our-team/                  → Our Team
/build-process/             → Build Process
/performance-building/      → Performance Building
/custom-homes/              → Custom Homes
/outdoor-spaces/            → Outdoor Spaces
/pool-houses-garages-adus/  → Pool Houses, Garages & ADUs
/sunrooms-additions/        → Sunrooms & Additions
/gallery/                   → Gallery
/blog/                      → Blog Archive
/blog/post-slug/            → Single Blog Post
/contact/                   → Contact
/request-an-estimate/       → Request an Estimate
```

---

## 4. Discussion Settings (Comments)

### Settings > Discussion

#### Default Post Settings
| Setting | Value |
|---------|-------|
| Allow link notifications from other blogs | Checked |
| Allow people to submit comments | Checked |

#### Other Comment Settings
| Setting | Value |
|---------|-------|
| Comment author must fill out name and email | Checked |
| Users must be registered and logged in to comment | Unchecked |
| Automatically close comments on posts older than X days | Unchecked |
| Enable threaded (nested) comments | Checked (2 levels) |
| Break comments into pages | Unchecked |

#### Email Me Whenever
| Setting | Value |
|---------|-------|
| Anyone posts a comment | Checked |
| A comment is held for moderation | Checked |

#### Before a Comment Appears
| Setting | Value |
|---------|-------|
| Comment must be manually approved | Unchecked |
| Comment author must have a previously approved comment | **Checked** |

#### Comment Moderation
| Setting | Value |
|---------|-------|
| Hold comment if it contains X or more links | 2 |
| Moderation words | See list below |

#### Moderation Word List
```
viagra
cialis
pharmacy
casino
poker
slots
gambling
loan
mortgage
cryptocurrency
bitcoin
xxx
porn
adult
webcam
dating
hookup
singles
free money
make money fast
work from home
click here
buy now
limited time
act now
urgent
winner
congratulations
claim your prize
```

#### Disallowed Comment Keys (Blacklist)
```
[Add known spam domains and phrases as they appear]
```

#### Avatars
| Setting | Value |
|---------|-------|
| Show Avatars | Checked |
| Default Avatar | Mystery Person |

---

## 5. Comment Behavior Notes

### Critical Requirements
1. **Comments on Single Posts Only** — Comments section appears only on individual blog post pages, not on pages or archives
2. **First-Time Approval Required** — New commenters require manual approval before their comment appears
3. **Email Notifications** — Admin receives email for all new comments and held comments
4. **Spam Mitigation** — Use Akismet or similar plugin for additional spam filtering

### Recommended Plugins for Comments
- Akismet Anti-Spam (required)
- WPDiscuz (optional, for enhanced comment features)

---

## 6. Required Redirects

### Services Landing Page Prevention
If any `/services/` page exists or is created accidentally:

```
# .htaccess or redirect plugin
Redirect 301 /services/ /custom-homes/
```

### Other Recommended Redirects
```
# Common typos and alternatives
Redirect 301 /about-us/ /about/
Redirect 301 /team/ /our-team/
Redirect 301 /process/ /build-process/
Redirect 301 /portfolio/ /gallery/
Redirect 301 /projects/ /gallery/
Redirect 301 /estimate/ /request-an-estimate/
Redirect 301 /quote/ /request-an-estimate/
Redirect 301 /blog/page/1/ /blog/
```

### Redirect Plugin Recommendation
Use "Redirection" plugin by John Godley for managing redirects in WordPress.

---

## 7. Image Requirements

### Alt Text Requirements

**All images must have descriptive alt text that:**
- Describes the image content
- Includes relevant keywords naturally
- Is under 125 characters
- Avoids "image of" or "photo of" prefix

### Alt Text Examples
| Image Type | Good Alt Text |
|------------|---------------|
| Custom home exterior | "Two-story custom home with stone facade in Greenville SC" |
| Team photo | "Grander Construction team on job site" |
| Headshot | "Micah Grander, founder of Grander Construction" |
| Outdoor space | "Covered patio with outdoor kitchen and fireplace" |
| Gallery project | "Thornwood Estate custom home exterior at sunset" |

### Image Size Guidelines
| Usage | Recommended Size |
|-------|-----------------|
| Hero backgrounds | 1920×1080 (16:9), 2x for retina |
| Gallery images | 1200×900 (4:3), 2x thumbnails |
| Team headshots | 600×600 (1:1), square crop |
| Blog featured | 1200×630 (social share ratio) |
| Service cards | 800×600 (4:3) |

### Image Optimization
- Compress all images (target < 200KB for most)
- Use WebP format where supported
- Implement lazy loading
- Use srcset for responsive images

---

## 8. Schema Output Requirements

### Site-Wide Schema
```json
{
  "@context": "https://schema.org",
  "@type": "HomeBuilder",
  "name": "Grander Construction",
  "url": "https://granderconstruction.com",
  "logo": "https://granderconstruction.com/logo.png",
  "description": "Custom home builder serving Greenville, Spartanburg, and the Upstate of South Carolina",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "123 Main Street",
    "addressLocality": "Greenville",
    "addressRegion": "SC",
    "postalCode": "29601"
  },
  "telephone": "(864) 555-0123",
  "email": "info@granderconstruction.com",
  "areaServed": ["Greenville", "Spartanburg", "Anderson", "Upstate South Carolina"],
  "priceRange": "$$$$"
}
```

### Page-Specific Schema

| Page Type | Schema Type |
|-----------|-------------|
| Home | WebSite + LocalBusiness |
| About | AboutPage + Organization |
| Service Pages | Service |
| Blog Archive | Blog |
| Single Post | Article + BreadcrumbList |
| Gallery | ImageGallery |
| Contact | ContactPage |
| Team | AboutPage + Person (for each member) |
| FAQ sections | FAQPage |

### Blog Post Schema Example
```json
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Post Title",
  "author": {
    "@type": "Person",
    "name": "Author Name"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Grander Construction",
    "logo": { ... }
  },
  "datePublished": "2025-01-15",
  "dateModified": "2025-01-15",
  "image": "...",
  "mainEntityOfPage": { ... }
}
```

### Recommended Plugin
Use **Yoast SEO** or **Rank Math** for automated schema output.

---

## 9. Security Settings

### Recommended Security Plugins
- Wordfence Security
- UpdraftPlus (backups)
- Two-Factor Authentication

### Security Checklist
- [ ] Change default admin username
- [ ] Use strong passwords (16+ characters)
- [ ] Enable two-factor authentication
- [ ] Limit login attempts
- [ ] Keep WordPress core updated
- [ ] Keep plugins updated
- [ ] Keep theme updated
- [ ] Configure daily backups
- [ ] SSL certificate installed and enforced

---

## 10. Performance Settings

### Recommended Performance Plugins
- WP Rocket (caching)
- Imagify (image optimization)
- Asset CleanUp (remove unused CSS/JS)

### Performance Checklist
- [ ] Enable page caching
- [ ] Enable browser caching
- [ ] Minify CSS and JavaScript
- [ ] Lazy load images
- [ ] Use CDN (Cloudflare or similar)
- [ ] Enable GZIP compression
- [ ] Optimize database regularly

---

## 11. Plugin Requirements

### Required Plugins
| Plugin | Purpose |
|--------|---------|
| Elementor Pro | Page builder |
| Advanced Custom Fields Pro | Custom fields |
| Gravity Forms | Contact/estimate forms |
| Yoast SEO | SEO and schema |
| Akismet | Spam protection |
| Wordfence | Security |
| WP Rocket | Performance |
| Redirection | URL redirects |
| Grander Core | Custom plugin for CPTs, fields |

### Optional Plugins
| Plugin | Purpose |
|--------|---------|
| Smash Balloon | Instagram feed |
| WPDiscuz | Enhanced comments |
| UpdraftPlus | Backups |

---

## 12. User Roles

### Recommended User Structure
| Role | Users | Capabilities |
|------|-------|--------------|
| Administrator | 1-2 (tech/agency) | Full access |
| Editor | Grander staff | Content management |
| Author | Blog contributors | Own posts only |

---

## 13. Pre-Launch Checklist

### Content
- [ ] All pages created with content
- [ ] All images uploaded with alt text
- [ ] Blog posts published (3-5 minimum)
- [ ] FAQ content added
- [ ] Contact information verified
- [ ] Forms tested with real submissions

### Technical
- [ ] Permalinks configured
- [ ] Redirects in place
- [ ] SSL certificate active
- [ ] 404 page working
- [ ] Search functionality working
- [ ] Comments configured
- [ ] Schema markup validated
- [ ] Robots.txt correct
- [ ] XML sitemap submitted

### Performance
- [ ] Page speed optimized (< 3s load time)
- [ ] Mobile-friendly test passed
- [ ] Core Web Vitals acceptable
- [ ] Caching enabled
- [ ] Images optimized

### SEO
- [ ] Meta titles set for all pages
- [ ] Meta descriptions set for all pages
- [ ] Canonical URLs correct
- [ ] Schema markup validated
- [ ] Google Search Console connected
- [ ] Google Analytics connected

---

End of WordPress configuration checklist.
