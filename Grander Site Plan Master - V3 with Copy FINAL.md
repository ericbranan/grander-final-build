# Grander Construction site plan with draft copy
Version: 2025-12-08

This is the consolidated page by page build plan and the missing draft copy you called out.
It is written so you can hand sections to Angie or Claude without losing the narrative thread.
Copy is intentionally close to existing brand tone, with light SEO polish and no hyphens.

Primary source of truth for brand and project language is the latest magazine issue and the build science brochure.
Where a section is already built on staging, treat this copy as the reference text to confirm or refine, not a mandate to overwrite.

---

## Global site settings

### Color system
Use the previously defined Grander palette you already built.
If you need a placeholder list for Angie, reuse your existing global colors:
- Primary brand gold
- Deep charcoal or near black
- Warm white
- Accent brown
- Neutral grays for UI

### Typography
Families: Baskerville and Corbel (Adobe Typekit).

Suggested hierarchy
- Display and hero headlines: Baskerville, sentence case, tight tracking
- Section headings: Baskerville
- Body and UI: Corbel
- Small labels and micro copy: Corbel

Recommended base sizes
- Desktop
  - H1 52 to 64px
  - H2 40 to 48px
  - H3 28 to 32px
  - Body 17 to 18px
  - Small 14 to 15px
- Tablet
  - H1 40 to 48px
  - H2 32 to 36px
  - H3 24 to 28px
  - Body 16 to 17px
- Mobile
  - H1 32 to 36px
  - H2 26 to 30px
  - H3 22 to 24px
  - Body 16px

Line height
- Headlines 1.1 to 1.25
- Body 1.5 to 1.7

### Global UI elements
- Button styles
  - Primary: solid brand gold with dark text or white text depending on contrast
  - Secondary: outline with subtle hover fill
  - Text link style with thin underline and slight hover shift
- Lightbox
  - Global lightbox container for Request an estimate form
  - Set as reusable Elementor template or global widget
- Form styling
  - Shared form field styles, error states, and success states across site

---

## Reusable ACF groups

Create these once and reference them across templates.
All fields should be REST API enabled.

1. Sitewide testimonials
   - Repeater: testimonial text, first name, last initial, project type, location, optional star rating, optional photo
   - Use on home, services, team, contact

2. Structured FAQ library
   - Grouped by context: build process, services general, service specific, contact, request an estimate
   - Each FAQ item: question, answer, tags, related pages

3. Featured projects picker
   - Relationship field to project entries
   - Allows per page selection and ordering

4. Service page project portfolio blocks
   - Repeater of project sections
   - Fields: project title, location, summary, gallery, optional before design image, toggle for design image on or off

5. Upcoming events
   - Repeater: event name, short summary, date range, location, CTA label, CTA url

6. Trust bar items
   - Repeater: logo, label, url, display order

---

## Header and navigation

Goals
- Maintain current structure
- Fix color switching over hero imagery
- Ensure the white top stripe containing logo, search, and primary CTAs stays sticky
- Mobile behavior
  - Remove Call now text button from top bar
  - Add floating phone icon bottom right
  - Ensure hamburger contains full menu tree, not just top level

---

## Footer

Goals
- Dark background
- Zigzag pattern top border consistent with live site
- Include
  - Grander white logo
  - Home Builders Association logo with link
  - Better Business Bureau logo with link
  - Social icons
  - Address, phone, email
  - Optional mini trust line

---

# Page by page plan with draft copy

## 1. Home

### Hero
Headline
- Experience the art of building with grandeur

Animation note
- Use your concept: reveal the word grandeur first, animate the R shift, then reveal the U for clarity.

Supporting line
- Custom homes and outdoor living spaces built with purpose across Upstate South Carolina.

Primary CTAs
- Request an estimate
- View projects

### Expert offerings

Intro paragraph draft
Grander Construction brings custom homes and outdoor living spaces together under one design driven approach. From full scale builds to targeted additions, our team pairs refined craftsmanship with practical building science to create spaces that fit your lifestyle, elevate daily living, and stand up to the demands of time and climate.

Service blocks
Keep the required elements but redesign layout.
Each block needs:
- Image
- Title
- One to two sentence summary
- View more button

