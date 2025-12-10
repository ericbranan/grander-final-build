# Page Content Replacement Guide

**Purpose:** Step-by-step instructions for replacing static content on each page with ACF-driven dynamic content in Elementor.

---

## How to Use This Guide

For each page:
1. Open the page in Elementor
2. Identify each section by its class hook
3. Replace static text/images with ACF Dynamic Tags
4. Apply the specified class hooks to sections
5. Save and verify on frontend

### Dynamic Tag Syntax
In Elementor, use these dynamic tag types:
- **ACF Field** → For text, textarea, select fields
- **ACF Image** → For image fields
- **ACF URL** → For URL/link fields
- **ACF Repeater** → For repeater content (use Loop Grid widget)

---

## Page 1: Home

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-hero`, `.gc-hero--home`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H1 | ACF Field | `gc_hero_headline` |
| Subline | Text Editor | ACF Field | `gc_hero_subline` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |
| CTA Button 1 | Button | Static | "Request an estimate" → triggers lightbox |
| CTA Button 2 | Button | Static | "View projects" → link to Gallery |

#### Service Area Line (Optional)
**Class hook:** `.gc-service-area-line`
- Use shortcode: `[grander_service_area_line]`
- Or bind to ACF Field: `gc_service_area_text` (from options)

#### Expert Offerings Section
**Class hook:** `.gc-services-intro`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Intro Text | Text Editor | ACF Field | `gc_home_expert_offerings_intro` |

#### Service Cards Grid
**Class hook:** `.gc-service-cards-v1`

Use **Loop Grid** widget querying `service_category` taxonomy, or manually create 4 cards:

| Card | Title | Summary | Link |
|------|-------|---------|------|
| Custom Homes | "Custom homes" | ACF description | /services/custom-homes/ |
| Outdoor Spaces | "Outdoor spaces" | ACF description | /services/outdoor-spaces/ |
| Pool Houses etc | "Pool houses, garages, and ADUs" | ACF description | /services/pool-houses/ |
| Sunrooms | "Sunrooms and additions" | ACF description | /services/sunrooms/ |

#### Testimonials Section
**Class hook:** `.gc-testimonials-v1`

Use **Loop Grid** widget querying `testimonial` CPT:
- Display 5 items
- Random order
- Show: Quote (`gc_testimonial_quote`), Name (`gc_testimonial_first_name` + `gc_testimonial_last_initial`), City

#### Performance Teaser Section
**Class hook:** `.gc-performance-teaser`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H2 | ACF Field | `gc_home_performance_teaser_headline` |
| Body | Text Editor | ACF Field | `gc_home_performance_teaser_body` |
| CTA | Button | Static | "Learn about performance building" → /performance-building/ |

#### Inline Estimate Form
**Class hook:** `.gc-estimate-inline`
- Embed Gravity Forms shortcode from `gc_estimate_form_shortcode` option

---

## Page 2: About Our Company

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-hero`, `.gc-hero--about`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H1 | ACF Field | `gc_hero_headline` |
| Subline | Text Editor | ACF Field | `gc_hero_subline` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Micah Story Section
**Class hook:** `.gc-about-story`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Story Content | Text Editor | ACF Field | `gc_about_story` |
| Micah Image | Image | ACF Image | `gc_about_story_image` |

#### Values Section
**Class hook:** `.gc-about-values`

Use repeater `gc_about_values`:
| Subfield | Purpose |
|----------|---------|
| `gc_about_values__title` | Value name |
| `gc_about_values__description` | Value description |
| `gc_about_values__icon` | Icon (optional) |

#### Difference Section
**Class hook:** `.gc-about-difference`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H2 | ACF Field | `gc_about_difference_headline` |
| Points | Loop Grid | ACF Repeater | `gc_about_difference_points` |

#### CTA Section
**Class hook:** `.gc-about-cta`
- Standard CTA block with estimate button

---

