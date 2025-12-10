# Comprehensive Template Audit Report

**Date:** 2025-12-10
**Status:** Complete
**Purpose:** Implementation-ready audit of all Grander Construction templates

---

## Executive Summary

This audit reviews all templates against:
1. Site Plan Master content requirements
2. ACF field definitions (class-grander-acf.php)
3. TSX visual system (blog_preview.tsx, grander-build-process.tsx)
4. Elementor Pro + Hello Elementor + grander-core compatibility

**Key Finding:** Templates exist on staging but require ACF dynamic tag wiring. This audit provides exact field bindings and content coverage for each page.

---

## Visual Design System Reference (from TSX)

### Color Tokens
| Token | Hex | CSS Variable | Usage |
|-------|-----|--------------|-------|
| Deep Brown | `#4c2a19` | `--gc-deep-brown` | Headlines, primary buttons, CTA backgrounds |
| Primary Gold | `#b08d66` | `--gc-gold` | Accents, badges, icons, card borders |
| Text Dark | `#231f20` | `--gc-text` | Body text, card content |
| Warm Background | `#f5f3f0` | `--gc-warm-bg` | Page backgrounds, sections |
| White | `#FFFFFF` | `--gc-white` | Cards, content areas |
| Border Light | `#e8dfd5` | `--gc-border` | Borders, dividers, separators |

### Typography Scale
| Element | Font | Size Desktop | Size Mobile | Weight | Color |
|---------|------|--------------|-------------|--------|-------|
| H1 | Libre Baskerville | 64px | 36px | 700 | Deep Brown |
| H2 | Libre Baskerville | 48px | 30px | 700 | Deep Brown |
| H3 | Libre Baskerville | 36px | 26px | 700 | Deep Brown |
| H4 | Libre Baskerville | 24px | 22px | 700 | Deep Brown |
| Body | Corbel | 18px | 16px | 400 | Text Dark |
| Meta | Corbel | 14px | 14px | 400 | Text Dark |
| Badge | Corbel | 12px | 12px | 700 | White on Gold |
| Button | Corbel | 14-16px | 14px | 700 | White |

### Card Component Standard
```css
/* Standard Card */
.gc-card {
  background: #FFFFFF;
  border-top: 3px solid #b08d66;
  border-radius: 0px;
  box-shadow: 0 8px 20px rgba(35,31,32,0.08);
  transition: all 0.3s ease;
}
.gc-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 30px rgba(35,31,32,0.12);
}
```

### Button Standards
```css
/* Primary Button */
.gc-btn-primary {
  background: #4c2a19;
  color: #FFFFFF;
  padding: 16px 32px;
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  border: none;
  border-radius: 0px;
  box-shadow: 0 4px 8px rgba(76,42,25,0.2);
}
.gc-btn-primary:hover {
  background: #b08d66;
  transform: translateY(-2px);
}

/* Secondary/Outline Button */
.gc-btn-secondary {
  background: transparent;
  color: #4c2a19;
  border: 1px solid #e8dfd5;
  padding: 12px 24px;
}
.gc-btn-secondary:hover {
  background: #f5f3f0;
  border-color: #b08d66;
}
```

### Section Spacing
| Section Type | Top Padding | Bottom Padding |
|--------------|-------------|----------------|
| Hero | 80px | 60px |
| Content Section | 80px | 80px |
| CTA Section | 100px | 100px |
| Mobile (all) | 60px | 60px |

---

## Template Inventory

### Global Templates
1. Header
2. Footer

### Page Templates
1. Home
2. About Our Company
3. Build Process
4. Performance Building
5. Services Landing
6. Service Detail (4 pages)
7. Our Team
8. Gallery
9. Contact
10. Request an Estimate

### Blog Templates
1. Blog Archive (The Blueprint)
2. Blog Single Post

### Utility Templates
1. Search Results
2. 404 Page

---

## Template Audit: Header

### Content Coverage

| Site Plan Element | Template Location | ACF Field | Status |
|-------------------|-------------------|-----------|--------|
| Logo | Left side | N/A (media) | IMPLEMENTED |
| Main navigation | Center | N/A (menu) | IMPLEMENTED |
| Phone number | Right side | `gc_phone_number` (options) | NEEDS WIRING |
| Request an estimate button | Right side | `gc_header_estimate_label` (options) | NEEDS WIRING |
| Estimate button mode | N/A | `gc_header_estimate_mode` (options) | NEEDS WIRING |
| Social icons | Optional | `gc_social_*` (options) | OPTIONAL |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Phone text/link | ACF Options | `gc_phone_number` | Text |
| Estimate CTA text | ACF Options | `gc_header_estimate_label` | Text |
| Estimate CTA URL | ACF Options | `gc_header_estimate_url` | URL |

### Technical Notes
- Sticky behavior: White stripe with logo + CTA stays fixed
- Mobile: Hide "Call Now" text, show floating phone icon (grander-core.js handles this)
- Nav overlay: Uses `gc_hero_nav_variant` per-page for light/dark text
- Class hook: `.gc-header`

---

## Template Audit: Footer

### Content Coverage

