# Visual QA Checklist

Version: 1.0.0

This checklist provides a systematic approach to testing the Grander Construction website across all pages and breakpoints. Run through this checklist before any staging-to-production deployment.

---

## Testing Breakpoints

Test each page at these viewport widths:

| Category | Width | Device Reference |
|----------|-------|------------------|
| Desktop Wide | 1920px | Large monitor |
| Desktop Standard | 1440px | Standard laptop |
| Desktop Small | 1280px | Small laptop |
| Tablet Landscape | 1024px | iPad Pro landscape |
| Tablet Portrait | 768px | iPad portrait |
| Mobile Large | 414px | iPhone Plus/Max |
| Mobile Standard | 375px | iPhone standard |
| Mobile Small | 320px | iPhone SE/older |

---

## Global Component Tests

### Header
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Logo visible and linked to home | ☐ | ☐ | ☐ | |
| Logo correct variant (light/dark per page) | ☐ | ☐ | ☐ | |
| Navigation menu visible | ☐ | ☐ | N/A | |
| Dropdown menus work on hover | ☐ | ☐ | N/A | |
| "Services" dropdown has no landing page | ☐ | ☐ | ☐ | |
| "Our Approach" dropdown has no landing page | ☐ | ☐ | ☐ | |
| CTA button visible | ☐ | ☐ | ☐ | |
| CTA triggers estimate lightbox | ☐ | ☐ | N/A | |
| CTA links to /request-an-estimate/ on mobile | N/A | N/A | ☐ | |
| Mobile menu toggle visible | N/A | N/A | ☐ | |
| Mobile menu opens/closes | N/A | N/A | ☐ | |
| Mobile menu items work | N/A | N/A | ☐ | |
| Header becomes sticky on scroll | ☐ | ☐ | ☐ | |
| Header background changes on scroll | ☐ | ☐ | ☐ | |

### Footer
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Footer visible on all pages | ☐ | ☐ | ☐ | |
| 4-column layout (desktop) | ☐ | N/A | N/A | |
| 2-column layout (tablet) | N/A | ☐ | N/A | |
| 1-column layout (mobile) | N/A | N/A | ☐ | |
| Logo visible | ☐ | ☐ | ☐ | |
| All navigation links work | ☐ | ☐ | ☐ | |
| Phone number clickable (tel:) | ☐ | ☐ | ☐ | |
| Email clickable (mailto:) | ☐ | ☐ | ☐ | |
| Social icons link correctly | ☐ | ☐ | ☐ | |
| Social icons hover state | ☐ | ☐ | ☐ | |
| Copyright text current year | ☐ | ☐ | ☐ | |
| Legal links work | ☐ | ☐ | ☐ | |

### Estimate Lightbox
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Lightbox opens from any trigger | ☐ | ☐ | N/A | Mobile goes to page |
| 2-column layout (desktop) | ☐ | N/A | N/A | |
| 1-column layout (tablet) | N/A | ☐ | N/A | |
| Close button (X) works | ☐ | ☐ | N/A | |
| Backdrop click closes | ☐ | ☐ | N/A | |
| ESC key closes | ☐ | ☐ | N/A | |
| Form fields visible | ☐ | ☐ | N/A | |
| Form validation works | ☐ | ☐ | N/A | |
| Address autocomplete works | ☐ | ☐ | N/A | |
| Form submission works | ☐ | ☐ | N/A | |
| Success message displays | ☐ | ☐ | N/A | |
| Scroll locked when open | ☐ | ☐ | N/A | |

---

## Page-by-Page Tests