## Page 3: Build Process

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-hero`, `.gc-hero--process`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H1 | ACF Field | `gc_hero_headline` |
| Subline | Text Editor | ACF Field | `gc_hero_subline` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Process Intro
**Class hook:** `.gc-process-intro`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Intro Text | Text Editor | ACF Field | `gc_process_intro` |

#### Process Steps
**Class hook:** `.gc-process-steps-v1`

Use repeater `gc_process_steps`:
| Subfield | Purpose |
|----------|---------|
| `gc_process_steps__number` | Step number |
| `gc_process_steps__label` | Step title |
| `gc_process_steps__short_desc` | Step description |

#### Process FAQ Section
**Class hook:** `.gc-faq-accordion-v1`

Query `faq` CPT filtered by `faq_group` = "build-process":
| Element | Source |
|---------|--------|
| Question | Post title |
| Answer | ACF Field `gc_faq_answer` |

---

## Page 4: Services Landing

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-hero`, `.gc-hero--services`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H1 | ACF Field | `gc_hero_headline` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Services Intro
**Class hook:** `.gc-services-intro`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Intro Text | Text Editor | ACF Field | `gc_services_intro` |

#### Service Category Cards
**Class hook:** `.gc-service-cards-v1`

4 cards linking to individual service pages.

---

## Page 5-8: Individual Service Pages

All service pages share the same template structure.

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-hero`, `.gc-hero--service`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Service Title | Heading H1 | Post Title | (WordPress) |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Jump Links (if enabled)
**Class hook:** `.gc-jump-links`

Show if `gc_service_jump_links_enabled` is true.

#### Service Overview
**Class hook:** `.gc-service-overview`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Overview Text | Text Editor | ACF Field | `gc_service_overview` |

#### Featured Projects
**Class hook:** `.gc-service-featured`, `.gc-featured-projects-v1`

| Element | Source |
|---------|--------|
| Projects | Relationship field `gc_service_featured_projects` OR global `gc_featured_projects` |

#### Portfolio Sections
**Class hook:** `.gc-service-portfolio`, `.gc-portfolio-block-v1`

Use repeater `gc_service_portfolio_sections`:
| Subfield | Purpose |
|----------|---------|
| `gc_service_portfolio_sections__title` | Project name |
| `gc_service_portfolio_sections__location` | Location |
| `gc_service_portfolio_sections__summary` | Description |
| `gc_service_portfolio_sections__has_design_image` | Toggle |
| `gc_service_portfolio_sections__design_image` | Design render |
| `gc_service_portfolio_sections__gallery` | Photo gallery |

#### Mid-Page CTA
**Class hook:** `.gc-service-cta`, `.gc-estimate-cta-v1`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H2 | ACF Field | `gc_service_mid_cta_headline` |
| Body | Text Editor | ACF Field | `gc_service_mid_cta_body` |
| Button | Button | Static | `gc_service_estimate_cta_label` (default: "Request an estimate") |

#### Service FAQs
**Class hook:** `.gc-service-faq`, `.gc-faq-accordion-v1`

Query `faq` CPT filtered by taxonomy selections in `gc_service_faq_groups`.

---

## Page 9: Our Team

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-hero`, `.gc-hero--team`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H1 | ACF Field | `gc_hero_headline` |
| Subline | Text Editor | ACF Field | `gc_hero_subline` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Team Intro
**Class hook:** `.gc-team-intro`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Intro Text | Text Editor | ACF Field | `gc_team_intro` |

#### Owner Highlight
**Class hook:** `.gc-team-owner`

First team member with `gc_team_members__highlight_owner` = true.

#### Team Grid
**Class hook:** `.gc-team-grid-section`, `.gc-team-grid`

Use repeater `gc_team_members`:
| Subfield | Purpose |
|----------|---------|
| `gc_team_members__name` | Name |
| `gc_team_members__title` | Job title |
| `gc_team_members__bio` | Bio (60-90 words) |
| `gc_team_members__photo` | Headshot |
| `gc_team_members__highlight_owner` | Owner flag |

#### Mission Section
**Class hook:** `.gc-team-mission`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Mission Text | Text Editor | ACF Field | `gc_team_mission` |
| Promise Text | Text Editor | ACF Field | `gc_team_promise` |

#### Testimonials
**Class hook:** `.gc-team-testimonials`, `.gc-testimonials-v1`

Same as home page testimonials section.

---