| Site Plan Element | Template Location | ACF Field | Status |
|-------------------|-------------------|-----------|--------|
| White logo | Left/top | `gc_footer_logo_white` (options) | NEEDS WIRING |
| HBA logo + link | Trust row | `gc_footer_hba_logo`, `gc_footer_hba_url` (options) | NEEDS WIRING |
| BBB logo + link | Trust row | `gc_footer_bbb_logo`, `gc_footer_bbb_url` (options) | NEEDS WIRING |
| Instagram URL | Social icons | `gc_social_instagram_url` (options) | NEEDS WIRING |
| Facebook URL | Social icons | `gc_social_facebook_url` (options) | NEEDS WIRING |
| Address | Contact column | Manual or from Contact fields | CHECK |
| Phone | Contact column | `gc_phone_number` (options) | NEEDS WIRING |
| Email | Contact column | From Contact fields | CHECK |
| Service area text | Bottom | `gc_service_area_text` (options) | OPTIONAL |
| Zigzag divider | Top border | `[gc_zigzag_divider]` shortcode or image | CHECK |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| White logo | ACF Options | `gc_footer_logo_white` | Image |
| HBA logo | ACF Options | `gc_footer_hba_logo` | Image |
| HBA link | ACF Options | `gc_footer_hba_url` | URL |
| BBB logo | ACF Options | `gc_footer_bbb_logo` | Image |
| BBB link | ACF Options | `gc_footer_bbb_url` | URL |
| Phone number | ACF Options | `gc_phone_number` | Text |
| Instagram | ACF Options | `gc_social_instagram_url` | URL |
| Facebook | ACF Options | `gc_social_facebook_url` | URL |

### Technical Notes
- Background: Deep Brown (`#4c2a19`)
- Zigzag pattern at top (consistent with live site)
- Quick links: Hardcoded menu
- Class hook: `.gc-footer`

---

## Template Audit: Home Page

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| Headline: "Experience the art of building with grandeur" | Hero headline | `gc_home_hero_headline` | NEEDS WIRING |
| "Custom homes and outdoor living spaces..." | Hero subline | `gc_home_hero_subline` | NEEDS WIRING |
| Background image | Hero BG | `gc_home_hero_image` | NEEDS WIRING |
| Primary CTAs | Buttons | Hardcoded links | IMPLEMENTED |
| **Expert Offerings** | | | |
| Intro paragraph | Intro text | `gc_home_intro` | NEEDS WIRING |
| **Service Blocks (4)** | | | |
| Custom Homes card | Service card | `service_category` taxonomy query | NEEDS WIRING |
| Outdoor Spaces card | Service card | `service_category` taxonomy query | NEEDS WIRING |
| Pool Houses card | Service card | `service_category` taxonomy query | NEEDS WIRING |
| Sunrooms card | Service card | `service_category` taxonomy query | NEEDS WIRING |
| **Testimonials** | | | |
| 5 random testimonials | Slider | `testimonial` CPT query | NEEDS WIRING |
| **Performance Teaser** | | | |
| "Discover the art of custom home building..." | Headline | `gc_home_performance_headline` | NEEDS WIRING |
| Body text | Description | `gc_home_performance_body` | NEEDS WIRING |
| CTA to Performance page | Button | Hardcoded link | CHECK |
| **Featured Projects** | | | |
| Project cards | Grid | `project` CPT with `gc_project_featured_on_home` | NEEDS WIRING |
| **Final CTA** | | | |
| Estimate form inline | Form | `gc_estimate_form_shortcode` (options) | NEEDS WIRING |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero headline | ACF Page | `gc_home_hero_headline` | Text |
| Hero subline | ACF Page | `gc_home_hero_subline` | Textarea |
| Hero background | ACF Page | `gc_home_hero_image` | Image |
| Expert intro | ACF Page | `gc_home_intro` | Textarea |
| Service cards | Taxonomy Query | `service_category` terms | Loop |
| Testimonials | CPT Query | `testimonial` posts | Loop/Slider |
| Performance headline | ACF Page | `gc_home_performance_headline` | Text |
| Performance body | ACF Page | `gc_home_performance_body` | Textarea |
| Featured projects | CPT Query | `project` where `gc_project_featured_on_home` = true | Loop |

### Missing ACF Fields (Need to Add)

The following fields are referenced in Site Plan but not in current ACF registration:

| Field Name | Type | Location | Purpose |
|------------|------|----------|---------|
| `gc_home_hero_headline` | text | Home Page | Hero H1 |
| `gc_home_hero_subline` | textarea | Home Page | Hero subtitle |
| `gc_home_hero_image` | image | Home Page | Hero background |
| `gc_home_intro` | textarea | Home Page | Expert offerings intro |
| `gc_home_performance_headline` | text | Home Page | Performance teaser H2 |
| `gc_home_performance_body` | textarea | Home Page | Performance teaser copy |

**Note:** Check if these exist under different names in `group_gc_home_fields`. If not, add them.

### Visual Alignment Notes
- Service cards: Use standard card component (3px gold top border)
- Testimonial slider: Quote marks using gold color
- Section backgrounds: Alternate warm-bg and white
- Hero: Full viewport height with overlay gradient

---

