# Grander Construction long term master plan v2

This document reflects the updated long term plan for the Grander Construction website build on staging and eventual deployment to live. It is designed to be the single reference for Claude and Angie so the build can progress without rework.

Primary goals

- Preserve the existing staging wireframe and templates you already built.
- Upgrade in place by integrating ACF, CPTs, taxonomies, and REST compatible content structures.
- Keep all layout natively editable in Elementor to avoid plugin rebuilds for minor design changes.
- Use a single core plugin for data, consistency, and advanced behaviors.
- Prepare for a final bulk content population pass via REST.

---

## 1. non negotiable principles

1. Keep the current staging wireframe structure. Update in place without starting over.
2. Elementor owns markup, layout, and placement.
3. The plugin owns data models, ACF schemas, REST compatibility, and small enhancement scripts.
4. Do not hardcode full header, footer, or page layouts in the plugin.
5. Build swap friendly ACF integrated clones of existing recurring blocks.
6. Do not delete existing live content. Add new magazine content at the top of relevant sections and keep older projects.

---

## 2. architecture overview

### 2.1 what stays in Elementor

- Header template
- Footer template
- Home layout
- Services template layout
- Team layout
- Gallery layout
- Blog layout
- Contact layout
- Reusable section templates

These are the editable surfaces.

### 2.2 what lives in the plugin

Plugin working name  
grander core

Responsibilities

- Register CPTs and taxonomies.
- Register and or load ACF field groups and options.
- Enforce show in rest on all relevant objects.
- Provide atomic shortcodes only when helpful.
- Enqueue lightweight CSS and JS that target stable class hooks.
- Optional custom REST endpoint for ACF options if needed later.

Atomic shortcode candidates

- zigzag divider
- trust bar if you want dynamic rendering
- service area microline
- announcement bar
- events strip

---

## 3. upgrade strategy for the existing wireframe

Do not replace templates.

Instead, follow this loop for each recurring block:

1. Duplicate the existing section.
2. Replace static text with dynamic ACF tags.
3. Add stable class hooks.
4. Save as a new Elementor template section with an ACF integrated name.
5. Swap the new block into pages that currently use the legacy version.

This gives you controlled, fast modernization.

---

## 4. ACF integrated template library

Naming convention

- ACF integrated testimonial slider 1
- ACF integrated testimonial slider 2
- ACF integrated FAQ accordion 1
- ACF integrated trust bar 1
- ACF integrated featured projects 1
- ACF integrated events strip 1
- ACF integrated service cards 1
- ACF integrated portfolio block 1
- ACF integrated estimate CTA block 1

Class hook pattern

- gc module name version  
Example  
gc testimonials v1

---

## 5. global design system

Fonts  
Adobe Typekit

- Baskerville for headings
- Corbel for body and UI

Recommended sizes

- H1 56px desktop, 40px tablet, 32px mobile
- H2 40px, 32px, 26px
- H3 30px, 26px, 22px
- Body 18px
- Body large 20px
- Small text 16px
- Meta 14px
- Button text 16px semibold

Spacing

- Section padding 90 to 110px desktop
- 70 to 90px tablet
- 50 to 70px mobile

Motion

- Remove legacy page transitions.
- Use only micro interactions.
- Keep animations subtle and fast.

---

## 6. global modules to implement

### 6.1 sitewide announcement bar

- ACF options controlled
- Sits above the header
- Optional dates and button

### 6.2 trust bar

- ACF options controlled
- Appears on Home and Services template
- 4 to 5 items max

### 6.3 featured projects

- Relationship based if using a Projects CPT
- Home placement under services overview or above trust bar

### 6.4 service area microline

Global default copy  
Proudly serving the Upstate of South Carolina with custom homes and outdoor living.

- Use ACF options
- Enable per location toggles

### 6.5 social feed

- Prefer a single source feed
- Link to both Instagram and Facebook

### 6.6 events strip

- ACF options repeater or Events CPT
- Small display on Home and optional Contact

### 6.7 structured FAQ system

Goal  
One source of truth with page level selection.

Preferred model for long term automation  
FAQ CPT plus FAQ group taxonomy.

Acceptable lighter model  
Global FAQ options with a custom options REST endpoint.

### 6.8 estimate lightbox system

Primary conversion path

- Keep the Request an estimate page for SEO and fallback.
- Use a reusable Estimate form container.
- Trigger the lightbox from header buttons and page CTAs.

---

## 7. header plan

Build header markup in Elementor.

Structure

1. Sticky white stripe  
   - Logo  
   - Search  
   - Request an estimate  
   - Call now

2. Hero overlay navigation  
   - Menu widget positioned over hero

Behavior and fixes

- The white stripe remains sticky as a single unit.
- Overlay text color uses two variants with a per page toggle.
- Remove the Call now text button from the top bar on mobile.

Mobile conversion pattern

- Add a floating phone icon fixed bottom right on mobile only.
- Hide header Call now button under 768px.
- Ensure the hamburger menu reveals full menu hierarchy.

Implementation method

- Stable CSS classes applied in Elementor.
- Plugin CSS and JS enhance sticky state, mobile hide show, and submenu toggles if needed.

---

## 8. footer plan

Build footer markup in Elementor.

Visual requirements

- Dark background
- Zigzag top border matching the live site style

