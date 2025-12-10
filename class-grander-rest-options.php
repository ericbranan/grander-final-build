<?php
/**
 * Grander REST Options Endpoint
 *
 * Provides a custom REST endpoint for reading/writing ACF options.
 * This allows REST-based content seeding for global settings.
 *
 * Endpoint: /wp-json/grander/v1/options
 *
 * @package Grander_Core
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Grander_REST_Options
 */
class Grander_REST_Options {

    /**
     * Single instance
     *
     * @var Grander_REST_Options
     */
    private static $instance = null;

    /**
     * REST namespace
     *
     * @var string
     */
    private $namespace = 'grander/v1';

    /**
     * Allowed option keys for REST access
     *
     * @var array
     */
    private $allowed_options = array(
        // Announcement bar
        'gc_announcement_enabled',
        'gc_announcement_message',
        'gc_announcement_button_label',
        'gc_announcement_button_url',
        'gc_announcement_style',

        // Service area
        'gc_service_area_enabled',
        'gc_service_area_text',

        // Header & contact
        'gc_phone_number',
        'gc_header_estimate_label',
        'gc_header_estimate_mode',
        'gc_header_estimate_url',

        // Footer logos (IDs only for REST)
        'gc_footer_logo_white',
        'gc_footer_company_statement',
        'gc_footer_address',
        'gc_footer_email',
        'gc_footer_hba_logo',
        'gc_footer_hba_url',
        'gc_footer_bbb_logo',
        'gc_footer_bbb_url',

        // Social
        'gc_social_instagram_url',
        'gc_social_facebook_url',

        // Trust bar
        'gc_trust_items',

        // Testimonials repeater
        'gc_testimonials',

        // Events
        'gc_events_enabled',
        'gc_events',

        // Featured projects
        'gc_featured_projects_enabled',
        'gc_featured_projects',

        // FAQ library
        'gc_faq_items',

        // Estimate form
        'gc_estimate_form_shortcode',
    );

    /**
     * Get instance
     *
     * @return Grander_REST_Options
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
        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }

    /**
     * Register REST routes
     */
    public function register_routes() {
        // GET /wp-json/grander/v1/options
        register_rest_route( $this->namespace, '/options', array(
            'methods'             => 'GET',
            'callback'            => array( $this, 'get_options' ),
            'permission_callback' => array( $this, 'get_permissions_check' ),
        ) );

        // POST /wp-json/grander/v1/options
        register_rest_route( $this->namespace, '/options', array(
            'methods'             => 'POST',
            'callback'            => array( $this, 'update_options' ),
            'permission_callback' => array( $this, 'update_permissions_check' ),
        ) );

        // GET /wp-json/grander/v1/options/{key}
        register_rest_route( $this->namespace, '/options/(?P<key>[a-z_]+)', array(
            'methods'             => 'GET',
            'callback'            => array( $this, 'get_single_option' ),
            'permission_callback' => array( $this, 'get_permissions_check' ),
        ) );
    }

    /**
     * Permission check for GET requests
     * Allow public read access for most options
     *
     * @return bool
     */
    public function get_permissions_check() {
        return true;
    }

    /**
     * Permission check for POST/UPDATE requests
     * Require edit_posts capability
     *
     * @return bool
     */
    public function update_permissions_check() {
        return current_user_can( 'manage_options' );
    }

