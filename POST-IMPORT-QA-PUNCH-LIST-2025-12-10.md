# Post-Import QA Punch List

**Date:** 2025-12-10
**Site:** https://staging.grandercon.com
**Status:** Ready for design polish and content population

---

## Executive Summary

All 14 target pages are live with Elementor templates applied. The grander-core plugin is active with CPTs, taxonomies, and ACF options working correctly. This punch list prioritizes the remaining work for production readiness.

---

## QA Results Summary

| Check | Result |
|-------|--------|
| Pages exist (14/14) | PASS |
| All pages published | PASS |
| All pages have Elementor data | PASS |
| Front-end renders (HTTP 200) | PASS (14/14) |
| Elementor widgets present | PASS (14/14) |
| grander-core CPTs registered | PASS (project, testimonial, faq, gc_event) |
| Custom taxonomies registered | PASS (service_category, project_tag, faq_group) |
| ACF options endpoint | PASS (24 fields available) |
| Page-level ACF fields | PARTIAL (fields registered, most need population) |

---

## Priority 1: Critical Template Fixes

### 1.1 Services Page (ID 5334) - Requires Full Rebuild

**Current State:**
- Uses "Responsive Services Template" (13,967 chars)
- Only 3 sections, 6 widgets total (2 headings, 2 text-editors, 1 gallery, 1 button)
- ACF fields: 5 registered, only 1 populated

**Required per CLAUDE.md:**
- Hero with service title and background image
- Jump links module (if gc_service_jump_links_enabled)
- Service overview text (from gc_service_overview)
- Featured projects row
- Service cards linking to 4 service detail pages
- Mid-page CTA block
- Category-specific FAQs

**Action:** Rebuild Services page in Elementor to match Site Plan specifications. This is NOT a placeholder - it needs the full services landing layout.

---

### 1.2 Performance Building Page (ID 4593) - Requires Content Customization

**Current State:**
- Uses About page template copy (158,414 chars)
- Structure: 5 sections, headings, text-editors, icon-boxes, image, button
- ACF fields: 5 registered, 2 populated (gc_hero_headline, gc_hero_subline)

**Required per CLAUDE.md:**
- Hero: "High performance building, tailored for the Upstate"
- "Why build smart" section
- Build science practices with bullets (ZIP System, Windsor windows, etc.)
- Performance hotspots/diagram section
- CTA: Request an estimate / View performance-focused projects

**Action:** Edit in Elementor to replace About page content with Performance Building-specific content from Site Plan.

---

## Priority 2: ACF Content Population

### 2.1 Pages Missing Key ACF Content

| Page | Fields Registered | Fields Populated | Missing |
|------|-------------------|------------------|---------|
| home | 9 | 7 | gc_home_testimonial_slider_variant, gc_trust_bar_enabled_on_page |
| about-our-company | 5 | 3 | gc_hero_background_image, gc_hero_nav_variant |
| build-process | 5 | 2 | gc_process_intro, gc_hero_background_image, gc_hero_nav_variant |
| performance-building | 5 | 2 | gc_hero_background_image, gc_hero_nav_variant |
| services | 5 | 1 | gc_hero_headline, gc_hero_subline, gc_hero_background_image, gc_hero_nav_variant |
| our-team | 5 | 2 | gc_team_intro, gc_hero_background_image, gc_hero_nav_variant |
| gallery | 5 | 2 | gc_gallery_intro, gc_hero_background_image, gc_hero_nav_variant |
| contact | 5 | 2 | gc_contact_intro, gc_hero_background_image, gc_hero_nav_variant |
| request-an-estimate | 5 | 2 | gc_estimate_reassurance_copy, gc_hero_background_image, gc_hero_nav_variant |
| custom-homes | 5 | 1 | gc_service_overview, gc_hero_headline, gc_hero_subline, etc. |

**Action:** Populate ACF fields via WordPress admin or REST seeding script.

---

### 2.2 ACF Options Status

| Field | Status | Value |
|-------|--------|-------|
| gc_announcement_enabled | Set | false |
| gc_announcement_message | Empty | - |
| gc_phone_number | Set | (864) 412-9999 |
| gc_header_estimate_label | Set | Request an estimate |
| gc_header_estimate_mode | Set | lightbox |
| gc_service_area_enabled | Set | true |
| gc_service_area_text | Set | Populated |
| gc_featured_projects_enabled | Set | true |
| gc_featured_projects | Empty | Needs project IDs |
| gc_trust_items | Empty | false (needs repeater data) |
| gc_events_enabled | Set | false (correct for launch) |
| gc_estimate_form_shortcode | Empty | Needs Gravity Forms shortcode |
| gc_footer_logo_white | Set | 1132 |
| gc_footer_hba_logo | Set | 4166 |
| gc_footer_bbb_logo | Set | 4168 |
| gc_social_facebook_url | Set | Placeholder URL |
| gc_social_instagram_url | Set | Placeholder URL |

**Priority Actions:**
1. Add Gravity Forms shortcode to `gc_estimate_form_shortcode`
2. Populate `gc_trust_items` repeater with trust bar logos
3. Populate `gc_featured_projects` with project IDs
4. Update social URLs to actual Facebook/Instagram profiles

---

## Priority 3: CPT Content Seeding

### 3.1 Current CPT Status

| CPT | Count | Status |
|-----|-------|--------|
| project | 3 | Needs more per Site Plan (8 projects minimum) |
| testimonial | 4 | OK for launch (Site Plan specifies 10-15) |
| faq | 2 | Needs more per Site Plan (15-20 FAQs) |
| gc_event | 0 | OK (disabled for launch per CLAUDE.md) |

