# ACF integrated template library guide

This guide tells you exactly how to build and wire ACF integrated templates inside Elementor without touching PHP. Use it alongside the Grander Core plugin to upgrade the existing staging wireframe.

---

## Overview

### Architecture reminder

| Layer | Responsibility |
|-------|----------------|
| **Elementor** | All markup, layout, and visual design |
| **Grander Core plugin** | Data models, ACF schemas, REST API, small enhancements |

You are upgrading the existing staging wireframe, not rebuilding. The goal is to replace static content sections with ACF driven versions that can be populated via the admin or REST API.

### What this guide covers

- How to build each ACF integrated template section in Elementor
- Which ACF fields to bind using dynamic tags
- Which CSS classes to apply for plugin JS and CSS hooks
- Design and behavior notes for consistency

---

## Template list

Create each of these as a reusable Elementor section template:

| Template name | Used on |
|---------------|---------|
| ACF integrated testimonial slider 1 | Home, Team, Services |
| ACF integrated FAQ accordion 1 | Build process, Services, Contact, Team |
| ACF integrated trust bar 1 | Home, Services landing, Contact |
| ACF integrated featured projects 1 | Home, Services |
| ACF integrated estimate CTA block 1 | Services, Build process |
| ACF integrated events strip 1 | Home, Contact (disabled at launch) |
| ACF integrated service cards 1 | Home |
| ACF integrated portfolio block 1 | Service pages |
| ACF integrated team grid 1 | Team |
| ACF integrated process steps 1 | Build process |

---

## 1. ACF integrated testimonial slider 1

### Where it will be used
- Home page (testimonials section)
- Team page (social proof section)
- Service pages (optional)

### ACF field group and fields to bind

**Source:** Testimonial CPT (`testimonial`)

| Widget | Dynamic tag | Field |
|--------|-------------|-------|
| Text/Heading | ACF Field | `gc_testimonial_quote` |
| Text | ACF Field | `gc_testimonial_first_name` |
| Text | ACF Field | `gc_testimonial_last_initial` |
| Text | ACF Field | `gc_testimonial_city` (optional) |

### Build instructions

1. Create a new Elementor section
2. Add a Loop Grid or Posts widget
3. Set query to:
   - Post type: `testimonial`
   - Posts per page: 5
   - Order by: Random
4. Design the loop item template:
   - Large quote text (Baskerville, italic if desired)
   - Author line below: First name + last initial (e.g., "Sallie B.")
   - Optional city in lighter text
5. Consider carousel layout for horizontal scrolling

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-testimonials-v1` |
| Individual card | `gc-testimonial-card` |
| Quote text | `gc-testimonial-quote` |
| Author container | `gc-testimonial-author` |
| City text | `gc-testimonial-city` |

### JS behavior
None required from the plugin. Use Elementor's built in carousel or slider if you want navigation arrows and autoplay.

### Design notes
- Display 3 to 5 testimonials randomly on each page load
- Cards should feel premium: generous padding, clean typography
- Quote marks optional but add visual interest if used
- Keep author info minimal: first name, last initial, optional city

---

## 2. ACF integrated FAQ accordion 1

### Where it will be used
- Build process page
- Service pages (Custom homes, Outdoor spaces, etc.)
- Contact page
- Team page (optional)

### ACF field group and fields to bind

**Source:** FAQ CPT (`faq`) filtered by `faq_group` taxonomy

| Widget | Dynamic tag | Field |
|--------|-------------|-------|
| Heading/Text | Post Title | (The question) |
| Text | ACF Field | `gc_faq_answer` |

**Filtering:** Use the page level taxonomy field to filter which FAQs appear:
- Service pages: `gc_service_faq_groups`
- Build process: `gc_process_faq_groups`
- Contact: `gc_contact_faq_groups`

### Build instructions

1. Create a new Elementor section
2. Add a Loop Grid or Posts widget
3. Set query to:
   - Post type: `faq`
   - Taxonomy: `faq_group` > use Related or Include filter based on page field
4. Design the loop item with accordion structure:
   - Question as clickable header
   - Answer as collapsible content below
5. If using Elementor Pro Accordion widget directly, bind title and content to ACF

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-faq-accordion-v1` |
| Individual FAQ item | `gc-faq-item` |
| Question (clickable) | `gc-faq-question` |
| Answer (collapsible) | `gc-faq-answer` |

