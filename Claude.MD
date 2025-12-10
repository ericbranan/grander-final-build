# Claude.MD for Grander Construction website rebuild

Version: 2025-12-08 (updated with confirmed decisions)
Status: Active working document

This is the single source of truth for the Grander Construction website upgrade. It consolidates all prior planning documents into one reference that Claude and Angie can use without cross referencing multiple files.

---

## Confirmed decisions summary

These decisions were confirmed and should not be revisited:

| Decision | Choice | Rationale |
|----------|--------|-----------|
| Testimonials storage | CPT (not options repeater) | REST seeding, service_category filtering, reuse across pages |
| Team bios | Claude drafts 60 to 90 word bios from magazine | Photos uploaded by client, Micah confirmed, others may be placeholders |
| Estimate form plugin | Gravity Forms | Shortcode stored in ACF for easy swapping |
| Events module | Build but disable for launch | Feature flag approach, gc_events_enabled defaults to false |
| Social feed | Static icons only for launch | Embedded feed via Smash Balloon can be added post launch |

---

## 1. Project summary and goals

### What we are building

An upgraded Grander Construction website that preserves the existing staging wireframe while adding structured ACF data, REST compatible content systems, and reusable template blocks.

### Primary goals

1. Preserve the existing staging templates and wireframe exactly as built
2. Integrate ACF Pro for dynamic content across all key sections
3. Make all content REST API compatible for scripted population
4. Build swap friendly ACF integrated template blocks for recurring sections
5. Maintain Elementor as the source of truth for all markup and layout

### Brand positioning

Grandeur by Design. Built with Purpose.

High end but approachable, craftsmanship forward, and positioned as the local authority for custom homes and outdoor living in Upstate South Carolina. The brand emphasizes Midwestern building standards, proven building science, integrity, faith, and genuine care for families.

---

## 2. What already exists on staging and how we will upgrade it

### Existing assets to preserve

The staging site has a working wireframe with the following structure already in place:

- Header and navigation layout
- Home page structure
- Services landing and individual service pages
- About, Team, Gallery layouts
- Contact page with a detailed FAQ section
- Blog structure titled The Blueprint
- Request an estimate page
- 404 page with back button functionality

### Content to preserve from staging

The Contact page FAQ section is the strongest existing content asset. It includes specific, brand appropriate answers covering:

- Investment expectations with no standard price per square foot
- Service area covering Upstate SC plus select Western NC
- Barndominiums built with the same framing methods
- HOA and permit handling by the in house design team
- Budget confidence through itemized quotes
- Land selection support through realtor partners
- Permitting support
- What sets Grander apart

This FAQ content should become the canonical seed for the global FAQ system.

### Upgrade approach

Do not replace templates. Instead follow this process for each section:

1. Duplicate the existing Elementor section
2. Replace static text with ACF dynamic tags
3. Add stable class hooks using the gc prefix
4. Save as a new template with ACF integrated naming
5. Swap the new block into the page

This gives controlled modernization without regression risk.

---

## 3. Architecture decisions

### What stays in Elementor

- Header template markup and layout
- Footer template markup and layout
- Home page layout
- Services template layout
- Team page layout
- Gallery page layout
- Blog archive and single post layout
- Contact page layout
- All section level templates and reusable blocks

Elementor owns all markup, placement, and visual design. Minor layout changes should never require plugin updates.

### What lives in the plugin

Plugin name: grander-core

The plugin handles:

- Custom post type registration
- Taxonomy registration
- ACF field group registration and loading
- REST API exposure for all CPTs, taxonomies, and ACF groups
- Atomic shortcodes only where they reduce repeated setup
- Lightweight CSS targeting stable class hooks
- Lightweight JS for enhancement behaviors only
- Optional custom REST endpoint for ACF options

The plugin does not:

- Hardcode full page layouts
- Render complete header or footer markup
- Generate complex HTML structures that belong in Elementor

---

## 4. Grander Core plugin scope

### Custom post types

| CPT slug | Label | REST enabled | Archive |
|----------|-------|--------------|---------|
| project | Projects | yes | yes |
| testimonial | Testimonials | yes | no |
| faq | FAQs | yes | no |
| event | Events | yes | no |

All CPTs support title, editor, excerpt, and thumbnail.

### Taxonomies

| Taxonomy slug | Label | Hierarchical | REST enabled | Attached to |
|---------------|-------|--------------|--------------|-------------|
| service_category | Service categories | yes | yes | project, faq |
| project_tag | Project tags | no | yes | project |
| faq_group | FAQ groups | yes | yes | faq |

### ACF field groups

The plugin registers these field groups with REST exposure enabled:

