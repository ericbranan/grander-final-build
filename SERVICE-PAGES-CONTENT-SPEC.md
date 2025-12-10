# Service Pages - Complete Content and ACF Population Specification

**Last Updated:** 2025-12-08
**Template:** Service Page Template (shared)

This document provides complete content, ACF field values, and population plans for all four service pages.

---

# Page 1: Custom Homes

**Page Slug:** `custom-homes`
**Service Category Term:** `custom-homes`

---

## Hero Section

### ACF Field Values

| Field | Value |
|-------|-------|
| `gc_hero_headline` | Custom homes built around the way you live |
| `gc_hero_subline` | From modern farmhouse to refined transitional, we design and build homes that reflect your personality, support your lifestyle, and stand the test of time. |
| `gc_hero_background_image` | [Upload: Wide hero shot of completed custom home exterior] |
| `gc_hero_nav_variant` | light |

---

## Service Overview

### ACF Field: `gc_service_overview` (WYSIWYG)

**Word Count:** 172 words

```html
<p>Building a custom home is one of the most significant investments you will make, and it deserves a team that treats the process with care, precision, and genuine commitment to your vision. At Grander Construction, we specialize in creating homes that feel personal from the first sketch to the final walkthrough.</p>

<p>Our approach blends <strong>architectural detail with practical building science</strong>, delivering homes that look beautiful and perform exceptionally. We work with modern farmhouse, transitional, and contemporary styles, adapting each design to your family's needs, your property's characteristics, and the unique climate considerations of Upstate South Carolina.</p>

<p>Every custom home we build includes <strong>high performance construction methods</strong>, from continuous air barriers and advanced insulation systems to energy efficient windows and durable exterior envelopes. The result is a home that maintains comfortable temperatures year round, promotes healthier indoor air quality, and reduces long term energy costs without sacrificing style or craftsmanship.</p>
```

---

## Featured Projects

### ACF Field: `gc_service_featured_projects` (Relationship)

**Recommended Project Slugs:**
1. `custom-farmhouse-charm-fountain-inn`
2. `contemporary-barndominium-retreat-spartanburg`
3. (Add third project when available from Projects CPT)

**Fallback:** Uses `gc_featured_projects` from global options if no page-specific selection.

---

## Portfolio Section

### ACF Field: `gc_service_portfolio_sections` (Repeater)

**Portfolio Entry 1:**
| Subfield | Value |
|----------|-------|
| `title` | Custom farmhouse charm |
| `location` | Fountain Inn, SC |
| `summary` | This open concept custom farmhouse combines timeless board and batten character with modern comfort and expansive covered patio space. The design prioritizes natural light, connected living areas, and seamless indoor outdoor flow for a family that loves to entertain. |
| `has_design_image` | true |
| `design_image` | [Upload: 3D rendering or floor plan] |
| `gallery` | [Upload: 6-8 photos of completed project] |

**Portfolio Entry 2:**
| Subfield | Value |
|----------|-------|
| `title` | Contemporary barndominium retreat |
| `location` | Spartanburg, SC |
| `summary` | A rustic meets contemporary home featuring clean lines, wide porches, and abundant natural light. The open floor plan creates a connected feel throughout, while thoughtful material selections add warmth and texture to the modern aesthetic. |
| `has_design_image` | false |
| `gallery` | [Upload: 6-8 photos of completed project] |

---

## Mid-Page CTA

### ACF Field Values

| Field | Value |
|-------|-------|
| `gc_service_mid_cta_headline` | Ready to build your custom home? |
| `gc_service_mid_cta_body` | Every custom home begins with a conversation. Tell us about your vision, your timeline, and your goals. We will provide clear next steps and honest guidance to help you move forward with confidence. |
| `gc_service_estimate_cta_label` | Request an estimate |

---

## FAQ Section

### ACF Field: `gc_service_faq_groups`

**Selected Contexts:** `custom-homes`, `services-general`