Service block titles and summaries
- Custom homes
  - Thoughtfully designed homes that balance timeless style, modern comfort, and high performance details.
- Outdoor spaces
  - Porches, patios, coverings, decks, and pavilions that extend how you live outside with year round comfort.
- Pool houses, garages, and ADUs
  - Multi purpose structures that add function, storage, and flexible living space without compromising aesthetics.
- Sunrooms and additions
  - Light filled expansions that connect your existing home to new possibilities in comfort and layout.

### Testimonials
- Pull from Sitewide testimonials ACF group.
- Display 5 random on load.

Seed testimonials from magazine
Use these as initial entries.
- Micah resolves issues, even when it costs the company, and treats construction as a process, not a one time event.
- A multipurpose pool house and storage build where the team was meticulous from day one and exceeded expectations.
- A multi level covered patio that other contractors could not solve elegantly, with standout carpentry and masonry.
- A barndominium experience described as clear, proactive, and deeply customer focused.

### Performance building teaser
Headline
- Discover the art of custom home building in Upstate South Carolina

Body copy anchored to build science brochure
Grander Construction believes homes should do more than look beautiful. High performance building brings healthier indoor air, better year round comfort, and lower long term energy costs. By combining advanced methods with durable materials, we build homes that last, protect your investment, and support a healthier way of living.

CTA
- Learn about performance building
  - Link to performance building page

### Request an estimate form
- Keep one inline version for quick access.

---

## 2. About our company

### Hero
Headline option
- Crafted for the way you live
Sub line
- A home should reflect the personality of its owner and the life that happens inside it.

### Micah story section
Use and blend
- Staging copy
- Existing live About content
- Magazine About and mission narrative

Draft narrative
Founded by Micah Barney, Grander Construction was built on a passion for quality craftsmanship and a desire to bring proven Midwestern standards and building science to the Upstate of South Carolina. With a family background in the trades and a degree in construction management, Micah leads with integrity, faith, and a genuine care for the families the team serves.

### Values
If values are not yet written on staging, align them to:
- Integrity
- Purpose
- Quality that lasts
- Clear communication
- Craftsmanship with science backed methods

### Mission
Use this wording as the baseline
To design and build spaces that embody individuality, purpose, and enduring excellence. Guided by our motto, Grandeur by Design. Built with Purpose, we blend innovative craftsmanship with personalized service to create custom homes and outdoor living spaces that last for generations.

---

## 3. Build process

### Hero
Headline
- The build process, made clear

### Process graphic
Phases
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

Short intro
Every project is unique, but our process stays consistent. You will always know what comes next, what decisions are needed, and how your schedule is taking shape.

### Process focused FAQs
Seed questions
- What are the main phases of the Grander build process?
  - The five core phases are listed above. Exact steps can vary based on project type, complexity, site conditions, and product availability.
- How long will my project take?
  - Expect a realistic timeline from start to finish at the time of your estimate, with clear milestone updates as the project progresses.
- When do we finalize design selections?
  - Most selections are confirmed during the design package stage, with one to three structured revision rounds to keep decisions efficient.
- How will communication work during the build?
  - Grander prioritizes transparent, proactive updates so you always understand progress, next steps, and any adjustments needed.
- What happens if we discover an issue mid project?
  - We address obstacles quickly and fairly, with solutions that protect quality and maintain trust.

---

## 4. Performance building

This is a priority content page and should pull heavily from the brochure.

### Hero
Headline
- High performance building, tailored for the Upstate

### Why build smart
Body copy
We believe homes should do more than look beautiful. High performance building means healthier indoor air, greater comfort year round, and lower energy costs for families. By focusing on advanced methods and durable materials, we create spaces that are built to last while reducing the long term impact on the environment. Our commitment is to deliver homes that bring together craftsmanship, efficiency, and lasting value for generations.

### Build science practices section
Bullets
- ZIP System envelope across roof and walls
- Energy efficient Windsor aluminum clad windows
- Airtight wall assemblies with no roof penetrations
- Continuous air barrier and high performance insulation

Expanded explanation
Our continuous air barrier with ZIP System sheathing improves energy efficiency and lowers operating costs by reducing air leakage. This approach also protects the structure from long term moisture damage and helps reduce insect and pest intrusion. Paired with high performance insulation strategies, the result is a durable building envelope engineered for comfort, stability, and long term indoor air quality.

