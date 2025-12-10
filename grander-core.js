/**
 * Grander Core JavaScript
 *
 * ARCHITECTURE: Minimal enhancement behaviors only.
 * Layout and complex interactions are handled by Elementor.
 *
 * Features:
 * - Mobile floating call icon
 * - FAQ accordion toggle behavior
 * - Header scroll state
 * - Estimate lightbox open/close
 *
 * @package Grander_Core
 * @since 1.1.0
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
        initEstimateLightbox();
        initSmoothScroll();
    });

    /**
     * Mobile Floating Call Icon
     *
     * Creates a floating phone icon fixed bottom-right on mobile.
     * Only displays when below the breakpoint (CSS handles visibility).
     */
    function initMobileCallIcon() {
        if (!config.phoneClean) {
            return;
        }

        // Check if icon already exists
        if (document.querySelector('.gc-float-call')) {
            return;
        }

        var floatIcon = document.createElement('a');
        floatIcon.href = 'tel:' + config.phoneClean;
        floatIcon.className = 'gc-float-call';
        floatIcon.setAttribute('aria-label', 'Call us at ' + config.phoneNumber);
        floatIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>';

        document.body.appendChild(floatIcon);
    }

    /**
     * FAQ Accordion Behavior
     *
     * Handles expand/collapse for FAQ items.
     * Looks for .gc-faq-question and .gc-contact-faq__question elements.
     */
    function initFAQAccordion() {
        // Generic FAQ accordion
        var questions = document.querySelectorAll('.gc-faq-question');
        questions.forEach(function(question) {
            question.addEventListener('click', handleFAQClick);
            question.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    handleFAQClick.call(this, e);
                }
            });
        });

        // Contact page FAQ variant
        var contactQuestions = document.querySelectorAll('.gc-contact-faq__question');
        contactQuestions.forEach(function(question) {
            question.addEventListener('click', handleContactFAQClick);
            question.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    handleContactFAQClick.call(this, e);
                }
            });
        });
    }

    function handleFAQClick(e) {
        e.preventDefault();
        var item = this.closest('.gc-faq-item');
        if (!item) return;

        var isOpen = item.classList.contains('is-open') || item.classList.contains('gc-faq-item--open');

        // Close other items in same accordion (optional accordion behavior)
        var accordion = item.closest('.gc-faq-accordion-v1');
        if (accordion) {
            accordion.querySelectorAll('.gc-faq-item').forEach(function(otherItem) {
                if (otherItem !== item) {
                    otherItem.classList.remove('is-open', 'gc-faq-item--open');
                }
            });
        }

        // Toggle current item
        item.classList.toggle('is-open', !isOpen);
        item.classList.toggle('gc-faq-item--open', !isOpen);
    }

    function handleContactFAQClick(e) {
        e.preventDefault();
        var item = this.closest('.gc-contact-faq__item');
        if (!item) return;

        var isOpen = item.classList.contains('is-open');

        // Close other items
        var container = item.closest('.gc-contact-faq');
        if (container) {
            container.querySelectorAll('.gc-contact-faq__item').forEach(function(otherItem) {
                if (otherItem !== item) {
                    otherItem.classList.remove('is-open');
                }
            });
        }

        item.classList.toggle('is-open', !isOpen);
    }

    /**
     * Header Scroll State
     *
     * Adds a class to the header when page is scrolled.
     * Elementor handles the actual styling.
     */
    function initHeaderScroll() {
        var header = document.querySelector('.gc-header-stripe');
        if (!header) return;

        var scrollThreshold = 50;

        function updateHeaderState() {
            if (window.scrollY > scrollThreshold) {
                header.classList.add('gc-header-stripe--scrolled');
            } else {
                header.classList.remove('gc-header-stripe--scrolled');
            }
        }

        window.addEventListener('scroll', updateHeaderState, { passive: true });
        updateHeaderState(); // Initial state
    }

    /**
     * Estimate Lightbox
     *
     * Opens/closes the estimate request lightbox modal.
     * Triggers: [data-gc-estimate-trigger], .gc-estimate-trigger
     */
    function initEstimateLightbox() {
        var overlay = document.querySelector('.gc-estimate-lightbox-overlay');
        if (!overlay) return;

        var triggers = document.querySelectorAll('[data-gc-estimate-trigger], .gc-estimate-trigger');
        var closeBtn = overlay.querySelector('.gc-estimate-lightbox__close');

        function openLightbox(e) {
            if (e) e.preventDefault();
            overlay.classList.add('is-active');
            document.body.classList.add('gc-lightbox-open');
        }

        function closeLightbox() {
            overlay.classList.remove('is-active');
            document.body.classList.remove('gc-lightbox-open');
        }

        // Open triggers
        triggers.forEach(function(trigger) {
            trigger.addEventListener('click', openLightbox);
        });

        // Close button
        if (closeBtn) {
            closeBtn.addEventListener('click', closeLightbox);
        }

        // Close on backdrop click
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                closeLightbox();
            }
        });

        // Close on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay.classList.contains('is-active')) {
                closeLightbox();
            }
        });

        // Expose globally for external triggers
        window.gcEstimateLightbox = {
            open: openLightbox,
            close: closeLightbox
        };
    }

    /**
     * Smooth Scroll for Jump Links
     *
     * Handles smooth scrolling for anchor links.
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href');
                if (targetId === '#' || targetId === '#0') return;

                var target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

})();