1. Global options (gc_options)
2. Page hero fields (gc_page_hero)
3. Home page fields (gc_home)
4. Service page fields (gc_service)
5. Build process fields (gc_process)
6. Team page fields (gc_team)
7. Gallery page fields (gc_gallery)
8. Contact page fields (gc_contact)
9. Estimate page fields (gc_estimate)
10. Project CPT fields (gc_project)
11. FAQ CPT fields (gc_faq)
12. Testimonial CPT fields (gc_testimonial)
13. Event CPT fields (gc_event)

### REST exposure rules

Every ACF field group must have show_in_rest enabled at the group level.

Every CPT and taxonomy must have show_in_rest set to true in registration.

Standard endpoints:
- /wp-json/wp/v2/project
- /wp-json/wp/v2/testimonial
- /wp-json/wp/v2/faq
- /wp-json/wp/v2/event
- /wp-json/wp/v2/service_category
- /wp-json/wp/v2/project_tag
- /wp-json/wp/v2/faq_group

Optional custom endpoint:
- /wp-json/grander/v1/options

### Atomic shortcodes

Only these shortcodes are needed to reduce repeated setup:

| Shortcode | Purpose |
|-----------|---------|
| [gc_zigzag_divider] | SVG zigzag pattern divider |
| [gc_service_area] | Service area microline from options |
| [gc_announcement_bar] | Conditional announcement bar |
| [gc_trust_bar] | Trust bar repeater output |
| [gc_events_strip] | Upcoming events output |

Each shortcode outputs minimal semantic HTML with stable class hooks. Styling lives in Elementor or the plugin CSS file.

### CSS and JS enhancement approach

The plugin enqueues:

- grander-core.css for minimal utility styles and shortcode output styling
- grander-core.js for enhancement behaviors only

CSS targets stable class hooks like:
- .gc-testimonials-v1
- .gc-faq-accordion-v1
- .gc-trust-bar
- .gc-announcement-bar
- .gc-events-strip

JS handles:
- Mobile call icon visibility toggle at 768px breakpoint
- Accordion toggle behavior for FAQ blocks if needed
- Any sticky header enhancements beyond Elementor defaults

No layout CSS. No component rendering in JS.

---

## 5. ACF field naming and schemas

The ACF field map CSV is the authoritative source for all field names. All fields use the gc_ prefix.

### Global options fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_announcement_enabled | true_false | Toggle announcement bar |
| gc_announcement_message | textarea | Sentence case |
| gc_announcement_button_label | text | Optional |
| gc_announcement_button_url | url | Optional |
| gc_announcement_style | select | info, highlight, urgent |
| gc_service_area_enabled | true_false | Toggle microline |
| gc_service_area_text | text | Default: Proudly serving the Upstate of South Carolina with custom homes and outdoor living. |
| gc_phone_number | text | Used for header and mobile icon |
| gc_header_estimate_label | text | Default: Request an estimate |
| gc_header_estimate_mode | select | lightbox, link |
| gc_header_estimate_url | url | Used if mode is link |
| gc_footer_logo_white | image | SVG or PNG |
| gc_footer_hba_logo | image | Home Builders Association |
| gc_footer_hba_url | url | |
| gc_footer_bbb_logo | image | Better Business Bureau |
| gc_footer_bbb_url | url | |
| gc_social_instagram_url | url | |
| gc_social_facebook_url | url | |

### Social feed decision

**For launch, keep social presence simple.** Use static social icons that link to Facebook and Instagram in the header or footer. Do not implement an embedded feed for launch.

The social feed module can be added later using a plugin like Smash Balloon, pulling from Instagram only. This is not required for launch.

### Trust bar fields (options repeater)

| Field name | Type | Notes |
|------------|------|-------|
| gc_trust_items | repeater | Max 5 items |
| gc_trust_items__logo | image | Subfield |
| gc_trust_items__label | text | Subfield |
| gc_trust_items__url | url | Subfield, optional |
| gc_trust_items__order | number | Subfield, optional |

### Testimonials storage decision

**Use Testimonials CPT for launch.** Do not use an options repeater for testimonials.

Rationale:
- REST plan assumes CPTs for seeding and API management
- Testimonials reuse across home, services, team, and estimate pages with optional service_category filtering
- Admin experience remains simple: standard Testimonials list in sidebar with ACF fields

### Events fields (options repeater)

| Field name | Type | Notes |
|------------|------|-------|
| gc_events_enabled | true_false | Toggle events strip, default false |
| gc_events | repeater | |
| gc_events__title | text | Subfield |
| gc_events__short_summary | textarea | Subfield |
| gc_events__start_date | date_picker | Subfield |
| gc_events__end_date | date_picker | Subfield, optional |
| gc_events__location | text | Subfield |
| gc_events__button_label | text | Subfield, optional |
| gc_events__button_url | url | Subfield, optional |

### Events module decision

**Events strip is not a launch requirement.** Build the module and ACF fields as described, but leave gc_events_enabled set to false by default. The module can be empty and disabled for launch. Populate it later when home shows or similar events are scheduled.