CTA
- Request an estimate
- View performance focused projects

---

## 5. Services landing page

### Hero
Headline
- Services

Intro paragraph
Grander Construction specializes in creating custom homes and outdoor living spaces designed around the way you live. With a balance of innovative design and skilled craftsmanship, we deliver projects that blend beauty, function, and lasting value.

### Service category list
- Custom homes
- Outdoor spaces
- Pool houses, garages, and ADUs
- Sunrooms and additions

Include jump links to each category section.

---

## 6. Service template pages
Applies to:
- Custom homes
- Outdoor spaces
- Pool houses, garages, and ADUs
- Sunrooms and additions

### Hero
- Full width image
- Service overview title using the service name

### Service overview copy blocks
Each page needs a 120 to 180 word paragraph.

Draft copy by page

Custom homes
From modern farmhouse to refined transitional and contemporary styles, our custom home builds are designed to feel personal, practical, and enduring. We combine architectural detail with thoughtful space planning and performance focused construction so your home is as comfortable as it is beautiful. Our team guides you through design, selections, and scheduling with a clear process that respects your time and investment.

Outdoor spaces
Outdoor living should feel like a natural extension of your home. We design and build patios, covered structures, decks, porches, and pavilions that support everyday relaxation and effortless entertaining. With materials and details selected for the Upstate climate, your outdoor space will deliver comfort, durability, and a sense of intentional design.

Pool houses, garages, and ADUs
These structures can do far more than store equipment or cars. We build pool houses, garages, and accessory dwelling units that add flexible living space, guest accommodations, home office potential, and thoughtful storage. Each project is designed to complement your existing property while enhancing your lifestyle and long term value.

Sunrooms and additions
When you love your location but need more room or more light, a well designed addition makes all the difference. Our sunrooms and home additions are crafted to blend seamlessly with your current architecture while opening up new ways to live. Expect clean detailing, comfortable year round use, and planning that keeps the project efficient and predictable.

### Project portfolio
Use the ACF repeater with optional design image toggle.
Ordering rule
- New projects from the magazine appear first.

Seed project entries from the magazine
Use these titles and summaries to create initial ACF entries.

Featured builds
- Custom farmhouse charm, Fountain Inn
  - Open concept custom farmhouse combining timeless board and batten character with modern comfort and expansive covered patio space.
- Contemporary barndominium retreat, Spartanburg
  - A rustic meets contemporary home with clean lines, wide porches, and abundant natural light for an open, connected feel.

Additions and sunrooms
- Driftwood estate, Greer
  - Dual additions including a vaulted sunroom and covered patio plus a two stall garage addition that complements the existing home.
- Bunker Hill sunroom addition, Greer
  - A warm, light filled sunroom with exposed beams and a brick fireplace designed for year round comfort.

Outdoor living
- Covered patio grandeur, Simpsonville
  - Brick and vaulted ceiling patio designed for relaxation and entertaining with elevated everyday luxury.
- Spaulding Farms backyard retreat, Greenville
  - A screen porch with wood burning fireplace built to support poolside living, hosting, and quiet evenings.

Pool house
- Timber Ridge pool pavilion, Simpsonville
  - A pool house with warm wood accents and built in amenities for seamless outdoor entertaining.

ADU
- Urban ADU guest house, Greenville
  - Compact guest house with front porch, kitchenette, and efficient living design.

### CTA
Place one mid page based on scroll depth:
- Ready to start your project
- Request an estimate

---

## 7. Our team

### Hero overlay
Headline
- Our experts, your vision

### Intro copy
At Grander Construction, our team is the foundation of everything we build. Each member brings unique expertise and a commitment to quality that lasts. From the office to the job site, we work as one team to deliver results clients can depend on.

### Team layout rules
- Micah featured as owner and founder in a dedicated row or card
- Remaining four members in a centered grid
- ACF repeater for scalability
- Center alignment on uneven rows

### Mission and promise placement
Per your decision
- Values and Micah story on About
- Mission and promise on Our team

Draft promise line
We promise to lead every build with clarity, craftsmanship, and care, delivering spaces that honor your vision and protect your investment.

