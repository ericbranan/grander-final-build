/**
 * Grander Admin JavaScript
 *
 * Enhances the ACF settings pages with:
 * - Smooth scroll to tab sections
 * - Module navigation highlighting
 * - Page header injection
 *
 * @package Grander_Core
 * @since 1.2.0
 */

(function($) {
    'use strict';

    /**
     * Initialize when document is ready
     */
    $(document).ready(function() {
        initPageHeader();
        initModuleNavigation();
        initTabHighlight();
        initSmoothScrollToTabs();
    });

    /**
     * Inject custom page header above the ACF form
     */
    function initPageHeader() {
        var $form = $('.toplevel_page_grander-settings .wrap');
        if (!$form.length) return;

        // Remove default WordPress H1
        $form.find('> h1').first().hide();

        // Inject custom header
        var headerHtml = `
            <div class="gc-admin-page">
                <div class="gc-admin-header">
                    <h1 class="gc-admin-header__title">Grander Site Settings</h1>
                    <p class="gc-admin-header__description">
                        Configure global settings for the Grander Construction website.
                        Changes here affect site-wide elements like headers, footers, and shared content.
                    </p>
                </div>
                <nav class="gc-admin-nav" role="navigation" aria-label="Settings sections">
                    <a href="#gc-section-announcement" class="gc-admin-nav__item" data-section="announcement">
                        <svg class="gc-admin-nav__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                        </svg>
                        Announcement
                    </a>
                    <a href="#gc-section-contact" class="gc-admin-nav__item" data-section="contact">
                        <svg class="gc-admin-nav__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Contact & Phone
                    </a>
                    <a href="#gc-section-trust" class="gc-admin-nav__item" data-section="trust">
                        <svg class="gc-admin-nav__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        Trust Bar
                    </a>
                    <a href="#gc-section-footer" class="gc-admin-nav__item" data-section="footer">
                        <svg class="gc-admin-nav__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Footer
                    </a>
                    <a href="#gc-section-estimate" class="gc-admin-nav__item" data-section="estimate">
                        <svg class="gc-admin-nav__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Estimate Form
                    </a>
                </nav>
            </div>
        `;

        $form.prepend(headerHtml);
    }

    /**
     * Initialize module navigation click and keyboard handling
     */
    function initModuleNavigation() {
        // Click handler
        $(document).on('click', '.gc-admin-nav__item', function(e) {
            e.preventDefault();
            activateSection($(this));
        });

        // Keyboard handler for accessibility
        $(document).on('keydown', '.gc-admin-nav__item', function(e) {
            // Enter or Space activates the item
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                activateSection($(this));
            }

            // Arrow key navigation
            var $items = $('.gc-admin-nav__item');
            var currentIndex = $items.index(this);

            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                e.preventDefault();
                var nextIndex = (currentIndex + 1) % $items.length;
                $items.eq(nextIndex).focus();
            }

            if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                e.preventDefault();
                var prevIndex = (currentIndex - 1 + $items.length) % $items.length;
                $items.eq(prevIndex).focus();
            }
        });
    }

    /**
     * Activate a navigation section
     */
    function activateSection($item) {
        var section = $item.data('section');

        // Update active state
        $('.gc-admin-nav__item').removeClass('gc-admin-nav__item--active');
        $item.addClass('gc-admin-nav__item--active');

        // Find and click the corresponding ACF tab
        var tabName = mapSectionToTab(section);
        if (tabName) {
            var $tab = $('.acf-tab-group li a').filter(function() {
                return $(this).text().toLowerCase().indexOf(tabName.toLowerCase()) !== -1;
            });

            if ($tab.length) {
                $tab.trigger('click');

                // Scroll to the tab content
                setTimeout(function() {
                    var $tabContent = $('.acf-tab-wrap');
                    if ($tabContent.length) {
                        $('html, body').animate({
                            scrollTop: $tabContent.offset().top - 50
                        }, 300);
                    }
                }, 100);
            }
        }
    }

    /**
     * Map navigation sections to ACF tab names
     */
    function mapSectionToTab(section) {
        var mapping = {
            'announcement': 'Announcement',
            'contact': 'Service Area',
            'trust': 'Trust Bar',
            'footer': 'Footer',
            'estimate': 'Estimate'
        };
        return mapping[section] || section;
    }

    /**
     * Highlight active tab in navigation when clicking ACF tabs
     */
    function initTabHighlight() {
        $(document).on('click', '.acf-tab-group li a', function() {
            var tabText = $(this).text().toLowerCase();
            var $navItems = $('.gc-admin-nav__item');

            $navItems.removeClass('gc-admin-nav__item--active');

            // Find matching nav item
            $navItems.each(function() {
                var section = $(this).data('section');
                var mappedTab = mapSectionToTab(section);

                if (mappedTab && tabText.indexOf(mappedTab.toLowerCase()) !== -1) {
                    $(this).addClass('gc-admin-nav__item--active');
                }
            });
        });
    }

    /**
     * Smooth scroll when clicking tabs
     */
    function initSmoothScrollToTabs() {
        $(document).on('click', '.acf-tab-group li a', function() {
            setTimeout(function() {
                var $activeFields = $('.acf-fields:visible').first();
                if ($activeFields.length) {
                    $('html, body').animate({
                        scrollTop: $activeFields.offset().top - 100
                    }, 200);
                }
            }, 50);
        });
    }

})(jQuery);
