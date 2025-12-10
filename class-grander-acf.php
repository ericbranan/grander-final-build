<?php
/**
 * Grander ACF Field Groups Registration
 *
 * Registers all ACF field groups programmatically.
 * All groups have show_in_rest enabled for REST API compatibility.
 *
 * Field naming convention: gc_[context]_[field_name]
 * All field names match Modules 2-4 specifications.
 *
 * @package Grander_Core
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Grander_ACF
 */
class Grander_ACF {

    /**
     * Single instance
     *
     * @var Grander_ACF
     */
    private static $instance = null;

    /**
     * Get instance
     *
     * @return Grander_ACF
     */
    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct() {
        // Register ACF options page
        add_action( 'acf/init', array( $this, 'register_options_page' ) );

        // Register field groups
        add_action( 'acf/init', array( $this, 'register_field_groups' ) );

        // Enable REST API for ACF
        add_filter( 'acf/rest/enabled', '__return_true' );
    }

    /**
     * Register ACF Options Page
     */
    public function register_options_page() {
        if ( function_exists( 'acf_add_options_page' ) ) {
            acf_add_options_page( array(
                'page_title'    => 'Grander Site Settings',
                'menu_title'    => 'Grander Settings',
                'menu_slug'     => 'grander-settings',
                'capability'    => 'manage_options',
                'redirect'      => false,
                'icon_url'      => 'dashicons-admin-home',
                'position'      => 3,
            ) );
        }
    }

    /**
     * Register all field groups
     */
    public function register_field_groups() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        // Global Options
        $this->register_global_options();

        // Page-specific fields
        $this->register_page_hero_fields();
        $this->register_home_fields();
        $this->register_about_fields();
        $this->register_process_fields();
        $this->register_performance_fields();
        $this->register_services_landing_fields();
        $this->register_service_fields();
        $this->register_team_fields();
        $this->register_gallery_fields();
        $this->register_blog_fields();
        $this->register_contact_fields();
        $this->register_estimate_fields();