### Behind the scenes gallery
- Keep
- Tag images for quick filters later if desired

### Testimonials and FAQs
- Testimonials module pulls from Sitewide testimonials
- Team page FAQ could focus on working with the right builder and who you will interact with

---

## 8. Blog

### Title
- The Blueprint

### Intro
Short and modern.
Practical ideas, project highlights, material insights, and build process guidance for Upstate homeowners.

### Content tasks
- Restore missing content on existing posts from the live site.
- Draft 5 to 6 new posts for a two to three week publishing cadence.

Suggested new post titles
1. What high performance building means for Upstate homes
2. How to plan a sunroom or addition without disrupting your lifestyle
3. Designing outdoor living spaces that feel integrated
4. Pool houses, garages, and ADUs that add real value
5. Choosing finishes that hold up in the South
6. A clear look at the Grander build process

---

## 9. Gallery

### Hero
- Subtle textured or line pattern background that stays quiet behind the overlay

### Intro copy
A curated look at custom homes and outdoor living spaces built with purpose across the Upstate.

### Filters
- Use the categories and tags you already defined.
- Add an ACF or taxonomy driven filter UI.

---

## 10. Contact

### Hero
- Keep header
- Add an appropriate background image

### Core content
- Keep form and call info

### Map
Recommendation
- Place map under the call now area for visual grounding without interrupting form completion flow.

### Remove redundant CTA
- Remove the extra ready to begin section.

### FAQs
- Use the common questions section as the seed set for the Contact FAQ ACF group.

---

## 11. Request an estimate

### Decision
- Keep page for SEO and direct navigation
- Use global lightbox for convenience

### Lightbox layout
- Two column desktop, stacked mobile
Left
- Headline: Request an estimate
- 2 to 3 sentence reassurance copy
- Small trust bar row
Right
- Form embed

Reassurance copy
Tell us about your project and we will provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget.

---

## 12. Search results
- Style to match global typography and color system
- Add subtle category labels and readable excerpt spacing

---

## 13. 404 page
- Confirm template assignment
- Keep Back button with JS history fallback

---

# Sitewide low effort high return modules

1. Sitewide announcement bar
- ACF controlled
- Optional urgency style

2. Trust bar
- Place under heroes on home, services landing, and contact

Example items
- Licensed and insured
- Industry associations
- Verified reviews
- Performance focused builds

3. Consistent service area microline
- A single sentence line in footer and near contact CTAs

Draft line
Proudly serving Greer, Greenville, Spartanburg, and surrounding Upstate communities.

4. Social feed
- Pull from one source or alternate Instagram and Facebook posts
- Cache for performance

5. Jump links on service pages
- Premium feel and faster navigation

6. Upcoming events block
- Small module on home and contact, optional on services

---

# REST API notes for final content push

All ACF groups should have:
- show_in_rest = true
- Stable field keys and names
- Clear naming prefixes

Recommended naming
- gc_testimonials
- gc_faq
- gc_featured_projects
- gc_service_portfolio
- gc_events
- gc_trust_bar

When ready for the final run
- Export a field map
- Use a scripted POST and PATCH sequence
- Validate against staging before live

---

# Implementation strategy

Most efficient path given your constraints
1. Keep the existing staging wireframe and Elementor templates.
2. Use Claude to generate small, swap friendly template blocks where ACF integration is missing.
   - Name blocks clearly, for example:
     - ACF Integrated Testimonial Slider 1
     - ACF Integrated FAQ Accordion 1
3. Upload as a lightweight helper plugin that:
   - Registers ACF groups
   - Provides shortcodes or Elementor widgets if needed
   - Adds global CSS and JS
4. Avoid monolithic rebuilds.
   - This minimizes regression risk and keeps everything editable in Elementor.

---

# Quick checklist

- Global colors and fonts re added and applied
- Header sticky stripe and hero color switching fixed
- Mobile call icon floating behavior added
- Footer pattern and trust logos added
- ACF groups created and REST enabled
- Service template created and applied
- Project portfolio ACF repeater populated with magazine projects first
- FAQ library seeded from staging and expanded for build process
- Testimonials seeded and randomized display
- Gallery filters wired to tags
- Search results styled
- 404 confirmed