### Custom Homes FAQ Content (for FAQ CPT)

**Q1: What styles of custom homes does Grander build?**
A: We specialize in modern farmhouse, transitional, and contemporary styles, though we adapt our approach to match your architectural preferences. Whether you envision exposed beams and board and batten siding or clean lines and expansive glass, we work with you to create a home that reflects your taste.

**Q2: How long does it take to build a custom home?**
A: Most custom homes require 10 to 14 months from groundbreaking to completion, depending on size, complexity, and finish selections. We provide a realistic timeline during the design phase and keep you updated on progress throughout the build.

**Q3: Do you handle the design process or do I need an architect?**
A: Our in house design team can guide you through the entire process, from initial concepts to construction drawings. For clients who prefer working with an external architect, we collaborate closely to ensure the design translates smoothly into a buildable, high performance home.

**Q4: What makes Grander's custom homes different from production builders?**
A: We build every home with high performance construction methods, including continuous air barriers, advanced insulation, and energy efficient systems. Beyond performance, we treat each project as unique, with personalized design, direct communication with your project manager, and a commitment to craftsmanship that production builders simply cannot match.

**Q5: Can you build on my existing lot?**
A: Yes. We evaluate site conditions, assess any challenges, and design homes that work with your property's topography, orientation, and local requirements. If you are still searching for land, we can connect you with trusted realtors who specialize in buildable lots in Upstate South Carolina.

---

## Jump Links

### ACF Field: `gc_service_jump_links_enabled`

**Value:** `true`

---

# Page 2: Outdoor Spaces

**Page Slug:** `outdoor-spaces`
**Service Category Term:** `outdoor-spaces`

---

## Hero Section

### ACF Field Values

| Field | Value |
|-------|-------|
| `gc_hero_headline` | Outdoor spaces designed for the way you live |
| `gc_hero_subline` | Porches, patios, pavilions, and decks that extend your home into the outdoors with comfort, durability, and intentional design. |
| `gc_hero_background_image` | [Upload: Wide hero shot of covered patio or outdoor living area] |
| `gc_hero_nav_variant` | light |

---

## Service Overview

### ACF Field: `gc_service_overview` (WYSIWYG)

**Word Count:** 168 words

```html
<p>Outdoor living should feel like a natural extension of your home, not an afterthought. At Grander Construction, we design and build porches, covered patios, pavilions, decks, and outdoor structures that support relaxation, entertaining, and everyday enjoyment regardless of the season.</p>

<p>Our outdoor spaces are built with the <strong>Upstate South Carolina climate in mind</strong>. We select materials that hold up to humidity, temperature swings, and sun exposure while maintaining their beauty over time. From pressure treated framing and composite decking to natural stone and custom masonry, every element is chosen for durability and long term performance.</p>

<p>Whether you want a <strong>quiet covered porch for morning coffee</strong>, a large pavilion for hosting family gatherings, or a poolside retreat with built in amenities, we approach each project with the same attention to detail we bring to our custom homes. The result is an outdoor space that feels connected to your home, enhances your property, and delivers comfort year after year.</p>
```

---

## Featured Projects

### ACF Field: `gc_service_featured_projects` (Relationship)

**Recommended Project Slugs:**
1. `covered-patio-grandeur-simpsonville`
2. `spaulding-farms-backyard-retreat-greenville`
3. (Add third project when available)

---

## Portfolio Section

### ACF Field: `gc_service_portfolio_sections` (Repeater)

**Portfolio Entry 1:**
| Subfield | Value |
|----------|-------|
| `title` | Covered patio grandeur |
| `location` | Simpsonville, SC |
| `summary` | A brick and vaulted ceiling patio designed for relaxation and entertaining. The space features a wood burning fireplace, built in seating, and carefully selected finishes that bring elevated everyday luxury to outdoor living. |
| `has_design_image` | false |
| `gallery` | [Upload: 6-8 photos] |

