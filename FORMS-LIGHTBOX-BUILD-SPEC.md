# Forms & Lightbox System Build Specification

Version: 1.0.0

Complete build instructions for the Grander Construction form system, estimate lightbox, address autocomplete, validation, and styling.

---

## System Overview

The Grander Construction form system consists of:
1. **Master Estimate Form** — Reusable across all contexts
2. **Estimate Lightbox** — Global popup triggered from any CTA
3. **Address Autocomplete** — Google Places integration
4. **Validation System** — Client-side validation with error states
5. **Success/Error States** — Consistent feedback UI

### Form Locations
- Request an Estimate Page (inline)
- Request an Estimate Lightbox (popup)
- Contact Page (inline)
- Home Page (inline, simplified optional)
- Service Page CTAs (trigger lightbox)
- Header CTA (trigger lightbox)

---

## 1. Form Field List — Complete Specification

### Field Order (Mandatory)

| # | Field Name | ID | Type | Required | Notes |
|---|------------|----|----- |----------|-------|
| 1 | First name | `gc_first_name` | text | Yes | |
| 2 | Last name | `gc_last_name` | text | Yes | |
| 3 | Email address | `gc_email` | email | Yes | Must validate format |
| 4 | Phone number | `gc_phone` | tel | Yes | Numeric/phone mask |
| 5 | Project type | `gc_project_type` | select | Yes | Dropdown |
| 6 | Project address | `gc_project_address` | text | Yes | Autocomplete enabled |
| 7 | City | `gc_project_city` | text | Yes | Auto-filled |
| 8 | State | `gc_project_state` | text | Yes | Auto-filled |
| 9 | Project description | `gc_project_description` | textarea | Yes | |
| 10 | Budget range | `gc_budget_range` | select | No | Optional |
| 11 | Desired timeline | `gc_timeline` | select | No | Optional |
| 12 | Submit button | — | submit | — | "Request an estimate" |

### Project Type Options

```
- Custom home
- Outdoor space
- Pool house
- Garage
- ADU
- Sunroom
- Addition
- Porch / Deck / Patio
- Other
```

### Budget Range Options (Optional)

```
- Under $50,000
- $50,000 – $100,000
- $100,000 – $250,000
- $250,000 – $500,000
- $500,000 – $1,000,000
- $1,000,000+
- Not sure yet
```

### Timeline Options

```
- As soon as possible
- 1–3 months
- 3–6 months
- 6–12 months
- 12+ months
```

---

## 2. Elementor Form Template Structure

### Template Name
**GC Estimate Form v1**

### Outer Container Settings

```
Container: .gc-form
├── Width: 100%
├── Max-width: 720px
├── Padding: 32px (desktop), 24px (mobile)
├── Background: #FFFFFF
├── Border-radius: 12px
├── Box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08)
```

### Form Layout Structure

