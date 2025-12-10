# 404 Page Template Build Specification

**Template Type:** Theme Builder → Error 404
**Last Updated:** 2025-12-10
**Status:** Ready for Implementation

---

## Overview

The 404 page provides a friendly, branded experience when visitors land on a non-existent page. It maintains the Grander Construction design language while helping users find their way back to useful content. Per the Site Plan Master document, the Back button with JS history fallback is a non-negotiable feature.

---

## Design Goals

1. Maintain brand consistency with warm, approachable tone
2. Provide clear messaging that the page doesn't exist
3. Offer multiple pathways back to useful content
4. Include search functionality for self-service
5. Preserve the Back button with JavaScript history fallback

---

## Visual Design Reference

### Color Palette
| Token | Hex | Usage |
|-------|-----|-------|
| Primary Gold | `#B08D66` | Accents, icons |
| Deep Brown | `#4C2A19` | Headlines, buttons |
| Text Dark | `#231F20` | Body text |
| Warm Background | `#F5F3F0` | Page background |
| White | `#FFFFFF` | Card elements |
| Border Light | `#E8DFD5` | Decorative borders |

### Typography
| Element | Font | Size | Weight | Color |
|---------|------|------|--------|-------|
| 404 Number | Libre Baskerville | 120px desktop / 80px mobile | 700 | Gold (with opacity) |
| Page Title | Libre Baskerville | 48px desktop / 32px mobile | 700 | Deep Brown |
| Message | Corbel | 18px | 400 | Text Dark |
| Button | Corbel | 14px | 700, uppercase | White on Brown |

---

## Template Configuration

- **Template Type:** Error 404
- **Conditions:** 404 Page
- **Class Hook:** `gc-404-page-v1`

---

## Page Structure

### Section 1: Hero Area
### Section 2: Quick Links
### Section 3: Search Section
### Section 4: Contact CTA (Optional)

---

## Section 1: Hero Area

**Purpose:** Primary messaging area with 404 indicator and helpful copy

**Container Settings:**
- Full width
- Background: `#F5F3F0` (Warm Background)
- Min height: 60vh
- Display: Flex
- Align items: Center
- Justify content: Center
- Padding: 80px 24px desktop / 60px 20px mobile

### Widget 1.1: 404 Number (Heading)
- **Content:** "404"
- **HTML Tag:** Div or Span (decorative, not semantic heading)
- **Typography:**
  - Font: Libre Baskerville
  - Size: 120px desktop / 100px tablet / 80px mobile
  - Weight: 700
  - Color: `#B08D66` with 30% opacity
  - Letter spacing: 8px
  - Line height: 1
- **Margin bottom:** 0px (sits behind or above title)
- **Class:** `gc-404-number`

**Alternative approach:** Position as background element behind the title for visual interest.

### Widget 1.2: Page Title (Heading)
- **Content:** "Page not found"
- **HTML Tag:** H1
- **Typography:**
  - Font: Libre Baskerville
  - Size: 48px desktop / 40px tablet / 32px mobile
  - Weight: 700
  - Color: `#4C2A19`
  - Line height: 1.2em
- **Margin bottom:** 20px
- **Class:** `gc-404-title`

### Widget 1.3: Message (Text Editor)
- **Content:** "The page you're looking for doesn't exist or may have been moved. Let's help you find what you need."
- **Typography:**
  - Font: Corbel
  - Size: 18px
  - Color: `#231F20`
  - Line height: 1.7em
- **Max width:** 500px centered
- **Margin bottom:** 40px
- **Class:** `gc-404-message`

### Widget 1.4: Back Button (Button)
- **Text:** "Go Back"
- **Icon:** Arrow left (before text)
- **Icon spacing:** 8px
- **Link:** `javascript:history.back()` OR custom JS handler
- **Typography:**
  - Font: Corbel
  - Size: 14px
  - Weight: 700
  - Text transform: Uppercase
  - Letter spacing: 1px
- **Style:**
  - Background: `#4C2A19`
  - Text color: `#FFFFFF`
  - Border radius: 0px
  - Padding: 16px 32px
  - Box shadow: `0 4px 8px rgba(76,42,25,0.15)`
- **Hover:**
  - Background: `#B08D66`
  - Transform: `translateY(-2px)`
  - Box shadow: `0 6px 12px rgba(76,42,25,0.2)`
- **ID:** `gc-back-button`
- **Class:** `gc-404-back-btn`