## Page 10: Gallery

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-hero`, `.gc-hero--gallery`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H1 | ACF Field | `gc_hero_headline` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Gallery Intro
**Class hook:** `.gc-gallery-intro`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Intro Text | Text Editor | ACF Field | `gc_gallery_intro` |

#### Filter Bar (if enabled)
**Class hook:** `.gc-gallery-filters`

Show if `gc_gallery_filter_enabled` is true.
- Category buttons from `service_category` taxonomy
- Tag buttons from `project_tag` taxonomy

#### Project Grid
**Class hook:** `.gc-gallery-grid`, `.gc-gallery-grid__items`

Use **Loop Grid** widget querying `project` CPT:
| Element | Source |
|---------|--------|
| Card | `.gc-project-card` template |
| Image | Featured image |
| Title | Post title |
| Category | `service_category` taxonomy |
| Location | ACF `gc_project_location_city` |
| Gallery data | ACF `gc_project_gallery` (JSON in data attribute) |

#### CTA Section
**Class hook:** `.gc-gallery-cta`

Standard estimate CTA.

---

## Page 11: Blog Archive (The Blueprint)

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-hero`, `.gc-hero--blog`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Title | Heading H1 | Static | "The Blueprint" |
| Intro | Text Editor | ACF Field | `gc_blog_intro` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Posts Grid
**Class hook:** `.gc-blog-grid`

Use **Posts** widget or **Loop Grid** querying standard `post` type:
| Element | Source |
|---------|--------|
| Card | `.gc-post-card` template |
| Image | Featured image |
| Title | Post title |
| Excerpt | Post excerpt |
| Date | Post date |
| Category | Post categories |

---

## Page 12: Contact

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-contact-hero`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H1 | ACF Field | `gc_hero_headline` |
| Subline | Text Editor | ACF Field | `gc_hero_subline` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Contact Info + Form Section
**Class hook:** `.gc-contact-intro`

Two-column layout:
- Left: Contact info, phone, address
- Right: Contact form

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Intro Text | Text Editor | ACF Field | `gc_contact_intro` |
| Phone | Dynamic | ACF Field | `gc_phone_number` (from options) |

#### Map Section
**Class hook:** `.gc-contact-map`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Map Embed | HTML | ACF Field | `gc_contact_map_embed` |

#### FAQ Section
**Class hook:** `.gc-contact-faq`, `.gc-faq-accordion-v1`

Query `faq` CPT filtered by `faq_group` = "contact".

---

## Page 13: Request an Estimate

### Section Structure & ACF Bindings

#### Hero Section
**Class hook:** `.gc-estimate-hero`

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Headline | Heading H1 | ACF Field | `gc_hero_headline` |
| Subline | Text Editor | ACF Field | `gc_hero_subline` |
| Background | Section BG | ACF Image | `gc_hero_background_image` |

#### Main Form Section
**Class hook:** `.gc-estimate-main`

Two-column layout:
- Left: Reassurance copy + mini trust bar
- Right: Gravity Forms embed

| Element | Widget | Dynamic Tag | ACF Field |
|---------|--------|-------------|-----------|
| Reassurance | Text Editor | ACF Field | `gc_estimate_reassurance_copy` |
| Form | Shortcode | ACF Field | `gc_estimate_form_shortcode` |

#### Trust Bar
**Class hook:** `.gc-trust-bar-v1`

Use shortcode `[grander_trust_bar]` or bind to `gc_trust_items` repeater from options.

#### FAQ Section (optional)
**Class hook:** `.gc-estimate-faq`

Query `faq` CPT filtered by `faq_group` = "estimate".

---

## Global Lightbox: Estimate Modal

**Class hook:** `.gc-estimate-lightbox-overlay`, `.gc-estimate-lightbox`

Add this HTML structure to footer template or as a global widget:

```html
<div class="gc-estimate-lightbox-overlay">
    <div class="gc-estimate-lightbox">
        <button class="gc-estimate-lightbox__close" aria-label="Close">×</button>
        <div class="gc-estimate-lightbox__content">
            <div class="gc-estimate-lightbox__left">
                <h2>Request an estimate</h2>
                <!-- ACF: gc_estimate_reassurance_copy -->
                <!-- Mini trust bar -->
            </div>
            <div class="gc-estimate-lightbox__right">
                <!-- Gravity Forms shortcode -->
            </div>
        </div>
    </div>
</div>
```

Trigger buttons use:
- Class: `.gc-estimate-trigger`
- Or data attribute: `data-gc-estimate-trigger`

---

## Verification Checklist

After updating each page, verify:

- [ ] All ACF fields are bound correctly
- [ ] Dynamic content renders on frontend
- [ ] Class hooks are applied to sections
- [ ] Responsive behavior works
- [ ] No static text where dynamic should be
- [ ] Links work correctly
- [ ] Images load properly

---

End of guide.