        // CPT fields
        $this->register_project_fields();
        $this->register_faq_fields();
        $this->register_testimonial_fields();
        $this->register_event_fields();
    }

    /**
     * Global Options Fields
     *
     * Location: Options page
     * Contains: Announcement bar, service area, phone, footer logos, social URLs,
     *           trust bar, testimonials, events, featured projects, FAQs, estimate form
     */
    private function register_global_options() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_global_options',
            'title' => 'Global Site Settings',
            'fields' => array(

                // =============================================================
                // ANNOUNCEMENT BAR TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_announcement',
                    'label' => 'Announcement Bar',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_announcement_enabled',
                    'label' => 'Enable Announcement Bar',
                    'name' => 'gc_announcement_enabled',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_gc_announcement_message',
                    'label' => 'Announcement Message',
                    'name' => 'gc_announcement_message',
                    'type' => 'textarea',
                    'rows' => 2,
                    'instructions' => 'Short message, sentence case. Keep it brief.',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_announcement_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_gc_announcement_button_label',
                    'label' => 'Button Label',
                    'name' => 'gc_announcement_button_label',
                    'type' => 'text',
                    'instructions' => 'Optional. Leave blank for no button.',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_announcement_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_gc_announcement_button_url',
                    'label' => 'Button URL',
                    'name' => 'gc_announcement_button_url',
                    'type' => 'url',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_announcement_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_gc_announcement_style',
                    'label' => 'Announcement Style',
                    'name' => 'gc_announcement_style',
                    'type' => 'select',
                    'choices' => array(
                        'info' => 'Info (neutral)',
                        'accent' => 'Accent (brand gold)',
                        'urgent' => 'Urgent (attention)',
                    ),
                    'default_value' => 'info',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_announcement_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),

                // =============================================================
                // SERVICE AREA TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_service_area',
                    'label' => 'Service Area',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_service_area_enabled',
                    'label' => 'Enable Service Area Line',
                    'name' => 'gc_service_area_enabled',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_gc_service_area_text',
                    'label' => 'Service Area Text',
                    'name' => 'gc_service_area_text',
                    'type' => 'text',
                    'default_value' => 'Proudly serving the Upstate of South Carolina with custom homes and outdoor living.',
                    'instructions' => 'Microline displayed in footer and near CTAs.',
                ),

                // =============================================================
                // HEADER & CONTACT TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_header',
                    'label' => 'Header & Contact',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_phone_number',
                    'label' => 'Phone Number',
                    'name' => 'gc_phone_number',
                    'type' => 'text',
                    'instructions' => 'Used for header Call Now button and mobile floating icon.',
                ),
                array(
                    'key' => 'field_gc_header_estimate_label',
                    'label' => 'Estimate Button Label',
                    'name' => 'gc_header_estimate_label',
                    'type' => 'text',
                    'default_value' => 'Request an estimate',
                ),
                array(
                    'key' => 'field_gc_header_estimate_mode',
                    'label' => 'Estimate Button Mode',
                    'name' => 'gc_header_estimate_mode',
                    'type' => 'select',
                    'choices' => array(
                        'lightbox' => 'Open Lightbox',
                        'page' => 'Link to Page',
                    ),
                    'default_value' => 'lightbox',
                ),
                array(
                    'key' => 'field_gc_header_estimate_url',
                    'label' => 'Estimate Page URL',
                    'name' => 'gc_header_estimate_url',
                    'type' => 'url',
                    'instructions' => 'Used if mode is Link to Page.',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_header_estimate_mode',
                                'operator' => '==',
                                'value' => 'page',
                            ),
                        ),
                    ),
                ),

                // =============================================================
                // FOOTER TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_footer',
                    'label' => 'Footer',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_footer_logo_white',
                    'label' => 'Footer Logo (White)',
                    'name' => 'gc_footer_logo_white',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'White version of logo for dark footer background. SVG or PNG.',
                ),
                array(
                    'key' => 'field_gc_footer_company_statement',
                    'label' => 'Company Statement',
                    'name' => 'gc_footer_company_statement',
                    'type' => 'textarea',
                    'rows' => 3,
                    'instructions' => 'Short statement below logo in footer.',
                ),
                array(
                    'key' => 'field_gc_footer_address',
                    'label' => 'Address',
                    'name' => 'gc_footer_address',
                    'type' => 'textarea',
                    'rows' => 2,
                ),
                array(
                    'key' => 'field_gc_footer_email',
                    'label' => 'Email',
                    'name' => 'gc_footer_email',
                    'type' => 'email',
                ),
                array(
                    'key' => 'field_gc_footer_hba_logo',
                    'label' => 'Home Builders Association Logo',
                    'name' => 'gc_footer_hba_logo',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ),
                array(
                    'key' => 'field_gc_footer_hba_url',
                    'label' => 'HBA URL',
                    'name' => 'gc_footer_hba_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_gc_footer_bbb_logo',
                    'label' => 'Better Business Bureau Logo',
                    'name' => 'gc_footer_bbb_logo',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ),
                array(
                    'key' => 'field_gc_footer_bbb_url',
                    'label' => 'BBB URL',
                    'name' => 'gc_footer_bbb_url',
                    'type' => 'url',
                ),

                // =============================================================
                // SOCIAL TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_social',
                    'label' => 'Social',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_social_instagram_url',
                    'label' => 'Instagram URL',
                    'name' => 'gc_social_instagram_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_gc_social_facebook_url',
                    'label' => 'Facebook URL',
                    'name' => 'gc_social_facebook_url',
                    'type' => 'url',
                ),

                // =============================================================
                // TRUST BAR TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_trust',
                    'label' => 'Trust Bar',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_trust_items',
                    'label' => 'Trust Bar Items',
                    'name' => 'gc_trust_items',
                    'type' => 'repeater',
                    'max' => 5,
                    'layout' => 'block',
                    'button_label' => 'Add Trust Item',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_trust_items__logo',
                            'label' => 'Logo/Icon',
                            'name' => 'logo',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'wrapper' => array( 'width' => '25' ),
                        ),
                        array(
                            'key' => 'field_gc_trust_items__label',
                            'label' => 'Label',
                            'name' => 'label',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '30' ),
                        ),
                        array(
                            'key' => 'field_gc_trust_items__url',
                            'label' => 'URL (optional)',
                            'name' => 'url',
                            'type' => 'url',
                            'wrapper' => array( 'width' => '30' ),
                        ),
                        array(
                            'key' => 'field_gc_trust_items__order',
                            'label' => 'Order',
                            'name' => 'order',
                            'type' => 'number',
                            'instructions' => 'Optional. Use to manually sort items.',
                            'wrapper' => array( 'width' => '15' ),
                        ),
                    ),
                ),

                // =============================================================
                // TESTIMONIALS TAB (Global Options Repeater)
                // =============================================================
                array(
                    'key' => 'field_gc_tab_testimonials',
                    'label' => 'Testimonials',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_testimonials',
                    'label' => 'Testimonials',
                    'name' => 'gc_testimonials',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add Testimonial',
                    'instructions' => 'Global testimonials for slider modules. Can also use Testimonials CPT.',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_testimonials__quote',
                            'label' => 'Quote',
                            'name' => 'quote',
                            'type' => 'textarea',
                            'rows' => 3,
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_gc_testimonials__first_name',
                            'label' => 'First Name',
                            'name' => 'first_name',
                            'type' => 'text',
                            'required' => 1,
                            'wrapper' => array( 'width' => '25' ),
                        ),
                        array(
                            'key' => 'field_gc_testimonials__last_initial',
                            'label' => 'Last Initial',
                            'name' => 'last_initial',
                            'type' => 'text',
                            'required' => 1,
                            'wrapper' => array( 'width' => '25' ),
                        ),
                        array(
                            'key' => 'field_gc_testimonials__location',
                            'label' => 'Location',
                            'name' => 'location',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '25' ),
                        ),
                        array(
                            'key' => 'field_gc_testimonials__project_type',
                            'label' => 'Project Type',
                            'name' => 'project_type',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '25' ),
                        ),
                        array(
                            'key' => 'field_gc_testimonials__source_label',
                            'label' => 'Source Label',
                            'name' => 'source_label',
                            'type' => 'text',
                            'placeholder' => 'Magazine, Google review, etc.',
                            'wrapper' => array( 'width' => '50' ),
                        ),
                        array(
                            'key' => 'field_gc_testimonials__service_category',
                            'label' => 'Service Category',
                            'name' => 'service_category',
                            'type' => 'taxonomy',
                            'taxonomy' => 'service_category',
                            'field_type' => 'select',
                            'allow_null' => 1,
                            'return_format' => 'id',
                            'wrapper' => array( 'width' => '50' ),
                        ),
                    ),
                ),

                // =============================================================
                // EVENTS TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_events',
                    'label' => 'Events',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_events_enabled',
                    'label' => 'Enable Events Strip',
                    'name' => 'gc_events_enabled',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'instructions' => 'Toggle the events strip on Home and Contact pages. Disabled by default for launch.',
                ),
                array(
                    'key' => 'field_gc_events',
                    'label' => 'Upcoming Events',
                    'name' => 'gc_events',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add Event',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_events_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_events__name',
                            'label' => 'Event Name',
                            'name' => 'name',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '50' ),
                        ),
                        array(
                            'key' => 'field_gc_events__location',
                            'label' => 'Location',
                            'name' => 'location',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '50' ),
                        ),
                        array(
                            'key' => 'field_gc_events__summary',
                            'label' => 'Summary',
                            'name' => 'summary',
                            'type' => 'textarea',
                            'rows' => 2,
                        ),
                        array(
                            'key' => 'field_gc_events__date_range',
                            'label' => 'Date Range',
                            'name' => 'date_range',
                            'type' => 'text',
                            'placeholder' => 'January 15-17, 2025',
                            'wrapper' => array( 'width' => '50' ),
                        ),
                        array(
                            'key' => 'field_gc_events__cta_label',
                            'label' => 'CTA Label',
                            'name' => 'cta_label',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '25' ),
                        ),
                        array(
                            'key' => 'field_gc_events__cta_url',
                            'label' => 'CTA URL',
                            'name' => 'cta_url',
                            'type' => 'url',
                            'wrapper' => array( 'width' => '25' ),
                        ),
                    ),
                ),

                // =============================================================
                // FEATURED PROJECTS TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_featured_projects',
                    'label' => 'Featured Projects',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_featured_projects_enabled',
                    'label' => 'Enable Featured Projects',
                    'name' => 'gc_featured_projects_enabled',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_gc_featured_projects',
                    'label' => 'Featured Projects',
                    'name' => 'gc_featured_projects',
                    'type' => 'relationship',
                    'post_type' => array( 'project' ),
                    'filters' => array( 'search', 'taxonomy' ),
                    'return_format' => 'id',
                    'min' => 0,
                    'max' => 6,
                    'instructions' => 'Select 3-6 projects to feature on Home page.',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_featured_projects_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),

                // =============================================================
                // FAQ LIBRARY TAB (Global)
                // =============================================================
                array(
                    'key' => 'field_gc_tab_faq_library',
                    'label' => 'FAQ Library',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_faq_items',
                    'label' => 'FAQ Items',
                    'name' => 'gc_faq_items',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add FAQ',
                    'instructions' => 'Global FAQ library. Tag with context for page-level filtering.',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_faq_items__question',
                            'label' => 'Question',
                            'name' => 'question',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_gc_faq_items__answer',
                            'label' => 'Answer',
                            'name' => 'answer',
                            'type' => 'textarea',
                            'rows' => 4,
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_gc_faq_items__context',
                            'label' => 'Context',
                            'name' => 'context',
                            'type' => 'select',
                            'choices' => array(
                                'build-process' => 'Build Process',
                                'services-general' => 'Services General',
                                'custom-homes' => 'Custom Homes',
                                'outdoor-spaces' => 'Outdoor Spaces',
                                'pool-houses-garages-adus' => 'Pool Houses, Garages, ADUs',
                                'sunrooms-additions' => 'Sunrooms and Additions',
                                'contact' => 'Contact',
                                'estimate' => 'Request an Estimate',
                            ),
                            'multiple' => 1,
                            'ui' => 1,
                            'wrapper' => array( 'width' => '50' ),
                        ),
                        array(
                            'key' => 'field_gc_faq_items__order',
                            'label' => 'Order',
                            'name' => 'order',
                            'type' => 'number',
                            'wrapper' => array( 'width' => '50' ),
                        ),
                    ),
                ),

                // =============================================================
                // ESTIMATE FORM TAB
                // =============================================================
                array(
                    'key' => 'field_gc_tab_estimate_form',
                    'label' => 'Estimate Form',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_estimate_form_shortcode',
                    'label' => 'Gravity Forms Shortcode',
                    'name' => 'gc_estimate_form_shortcode',
                    'type' => 'text',
                    'instructions' => 'Paste the Gravity Forms shortcode here. Example: [gravityform id="1" title="false" description="false"]',
                    'placeholder' => '[gravityform id="1" title="false" description="false"]',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'grander-settings',
                    ),
                ),
            ),
            'show_in_rest' => true,
        ) );
    }

    /**
     * Page Hero Fields
     *
     * Location: All pages
     * Contains: Hero headline, subline, background image, nav variant, trust bar toggle
     */
    private function register_page_hero_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_page_hero',
            'title' => 'Page Hero Settings',
            'fields' => array(
                array(
                    'key' => 'field_gc_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'gc_hero_headline',
                    'type' => 'text',
                    'instructions' => 'Main headline displayed in the hero section.',
                ),
                array(
                    'key' => 'field_gc_hero_subline',
                    'label' => 'Hero Subline',
                    'name' => 'gc_hero_subline',
                    'type' => 'textarea',
                    'rows' => 2,
                    'instructions' => 'Supporting text below the headline.',
                ),
                array(
                    'key' => 'field_gc_hero_background_image',
                    'label' => 'Hero Background Image',
                    'name' => 'gc_hero_background_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'field_gc_hero_nav_variant',
                    'label' => 'Navigation Color Variant',
                    'name' => 'gc_hero_nav_variant',
                    'type' => 'select',
                    'choices' => array(
                        'light' => 'Light (for dark backgrounds)',
                        'dark' => 'Dark (for light backgrounds)',
                    ),
                    'default_value' => 'light',
                    'instructions' => 'Choose text color for overlay navigation based on hero image brightness.',
                ),
                array(
                    'key' => 'field_gc_trust_bar_enabled_on_page',
                    'label' => 'Show Trust Bar on This Page',
                    'name' => 'gc_trust_bar_enabled_on_page',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'instructions' => 'Display the trust bar below the hero on this page.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
            'position' => 'acf_after_title',
            'show_in_rest' => true,
        ) );
    }

    /**
     * Home Page Fields
     *
     * Location: Home page (front page)
     * Contains: Expert offerings intro, performance teaser, testimonial variant
     */
    private function register_home_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_home_fields',
            'title' => 'Home Page Content',
            'fields' => array(
                array(
                    'key' => 'field_gc_home_expert_offerings_intro',
                    'label' => 'Expert Offerings Intro',
                    'name' => 'gc_home_expert_offerings_intro',
                    'type' => 'textarea',
                    'rows' => 4,
                    'instructions' => 'Introductory paragraph above the service cards.',
                ),
                array(
                    'key' => 'field_gc_home_performance_teaser_headline',
                    'label' => 'Performance Teaser Headline',
                    'name' => 'gc_home_performance_teaser_headline',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_gc_home_performance_teaser_body',
                    'label' => 'Performance Teaser Body',
                    'name' => 'gc_home_performance_teaser_body',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_gc_home_testimonial_slider_variant',
                    'label' => 'Testimonial Slider Variant',
                    'name' => 'gc_home_testimonial_slider_variant',
                    'type' => 'select',
                    'choices' => array(
                        'v1' => 'Version 1 (Standard)',
                        'v2' => 'Version 2 (Compact)',
                    ),
                    'default_value' => 'v1',
                    'instructions' => 'Choose which testimonial slider design to use.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ),
                ),
            ),
            'show_in_rest' => true,
        ) );
    }

    /**
     * About Our Company Page Fields
     *
     * Location: About page
     * Contains: Story, mission, values repeater
     */
    private function register_about_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_about_fields',
            'title' => 'About Page Content',
            'fields' => array(
                // Hero Section
                array(
                    'key' => 'field_gc_about_hero_tab',
                    'label' => 'Hero Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_about_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'gc_about_hero_headline',
                    'type' => 'text',
                    'default_value' => 'Crafted for the way you live',
                    'instructions' => 'Main hero headline. H1 element.',
                ),
                array(
                    'key' => 'field_gc_about_hero_subline',
                    'label' => 'Hero Subline',
                    'name' => 'gc_about_hero_subline',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'A home should reflect the personality of its owner and the life that happens inside it.',
                    'instructions' => 'Supporting text below headline.',
                ),
                array(
                    'key' => 'field_gc_about_hero_image',
                    'label' => 'Hero Background Image',
                    'name' => 'gc_about_hero_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Wide landscape image for hero background.',
                ),

                // Story Section
                array(
                    'key' => 'field_gc_about_story_tab',
                    'label' => 'Micah Story',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_about_story_headline',
                    'label' => 'Story Headline',
                    'name' => 'gc_about_story_headline',
                    'type' => 'text',
                    'default_value' => 'Building with integrity since day one',
                    'instructions' => 'Section headline for the founder story.',
                ),
                array(
                    'key' => 'field_gc_about_story_content',
                    'label' => 'Story Content',
                    'name' => 'gc_about_story_content',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'instructions' => 'Full narrative about Micah and Grander origins.',
                ),
                array(
                    'key' => 'field_gc_about_story_image',
                    'label' => 'Story Image',
                    'name' => 'gc_about_story_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Portrait of Micah or representative project photo.',
                ),

                // Values Section
                array(
                    'key' => 'field_gc_about_values_tab',
                    'label' => 'Values',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_about_values_headline',
                    'label' => 'Values Headline',
                    'name' => 'gc_about_values_headline',
                    'type' => 'text',
                    'default_value' => 'What we stand for',
                    'instructions' => 'Section headline for values grid.',
                ),
                array(
                    'key' => 'field_gc_about_values',
                    'label' => 'Company Values',
                    'name' => 'gc_about_values',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'min' => 3,
                    'max' => 6,
                    'button_label' => 'Add Value',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_about_values__icon',
                            'label' => 'Icon',
                            'name' => 'icon',
                            'type' => 'text',
                            'instructions' => 'Icon class (e.g., fas fa-shield) or leave empty.',
                            'wrapper' => array( 'width' => '20' ),
                        ),
                        array(
                            'key' => 'field_gc_about_values__title',
                            'label' => 'Value Title',
                            'name' => 'title',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '30' ),
                        ),
                        array(
                            'key' => 'field_gc_about_values__description',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 3,
                            'wrapper' => array( 'width' => '50' ),
                        ),
                    ),
                ),

                // Why Grander Section
                array(
                    'key' => 'field_gc_about_why_tab',
                    'label' => 'Why Grander',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_about_why_headline',
                    'label' => 'Why Grander Headline',
                    'name' => 'gc_about_why_headline',
                    'type' => 'text',
                    'default_value' => 'Why families choose Grander',
                    'instructions' => 'Section headline.',
                ),
                array(
                    'key' => 'field_gc_about_why_content',
                    'label' => 'Why Grander Content',
                    'name' => 'gc_about_why_content',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'instructions' => 'Content explaining differentiators. Use bold for key phrases.',
                ),
                array(
                    'key' => 'field_gc_about_why_image',
                    'label' => 'Why Grander Image',
                    'name' => 'gc_about_why_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Detail shot showing craftsmanship.',
                ),

                // CTA Section
                array(
                    'key' => 'field_gc_about_cta_tab',
                    'label' => 'CTA',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_about_cta_headline',
                    'label' => 'CTA Headline',
                    'name' => 'gc_about_cta_headline',
                    'type' => 'text',
                    'default_value' => 'Ready to build something meaningful?',
                    'instructions' => 'Final call to action headline.',
                ),
                array(
                    'key' => 'field_gc_about_cta_body',
                    'label' => 'CTA Body',
                    'name' => 'gc_about_cta_body',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Let us show you what thoughtful design and quality construction can do for your family.',
                    'instructions' => 'Supporting text for CTA.',
                ),
                array(
                    'key' => 'field_gc_about_cta_button_label',
                    'label' => 'CTA Button Label',
                    'name' => 'gc_about_cta_button_label',
                    'type' => 'text',
                    'default_value' => 'Request an estimate',
                    'instructions' => 'Button text. Links to estimate lightbox.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'about-our-company',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                    array(
                        'param' => 'post_title',
                        'operator' => '==',
                        'value' => 'About our company',
                    ),
                ),
            ),
            'menu_order' => 10,
            'show_in_rest' => true,
        ) );
    }

    /**
     * Build Process Page Fields
     *
     * Location: Build Process page
     * Contains: Hero, intro, process phases repeater, what to expect, FAQ groups, CTA
     */
    private function register_process_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_process_fields',
            'title' => 'Build Process Content',
            'fields' => array(
                // =============================================================
                // HERO SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_process_hero_tab',
                    'label' => 'Hero Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_process_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'gc_process_hero_headline',
                    'type' => 'text',
                    'default_value' => 'The build process, made clear',
                    'instructions' => 'Main hero headline. H1 element.',
                ),
                array(
                    'key' => 'field_gc_process_hero_subline',
                    'label' => 'Hero Subline',
                    'name' => 'gc_process_hero_subline',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Every project is unique, but our process stays consistent. You will always know what comes next, what decisions are needed, and how your schedule is taking shape.',
                    'instructions' => 'Supporting text below headline.',
                ),
                array(
                    'key' => 'field_gc_process_hero_image',
                    'label' => 'Hero Background Image',
                    'name' => 'gc_process_hero_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Wide landscape image for hero background.',
                ),

                // =============================================================
                // INTRODUCTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_process_intro_tab',
                    'label' => 'Introduction',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_process_intro_headline',
                    'label' => 'Intro Headline',
                    'name' => 'gc_process_intro_headline',
                    'type' => 'text',
                    'default_value' => 'A process built on clarity',
                    'instructions' => 'Section headline for introduction.',
                ),
                array(
                    'key' => 'field_gc_process_intro',
                    'label' => 'Introduction Body',
                    'name' => 'gc_process_intro',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'default_value' => '<p>Building a custom home or outdoor living space is a significant investment of time, energy, and resources. At Grander Construction, we guide you through every phase with transparent communication, realistic timelines, and the kind of attention to detail that leads to exceptional results.</p><p>Our process ensures you are never left wondering what happens next. From the initial consultation through final walkthrough, you will have a clear understanding of milestones, decisions, and deliverables.</p>',
                    'instructions' => 'Two paragraph introduction to the build process.',
                ),

                // =============================================================
                // PROCESS PHASES TAB
                // =============================================================
                array(
                    'key' => 'field_gc_process_phases_tab',
                    'label' => 'Process Phases',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_process_phases_headline',
                    'label' => 'Phases Section Headline',
                    'name' => 'gc_process_phases_headline',
                    'type' => 'text',
                    'default_value' => 'Your journey from vision to reality',
                    'instructions' => 'Headline above the timeline.',
                ),
                array(
                    'key' => 'field_gc_process_phases',
                    'label' => 'Process Phases',
                    'name' => 'gc_process_phases',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add Phase',
                    'instructions' => 'Add 11 phases. Order will be determined by repeater order.',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_process_phases__title',
                            'label' => 'Phase Title',
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                            'wrapper' => array( 'width' => '40' ),
                        ),
                        array(
                            'key' => 'field_gc_process_phases__summary',
                            'label' => 'Phase Summary',
                            'name' => 'summary',
                            'type' => 'textarea',
                            'rows' => 3,
                            'required' => 1,
                            'instructions' => '2-3 sentences describing this phase.',
                            'wrapper' => array( 'width' => '60' ),
                        ),
                        array(
                            'key' => 'field_gc_process_phases__icon',
                            'label' => 'Icon (Optional)',
                            'name' => 'icon',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'instructions' => 'Optional decorative icon for this phase.',
                        ),
                    ),
                ),

                // =============================================================
                // WHAT TO EXPECT TAB
                // =============================================================
                array(
                    'key' => 'field_gc_process_expect_tab',
                    'label' => 'What to Expect',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_process_what_to_expect_heading',
                    'label' => 'What to Expect Heading',
                    'name' => 'gc_process_what_to_expect_heading',
                    'type' => 'text',
                    'default_value' => 'What to expect working with us',
                ),
                array(
                    'key' => 'field_gc_process_what_to_expect_body',
                    'label' => 'What to Expect Body',
                    'name' => 'gc_process_what_to_expect_body',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'default_value' => '<p><strong>Communication that keeps you informed.</strong><br>You will never be left wondering where your project stands. Our team provides regular updates, responds to questions promptly, and keeps you in the loop on any changes or decisions needed.</p><p><strong>Realistic timelines you can trust.</strong><br>We set expectations honestly from the start. When delays occur due to weather, materials, or inspections, you will know immediately and understand how it affects your schedule.</p><p><strong>Decisions made easier.</strong><br>Material selections and design choices can feel overwhelming. We guide you through options, provide clear recommendations, and help you make confident decisions without second-guessing.</p><p><strong>Quality without surprises.</strong><br>Our itemized quotes show exactly where your investment goes. There are no hidden fees or surprise charges. What we quote is what you pay, adjusted only for changes you approve.</p>',
                    'instructions' => 'Content with bold lead-ins for each expectation.',
                ),
                array(
                    'key' => 'field_gc_process_expect_image',
                    'label' => 'What to Expect Image',
                    'name' => 'gc_process_expect_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Supporting image for this section. Craftsmanship detail or team meeting.',
                ),

                // =============================================================
                // FAQ TAB
                // =============================================================
                array(
                    'key' => 'field_gc_process_faq_tab',
                    'label' => 'FAQ Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_process_faq_headline',
                    'label' => 'FAQ Section Headline',
                    'name' => 'gc_process_faq_headline',
                    'type' => 'text',
                    'default_value' => 'Common questions about the process',
                ),
                array(
                    'key' => 'field_gc_process_faq_group',
                    'label' => 'FAQ Context',
                    'name' => 'gc_process_faq_group',
                    'type' => 'select',
                    'choices' => array(
                        'build-process' => 'Build Process',
                    ),
                    'default_value' => 'build-process',
                    'instructions' => 'Which FAQ context to display. Filters FAQs by this context.',
                ),

                // =============================================================
                // CTA TAB
                // =============================================================
                array(
                    'key' => 'field_gc_process_cta_tab',
                    'label' => 'CTA Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_process_cta_headline',
                    'label' => 'CTA Headline',
                    'name' => 'gc_process_cta_headline',
                    'type' => 'text',
                    'default_value' => 'Ready to begin?',
                    'instructions' => 'Final call to action headline.',
                ),
                array(
                    'key' => 'field_gc_process_cta_body',
                    'label' => 'CTA Body',
                    'name' => 'gc_process_cta_body',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Let us walk you through the process and answer your questions. Request an estimate to start the conversation about your custom home or outdoor living project.',
                    'instructions' => 'Supporting text for CTA.',
                ),
                array(
                    'key' => 'field_gc_process_cta_button_label',
                    'label' => 'CTA Button Label',
                    'name' => 'gc_process_cta_button_label',
                    'type' => 'text',
                    'default_value' => 'Request an estimate',
                    'instructions' => 'Button text. Links to estimate lightbox.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'build-process',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                    array(
                        'param' => 'post_title',
                        'operator' => '==',
                        'value' => 'Build Process',
                    ),
                ),
            ),
            'menu_order' => 15,
            'show_in_rest' => true,
        ) );
    }

    /**
     * Performance Building Page Fields
     *
     * Location: Performance Building page
     * Contains: Intro, benefits repeater, practices repeater
     */
    private function register_performance_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_performance_fields',
            'title' => 'Performance Building Content',
            'fields' => array(
                array(
                    'key' => 'field_gc_performance_intro',
                    'label' => 'Performance Intro',
                    'name' => 'gc_performance_intro',
                    'type' => 'textarea',
                    'rows' => 4,
                    'instructions' => 'Why build smart introduction text.',
                ),
                array(
                    'key' => 'field_gc_performance_benefits',
                    'label' => 'Performance Benefits',
                    'name' => 'gc_performance_benefits',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add Benefit',
                    'max' => 4,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_performance_benefits__title',
                            'label' => 'Benefit Title',
                            'name' => 'title',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '30' ),
                        ),
                        array(
                            'key' => 'field_gc_performance_benefits__body',
                            'label' => 'Benefit Body',
                            'name' => 'body',
                            'type' => 'textarea',
                            'rows' => 3,
                            'wrapper' => array( 'width' => '70' ),
                        ),
                        array(
                            'key' => 'field_gc_performance_benefits__icon',
                            'label' => 'Icon',
                            'name' => 'icon',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'wrapper' => array( 'width' => '100' ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_gc_performance_practices',
                    'label' => 'Build Science Practices',
                    'name' => 'gc_performance_practices',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Add Practice',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_performance_practices__label',
                            'label' => 'Practice Label',
                            'name' => 'label',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '30' ),
                        ),
                        array(
                            'key' => 'field_gc_performance_practices__body',
                            'label' => 'Practice Body',
                            'name' => 'body',
                            'type' => 'textarea',
                            'rows' => 2,
                            'wrapper' => array( 'width' => '70' ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'performance-building',
                    ),
                ),
            ),
            'show_in_rest' => true,
        ) );
    }

    /**
     * Services Landing Page Fields
     *
     * Location: Services page
     * Contains: Intro paragraph
     */
    private function register_services_landing_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_services_landing_fields',
            'title' => 'Services Landing Content',
            'fields' => array(
                array(
                    'key' => 'field_gc_services_intro',
                    'label' => 'Services Introduction',
                    'name' => 'gc_services_intro',
                    'type' => 'textarea',
                    'rows' => 4,
                    'instructions' => 'SEO-optimized intro paragraph summarizing all service categories.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'services',
                    ),
                ),
            ),
            'show_in_rest' => true,
        ) );
    }

    /**
     * Service Page Fields (Individual Services)
     *
     * Location: Service pages (custom-homes, outdoor-spaces, pool-houses-garages-adus, sunrooms-additions)
     * Contains: Overview, jump links toggle, portfolio sections, mid CTA, FAQ groups
     */
    private function register_service_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_service_fields',
            'title' => 'Service Page Content',
            'fields' => array(
                array(
                    'key' => 'field_gc_service_overview',
                    'label' => 'Service Overview',
                    'name' => 'gc_service_overview',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'instructions' => '150-180 words describing this service category.',
                ),
                array(
                    'key' => 'field_gc_service_jump_links_enabled',
                    'label' => 'Enable Jump Links',
                    'name' => 'gc_service_jump_links_enabled',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_gc_service_featured_projects',
                    'label' => 'Featured Projects (Override)',
                    'name' => 'gc_service_featured_projects',
                    'type' => 'relationship',
                    'post_type' => array( 'project' ),
                    'filters' => array( 'search', 'taxonomy' ),
                    'return_format' => 'id',
                    'instructions' => 'Optional. Override global featured projects for this service page.',
                ),

                // Portfolio Sections Repeater
                array(
                    'key' => 'field_gc_service_portfolio_sections',
                    'label' => 'Project Portfolio Sections',
                    'name' => 'gc_service_portfolio_sections',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add Project Section',
                    'instructions' => 'Add project showcase sections. Newest projects should be first.',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_service_portfolio_sections__title',
                            'label' => 'Project Title',
                            'name' => 'title',
                            'type' => 'text',
                            'wrapper' => array( 'width' => '50' ),
                        ),
                        array(
                            'key' => 'field_gc_service_portfolio_sections__location',
                            'label' => 'Location',
                            'name' => 'location',
                            'type' => 'text',
                            'placeholder' => 'City, SC',
                            'wrapper' => array( 'width' => '50' ),
                        ),
                        array(
                            'key' => 'field_gc_service_portfolio_sections__summary',
                            'label' => 'Project Summary',
                            'name' => 'summary',
                            'type' => 'textarea',
                            'rows' => 3,
                        ),
                        array(
                            'key' => 'field_gc_service_portfolio_sections__has_design_image',
                            'label' => 'Include Design/Before Image',
                            'name' => 'has_design_image',
                            'type' => 'true_false',
                            'default_value' => 0,
                            'ui' => 1,
                            'instructions' => 'Toggle to show a design rendering or before photo.',
                        ),
                        array(
                            'key' => 'field_gc_service_portfolio_sections__design_image',
                            'label' => 'Design/Before Image',
                            'name' => 'design_image',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'medium',
                            'conditional_logic' => array(
                                array(
                                    array(
                                        'field' => 'field_gc_service_portfolio_sections__has_design_image',
                                        'operator' => '==',
                                        'value' => '1',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'key' => 'field_gc_service_portfolio_sections__gallery',
                            'label' => 'Project Gallery',
                            'name' => 'gallery',
                            'type' => 'gallery',
                            'return_format' => 'array',
                            'preview_size' => 'medium',
                        ),
                    ),
                ),

                // Mid-page CTA
                array(
                    'key' => 'field_gc_service_mid_cta_headline',
                    'label' => 'Mid-Page CTA Headline',
                    'name' => 'gc_service_mid_cta_headline',
                    'type' => 'text',
                    'default_value' => 'Ready to start your project?',
                ),
                array(
                    'key' => 'field_gc_service_mid_cta_body',
                    'label' => 'Mid-Page CTA Body',
                    'name' => 'gc_service_mid_cta_body',
                    'type' => 'textarea',
                    'rows' => 2,
                ),
                array(
                    'key' => 'field_gc_service_estimate_cta_label',
                    'label' => 'Estimate CTA Button Label',
                    'name' => 'gc_service_estimate_cta_label',
                    'type' => 'text',
                    'default_value' => 'Request an estimate',
                ),

                // FAQ Groups
                array(
                    'key' => 'field_gc_service_faq_groups',
                    'label' => 'FAQ Contexts to Display',
                    'name' => 'gc_service_faq_groups',
                    'type' => 'select',
                    'choices' => array(
                        'services-general' => 'Services General',
                        'custom-homes' => 'Custom Homes',
                        'outdoor-spaces' => 'Outdoor Spaces',
                        'pool-houses-garages-adus' => 'Pool Houses, Garages, ADUs',
                        'sunrooms-additions' => 'Sunrooms and Additions',
                    ),
                    'multiple' => 1,
                    'ui' => 1,
                    'instructions' => 'Select which FAQ contexts to show on this service page.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'custom-homes',
                    ),
                ),
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'outdoor-spaces',
                    ),
                ),
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'pool-houses-garages-adus',
                    ),
                ),
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'sunrooms-additions',
                    ),
                ),
            ),
            'show_in_rest' => true,
        ) );
    }

    /**
     * Team Page Fields
     *
     * Location: Team page (our-team)
     * Contains: Hero, intro, team members repeater, mission, promise, gallery, CTA
     */
    private function register_team_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_team_fields',
            'title' => 'Team Page Content',
            'fields' => array(
                // =============================================================
                // HERO SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_team_hero_tab',
                    'label' => 'Hero Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_team_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'gc_team_hero_headline',
                    'type' => 'text',
                    'default_value' => 'Our experts, your vision',
                    'instructions' => 'Main hero headline. H1 element.',
                ),
                array(
                    'key' => 'field_gc_team_hero_subline',
                    'label' => 'Hero Subline',
                    'name' => 'gc_team_hero_subline',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'The team behind every Grander project brings decades of combined experience, a shared commitment to craftsmanship, and a genuine passion for building spaces that families love.',
                    'instructions' => 'Supporting text below headline.',
                ),
                array(
                    'key' => 'field_gc_team_hero_image',
                    'label' => 'Hero Background Image',
                    'name' => 'gc_team_hero_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Wide landscape image for hero background.',
                ),

                // =============================================================
                // INTRODUCTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_team_intro_tab',
                    'label' => 'Introduction',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_team_intro_headline',
                    'label' => 'Intro Headline',
                    'name' => 'gc_team_intro_headline',
                    'type' => 'text',
                    'default_value' => 'Meet the team',
                    'instructions' => 'H2 headline for introduction section.',
                ),
                array(
                    'key' => 'field_gc_team_intro',
                    'label' => 'Team Introduction',
                    'name' => 'gc_team_intro',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'default_value' => '<p>At Grander Construction, our team is the foundation of everything we build. Each member brings unique expertise and a commitment to quality that lasts. From the office to the job site, we work as one team to deliver results clients can depend on.</p><p>We believe that building great spaces starts with building great relationships. When you work with Grander, you work with people who care about your project as much as you do.</p>',
                    'instructions' => 'Two paragraph introduction to the team.',
                ),

                // =============================================================
                // TEAM MEMBERS TAB
                // =============================================================
                array(
                    'key' => 'field_gc_team_members_tab',
                    'label' => 'Team Members',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_team_grid_headline',
                    'label' => 'Team Grid Headline',
                    'name' => 'gc_team_grid_headline',
                    'type' => 'text',
                    'default_value' => 'The Grander team',
                    'instructions' => 'H2 headline above the team grid. Not used for owner highlight section.',
                ),
                array(
                    'key' => 'field_gc_team_members',
                    'label' => 'Team Members',
                    'name' => 'gc_team_members',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add Team Member',
                    'instructions' => 'Add all team members. Mark the owner with the highlight toggle for separate display.',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_gc_team_members__name',
                            'label' => 'Name',
                            'name' => 'name',
                            'type' => 'text',
                            'required' => 1,
                            'wrapper' => array( 'width' => '40' ),
                        ),
                        array(
                            'key' => 'field_gc_team_members__title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                            'wrapper' => array( 'width' => '40' ),
                        ),
                        array(
                            'key' => 'field_gc_team_members__highlight_owner',
                            'label' => 'Highlight as Owner',
                            'name' => 'highlight_owner',
                            'type' => 'true_false',
                            'default_value' => 0,
                            'ui' => 1,
                            'instructions' => 'Display in dedicated owner section.',
                            'wrapper' => array( 'width' => '20' ),
                        ),
                        array(
                            'key' => 'field_gc_team_members__bio',
                            'label' => 'Bio',
                            'name' => 'bio',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'basic',
                            'media_upload' => 0,
                            'required' => 1,
                            'instructions' => '60-90 words for grid cards. Owner bio can be longer (3 paragraphs).',
                        ),
                        array(
                            'key' => 'field_gc_team_members__photo',
                            'label' => 'Photo',
                            'name' => 'photo',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'medium',
                            'required' => 1,
                            'instructions' => 'Professional headshot. 3:4 aspect ratio recommended.',
                        ),
                    ),
                ),

                // =============================================================
                // MISSION & PROMISE TAB
                // =============================================================
                array(
                    'key' => 'field_gc_team_mission_tab',
                    'label' => 'Mission & Promise',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_team_mission',
                    'label' => 'Mission Statement',
                    'name' => 'gc_team_mission',
                    'type' => 'textarea',
                    'rows' => 4,
                    'default_value' => 'To design and build spaces that embody individuality, purpose, and enduring excellence. Guided by our motto, Grandeur by Design. Built with Purpose, we blend innovative craftsmanship with personalized service to create custom homes and outdoor living spaces that last for generations.',
                    'instructions' => 'Company mission statement.',
                ),
                array(
                    'key' => 'field_gc_team_promise',
                    'label' => 'Team Promise',
                    'name' => 'gc_team_promise',
                    'type' => 'textarea',
                    'rows' => 4,
                    'default_value' => 'We promise to lead every build with clarity, craftsmanship, and care, delivering spaces that honor your vision and protect your investment. From first conversation to final walkthrough, you will experience transparent communication, honest guidance, and the kind of attention to detail that defines exceptional work.',
                    'instructions' => 'Promise to clients.',
                ),

                // =============================================================
                // GALLERY TAB
                // =============================================================
                array(
                    'key' => 'field_gc_team_gallery_tab',
                    'label' => 'Behind the Scenes',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_team_gallery_headline',
                    'label' => 'Gallery Headline',
                    'name' => 'gc_team_gallery_headline',
                    'type' => 'text',
                    'default_value' => 'Behind the scenes',
                    'instructions' => 'H2 headline for gallery section.',
                ),
                array(
                    'key' => 'field_gc_team_gallery_subtext',
                    'label' => 'Gallery Subtext',
                    'name' => 'gc_team_gallery_subtext',
                    'type' => 'text',
                    'default_value' => 'A look at our team in action',
                    'instructions' => 'Supporting text below headline.',
                ),
                array(
                    'key' => 'field_gc_team_gallery',
                    'label' => 'Gallery Images',
                    'name' => 'gc_team_gallery',
                    'type' => 'gallery',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'min' => 4,
                    'max' => 12,
                    'instructions' => '6-8 images recommended. Include: team on job site, meetings, craftsmanship details, celebrations, community events.',
                ),

                // =============================================================
                // CTA SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_team_cta_tab',
                    'label' => 'CTA Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_team_cta_headline',
                    'label' => 'CTA Headline',
                    'name' => 'gc_team_cta_headline',
                    'type' => 'text',
                    'default_value' => 'Ready to meet the team?',
                    'instructions' => 'Final call to action headline.',
                ),
                array(
                    'key' => 'field_gc_team_cta_body',
                    'label' => 'CTA Body',
                    'name' => 'gc_team_cta_body',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Schedule a consultation to discuss your project with the people who will bring it to life. We look forward to learning about your vision and showing you what Grander craftsmanship can create.',
                    'instructions' => 'Supporting text for CTA.',
                ),
                array(
                    'key' => 'field_gc_team_cta_button_label',
                    'label' => 'CTA Button Label',
                    'name' => 'gc_team_cta_button_label',
                    'type' => 'text',
                    'default_value' => 'Request a consultation',
                    'instructions' => 'Button text. Links to estimate lightbox.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'our-team',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                    array(
                        'param' => 'post_title',
                        'operator' => '==',
                        'value' => 'Our Team',
                    ),
                ),
            ),
            'menu_order' => 20,
            'show_in_rest' => true,
        ) );
    }

    /**
     * Gallery Page Fields
     *
     * Location: Gallery page
     * Contains: Hero, intro, filter toggle, CTA
     */
    private function register_gallery_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_gallery_fields',
            'title' => 'Gallery Page Content',
            'fields' => array(
                // =============================================================
                // HERO SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_gallery_hero_tab',
                    'label' => 'Hero Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_gallery_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'gc_gallery_hero_headline',
                    'type' => 'text',
                    'default_value' => 'Our project gallery',
                    'instructions' => 'Main hero headline. H1 element.',
                ),
                array(
                    'key' => 'field_gc_gallery_hero_subline',
                    'label' => 'Hero Subline',
                    'name' => 'gc_gallery_hero_subline',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'A curated collection of custom homes and outdoor living spaces built with purpose across Upstate South Carolina. Browse by category or explore the full portfolio.',
                    'instructions' => 'Supporting text below headline.',
                ),
                array(
                    'key' => 'field_gc_gallery_hero_image',
                    'label' => 'Hero Background Image',
                    'name' => 'gc_gallery_hero_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Wide landscape image for hero background.',
                ),

                // =============================================================
                // INTRODUCTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_gallery_intro_tab',
                    'label' => 'Introduction',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_gallery_intro',
                    'label' => 'Gallery Introduction',
                    'name' => 'gc_gallery_intro',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'default_value' => '<p>Every project in this gallery represents a family\'s vision brought to life through thoughtful design and quality construction. From full custom home builds to outdoor living transformations, each space reflects the Grander commitment to craftsmanship, durability, and personalized service. We invite you to explore and imagine what we might create together.</p>',
                    'instructions' => 'Introduction paragraph above the gallery grid.',
                ),

                // =============================================================
                // FILTERS TAB
                // =============================================================
                array(
                    'key' => 'field_gc_gallery_filters_tab',
                    'label' => 'Filters',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_gallery_filter_enabled',
                    'label' => 'Enable Filter Bar',
                    'name' => 'gc_gallery_filter_enabled',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'instructions' => 'Show the service category and tag filters above the grid.',
                ),
                array(
                    'key' => 'field_gc_gallery_show_tags',
                    'label' => 'Show Tag Filters',
                    'name' => 'gc_gallery_show_tags',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'instructions' => 'Show the project tag filter row (features like fireplace, pool, etc.).',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_gallery_filter_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_gc_gallery_projects_per_page',
                    'label' => 'Projects Per Page',
                    'name' => 'gc_gallery_projects_per_page',
                    'type' => 'number',
                    'default_value' => 12,
                    'min' => 6,
                    'max' => 24,
                    'step' => 3,
                    'instructions' => 'Number of projects to show before Load More. Multiples of 3 recommended.',
                ),

                // =============================================================
                // CTA SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_gallery_cta_tab',
                    'label' => 'CTA Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_gallery_cta_headline',
                    'label' => 'CTA Headline',
                    'name' => 'gc_gallery_cta_headline',
                    'type' => 'text',
                    'default_value' => 'Ready to see your vision come to life?',
                    'instructions' => 'Final call to action headline.',
                ),
                array(
                    'key' => 'field_gc_gallery_cta_body',
                    'label' => 'CTA Body',
                    'name' => 'gc_gallery_cta_body',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Every project in our gallery started with a conversation. Whether you have a clear plan or just the beginning of an idea, our team is ready to help you explore the possibilities.',
                    'instructions' => 'Supporting text for CTA.',
                ),
                array(
                    'key' => 'field_gc_gallery_cta_button_label',
                    'label' => 'CTA Button Label',
                    'name' => 'gc_gallery_cta_button_label',
                    'type' => 'text',
                    'default_value' => 'Request an estimate',
                    'instructions' => 'Button text. Links to estimate lightbox.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'gallery',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                    array(
                        'param' => 'post_title',
                        'operator' => '==',
                        'value' => 'Gallery',
                    ),
                ),
            ),
            'menu_order' => 25,
            'show_in_rest' => true,
        ) );
    }

    /**
     * Blog Archive Page Fields
     *
     * Location: Blog page (The Blueprint)
     * Contains: Hero headline, intro, background image
     */
    private function register_blog_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_blog_fields',
            'title' => 'Blog Archive Content',
            'fields' => array(
                // =============================================================
                // HERO SECTION
                // =============================================================
                array(
                    'key' => 'field_gc_blog_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'gc_blog_hero_headline',
                    'type' => 'text',
                    'default_value' => 'The Blueprint',
                    'instructions' => 'Main hero headline. H1 element.',
                ),
                array(
                    'key' => 'field_gc_blog_hero_intro',
                    'label' => 'Hero Introduction',
                    'name' => 'gc_blog_hero_intro',
                    'type' => 'textarea',
                    'rows' => 4,
                    'default_value' => 'Practical ideas, project highlights, and expert guidance for homeowners planning custom builds and outdoor living spaces in Upstate South Carolina. From material choices to design inspiration, our team shares the insights that help you build with confidence.',
                    'instructions' => 'SEO-friendly intro paragraph for the blog archive.',
                ),
                array(
                    'key' => 'field_gc_blog_hero_image',
                    'label' => 'Hero Background Image',
                    'name' => 'gc_blog_hero_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Wide landscape image for hero background.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'blog',
                    ),
                ),
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'the-blueprint',
                    ),
                ),
            ),
            'menu_order' => 30,
            'show_in_rest' => true,
        ) );

        // =============================================================
        // SINGLE POST FIELDS
        // =============================================================
        acf_add_local_field_group( array(
            'key' => 'group_gc_post_fields',
            'title' => 'Post Settings',
            'fields' => array(
                array(
                    'key' => 'field_gc_post_subtitle',
                    'label' => 'Post Subtitle',
                    'name' => 'gc_post_subtitle',
                    'type' => 'text',
                    'instructions' => 'Optional subtitle displayed below the main title.',
                ),
                array(
                    'key' => 'field_gc_post_hide_author',
                    'label' => 'Hide Author Box',
                    'name' => 'gc_post_hide_author',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'instructions' => 'Hide the author box on this post.',
                ),
                array(
                    'key' => 'field_gc_post_hide_related',
                    'label' => 'Hide Related Posts',
                    'name' => 'gc_post_hide_related',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'instructions' => 'Hide the related posts section on this post.',
                ),
                array(
                    'key' => 'field_gc_post_cta_tab',
                    'label' => 'CTA Override',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_post_custom_cta_headline',
                    'label' => 'Custom CTA Headline',
                    'name' => 'gc_post_custom_cta_headline',
                    'type' => 'text',
                    'instructions' => 'Override the default CTA headline. Leave blank to use default.',
                ),
                array(
                    'key' => 'field_gc_post_custom_cta_body',
                    'label' => 'Custom CTA Body',
                    'name' => 'gc_post_custom_cta_body',
                    'type' => 'textarea',
                    'rows' => 2,
                    'instructions' => 'Override the default CTA body. Leave blank to use default.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ),
                ),
            ),
            'position' => 'side',
            'menu_order' => 0,
            'show_in_rest' => true,
        ) );
    }

    /**
     * Contact Page Fields
     *
     * Location: Contact page
     * Contains: Hero, intro, contact info, form, map, FAQ, CTA
     */
    private function register_contact_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_contact_fields',
            'title' => 'Contact Page Content',
            'fields' => array(
                // =============================================================
                // HERO SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_contact_hero_tab',
                    'label' => 'Hero Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_contact_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'gc_contact_hero_headline',
                    'type' => 'text',
                    'default_value' => 'Get in touch',
                    'instructions' => 'Main hero headline. H1 element.',
                ),
                array(
                    'key' => 'field_gc_contact_hero_subline',
                    'label' => 'Hero Subline',
                    'name' => 'gc_contact_hero_subline',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Whether you have a question, want to discuss a project, or are ready to get started, we are here to help. Reach out and a member of our team will respond promptly.',
                    'instructions' => 'Supporting text below headline.',
                ),
                array(
                    'key' => 'field_gc_contact_hero_image',
                    'label' => 'Hero Background Image',
                    'name' => 'gc_contact_hero_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Wide landscape image for hero background.',
                ),

                // =============================================================
                // INTRODUCTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_contact_intro_tab',
                    'label' => 'Introduction',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_contact_intro_headline',
                    'label' => 'Intro Headline',
                    'name' => 'gc_contact_intro_headline',
                    'type' => 'text',
                    'default_value' => 'Let\'s start a conversation',
                    'instructions' => 'H2 headline for the intro section.',
                ),
                array(
                    'key' => 'field_gc_contact_intro',
                    'label' => 'Contact Introduction',
                    'name' => 'gc_contact_intro',
                    'type' => 'textarea',
                    'rows' => 4,
                    'default_value' => 'Every great project begins with a conversation. Whether you are exploring ideas for a custom home, planning an outdoor living space, or have questions about our process, we would love to hear from you. Our team is committed to responsive communication and will follow up within one business day.',
                    'instructions' => 'Introduction paragraph for the contact section.',
                ),

                // =============================================================
                // CONTACT INFO TAB
                // =============================================================
                array(
                    'key' => 'field_gc_contact_info_tab',
                    'label' => 'Contact Info',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_contact_phone',
                    'label' => 'Phone Number',
                    'name' => 'gc_contact_phone',
                    'type' => 'text',
                    'default_value' => '(864) 555-0123',
                    'instructions' => 'Main phone number.',
                ),
                array(
                    'key' => 'field_gc_contact_email',
                    'label' => 'Email Address',
                    'name' => 'gc_contact_email',
                    'type' => 'email',
                    'default_value' => 'info@granderconstruction.com',
                    'instructions' => 'Main contact email.',
                ),
                array(
                    'key' => 'field_gc_contact_address_line1',
                    'label' => 'Address Line 1',
                    'name' => 'gc_contact_address_line1',
                    'type' => 'text',
                    'default_value' => '123 Main Street',
                    'instructions' => 'Street address.',
                ),
                array(
                    'key' => 'field_gc_contact_address_line2',
                    'label' => 'Address Line 2',
                    'name' => 'gc_contact_address_line2',
                    'type' => 'text',
                    'default_value' => 'Greenville, SC 29601',
                    'instructions' => 'City, state, zip.',
                ),
                array(
                    'key' => 'field_gc_contact_hours',
                    'label' => 'Office Hours',
                    'name' => 'gc_contact_hours',
                    'type' => 'text',
                    'default_value' => 'Monday - Friday: 8:00 AM - 5:00 PM',
                    'instructions' => 'Business hours display.',
                ),
                array(
                    'key' => 'field_gc_contact_service_area_text',
                    'label' => 'Service Area Text',
                    'name' => 'gc_contact_service_area_text',
                    'type' => 'text',
                    'default_value' => 'Proudly serving Upstate South Carolina',
                    'instructions' => 'Service area badge text.',
                ),

                // =============================================================
                // FORM SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_contact_form_tab',
                    'label' => 'Form Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_contact_form_headline',
                    'label' => 'Form Section Headline',
                    'name' => 'gc_contact_form_headline',
                    'type' => 'text',
                    'default_value' => 'Send us a message',
                    'instructions' => 'H2 headline above the form.',
                ),
                array(
                    'key' => 'field_gc_contact_form_subtext',
                    'label' => 'Form Section Subtext',
                    'name' => 'gc_contact_form_subtext',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Share some details about your project or question and we will be in touch within one business day.',
                    'instructions' => 'Supporting text below the form headline.',
                ),
                array(
                    'key' => 'field_gc_contact_form_shortcode',
                    'label' => 'Form Shortcode',
                    'name' => 'gc_contact_form_shortcode',
                    'type' => 'text',
                    'instructions' => 'Gravity Forms shortcode, e.g., [gravityform id="1" title="false" description="false"]',
                ),

                // =============================================================
                // MAP SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_contact_map_tab',
                    'label' => 'Map Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_contact_map_headline',
                    'label' => 'Map Section Headline',
                    'name' => 'gc_contact_map_headline',
                    'type' => 'text',
                    'default_value' => 'Our service area',
                    'instructions' => 'H2 headline for the map section.',
                ),
                array(
                    'key' => 'field_gc_contact_map_intro',
                    'label' => 'Map Introduction',
                    'name' => 'gc_contact_map_intro',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Grander Construction proudly serves homeowners throughout Upstate South Carolina and select areas of Western North Carolina. Our focus on quality means we limit projects to maintain the craftsmanship our clients expect.',
                    'instructions' => 'Description text in the map info panel.',
                ),
                array(
                    'key' => 'field_gc_contact_map_areas',
                    'label' => 'Service Areas List',
                    'name' => 'gc_contact_map_areas',
                    'type' => 'textarea',
                    'rows' => 6,
                    'default_value' => "Greenville\nSpartanburg\nGrinder\nSimpsonville\nFountain Inn\nTravelers Rest\nMauldin\nAnderson",
                    'instructions' => 'One area per line. Displayed as a bulleted list.',
                ),
                array(
                    'key' => 'field_gc_contact_map_embed',
                    'label' => 'Map Embed Code',
                    'name' => 'gc_contact_map_embed',
                    'type' => 'textarea',
                    'rows' => 4,
                    'instructions' => 'Paste the Google Maps iframe embed code here.',
                ),

                // =============================================================
                // FAQ SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_contact_faq_tab',
                    'label' => 'FAQ Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_contact_faq_headline',
                    'label' => 'FAQ Section Headline',
                    'name' => 'gc_contact_faq_headline',
                    'type' => 'text',
                    'default_value' => 'Common questions',
                    'instructions' => 'H2 headline for the FAQ section.',
                ),
                array(
                    'key' => 'field_gc_contact_faq_subtext',
                    'label' => 'FAQ Section Subtext',
                    'name' => 'gc_contact_faq_subtext',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Answers to the questions we hear most often from homeowners exploring custom builds and outdoor living projects.',
                    'instructions' => 'Supporting text below the FAQ headline.',
                ),
                array(
                    'key' => 'field_gc_contact_faq_group',
                    'label' => 'FAQ Group',
                    'name' => 'gc_contact_faq_group',
                    'type' => 'taxonomy',
                    'taxonomy' => 'faq_group',
                    'field_type' => 'select',
                    'allow_null' => 0,
                    'return_format' => 'id',
                    'instructions' => 'Which FAQ group to display. Select "contact" for contact-specific questions.',
                ),

                // =============================================================
                // CTA SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_contact_cta_tab',
                    'label' => 'CTA Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_contact_cta_headline',
                    'label' => 'CTA Headline',
                    'name' => 'gc_contact_cta_headline',
                    'type' => 'text',
                    'default_value' => 'Ready to discuss your project?',
                    'instructions' => 'Final call to action headline.',
                ),
                array(
                    'key' => 'field_gc_contact_cta_body',
                    'label' => 'CTA Body',
                    'name' => 'gc_contact_cta_body',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Whether you are in the early planning stages or ready to move forward, our team is here to help you take the next step toward your custom home or outdoor living project.',
                    'instructions' => 'Supporting text for CTA.',
                ),
                array(
                    'key' => 'field_gc_contact_cta_button_label',
                    'label' => 'CTA Button Label',
                    'name' => 'gc_contact_cta_button_label',
                    'type' => 'text',
                    'default_value' => 'Request an estimate',
                    'instructions' => 'Button text. Links to estimate lightbox.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'contact',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                    array(
                        'param' => 'post_title',
                        'operator' => '==',
                        'value' => 'Contact',
                    ),
                ),
            ),
            'menu_order' => 35,
            'show_in_rest' => true,
        ) );
    }

    /**
     * Estimate Page Fields
     *
     * Location: Request an Estimate page
     * Contains: Hero, reassurance copy, process steps, form, FAQ, CTA
     */
    private function register_estimate_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_estimate_fields',
            'title' => 'Estimate Page Content',
            'fields' => array(
                // =============================================================
                // HERO SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_estimate_hero_tab',
                    'label' => 'Hero Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_estimate_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'gc_estimate_hero_headline',
                    'type' => 'text',
                    'default_value' => 'Request an estimate',
                    'instructions' => 'Main hero headline. H1 element.',
                ),
                array(
                    'key' => 'field_gc_estimate_hero_subline',
                    'label' => 'Hero Subline',
                    'name' => 'gc_estimate_hero_subline',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Share your vision with us and receive a detailed, transparent estimate tailored to your project. No pressure, no surprises, just honest guidance to help you build with confidence.',
                    'instructions' => 'Supporting text below headline.',
                ),
                array(
                    'key' => 'field_gc_estimate_hero_image',
                    'label' => 'Hero Background Image',
                    'name' => 'gc_estimate_hero_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Wide landscape image for hero background.',
                ),

                // =============================================================
                // MAIN SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_estimate_main_tab',
                    'label' => 'Main Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_estimate_section_headline',
                    'label' => 'Section Headline',
                    'name' => 'gc_estimate_section_headline',
                    'type' => 'text',
                    'default_value' => 'Let\'s discuss your project',
                    'instructions' => 'H2 headline for the main section.',
                ),
                array(
                    'key' => 'field_gc_estimate_reassurance_copy',
                    'label' => 'Reassurance Copy',
                    'name' => 'gc_estimate_reassurance_copy',
                    'type' => 'textarea',
                    'rows' => 5,
                    'default_value' => 'Every custom home and outdoor living project is unique, which is why we take the time to understand your vision before providing an estimate. Our goal is to give you clear expectations, realistic timelines, and thoughtful options that align with your goals and budget.

We believe the estimate process should feel collaborative, not transactional. You will work directly with our team to explore possibilities, ask questions, and gain confidence in the path forward. There is no obligation and no pressure, just honest conversation about what it takes to bring your vision to life.',
                    'instructions' => 'Primary reassurance paragraph. Used in both the page and the lightbox.',
                ),
                array(
                    'key' => 'field_gc_estimate_promise',
                    'label' => 'Promise Text',
                    'name' => 'gc_estimate_promise',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'Our promise: We will never rush you into a decision. Building a custom home or outdoor living space is a significant investment, and you deserve a partner who respects your timeline and priorities. Take the time you need, and know that we are here when you are ready to move forward.',
                    'instructions' => 'Promise statement displayed in the callout box.',
                ),

                // =============================================================
                // FORM SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_estimate_form_tab',
                    'label' => 'Form Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_estimate_form_headline',
                    'label' => 'Form Headline',
                    'name' => 'gc_estimate_form_headline',
                    'type' => 'text',
                    'default_value' => 'Tell us about your project',
                    'instructions' => 'H2 headline above the form.',
                ),
                array(
                    'key' => 'field_gc_estimate_form_subtext',
                    'label' => 'Form Subtext',
                    'name' => 'gc_estimate_form_subtext',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Complete the form below and a member of our team will be in touch within one business day to discuss your project.',
                    'instructions' => 'Supporting text below the form headline.',
                ),
                array(
                    'key' => 'field_gc_estimate_form_shortcode',
                    'label' => 'Form Shortcode',
                    'name' => 'gc_estimate_form_shortcode',
                    'type' => 'text',
                    'instructions' => 'Gravity Forms shortcode, e.g., [gravityform id="1" title="false" description="false"]',
                ),

                // =============================================================
                // FAQ SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_estimate_faq_tab',
                    'label' => 'FAQ Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_estimate_faq_enabled',
                    'label' => 'Enable FAQ Section',
                    'name' => 'gc_estimate_faq_enabled',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'instructions' => 'Show the FAQ section on the estimate page.',
                ),
                array(
                    'key' => 'field_gc_estimate_faq_headline',
                    'label' => 'FAQ Headline',
                    'name' => 'gc_estimate_faq_headline',
                    'type' => 'text',
                    'default_value' => 'Questions about the estimate process',
                    'instructions' => 'H2 headline for the FAQ section.',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_estimate_faq_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_gc_estimate_faq_subtext',
                    'label' => 'FAQ Subtext',
                    'name' => 'gc_estimate_faq_subtext',
                    'type' => 'textarea',
                    'rows' => 2,
                    'default_value' => 'Answers to the questions we hear most often from homeowners considering a custom build or outdoor living project.',
                    'instructions' => 'Supporting text below the FAQ headline.',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_estimate_faq_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_gc_estimate_faq_group',
                    'label' => 'FAQ Group',
                    'name' => 'gc_estimate_faq_group',
                    'type' => 'taxonomy',
                    'taxonomy' => 'faq_group',
                    'field_type' => 'select',
                    'allow_null' => 0,
                    'return_format' => 'id',
                    'instructions' => 'Which FAQ group to display. Select "estimate" for estimate-specific questions.',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_estimate_faq_enabled',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),

                // =============================================================
                // CTA SECTION TAB
                // =============================================================
                array(
                    'key' => 'field_gc_estimate_cta_tab',
                    'label' => 'CTA Section',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_gc_estimate_cta_headline',
                    'label' => 'CTA Headline',
                    'name' => 'gc_estimate_cta_headline',
                    'type' => 'text',
                    'default_value' => 'Prefer to talk?',
                    'instructions' => 'Final call to action headline.',
                ),
                array(
                    'key' => 'field_gc_estimate_cta_body',
                    'label' => 'CTA Body',
                    'name' => 'gc_estimate_cta_body',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'If you would rather discuss your project over the phone, we are happy to help. Give us a call during business hours and a member of our team will answer your questions and help you take the next step.',
                    'instructions' => 'Supporting text for CTA.',
                ),
                array(
                    'key' => 'field_gc_estimate_cta_phone_label',
                    'label' => 'Phone Button Label',
                    'name' => 'gc_estimate_cta_phone_label',
                    'type' => 'text',
                    'default_value' => 'Call us now',
                    'instructions' => 'Label for the phone button.',
                ),
                array(
                    'key' => 'field_gc_estimate_cta_scroll_label',
                    'label' => 'Scroll Button Label',
                    'name' => 'gc_estimate_cta_scroll_label',
                    'type' => 'text',
                    'default_value' => 'Fill out the form above',
                    'instructions' => 'Label for the scroll-to-form button.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page',
                        'operator' => '==',
                        'value' => 'request-an-estimate',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'default',
                    ),
                    array(
                        'param' => 'post_title',
                        'operator' => '==',
                        'value' => 'Request an Estimate',
                    ),
                ),
            ),
            'menu_order' => 40,
            'show_in_rest' => true,
        ) );
    }

    /**
     * Project CPT Fields
     *
     * Location: Project post type
     * Contains: Location, summary, design image toggle, gallery
     */
    private function register_project_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_project_fields',
            'title' => 'Project Details',
            'fields' => array(
                array(
                    'key' => 'field_gc_project_location_city',
                    'label' => 'City',
                    'name' => 'gc_project_location_city',
                    'type' => 'text',
                    'wrapper' => array( 'width' => '50' ),
                ),
                array(
                    'key' => 'field_gc_project_location_state',
                    'label' => 'State',
                    'name' => 'gc_project_location_state',
                    'type' => 'text',
                    'default_value' => 'SC',
                    'wrapper' => array( 'width' => '50' ),
                ),
                array(
                    'key' => 'field_gc_project_short_summary',
                    'label' => 'Short Summary',
                    'name' => 'gc_project_short_summary',
                    'type' => 'textarea',
                    'rows' => 3,
                    'instructions' => 'Brief description for cards and listings.',
                ),
                array(
                    'key' => 'field_gc_project_has_design_image',
                    'label' => 'Include Design/Before Image',
                    'name' => 'gc_project_has_design_image',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_gc_project_design_image',
                    'label' => 'Design/Before Image',
                    'name' => 'gc_project_design_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_gc_project_has_design_image',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_gc_project_gallery',
                    'label' => 'Project Gallery',
                    'name' => 'gc_project_gallery',
                    'type' => 'gallery',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'field_gc_project_featured_on_home',
                    'label' => 'Feature on Home Page',
                    'name' => 'gc_project_featured_on_home',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'instructions' => 'Quick toggle to include in home page featured projects.',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'project',
                    ),
                ),
            ),
            'position' => 'normal',
            'show_in_rest' => true,
        ) );
    }

    /**
     * FAQ CPT Fields
     *
     * Location: FAQ post type
     * Contains: Answer, optional link (title is the question)
     */
    private function register_faq_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_faq_fields',
            'title' => 'FAQ Details',
            'fields' => array(
                array(
                    'key' => 'field_gc_faq_answer',
                    'label' => 'Answer',
                    'name' => 'gc_faq_answer',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'instructions' => 'The post title serves as the question. Enter the answer here.',
                ),
                array(
                    'key' => 'field_gc_faq_optional_link_label',
                    'label' => 'Optional Link Label',
                    'name' => 'gc_faq_optional_link_label',
                    'type' => 'text',
                    'wrapper' => array( 'width' => '50' ),
                ),
                array(
                    'key' => 'field_gc_faq_optional_link_url',
                    'label' => 'Optional Link URL',
                    'name' => 'gc_faq_optional_link_url',
                    'type' => 'url',
                    'wrapper' => array( 'width' => '50' ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'faq',
                    ),
                ),
            ),
            'position' => 'acf_after_title',
            'show_in_rest' => true,
        ) );
    }

    /**
     * Testimonial CPT Fields
     *
     * Location: Testimonial post type
     * Contains: Quote, first name, last initial, city, service category, project type, source
     */
    private function register_testimonial_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_testimonial_fields',
            'title' => 'Testimonial Details',
            'fields' => array(
                array(
                    'key' => 'field_gc_testimonial_quote',
                    'label' => 'Quote',
                    'name' => 'gc_testimonial_quote',
                    'type' => 'textarea',
                    'rows' => 4,
                    'required' => 1,
                    'instructions' => 'The testimonial text.',
                ),
                array(
                    'key' => 'field_gc_testimonial_first_name',
                    'label' => 'First Name',
                    'name' => 'gc_testimonial_first_name',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => array( 'width' => '33' ),
                ),
                array(
                    'key' => 'field_gc_testimonial_last_initial',
                    'label' => 'Last Initial',
                    'name' => 'gc_testimonial_last_initial',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => array( 'width' => '33' ),
                ),
                array(
                    'key' => 'field_gc_testimonial_city',
                    'label' => 'City',
                    'name' => 'gc_testimonial_city',
                    'type' => 'text',
                    'wrapper' => array( 'width' => '34' ),
                ),
                array(
                    'key' => 'field_gc_testimonial_service_category',
                    'label' => 'Service Category',
                    'name' => 'gc_testimonial_service_category',
                    'type' => 'taxonomy',
                    'taxonomy' => 'service_category',
                    'field_type' => 'select',
                    'allow_null' => 1,
                    'return_format' => 'id',
                    'instructions' => 'Optional. Link this testimonial to a service category.',
                    'wrapper' => array( 'width' => '50' ),
                ),
                array(
                    'key' => 'field_gc_testimonial_project_type',
                    'label' => 'Project Type',
                    'name' => 'gc_testimonial_project_type',
                    'type' => 'text',
                    'instructions' => 'Optional context, e.g., "Pool house build" or "Custom home".',
                    'wrapper' => array( 'width' => '50' ),
                ),
                array(
                    'key' => 'field_gc_testimonial_source',
                    'label' => 'Source',
                    'name' => 'gc_testimonial_source',
                    'type' => 'select',
                    'choices' => array(
                        'magazine' => 'Magazine',
                        'google' => 'Google',
                        'referral' => 'Referral',
                    ),
                    'default_value' => 'magazine',
                    'wrapper' => array( 'width' => '50' ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'testimonial',
                    ),
                ),
            ),
            'position' => 'acf_after_title',
            'show_in_rest' => true,
        ) );
    }

    /**
     * Event CPT Fields
     *
     * Location: Event post type (gc_event)
     * Contains: Location, dates, summary, CTA
     */
    private function register_event_fields() {
        acf_add_local_field_group( array(
            'key' => 'group_gc_event_fields',
            'title' => 'Event Details',
            'fields' => array(
                array(
                    'key' => 'field_gc_event_location',
                    'label' => 'Event Location',
                    'name' => 'gc_event_location',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_gc_event_start_date',
                    'label' => 'Start Date',
                    'name' => 'gc_event_start_date',
                    'type' => 'date_picker',
                    'display_format' => 'F j, Y',
                    'return_format' => 'Y-m-d',
                    'wrapper' => array( 'width' => '50' ),
                ),
                array(
                    'key' => 'field_gc_event_end_date',
                    'label' => 'End Date',
                    'name' => 'gc_event_end_date',
                    'type' => 'date_picker',
                    'display_format' => 'F j, Y',
                    'return_format' => 'Y-m-d',
                    'wrapper' => array( 'width' => '50' ),
                ),
                array(
                    'key' => 'field_gc_event_summary',
                    'label' => 'Event Summary',
                    'name' => 'gc_event_summary',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_gc_event_cta_label',
                    'label' => 'CTA Button Label',
                    'name' => 'gc_event_cta_label',
                    'type' => 'text',
                    'wrapper' => array( 'width' => '50' ),
                ),
                array(
                    'key' => 'field_gc_event_cta_url',
                    'label' => 'CTA Button URL',
                    'name' => 'gc_event_cta_url',
                    'type' => 'url',
                    'wrapper' => array( 'width' => '50' ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'gc_event',
                    ),
                ),
            ),
            'position' => 'normal',
            'show_in_rest' => true,
        ) );
    }
}