### JS behavior
**The plugin handles accordion expand/collapse automatically** when these classes are applied:
- Clicking `.gc-faq-question` toggles `.gc-faq-item--open` on the parent `.gc-faq-item`
- When open, `.gc-faq-answer` becomes visible
- Only one item open at a time (accordion behavior)

If you prefer Elementor's native accordion widget, you can skip the plugin JS entirely.

### Design notes
- Question text should be bold or medium weight
- Plus/minus or chevron icon on right side (plugin CSS adds basic +/x)
- Answer text in regular weight with comfortable line height
- Subtle border or divider between items

---

## 3. ACF integrated trust bar 1

### Where it will be used
- Home page (below hero)
- Services landing page
- Contact page
- Optionally per page via `gc_trust_bar_enabled_on_page` toggle

### ACF field group and fields to bind

**Source:** Global options > `gc_trust_items` repeater

| Subfield | Type | Notes |
|----------|------|-------|
| `logo` | Image | Badge or icon |
| `label` | Text | Short label like "Licensed & Insured" |
| `url` | URL | Optional link |

### Build instructions

**Option A: Use shortcode (easiest)**
1. Add a Shortcode widget
2. Enter: `[grander_trust_bar]`
3. Style the container width, padding, and background in Elementor

**Option B: Build manually**
1. Create a section with Flex container (horizontal, centered)
2. Use ACF Repeater widget or loop through `gc_trust_items`
3. For each item:
   - Image widget bound to `logo`
   - Text widget bound to `label`
   - Wrap in link if `url` is set

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-trust-bar` |
| Inner container | `gc-trust-bar__inner` |
| Individual item | `gc-trust-bar__item` |
| Logo image | `gc-trust-bar__logo` |
| Label text | `gc-trust-bar__label` |
| Link wrapper | `gc-trust-bar__link` |

### JS behavior
None required.

### Design notes
- Horizontal layout, centered, wrapping on mobile
- Items evenly spaced with gap
- Logos should be consistent height (40px max recommended)
- Subtle, not attention grabbing; supports hero, does not compete with it

---

## 4. ACF integrated featured projects 1

### Where it will be used
- Home page (featured work section)
- Service pages (related projects)

### ACF field group and fields to bind

**Source:** Relationship field to Project CPT

| Context | Field |
|---------|-------|
| Global (Home) | Options > `gc_featured_projects` |
| Per page (Services) | Page field > `gc_service_featured_projects` |

**Project fields to display:**

| Widget | Field |
|--------|-------|
| Image | Featured image or `gc_project_gallery` first image |
| Heading | Post title |
| Text | `gc_project_location_city`, `gc_project_location_state` |
| Text | `gc_project_short_summary` |

### Build instructions

1. Create a new Elementor section
2. Add a Loop Grid or Posts widget
3. Configure query:
   - Use ACF Relationship as source
   - Bind to `gc_featured_projects` (options) or `gc_service_featured_projects` (page)
4. Design project card:
   - Large image (16:9 or 4:3 ratio)
   - Title overlay or below image
   - Location line (City, State)
   - Brief summary (truncate if needed)
   - Optional "View project" link

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-featured-projects-v1` |
| Individual card | `gc-project-card` |
| Image container | `gc-project-image` |
| Title | `gc-project-title` |
| Location | `gc-project-location` |
| Summary | `gc-project-summary` |

### JS behavior
None required. Use Elementor carousel if you want slider behavior.

### Design notes
- 3 to 6 projects typical
- Grid layout on desktop (3 columns), 2 on tablet, 1 on mobile
- Cards should feel clickable with hover state
- Images are the hero; text is secondary

---

## 5. ACF integrated estimate CTA block 1

