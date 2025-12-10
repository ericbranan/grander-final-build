# ACF field map and REST payload outline

Files included

1. grander_acf_field_map_v1.csv  
2. grander_rest_payload_outline_v1.json  

How to use

- The CSV is the authoritative field naming and context map for the Grander Core plugin and Elementor dynamic tags.
- The JSON is a skeleton you can adapt into your import script.
  - Replace placeholders.
  - Use slugs for lookup.
  - Create taxonomies first, then projects, then page level relationships.

Implementation notes

- If you decide to move testimonials or FAQs from options into CPTs later, keep the field names and simply change the context.
- Keep Elementor templates as the markup source of truth and bind these fields with dynamic tags.