## Template Audit: About Our Company

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| "Crafted for the way you live" | Headline | `gc_about_hero_headline` | NEEDS WIRING |
| "A home should reflect..." | Subline | `gc_about_hero_subline` | NEEDS WIRING |
| Background image | BG | `gc_about_hero_image` | NEEDS WIRING |
| **Micah Story** | | | |
| Story headline | H2 | `gc_about_story_headline` | NEEDS WIRING |
| Story content | Body text | `gc_about_story_content` | NEEDS WIRING |
| Story image | Image | `gc_about_story_image` | NEEDS WIRING |
| **Values Grid** | | | |
| Values (repeater) | Cards | `gc_about_values` | NEEDS WIRING |
| **Why Grander** | | | |
| Why headline | H2 | `gc_about_why_headline` | NEEDS WIRING |
| Why content | Body | `gc_about_why_content` | NEEDS WIRING |
| **CTA** | | | |
| CTA headline | H2 | `gc_about_cta_headline` | NEEDS WIRING |
| CTA body | Text | `gc_about_cta_body` | NEEDS WIRING |
| CTA button | Button | `gc_about_cta_button_label` | NEEDS WIRING |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero headline | ACF Page | `gc_about_hero_headline` | Text |
| Hero subline | ACF Page | `gc_about_hero_subline` | Textarea |
| Hero image | ACF Page | `gc_about_hero_image` | Image |
| Story headline | ACF Page | `gc_about_story_headline` | Text |
| Story content | ACF Page | `gc_about_story_content` | WYSIWYG |
| Story image | ACF Page | `gc_about_story_image` | Image |
| Values | ACF Page | `gc_about_values` (repeater) | Repeater |
| Why headline | ACF Page | `gc_about_why_headline` | Text |
| Why content | ACF Page | `gc_about_why_content` | WYSIWYG |
| CTA headline | ACF Page | `gc_about_cta_headline` | Text |
| CTA body | ACF Page | `gc_about_cta_body` | Textarea |
| CTA button text | ACF Page | `gc_about_cta_button_label` | Text |

### Site Plan Content to Seed

**Micah Story:**
> Founded by Micah Barney, Grander Construction was built on a passion for quality craftsmanship and a desire to bring proven Midwestern standards and building science to the Upstate of South Carolina. With a family background in the trades and a degree in construction management, Micah leads with integrity, faith, and a genuine care for the families the team serves.

**Values:**
- Integrity
- Purpose
- Quality that lasts
- Clear communication
- Craftsmanship with science backed methods

---

## Template Audit: Build Process

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| "The build process, made clear" | Headline | `gc_process_hero_headline` | NEEDS WIRING |
| Background image | BG | `gc_process_hero_image` | NEEDS WIRING |
| **Intro** | | | |
| "Every project is unique..." | Intro text | `gc_process_intro` | NEEDS WIRING |
| **Process Steps (11)** | | | |
| Steps repeater | Timeline | `gc_process_steps` | NEEDS WIRING |
| **FAQs** | | | |
| Process FAQs | Accordion | FAQ CPT with `faq_group` = "build-process" | NEEDS WIRING |
| **CTA** | | | |
| CTA block | Section | `gc_process_cta_*` fields | NEEDS WIRING |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero headline | ACF Page | `gc_process_hero_headline` | Text |
| Hero image | ACF Page | `gc_process_hero_image` | Image |
| Intro text | ACF Page | `gc_process_intro` | Textarea |
| Process steps | ACF Page | `gc_process_steps` (repeater) | Repeater |
| - Step label | Subfield | `gc_process_steps__label` | Text |
| - Step description | Subfield | `gc_process_steps__short_desc` | Textarea |
| FAQs | CPT Query | `faq` where `faq_group` = build-process term | Loop |

### Site Plan Content to Seed (11 Process Phases)

1. Phone call
2. Consultation
3. Project execution schedule
4. Site or office visit
5. Establish start date
6. Design package and project quote
7. One to three design alterations
8. Review and modify quote and design
9. Pay deposit
10. Project completion
11. Final photo and video

### Visual Alignment Notes (from grander-build-process.tsx)
- Timeline uses alternating left/right layout
- Step numbers in gold circles
- Connecting line between steps
- Each step has hover state with slight scale

---

## Template Audit: Performance Building

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| "High performance building, tailored for the Upstate" | Headline | `gc_performance_hero_headline` | NEEDS WIRING |
| **Why Build Smart** | | | |
| Main explanation | Body | `gc_performance_intro` | NEEDS WIRING |
| **Benefits** | | | |
| Benefits list | Repeater/cards | `gc_performance_benefits` | NEEDS WIRING |
| **Interactive Diagram** | | | |
| House diagram with hotspots | Hotspot widget | Custom implementation | NEEDS BUILDING |
| **Build Science Practices** | | | |
| Practices list | Repeater | `gc_performance_practices` | NEEDS WIRING |
| **CTAs** | | | |
| Request an estimate | Button | Lightbox trigger | IMPLEMENTED |
| View performance projects | Button | Link to Gallery filtered | CHECK |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero headline | ACF Page | `gc_performance_hero_headline` | Text |
| Intro text | ACF Page | `gc_performance_intro` | Textarea |
| Benefits | ACF Page | `gc_performance_benefits` (repeater) | Repeater |
| - Benefit title | Subfield | `gc_performance_benefits__title` | Text |
| - Benefit description | Subfield | `gc_performance_benefits__description` | Textarea |
| - Benefit icon | Subfield | `gc_performance_benefits__icon` | Select |
| Practices | ACF Page | `gc_performance_practices` (repeater) | Repeater |
| - Practice title | Subfield | `gc_performance_practices__title` | Text |
| - Practice description | Subfield | `gc_performance_practices__description` | Textarea |

### Site Plan Content to Seed

**Why Build Smart:**
> We believe homes should do more than look beautiful. High performance building means healthier indoor air, greater comfort year round, and lower energy costs for families. By focusing on advanced methods and durable materials, we create spaces that are built to last while reducing the long term impact on the environment.

**Build Science Practices:**
- ZIP System envelope across roof and walls
- Energy efficient Windsor aluminum clad windows
- Airtight wall assemblies with no roof penetrations
- Continuous air barrier and high performance insulation