### Widget 1.5: Home Link (Text/Button)
- **Content:** "or return to homepage"
- **Link:** `/`
- **Typography:**
  - Font: Corbel
  - Size: 14px
  - Color: `#B08D66`
  - Text decoration: Underline on hover
- **Margin top:** 16px
- **Class:** `gc-404-home-link`

---

## Section 2: Quick Links

**Purpose:** Provide direct navigation to key pages

**Container Settings:**
- Content width: 900px
- Background: `#FFFFFF`
- Padding: 60px 40px
- Margin: 0 auto -40px (overlap with hero)
- Box shadow: `0 8px 24px rgba(35,31,32,0.08)`
- Border top: 3px solid `#B08D66`

### Widget 2.1: Quick Links Title (Heading)
- **Content:** "Popular destinations"
- **HTML Tag:** H2
- **Typography:**
  - Font: Libre Baskerville
  - Size: 28px
  - Weight: 700
  - Color: `#4C2A19`
- **Alignment:** Center
- **Margin bottom:** 32px

### Widget 2.2: Links Grid (Inner Section or Icon List)
- **Layout:** 4 columns desktop / 2 columns tablet / 1 column mobile
- **Gap:** 24px

**Link Items:**

1. **Our Services**
   - Icon: Grid or Layout icon
   - Text: "Our Services"
   - Link: `/services/`

2. **Project Gallery**
   - Icon: Image or Gallery icon
   - Text: "Project Gallery"
   - Link: `/gallery/`

3. **About Us**
   - Icon: Users or Building icon
   - Text: "About Us"
   - Link: `/about/`

4. **Contact**
   - Icon: Mail or Phone icon
   - Text: "Contact"
   - Link: `/contact/`

**Link Item Styling:**
- Display: Flex column, align center
- Padding: 24px 16px
- Background: `#F5F3F0`
- Border radius: 0px
- Transition: all 0.3s ease

**Icon:**
- Size: 32px
- Color: `#B08D66`
- Margin bottom: 12px

**Text:**
- Font: Corbel, 16px, 600
- Color: `#4C2A19`

**Hover:**
- Background: `#4C2A19`
- Icon color: `#FFFFFF`
- Text color: `#FFFFFF`
- Transform: `translateY(-4px)`

**Class:** `gc-404-links`

---

## Section 3: Search Section

**Purpose:** Allow users to search for content

**Container Settings:**
- Content width: 700px
- Background: `#F5F3F0`
- Padding: 80px 24px
- Text align: Center

### Widget 3.1: Search Prompt (Heading)
- **Content:** "Looking for something specific?"
- **HTML Tag:** H3
- **Typography:**
  - Font: Libre Baskerville
  - Size: 24px
  - Weight: 700
  - Color: `#4C2A19`
- **Margin bottom:** 16px

### Widget 3.2: Search Description (Text Editor)
- **Content:** "Use the search box below to find what you're looking for."
- **Typography:**
  - Font: Corbel
  - Size: 16px
  - Color: `#666666`
- **Margin bottom:** 24px

### Widget 3.3: Search Form (Search Form Widget)
- **Max width:** 500px centered
- **Style:** Minimal

**Input Styling:**
- Background: `#FFFFFF`
- Border: 1px solid `#E8DFD5`
- Border radius: 0px
- Padding: 16px 18px 16px 50px
- Font: Corbel, 16px
- Shadow: `0 2px 8px rgba(76,42,25,0.08)`
- Focus border: `#B08D66`

**Search Icon:**
- Position: Inside left
- Color: `#B08D66`
- Size: 20px

**Button:**
- Text: "Search"
- Background: `#4C2A19`
- Color: `#FFFFFF`
- Border radius: 0px
- Padding: 16px 24px
- Hover background: `#B08D66`

**Class:** `gc-404-search`

---

## Section 4: Contact CTA (Optional)

**Purpose:** Encourage direct contact if users can't find what they need

**Container Settings:**
- Full width
- Background: `#4C2A19`
- Padding: 60px 24px
- Text align: Center

### Widget 4.1: CTA Heading (Heading)
- **Content:** "Still can't find what you need?"
- **HTML Tag:** H3
- **Typography:**
  - Font: Libre Baskerville
  - Size: 28px
  - Weight: 700
  - Color: `#FFFFFF`
- **Margin bottom:** 16px