### Where it will be used
- Service pages (mid page conversion point)
- Build process page
- Anchored to `#estimate` for jump links

### ACF field group and fields to bind

**Source:** Service page fields

| Widget | Field |
|--------|-------|
| Heading | `gc_service_mid_cta_headline` |
| Text | `gc_service_mid_cta_body` |
| Button text | `gc_service_estimate_cta_label` |

### Build instructions

1. Create a new Elementor section
2. Set section ID to `estimate` (for jump link anchor)
3. Add heading widget:
   - Bind to `gc_service_mid_cta_headline` via dynamic tag
   - Default: "Ready to start your project?"
4. Add text widget:
   - Bind to `gc_service_mid_cta_body`
5. Add button widget:
   - Text: Bind to `gc_service_estimate_cta_label` or static "Request an estimate"
   - Link action: Open Elementor popup (the estimate lightbox)

### Estimate lightbox setup

Create a separate Elementor popup template:
1. Two columns on desktop, stacked on mobile
2. Left column:
   - Heading: "Request an estimate"
   - Text: Bind to `gc_estimate_reassurance_copy` from Estimate page or use static copy
   - Mini trust bar (optional): use `[grander_trust_bar]` or simplified version
3. Right column:
   - Shortcode widget: `[grander_estimate_form]`
   - This outputs the Gravity Forms shortcode from `gc_estimate_form_shortcode`

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-estimate-cta-v1` |
| Headline | `gc-estimate-cta__headline` |
| Body text | `gc-estimate-cta__body` |
| Button | `gc-estimate-cta__button` |

### JS behavior
None required from plugin. Elementor handles popup trigger.

### Design notes
- Visually distinct section (background color or pattern)
- Centered content, comfortable reading width
- Button should be prominent (primary brand gold)
- Keep copy concise: 1 headline, 1 to 2 sentences, 1 button

---

## 6. ACF integrated events strip 1

### Where it will be used
- Home page (near bottom, when enabled)
- Contact page (optional)

**Note:** Events are disabled by default for launch. Build this template so it is ready to activate later.

### ACF field group and fields to bind

**Source:** Global options

| Field | Purpose |
|-------|---------|
| `gc_events_enabled` | Toggle for entire module |
| `gc_events` | Repeater with event details |

**Event repeater subfields:**

| Subfield | Type |
|----------|------|
| `title` | Text |
| `short_summary` | Textarea |
| `start_date` | Date |
| `end_date` | Date (optional) |
| `location` | Text |
| `button_label` | Text |
| `button_url` | URL |

### Build instructions

**Recommended: Use shortcode**
1. Add a Shortcode widget
2. Enter: `[grander_events_strip]`
3. The shortcode automatically:
   - Checks `gc_events_enabled` and renders nothing if false
   - Filters out past events
   - Displays upcoming events with all details

**Alternative: Build manually**
1. Add conditional visibility checking `gc_events_enabled` from options
2. Loop through `gc_events` repeater
3. Display each event as a card with date, title, location, summary, button

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-events-strip` |
| Inner container | `gc-events-strip__inner` |
| Event card | `gc-events-strip__event` |
| Event title | `gc-events-strip__title` |
| Date display | `gc-events-strip__date` |
| Location | `gc-events-strip__location` |
| Summary | `gc-events-strip__summary` |
| Button | `gc-events-strip__button` |

### JS behavior
None required.

### Design notes
- Card based layout
- Date prominently displayed
- Keep it compact; events are supplementary content
- Should feel like a helpful announcement, not a marketing push

---

## 7. ACF integrated service cards 1

### Where it will be used
- Home page (expert offerings section)

### ACF field group and fields to bind

**Source:** Static content aligned with `service_category` taxonomy

The four service cards use mostly static content because the summaries are marketing copy, not dynamically managed. However, you can pull category names from the taxonomy if desired.

### Build instructions

1. Create a section with 4 columns (or 2x2 grid)
2. For each service card:
   - Image widget (static hero image for each service)
   - Heading widget with service name
   - Text widget with summary (from copy below)
   - Button linking to service page

### Static content for cards