### Hotspot Implementation Notes
- Use Elementor Pro Hotspot widget
- Create popups for each building practice
- Include accessible fallback list below diagram
- Mobile: Stack as list instead of interactive diagram

---

## Template Audit: Services Landing

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| "Services" | Headline | `gc_services_hero_headline` | NEEDS WIRING |
| **Intro** | | | |
| "Grander Construction specializes..." | Body | `gc_services_intro` | NEEDS WIRING |
| **Service Cards (4)** | | | |
| Custom Homes | Card | `service_category` term | NEEDS WIRING |
| Outdoor Spaces | Card | `service_category` term | NEEDS WIRING |
| Pool Houses, Garages, ADUs | Card | `service_category` term | NEEDS WIRING |
| Sunrooms & Additions | Card | `service_category` term | NEEDS WIRING |
| **Process Teaser** | | | |
| Link to Build Process | CTA | Hardcoded link | CHECK |
| **CTA** | | | |
| Final CTA | Section | `gc_services_cta_*` | NEEDS WIRING |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero headline | ACF Page | `gc_services_hero_headline` | Text |
| Intro text | ACF Page | `gc_services_intro` | Textarea |
| Service cards | Taxonomy Query | `service_category` terms | Loop |
| CTA headline | ACF Page | `gc_services_cta_headline` | Text |
| CTA body | ACF Page | `gc_services_cta_body` | Textarea |

### Site Plan Content to Seed

**Intro:**
> Grander Construction specializes in creating custom homes and outdoor living spaces designed around the way you live. With a balance of innovative design and skilled craftsmanship, we deliver projects that blend beauty, function, and lasting value.

---

## Template Audit: Service Detail (Single Template for 4 Pages)

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| Service title | H1 | Post Title | IMPLEMENTED |
| Background image | BG | `gc_service_hero_image` | NEEDS WIRING |
| **Jump Links** | | | |
| Enabled toggle | Conditional | `gc_service_jump_links_enabled` | NEEDS WIRING |
| Anchors | Links | #overview, #portfolio, #faq, #estimate | NEEDS IMPLEMENTING |
| **Overview** | | | |
| Service description | Body | `gc_service_overview` | NEEDS WIRING |
| **Featured Projects** | | | |
| Projects row | Grid | `gc_service_featured_projects` OR global | NEEDS WIRING |
| **Portfolio Sections** | | | |
| Portfolio repeater | Repeater blocks | `gc_service_portfolio_sections` | NEEDS WIRING |
| - Section title | Subfield | `gc_service_portfolio_sections__title` | Text |
| - Location | Subfield | `gc_service_portfolio_sections__location` | Text |
| - Summary | Subfield | `gc_service_portfolio_sections__summary` | Textarea |
| - Has design image | Subfield | `gc_service_portfolio_sections__has_design_image` | True/False |
| - Design image | Subfield | `gc_service_portfolio_sections__design_image` | Image |
| - Gallery | Subfield | `gc_service_portfolio_sections__gallery` | Gallery |
| **Mid CTA** | | | |
| Headline | H2 | `gc_service_mid_cta_headline` | NEEDS WIRING |
| Body | Text | `gc_service_mid_cta_body` | NEEDS WIRING |
| Button (estimate) | Button | `gc_service_estimate_cta_label` | NEEDS WIRING |
| **FAQs** | | | |
| Category FAQs | Accordion | FAQ CPT filtered by `service_category` | NEEDS WIRING |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero title | Post Title | N/A | Dynamic |
| Hero image | ACF Page | `gc_service_hero_image` | Image |
| Jump links toggle | ACF Page | `gc_service_jump_links_enabled` | True/False |
| Overview | ACF Page | `gc_service_overview` | Textarea |
| Featured projects | ACF Page | `gc_service_featured_projects` (relationship) | Relationship |
| Portfolio sections | ACF Page | `gc_service_portfolio_sections` (repeater) | Repeater |
| Mid CTA headline | ACF Page | `gc_service_mid_cta_headline` | Text |
| Mid CTA body | ACF Page | `gc_service_mid_cta_body` | Textarea |
| Estimate button text | ACF Page | `gc_service_estimate_cta_label` | Text |
| FAQs | CPT Query | `faq` filtered by page's `service_category` | Query |

### Site Plan Content for 4 Service Pages

**Custom Homes:**
> From modern farmhouse to refined transitional and contemporary styles, our custom home builds are designed to feel personal, practical, and enduring. We combine architectural detail with thoughtful space planning and performance focused construction so your home is as comfortable as it is beautiful.

**Outdoor Spaces:**
> Outdoor living should feel like a natural extension of your home. We design and build patios, covered structures, decks, porches, and pavilions that support everyday relaxation and effortless entertaining.

**Pool Houses, Garages & ADUs:**
> These structures can do far more than store equipment or cars. We build pool houses, garages, and accessory dwelling units that add flexible living space, guest accommodations, home office potential, and thoughtful storage.

**Sunrooms & Additions:**
> When you love your location but need more room or more light, a well designed addition makes all the difference. Our sunrooms and home additions are crafted to blend seamlessly with your current architecture while opening up new ways to live.

---