### Widget 4.2: CTA Message (Text Editor)
- **Content:** "Our team is happy to help. Give us a call or send a message."
- **Typography:**
  - Font: Corbel
  - Size: 17px
  - Color: `rgba(255,255,255,0.9)`
- **Margin bottom:** 28px

### Widget 4.3: CTA Button (Button)
- **Text:** "Contact Us"
- **Link:** `/contact/`
- **Typography:**
  - Font: Corbel
  - Size: 14px
  - Weight: 700
  - Text transform: Uppercase
  - Letter spacing: 1px
- **Style:**
  - Background: `#B08D66`
  - Text color: `#FFFFFF`
  - Border radius: 0px
  - Padding: 16px 36px
- **Hover:**
  - Background: `#9A7A58`
  - Transform: `translateY(-2px)`

---

## Back Button JavaScript

**Critical Requirement:** The Back button must work with JavaScript history, with a fallback to the homepage if there's no history.

Add this to `grander-core.js`:

```javascript
// 404 Back Button Handler
document.addEventListener('DOMContentLoaded', function() {
  const backButton = document.getElementById('gc-back-button');

  if (backButton) {
    backButton.addEventListener('click', function(e) {
      e.preventDefault();

      // Check if there's history to go back to
      if (window.history.length > 1 && document.referrer !== '') {
        // There's history and a referrer, go back
        window.history.back();
      } else {
        // No history or direct visit, go to homepage
        window.location.href = '/';
      }
    });
  }
});
```

**Alternative inline approach** (if not using external JS):
```html
<a href="/" onclick="if(history.length > 1 && document.referrer) { history.back(); return false; }">
  Go Back
</a>
```

---

## Custom CSS