    /**
     * GET all options
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public function get_options( $request ) {
        if ( ! function_exists( 'get_field' ) ) {
            return new WP_REST_Response( array(
                'error' => 'ACF is not active',
            ), 500 );
        }

        $options = array();

        foreach ( $this->allowed_options as $key ) {
            $value = get_field( $key, 'option' );

            // Handle image fields - return IDs for consistency
            if ( in_array( $key, array( 'gc_footer_logo_white', 'gc_footer_hba_logo', 'gc_footer_bbb_logo' ) ) ) {
                $value = is_array( $value ) && isset( $value['ID'] ) ? $value['ID'] : $value;
            }

            $options[ $key ] = $value;
        }

        return new WP_REST_Response( $options, 200 );
    }

    /**
     * GET single option
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public function get_single_option( $request ) {
        if ( ! function_exists( 'get_field' ) ) {
            return new WP_REST_Response( array(
                'error' => 'ACF is not active',
            ), 500 );
        }

        $key = $request->get_param( 'key' );

        if ( ! in_array( $key, $this->allowed_options ) ) {
            return new WP_REST_Response( array(
                'error' => 'Option key not allowed',
            ), 400 );
        }

        $value = get_field( $key, 'option' );

        return new WP_REST_Response( array(
            'key'   => $key,
            'value' => $value,
        ), 200 );
    }

    /**
     * POST/UPDATE options
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public function update_options( $request ) {
        if ( ! function_exists( 'update_field' ) ) {
            return new WP_REST_Response( array(
                'error' => 'ACF is not active',
            ), 500 );
        }

        $body = $request->get_json_params();

        if ( empty( $body ) || ! is_array( $body ) ) {
            return new WP_REST_Response( array(
                'error' => 'No data provided',
            ), 400 );
        }

        $updated = array();
        $errors = array();

        foreach ( $body as $key => $value ) {
            // Only allow whitelisted keys
            if ( ! in_array( $key, $this->allowed_options ) ) {
                $errors[] = "Key '{$key}' is not allowed";
                continue;
            }

            // Get the ACF field key from field name
            $field_key = $this->get_field_key( $key );

            if ( $field_key ) {
                $result = update_field( $field_key, $value, 'option' );
                if ( $result !== false ) {
                    $updated[] = $key;
                } else {
                    $errors[] = "Failed to update '{$key}'";
                }
            } else {
                // Fallback to field name if key lookup fails
                $result = update_field( $key, $value, 'option' );
                if ( $result !== false ) {
                    $updated[] = $key;
                }
            }
        }

        return new WP_REST_Response( array(
            'updated' => $updated,
            'errors'  => $errors,
        ), 200 );
    }

    /**
     * Get ACF field key from field name
     *
     * @param string $field_name
     * @return string|false
     */
    private function get_field_key( $field_name ) {
        // Map of field names to field keys
        // These match the keys defined in class-grander-acf.php
        $field_map = array(
            'gc_announcement_enabled'      => 'field_gc_announcement_enabled',
            'gc_announcement_message'      => 'field_gc_announcement_message',
            'gc_announcement_button_label' => 'field_gc_announcement_button_label',
            'gc_announcement_button_url'   => 'field_gc_announcement_button_url',
            'gc_announcement_style'        => 'field_gc_announcement_style',
            'gc_service_area_enabled'      => 'field_gc_service_area_enabled',
            'gc_service_area_text'         => 'field_gc_service_area_text',
            'gc_phone_number'              => 'field_gc_phone_number',
            'gc_header_estimate_label'     => 'field_gc_header_estimate_label',
            'gc_header_estimate_mode'      => 'field_gc_header_estimate_mode',
            'gc_header_estimate_url'       => 'field_gc_header_estimate_url',
            'gc_footer_logo_white'         => 'field_gc_footer_logo_white',
            'gc_footer_company_statement'  => 'field_gc_footer_company_statement',
            'gc_footer_address'            => 'field_gc_footer_address',
            'gc_footer_email'              => 'field_gc_footer_email',
            'gc_footer_hba_logo'           => 'field_gc_footer_hba_logo',
            'gc_footer_hba_url'            => 'field_gc_footer_hba_url',
            'gc_footer_bbb_logo'           => 'field_gc_footer_bbb_logo',
            'gc_footer_bbb_url'            => 'field_gc_footer_bbb_url',
            'gc_social_instagram_url'      => 'field_gc_social_instagram_url',
            'gc_social_facebook_url'       => 'field_gc_social_facebook_url',
            'gc_trust_items'               => 'field_gc_trust_items',
            'gc_testimonials'              => 'field_gc_testimonials',
            'gc_events_enabled'            => 'field_gc_events_enabled',
            'gc_events'                    => 'field_gc_events',
            'gc_featured_projects_enabled' => 'field_gc_featured_projects_enabled',
            'gc_featured_projects'         => 'field_gc_featured_projects',
            'gc_faq_items'                 => 'field_gc_faq_items',
            'gc_estimate_form_shortcode'   => 'field_gc_estimate_form_shortcode',
        );

        return isset( $field_map[ $field_name ] ) ? $field_map[ $field_name ] : false;
    }
}