Treat events as a feature flag: fully wired, but disabled by default across the site.

### Featured projects fields (options)

| Field name | Type | Notes |
|------------|------|-------|
| gc_featured_projects_enabled | true_false | |
| gc_featured_projects | relationship | Relationship to Projects CPT |

### Page hero fields (all pages)

| Field name | Type | Notes |
|------------|------|-------|
| gc_hero_headline | text | |
| gc_hero_subline | textarea | |
| gc_hero_background_image | image | |
| gc_hero_nav_variant | select | light, dark |
| gc_trust_bar_enabled_on_page | true_false | Per page toggle |

### Home page fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_home_expert_offerings_intro | textarea | |
| gc_home_performance_teaser_headline | text | |
| gc_home_performance_teaser_body | textarea | |
| gc_home_testimonial_slider_variant | select | v1, v2 |

### Service page fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_service_overview | textarea | 120 to 180 words |
| gc_service_jump_links_enabled | true_false | |
| gc_service_featured_projects | relationship | Override global picker |
| gc_service_portfolio_sections | repeater | Newest first |
| gc_service_portfolio_sections__title | text | Subfield |
| gc_service_portfolio_sections__location | text | Subfield, optional |
| gc_service_portfolio_sections__summary | textarea | Subfield |
| gc_service_portfolio_sections__has_design_image | true_false | Subfield |
| gc_service_portfolio_sections__design_image | image | Subfield, conditional |
| gc_service_portfolio_sections__gallery | gallery | Subfield |
| gc_service_mid_cta_headline | text | |
| gc_service_mid_cta_body | textarea | |
| gc_service_faq_groups | taxonomy | faq_group selection |
| gc_service_estimate_cta_label | text | Default: Request an estimate |

### Build process page fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_process_intro | textarea | |
| gc_process_steps | repeater | |
| gc_process_steps__label | text | Subfield |
| gc_process_steps__short_desc | textarea | Subfield |
| gc_process_faq_groups | taxonomy | |

### Team page fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_team_intro | textarea | |
| gc_team_members | repeater | |
| gc_team_members__name | text | Subfield |
| gc_team_members__title | text | Subfield |
| gc_team_members__bio | textarea | Subfield |
| gc_team_members__photo | image | Subfield |
| gc_team_members__highlight_owner | true_false | Subfield |
| gc_team_mission | textarea | |
| gc_team_promise | textarea | |

### Gallery page fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_gallery_intro | textarea | |
| gc_gallery_filter_enabled | true_false | |

### Contact page fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_contact_intro | textarea | |
| gc_contact_map_embed | oembed | |
| gc_contact_faq_groups | taxonomy | |

### Estimate page fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_estimate_reassurance_copy | textarea | Used in page and lightbox |
| gc_estimate_form_shortcode | text | Gravity Forms shortcode |

### Form plugin decision

**Use Gravity Forms** for the Request an estimate form.

The form will be embedded via a Gravity Forms shortcode and wired into the global lightbox and inline form container. Store the shortcode in gc_estimate_form_shortcode ACF option field so forms can be swapped without editing templates.

### Project CPT fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_project_service_category | taxonomy | service_category |
| gc_project_tags | taxonomy | project_tag |
| gc_project_location_city | text | |
| gc_project_location_state | text | |
| gc_project_short_summary | textarea | |
| gc_project_has_design_image | true_false | |
| gc_project_design_image | image | |
| gc_project_gallery | gallery | |
| gc_project_featured_on_home | true_false | |

### FAQ CPT fields

| Field name | Type | Notes |
|------------|------|-------|
| gc_faq_answer | textarea | Title is the question |
| gc_faq_group | taxonomy | faq_group |

### Testimonial CPT fields (required for launch)

| Field name | Type | Notes |
|------------|------|-------|
| gc_testimonial_quote | textarea | Required |
| gc_testimonial_first_name | text | Required |
| gc_testimonial_last_initial | text | Required |
| gc_testimonial_city | text | Optional |
| gc_testimonial_project_type | text | Optional, for context |
| gc_testimonial_service_category | taxonomy | Optional, for filtering |
| gc_testimonial_source | select | Google, Magazine, Referral |

---

## 6. ACF integrated template library

### Naming convention

All ACF integrated template sections use this pattern:

ACF integrated [block type] [version number]

Examples:
- ACF integrated testimonial slider 1
- ACF integrated testimonial slider 2
- ACF integrated FAQ accordion 1
- ACF integrated trust bar 1
- ACF integrated featured projects 1
- ACF integrated events strip 1
- ACF integrated service cards 1
- ACF integrated portfolio block 1
- ACF integrated estimate CTA block 1

### Class hook standards

All blocks get a class hook following this pattern:

gc-[module-name]-v[number]

Examples:
- gc-testimonials-v1
- gc-faq-accordion-v1
- gc-trust-bar-v1
- gc-featured-projects-v1
- gc-events-strip-v1
- gc-service-cards-v1
- gc-portfolio-block-v1
- gc-estimate-cta-v1

### Blocks to create

| Block name | Used on | ACF source |
|------------|---------|------------|
| ACF integrated testimonial slider 1 | Home, Team, Services | testimonial CPT query |
| ACF integrated FAQ accordion 1 | Build process, Services, Contact, Team | faq CPT filtered by faq_group |
| ACF integrated trust bar 1 | Home, Services landing, Contact | gc_trust_items options repeater |
| ACF integrated featured projects 1 | Home, Services | gc_featured_projects relationship |
| ACF integrated events strip 1 | Home, Contact | gc_events options repeater |
| ACF integrated service cards 1 | Home | service_category taxonomy |
| ACF integrated portfolio block 1 | Services | gc_service_portfolio_sections repeater |
| ACF integrated estimate CTA block 1 | Services, Build process | gc_service_mid_cta fields |
| ACF integrated team grid 1 | Team | gc_team_members repeater |
| ACF integrated process steps 1 | Build process | gc_process_steps repeater |

---

## 7. Header and footer plan

### Header structure

Build header markup in Elementor.

Two layer system:
1. Sticky white stripe containing logo, search icon, Request an estimate button, Call now button
2. Transparent overlay navigation positioned over hero images

### Header behaviors

- The white stripe must remain sticky as a single unit
- Overlay text color uses two variants controlled by gc_hero_nav_variant field (light or dark)
- Per page toggle determines which variant displays

### Header fixes needed

- Fix color switching over hero imagery
- Ensure sticky behavior works consistently

### Mobile header rules

These rules are non negotiable:

1. Remove Call now text button from top bar on mobile (under 768px)
2. Add floating phone icon fixed to bottom right on mobile only
3. Hamburger menu must reveal full menu hierarchy, not just top level items
4. Keep Request an estimate accessible in the hamburger menu

Implementation: Plugin CSS handles the 768px breakpoint hide show. Plugin JS not required unless Elementor responsive settings are insufficient.

### Footer structure

Build footer markup in Elementor.

Visual requirements:
- Dark background
- Zigzag pattern top border consistent with live site

Content requirements:
- Grander white logo (from gc_footer_logo_white)
- Home Builders Association logo with link (from gc_footer_hba_logo and gc_footer_hba_url)
- Better Business Bureau logo with link (from gc_footer_bbb_logo and gc_footer_bbb_url)
- Social icons (from gc_social_instagram_url and gc_social_facebook_url)
- Address, phone, email
- Service area microline (from gc_service_area_text) optional
- Quick links

### Zigzag divider implementation

Use [gc_zigzag_divider] shortcode for the SVG pattern, or embed directly as an Elementor image widget. Shortcode preferred for consistency.

---

## 8. Services template plan

### Service pages

The four service pages share one Elementor template:

- Custom homes
- Outdoor spaces
- Pool houses, garages, and ADUs
- Sunrooms and additions

### Template sections in order

1. Hero with service title and background image
2. Jump links module (if gc_service_jump_links_enabled is true)
3. Service overview text (from gc_service_overview)
4. Featured projects row (from gc_service_featured_projects or global fallback)
5. Project portfolio repeater (from gc_service_portfolio_sections)
   - Each section includes optional design image toggle
   - Gallery display
6. Mid page CTA block (from gc_service_mid_cta_headline and gc_service_mid_cta_body)
   - Button opens estimate lightbox
7. Category specific FAQs (from gc_service_faq_groups)

### Jump links anchors

- #overview
- #portfolio
- #process (if present)
- #faq
- #estimate

The estimate anchor scrolls to the CTA block which triggers the lightbox.

### Portfolio repeater with design image toggle

Each portfolio section has these fields:
- gc_service_portfolio_sections__title
- gc_service_portfolio_sections__location
- gc_service_portfolio_sections__summary
- gc_service_portfolio_sections__has_design_image (toggle)
- gc_service_portfolio_sections__design_image (shows if toggle is true)
- gc_service_portfolio_sections__gallery

When the toggle is true, display the design image alongside or before the gallery. When false, display gallery only.

### CTA relationship to estimate lightbox

The mid page CTA block contains a button. That button triggers the global estimate lightbox. The button label comes from gc_service_estimate_cta_label with a default of Request an estimate.

---

## 9. Page by page content requirements

### Global content rules

- Avoid hyphens in copy (use spaces or rewrite)
- Use sentence case for all headings
- Keep brand tone close to the magazine and brochure sources
- Do not delete existing staging content
- Add new content above older content when relevant

### Home page

#### Hero