## Template Audit: Our Team

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| "Our experts, your vision" | Headline | `gc_team_hero_headline` | NEEDS WIRING |
| **Intro** | | | |
| "At Grander Construction, our team..." | Body | `gc_team_intro` | NEEDS WIRING |
| **Team Grid** | | | |
| Micah (highlighted) | Featured card | `gc_team_members` where `highlight_owner` = true | NEEDS WIRING |
| Other members (4) | Grid | `gc_team_members` repeater | NEEDS WIRING |
| **Mission & Promise** | | | |
| Mission statement | Text block | `gc_team_mission` | NEEDS WIRING |
| Promise statement | Text block | `gc_team_promise` | NEEDS WIRING |
| **Testimonials** | | | |
| Team testimonials | Slider | `testimonial` CPT query | OPTIONAL |
| **CTA** | | | |
| CTA section | Block | `gc_team_cta_*` | NEEDS WIRING |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero headline | ACF Page | `gc_team_hero_headline` | Text |
| Hero subline | ACF Page | `gc_team_hero_subline` | Textarea |
| Hero image | ACF Page | `gc_team_hero_image` | Image |
| Intro headline | ACF Page | `gc_team_intro_headline` | Text |
| Intro text | ACF Page | `gc_team_intro` | Textarea |
| Team members | ACF Page | `gc_team_members` (repeater) | Repeater |
| - Name | Subfield | `gc_team_members__name` | Text |
| - Title | Subfield | `gc_team_members__title` | Text |
| - Bio | Subfield | `gc_team_members__bio` | Textarea |
| - Photo | Subfield | `gc_team_members__photo` | Image |
| - Highlight owner | Subfield | `gc_team_members__highlight_owner` | True/False |
| Mission text | ACF Page | `gc_team_mission` | Textarea |
| Promise text | ACF Page | `gc_team_promise` | Textarea |
| CTA headline | ACF Page | `gc_team_cta_headline` | Text |
| CTA body | ACF Page | `gc_team_cta_body` | Textarea |
| CTA button text | ACF Page | `gc_team_cta_button_label` | Text |

### Site Plan Content to Seed

**Team Members:**
1. Micah Barney - Owner and Founder
2. Martti Onermaa - Project Manager
3. Will Bondy - Project Superintendent
4. Chris Stein - Sales Manager
5. Jared Barney - Design Manager

**Mission:**
> To design and build spaces that embody individuality, purpose, and enduring excellence. Guided by our motto, Grandeur by Design. Built with Purpose, we blend innovative craftsmanship with personalized service to create custom homes and outdoor living spaces that last for generations.

**Promise:**
> We promise to lead every build with clarity, craftsmanship, and care, delivering spaces that honor your vision and protect your investment.

---

## Template Audit: Gallery

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| Subtle background | Hero BG | `gc_gallery_hero_image` | NEEDS WIRING |
| Headline | H1 | `gc_gallery_hero_headline` | NEEDS WIRING |
| **Intro** | | | |
| "A curated look..." | Body | `gc_gallery_intro` | NEEDS WIRING |
| **Filters** | | | |
| Category filters | Buttons | `service_category` taxonomy | NEEDS IMPLEMENTING |
| Tag filters | Buttons | `project_tag` taxonomy | OPTIONAL |
| **Projects Grid** | | | |
| Project cards | Grid | `project` CPT query | NEEDS WIRING |
| **Lightbox** | | | |
| Gallery view | Lightbox | Per-project `gc_project_gallery` | NEEDS WIRING |
| **CTA** | | | |
| Final CTA | Section | `gc_gallery_cta_*` | NEEDS WIRING |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero headline | ACF Page | `gc_gallery_hero_headline` | Text |
| Hero subline | ACF Page | `gc_gallery_hero_subline` | Textarea |
| Hero image | ACF Page | `gc_gallery_hero_image` | Image |
| Intro text | ACF Page | `gc_gallery_intro` | Textarea |
| Filter enabled | ACF Page | `gc_gallery_filter_enabled` | True/False |
| Projects | CPT Query | `project` posts | Loop |
| - Title | Post Title | N/A | Dynamic |
| - Location | ACF Post | `gc_project_location_city`, `gc_project_location_state` | Text |
| - Summary | ACF Post | `gc_project_short_summary` | Textarea |
| - Category | Taxonomy | `service_category` | Term |
| - Gallery | ACF Post | `gc_project_gallery` | Gallery |
| CTA headline | ACF Page | `gc_gallery_cta_headline` | Text |
| CTA body | ACF Page | `gc_gallery_cta_body` | Textarea |
| CTA button text | ACF Page | `gc_gallery_cta_button_label` | Text |

### Site Plan Content to Seed

**Intro:**
> A curated look at custom homes and outdoor living spaces built with purpose across the Upstate.

---

## Template Audit: Blog Archive (The Blueprint)

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| "The Blueprint" | H1 | `gc_blog_hero_headline` | NEEDS WIRING |
| Intro text | Body | `gc_blog_hero_intro` | NEEDS WIRING |
| Background image | BG | `gc_blog_hero_image` | NEEDS WIRING |
| **Search** | | | |
| Search form | Input | Native WP search | IMPLEMENTED |
| **Posts Grid** | | | |
| Post cards | Grid | WP Posts query | IMPLEMENTED |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Hero headline | ACF Page (Blog page) | `gc_blog_hero_headline` | Text |
| Hero intro | ACF Page | `gc_blog_hero_intro` | Textarea |
| Hero image | ACF Page | `gc_blog_hero_image` | Image |
| Posts | WP Query | Standard posts | Loop |

### Visual Alignment (from blog_preview.tsx)

**Post Card Structure:**
1. Featured image (280px height, cover)
2. Category badge (gold background, white text, uppercase)
3. Title (30px, Georgia serif, bold)
4. Excerpt (16px, ~150 chars)
5. Meta row with border-top (Author icon + name, Calendar icon + date, Clock icon + read time)

