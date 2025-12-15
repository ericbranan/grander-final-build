# Elementor Global Settings

Version: 1.0.0

This document specifies the exact values to enter in Elementor Pro's Site Settings for global colors, fonts, and button presets.

---

## Global Colors

Navigate to: **Elementor > Site Settings > Global Colors**

### Primary Colors

| Name | ID | Hex Value | Usage |
|------|-----|-----------|-------|
| Primary Gold | `gc-gold` | `#B08D66` | Buttons, accents, icons, links |
| Primary Gold Hover | `gc-gold-hover` | `#9A7A58` | Button hover states |
| Deep Brown | `gc-deep-brown` | `#4C2A19` | Headlines, footer, dark sections |

### Background Colors

| Name | ID | Hex Value | Usage |
|------|-----|-----------|-------|
| Warm White | `gc-warm-white` | `#FDFBF8` | Page backgrounds |
| Warm Background | `gc-warm-bg` | `#F5F3F0` | Alternate sections, blog archive |
| White | `gc-white` | `#FFFFFF` | Cards, form backgrounds |

### Text Colors

| Name | ID | Hex Value | Usage |
|------|-----|-----------|-------|
| Text Dark | `gc-text-dark` | `#231F20` | Card text, emphasized content |
| Text Body | `gc-text` | `#333333` | Body copy, paragraphs |
| Text Muted | `gc-text-muted` | `#666666` | Metadata, captions |

### UI Colors

| Name | ID | Hex Value | Usage |
|------|-----|-----------|-------|
| Border Light | `gc-border` | `#E8DFD5` | Borders, dividers |
| Error | `gc-error` | `#C62828` | Form validation |
| Success | `gc-success` | `#2E7D32` | Success messages |

---

## Global Fonts

Navigate to: **Elementor > Site Settings > Global Fonts**

### Primary Typography (Headings)

| Name | ID | Settings |
|------|-----|----------|
| H1 Headline | `gc-h1` | **Family:** Libre Baskerville, Baskerville, Times New Roman, serif<br>**Size:** 64px (desktop), 48px (tablet), 36px (mobile)<br>**Weight:** 700<br>**Line Height:** 1.1<br>**Letter Spacing:** -1px |
| H2 Section Title | `gc-h2` | **Family:** Libre Baskerville<br>**Size:** 48px (desktop), 36px (tablet), 30px (mobile)<br>**Weight:** 700<br>**Line Height:** 1.15<br>**Letter Spacing:** -0.5px |
| H3 Subsection | `gc-h3` | **Family:** Libre Baskerville<br>**Size:** 32px (desktop), 28px (tablet), 24px (mobile)<br>**Weight:** 700<br>**Line Height:** 1.2 |
| H4 Card Title | `gc-h4` | **Family:** Libre Baskerville<br>**Size:** 24px<br>**Weight:** 700<br>**Line Height:** 1.3 |

### Secondary Typography (Body)

| Name | ID | Settings |
|------|-----|----------|
| Body Text | `gc-body` | **Family:** Corbel, Lucida Grande, Lucida Sans, sans-serif<br>**Size:** 17px (desktop), 16px (mobile)<br>**Weight:** 400<br>**Line Height:** 1.7 |
| Body Large | `gc-body-lg` | **Family:** Corbel<br>**Size:** 18px<br>**Weight:** 400<br>**Line Height:** 1.7 |
| Body Small | `gc-body-sm` | **Family:** Corbel<br>**Size:** 15px<br>**Weight:** 400<br>**Line Height:** 1.6 |
| Caption | `gc-caption` | **Family:** Corbel<br>**Size:** 14px<br>**Weight:** 400<br>**Line Height:** 1.5 |

### Accent Typography

| Name | ID | Settings |
|------|-----|----------|
| Subhead | `gc-subhead` | **Family:** Corbel<br>**Size:** 14px<br>**Weight:** 700<br>**Transform:** Uppercase<br>**Letter Spacing:** 1.5px<br>**Color:** Primary Gold |
| Button Text | `gc-btn-text` | **Family:** Corbel<br>**Size:** 16px<br>**Weight:** 600<br>**Letter Spacing:** 0 |
| Button Text Caps | `gc-btn-caps` | **Family:** Corbel<br>**Size:** 14px<br>**Weight:** 700<br>**Transform:** Uppercase<br>**Letter Spacing:** 1px |
| Label | `gc-label` | **Family:** Corbel<br>**Size:** 15px<br>**Weight:** 600 |

---

## Global Button Styles

Navigate to: **Elementor > Site Settings > Buttons**

### Primary Button (Default)

| Property | Value |
|----------|-------|
| Typography | Corbel, 16px, 600 weight |
| Text Color | `#4C2A19` (Deep Brown) |
| Background Color | `#B08D66` (Primary Gold) |
| Border Radius | 4px |
| Padding | 16px 32px |
| Box Shadow | 0 4px 8px rgba(76, 42, 25, 0.15) |

**Hover State:**
| Property | Value |
|----------|-------|
| Background Color | `#9A7A58` (Gold Hover) |
| Transform | translateY(-2px) |
| Box Shadow | 0 6px 12px rgba(76, 42, 25, 0.2) |

### Secondary Button (Outline)

| Property | Value |
|----------|-------|
| Typography | Corbel, 16px, 600 weight |
| Text Color | `#4C2A19` (Deep Brown) |
| Background Color | Transparent |
| Border | 2px solid `#4C2A19` |
| Border Radius | 4px |
| Padding | 14px 30px |