Headline: Experience the art of building with grandeur

Animation note: Reveal grandeur first, animate the R shift, then reveal the U for clarity.

Supporting line: Custom homes and outdoor living spaces built with purpose across Upstate South Carolina.

Primary CTAs:
- Request an estimate
- View projects

#### Expert offerings intro

Grander Construction brings custom homes and outdoor living spaces together under one design driven approach. From full scale builds to targeted additions, our team pairs refined craftsmanship with practical building science to create spaces that fit your lifestyle, elevate daily living, and stand up to the demands of time and climate.

#### Service blocks

Four blocks with image, title, summary, and View more button:

Custom homes: Thoughtfully designed homes that balance timeless style, modern comfort, and high performance details.

Outdoor spaces: Porches, patios, coverings, decks, and pavilions that extend how you live outside with year round comfort.

Pool houses, garages, and ADUs: Multi purpose structures that add function, storage, and flexible living space without compromising aesthetics.

Sunrooms and additions: Light filled expansions that connect your existing home to new possibilities in comfort and layout.

#### Testimonials

Pull from testimonial CPT. Display 5 random on load.

#### Performance building teaser

Headline: Discover the art of custom home building in Upstate South Carolina

Body: Grander Construction believes homes should do more than look beautiful. High performance building brings healthier indoor air, better year round comfort, and lower long term energy costs. By combining advanced methods with durable materials, we build homes that last, protect your investment, and support a healthier way of living.

CTA: Learn about performance building (links to performance building page)

#### Inline estimate form

One inline version for quick access.

### About our company

#### Hero

Headline: Crafted for the way you live

Sub line: A home should reflect the personality of its owner and the life that happens inside it.

#### Micah story section

Founded by Micah Barney, Grander Construction was built on a passion for quality craftsmanship and a desire to bring proven Midwestern standards and building science to the Upstate of South Carolina. With a family background in the trades and a degree in construction management, Micah leads with integrity, faith, and a genuine care for the families the team serves.

Blend this with existing staging copy and live About content.

#### Values

If not already on staging, align to:
- Integrity
- Purpose
- Quality that lasts
- Clear communication
- Craftsmanship with science backed methods

#### Mission

To design and build spaces that embody individuality, purpose, and enduring excellence. Guided by our motto, Grandeur by Design. Built with Purpose, we blend innovative craftsmanship with personalized service to create custom homes and outdoor living spaces that last for generations.

### Build process

#### Hero

Headline: The build process, made clear

#### Process phases

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

#### Short intro

Every project is unique, but our process stays consistent. You will always know what comes next, what decisions are needed, and how your schedule is taking shape.

#### Process FAQs seed

What are the main phases of the Grander build process?
The five core phases are listed above. Exact steps can vary based on project type, complexity, site conditions, and product availability.

How long will my project take?
Expect a realistic timeline from start to finish at the time of your estimate, with clear milestone updates as the project progresses.

When do we finalize design selections?
Most selections are confirmed during the design package stage, with one to three structured revision rounds to keep decisions efficient.

How will communication work during the build?
Grander prioritizes transparent, proactive updates so you always understand progress, next steps, and any adjustments needed.

What happens if we discover an issue mid project?
We address obstacles quickly and fairly, with solutions that protect quality and maintain trust.

### Performance building

#### Hero

Headline: High performance building, tailored for the Upstate

#### Why build smart

We believe homes should do more than look beautiful. High performance building means healthier indoor air, greater comfort year round, and lower energy costs for families. By focusing on advanced methods and durable materials, we create spaces that are built to last while reducing the long term impact on the environment. Our commitment is to deliver homes that bring together craftsmanship, efficiency, and lasting value for generations.

#### Build science practices

Bullets:
- ZIP System envelope across roof and walls
- Energy efficient Windsor aluminum clad windows
- Airtight wall assemblies with no roof penetrations
- Continuous air barrier and high performance insulation

Expanded explanation: Our continuous air barrier with ZIP System sheathing improves energy efficiency and lowers operating costs by reducing air leakage. This approach also protects the structure from long term moisture damage and helps reduce insect and pest intrusion. Paired with high performance insulation strategies, the result is a durable building envelope engineered for comfort, stability, and long term indoor air quality.

CTAs:
- Request an estimate
- View performance focused projects

### Services landing page

#### Hero

Headline: Services

#### Intro paragraph

Grander Construction specializes in creating custom homes and outdoor living spaces designed around the way you live. With a balance of innovative design and skilled craftsmanship, we deliver projects that blend beauty, function, and lasting value.

#### Service category list with jump links

- Custom homes
- Outdoor spaces
- Pool houses, garages, and ADUs
- Sunrooms and additions

### Service page copy blocks

#### Custom homes

