/**
 * Grander Core JavaScript
 *
 * Provides mobile behaviors and small UI enhancements.
 * Does not render layouts - that's Elementor's job.
 *
 * Features:
 * - Mobile floating call icon
 * - FAQ accordion behavior
 * - Header scroll state
 * - Smooth scroll for jump links
 *
 * @package Grander_Core
 * @since 1.0.0
 */

(function() {
    'use strict';

    /**
     * Configuration from PHP
     * Available via granderCoreData global
     */
    var config = window.granderCoreData || {
        phoneNumber: '',
        phoneClean: '',
        breakpoint: 768
    };

    /**
     * Initialize when DOM is ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initMobileCallIcon();
        initFAQAccordion();
        initHeaderScroll();
        initSmoothScroll();
        initMobileMenu();
        initNavColorSwitch();
        initGalleryFilter();
        initProjectLightbox();
        initEstimateLightbox();
        initFormValidation();
        initEstimateAddressAutocomplete();
        initContactFaqAccordion();
        initFaqAccordion();
    });

    /**
     * Mobile Floating Call Icon
     *
     * Creates a floating phone icon fixed bottom-right on mobile.
     * Only displays when below the breakpoint and phone number is set.
     */
    function initMobileCallIcon() {
        if (!config.phoneClean) {
            return;
        }

        // Create the floating icon element
        var floatIcon = document.createElement('a');
        floatIcon.href = 'tel:' + config.phoneClean;
        floatIcon.className = 'gc-float-call';
        floatIcon.setAttribute('aria-label', 'Call us at ' + config.phoneNumber);
        floatIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>';

        document.body.appendChild(floatIcon);

        // The CSS handles show/hide via media query
        // This JS can add additional logic if needed
    }

    /**
     * FAQ Accordion Behavior
     *
     * Handles expand/collapse for FAQ items.
     * Looks for elements with .gc-faq-question class.
     */
    function initFAQAccordion() {
        var questions = document.querySelectorAll('.gc-faq-question');

        if (!questions.length) {
            return;
        }

        questions.forEach(function(question) {
            question.addEventListener('click', function(e) {
                e.preventDefault();

                var item = this.closest('.gc-faq-item');
                if (!item) return;

                var isOpen = item.classList.contains('gc-faq-item--open');

                // Optional: Close all other items (accordion behavior)
                var accordion = item.closest('.gc-faq-accordion-v1');
                if (accordion) {
                    var allItems = accordion.querySelectorAll('.gc-faq-item');
                    allItems.forEach(function(otherItem) {
                        if (otherItem !== item) {
                            otherItem.classList.remove('gc-faq-item--open');
                        }
                    });
                }

                // Toggle current item
                item.classList.toggle('gc-faq-item--open', !isOpen);
            });

            // Keyboard accessibility
            question.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.click();
                }
            });

            // Make focusable
            if (!question.getAttribute('tabindex')) {
                question.setAttribute('tabindex', '0');
                question.setAttribute('role', 'button');
            }
        });
    }

    /**
     * Header Scroll State
     *
     * Adds .gc-header-stripe--scrolled class when page is scrolled.
     * Useful for shadow or background changes.
     */
    function initHeaderScroll() {
        var headerStripe = document.querySelector('.gc-header-stripe');

        if (!headerStripe) {
            return;
        }

        var scrollThreshold = 50;

        function updateScrollState() {
            var scrolled = window.scrollY > scrollThreshold;
            headerStripe.classList.toggle('gc-header-stripe--scrolled', scrolled);
        }

        // Initial check
        updateScrollState();

        // Throttled scroll handler
        var ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateScrollState();
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }

    /**
     * Smooth Scroll for Jump Links
     *
     * Handles smooth scrolling for anchor links on service pages.
     * Only applies to links with hash that target elements on the same page.
     */
    function initSmoothScroll() {
        document.addEventListener('click', function(e) {
            var link = e.target.closest('a[href^="#"]');

            if (!link) return;

            var targetId = link.getAttribute('href');
            if (targetId === '#' || targetId.length < 2) return;

            var target = document.querySelector(targetId);
            if (!target) return;

            e.preventDefault();

            // Calculate offset for sticky header
            var headerStripe = document.querySelector('.gc-header-stripe');
            var offset = headerStripe ? headerStripe.offsetHeight + 20 : 20;

            var targetPosition = target.getBoundingClientRect().top + window.scrollY - offset;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });

            // Update URL hash without jumping
            if (history.pushState) {
                history.pushState(null, null, targetId);
            }
        });
    }

    /**
     * Mobile Menu Toggle
     *
     * Handles opening/closing of mobile menu panel.
     * Works with Elementor's hamburger or custom toggle.
     */
    function initMobileMenu() {
        var menuToggle = document.querySelector('.gc-mobile-menu-toggle');
        var menuPanel = document.querySelector('.gc-mobile-menu-panel');
        var menuOverlay = document.querySelector('.gc-mobile-menu-overlay');
        var menuClose = document.querySelector('.gc-mobile-menu-close');

        // Also support Elementor's default hamburger
        var elementorHamburger = document.querySelector('.elementor-menu-toggle');
        if (elementorHamburger && !menuToggle) {
            menuToggle = elementorHamburger;
        }

        if (!menuToggle && !menuPanel) {
            return;
        }

        function openMenu() {
            if (menuPanel) {
                menuPanel.classList.add('is-open');
            }
            if (menuOverlay) {
                menuOverlay.classList.add('is-visible');
            }
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            if (menuPanel) {
                menuPanel.classList.remove('is-open');
            }
            if (menuOverlay) {
                menuOverlay.classList.remove('is-visible');
            }
            document.body.style.overflow = '';
        }

        if (menuToggle) {
            menuToggle.addEventListener('click', function(e) {
                if (menuPanel) {
                    e.preventDefault();
                    if (menuPanel.classList.contains('is-open')) {
                        closeMenu();
                    } else {
                        openMenu();
                    }
                }
            });
        }

        if (menuClose) {
            menuClose.addEventListener('click', closeMenu);
        }

        if (menuOverlay) {
            menuOverlay.addEventListener('click', closeMenu);
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menuPanel && menuPanel.classList.contains('is-open')) {
                closeMenu();
            }
        });

        // Close menu when clicking a link inside it
        if (menuPanel) {
            var menuLinks = menuPanel.querySelectorAll('a');
            menuLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    // Small delay so navigation can complete
                    setTimeout(closeMenu, 100);
                });
            });
        }
    }

    /**
     * Gallery Filter System
     *
     * Filters project cards by service category and tags.
     * Used on the Gallery page for project filtering.
     */
    function initGalleryFilter() {
        var categoryBtns = document.querySelectorAll('.gc-filter-btn');
        var tagBtns = document.querySelectorAll('.gc-tag-btn:not(.gc-tag-btn--clear)');
        var clearTagBtn = document.querySelector('.gc-tag-btn--clear');
        var projectCards = document.querySelectorAll('.gc-project-card');
        var projectCount = document.querySelector('.gc-gallery-grid__count');
        var emptyState = document.querySelector('.gc-gallery-empty');
        var gridItems = document.querySelector('.gc-gallery-grid__items');

        // Exit if no gallery elements found
        if (!categoryBtns.length && !projectCards.length) {
            return;
        }

        // Track current filter state
        var currentCategory = 'all';
        var activeTags = [];

        /**
         * Filter projects based on current category and tags
         */
        function filterProjects() {
            var visibleCount = 0;

            projectCards.forEach(function(card) {
                var cardCategory = card.dataset.category || '';
                var cardTags = card.dataset.tags ? card.dataset.tags.split(',') : [];

                // Check category match
                var categoryMatch = (currentCategory === 'all' || cardCategory === currentCategory);

                // Check tag match (if tags are active, at least one must match)
                var tagMatch = true;
                if (activeTags.length > 0) {
                    tagMatch = activeTags.some(function(tag) {
                        return cardTags.indexOf(tag) !== -1;
                    });
                }

                // Show or hide card
                if (categoryMatch && tagMatch) {
                    card.style.display = '';
                    card.classList.remove('gc-project-card--hidden');
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                    card.classList.add('gc-project-card--hidden');
                }
            });

            // Update project count
            if (projectCount) {
                var countText = visibleCount === 1 ? 'Showing 1 project' : 'Showing ' + visibleCount + ' projects';
                projectCount.textContent = countText;
            }

            // Show empty state if no results
            if (emptyState && gridItems) {
                if (visibleCount === 0) {
                    emptyState.classList.add('gc-gallery-empty--visible');
                    gridItems.style.display = 'none';
                } else {
                    emptyState.classList.remove('gc-gallery-empty--visible');
                    gridItems.style.display = '';
                }
            }

            // Update URL with filter state
            updateFilterURL();
        }

        /**
         * Update URL hash with current filter state
         */
        function updateFilterURL() {
            if (!history.pushState) return;

            var params = [];
            if (currentCategory !== 'all') {
                params.push('category=' + currentCategory);
            }
            if (activeTags.length > 0) {
                params.push('tags=' + activeTags.join(','));
            }

            var queryString = params.length > 0 ? '?' + params.join('&') : '';
            history.replaceState(null, null, window.location.pathname + queryString);
        }

        /**
         * Parse URL for initial filter state
         */
        function parseFilterURL() {
            var urlParams = new URLSearchParams(window.location.search);

            var category = urlParams.get('category');
            if (category) {
                currentCategory = category;
                // Update button state
                categoryBtns.forEach(function(btn) {
                    btn.classList.toggle('gc-filter-btn--active', btn.dataset.filter === category);
                });
            }

            var tags = urlParams.get('tags');
            if (tags) {
                activeTags = tags.split(',');
                // Update tag button states
                tagBtns.forEach(function(btn) {
                    btn.classList.toggle('gc-tag-btn--active', activeTags.indexOf(btn.dataset.tag) !== -1);
                });
            }
        }

        // Category filter buttons
        categoryBtns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                currentCategory = this.dataset.filter || 'all';

                // Update active state
                categoryBtns.forEach(function(b) {
                    b.classList.remove('gc-filter-btn--active');
                });
                this.classList.add('gc-filter-btn--active');

                filterProjects();
            });
        });

        // Tag filter buttons (toggle behavior)
        tagBtns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                var tag = this.dataset.tag;
                var tagIndex = activeTags.indexOf(tag);

                if (tagIndex === -1) {
                    // Add tag
                    activeTags.push(tag);
                    this.classList.add('gc-tag-btn--active');
                } else {
                    // Remove tag
                    activeTags.splice(tagIndex, 1);
                    this.classList.remove('gc-tag-btn--active');
                }

                filterProjects();
            });
        });

        // Clear all tags button
        if (clearTagBtn) {
            clearTagBtn.addEventListener('click', function(e) {
                e.preventDefault();

                activeTags = [];
                tagBtns.forEach(function(btn) {
                    btn.classList.remove('gc-tag-btn--active');
                });

                filterProjects();
            });
        }

        // Empty state reset button
        if (emptyState) {
            var resetBtn = emptyState.querySelector('.gc-gallery-empty__reset');
            if (resetBtn) {
                resetBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Reset all filters
                    currentCategory = 'all';
                    activeTags = [];

                    categoryBtns.forEach(function(btn) {
                        btn.classList.toggle('gc-filter-btn--active', btn.dataset.filter === 'all');
                    });
                    tagBtns.forEach(function(btn) {
                        btn.classList.remove('gc-tag-btn--active');
                    });

                    filterProjects();
                });
            }
        }

        // Parse URL on load
        parseFilterURL();

        // Initial filter
        filterProjects();
    }

    /**
     * Project Lightbox
     *
     * Opens a detailed lightbox view for project cards.
     * Shows gallery images and project details.
     */
    function initProjectLightbox() {
        var lightbox = document.querySelector('.gc-project-lightbox');
        var backdrop = document.querySelector('.gc-project-lightbox__backdrop');
        var closeBtn = document.querySelector('.gc-project-lightbox__close');
        var prevBtn = document.querySelector('.gc-project-lightbox__prev');
        var nextBtn = document.querySelector('.gc-project-lightbox__next');
        var mainImage = document.querySelector('.gc-project-lightbox__main-image img');
        var thumbsContainer = document.querySelector('.gc-project-lightbox__thumbs');
        var titleEl = document.querySelector('.gc-project-lightbox__title');
        var categoryEl = document.querySelector('.gc-project-lightbox__category');
        var locationEl = document.querySelector('.gc-project-lightbox__location');
        var summaryEl = document.querySelector('.gc-project-lightbox__summary');

        var projectCards = document.querySelectorAll('.gc-project-card');

        if (!lightbox || !projectCards.length) {
            return;
        }

        var currentGallery = [];
        var currentIndex = 0;

        /**
         * Open lightbox with project data
         */
        function openLightbox(projectData) {
            if (!projectData) return;

            // Populate content
            if (titleEl) titleEl.textContent = projectData.title || '';
            if (categoryEl) categoryEl.textContent = projectData.category || '';
            if (locationEl) locationEl.textContent = projectData.location || '';
            if (summaryEl) summaryEl.textContent = projectData.summary || '';

            // Set up gallery
            currentGallery = projectData.gallery || [];
            currentIndex = 0;

            if (currentGallery.length > 0) {
                showImage(0);
                buildThumbnails();
            }

            // Show lightbox
            lightbox.classList.add('gc-project-lightbox--active');
            document.body.classList.add('gc-lightbox-open');

            // Focus close button for accessibility
            if (closeBtn) {
                setTimeout(function() {
                    closeBtn.focus();
                }, 100);
            }
        }

        /**
         * Close lightbox
         */
        function closeLightbox() {
            lightbox.classList.remove('gc-project-lightbox--active');
            document.body.classList.remove('gc-lightbox-open');
        }

        /**
         * Show image at index
         */
        function showImage(index) {
            if (!currentGallery[index] || !mainImage) return;

            currentIndex = index;
            mainImage.src = currentGallery[index].full || currentGallery[index].url;
            mainImage.alt = currentGallery[index].alt || '';

            // Update thumbnail active states
            var thumbs = thumbsContainer ? thumbsContainer.querySelectorAll('.gc-project-lightbox__thumb') : [];
            thumbs.forEach(function(thumb, i) {
                thumb.classList.toggle('gc-project-lightbox__thumb--active', i === index);
            });
        }

        /**
         * Show next image
         */
        function showNext() {
            var nextIndex = (currentIndex + 1) % currentGallery.length;
            showImage(nextIndex);
        }

        /**
         * Show previous image
         */
        function showPrev() {
            var prevIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
            showImage(prevIndex);
        }

        /**
         * Build thumbnail grid
         */
        function buildThumbnails() {
            if (!thumbsContainer) return;

            thumbsContainer.innerHTML = '';

            currentGallery.forEach(function(img, index) {
                var thumb = document.createElement('div');
                thumb.className = 'gc-project-lightbox__thumb';
                if (index === 0) thumb.classList.add('gc-project-lightbox__thumb--active');

                var thumbImg = document.createElement('img');
                thumbImg.src = img.thumbnail || img.url;
                thumbImg.alt = img.alt || '';

                thumb.appendChild(thumbImg);
                thumb.addEventListener('click', function() {
                    showImage(index);
                });

                thumbsContainer.appendChild(thumb);
            });
        }

        /**
         * Extract project data from card element
         */
        function getProjectDataFromCard(card) {
            var data = {
                title: '',
                category: '',
                location: '',
                summary: '',
                gallery: []
            };

            // Get text content
            var titleNode = card.querySelector('.gc-project-card__title');
            var categoryNode = card.querySelector('.gc-project-card__category');
            var locationNode = card.querySelector('.gc-project-card__location');

            if (titleNode) data.title = titleNode.textContent.trim();
            if (categoryNode) data.category = categoryNode.textContent.trim();
            if (locationNode) data.location = locationNode.textContent.trim();

            // Get data attributes
            if (card.dataset.summary) data.summary = card.dataset.summary;
            if (card.dataset.projectId) data.projectId = card.dataset.projectId;

            // Get gallery from data attribute (JSON string)
            if (card.dataset.gallery) {
                try {
                    data.gallery = JSON.parse(card.dataset.gallery);
                } catch (e) {
                    console.warn('Failed to parse gallery data:', e);
                }
            }

            // Fallback: use the card image as gallery
            if (data.gallery.length === 0) {
                var cardImg = card.querySelector('.gc-project-card__image');
                if (cardImg && cardImg.src) {
                    data.gallery = [{
                        url: cardImg.src,
                        full: cardImg.src,
                        thumbnail: cardImg.src,
                        alt: cardImg.alt || data.title
                    }];
                }
            }

            return data;
        }

        // Click handlers for project cards
        projectCards.forEach(function(card) {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                var projectData = getProjectDataFromCard(card);
                openLightbox(projectData);
            });
        });

        // Close button
        if (closeBtn) {
            closeBtn.addEventListener('click', closeLightbox);
        }

        // Backdrop click
        if (backdrop) {
            backdrop.addEventListener('click', closeLightbox);
        }

        // Navigation buttons
        if (prevBtn) {
            prevBtn.addEventListener('click', showPrev);
        }
        if (nextBtn) {
            nextBtn.addEventListener('click', showNext);
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (!lightbox.classList.contains('gc-project-lightbox--active')) return;

            switch (e.key) {
                case 'Escape':
                    closeLightbox();
                    break;
                case 'ArrowLeft':
                    showPrev();
                    break;
                case 'ArrowRight':
                    showNext();
                    break;
            }
        });

        // Expose functions globally
        window.gcProjectLightbox = {
            open: openLightbox,
            close: closeLightbox,
            next: showNext,
            prev: showPrev
        };
    }

    /**
     * Nav Color Switch
     *
     * Switches navigation overlay between light and dark variants
     * based on hero section and scroll position.
     */
    function initNavColorSwitch() {
        var navOverlay = document.querySelector('.gc-nav-overlay');
        var heroSection = document.querySelector('.gc-hero, [data-hero="true"], .elementor-section-height-full');

        if (!navOverlay) {
            return;
        }

        // Get initial variant from hero data attribute or default to light
        var initialVariant = 'light';
        if (heroSection && heroSection.dataset.navVariant) {
            initialVariant = heroSection.dataset.navVariant;
        }

        // Apply initial variant
        navOverlay.classList.remove('gc-nav-overlay--light', 'gc-nav-overlay--dark');
        navOverlay.classList.add('gc-nav-overlay--' + initialVariant);

        // If no hero section, exit early
        if (!heroSection) {
            return;
        }

        // Calculate when to switch colors
        var headerStripe = document.querySelector('.gc-header-stripe');
        var headerHeight = headerStripe ? headerStripe.offsetHeight : 70;

        var ticking = false;

        function updateNavColor() {
            var heroBottom = heroSection.getBoundingClientRect().bottom;
            var switchPoint = headerHeight + 50; // Buffer zone

            if (heroBottom < switchPoint) {
                // Scrolled past hero - switch to dark for visibility
                navOverlay.classList.remove('gc-nav-overlay--light');
                navOverlay.classList.add('gc-nav-overlay--dark');
            } else {
                // Still in hero zone - use original variant
                navOverlay.classList.remove('gc-nav-overlay--light', 'gc-nav-overlay--dark');
                navOverlay.classList.add('gc-nav-overlay--' + initialVariant);
            }
        }

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateNavColor();
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });

        // Initial check
        updateNavColor();
    }

    /**
     * Estimate Lightbox System
     *
     * Opens/closes the estimate lightbox modal.
     * Triggers: [data-gc-estimate-trigger], .gc-estimate-trigger
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
        else if (field.id === 'gc_first_name' && value.length > 0 && value.length < 2) {
            isValid = false;
            errorMessage = 'First name must be at least 2 characters.';
        }
        else if (field.id === 'gc_last_name' && value.length > 0 && value.length < 2) {
            isValid = false;
            errorMessage = 'Last name must be at least 2 characters.';
        }
        else if (field.id === 'gc_project_description' && value.length > 0 && value.length < 20) {
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
        var fieldGroup = field.closest('.elementor-field-group') ||
                         field.closest('.gc-field-group') ||
                         field.parentElement;

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
        var fieldGroup = field.closest('.elementor-field-group') ||
                         field.closest('.gc-field-group') ||
                         field.parentElement;

        field.classList.remove('gc-field-error');
        fieldGroup.classList.remove('gc-field-group-error');

        var errorMessage = fieldGroup.querySelector('.gc-error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }

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
            // Google Maps not loaded yet - might load async
            // We'll expose the function so it can be called when ready
            return;
        }

        addressInputs.forEach(function(addressInput) {
            initAutocompleteForInput(addressInput);
        });
    }

    function initAutocompleteForInput(addressInput) {
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
    }

    /**
     * Contact FAQ Accordion
     *
     * Handles FAQ accordion toggle behavior on the Contact page.
     * Works with .gc-contact-faq__item elements.
     */
    function initContactFaqAccordion() {
        var faqItems = document.querySelectorAll('.gc-contact-faq__item');

        if (!faqItems.length) {
            return;
        }

        faqItems.forEach(function(item) {
            var question = item.querySelector('.gc-contact-faq__question');

            if (!question) {
                return;
            }

            question.addEventListener('click', function() {
                var isOpen = item.classList.contains('is-open');

                // Close all other items (accordion behavior)
                faqItems.forEach(function(otherItem) {
                    if (otherItem !== item) {
                        otherItem.classList.remove('is-open');
                    }
                });

                // Toggle current item
                item.classList.toggle('is-open', !isOpen);
            });

            // Keyboard accessibility
            question.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    question.click();
                }
            });
        });
    }

    /**
     * Generic FAQ Accordion
     *
     * Handles FAQ accordion toggle for any .gc-faq-item elements.
     * Used on Services, Build Process, and other pages with FAQs.
     */
    function initFaqAccordion() {
        var faqItems = document.querySelectorAll('.gc-faq-item');

        if (!faqItems.length) {
            return;
        }

        faqItems.forEach(function(item) {
            var question = item.querySelector('.gc-faq-question, .gc-faq-item__question');

            if (!question) {
                return;
            }

            question.addEventListener('click', function() {
                var isOpen = item.classList.contains('is-open');

                // Close all other items in the same container
                var container = item.closest('.gc-faq-list, .gc-faq-accordion');
                if (container) {
                    var siblings = container.querySelectorAll('.gc-faq-item');
                    siblings.forEach(function(sibling) {
                        if (sibling !== item) {
                            sibling.classList.remove('is-open');
                        }
                    });
                }

                // Toggle current item
                item.classList.toggle('is-open', !isOpen);
            });

            // Keyboard accessibility
            question.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    question.click();
                }
            });
        });
    }

    /**
     * Utility: Debounce function
     *
     * @param {Function} func Function to debounce
     * @param {number} wait Wait time in ms
     * @returns {Function}
     */
    function debounce(func, wait) {
        var timeout;
        return function() {
            var context = this;
            var args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                func.apply(context, args);
            }, wait);
        };
    }

    /**
     * Utility: Check if on mobile
     *
     * @returns {boolean}
     */
    function isMobile() {
        return window.innerWidth < config.breakpoint;
    }

    // Expose utilities if needed
    window.granderCore = {
        isMobile: isMobile,
        debounce: debounce,
        initMobileMenu: initMobileMenu,
        initNavColorSwitch: initNavColorSwitch,
        initGalleryFilter: initGalleryFilter,
        initProjectLightbox: initProjectLightbox,
        initEstimateLightbox: initEstimateLightbox,
        initFormValidation: initFormValidation,
        initEstimateAddressAutocomplete: initEstimateAddressAutocomplete,
        initAutocompleteForInput: initAutocompleteForInput,
        initContactFaqAccordion: initContactFaqAccordion,
        initFaqAccordion: initFaqAccordion
    };

})();

/**
 * Callback for Google Maps API
 * Called when the API is fully loaded
 */
function initGoogleMapsCallback() {
    if (window.granderCore && window.granderCore.initEstimateAddressAutocomplete) {
        window.granderCore.initEstimateAddressAutocomplete();
    }
}