**Custom homes**
- Image: Custom home hero
- Title: Custom homes
- Summary: Thoughtfully designed homes that balance timeless style, modern comfort, and high performance details.
- Link: /custom-homes/

**Outdoor spaces**
- Image: Outdoor living hero
- Title: Outdoor spaces
- Summary: Porches, patios, coverings, decks, and pavilions that extend how you live outside with year round comfort.
- Link: /outdoor-spaces/

**Pool houses, garages, and ADUs**
- Image: Pool house or ADU hero
- Title: Pool houses, garages, and ADUs
- Summary: Multi purpose structures that add function, storage, and flexible living space without compromising aesthetics.
- Link: /pool-houses-garages-adus/

**Sunrooms and additions**
- Image: Sunroom hero
- Title: Sunrooms and additions
- Summary: Light filled expansions that connect your existing home to new possibilities in comfort and layout.
- Link: /sunrooms-additions/

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-service-cards-v1` |
| Individual card | `gc-service-card` |
| Card image | `gc-service-card__image` |
| Card title | `gc-service-card__title` |
| Card summary | `gc-service-card__summary` |
| Card button | `gc-service-card__button` |

### JS behavior
None required.

### Design notes
- Equal height cards
- Images should be consistent aspect ratio
- Hover state on entire card (subtle lift or overlay)
- Button can be text link style or small button

---

## 8. ACF integrated portfolio block 1

### Where it will be used
- Custom homes page
- Outdoor spaces page
- Pool houses, garages, and ADUs page
- Sunrooms and additions page

### ACF field group and fields to bind

**Source:** Service page field > `gc_service_portfolio_sections` repeater

| Subfield | Type | Notes |
|----------|------|-------|
| `title` | Text | Project name |
| `location` | Text | City, SC |
| `summary` | Textarea | Project description |
| `has_design_image` | True/False | Toggle for design rendering |
| `design_image` | Image | Conditional on toggle |
| `gallery` | Gallery | Project photos |

### Build instructions

1. Create a new Elementor section
2. Use ACF Repeater widget or loop
3. Bind to `gc_service_portfolio_sections` from current page
4. For each portfolio section:
   - Heading with project `title` and `location`
   - Text with `summary`
   - Conditional container for `design_image`:
     - Use Dynamic Visibility or conditional logic
     - Only show if `has_design_image` is true
     - Display as "Design rendering" or "Before" image
   - Gallery widget bound to `gallery` subfield
5. Stack sections vertically

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-portfolio-block-v1` |
| Individual project section | `gc-portfolio-section` |
| Project title | `gc-portfolio-title` |
| Project location | `gc-portfolio-location` |
| Project summary | `gc-portfolio-summary` |
| Design image container | `gc-portfolio-design-image` |
| Gallery container | `gc-portfolio-gallery` |

### JS behavior
None required. Elementor lightbox handles gallery clicks.

### Design notes
- Each project section should feel like its own showcase
- Design image (when present) should appear alongside or above gallery
- Gallery can be grid, masonry, or carousel
- Newest projects should be first (order in repeater)

---

## 9. ACF integrated team grid 1

### Where it will be used
- Team page

### ACF field group and fields to bind

**Source:** Team page field > `gc_team_members` repeater

| Subfield | Type | Notes |
|----------|------|-------|
| `name` | Text | Full name |
| `title` | Text | Job title |
| `bio` | Textarea | 60 to 90 words |
| `photo` | Image | Headshot |
| `highlight_owner` | True/False | Larger display for owner |

### Build instructions

1. Create a new Elementor section
2. Use ACF Repeater widget or loop
3. Bind to `gc_team_members` from Team page
4. For each team member:
   - Image widget bound to `photo`
   - Heading widget bound to `name`
   - Text widget bound to `title`
   - Text widget bound to `bio`