### Home Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Hero full viewport height | ☐ | ☐ | ☐ | |
| Hero background image loads | ☐ | ☐ | ☐ | |
| Hero overlay visible | ☐ | ☐ | ☐ | |
| Hero headline readable | ☐ | ☐ | ☐ | |
| Hero CTA buttons work | ☐ | ☐ | ☐ | |
| Trust bar displays | ☐ | ☐ | ☐ | |
| Introduction section centered | ☐ | ☐ | ☐ | |
| Service cards 2x2 grid | ☐ | N/A | N/A | |
| Service cards 2-column (tablet) | N/A | ☐ | N/A | |
| Service cards stack (mobile) | N/A | N/A | ☐ | |
| Service card links work | ☐ | ☐ | ☐ | |
| Featured projects carousel | ☐ | ☐ | ☐ | |
| Process steps 4-column | ☐ | N/A | N/A | |
| Process steps 2-column (tablet) | N/A | ☐ | N/A | |
| Process steps stack (mobile) | N/A | N/A | ☐ | |
| Testimonials carousel works | ☐ | ☐ | ☐ | |
| Social feed loads (Instagram) | ☐ | ☐ | ☐ | |
| Final CTA visible | ☐ | ☐ | ☐ | |
| Final CTA button works | ☐ | ☐ | ☐ | |

### About Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Hero displays correctly | ☐ | ☐ | ☐ | |
| Story section 2-column | ☐ | ☐ | N/A | |
| Story section stacks (mobile) | N/A | N/A | ☐ | |
| Mission quote styled | ☐ | ☐ | ☐ | |
| Values grid 3-column | ☐ | N/A | N/A | |
| Values stack properly | N/A | ☐ | ☐ | |
| Team teaser CTA works | ☐ | ☐ | ☐ | |
| Credentials badges visible | ☐ | ☐ | ☐ | |

### Our Team Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Leadership section 2-column | ☐ | ☐ | N/A | |
| Leadership stacks (mobile) | N/A | N/A | ☐ | |
| Team grid 3-column | ☐ | N/A | N/A | |
| Team grid 2-column (tablet) | N/A | ☐ | N/A | |
| Team cards stack (mobile) | N/A | N/A | ☐ | |
| Team card hover states | ☐ | ☐ | N/A | |

### Build Process Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Timeline alternating layout | ☐ | ☐ | N/A | |
| Timeline stacks (mobile) | N/A | N/A | ☐ | |
| Step numbers visible | ☐ | ☐ | ☐ | |
| Step images load | ☐ | ☐ | ☐ | |
| FAQ accordion works | ☐ | ☐ | ☐ | |

### Performance Building Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Principles grid 3-column | ☐ | N/A | N/A | |
| Principles 2-column (tablet) | N/A | ☐ | N/A | |
| Principles stack (mobile) | N/A | N/A | ☐ | |
| Stats/benefits section | ☐ | ☐ | ☐ | |
| Checklist section | ☐ | ☐ | ☐ | |

### Service Pages (Custom Homes, Outdoor Spaces, Pool Houses, Sunrooms)
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Hero displays correctly | ☐ | ☐ | ☐ | |
| Service types grid | ☐ | ☐ | ☐ | |
| Featured projects section | ☐ | ☐ | ☐ | |
| FAQ accordion works | ☐ | ☐ | ☐ | |
| CTA section visible | ☐ | ☐ | ☐ | |

### Gallery Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Filter bar visible | ☐ | ☐ | ☐ | |
| Filter buttons work | ☐ | ☐ | ☐ | |
| Filter buttons have active state | ☐ | ☐ | ☐ | |
| Gallery grid 3-column | ☐ | N/A | N/A | |
| Gallery grid 2-column (tablet) | N/A | ☐ | N/A | |
| Gallery grid 1-column (mobile) | N/A | N/A | ☐ | |
| Image hover overlays work | ☐ | ☐ | N/A | |
| Lightbox opens on click | ☐ | ☐ | ☐ | |
| Lightbox navigation works | ☐ | ☐ | ☐ | |
| Lightbox close works | ☐ | ☐ | ☐ | |