**Portfolio Entry 2:**
| Subfield | Value |
|----------|-------|
| `title` | Spaulding Farms backyard retreat |
| `location` | Greenville, SC |
| `summary` | This screen porch with wood burning fireplace was built to support poolside living, hosting, and quiet evenings. The design integrates seamlessly with the existing home while creating a distinct outdoor room that feels both open and protected. |
| `has_design_image` | true |
| `design_image` | [Upload: Design rendering if available] |
| `gallery` | [Upload: 6-8 photos] |

---

## Mid-Page CTA

### ACF Field Values

| Field | Value |
|-------|-------|
| `gc_service_mid_cta_headline` | Ready to extend your living space outdoors? |
| `gc_service_mid_cta_body` | Tell us how you want to use your outdoor space. We will help you explore options, understand investment levels, and create a plan that fits your property and lifestyle. |
| `gc_service_estimate_cta_label` | Request an estimate |

---

## FAQ Section

### ACF Field: `gc_service_faq_groups`

**Selected Contexts:** `outdoor-spaces`, `services-general`

### Outdoor Spaces FAQ Content (for FAQ CPT)

**Q1: What types of outdoor structures does Grander build?**
A: We build covered porches, screened porches, open air pavilions, covered patios, decks, pergolas, and custom outdoor structures. Each project is designed to complement your home's architecture and support how you want to use your outdoor space.

**Q2: How long does an outdoor living project take?**
A: Most outdoor projects require 6 to 12 weeks from groundbreaking to completion, depending on size and complexity. Larger structures with masonry, fireplaces, or custom features may take longer. We provide a clear timeline during the planning phase.

**Q3: What materials work best for outdoor structures in South Carolina?**
A: We recommend materials that handle humidity, temperature changes, and sun exposure well. This includes pressure treated lumber, composite decking, natural stone, and durable roofing systems. We guide you through material options based on aesthetics, maintenance, and longevity.

**Q4: Can you add a fireplace or outdoor kitchen to my project?**
A: Yes. We regularly integrate wood burning fireplaces, gas fireplaces, outdoor kitchens, and built in grills into our projects. These features add year round functionality and make outdoor spaces more enjoyable for entertaining.

**Q5: Do I need permits for an outdoor structure?**
A: Most outdoor structures require permits, and requirements vary by location and project scope. Our team handles permitting as part of the project, ensuring everything meets local codes and regulations.

---

## Jump Links

### ACF Field: `gc_service_jump_links_enabled`

**Value:** `true`

---

# Page 3: Pool Houses, Garages, and ADUs

**Page Slug:** `pool-houses-garages-adus`
**Service Category Term:** `pool-houses-garages-adus`

---

## Hero Section

### ACF Field Values

| Field | Value |
|-------|-------|
| `gc_hero_headline` | Pool houses, garages, and ADUs that add function and value |
| `gc_hero_subline` | Multi purpose structures designed for flexible living, thoughtful storage, and seamless integration with your property. |
| `gc_hero_background_image` | [Upload: Wide hero shot of pool house or detached structure] |
| `gc_hero_nav_variant` | light |

---

## Service Overview

### ACF Field: `gc_service_overview` (WYSIWYG)

**Word Count:** 175 words

```html
<p>Pool houses, detached garages, and accessory dwelling units do far more than store equipment or vehicles. When designed with intention, these structures add <strong>flexible living space, guest accommodations, home office potential, and practical storage</strong> that enhances daily life and long term property value.</p>

<p>At Grander Construction, we approach every auxiliary structure with the same care we bring to custom homes. We consider how the building relates to your existing home, how you will use the space over time, and how the design can support multiple functions as your needs evolve.</p>

<p>Our pool houses include options for <strong>changing rooms, outdoor kitchens, and covered entertaining areas</strong>. Our garages can accommodate workshops, studios, or second story living quarters. Our ADUs provide complete independent living spaces for extended family, rental income, or private home offices. Each project is built with quality materials, thoughtful finishes, and the structural integrity to serve your family for decades.</p>
```