5. Apply conditional class for owner highlight:
   - When `highlight_owner` is true, add class `gc-team-member--owner`
   - Style this class to be larger or full width

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-team-grid-v1` |
| Individual member card | `gc-team-member` |
| Owner highlight modifier | `gc-team-member--owner` |
| Photo | `gc-team-photo` |
| Name | `gc-team-name` |
| Title | `gc-team-title` |
| Bio | `gc-team-bio` |

### JS behavior
None required.

### Design notes
- Micah (owner) should be visually prominent: larger card or dedicated row
- Remaining 4 members in 2x2 or 4 column grid
- Center alignment on uneven rows
- Photos should be consistent size and style (professional headshots)
- Bio text should be readable; do not truncate

---

## 10. ACF integrated process steps 1

### Where it will be used
- Build process page

### ACF field group and fields to bind

**Source:** Build process page field > `gc_process_steps` repeater

| Subfield | Type | Notes |
|----------|------|-------|
| `label` | Text | Step name (e.g., "Phone call") |
| `short_desc` | Textarea | Brief description |

### Build instructions

1. Create a new Elementor section
2. Use ACF Repeater widget or loop
3. Bind to `gc_process_steps` from Build process page
4. For each step:
   - Step number (use loop index + 1)
   - Heading with `label`
   - Text with `short_desc`
5. Style as timeline, numbered list, or card sequence

### CSS classes to apply

| Element | Class |
|---------|-------|
| Section wrapper | `gc-process-steps-v1` |
| Individual step | `gc-process-step` |
| Step number | `gc-process-step__number` |
| Step label | `gc-process-step__label` |
| Step description | `gc-process-step__desc` |

### JS behavior
None required.

### Design notes
- Visual timeline or numbered sequence
- Numbers should be prominent (large, branded color)
- Keep descriptions brief; this is an overview, not full documentation
- Consider alternating layout or connected line between steps

---

## Header and footer hooks

### Header structure

The header has two layers:

1. **Sticky white stripe** (top bar)
   - Contains: Logo, search icon, Request an estimate button, Call now button
   - Apply class: `gc-header-stripe`
   - Plugin adds `gc-header-stripe--scrolled` class when page is scrolled

2. **Hero overlay navigation**
   - Menu positioned over hero image
   - Two color variants controlled by `gc_hero_nav_variant` field:
     - `light` = light text for dark backgrounds
     - `dark` = dark text for light backgrounds
   - Apply class: `gc-nav-overlay--light` or `gc-nav-overlay--dark`

### Header classes to apply

| Element | Class | Notes |
|---------|-------|-------|
| Top sticky bar container | `gc-header-stripe` | Plugin JS adds scroll state |
| Call now button | `gc-header-call` | Plugin CSS hides on mobile |
| Overlay nav (light variant) | `gc-nav-overlay--light` | For dark hero backgrounds |
| Overlay nav (dark variant) | `gc-nav-overlay--dark` | For light hero backgrounds |

### Mobile floating call icon

The plugin automatically creates a floating phone icon at bottom right on mobile. It appears when:
- Screen width is below 768px
- `gc_phone_number` is set in Grander Settings

The icon has class `gc-float-call` and links to `tel:` with the phone number.

### Mobile menu requirements

- Hamburger menu must reveal full menu hierarchy, not just top level
- Request an estimate should remain accessible in the mobile menu
- The Call now text button in the header is hidden via `gc-header-call` class

### Footer structure

Apply class: `gc-footer` to the main footer section

**Zigzag divider options:**

Option A: Use shortcode
```
[grander_zigzag_divider color="dark"]
```

Option B: Use the SVG directly
- File: `/grander-core/assets/svg/footer-zigzag-divider.svg`
- Add as image widget or inline SVG
- Apply class: `gc-footer-zigzag`

**Footer content from ACF options:**
- Logo: `gc_footer_logo_white`
- HBA logo and link: `gc_footer_hba_logo`, `gc_footer_hba_url`
- BBB logo and link: `gc_footer_bbb_logo`, `gc_footer_bbb_url`
- Social URLs: `gc_social_instagram_url`, `gc_social_facebook_url`
- Service area line: `[grander_service_area_line]` shortcode or bind to `gc_service_area_text`

### Footer classes to apply

| Element | Class |
|---------|-------|
| Footer section | `gc-footer` |
| Zigzag divider | `gc-footer-zigzag` |
| Logo image | `gc-footer-logo` |
| Trust logos row | `gc-footer-trust` |
| Social icons | `gc-footer-social` |

---

## Class hook summary table

| Component | Wrapper class | Item class | Key element classes |
|-----------|---------------|------------|---------------------|
| Testimonials | `gc-testimonials-v1` | `gc-testimonial-card` | `gc-testimonial-quote`, `gc-testimonial-author` |
| FAQ accordion | `gc-faq-accordion-v1` | `gc-faq-item` | `gc-faq-question`, `gc-faq-answer` |
| Trust bar | `gc-trust-bar` | `gc-trust-bar__item` | `gc-trust-bar__logo`, `gc-trust-bar__label` |
| Featured projects | `gc-featured-projects-v1` | `gc-project-card` | `gc-project-image`, `gc-project-title` |
| Events strip | `gc-events-strip` | `gc-events-strip__event` | `gc-events-strip__title`, `gc-events-strip__date` |
| Service cards | `gc-service-cards-v1` | `gc-service-card` | `gc-service-card__title`, `gc-service-card__summary` |
| Portfolio block | `gc-portfolio-block-v1` | `gc-portfolio-section` | `gc-portfolio-gallery`, `gc-portfolio-design-image` |
| Estimate CTA | `gc-estimate-cta-v1` | - | `gc-estimate-cta__headline`, `gc-estimate-cta__button` |
| Team grid | `gc-team-grid-v1` | `gc-team-member` | `gc-team-photo`, `gc-team-name`, `gc-team-bio` |
| Process steps | `gc-process-steps-v1` | `gc-process-step` | `gc-process-step__number`, `gc-process-step__label` |
| Header stripe | `gc-header-stripe` | - | `gc-header-call` |
| Footer | `gc-footer` | - | `gc-footer-zigzag`, `gc-footer-logo` |

---

## Swap process checklist

Follow this workflow for each section you upgrade:

### Step 1: Identify and duplicate
- [ ] Identify the existing static section on the staging page
- [ ] Right click > Duplicate Section as backup
- [ ] Rename the duplicate with "BACKUP" prefix

### Step 2: Build ACF integrated version
- [ ] Create a new section below the backup
- [ ] Follow the build instructions in this guide
- [ ] Bind all dynamic content to ACF fields via dynamic tags
- [ ] Apply all required CSS classes

### Step 3: Save as template
- [ ] Right click the new section > Save as Template
- [ ] Name it following the convention: "ACF integrated [type] 1"
- [ ] Confirm it appears in Templates > Saved Templates

### Step 4: Test and swap
- [ ] Preview the page and verify dynamic content renders
- [ ] Check responsive behavior (desktop, tablet, mobile)
- [ ] If working correctly, delete the backup section
- [ ] If not working, keep backup and troubleshoot

### Step 5: Apply to other pages
- [ ] Insert the saved template on other pages that need it
- [ ] Test each instance
- [ ] Remove old static versions

### Step 6: Document
- [ ] Note which pages now use the ACF integrated template
- [ ] Update any team documentation if needed

---

## Troubleshooting

### Dynamic content not showing

1. Check that the ACF field has data entered
2. Verify the dynamic tag is bound to the correct field name
3. For repeater fields, ensure you are inside a loop
4. For options fields, confirm you selected "Options" as the source

### FAQ accordion not working

1. Verify `.gc-faq-accordion-v1` class is on the wrapper
2. Verify `.gc-faq-item` class is on each item
3. Verify `.gc-faq-question` class is on the clickable element
4. Check browser console for JS errors

### Mobile call icon not appearing

1. Verify `gc_phone_number` is set in Grander Settings
2. Check that screen width is below 768px
3. Verify the plugin CSS is loading (check for `.gc-float-call` in dev tools)

### Trust bar shortcode outputs nothing

1. Verify `gc_trust_items` repeater has at least one item
2. Check that each item has at minimum a label or logo

---

End of guide.