**Card Styling:**
- Background: white
- Border-top: 3px solid #b08d66
- Box-shadow: 0 8px 20px rgba(35,31,32,0.08)
- Padding: 32px 28px (content area)
- Hover: translateY(-4px), shadow increase

---

## Template Audit: Blog Single Post

### Content Coverage

| Element | Template Location | Source | Status |
|---------|-------------------|--------|--------|
| Back button | Top | Hardcoded link | IMPLEMENTED |
| Category badge | Above title | Post category | IMPLEMENTED |
| Post title | H1 | Post title | IMPLEMENTED |
| Meta row | Below title | Author, date, read time | NEEDS WIRING |
| Featured image | Below meta | Featured image | IMPLEMENTED |
| Post content | Main area | Post content | IMPLEMENTED |
| Author bio | After content | Author info | OPTIONAL |
| Related posts | Bottom | Related query | OPTIONAL |
| CTA section | Final | Hardcoded or ACF | CHECK |

### Field Binding Specification

| Widget | Dynamic Source | Field Key | Type |
|--------|----------------|-----------|------|
| Category | Post Terms | Category taxonomy | Dynamic |
| Title | Post Title | N/A | Dynamic |
| Author name | Author Meta | N/A | Dynamic |
| Date | Post Date | N/A | Dynamic |
| Read time | ACF Post | `gc_post_read_time` (if exists) | Text |
| Featured image | Featured Image | N/A | Dynamic |
| Content | Post Content | N/A | Dynamic |
| Subtitle | ACF Post | `gc_post_subtitle` | Text |
| Hide author | ACF Post | `gc_post_hide_author` | True/False |
| Hide related | ACF Post | `gc_post_hide_related` | True/False |
| Custom CTA headline | ACF Post | `gc_post_custom_cta_headline` | Text |
| Custom CTA body | ACF Post | `gc_post_custom_cta_body` | Textarea |

### Visual Alignment (from blog_preview.tsx)

**Single Post Layout:**
- Max width: 900px
- Back button: Outline style, arrow left icon
- Meta row: Flex, 24px gap, border-bottom 2px
- Featured image: Full width, box-shadow
- H2 in content: 48px, Deep Brown
- Paragraphs: 18px, 1.7em line-height, 28px margin-bottom
- Author box: Warm-bg background, 40px padding, flex row

---

## Template Audit: Contact Page

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| "Get in touch" | H1 | `gc_contact_hero_headline` | NEEDS WIRING |
| Subline | Body | `gc_contact_hero_subline` | NEEDS WIRING |
| Background | BG | `gc_contact_hero_image` | NEEDS WIRING |
| **Introduction** | | | |
| "Let's start a conversation" | H2 | `gc_contact_intro_headline` | NEEDS WIRING |
| Intro text | Body | `gc_contact_intro` | NEEDS WIRING |
| **Contact Info** | | | |
| Phone | Info block | `gc_contact_phone` | NEEDS WIRING |
| Email | Info block | `gc_contact_email` | NEEDS WIRING |
| Address line 1 | Info block | `gc_contact_address_line1` | NEEDS WIRING |
| Address line 2 | Info block | `gc_contact_address_line2` | NEEDS WIRING |
| Hours | Info block | `gc_contact_hours` | NEEDS WIRING |
| Service area | Badge | `gc_contact_service_area_text` | NEEDS WIRING |
| **Form** | | | |
| Form headline | H2 | `gc_contact_form_headline` | NEEDS WIRING |
| Form subtext | Body | `gc_contact_form_subtext` | NEEDS WIRING |
| Form embed | Shortcode | `gc_contact_form_shortcode` | NEEDS WIRING |
| **Map** | | | |
| Map headline | H2 | `gc_contact_map_headline` | NEEDS WIRING |
| Map intro | Body | `gc_contact_map_intro` | NEEDS WIRING |
| Service areas list | List | `gc_contact_map_areas` | NEEDS WIRING |
| Map embed | iframe | `gc_contact_map_embed` | NEEDS WIRING |
| **FAQs** | | | |
| FAQ headline | H2 | `gc_contact_faq_headline` | NEEDS WIRING |
| FAQ subtext | Body | `gc_contact_faq_subtext` | NEEDS WIRING |
| FAQ items | Accordion | FAQ CPT with `faq_group` = "contact" | NEEDS WIRING |
| **CTA** | | | |
| CTA headline | H2 | `gc_contact_cta_headline` | NEEDS WIRING |
| CTA body | Body | `gc_contact_cta_body` | NEEDS WIRING |
| CTA button | Button | `gc_contact_cta_button_label` | NEEDS WIRING |

### Field Binding Specification

All fields exist in `group_gc_contact_fields`. Reference the ACF registration for exact keys:

| Widget | Field Key | Type |
|--------|-----------|------|
| Hero headline | `gc_contact_hero_headline` | Text |
| Hero subline | `gc_contact_hero_subline` | Textarea |
| Hero image | `gc_contact_hero_image` | Image |
| Intro headline | `gc_contact_intro_headline` | Text |
| Intro text | `gc_contact_intro` | Textarea |
| Phone | `gc_contact_phone` | Text |
| Email | `gc_contact_email` | Email |
| Address 1 | `gc_contact_address_line1` | Text |
| Address 2 | `gc_contact_address_line2` | Text |
| Hours | `gc_contact_hours` | Text |
| Service area | `gc_contact_service_area_text` | Text |
| Form headline | `gc_contact_form_headline` | Text |
| Form subtext | `gc_contact_form_subtext` | Textarea |
| Form shortcode | `gc_contact_form_shortcode` | Text |
| Map headline | `gc_contact_map_headline` | Text |
| Map intro | `gc_contact_map_intro` | Textarea |
| Map areas | `gc_contact_map_areas` | Textarea |
| Map embed | `gc_contact_map_embed` | Textarea |
| FAQ headline | `gc_contact_faq_headline` | Text |
| FAQ subtext | `gc_contact_faq_subtext` | Textarea |
| FAQ group | `gc_contact_faq_group` | Taxonomy |
| CTA headline | `gc_contact_cta_headline` | Text |
| CTA body | `gc_contact_cta_body` | Textarea |
| CTA button | `gc_contact_cta_button_label` | Text |

### Site Plan FAQ Content to Seed (Contact Group)

From staging Contact page Common Questions section:
- Investment expectations (no standard price per square foot)
- Service area (Upstate SC + select Western NC)
- Barndominiums (same framing methods)
- HOA and permit handling
- Budget confidence (itemized quotes)
- Land selection support
- Permitting support
- What sets Grander apart

---

## Template Audit: Request an Estimate

### Content Coverage (from Site Plan)

| Site Plan Section | Template Section | ACF Field(s) | Status |
|-------------------|------------------|--------------|--------|
| **Hero** | | | |
| "Request an estimate" | H1 | `gc_estimate_hero_headline` | NEEDS WIRING |
| Subline | Body | `gc_estimate_hero_subline` | NEEDS WIRING |
| Background | BG | `gc_estimate_hero_image` | NEEDS WIRING |
| **Main Section** | | | |
| Section headline | H2 | `gc_estimate_section_headline` | NEEDS WIRING |
| Reassurance copy | Body | `gc_estimate_reassurance_copy` | NEEDS WIRING |
| Promise text | Callout | `gc_estimate_promise` | NEEDS WIRING |
| **Form** | | | |
| Form headline | H2 | `gc_estimate_form_headline` | NEEDS WIRING |
| Form subtext | Body | `gc_estimate_form_subtext` | NEEDS WIRING |
| Form embed | Shortcode | `gc_estimate_form_shortcode` | NEEDS WIRING |
| **FAQs** | | | |
| Enabled toggle | Conditional | `gc_estimate_faq_enabled` | NEEDS WIRING |
| FAQ headline | H2 | `gc_estimate_faq_headline` | NEEDS WIRING |
| FAQ subtext | Body | `gc_estimate_faq_subtext` | NEEDS WIRING |
| FAQ items | Accordion | FAQ CPT with `faq_group` = "estimate" | NEEDS WIRING |
| **CTA** | | | |
| "Prefer to talk?" | H2 | `gc_estimate_cta_headline` | NEEDS WIRING |
| CTA body | Body | `gc_estimate_cta_body` | NEEDS WIRING |
| Phone button | Button | `gc_estimate_cta_phone_label` | NEEDS WIRING |
| Scroll button | Button | `gc_estimate_cta_scroll_label` | NEEDS WIRING |

### Field Binding Specification

All fields exist in `group_gc_estimate_fields`. All are page-level ACF fields.

### Site Plan Content to Seed

**Reassurance Copy:**
> Tell us about your project and we will provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget.

**Promise:**
> Our promise: We will never rush you into a decision. Building a custom home or outdoor living space is a significant investment, and you deserve a partner who respects your timeline and priorities.

---

## Template Audit: Search Results

### Content Coverage

| Element | Template Section | Source | Status |
|---------|------------------|--------|--------|
| Search title | H1 | "Search results for: {query}" | IMPLEMENTED |
| Results count | Meta | "{count} results found" | IMPLEMENTED |
| Search form | Input | WP search | IMPLEMENTED |
| Result cards | Grid | WP search query | IMPLEMENTED |
| No results | Message | Conditional | IMPLEMENTED |
| Pagination | Nav | WP pagination | IMPLEMENTED |