```
Form Container: .gc-form
│
├── Row 1: Two Columns (50/50)
│   ├── Column A: First Name
│   │   ├── Label: "First name"
│   │   ├── Input type: text
│   │   ├── ID: gc_first_name
│   │   ├── Required: yes
│   │   └── Placeholder: "Enter your first name"
│   │
│   └── Column B: Last Name
│       ├── Label: "Last name"
│       ├── Input type: text
│       ├── ID: gc_last_name
│       ├── Required: yes
│       └── Placeholder: "Enter your last name"
│
├── Row 2: Two Columns (50/50)
│   ├── Column A: Email
│   │   ├── Label: "Email address"
│   │   ├── Input type: email
│   │   ├── ID: gc_email
│   │   ├── Required: yes
│   │   └── Placeholder: "you@example.com"
│   │
│   └── Column B: Phone
│       ├── Label: "Phone number"
│       ├── Input type: tel
│       ├── ID: gc_phone
│       ├── Required: yes
│       └── Placeholder: "(555) 555-5555"
│
├── Row 3: Full Width
│   └── Project Type
│       ├── Label: "Project type"
│       ├── Input type: select
│       ├── ID: gc_project_type
│       ├── Required: yes
│       └── Options: [See list above]
│
├── Row 4: Full Width
│   └── Project Address
│       ├── Label: "Project address"
│       ├── Input type: text
│       ├── ID: gc_project_address
│       ├── Required: yes
│       ├── Placeholder: "Start typing your address..."
│       └── Class: gc-address-autocomplete
│
├── Row 5: Two Columns (50/50)
│   ├── Column A: City
│   │   ├── Label: "City"
│   │   ├── Input type: text
│   │   ├── ID: gc_project_city
│   │   ├── Required: yes
│   │   ├── Placeholder: "City"
│   │   └── Note: Auto-filled by autocomplete
│   │
│   └── Column B: State
│       ├── Label: "State"
│       ├── Input type: text
│       ├── ID: gc_project_state
│       ├── Required: yes
│       ├── Placeholder: "SC"
│       └── Note: Auto-filled by autocomplete
│
├── Row 6: Full Width
│   └── Project Description
│       ├── Label: "Tell us about your project"
│       ├── Input type: textarea
│       ├── ID: gc_project_description
│       ├── Required: yes
│       ├── Rows: 5
│       └── Placeholder: "Describe your project goals, ideas, and any specific requirements..."
│
├── Row 7: Two Columns (50/50)
│   ├── Column A: Budget Range
│   │   ├── Label: "Budget range (optional)"
│   │   ├── Input type: select
│   │   ├── ID: gc_budget_range
│   │   ├── Required: no
│   │   └── Options: [See list above]
│   │
│   └── Column B: Timeline
│       ├── Label: "Desired timeline (optional)"
│       ├── Input type: select
│       ├── ID: gc_timeline
│       ├── Required: no
│       └── Options: [See list above]
│
└── Row 8: Full Width
    └── Submit Button
        ├── Text: "Request an estimate"
        ├── Class: gc-btn gc-btn--primary gc-form-submit
        ├── Width: Full width on mobile, auto on desktop
        └── Style: Gold background, Deep Brown text
```

### Responsive Behavior

| Breakpoint | Layout Changes |
|------------|----------------|
| Desktop (>1024px) | Two-column rows as specified |
| Tablet (768-1024px) | Two-column rows, reduced padding |
| Mobile (<768px) | All rows single column, stacked |

---

## 3. Request an Estimate Lightbox Template

### Template Name
**GC Estimate Lightbox v1**

### Lightbox Structure

```
Overlay: .gc-estimate-lightbox-overlay
├── Position: fixed
├── Top/Right/Bottom/Left: 0
├── Background: rgba(0, 0, 0, 0.65)
├── Z-index: 10001
├── Display: none (shown via JS)
│
└── Modal Container: .gc-estimate-lightbox
    ├── Position: relative
    ├── Width: 95%
    ├── Max-width: 900px
    ├── Max-height: 90vh
    ├── Margin: auto
    ├── Background: #FDFBF8 (Warm White)
    ├── Border-radius: 12px
    ├── Overflow-y: auto
    ├── Box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2)
    │
    ├── Close Button: .gc-estimate-lightbox__close
    │   ├── Position: absolute
    │   ├── Top: 16px
    │   ├── Right: 16px
    │   ├── Size: 40px × 40px
    │   ├── Icon: × (close)
    │   └── Hover: Gold background
    │
    └── Content Container: .gc-estimate-lightbox__content
        ├── Display: grid
        ├── Grid: 40% / 60% (desktop)
        ├── Grid: 1fr (mobile, stacked)
        ├── Gap: 0
        │
        ├── Left Column: .gc-estimate-lightbox__info
        │   ├── Background: #4C2A19 (Deep Brown)
        │   ├── Padding: 48px 32px
        │   ├── Color: #FDFBF8 (Warm White)
        │   │
        │   ├── Heading: H2
        │   │   ├── Text: "Request an estimate"
        │   │   ├── Font: Baskerville, 32px
        │   │   ├── Color: Warm White
        │   │   └── Margin-bottom: 24px
        │   │
        │   ├── Text: Reassurance Copy
        │   │   ├── Dynamic: gc_estimate_reassurance_copy
        │   │   ├── Default: "Tell us about your project and we'll provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget."
        │   │   ├── Font: Corbel, 16px
        │   │   ├── Line-height: 1.7
        │   │   ├── Color: rgba(253, 251, 248, 0.85)
        │   │   └── Margin-bottom: 32px
        │   │
        │   └── Mini Trust Bar
        │       ├── Display: flex, gap: 16px
        │       └── Items: HBA icon, BBB icon, "Licensed & Insured" text
        │
        └── Right Column: .gc-estimate-lightbox__form
            ├── Background: #FFFFFF
            ├── Padding: 48px 32px
            │
            └── [Insert: GC Estimate Form v1 template]
```

