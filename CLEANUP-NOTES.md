# Grander Construction Cleanup Notes
**Date:** 2025-12-10
**Purpose:** Track items that need manual action on the staging server

---

## Local Project Status

The local project copy has been verified clean. All Grander-specific code is properly isolated in the `grander-core` plugin.

### Verification Results

| Area | Status | Notes |
|------|--------|-------|
| `staging/wp-content/themes/` | CLEAN | No Grander code found |
| `staging/wp-content/mu-plugins/` | CLEAN | Only Hostinger auto-updates present |
| `staging/wp-content/plugins/` | CLEAN | Only grander-core contains Grander code |
| `.gitignore` | COMPLETE | All cache/temp paths covered |

---

## Items Already Cleaned (Previous Sessions)

These were removed per STAGING-CLEANUP-REPORT-2025-12-10.md:

| Item | Type | Status |
|------|------|--------|
| `essential-addons-for-elementor-lite/` | Duplicate plugin | REMOVED |
| `staging/wp-content/uploads/aioseo/` | Orphan folder | REMOVED |
| `staging/wp-content/uploads/betterlinks_uploads/` | Orphan folder | REMOVED |
| `staging/wp-content/uploads/rank-math/` | Orphan folder | REMOVED |
| `staging/wp-content/uploads/eb-patterns/` | Orphan folder | REMOVED |
| `staging/wp-content/upgrade-temp-backup/` | Old backup | REMOVED |
| `staging/.maintenance` | Stale file | REMOVED |
| `staging/.htaccess.bk` | Old backup | REMOVED |
| LiteSpeed cache CSS/JS files | Stale cache | REMOVED |

---

## Manual Server Actions (If Not Already Done)

If deploying this local copy to the staging server, verify these items on the live staging server:

### 1. Plugin Cleanup

| Action | Plugin | Path |
|--------|--------|------|
| Deactivate & Delete | Essential Addons Lite | `wp-content/plugins/essential-addons-for-elementor-lite/` |

**Note:** Keep only `essential-addons-elementor` (Pro version).

### 2. Cache Clear (Required After Deployment)

1. **LiteSpeed Cache**: LiteSpeed Cache > Dashboard > Purge All
2. **Elementor Cache**: Elementor > Tools > Regenerate CSS & Data
3. **Browser Cache**: Hard refresh (Cmd+Shift+R or Ctrl+Shift+R)

### 3. Security Warning

The `staging/.env` file contains exposed API keys:
- `OPENAI_API_KEY=sk-proj-...`
- `GMAPS_KEY=AIzaSy...`

**Action:** If these are production credentials, rotate them immediately.

### 4. Files to Delete on Server (If Still Present)

Check and remove if they exist:
- `staging/.maintenance`
- `staging/.htaccess.bk`
- `staging/wp-content/upgrade-temp-backup/`
- `staging/wp-content/uploads/aioseo/`
- `staging/wp-content/uploads/betterlinks_uploads/`
- `staging/wp-content/uploads/rank-math/`
- `staging/wp-content/uploads/eb-patterns/`

---

## Architecture Verification

### What grander-core IS Responsible For:
- CPT registration (project, testimonial, faq, gc_event)
- Taxonomy registration (service_category, project_tag, faq_group)
- ACF field groups (13 groups registered)
- REST API endpoints
- Atomic shortcodes (zigzag, trust bar, events strip, etc.)
- Lightweight CSS (567 lines - tokens, shortcodes, behavior states)
- Lightweight JS (243 lines - 5 behavior functions)
- Admin UI for ACF Settings page

### What Elementor IS Responsible For:
- All page layouts
- Header template
- Footer template
- Typography (Global Fonts)
- Colors (Global Colors)
- Spacing and visual design
- All section templates

### Confirmed NO Grander Code In:
- Hello Elementor theme (unmodified)
- mu-plugins folder (only Hostinger files)
- Any plugin other than grander-core

---

## REST API Seeding Notes

Before running REST seeding script:

1. Verify grander-core plugin is activated on staging
2. Verify ACF Pro is activated on staging
3. Clear all caches
4. Confirm REST API is accessible: `https://staging.grandercon.com/wp-json/`

---

*Last updated: 2025-12-10*