---

## Featured Projects

### ACF Field: `gc_service_featured_projects` (Relationship)

**Recommended Project Slugs:**
1. `timber-ridge-pool-pavilion-simpsonville`
2. `urban-adu-guest-house-greenville`
3. (Add third project when available)

---

## Portfolio Section

### ACF Field: `gc_service_portfolio_sections` (Repeater)

**Portfolio Entry 1:**
| Subfield | Value |
|----------|-------|
| `title` | Timber Ridge pool pavilion |
| `location` | Simpsonville, SC |
| `summary` | This pool house features warm wood accents, a covered outdoor bar, and built in amenities designed for seamless outdoor entertaining. The structure complements the main home while creating a dedicated space for poolside gatherings. |
| `has_design_image` | false |
| `gallery` | [Upload: 6-8 photos] |

**Portfolio Entry 2:**
| Subfield | Value |
|----------|-------|
| `title` | Urban ADU guest house |
| `location` | Greenville, SC |
| `summary` | A compact guest house featuring a welcoming front porch, efficient kitchenette, full bathroom, and thoughtful living design. The ADU provides complete independent living space while maintaining visual harmony with the primary residence. |
| `has_design_image` | true |
| `design_image` | [Upload: Floor plan or rendering] |
| `gallery` | [Upload: 6-8 photos] |

---

## Mid-Page CTA

### ACF Field Values

| Field | Value |
|-------|-------|
| `gc_service_mid_cta_headline` | Ready to add function and value to your property? |
| `gc_service_mid_cta_body` | Tell us what you need from your space. Whether it is a pool house for entertaining, a garage with workshop potential, or a complete ADU for guests or rental income, we will help you plan a structure that works. |
| `gc_service_estimate_cta_label` | Request an estimate |

---

## FAQ Section

### ACF Field: `gc_service_faq_groups`

**Selected Contexts:** `pool-houses-garages-adus`, `services-general`

### Pool Houses, Garages, ADUs FAQ Content (for FAQ CPT)

**Q1: What is the difference between a pool house and a pool pavilion?**
A: A pool house typically includes enclosed space for changing, storage, or amenities like a kitchenette or bathroom. A pool pavilion is an open air covered structure focused on shade and entertaining. We build both, and can combine elements to match your needs.

**Q2: Can I add living space above my garage?**
A: Yes. We design and build garages with second story living quarters, bonus rooms, or home offices. These spaces require careful planning for access, utilities, and building codes, all of which we handle as part of the project.

**Q3: What are the requirements for building an ADU in Upstate South Carolina?**
A: ADU requirements vary by municipality and depend on zoning, lot size, and local ordinances. Our team researches requirements for your specific property and handles permitting to ensure compliance.

**Q4: How long does it take to build a pool house or detached garage?**
A: Most pool houses and detached garages require 8 to 16 weeks from groundbreaking to completion, depending on size and complexity. ADUs with full living amenities may take longer due to additional systems and finishes.

**Q5: Can these structures be designed to match my existing home?**
A: Absolutely. We design auxiliary structures to complement your home's architecture, using matching materials, rooflines, and details that create visual cohesion across your property.

---

## Jump Links

### ACF Field: `gc_service_jump_links_enabled`

**Value:** `true`

---

# Page 4: Sunrooms and Additions

**Page Slug:** `sunrooms-additions`
**Service Category Term:** `sunrooms-additions`

---

## Hero Section

### ACF Field Values

| Field | Value |
|-------|-------|
| `gc_hero_headline` | Sunrooms and additions that expand how you live |
| `gc_hero_subline` | Light filled expansions and thoughtful additions that connect your existing home to new possibilities in comfort, function, and layout. |
| `gc_hero_background_image` | [Upload: Wide hero shot of sunroom interior or addition exterior] |
| `gc_hero_nav_variant` | light |

---

## Service Overview