### Lightbox Trigger

Any element that should open the lightbox must have:

```html
data-gc-estimate-trigger="true"
```

Or use class:
```html
class="gc-estimate-trigger"
```

### Close Behavior

Lightbox closes when:
1. Close button (×) clicked
2. Backdrop (overlay) clicked
3. ESC key pressed
4. Form successfully submitted (after delay)

---

## 4. Google Places Address Autocomplete

### Implementation

The autocomplete system watches the `#gc_project_address` field and auto-fills `#gc_project_city` and `#gc_project_state` when a place is selected.

### JavaScript (Add to grander-core.js)

```javascript
/**
 * Google Places Address Autocomplete
 *
 * Auto-fills city and state from selected address.
 * Requires Google Maps API with Places library loaded.
 */
function initEstimateAddressAutocomplete() {
    var addressInputs = document.querySelectorAll('.gc-address-autocomplete, #gc_project_address');

    if (!addressInputs.length) {
        return;
    }

    // Check if Google Maps API is loaded
    if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
        console.warn('Google Maps API not loaded. Address autocomplete disabled.');
        return;
    }

    addressInputs.forEach(function(addressInput) {
        // Find associated city and state inputs
        var form = addressInput.closest('form') || addressInput.closest('.gc-form');
        if (!form) return;

        var cityInput = form.querySelector('#gc_project_city, [name*="city"]');
        var stateInput = form.querySelector('#gc_project_state, [name*="state"]');

        // Initialize autocomplete
        var autocomplete = new google.maps.places.Autocomplete(addressInput, {
            types: ['address'],
            componentRestrictions: { country: 'us' }
        });

        // Handle place selection
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();

            if (!place.address_components) {
                return;
            }

            var city = '';
            var state = '';

            // Extract city and state from address components
            place.address_components.forEach(function(component) {
                var types = component.types;

                if (types.includes('locality')) {
                    city = component.long_name;
                }
                if (types.includes('administrative_area_level_1')) {
                    state = component.short_name;
                }
            });

            // Fill in the fields
            if (cityInput && city) {
                cityInput.value = city;
                cityInput.dispatchEvent(new Event('change', { bubbles: true }));
            }
            if (stateInput && state) {
                stateInput.value = state;
                stateInput.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });
    });
}
```

### Google Maps API Script

Add this to your site's header (via theme or plugin):

```html
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initEstimateAddressAutocomplete" async defer></script>
```

Or load via WordPress:

```php
// In grander-core plugin
add_action('wp_enqueue_scripts', function() {
    $api_key = get_option('gc_google_maps_api_key', '');
    if ($api_key) {
        wp_enqueue_script(
            'google-places-api',
            'https://maps.googleapis.com/maps/api/js?key=' . $api_key . '&libraries=places',
            array(),
            null,
            true
        );
    }
});
```

---

## 5. Form Validation System

### Validation Rules

| Field | Validation |
|-------|------------|
| First name | Required, min 2 characters |
| Last name | Required, min 2 characters |
| Email | Required, valid email format |
| Phone | Required, phone format (digits, spaces, dashes, parens) |
| Project type | Required, must select option |
| Project address | Required, min 5 characters |
| City | Required |
| State | Required |
| Project description | Required, min 20 characters |
| Budget range | Optional |
| Timeline | Optional |

### Validation JavaScript