From modern farmhouse to refined transitional and contemporary styles, our custom home builds are designed to feel personal, practical, and enduring. We combine architectural detail with thoughtful space planning and performance focused construction so your home is as comfortable as it is beautiful. Our team guides you through design, selections, and scheduling with a clear process that respects your time and investment.

#### Outdoor spaces

Outdoor living should feel like a natural extension of your home. We design and build patios, covered structures, decks, porches, and pavilions that support everyday relaxation and effortless entertaining. With materials and details selected for the Upstate climate, your outdoor space will deliver comfort, durability, and a sense of intentional design.

#### Pool houses, garages, and ADUs

These structures can do far more than store equipment or cars. We build pool houses, garages, and accessory dwelling units that add flexible living space, guest accommodations, home office potential, and thoughtful storage. Each project is designed to complement your existing property while enhancing your lifestyle and long term value.

#### Sunrooms and additions

When you love your location but need more room or more light, a well designed addition makes all the difference. Our sunrooms and home additions are crafted to blend seamlessly with your current architecture while opening up new ways to live. Expect clean detailing, comfortable year round use, and planning that keeps the project efficient and predictable.

### Our team

#### Hero

Headline: Our experts, your vision

#### Intro copy

At Grander Construction, our team is the foundation of everything we build. Each member brings unique expertise and a commitment to quality that lasts. From the office to the job site, we work as one team to deliver results clients can depend on.

#### Team layout rules

- Micah featured as owner and founder in a dedicated row or card
- Remaining four members in a centered grid
- Center alignment on uneven rows
- Use gc_team_members repeater

#### Team members seed list

- Micah Barney, Owner and Founder
- Martti Onermaa, Project Manager
- Will Bondy, Project Superintendent
- Chris Stein, Sales Manager
- Jared Barney, Design Manager

#### Team photos and bios decision

Photos: Client will upload individual headshots for all five team members. Micah headshot confirmed available. Others may use placeholders initially.

Bios: Claude will draft short bios (60 to 90 words each) for all five team members using magazine content and existing about text to match brand tone. Field group is ready with name, title, bio, photo, and highlight_owner boolean.

#### Mission and promise placement

Values and Micah story on About page.
Mission and promise on Team page.

#### Promise line

We promise to lead every build with clarity, craftsmanship, and care, delivering spaces that honor your vision and protect your investment.

### Blog

#### Title

The Blueprint

#### Intro

Practical ideas, project highlights, material insights, and build process guidance for Upstate homeowners.

#### Content tasks

- Restore missing content on existing posts from the live site
- Draft 5 to 6 new posts

#### Suggested new post titles

1. What high performance building means for Upstate homes
2. How to plan a sunroom or addition without disrupting your lifestyle
3. Designing outdoor living spaces that feel integrated
4. Pool houses, garages, and ADUs that add real value
5. Choosing finishes that hold up in the South
6. A clear look at the Grander build process

### Gallery

#### Hero

Subtle textured or line pattern background that stays quiet behind the overlay.

#### Intro copy

A curated look at custom homes and outdoor living spaces built with purpose across the Upstate.

#### Filters

Use service_category and project_tag taxonomies. Add an ACF or taxonomy driven filter UI.

### Contact

#### Hero

Keep header. Add an appropriate background image.

#### Core content

Keep form and call info.

#### Map

Place map under the call now area for visual grounding without interrupting form completion flow.

#### Remove redundant CTA

Remove the extra ready to begin section.

#### FAQs

Use the existing Contact page Common questions section as the canonical seed for the FAQ system.

### Request an estimate

#### Decision

Keep page for SEO and direct navigation. Use global lightbox for primary conversion.

#### Lightbox layout

Two column desktop, stacked mobile.

Left column:
- Headline: Request an estimate
- 2 to 3 sentence reassurance copy
- Small trust bar row

Right column:
- Form embed

#### Reassurance copy

Tell us about your project and we will provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget.

### Search results

Style to match global typography and color system. Add subtle category labels and readable excerpt spacing.

### 404 page

Confirm template assignment. Keep Back button with JS history fallback. Add quick links and search field.

---

## 10. Projects, testimonials, and FAQs

### Projects ordering rule

New magazine projects go first. Older projects remain below.

Within each service category, order by date added descending so newest appears at top.

### Project seed list by category

#### Custom homes

1. Custom farmhouse charm, Fountain Inn
   - Open concept custom farmhouse combining timeless board and batten character with modern comfort and expansive covered patio space.

2. Contemporary barndominium retreat, Spartanburg
   - A rustic meets contemporary home with clean lines, wide porches, and abundant natural light for an open, connected feel.

#### Sunrooms and additions

1. Driftwood estate, Greer
   - Dual additions including a vaulted sunroom and covered patio plus a two stall garage addition that complements the existing home.

2. Bunker Hill sunroom addition, Greer
   - A warm, light filled sunroom with exposed beams and a brick fireplace designed for year round comfort.