### 3.2 Taxonomy Status

| Taxonomy | Count | Status |
|----------|-------|--------|
| service_category | 4 | OK (custom-homes, outdoor-spaces, pool-houses-garages-adus, sunrooms-additions) |
| project_tag | 0 | Needs tags |
| faq_group | 1 | Needs groups: build-process, services-general, contact, estimate |

**Action:** Run REST seeding script to populate remaining projects, testimonials, FAQs, and taxonomy terms.

---

## Priority 4: Service Detail Pages

### 4.1 Four Service Pages Need Content

| Page | ID | ACF Fields Populated |
|------|----|---------------------|
| custom-homes | 5048 | 1/5 |
| outdoor-spaces-decks-patios | 5049 | Not checked |
| garages-pool-houses-adus | 5050 | Not checked |
| sunrooms-and-additions | 5058 | Not checked |

**Required per CLAUDE.md:**
- gc_service_overview (120-180 words)
- gc_service_jump_links_enabled
- gc_service_featured_projects (relationship)
- gc_service_portfolio_sections (repeater)
- gc_service_mid_cta_headline
- gc_service_mid_cta_body
- gc_service_faq_groups (taxonomy)

**Action:** Populate service-specific ACF content for all 4 service detail pages.

---

## Priority 5: Template Refinement

### 5.1 Template Block Verification

Verify these ACF-integrated blocks are wired correctly:

| Block | Used On | Binding |
|-------|---------|---------|
| Testimonial slider | Home, Team, Services | testimonial CPT query |
| FAQ accordion | Build process, Services, Contact | faq CPT by faq_group |
| Trust bar | Home, Services, Contact | gc_trust_items options |
| Featured projects | Home, Services | gc_featured_projects relationship |
| Events strip | Home, Contact | gc_events options (disabled) |
| Service cards | Home, Services | service_category taxonomy |
| Portfolio block | Service pages | gc_service_portfolio_sections |
| Estimate CTA | Services, Build process | gc_service_mid_cta fields |

**Action:** Open each page in Elementor and verify Dynamic Tags are bound to correct ACF fields.

---

## Priority 6: Final Polish

### 6.1 Visual QA Checklist

- [ ] Desktop breakpoint (1200px+)
- [ ] Tablet breakpoint (768px-1199px)
- [ ] Mobile breakpoint (<768px)
- [ ] Header sticky behavior
- [ ] Mobile hamburger menu hierarchy
- [ ] Mobile floating phone icon
- [ ] Footer zigzag divider
- [ ] Trust bar logos displaying
- [ ] Social icons linking correctly

### 6.2 Functional QA Checklist

- [ ] Estimate lightbox opens
- [ ] Gravity Form submits
- [ ] Jump links scroll correctly
- [ ] FAQ accordions expand/collapse
- [ ] Gallery filters work
- [ ] Blog archive pagination
- [ ] 404 page back button
- [ ] Search results styled

### 6.3 Cache Clear Procedure

After all changes:
1. Clear LiteSpeed Cache (if enabled)
2. Clear Elementor Cache (Elementor > Tools > Regenerate CSS)
3. Clear browser cache
4. Test in incognito mode

---

## Work Order Summary

| Priority | Item | Owner | Effort |
|----------|------|-------|--------|
| P1 | Rebuild Services page layout | Angie | High |
| P1 | Customize Performance Building content | Angie | Medium |
| P2 | Populate page ACF fields | Claude/Angie | Medium |
| P2 | Populate ACF options (trust bar, form shortcode) | Angie | Low |
| P3 | Seed remaining projects (5 more) | Claude | Medium |
| P3 | Seed remaining FAQs (13 more) | Claude | Medium |
| P3 | Create faq_group terms | Claude | Low |
| P4 | Populate 4 service detail page ACF | Claude | Medium |
| P5 | Verify all template block bindings | Angie | Medium |
| P6 | Visual QA all breakpoints | Angie | Medium |
| P6 | Functional QA forms/interactions | Angie | Medium |

---

## Appendix: Page Reference Table

| Slug | ID | Elementor Size | ACF Fields | Status |
|------|----|----------------|------------|--------|
| home | 5057 | 299,074 | 9 (7 pop) | Ready for content |
| about-our-company | 5055 | 158,414 | 5 (3 pop) | Ready for content |
| build-process | 5054 | 89,784 | 5 (2 pop) | Ready for content |
| performance-building | 4593 | 158,414 | 5 (2 pop) | Needs customization |
| services | 5334 | 13,967 | 5 (1 pop) | **Needs rebuild** |
| our-team | 5056 | 143,511 | 5 (2 pop) | Ready for content |
| gallery | 5051 | 231,207 | 5 (2 pop) | Ready for content |
| contact | 5044 | 213,167 | 5 (2 pop) | Ready for content |
| request-an-estimate | 5047 | 145,206 | 5 (2 pop) | Ready for content |
| custom-homes | 5048 | 106,118 | 5 (1 pop) | Ready for content |
| outdoor-spaces-decks-patios | 5049 | 104,585 | 5 (?) | Ready for content |
| garages-pool-houses-adus | 5050 | 136,440 | 5 (?) | Ready for content |
| sunrooms-and-additions | 5058 | 128,061 | 5 (?) | Ready for content |
| blog | 5041 | 39,571 | 5 (2 pop) | Ready for content |

---

*Report generated by Claude Code*
*Date: 2025-12-10*