```javascript
/**
 * Form Validation System
 *
 * Client-side validation for estimate forms.
 */
function initFormValidation() {
    var forms = document.querySelectorAll('.gc-form');

    if (!forms.length) {
        return;
    }

    forms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            var isValid = validateForm(form);

            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                var firstError = form.querySelector('.gc-field-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });

        // Real-time validation on blur
        var inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                validateField(input);
            });

            // Clear error on input
            input.addEventListener('input', function() {
                clearFieldError(input);
            });
        });
    });
}

function validateForm(form) {
    var isValid = true;
    var requiredFields = form.querySelectorAll('[required]');

    requiredFields.forEach(function(field) {
        if (!validateField(field)) {
            isValid = false;
        }
    });

    return isValid;
}

function validateField(field) {
    var value = field.value.trim();
    var fieldType = field.type;
    var isRequired = field.hasAttribute('required');
    var isValid = true;
    var errorMessage = '';

    // Clear previous error
    clearFieldError(field);

    // Required check
    if (isRequired && !value) {
        isValid = false;
        errorMessage = 'Please complete this required field.';
    }

    // Email validation
    else if (fieldType === 'email' && value) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            isValid = false;
            errorMessage = 'Please enter a valid email address.';
        }
    }

    // Phone validation
    else if (fieldType === 'tel' && value) {
        var phoneRegex = /^[\d\s\-\(\)\+\.]+$/;
        var digitsOnly = value.replace(/\D/g, '');
        if (!phoneRegex.test(value) || digitsOnly.length < 10) {
            isValid = false;
            errorMessage = 'Please enter a valid phone number.';
        }
    }

    // Minimum length checks
    else if (field.id === 'gc_first_name' && value.length < 2) {
        isValid = false;
        errorMessage = 'First name must be at least 2 characters.';
    }
    else if (field.id === 'gc_last_name' && value.length < 2) {
        isValid = false;
        errorMessage = 'Last name must be at least 2 characters.';
    }
    else if (field.id === 'gc_project_description' && value.length < 20) {
        isValid = false;
        errorMessage = 'Please provide more detail about your project (at least 20 characters).';
    }

    // Select validation
    else if (field.tagName === 'SELECT' && isRequired && !value) {
        isValid = false;
        errorMessage = 'Please select an option.';
    }

    // Show error if invalid
    if (!isValid) {
        showFieldError(field, errorMessage);
    }

    return isValid;
}

function showFieldError(field, message) {
    var fieldGroup = field.closest('.elementor-field-group') || field.parentElement;

    field.classList.add('gc-field-error');
    fieldGroup.classList.add('gc-field-group-error');

    // Remove existing error message
    var existingError = fieldGroup.querySelector('.gc-error-message');
    if (existingError) {
        existingError.remove();
    }

    // Add error message
    var errorEl = document.createElement('div');
    errorEl.className = 'gc-error-message';
    errorEl.textContent = message;
    fieldGroup.appendChild(errorEl);
}

function clearFieldError(field) {
    var fieldGroup = field.closest('.elementor-field-group') || field.parentElement;

    field.classList.remove('gc-field-error');
    fieldGroup.classList.remove('gc-field-group-error');

    var errorMessage = fieldGroup.querySelector('.gc-error-message');
    if (errorMessage) {
        errorMessage.remove();
    }
}
```

---

## 6. Lightbox JavaScript

```javascript
/**
 * Estimate Lightbox System
 *
 * Opens/closes the estimate lightbox modal.
 */
function initEstimateLightbox() {
    var overlay = document.querySelector('.gc-estimate-lightbox-overlay');
    var lightbox = document.querySelector('.gc-estimate-lightbox');
    var closeBtn = document.querySelector('.gc-estimate-lightbox__close');
    var triggers = document.querySelectorAll('[data-gc-estimate-trigger], .gc-estimate-trigger');

    if (!overlay || !lightbox) {
        return;
    }

    function openLightbox() {
        overlay.classList.add('is-active');
        document.body.style.overflow = 'hidden';

        // Focus first input after opening
        setTimeout(function() {
            var firstInput = lightbox.querySelector('input, select, textarea');
            if (firstInput) {
                firstInput.focus();
            }
        }, 100);
    }

    function closeLightbox() {
        overlay.classList.remove('is-active');
        document.body.style.overflow = '';
    }

    // Open on trigger click
    triggers.forEach(function(trigger) {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            openLightbox();
        });
    });

    // Close on close button
    if (closeBtn) {
        closeBtn.addEventListener('click', closeLightbox);
    }

    // Close on overlay click (outside modal)
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            closeLightbox();
        }
    });

    // Close on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && overlay.classList.contains('is-active')) {
            closeLightbox();
        }
    });

    // Expose functions globally
    window.gcEstimateLightbox = {
        open: openLightbox,
        close: closeLightbox
    };
}
```