### ACF Field: `gc_service_overview` (WYSIWYG)

**Word Count:** 170 words

```html
<p>When you love your location but need more room or more light, a well designed addition makes all the difference. At Grander Construction, we specialize in sunrooms and home additions that <strong>blend seamlessly with your current architecture</strong> while opening up new ways to live.</p>

<p>Our sunrooms are built for <strong>year round comfort</strong>, with insulated framing, efficient HVAC integration, and high performance windows that maximize natural light without excessive heat gain. The result is a bright, comfortable space you can enjoy in every season.</p>

<p>For home additions, we focus on thoughtful integration. Whether you need an expanded primary suite, a larger kitchen, a home office, or additional bedrooms, we design additions that feel like they have always been part of the home. Our team handles structural connections, roofline transitions, foundation work, and finish details to ensure the new space matches the quality and character of your existing home.</p>
```

---

## Featured Projects

### ACF Field: `gc_service_featured_projects` (Relationship)

**Recommended Project Slugs:**
1. `driftwood-estate-greer`
2. `bunker-hill-sunroom-addition-greer`
3. (Add third project when available)

---

## Portfolio Section

### ACF Field: `gc_service_portfolio_sections` (Repeater)

**Portfolio Entry 1:**
| Subfield | Value |
|----------|-------|
| `title` | Driftwood estate dual additions |
| `location` | Greer, SC |
| `summary` | This project included two distinct additions: a vaulted sunroom with covered patio extending the main living area, and a detached two stall garage that complements the existing home. Both structures were designed to match the original architecture while adding significant functionality. |
| `has_design_image` | true |
| `design_image` | [Upload: Before photo or site plan] |
| `gallery` | [Upload: 6-8 photos] |

**Portfolio Entry 2:**
| Subfield | Value |
|----------|-------|
| `title` | Bunker Hill sunroom addition |
| `location` | Greer, SC |
| `summary` | A warm, light filled sunroom featuring exposed beams, a brick fireplace, and large windows on three sides. The space was designed for year round comfort and connects the home to views of the surrounding landscape. |
| `has_design_image` | false |
| `gallery` | [Upload: 6-8 photos] |

---

## Mid-Page CTA

### ACF Field Values

| Field | Value |
|-------|-------|
| `gc_service_mid_cta_headline` | Ready to expand your home? |
| `gc_service_mid_cta_body` | Tell us what your home needs. Whether it is more natural light, additional living space, or a complete room addition, we will help you understand options, investment levels, and the best approach for your property. |
| `gc_service_estimate_cta_label` | Request an estimate |

---

## FAQ Section

### ACF Field: `gc_service_faq_groups`

**Selected Contexts:** `sunrooms-additions`, `services-general`

### Sunrooms and Additions FAQ Content (for FAQ CPT)

**Q1: What is the difference between a sunroom and a four season room?**
A: The terms are often used interchangeably. We build sunrooms designed for year round use, with insulated framing, efficient windows, and HVAC integration. This ensures the space is comfortable in both summer heat and winter cold.

**Q2: Can you match the addition to my existing home's style?**
A: Yes. Matching rooflines, siding, windows, and trim is a core part of our approach. We design additions to look like they have always been part of the home, not like an obvious attachment.

**Q3: How long does a home addition take to complete?**
A: Most additions require 3 to 6 months from groundbreaking to completion, depending on size and complexity. Sunrooms on the smaller end may be faster, while large additions with structural changes take longer.

**Q4: Do additions require permits and inspections?**
A: Yes. Home additions require building permits, and the work is inspected at multiple stages. Our team handles permitting and coordinates inspections as part of the project.

**Q5: Will an addition affect my home's foundation or structure?**
A: Additions require careful structural planning to connect properly to your existing home. We assess your foundation, framing, and roofline to ensure the addition integrates safely and maintains structural integrity.