#### Outdoor spaces

1. Covered patio grandeur, Simpsonville
   - Brick and vaulted ceiling patio designed for relaxation and entertaining with elevated everyday luxury.

2. Spaulding Farms backyard retreat, Greenville
   - A screen porch with wood burning fireplace built to support poolside living, hosting, and quiet evenings.

#### Pool houses, garages, and ADUs

1. Timber Ridge pool pavilion, Simpsonville
   - A pool house with warm wood accents and built in amenities for seamless outdoor entertaining.

2. Urban ADU guest house, Greenville
   - Compact guest house with front porch, kitchenette, and efficient living design.

### Testimonials seed list

First name, last initial format. Source from magazine:

1. Sallie B: Micah and his team treat construction as a process, not a one time event. They solved issues quickly and fairly and delivered a result we trust.

2. Kim H: Our pool house and storage build was meticulous from day one. The craftsmanship exceeded expectations.

3. David R: Grander delivered a multi level covered patio other contractors could not solve. The carpentry and masonry are outstanding.

4. Ashley M: Clear communication, proactive updates, and a finished space that feels custom in every detail.

Additional testimonials from staging or Google reviews should be added below these. Aim for 10 to 15 total. Display 3 to 5 randomly per page load.

### FAQ groups

Create these faq_group taxonomy terms:

- build-process
- services-general
- custom-homes
- outdoor-spaces
- pool-houses-garages-adus
- sunrooms-additions
- contact
- estimate

### FAQ seed list

#### Build process group

What are the main phases of the Grander build process?
The five core phases are listed above. Exact steps can vary based on project type, complexity, site conditions, and product availability.

How long will my project take?
Expect a realistic timeline from start to finish at the time of your estimate, with clear milestone updates as the project progresses.

When do we finalize design selections?
Most selections are confirmed during the design package stage, with one to three structured revision rounds to keep decisions efficient.

How will communication work during the build?
Grander prioritizes transparent, proactive updates so you always understand progress, next steps, and any adjustments needed.

What happens if we discover an issue mid project?
We address obstacles quickly and fairly, with solutions that protect quality and maintain trust.

#### Contact group (canonical from staging)

Seed from the existing Contact page Common questions section including:
- Investment expectations with no standard price per square foot
- Service area covering Upstate SC plus select Western NC
- Barndominiums built with the same framing methods
- HOA and permit handling by the in house design team
- Budget confidence through itemized quotes
- Land selection support through realtor partners
- Permitting support
- What sets Grander apart

---

## 11. REST seeding plan

### Authentication

Use Application Passwords for the import script. Create an Application Password for a privileged admin user and use basic auth.

### Import order

Follow this sequence to avoid broken relationships:

1. Create or confirm core pages exist
2. Create service_category taxonomy terms
3. Create project_tag taxonomy terms
4. Create faq_group taxonomy terms
5. Upload media (images for projects, team, etc.)
6. Create Project CPT entries with taxonomy and ACF meta
7. Create Testimonial CPT entries with ACF meta
8. Create FAQ CPT entries with faq_group assignments
9. Populate gc_events options repeater (leave disabled for launch)
10. Update page level ACF fields with relationships to Projects, FAQs
11. Update global options (announcement, trust bar, service area, etc.)
12. Create new blog post drafts
13. Backfill missing content on existing blog posts

### JSON payload outline adaptation

The grander_rest_payload_outline_v1.json file provides the skeleton. To use it:

1. Replace placeholder values with real data
2. Use slugs for lookup in your script where possible
3. When creating relationships, first create the target objects, capture their IDs, then update the relationship fields

### Example script logic

```
1. POST /wp-json/wp/v2/service_category for each category
2. Store returned IDs mapped to slugs
3. POST /wp-json/wp/v2/media for each image
4. Store returned media IDs
5. POST /wp-json/wp/v2/project for each project
   - Include service_category array with term IDs
   - Include acf object with field values
   - Include featured_media with media ID
6. Continue with testimonials, FAQs, events
7. POST /wp-json/wp/v2/pages/{id} to update ACF fields
8. POST /wp-json/grander/v1/options for global settings
```

### Data quality rules

- Use slugs as primary lookup keys
- If script finds matching slug, update rather than create
- Keep a mapping JSON file of slug to ID for pages, taxonomies, projects, FAQs, testimonials

### Validation before running import

WordPress:
- Application password created
- Permalinks set
- Caching disabled during import

Plugin:
- All CPTs registered with show_in_rest true
- All taxonomies registered with show_in_rest true

ACF:
- All field groups have Show in REST API enabled
- Field names finalized and match this document

Elementor:
- Templates reference ACF fields correctly
- No hardcoded text where API content should render

---

## 12. Execution plan

### Build order