---

## 7. Form CSS Specification

### Complete CSS for Forms

```css
/* ==========================================================================
   Form System - Base Styles
   ========================================================================== */

.gc-form {
    width: 100%;
    max-width: 720px;
}

.gc-form input,
.gc-form select,
.gc-form textarea {
    width: 100%;
    padding: 14px 16px;
    border: 1px solid #D8D8D8;
    border-radius: 6px;
    font-family: var(--gc-font-body);
    font-size: 16px;
    color: var(--gc-text);
    background: #FFFFFF;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    -webkit-appearance: none;
    appearance: none;
}

.gc-form input:focus,
.gc-form select:focus,
.gc-form textarea:focus {
    outline: none;
    border-color: var(--gc-gold);
    box-shadow: 0 0 0 3px rgba(176, 141, 102, 0.15);
}

.gc-form input::placeholder,
.gc-form textarea::placeholder {
    color: #999999;
}

.gc-form label {
    display: block;
    font-family: var(--gc-font-body);
    font-weight: 600;
    font-size: 15px;
    color: var(--gc-text);
    margin-bottom: 8px;
}

.gc-form .elementor-field-group,
.gc-form .gc-field-group {
    margin-bottom: 24px;
}

/* Select dropdown arrow */
.gc-form select {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    padding-right: 40px;
}

/* Textarea */
.gc-form textarea {
    min-height: 140px;
    resize: vertical;
    line-height: 1.6;
}

/* ==========================================================================
   Form System - Error States
   ========================================================================== */

.gc-form input.gc-field-error,
.gc-form select.gc-field-error,
.gc-form textarea.gc-field-error {
    border-color: #C62828;
}

.gc-form input.gc-field-error:focus,
.gc-form select.gc-field-error:focus,
.gc-form textarea.gc-field-error:focus {
    box-shadow: 0 0 0 3px rgba(198, 40, 40, 0.15);
}

.gc-error-message {
    color: #C62828;
    font-size: 13px;
    font-family: var(--gc-font-body);
    margin-top: 6px;
}

.gc-field-group-error label {
    color: #C62828;
}

/* ==========================================================================
   Form System - Success State
   ========================================================================== */

.gc-form-success {
    text-align: center;
    padding: 48px 24px;
}

.gc-form-success__icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 24px;
    background: var(--gc-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.gc-form-success__icon svg {
    width: 32px;
    height: 32px;
    color: var(--gc-deep-brown);
}

.gc-form-success h3 {
    font-family: var(--gc-font-heading);
    font-size: 28px;
    color: var(--gc-deep-brown);
    margin-bottom: 16px;
}

.gc-form-success p {
    font-size: 16px;
    color: var(--gc-text);
    max-width: 400px;
    margin: 0 auto;
    line-height: 1.6;
}

/* ==========================================================================
   Form System - Submit Button
   ========================================================================== */

.gc-form button[type="submit"],
.gc-form .gc-form-submit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 16px 32px;
    background: var(--gc-gold);
    color: var(--gc-deep-brown);
    border: none;
    border-radius: 6px;
    font-family: var(--gc-font-body);
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s ease, transform 0.2s ease;
}

.gc-form button[type="submit"]:hover,
.gc-form .gc-form-submit:hover {
    background: #9A7A58;
    transform: translateY(-1px);
}

.gc-form button[type="submit"]:active,
.gc-form .gc-form-submit:active {
    transform: translateY(0);
}

.gc-form button[type="submit"]:disabled,
.gc-form .gc-form-submit:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

/* Loading state */
.gc-form button[type="submit"].is-loading,
.gc-form .gc-form-submit.is-loading {
    position: relative;
    color: transparent;
    pointer-events: none;
}

.gc-form button[type="submit"].is-loading::after,
.gc-form .gc-form-submit.is-loading::after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    border: 2px solid var(--gc-deep-brown);
    border-top-color: transparent;
    border-radius: 50%;
    animation: gc-spin 0.8s linear infinite;
}

@keyframes gc-spin {
    to { transform: rotate(360deg); }
}

/* ==========================================================================
   Form System - Responsive
   ========================================================================== */

@media (max-width: 767px) {
    .gc-form {
        padding: 24px 16px;
    }

    .gc-form input,
    .gc-form select,
    .gc-form textarea {
        font-size: 16px; /* Prevent zoom on iOS */
    }

    .gc-form button[type="submit"],
    .gc-form .gc-form-submit {
        width: 100%;
    }
}

/* ==========================================================================
   Estimate Lightbox - Overlay
   ========================================================================== */

.gc-estimate-lightbox-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.65);
    z-index: 10001;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.gc-estimate-lightbox-overlay.is-active {
    opacity: 1;
    visibility: visible;
}

/* ==========================================================================
   Estimate Lightbox - Modal
   ========================================================================== */

.gc-estimate-lightbox {
    position: relative;
    width: 100%;
    max-width: 900px;
    max-height: 90vh;
    background: var(--gc-warm-white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.25);
    transform: translateY(20px);
    transition: transform 0.3s ease;
}

.gc-estimate-lightbox-overlay.is-active .gc-estimate-lightbox {
    transform: translateY(0);
}

/* Close button */
.gc-estimate-lightbox__close {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    z-index: 10;
    transition: background 0.2s ease;
}

.gc-estimate-lightbox__close:hover {
    background: rgba(0, 0, 0, 0.1);
}

.gc-estimate-lightbox__close svg {
    width: 24px;
    height: 24px;
    color: var(--gc-text);
}

/* Content grid */
.gc-estimate-lightbox__content {
    display: grid;
    grid-template-columns: 40% 60%;
    max-height: 90vh;
}

/* Left column - Info */
.gc-estimate-lightbox__info {
    background: var(--gc-deep-brown);
    padding: 48px 32px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.gc-estimate-lightbox__info h2 {
    font-family: var(--gc-font-heading);
    font-size: 32px;
    color: var(--gc-warm-white);
    margin: 0 0 24px;
    line-height: 1.2;
}

.gc-estimate-lightbox__info p {
    font-family: var(--gc-font-body);
    font-size: 16px;
    color: rgba(253, 251, 248, 0.85);
    line-height: 1.7;
    margin: 0 0 32px;
}

/* Mini trust bar in lightbox */
.gc-estimate-lightbox__trust {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin-top: auto;
}

.gc-estimate-lightbox__trust-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: rgba(253, 251, 248, 0.7);
}

.gc-estimate-lightbox__trust-item svg {
    width: 20px;
    height: 20px;
    opacity: 0.7;
}

/* Right column - Form */
.gc-estimate-lightbox__form {
    background: #FFFFFF;
    padding: 48px 32px;
    overflow-y: auto;
    max-height: 90vh;
}

.gc-estimate-lightbox__form .gc-form {
    max-width: none;
    padding: 0;
    box-shadow: none;
}

/* ==========================================================================
   Estimate Lightbox - Responsive
   ========================================================================== */

@media (max-width: 900px) {
    .gc-estimate-lightbox__content {
        grid-template-columns: 1fr;
    }

    .gc-estimate-lightbox__info {
        padding: 32px 24px;
    }

    .gc-estimate-lightbox__info h2 {
        font-size: 26px;
    }

    .gc-estimate-lightbox__form {
        padding: 32px 24px;
    }
}

@media (max-width: 600px) {
    .gc-estimate-lightbox-overlay {
        padding: 16px;
    }

    .gc-estimate-lightbox {
        max-height: 95vh;
    }

    .gc-estimate-lightbox__content {
        max-height: 95vh;
    }

    .gc-estimate-lightbox__info {
        padding: 24px 20px;
    }

    .gc-estimate-lightbox__form {
        padding: 24px 20px;
    }
}
```