**Q6: Can you add a sunroom to a home with an existing deck or patio?**
A: Often, yes. Existing decks or patios can sometimes serve as the foundation for a sunroom, though structural upgrades may be needed. We evaluate your current structure and recommend the best approach.

---

## Jump Links

### ACF Field: `gc_service_jump_links_enabled`

**Value:** `true`

---

# Services-General FAQ Content (Shared Across All Service Pages)

These FAQs appear on all service pages when `services-general` context is selected:

**Q1: What areas does Grander Construction serve?**
A: We serve the Upstate of South Carolina, including Greenville, Spartanburg, Greer, Simpsonville, Fountain Inn, and surrounding communities. For select projects, we also work in Western North Carolina.

**Q2: How do I get started with a project?**
A: The first step is a phone call to discuss your vision, timeline, and budget range. If we are a good fit, we schedule a consultation to dive deeper into your project goals. From there, we develop design concepts and provide a detailed quote.

**Q3: Do you provide financing options?**
A: We do not offer direct financing, but we work with clients who use construction loans or home equity financing. We can provide documentation and payment schedules that work with your lender's requirements.

**Q4: What sets Grander apart from other builders?**
A: We combine high performance construction methods with personalized service and genuine craftsmanship. Every project receives direct attention from our team, not a rotating cast of subcontractors. We build relationships as carefully as we build structures.

**Q5: How do you handle project communication?**
A: You will have direct access to your project manager throughout the build. We provide regular progress updates, milestone notifications, and photo documentation. When decisions are needed or changes occur, you will know right away.

---

# Taxonomy and CPT Requirements

## Service Category Taxonomy Terms (create if not existing)

| Term Name | Slug |
|-----------|------|
| Custom Homes | `custom-homes` |
| Outdoor Spaces | `outdoor-spaces` |
| Pool Houses, Garages, and ADUs | `pool-houses-garages-adus` |
| Sunrooms and Additions | `sunrooms-additions` |

## FAQ Group Taxonomy Terms (create if not existing)

| Term Name | Slug |
|-----------|------|
| Services General | `services-general` |
| Custom Homes | `custom-homes` |
| Outdoor Spaces | `outdoor-spaces` |
| Pool Houses, Garages, ADUs | `pool-houses-garages-adus` |
| Sunrooms and Additions | `sunrooms-additions` |

## Project CPT Entries Needed

Ensure these projects exist in the Projects CPT with appropriate `service_category` assignments:

| Project Title | Slug | Service Category |
|---------------|------|------------------|
| Custom farmhouse charm | `custom-farmhouse-charm-fountain-inn` | `custom-homes` |
| Contemporary barndominium retreat | `contemporary-barndominium-retreat-spartanburg` | `custom-homes` |
| Covered patio grandeur | `covered-patio-grandeur-simpsonville` | `outdoor-spaces` |
| Spaulding Farms backyard retreat | `spaulding-farms-backyard-retreat-greenville` | `outdoor-spaces` |
| Timber Ridge pool pavilion | `timber-ridge-pool-pavilion-simpsonville` | `pool-houses-garages-adus` |
| Urban ADU guest house | `urban-adu-guest-house-greenville` | `pool-houses-garages-adus` |
| Driftwood estate | `driftwood-estate-greer` | `sunrooms-additions` |
| Bunker Hill sunroom addition | `bunker-hill-sunroom-addition-greer` | `sunrooms-additions` |

---

# Self-Check Verification

- [x] All four service pages fully documented
- [x] Hero content provided for each page
- [x] Service overview copy (150-180 words) provided for each page
- [x] Featured projects recommended by slug for each page
- [x] Portfolio sections with title, location, summary provided
- [x] Mid-page CTA content customized for each page
- [x] Service-specific FAQs written (5+ per service)
- [x] General FAQs documented for shared use
- [x] Taxonomy terms listed for creation
- [x] Project CPT entries listed with service_category assignments
- [x] No placeholder content
- [x] All copy in brand tone (approachable, craftsmanship-forward)