1. **Claude: Build grander-core plugin**
   - Register CPTs (project, testimonial, faq, event)
   - Register taxonomies (service_category, project_tag, faq_group)
   - Register all ACF field groups from field map
   - Add atomic shortcodes
   - Add minimal CSS file with class hook styles
   - Add minimal JS file for mobile behaviors

2. **Angie: Re-apply Elementor global styles**
   - Confirm global colors are set
   - Confirm typography presets match spec
   - Test on staging

3. **Angie: Update header in Elementor**
   - Add stable class hooks
   - Test sticky behavior
   - Test mobile hide show for Call now button
   - Add floating phone icon on mobile

4. **Angie: Update footer in Elementor**
   - Add zigzag divider
   - Connect footer fields to ACF options
   - Add trust logos

5. **Claude: Generate ACF integrated template sections**
   - Provide Elementor export JSON or detailed build instructions for:
     - ACF integrated testimonial slider 1
     - ACF integrated FAQ accordion 1
     - ACF integrated trust bar 1
     - ACF integrated featured projects 1
     - ACF integrated events strip 1
     - ACF integrated portfolio block 1
     - ACF integrated estimate CTA block 1

6. **Angie: Upgrade Home page**
   - Swap in ACF integrated blocks
   - Connect hero fields
   - Test testimonial display

7. **Angie: Upgrade Services template and four service pages**
   - Apply shared template
   - Connect portfolio repeater
   - Connect FAQ groups
   - Test jump links

8. **Angie: Upgrade About, Team, Build process, Performance building**
   - Connect ACF fields
   - Add missing team members from seed list
   - Ensure process steps display correctly

9. **Angie: Upgrade Gallery**
   - Wire filters to taxonomies
   - Test filter behavior

10. **Angie: Style Search results and validate 404**
    - Match global typography
    - Confirm 404 back button works

11. **Claude: Generate REST import script**
    - Based on payload outline
    - Include error handling and slug based updates

12. **Run REST import**
    - Populate all seed content
    - Validate on staging

13. **Final QA pass**
    - Check all pages
    - Test mobile
    - Test forms
    - Test lightbox

### Who does what summary

**Claude responsibilities:**
- Build grander-core plugin
- Generate ACF field group definitions
- Provide ACF integrated template block specs
- Generate REST import script
- Answer questions about architecture and implementation

**Angie responsibilities:**
- All Elementor template work
- Global styles setup
- Header and footer updates
- Swapping in ACF integrated blocks
- Content population via admin or REST
- Visual QA

---

## 13. Risks and guardrails

### How to avoid regressions

1. Never delete existing staging templates. Always duplicate first.
2. Never overwrite existing content without explicit instruction.
3. Test each ACF integrated block swap on a single page before applying sitewide.
4. Keep the original static version of any section until the ACF version is confirmed working.
5. Run REST imports on staging only until validated.

### What not to change

1. Do not change the overall page structure or wireframe layout
2. Do not remove any existing pages
3. Do not delete existing projects, posts, or media
4. Do not hardcode layouts in the plugin
5. Do not add heavy page transitions or animations
6. Do not change the font families (Baskerville and Corbel)
7. Do not change the overall color palette
8. Do not remove the 404 back button functionality
9. Do not combine the Request an estimate page with Contact (keep both)

### Plugin constraints

The plugin must not:
- Render complete page layouts
- Override Elementor templates
- Include admin page builders
- Require plugin activation for pages to display
- Break the site if deactivated (graceful degradation)

### Content rules

- New magazine content goes above older content
- Never delete older projects, just deprioritize their position
- Keep all staging FAQ content from Contact page
- Avoid hyphens in copy
- Use sentence case headings throughout

---

## Appendix: Typography reference

### Desktop sizes

| Element | Size | Line height |
|---------|------|-------------|
| H1 | 52 to 64px | 1.1 to 1.25 |
| H2 | 40 to 48px | 1.1 to 1.25 |
| H3 | 28 to 32px | 1.1 to 1.25 |
| Body | 17 to 18px | 1.5 to 1.7 |
| Small | 14 to 15px | 1.4 |

### Tablet sizes

| Element | Size |
|---------|------|
| H1 | 40 to 48px |
| H2 | 32 to 36px |
| H3 | 24 to 28px |
| Body | 16 to 17px |

### Mobile sizes

| Element | Size |
|---------|------|
| H1 | 32 to 36px |
| H2 | 26 to 30px |
| H3 | 22 to 24px |
| Body | 16px |

---

## Appendix: Color system structure

Re-establish in Elementor Global Colors with this structure:

1. Primary dark
2. Primary light
3. Accent gold
4. Neutral warm
5. Neutral cool
6. Background light
7. Background dark
8. Border subtle
9. Text primary
10. Text secondary

Map exact hex values from the existing staging palette.

---

End of document.