---

## 8. Integration Instructions

### Header CTA Button

```html
<button class="gc-btn gc-btn--primary gc-estimate-trigger" data-gc-estimate-trigger="true">
    Request an estimate
</button>
```

### Service Page CTA Button

```html
<a href="#" class="gc-btn gc-btn--primary gc-estimate-trigger" data-gc-estimate-trigger="true">
    Get started
</a>
```

### Lightbox HTML Structure (Add to Footer)

```html
<div class="gc-estimate-lightbox-overlay">
    <div class="gc-estimate-lightbox">
        <button class="gc-estimate-lightbox__close" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="gc-estimate-lightbox__content">
            <div class="gc-estimate-lightbox__info">
                <h2>Request an estimate</h2>
                <p>Tell us about your project and we'll provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget.</p>

                <div class="gc-estimate-lightbox__trust">
                    <span class="gc-estimate-lightbox__trust-item">
                        <svg><!-- HBA icon --></svg>
                        HBA Member
                    </span>
                    <span class="gc-estimate-lightbox__trust-item">
                        <svg><!-- BBB icon --></svg>
                        BBB Accredited
                    </span>
                    <span class="gc-estimate-lightbox__trust-item">
                        <svg><!-- Shield icon --></svg>
                        Licensed & Insured
                    </span>
                </div>
            </div>

            <div class="gc-estimate-lightbox__form">
                <!-- Form inserted here via shortcode or template -->
                [grander_estimate_form]
            </div>
        </div>
    </div>
</div>
```