```css
/* 404 Page Styles */
.gc-404-page-v1 {
  background-color: #F5F3F0;
}

/* Hero section */
.gc-404-hero {
  min-height: 60vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 80px 24px;
}

/* 404 Number (decorative) */
.gc-404-number {
  font-family: 'Libre Baskerville', serif;
  font-size: 120px;
  font-weight: 700;
  color: rgba(176,141,102,0.3);
  letter-spacing: 8px;
  line-height: 1;
  margin-bottom: -20px;
  position: relative;
  z-index: 0;
}

@media (max-width: 1024px) {
  .gc-404-number {
    font-size: 100px;
  }
}

@media (max-width: 767px) {
  .gc-404-number {
    font-size: 80px;
    letter-spacing: 4px;
  }
}

/* Page title */
.gc-404-title {
  font-family: 'Libre Baskerville', serif;
  font-size: 48px;
  font-weight: 700;
  color: #4C2A19;
  line-height: 1.2em;
  margin-bottom: 20px;
  position: relative;
  z-index: 1;
}

@media (max-width: 1024px) {
  .gc-404-title {
    font-size: 40px;
  }
}

@media (max-width: 767px) {
  .gc-404-title {
    font-size: 32px;
  }
}

/* Message */
.gc-404-message {
  font-size: 18px;
  color: #231F20;
  line-height: 1.7em;
  max-width: 500px;
  margin: 0 auto 40px;
}

/* Back button */
.gc-404-back-btn {
  background: #4C2A19;
  color: #FFFFFF;
  padding: 16px 32px;
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 8px rgba(76,42,25,0.15);
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
}

.gc-404-back-btn:hover {
  background: #B08D66;
  transform: translateY(-2px);
  box-shadow: 0 6px 12px rgba(76,42,25,0.2);
  color: #FFFFFF;
}

.gc-404-back-btn svg,
.gc-404-back-btn i {
  width: 18px;
  height: 18px;
}

/* Home link */
.gc-404-home-link {
  display: block;
  margin-top: 16px;
  font-size: 14px;
  color: #B08D66;
  text-decoration: none;
  transition: color 0.2s ease;
}

.gc-404-home-link:hover {
  color: #4C2A19;
  text-decoration: underline;
}

/* Quick Links Section */
.gc-404-links-section {
  background: #FFFFFF;
  padding: 60px 40px;
  max-width: 900px;
  margin: 0 auto;
  box-shadow: 0 8px 24px rgba(35,31,32,0.08);
  border-top: 3px solid #B08D66;
  position: relative;
  z-index: 2;
}

.gc-404-links-title {
  font-family: 'Libre Baskerville', serif;
  font-size: 28px;
  font-weight: 700;
  color: #4C2A19;
  text-align: center;
  margin-bottom: 32px;
}

.gc-404-links {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}

@media (max-width: 1024px) {
  .gc-404-links {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 767px) {
  .gc-404-links {
    grid-template-columns: 1fr;
  }

  .gc-404-links-section {
    padding: 40px 24px;
    margin: 0 16px;
  }
}

.gc-404-link-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 24px 16px;
  background: #F5F3F0;
  text-decoration: none;
  transition: all 0.3s ease;
}

.gc-404-link-item:hover {
  background: #4C2A19;
  transform: translateY(-4px);
}

.gc-404-link-item svg,
.gc-404-link-item i {
  width: 32px;
  height: 32px;
  color: #B08D66;
  margin-bottom: 12px;
  transition: color 0.3s ease;
}

.gc-404-link-item:hover svg,
.gc-404-link-item:hover i {
  color: #FFFFFF;
}

.gc-404-link-item span {
  font-family: 'Corbel', sans-serif;
  font-size: 16px;
  font-weight: 600;
  color: #4C2A19;
  transition: color 0.3s ease;
}

.gc-404-link-item:hover span {
  color: #FFFFFF;
}

/* Search Section */
.gc-404-search-section {
  background: #F5F3F0;
  padding: 80px 24px;
  text-align: center;
}

.gc-404-search-title {
  font-family: 'Libre Baskerville', serif;
  font-size: 24px;
  font-weight: 700;
  color: #4C2A19;
  margin-bottom: 16px;
}

.gc-404-search-desc {
  font-size: 16px;
  color: #666666;
  margin-bottom: 24px;
}

.gc-404-search {
  max-width: 500px;
  margin: 0 auto;
}

.gc-404-search input[type="search"] {
  width: 100%;
  padding: 16px 18px 16px 50px;
  border: 1px solid #E8DFD5;
  background: #FFFFFF;
  font-size: 16px;
  transition: border-color 0.3s ease;
}

.gc-404-search input[type="search"]:focus {
  border-color: #B08D66;
  outline: none;
  box-shadow: 0 0 0 3px rgba(176,141,102,0.1);
}

/* Contact CTA */
.gc-404-cta {
  background: #4C2A19;
  padding: 60px 24px;
  text-align: center;
}

.gc-404-cta-title {
  font-family: 'Libre Baskerville', serif;
  font-size: 28px;
  font-weight: 700;
  color: #FFFFFF;
  margin-bottom: 16px;
}

.gc-404-cta-message {
  font-size: 17px;
  color: rgba(255,255,255,0.9);
  margin-bottom: 28px;
}

.gc-404-cta-btn {
  display: inline-block;
  background: #B08D66;
  color: #FFFFFF;
  padding: 16px 36px;
  font-size: 14px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.gc-404-cta-btn:hover {
  background: #9A7A58;
  transform: translateY(-2px);
  color: #FFFFFF;
}
```

---

## Implementation Checklist

- [ ] Create Error 404 template in Theme Builder
- [ ] Set conditions: 404 Page
- [ ] Build Section 1: Hero with 404 number, title, message, back button
- [ ] Implement Back button JavaScript handler
- [ ] Build Section 2: Quick Links grid
- [ ] Build Section 3: Search section
- [ ] Build Section 4: Contact CTA (optional)
- [ ] Add custom CSS
- [ ] Test back button with browser history
- [ ] Test back button without history (direct URL)
- [ ] Test all quick links
- [ ] Test search functionality
- [ ] Test responsive behavior at all breakpoints
- [ ] Verify template loads for non-existent URLs

---

## Notes for Implementation

1. **Back Button Priority:** The Back button with JS history fallback is explicitly required in the Site Plan Master document. This is non-negotiable.

2. **Template Assignment:** In Elementor Theme Builder, create the template and set its condition to "Error 404". This automatically applies to all 404 scenarios.

3. **Testing:** Test the 404 page by visiting a URL that doesn't exist, like `/this-page-does-not-exist/`.

4. **History Detection:** The JavaScript checks both `window.history.length` and `document.referrer` to determine if there's meaningful history to navigate back to.

5. **Search Integration:** The search form should use WordPress's native search functionality to search across all public post types.

6. **Quick Links:** Keep the quick links limited to 4-6 most important pages. Don't overwhelm users with too many options.

7. **Warm Tone:** The messaging should be friendly and helpful, not apologetic or technical. "Page not found" is clearer than "404 Error".
