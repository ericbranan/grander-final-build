# Wireframe site kit template

This template kit translates the Elementor wireframe into a reusable set of container based sections ready for export as a complete Elementor template kit. It assumes the Grander Core plugin, ACF field groups, and Elementor Pro are active so dynamic tags work without custom PHP. Use this file alongside `TEMPLATE-LIBRARY-GUIDE.md` while you build and export the kit inside Elementor.

## Readiness checklist (must be true before export)
- Elementor containers are enabled and global colors and typography (Baskerville and Corbel stack) are published.
- Grander Core plugin is active so CSS hooks like `.gc-testimonials-v1`, `.gc-trust-bar`, `.gc-header-call`, and `.gc-footer` exist.
- ACF field groups are populated for testimonials, FAQs, trust items, featured projects, and service relationships.
- Estimate lightbox template is live and referenced by all CTA buttons that open the modal.
- Test submission targets are set: contact form goes to Elementor Submissions and email; estimate CTA opens the modal not a page refresh.

## Export recipe for Elementor template kit
1. Build each page and part from the manifest below using Elementor containers.
2. For every dynamic field, set the ACF key as a dynamic tag and confirm preview data renders.
3. Add CSS classes from `grander-core.css` to the matching containers so the kit inherits the staging styling without extra work.
4. In Elementor, open Tools → Import Export Kit → Start Export. Include Templates, Site Settings, Forms, and Popups. Name the kit `grander-wireframe-site-kit`.
5. Download the zip and store it in `/exports/grander-wireframe-site-kit-YYYY-MM-DD.zip`. Update the date to the export day in South Carolina Eastern time.

## Asset and manifest map
- Global parts: Header, Footer.
- Page templates: Home, Service, Contact.
- Popups: Estimate lightbox (CTA target). Optional mini search if desired.
- Global style tokens: Primary button, secondary text link, divider styles, section spacing (use rem units).
- Required imagery: logo in white and color, trust logos (HBA, BBB), sample project hero, testimonial avatars (optional), map snapshot for contact.

## ACF and dynamic tag guide
- Testimonials: `gc_testimonial_quote`, `gc_testimonial_first_name`, `gc_testimonial_last_initial`, optional `gc_testimonial_city`.
- FAQs: `gc_faq_question`, `gc_faq_answer`, taxonomy tags for build process and service mapping.
- Trust items: `gc_trust_items` repeater with logo, label, link.
- Featured projects: relationship or repeater field driving gallery and summaries.
- Services: name, hero background, summary, related FAQ tags, related projects.

## Global header container
- Sticky outer container with two inner rows.
- Row 1: slim bar with logo left, search icon right, and Estimate CTA (hide text CTA on mobile and surface a floating phone icon instead).
- Row 2: transparent to solid nav that changes after scrolling past the hero; include primary nav, secondary CTA, and search toggle.

## Global footer container
- Dark background with zigzag divider on top; use `.gc-footer-zigzag` for placement.
- Three columns on desktop, stacked on mobile:
  - Column 1: white logo, address, phone, email.
  - Column 2: accreditation row (Home Builders Association and BBB) plus optional mini trust line.
  - Column 3: social icon row and slim text links (privacy, sitemap).
- Add a final thin bar with copyright and builder license number.

## Home page template
- Hero section: full viewport height background with headline “Experience the art of building with grandeur.” Supporting line “Custom homes and outdoor living spaces built with purpose across Upstate South Carolina.” Dual CTA row: primary opens estimate lightbox; secondary links to projects.
- Expert offerings: two column intro paragraph with supporting image, followed by three column service grid (Custom homes, Outdoor spaces, placeholder third slot). Each card: image, title, summary, View more button.
- Testimonials rail: horizontal scroll on mobile, grid on desktop. Bind to testimonial CPT fields and apply `.gc-testimonials-v1` classes.
- Featured projects: two column container; gallery slider left and project summary right. Use featured projects picker to control entries.
- Structured FAQ preview: accordion filtered by build process and general service tags; add CTA beneath to view full FAQ page. Apply `.gc-faq-accordion-v1` and related classes for plugin JS behavior.
- Estimate CTA band: full width band with short headline, reassurance line, and primary CTA to open estimate lightbox.

## Service page template
- Hero band: narrowed hero with background image, service title, and breadcrumb row.
- Service overview: two column layout; left text summary, right trust bar logos pulled from `gc_trust_items` via `[grander_trust_bar]` or manual repeater with `.gc-trust-bar` classes.
- Project portfolio blocks: vertical stack using repeater fields for title, location, summary, gallery, and optional design image toggle per item.
- Related FAQs and CTA: two column container with FAQs filtered by related tags on the page and a CTA card prompting an estimate request.

## Contact page template
- Intro hero with concise headline and reassurance line.
- Two column layout: left column with contact details, map embed, and office hours; right column holds the contact form with consistent success state styling.
- Secondary FAQ accordion focused on contact and estimate topics; reuse `.gc-faq-accordion-v1` structure.
- Add an alert row with response time promise and the service area counties.

## Build notes
- Keep padding and spacing in rem units for consistency across breakpoints.
- Use Elementor global primary style for all CTAs; apply `.gc-header-call`, `.gc-footer`, and other hooks from `grander-core.css` where relevant.
- Respect existing staging structure: upgrade sections in place rather than redesigning layouts.
- After export, import the zip into a clean site, assign header and footer as global parts, set Home, Service, and Contact templates, and retest all dynamic tags before release.