---

## 9. Gravity Forms Integration

If using Gravity Forms instead of custom form:

### Store Shortcode in ACF
Field: `gc_estimate_form_shortcode`
Value: `[gravityform id="1" title="false" description="false" ajax="true"]`

### Form Styling Override

Add class `gc-form` to Gravity Forms wrapper:

```css
.gform_wrapper.gc-form .gfield {
    margin-bottom: 24px;
}

.gform_wrapper.gc-form input:not([type="submit"]),
.gform_wrapper.gc-form select,
.gform_wrapper.gc-form textarea {
    /* Apply same styles as custom form */
}
```

---

## 10. Success Message Content

### Default Success Message

**Heading:** "Thank you!"

**Body:** "Our team will review your project details and contact you within 1-2 business days with next steps."

### Success HTML Structure

```html
<div class="gc-form-success">
    <div class="gc-form-success__icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
    </div>
    <h3>Thank you!</h3>
    <p>Our team will review your project details and contact you within 1-2 business days with next steps.</p>
</div>
```

---

## 11. Page-Specific Implementation

### Request an Estimate Page

```
Section: Two Columns (40/60)
│
├── Left Column
│   ├── H1: "Request an estimate"
│   ├── Text: gc_estimate_reassurance_copy
│   └── Trust Bar (mini version)
│
└── Right Column
    └── [Insert: GC Estimate Form v1]
```

### Contact Page

```
Section: Form Section
│
├── H2: "Send us a message"
│
└── [Insert: GC Estimate Form v1]
    - OR simplified contact form with fewer fields
```

### Home Page (Inline Form)

```
Section: CTA Section with Form
│
├── Left Column
│   ├── H2: "Ready to get started?"
│   └── Text: Brief CTA copy
│
└── Right Column
    └── [Insert: GC Estimate Form v1 or simplified version]
```

---

## 12. Completion Checklist

### Form Template
- [ ] All 12 fields present in correct order
- [ ] Correct field IDs assigned
- [ ] Labels use sentence case
- [ ] Placeholders are helpful
- [ ] Required fields marked
- [ ] Two-column layout on desktop
- [ ] Single column on mobile

### Validation
- [ ] Required fields validated
- [ ] Email format validated
- [ ] Phone format validated
- [ ] Error messages display correctly
- [ ] Errors clear on input

### Autocomplete
- [ ] Google Places API loaded
- [ ] Address field triggers autocomplete
- [ ] City auto-fills
- [ ] State auto-fills

### Lightbox
- [ ] Opens on trigger click
- [ ] Closes on X button
- [ ] Closes on backdrop click
- [ ] Closes on ESC key
- [ ] Scroll locked when open
- [ ] Two-column layout desktop
- [ ] Stacked layout mobile
- [ ] Form functional inside lightbox

### Styling
- [ ] Inputs 48px height
- [ ] 6px border radius
- [ ] Gold focus state
- [ ] Error states red border
- [ ] Success state displays
- [ ] Button matches brand
- [ ] Responsive at all breakpoints

---

End of specification.