### Blog Archive Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Archive title displays | ☐ | ☐ | ☐ | |
| Search form works | ☐ | ☐ | ☐ | |
| Posts grid 3-column | ☐ | N/A | N/A | |
| Posts grid 2-column (tablet) | N/A | ☐ | N/A | |
| Posts stack (mobile) | N/A | N/A | ☐ | |
| Post cards have gold border | ☐ | ☐ | ☐ | |
| Post card hover states | ☐ | ☐ | ☐ | |
| Category badges visible | ☐ | ☐ | ☐ | |
| Pagination works | ☐ | ☐ | ☐ | |

### Single Post Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Back button visible | ☐ | ☐ | ☐ | |
| Back button works | ☐ | ☐ | ☐ | |
| Category badge displays | ☐ | ☐ | ☐ | |
| Post title styled correctly | ☐ | ☐ | ☐ | |
| Meta row (author, date) visible | ☐ | ☐ | ☐ | |
| Featured image loads | ☐ | ☐ | ☐ | |
| Content typography correct | ☐ | ☐ | ☐ | |
| H2/H3 headings styled | ☐ | ☐ | ☐ | |
| Blockquotes styled | ☐ | ☐ | ☐ | |
| Lists styled (gold bullets) | ☐ | ☐ | ☐ | |
| Links styled (gold color) | ☐ | ☐ | ☐ | |
| Author bio box displays | ☐ | ☐ | ☐ | |
| CTA section visible | ☐ | ☐ | ☐ | |
| Comments section visible | ☐ | ☐ | ☐ | |
| Comment form works | ☐ | ☐ | ☐ | |
| Related posts display | ☐ | ☐ | ☐ | |

### Contact Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Hero displays correctly | ☐ | ☐ | ☐ | |
| Intro section 2-column | ☐ | ☐ | N/A | |
| Intro stacks (mobile) | N/A | N/A | ☐ | |
| Contact info card displays | ☐ | ☐ | ☐ | |
| Phone link works | ☐ | ☐ | ☐ | |
| Email link works | ☐ | ☐ | ☐ | |
| Form section displays | ☐ | ☐ | ☐ | |
| Form fields work | ☐ | ☐ | ☐ | |
| Form validation works | ☐ | ☐ | ☐ | |
| Form submits successfully | ☐ | ☐ | ☐ | |
| Map displays | ☐ | ☐ | ☐ | |
| FAQ accordion works | ☐ | ☐ | ☐ | |

### Request an Estimate Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Hero displays correctly | ☐ | ☐ | ☐ | |
| Form section 2-column | ☐ | ☐ | N/A | |
| Form stacks (mobile) | N/A | N/A | ☐ | |
| Info panel displays | ☐ | ☐ | ☐ | |
| Trust badges visible | ☐ | ☐ | ☐ | |
| All form fields work | ☐ | ☐ | ☐ | |
| Address autocomplete works | ☐ | ☐ | ☐ | |
| Form validation works | ☐ | ☐ | ☐ | |
| Form submits successfully | ☐ | ☐ | ☐ | |
| Success message displays | ☐ | ☐ | ☐ | |

### 404 Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| 404 number displays | ☐ | ☐ | ☐ | |
| Title "Page not found" | ☐ | ☐ | ☐ | |
| Message text visible | ☐ | ☐ | ☐ | |
| Back button visible | ☐ | ☐ | ☐ | |
| **Back button works WITH history** | ☐ | ☐ | ☐ | Critical |
| **Back button works WITHOUT history** | ☐ | ☐ | ☐ | Goes to home |
| "Return to homepage" link works | ☐ | ☐ | ☐ | |
| Quick links grid 4-column | ☐ | N/A | N/A | |
| Quick links 2-column (tablet) | N/A | ☐ | N/A | |
| Quick links stack (mobile) | N/A | N/A | ☐ | |
| Quick link hover states | ☐ | ☐ | ☐ | |
| All quick links work | ☐ | ☐ | ☐ | |
| Search section works | ☐ | ☐ | ☐ | |
| Contact CTA visible | ☐ | ☐ | ☐ | |