### Visual Alignment Notes
- Page background: Warm-bg (#f5f3f0)
- Card styling: Same as blog cards (3px gold top border)
- Content type badge: Different colors per type (Post=gold, Page=brown, Project=deep brown)
- Search input: Gold focus state

---

## Template Audit: 404 Page

### Content Coverage (from Site Plan)

| Element | Template Section | Status |
|---------|------------------|--------|
| 404 number | Decorative | IMPLEMENTED |
| "Page not found" | H1 | IMPLEMENTED |
| Message text | Body | IMPLEMENTED |
| **Back button** | Button | **CRITICAL - JS history fallback** |
| Home link | Link | IMPLEMENTED |
| Quick links | Grid | IMPLEMENTED |
| Search form | Input | IMPLEMENTED |

### Technical Requirements
- Back button **MUST** use JavaScript history with fallback
- `onclick="if(history.length > 1 && document.referrer) { history.back(); return false; }"`
- grander-core.js includes this handler

---

## Global Consistency Checklist

### Typography Verification

| Element | Spec | Verify All Templates |
|---------|------|---------------------|
| H1 | Libre Baskerville, 64px, 700 | Check all heroes |
| H2 | Libre Baskerville, 48px, 700 | Check all sections |
| Body | Corbel, 18px, 400 | Check all body text |
| Button | Corbel, 14px, 700, uppercase | Check all buttons |

### Card Component Usage

| Card Type | Used In | Styling Verified |
|-----------|---------|------------------|
| Blog post card | Archive, Search | Match TSX |
| Project card | Gallery, Services | Match TSX |
| Service card | Home, Services Landing | Match TSX |
| Team member card | Team | Match TSX |
| Testimonial card | Home, Team | Match TSX |

### Button Consistency

| Button Type | Primary | Secondary |
|-------------|---------|-----------|
| Background | #4c2a19 | transparent |
| Text | white | #4c2a19 |
| Border | none | 1px #e8dfd5 |
| Hover BG | #b08d66 | #f5f3f0 |
| All buttons | uppercase, 1px letter-spacing | Same |

### Section Spacing

| Section | Desktop Padding | Mobile Padding |
|---------|-----------------|----------------|
| Hero | 80px / 60px | 60px / 40px |
| Content | 80px / 80px | 60px / 60px |
| CTA | 100px / 100px | 60px / 60px |

---

## Launch Readiness Checklist

### Elementor Implementation Tasks

- [ ] Wire all ACF dynamic tags in Header template
- [ ] Wire all ACF dynamic tags in Footer template
- [ ] Wire Home page hero and all sections to ACF fields
- [ ] Wire About page all sections to ACF fields
- [ ] Wire Team page all sections to ACF fields
- [ ] Wire Build Process page to ACF fields
- [ ] Build Performance page hotspot implementation
- [ ] Wire Services Landing page to ACF fields
- [ ] Wire Service Detail template to ACF fields (applies to 4 pages)
- [ ] Wire Gallery page and project grid
- [ ] Wire Contact page all sections to ACF fields
- [ ] Wire Estimate page all sections to ACF fields
- [ ] Wire Blog Archive hero to ACF fields
- [ ] Wire Blog Single post template
- [ ] Verify Search Results template styling
- [ ] Verify 404 back button functionality

### ACF Content Population Tasks

- [ ] Populate Global Options (phone, email, social, trust logos)
- [ ] Populate Home page ACF fields
- [ ] Populate About page ACF fields (including values repeater)
- [ ] Populate Team page ACF fields (including team members repeater)
- [ ] Populate Build Process page ACF fields (including 11 steps)
- [ ] Populate Performance page ACF fields (benefits, practices)
- [ ] Populate Services Landing page ACF fields
- [ ] Populate 4 Service pages ACF fields
- [ ] Populate Gallery page ACF fields
- [ ] Populate Contact page ACF fields
- [ ] Populate Estimate page ACF fields
- [ ] Populate Blog page ACF fields

### CPT Content Tasks

- [ ] Create service_category taxonomy terms (4 terms)
- [ ] Create faq_group taxonomy terms (~8 terms)
- [ ] Create project_tag taxonomy terms (as needed)
- [ ] Create Project CPT entries (8+ from Site Plan)
- [ ] Create Testimonial CPT entries (4+ from Site Plan)
- [ ] Create FAQ CPT entries (20+ from Site Plan)

### Visual QA Tasks

- [ ] Test all pages at desktop (1280px+)
- [ ] Test all pages at tablet (768-1024px)
- [ ] Test all pages at mobile (<768px)
- [ ] Verify card hover states work
- [ ] Verify button hover states work
- [ ] Verify mobile floating phone icon appears
- [ ] Verify estimate lightbox opens/closes
- [ ] Verify FAQ accordions expand/collapse
- [ ] Verify project gallery lightbox works
- [ ] Clear all caches and retest

---

## Appendix: ACF Field Groups Summary

| Field Group | Key | Location | Fields Count |
|-------------|-----|----------|--------------|
| Global Options | `group_gc_global_options` | Options page | 20+ |
| Home Page | `group_gc_home_fields` | Home page | ~10 |
| About Page | `group_gc_about_fields` | About page | ~15 |
| Team Page | `group_gc_team_fields` | Team page | ~15 |
| Process Page | `group_gc_process_fields` | Build Process | ~8 |
| Performance Page | `group_gc_performance_fields` | Performance | ~10 |
| Services Landing | `group_gc_services_landing` | Services | ~8 |
| Service Detail | `group_gc_service_fields` | Service pages | ~15 |
| Gallery Page | `group_gc_gallery_fields` | Gallery | ~10 |
| Blog Archive | `group_gc_blog_fields` | Blog page | ~5 |
| Blog Post | `group_gc_post_fields` | Posts | ~6 |
| Contact Page | `group_gc_contact_fields` | Contact | ~20 |
| Estimate Page | `group_gc_estimate_fields` | Estimate | ~15 |
| Project CPT | `group_gc_project_fields` | Projects | ~8 |
| Testimonial CPT | `group_gc_testimonial_fields` | Testimonials | ~8 |
| FAQ CPT | `group_gc_faq_fields` | FAQs | ~4 |

---

## Conclusion

This audit provides complete implementation specifications for all Grander Construction templates. Each template has:

1. **Content Coverage** - Mapping Site Plan content to template sections
2. **Field Binding Specification** - Exact ACF field keys for Elementor dynamic tags
3. **Visual Alignment Notes** - Reference to TSX visual system
4. **Technical Requirements** - Elementor widgets, responsive rules, JS hooks

The templates are structurally complete on staging. Primary remaining work is:
1. Wiring ACF dynamic tags in Elementor
2. Populating ACF field content
3. Creating CPT entries
4. Visual QA at all breakpoints

---

*Report generated by Claude Code*
*References: CLAUDE.md, blog_preview.tsx, grander-build-process.tsx, class-grander-acf.php*