**Hover State:**
| Property | Value |
|----------|-------|
| Text Color | `#FDFBF8` (Warm White) |
| Background Color | `#4C2A19` (Deep Brown) |

### Ghost Button (Light Background)

| Property | Value |
|----------|-------|
| Typography | Corbel, 16px, 600 weight |
| Text Color | `#FDFBF8` (Warm White) |
| Background Color | Transparent |
| Border | 2px solid `#FDFBF8` |
| Border Radius | 4px |
| Padding | 14px 30px |

**Hover State:**
| Property | Value |
|----------|-------|
| Text Color | `#4C2A19` (Deep Brown) |
| Background Color | `#FDFBF8` (Warm White) |

### Brown Button (CTA)

| Property | Value |
|----------|-------|
| Typography | Corbel, 16px, 600 weight |
| Text Color | `#FDFBF8` (Warm White) |
| Background Color | `#4C2A19` (Deep Brown) |
| Border Radius | 0px |
| Padding | 18px 40px |
| Box Shadow | 0 4px 8px rgba(76, 42, 25, 0.15) |

**Hover State:**
| Property | Value |
|----------|-------|
| Background Color | `#B08D66` (Primary Gold) |
| Text Color | `#4C2A19` (Deep Brown) |
| Transform | translateY(-2px) |

### Text Link Button

| Property | Value |
|----------|-------|
| Typography | Corbel, 14px, 700 weight, uppercase |
| Text Color | `#B08D66` (Primary Gold) |
| Letter Spacing | 1px |
| Text Decoration | None |

**Hover State:**
| Property | Value |
|----------|-------|
| Text Color | `#4C2A19` (Deep Brown) |
| Text Decoration | Underline |

---

## Global Form Styling

Navigate to: **Elementor > Site Settings > Form Fields** (or apply per form widget)

### Input Fields

| Property | Value |
|----------|-------|
| Background Color | `#FFFFFF` |
| Border Width | 1px |
| Border Color | `#D8D8D8` |
| Border Radius | 6px |
| Padding | 14px 16px |
| Font Family | Corbel |
| Font Size | 16px |
| Text Color | `#333333` |
| Placeholder Color | `#999999` |

**Focus State:**
| Property | Value |
|----------|-------|
| Border Color | `#B08D66` (Primary Gold) |
| Box Shadow | 0 0 0 3px rgba(176, 141, 102, 0.15) |

### Labels

| Property | Value |
|----------|-------|
| Font Family | Corbel |
| Font Size | 15px |
| Font Weight | 600 |
| Color | `#333333` |
| Margin Bottom | 8px |

### Select Dropdown

| Property | Value |
|----------|-------|
| Same as input fields |
| Custom Arrow | SVG chevron |
| Padding Right | 40px |

### Textarea

| Property | Value |
|----------|-------|
| Same as input fields |
| Min Height | 140px |
| Resize | Vertical |

### Submit Button

| Property | Value |
|----------|-------|
| Use Primary Button styling |
| Full width on mobile | Yes |

### Error States

| Property | Value |
|----------|-------|
| Border Color | `#C62828` |
| Focus Box Shadow | 0 0 0 3px rgba(198, 40, 40, 0.15) |
| Error Text Color | `#C62828` |
| Error Text Size | 13px |

---

## Container Width Defaults

Navigate to: **Elementor > Site Settings > Layout**

| Setting | Value |
|---------|-------|
| Content Width | 1200px |
| Widgets Gap | 24px |
| Stretched Section Fit To | Full Width |
| Page Title Selector | h1.entry-title |

---

## Breakpoints

Navigate to: **Elementor > Site Settings > Layout > Breakpoints**

| Breakpoint | Value |
|------------|-------|
| Mobile | 767px |
| Mobile Extra | 880px (optional) |
| Tablet | 1024px |
| Tablet Extra | 1200px (optional) |
| Laptop | 1366px (optional) |
| Widescreen | 2400px |

---

## Additional Settings

### Lightbox

Navigate to: **Elementor > Site Settings > Lightbox**

| Setting | Value |
|---------|-------|
| Image Lightbox | Yes |
| Counter | Yes |
| Fullscreen | Yes |
| Zoom | Yes |
| Share | No |

### Background Overlay (for Hero sections)

| Property | Value |
|----------|-------|
| Type | Gradient |
| Gradient Type | Linear |
| Angle | 180° |
| Color 1 | rgba(44, 33, 26, 0.5) at 0% |
| Color 2 | rgba(44, 33, 26, 0.7) at 100% |

---

## Implementation Checklist

### Global Colors
- [ ] Add all 11 colors with correct names and IDs
- [ ] Verify hex values are exact
- [ ] Test colors in button and text widgets

### Global Fonts
- [ ] Add all typography presets
- [ ] Verify Libre Baskerville loads from Typekit
- [ ] Verify Corbel fallback chain works
- [ ] Test responsive sizes at all breakpoints

### Button Presets
- [ ] Configure primary button as default
- [ ] Set hover transitions (0.2s ease)
- [ ] Test button states across site

### Form Styling
- [ ] Apply input styling globally
- [ ] Test focus states
- [ ] Verify error states display correctly
- [ ] Check mobile zoom prevention (16px min font)

### Layout
- [ ] Set content width to 1200px
- [ ] Configure breakpoints
- [ ] Verify stretched section behavior

---

End of Elementor globals specification.
