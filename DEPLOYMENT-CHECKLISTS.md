# Grander Construction Deployment Checklists

These checklists ensure consistent, safe deployments and prevent cache-related visual issues.

---

## After Updating grander-core

Use this checklist whenever you update CSS, JS, PHP, or ACF fields in the grander-core plugin.

- [ ] Update `GRANDER_CORE_VERSION` constant in `grander-core.php`
- [ ] Add entry to `grander-core/CHANGELOG.md`
- [ ] Deploy files to staging/production
- [ ] Clear LiteSpeed Cache: **LiteSpeed Cache > Dashboard > Purge All**
- [ ] Clear Elementor Cache: **Elementor > Tools > Regenerate CSS & Data**
- [ ] Hard refresh browser (Cmd+Shift+R on Mac, Ctrl+Shift+R on Windows)
- [ ] Test affected pages visually
- [ ] Verify no 404 errors in browser dev tools Network tab

---

## After Updating Elementor Templates

Use this checklist when editing any Elementor template (header, footer, pages, sections).

- [ ] Save template in Elementor editor
- [ ] Click **Update** button (not just Preview)
- [ ] Clear Elementor Cache: **Elementor > Tools > Regenerate CSS & Data**
- [ ] Clear LiteSpeed Cache: **LiteSpeed Cache > Dashboard > Purge All**
- [ ] Hard refresh browser
- [ ] Test page on desktop (1920px, 1440px, 1024px)
- [ ] Test page on tablet (768px)
- [ ] Test page on mobile (375px)
- [ ] Verify Elementor fonts use Global Typography (not hardcoded values)

---

## Immediately After Any Deployment

Run through this checklist right after uploading files to staging or production.

- [ ] Verify site loads without 500 errors
- [ ] Check home page renders correctly
- [ ] Check header sticky behavior works
- [ ] Check footer displays correctly
- [ ] Test mobile floating call icon appears (on mobile)
- [ ] Test "Request an Estimate" lightbox opens
- [ ] Open browser dev tools > Network tab > check for 404s on CSS/JS
- [ ] Clear LiteSpeed Cache if anything looks wrong
- [ ] Test at least one service page
- [ ] Test Contact page FAQ accordion

---

## Monthly Maintenance

Scheduled checks to prevent drift and catch issues early.

- [ ] Visual review of grander-core.css for any new layout properties
- [ ] Search for Grander code outside plugin: `grep -r -i "grander\|gc-\|gc_" staging/wp-content/themes/ staging/wp-content/mu-plugins/`
- [ ] Review Elementor templates for hardcoded typography (should use Global)
- [ ] Verify backup copies of grander-core exist
- [ ] Check for WordPress, Elementor, and ACF Pro updates
- [ ] Test forms still submit correctly
- [ ] Review Google Search Console for any 404 or crawl issues

---

## How to Clear Cache

### LiteSpeed Cache

1. Go to WordPress Admin
2. Click **LiteSpeed Cache** in admin bar
3. Click **Purge All**

Or navigate to: **LiteSpeed Cache > Dashboard > Purge All**

### Elementor Cache

1. Go to WordPress Admin
2. Navigate to **Elementor > Tools**
3. Click **Regenerate CSS & Data** button
4. Wait for confirmation message

Or use admin bar: **Grander Tools > Clear Elementor Cache**

### Browser Cache

- **Mac**: Cmd + Shift + R
- **Windows**: Ctrl + Shift + R
- Or open DevTools (F12) > right-click Refresh button > "Empty Cache and Hard Reload"

### Object Cache (if enabled)

If using a persistent object cache:
1. Go to Settings or your cache plugin
2. Flush object cache

---

## Fix Elementor Hardcoded Fonts

Some Elementor widgets have hardcoded font-family values instead of using Global Typography. This causes inconsistency when Global Fonts are updated.

### Affected Templates

| Template ID | File | Hardcoded Fonts |
|-------------|------|-----------------|
| post-5057 | Home page | 7x "corbel", 1x "berthold-baskerville-pro" |
| post-5044 | Header template | 2x font overrides |
| post-5043 | Footer template | 1x font override |

### How to Fix (in Elementor UI)

1. Open the affected template in Elementor
2. Click on each text widget
3. Go to **Style > Typography**
4. If a specific font is set, change it to **Default** (inherits from Global)
5. Click **Update** to save
6. Clear Elementor cache after fixing all widgets

### Widgets to Check

Look for widgets where font-family is explicitly set:
- Heading widgets
- Text Editor widgets
- Button text
- Testimonial text/name
- Any widget with custom typography

---

## Emergency Rollback

If a deployment causes critical issues:

1. **Restore grander-core backup**
   - Replace `staging/wp-content/plugins/grander-core/` with backup version

2. **Clear all caches immediately**
   - LiteSpeed > Purge All
   - Elementor > Regenerate CSS

3. **Check site loads**
   - Home page
   - Header/footer
   - One service page

4. **Document what went wrong**
   - Note the error
   - Add to CHANGELOG.md as a known issue

---

## Cache Clearing Order (Important)

When clearing caches, follow this order:

1. **First**: Clear LiteSpeed Cache (server-side combined CSS/JS)
2. **Second**: Clear Elementor Cache (template-generated CSS)
3. **Third**: Clear Browser Cache (client-side)

This ensures no layer is serving stale content from an earlier layer.

---

*Last updated: 2025-12-10*
*Related: TECHNICAL-AUDIT-REPORT-2025-12-10.md*