Content requirements

- Grander white logo
- Home Builders Association logo linked out
- Better Business Bureau logo linked out
- Social icons
- Quick links
- Service area microline optional
- Events micro block optional

Divider implementation

- Use an SVG divider.
- If helpful, insert with a shortcode so it remains easy to place.

---

## 9. services template plan

The four service pages share one template.

Service pages

- Custom homes
- Outdoor spaces
- Pool houses, garages, and ADUs
- Sunrooms and additions

Template sections

1. Hero with service title and overview
2. Jump links module
3. Service scope text
4. Featured projects row
5. Project portfolio repeater
   - Before design image optional
   - Toggle for gallery only
6. Micro CTA after portfolio
   - Button opens estimate lightbox
7. Category specific FAQs

Jump links anchors

- overview
- portfolio
- process if present
- faq
- estimate

The Request an estimate jump link scrolls to the estimate CTA block which contains the lightbox trigger button.

---

## 10. page by page sections

This list assumes the existing wireframe layout and focuses on what must be ACF integrated.

### 10.1 home

- Hero with refined brand animation emphasis
- Expert offerings intro copy refresh
- Four service cards block
- ACF integrated testimonial slider
- Performance building teaser with CTA
- Inline estimate form
- Featured projects
- Social feed
- Events strip

### 10.2 about our company

- Strong hero and intro
- Micah story
- Company values
- CTA to process or team

### 10.3 build process

- Hero
- Five phase visual overview
- Process specific FAQs
- CTA

### 10.4 performance building

- Hero
- Why build smart
- Three pillar benefits
- Build science practices graphic
- FAQs
- CTA

### 10.5 our team

- Personal hero title
- Team intro
- Owner highlight layout
- Mission and promise cards
- Testimonials and FAQs
- Behind the scenes gallery

### 10.6 gallery

- Hero with subtle background
- Filterable, taxonomy driven grid

### 10.7 blog

- The Blueprint branding
- Restore missing content from older posts
- Add 5 to 6 new posts ready for scheduling

### 10.8 contact

- Hero
- Form and call block
- Map under call block
- Canonical Common questions FAQ set

### 10.9 request an estimate page

- Mirrors lightbox content
- Styled with global buttons and form styles

---

## 11. data model for REST ready content

### 11.1 custom post types

Recommended

- Projects
- Testimonials
- Events
- FAQs

All must have show in rest enabled.

### 11.2 taxonomies

- Service category
- Project tags
- FAQ group if using FAQ CPT

All must have show in rest enabled.

### 11.3 ACF group strategy

ACF groups must be REST exposed.

Core groups

- Global options
  - announcement bar
  - trust bar
  - service area microline
  - social settings
  - events settings
- Services template fields
- Projects fields
- Testimonials fields
- FAQ fields or page selectors
- Team fields
- Gallery filter support if needed

---

## 12. projects ordering and placement

Rule

- Add new magazine featured projects at the top of each relevant service portfolio.
- Keep older projects below.

Map

- Custom homes  
  Custom Farmhouse Charm  
  Contemporary Barndominium Retreat

- Sunrooms and additions  
  Driftwood Estate  
  Bunker Hill Sunroom Addition

- Pool houses, garages, and ADUs  
  Urban ADU Guest House  
  Timber Ridge Pool Pavilion

- Outdoor spaces  
  Spaulding Farms Backyard Retreat  
  Covered Patio Grandeur

---

## 13. testimonial seed plan

Short term

- Seed 10 to 15 testimonials into the global ACF structure.
- Use first name and last initial format.

Display

- Home, Team, and key Services pages pull 3 to 5 randomly.

---

## 14. blog content plan

Immediate fixes

- Restore missing body content from original posts.

New posts to draft and schedule

1. What high performance building really means for Upstate homeowners
2. Designing outdoor spaces that work in every season
3. How to plan a custom home budget without losing your mind
4. Sunrooms vs additions which fits your lifestyle
5. Garage, pool house, or ADU choosing the right extra space
6. The Grander build process from first call to final walk through

---

## 15. search and 404 polish

Search results

- Build a dedicated Search results template in Elementor.
- Add strong no results guidance and an estimate lightbox trigger.

404 page

- Confirm display conditions in Elementor Theme Builder.
- Preserve the JavaScript back button behavior.
- Add quick links and search field.

---

## 16. recommended build order

1. Keep wireframe templates as baseline.
2. Claude builds grander core plugin for CPTs, taxonomies, ACF, and REST.
3. Re apply Elementor global colors and fonts.
4. Update header and footer inside Elementor with stable class hooks.
5. Build the ACF integrated template section library.
6. Upgrade Home and Services first.
7. Upgrade About, Team, Build process, Performance building.
8. Upgrade Gallery filters.
9. Style Search results and validate 404.
10. Final content pass and cleanup.
11. Run the REST bulk population script.

---

## 17. constraints for Claude

When generating code or instructions, follow these rules

- Do not generate a plugin that hardcodes page layouts.
- Assume Elementor templates already exist on staging and must be preserved.
- Provide ACF field schema and stable class hooks.
- Provide only small atomic shortcodes when they reduce repeated setup.
- Ensure all schemas and registrations are REST compatible.
- Support a future content seeding pass without requiring manual copy paste.

---

End of document.