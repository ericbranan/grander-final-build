# Grander Construction - Elementor Full Site Kit

A publish-ready Elementor website kit for Grander Construction, a premium custom home builder in Middle Tennessee.

## Kit Contents

### Global Settings
- `manifest.json` - Kit manifest with all template references
- `site-settings.json` - Global colors, typography, button styles, form styles, breakpoints

### Theme Builder Templates (`/templates/`)
| Template | File | Condition |
|----------|------|-----------|
| Header | `header.json` | All pages (sticky, light/dark variants) |
| Footer | `footer.json` | All pages (4-column layout) |
| Single Post | `single-post.json` | Blog posts with comments |
| Blog Archive | `archive.json` | Blog listing with 3-column grid |
| Search Results | `search-results.json` | Search query results |
| 404 Page | `404.json` | Error page with JS back button |
| Estimate Popup | `popup-estimate.json` | Lightbox form (triggered by CTAs) |

### Page Templates (`/content/`)
| Page | File | Notes |
|------|------|-------|
| Home | `page-home.json` | Full hero, services grid, trust bar, CTA |
| About Our Company | `page-about-our-company.json` | Story, values, mission |
| Our Team | `page-our-team.json` | Team grid template |
| Build Process | `page-build-process.json` | 5-step timeline |
| Performance Building | `page-performance-building.json` | Standards & benefits |
| Custom Homes | `page-custom-homes.json` | Service page |
| Outdoor Spaces | `page-outdoor-spaces.json` | Service page |
| Pool Houses & ADUs | `page-pool-houses-garages-adus.json` | Service page |
| Sunrooms & Additions | `page-sunrooms-additions.json` | Service page |
| Gallery | `page-gallery.json` | Filterable portfolio |
| Blog | `page-blog.json` | Archive wrapper |
| Contact | `page-contact.json` | Form + map + FAQ |
| Request an Estimate | `page-request-estimate.json` | **SEO landing page** |

## Import Instructions

### Method 1: Full Kit Import (Recommended)

1. Go to **WordPress Admin → Elementor → Tools → Import/Export**
2. Click **Import Kit**
3. Upload the entire `elementor-kit` folder as a ZIP
4. Select components to import:
   - ✅ Site Settings
   - ✅ Templates
   - ✅ Content
5. Click **Import**

### Method 2: Manual Template Import

1. Go to **Templates → Saved Templates → Import Templates**
2. Import each JSON file individually
3. Apply display conditions in Theme Builder
4. Set global styles in **Site Settings → Global Colors/Fonts**

## Required Plugins

- **Elementor Pro** (v3.18+) - Required for Theme Builder
- **Hello Elementor** theme (recommended) or compatible theme
- **Gravity Forms** or **Elementor Forms** - For estimate/contact forms
- **ACF Pro** (optional) - For dynamic content fields

## Post-Import Setup

### 1. Navigation Menus

Create the following menus in **Appearance → Menus**:

**Main Menu:**
```
Home
About ▾
  - About Our Company
  - Our Team
  - Build Process
  - Performance Building
Services ▾ (URL: #, no landing page)
  - Custom Homes
  - Outdoor Spaces
  - Pool Houses, Garages & ADUs
  - Sunrooms & Additions
Our Approach ▾ (URL: #, no landing page)
  - Build Process
  - Performance Building
Gallery
Blog
Contact
Request an Estimate (highlight as button)
```

**Footer Menus:**
- `footer-services` - Service page links
- `footer-company` - About pages
- `footer-legal` - Privacy, Terms

### 2. Popup Trigger Setup

The estimate popup triggers on elements with:
- Class: `.gc-estimate-trigger`
- Data attribute: `data-gc-estimate-trigger="true"`

All CTA buttons include fallback URLs to `/request-an-estimate/` for accessibility.

### 3. 404 Back Button JavaScript

The 404 template includes this critical JS for the back button:

```javascript
document.addEventListener('DOMContentLoaded', function() {
  var backButton = document.getElementById('gc-back-button');
  if (backButton) {
    backButton.addEventListener('click', function(e) {
      e.preventDefault();
      if (window.history.length > 1 && document.referrer !== '') {
        window.history.back();
      } else {
        window.location.href = '/';
      }
    });
  }
});
```

Add via **Elementor → Custom Code** or theme.

### 4. Comments Configuration

Blog comments are enabled only on single posts. Configure in **Settings → Discussion**:
- ✅ Enable comments on new posts
- ✅ Comment author must fill out name and email
- ✅ Comment must be manually approved
- ✅ Enable threaded comments (3 levels)

### 5. Redirects

Set up these redirects (via plugin or .htaccess):
```
/services/ → /custom-homes/
/our-approach/ → /build-process/
```

## Design Tokens

### Colors
| Name | Hex | Usage |
|------|-----|-------|
| GC Gold | `#B08D66` | Primary accent, buttons, links |
| GC Gold Light | `#C9A878` | Hover states, secondary text on dark |
| GC Gold Dark | `#8B6F4E` | Hover states |
| GC Deep Brown | `#4C2A19` | Primary text, dark backgrounds |
| GC Medium Brown | `#6B4532` | Secondary text |
| GC Warm White | `#FDFBF8` | Main background, text on dark |
| GC Cream | `#F5F0E8` | Alternate section background |
| GC Charcoal | `#2C2C2C` | Hero overlays |

### Typography
| Style | Font | Weight | Size |
|-------|------|--------|------|
| Headings | Libre Baskerville | 400 | 24-64px |
| Body | Corbel | 400 | 16-18px |
| Eyebrow | Corbel | 600 | 13px (uppercase) |
| Button | Corbel | 600 | 14-15px (uppercase) |

### Breakpoints
| Device | Width |
|--------|-------|
| Desktop | 1025px+ |
| Tablet | 768-1024px |
| Mobile | ≤767px |

## Non-Negotiable Requirements

1. **Services & Our Approach** - Navigation dropdowns only, URL set to `#`
2. **Request an Estimate** - Must exist as real page for SEO (with lightbox fallback)
3. **404 Back Button** - Must include JavaScript history fallback
4. **Blog Comments** - Only on single posts with moderation enabled
5. **All CTAs** - Include working fallback URLs for accessibility

## File Structure

```
elementor-kit/
├── manifest.json
├── site-settings.json
├── README.md
├── templates/
│   ├── header.json
│   ├── footer.json
│   ├── single-post.json
│   ├── archive.json
│   ├── search-results.json
│   ├── 404.json
│   └── popup-estimate.json
└── content/
    ├── page-home.json
    ├── page-about-our-company.json
    ├── page-our-team.json
    ├── page-build-process.json
    ├── page-performance-building.json
    ├── page-custom-homes.json
    ├── page-outdoor-spaces.json
    ├── page-pool-houses-garages-adus.json
    ├── page-sunrooms-additions.json
    ├── page-gallery.json
    ├── page-blog.json
    ├── page-contact.json
    └── page-request-estimate.json
```

## Support Files

The `/site-kit/` folder contains additional documentation:
- `theme/tokens.json` - Design token reference
- `theme/global-styles.css` - CSS implementation
- `pages/*.md` - Detailed page specifications
- `templates/*.md` - Template build guides
- `wordpress/config-checklist.md` - WP settings checklist
- `qa/visual-qa-checklist.md` - Testing checklist

---

**Version:** 1.0.0
**Elementor Version:** 3.18+
**Last Updated:** 2025