### Search Results Page
| Test | Desktop | Tablet | Mobile | Notes |
|------|:-------:|:------:|:------:|-------|
| Search query displays | ☐ | ☐ | ☐ | |
| Result count shows | ☐ | ☐ | ☐ | |
| Refine search form works | ☐ | ☐ | ☐ | |
| Results list displays | ☐ | ☐ | ☐ | |
| Result cards have hover state | ☐ | ☐ | ☐ | |
| Result links work | ☐ | ☐ | ☐ | |
| No-results state displays | ☐ | ☐ | ☐ | |

---

## Interactive Element Tests

### Buttons
| Test | Pass | Notes |
|------|:----:|-------|
| Primary buttons have gold background | ☐ | |
| Primary buttons hover (darker gold) | ☐ | |
| Secondary buttons have brown border | ☐ | |
| Secondary buttons hover (fill) | ☐ | |
| Ghost buttons (white) work on dark backgrounds | ☐ | |
| All buttons have cursor: pointer | ☐ | |
| Disabled buttons appear disabled | ☐ | |

### Forms
| Test | Pass | Notes |
|------|:----:|-------|
| Input fields have focus state (gold border) | ☐ | |
| Required fields show error when empty | ☐ | |
| Email validation works | ☐ | |
| Phone validation works | ☐ | |
| Dropdown selects styled | ☐ | |
| Textarea resizable | ☐ | |
| Submit button loading state | ☐ | |
| Error messages display | ☐ | |
| Success messages display | ☐ | |

### FAQ Accordions
| Test | Pass | Notes |
|------|:----:|-------|
| Questions clickable | ☐ | |
| Answers animate open | ☐ | |
| Only one open at a time | ☐ | |
| Toggle icon rotates | ☐ | |

### Gallery Lightbox
| Test | Pass | Notes |
|------|:----:|-------|
| Opens on image click | ☐ | |
| Prev/Next arrows work | ☐ | |
| Counter shows correctly | ☐ | |
| Close button works | ☐ | |
| Backdrop click closes | ☐ | |
| ESC key closes | ☐ | |
| Keyboard navigation works | ☐ | |

---

## Performance Tests

| Test | Target | Actual | Pass |
|------|--------|--------|:----:|
| Largest Contentful Paint (LCP) | < 2.5s | | ☐ |
| First Input Delay (FID) | < 100ms | | ☐ |
| Cumulative Layout Shift (CLS) | < 0.1 | | ☐ |
| Time to Interactive | < 3.8s | | ☐ |
| Total Page Size | < 3MB | | ☐ |
| Image Optimization | Compressed | | ☐ |
| Lazy Loading | Enabled | | ☐ |

---

## Accessibility Tests

| Test | Pass | Notes |
|------|:----:|-------|
| Images have alt text | ☐ | |
| Links have descriptive text | ☐ | |
| Form fields have labels | ☐ | |
| Color contrast passes (4.5:1 min) | ☐ | |
| Focus states visible | ☐ | |
| Skip to content link | ☐ | |
| Headings in logical order | ☐ | |
| ARIA labels where needed | ☐ | |

---

## Cross-Browser Tests

| Browser | Desktop | Mobile | Notes |
|---------|:-------:|:------:|-------|
| Chrome (latest) | ☐ | ☐ | |
| Safari (latest) | ☐ | ☐ | |
| Firefox (latest) | ☐ | ☐ | |
| Edge (latest) | ☐ | N/A | |
| Safari iOS | N/A | ☐ | |
| Chrome Android | N/A | ☐ | |

---

## Final Sign-Off

| Item | Completed | Date | Tester |
|------|:---------:|------|--------|
| All pages tested on desktop | ☐ | | |
| All pages tested on tablet | ☐ | | |
| All pages tested on mobile | ☐ | | |
| All forms tested | ☐ | | |
| 404 back button verified | ☐ | | |
| Lightbox fallbacks verified | ☐ | | |
| Performance audit passed | ☐ | | |
| Accessibility check passed | ☐ | | |
| Cross-browser testing done | ☐ | | |
| Ready for production | ☐ | | |

---

End of Visual QA Checklist.
