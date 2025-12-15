# Elementor container wireframe for Grander (psychic ready)

Use Elementor containers. Keep padding and spacing in rem. All copy is ready to drop. CTA buttons use the global primary style. This map assumes global colors and typography from the existing palette and Baskerville plus Corbel stack.

## Global header container
* Structure: sticky top container with two inner rows.
* Row 1: slim bar with logo left, search icon right, Estimate button right aligned on desktop; hide the text button on mobile and surface a floating phone icon.
* Row 2: navigation container with transparent start that switches to solid once scrolled beyond hero imagery. Includes primary nav, secondary CTA, and site search toggle.

## Global footer container
* Dark background with zigzag divider at the top. Inner container uses three columns on desktop, stacked on mobile.
* Column 1: Grander white logo, address, phone, email.
* Column 2: accreditation row with Home Builders Association and BBB logos plus links. Add optional mini trust line below.
* Column 3: social icon row followed by a slim text link list for privacy and sitemap.

## Home page container tree

### Hero section
* Outer container: full viewport height with background image or video overlay.
* Inner stack: headline, supporting line, dual CTA row.
  * Headline text: “Experience the art of building with grandeur.”
  * Supporting line: “Custom homes and outdoor living spaces built with purpose across Upstate South Carolina.”
  * Primary CTA: Request an estimate (opens global lightbox). Secondary CTA: View projects.
* Animation: reveal the word grandeur first, shift the R, then reveal the U for clarity.

### Expert offerings section
* Intro block: two column container with short paragraph and supporting image.
  * Paragraph: “Grander Construction brings custom homes and outdoor living spaces together under one design driven approach. From full scale builds to targeted additions, our team pairs refined craftsmanship with practical building science to create spaces that fit your lifestyle, elevate daily living, and stand up to the demands of time and climate.”
* Service grid: three columns on desktop, single column on mobile. Each item has image, title, summary, and View more button.
  * Custom homes: “Thoughtfully designed homes that balance timeless style, modern comfort, and high performance details.”
  * Outdoor spaces: “Porches, patios, coverings, decks, and pavilions that extend how you live outside with year round comfort.”
  * Future third slot: placeholder to align with existing service taxonomy.

### Testimonials rail
* Horizontal scroll container on mobile, grid on desktop. Each card pulls from the ACF testimonials repeater and includes testimonial text, name, project type, and location. Add optional star rating and photo.

### Featured projects
* Two column container with gallery slider on the left and project summary on the right. Uses the Featured projects picker relationship field to control entries and order.

### Structured FAQ preview
* Accordion container tied to the Structured FAQ library. Filter by tags for build process and general services. Include a CTA below to view the full FAQ page.

### Estimate CTA band
* Full width container with short headline, one line reassurance, and a single primary CTA opening the estimate lightbox.

## Service page template container tree

### Hero band
* Narrower hero with background image, service title, and breadcrumb row.

### Service overview
* Two column layout: left text column with service summary, right column with trust bar logos from the trust bar repeater.

### Project portfolio blocks
* Vertical stack where each block is a repeater item: title, location, summary, gallery, and optional before design image. Include a toggle to hide or show the design image per item.

### Related FAQs and CTA
* Two column container: FAQs pulled by related tags, and a CTA card prompting visitors to request an estimate.

## Contact page container tree
* Intro hero with concise headline and reassurance line.
* Two column layout: left contact details with map embed and office hours; right column houses the contact form using shared styling and consistent success state.
* Add a secondary FAQ accordion focused on contact and estimate topics.
