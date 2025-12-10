<?php
/**
 * Grander CPT and Taxonomy Registration
 *
 * Registers all custom post types and taxonomies for Grander Construction.
 * All registrations include show_in_rest for REST API compatibility.
 *
 * @package Grander_Core
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Grander_CPT
 */
class Grander_CPT {

    /**
     * Single instance
     *
     * @var Grander_CPT
     */
    private static $instance = null;

    /**
     * Get instance
     *
     * @return Grander_CPT
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
        add_action( 'init', array( $this, 'register_post_types' ), 5 );
        add_action( 'init', array( $this, 'register_taxonomies' ), 5 );
    }

    /**
     * Register Custom Post Types
     *
     * CPTs registered:
     * - project: Portfolio projects
     * - testimonial: Client testimonials
     * - faq: Frequently asked questions
     * - gc_event: Upcoming events (disabled by default at launch)
     */
    public function register_post_types() {

        // =====================================================================
        // PROJECT CPT
        // Used for: Portfolio items, service page galleries, featured projects
        // REST endpoint: /wp-json/wp/v2/project
        // =====================================================================
        $project_labels = array(
            'name'                  => _x( 'Projects', 'Post type general name', 'grander-core' ),
            'singular_name'         => _x( 'Project', 'Post type singular name', 'grander-core' ),
            'menu_name'             => _x( 'Projects', 'Admin Menu text', 'grander-core' ),
            'add_new'               => __( 'Add New', 'grander-core' ),
            'add_new_item'          => __( 'Add New Project', 'grander-core' ),
            'edit_item'             => __( 'Edit Project', 'grander-core' ),
            'new_item'              => __( 'New Project', 'grander-core' ),
            'view_item'             => __( 'View Project', 'grander-core' ),
            'view_items'            => __( 'View Projects', 'grander-core' ),
            'search_items'          => __( 'Search Projects', 'grander-core' ),
            'not_found'             => __( 'No projects found.', 'grander-core' ),
            'not_found_in_trash'    => __( 'No projects found in Trash.', 'grander-core' ),
            'all_items'             => __( 'All Projects', 'grander-core' ),
            'archives'              => __( 'Project Archives', 'grander-core' ),
            'attributes'            => __( 'Project Attributes', 'grander-core' ),
            'featured_image'        => __( 'Featured Image', 'grander-core' ),
            'set_featured_image'    => __( 'Set featured image', 'grander-core' ),
            'remove_featured_image' => __( 'Remove featured image', 'grander-core' ),
            'use_featured_image'    => __( 'Use as featured image', 'grander-core' ),
        );

        $project_args = array(
            'labels'             => $project_labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'project', 'with_front' => false ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-building',
            'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
            'show_in_rest'       => true,
            'rest_base'          => 'project',
        );

        register_post_type( 'project', $project_args );

        // =====================================================================
        // TESTIMONIAL CPT
        // Used for: Client testimonials across home, services, team pages
        // REST endpoint: /wp-json/wp/v2/testimonial
        // Note: Using CPT instead of options repeater for REST seeding and filtering
        // =====================================================================
        $testimonial_labels = array(
            'name'                  => _x( 'Testimonials', 'Post type general name', 'grander-core' ),
            'singular_name'         => _x( 'Testimonial', 'Post type singular name', 'grander-core' ),
            'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'grander-core' ),
            'add_new'               => __( 'Add New', 'grander-core' ),
            'add_new_item'          => __( 'Add New Testimonial', 'grander-core' ),
            'edit_item'             => __( 'Edit Testimonial', 'grander-core' ),
            'new_item'              => __( 'New Testimonial', 'grander-core' ),
            'view_item'             => __( 'View Testimonial', 'grander-core' ),
            'search_items'          => __( 'Search Testimonials', 'grander-core' ),
            'not_found'             => __( 'No testimonials found.', 'grander-core' ),
            'not_found_in_trash'    => __( 'No testimonials found in Trash.', 'grander-core' ),
            'all_items'             => __( 'All Testimonials', 'grander-core' ),
        );

        $testimonial_args = array(
            'labels'             => $testimonial_labels,
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => false,
            'rewrite'            => false,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'menu_icon'          => 'dashicons-format-quote',
            'supports'           => array( 'title', 'revisions' ),
            'show_in_rest'       => true,
            'rest_base'          => 'testimonial',
        );

        register_post_type( 'testimonial', $testimonial_args );

        // =====================================================================
        // FAQ CPT
        // Used for: Structured FAQ system with group filtering
        // REST endpoint: /wp-json/wp/v2/faq
        // Title = Question, ACF field = Answer
        // =====================================================================
        $faq_labels = array(
            'name'                  => _x( 'FAQs', 'Post type general name', 'grander-core' ),
            'singular_name'         => _x( 'FAQ', 'Post type singular name', 'grander-core' ),
            'menu_name'             => _x( 'FAQs', 'Admin Menu text', 'grander-core' ),
            'add_new'               => __( 'Add New', 'grander-core' ),
            'add_new_item'          => __( 'Add New FAQ', 'grander-core' ),
            'edit_item'             => __( 'Edit FAQ', 'grander-core' ),
            'new_item'              => __( 'New FAQ', 'grander-core' ),
            'view_item'             => __( 'View FAQ', 'grander-core' ),
            'search_items'          => __( 'Search FAQs', 'grander-core' ),
            'not_found'             => __( 'No FAQs found.', 'grander-core' ),
            'not_found_in_trash'    => __( 'No FAQs found in Trash.', 'grander-core' ),
            'all_items'             => __( 'All FAQs', 'grander-core' ),
        );

        $faq_args = array(
            'labels'             => $faq_labels,
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => false,
            'rewrite'            => false,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 7,
            'menu_icon'          => 'dashicons-editor-help',
            'supports'           => array( 'title', 'revisions' ),
            'show_in_rest'       => true,
            'rest_base'          => 'faq',
        );

        register_post_type( 'faq', $faq_args );

        // =====================================================================
        // EVENT CPT
        // Used for: Upcoming events (home shows, etc.)
        // REST endpoint: /wp-json/wp/v2/gc_event
        // Note: Built but disabled for launch. Enable via gc_events_enabled option.
        // Using gc_event slug to avoid conflicts with other plugins.
        // =====================================================================
        $event_labels = array(
            'name'                  => _x( 'Events', 'Post type general name', 'grander-core' ),
            'singular_name'         => _x( 'Event', 'Post type singular name', 'grander-core' ),
            'menu_name'             => _x( 'Events', 'Admin Menu text', 'grander-core' ),
            'add_new'               => __( 'Add New', 'grander-core' ),
            'add_new_item'          => __( 'Add New Event', 'grander-core' ),
            'edit_item'             => __( 'Edit Event', 'grander-core' ),
            'new_item'              => __( 'New Event', 'grander-core' ),
            'view_item'             => __( 'View Event', 'grander-core' ),
            'search_items'          => __( 'Search Events', 'grander-core' ),
            'not_found'             => __( 'No events found.', 'grander-core' ),
            'not_found_in_trash'    => __( 'No events found in Trash.', 'grander-core' ),
            'all_items'             => __( 'All Events', 'grander-core' ),
        );

        $event_args = array(
            'labels'             => $event_labels,
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => false,
            'rewrite'            => false,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 8,
            'menu_icon'          => 'dashicons-calendar-alt',
            'supports'           => array( 'title', 'revisions' ),
            'show_in_rest'       => true,
            'rest_base'          => 'gc_event',
        );

        register_post_type( 'gc_event', $event_args );
    }

    /**
     * Register Taxonomies
     *
     * Taxonomies registered:
     * - service_category: Hierarchical, attached to project, testimonial, faq
     * - project_tag: Non-hierarchical, attached to project
     * - faq_group: Hierarchical, attached to faq
     */
    public function register_taxonomies() {

        // =====================================================================
        // SERVICE CATEGORY TAXONOMY
        // Used for: Categorizing projects, testimonials, and FAQs by service type
        // REST endpoint: /wp-json/wp/v2/service_category
        // Terms: custom-homes, outdoor-spaces, pool-houses-garages-adus, sunrooms-additions
        // =====================================================================
        $service_cat_labels = array(
            'name'              => _x( 'Service Categories', 'taxonomy general name', 'grander-core' ),
            'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'grander-core' ),
            'search_items'      => __( 'Search Service Categories', 'grander-core' ),
            'all_items'         => __( 'All Service Categories', 'grander-core' ),
            'parent_item'       => __( 'Parent Service Category', 'grander-core' ),
            'parent_item_colon' => __( 'Parent Service Category:', 'grander-core' ),
            'edit_item'         => __( 'Edit Service Category', 'grander-core' ),
            'update_item'       => __( 'Update Service Category', 'grander-core' ),
            'add_new_item'      => __( 'Add New Service Category', 'grander-core' ),
            'new_item_name'     => __( 'New Service Category Name', 'grander-core' ),
            'menu_name'         => __( 'Service Categories', 'grander-core' ),
        );

        $service_cat_args = array(
            'hierarchical'      => true,
            'labels'            => $service_cat_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'service-category', 'with_front' => false ),
            'show_in_rest'      => true,
            'rest_base'         => 'service_category',
        );

        // Attach to project, testimonial, and faq for filtering
        register_taxonomy( 'service_category', array( 'project', 'testimonial', 'faq' ), $service_cat_args );

        // =====================================================================
        // PROJECT TAG TAXONOMY
        // Used for: Additional tagging for gallery filtering
        // REST endpoint: /wp-json/wp/v2/project_tag
        // =====================================================================
        $project_tag_labels = array(
            'name'                       => _x( 'Project Tags', 'taxonomy general name', 'grander-core' ),
            'singular_name'              => _x( 'Project Tag', 'taxonomy singular name', 'grander-core' ),
            'search_items'               => __( 'Search Project Tags', 'grander-core' ),
            'popular_items'              => __( 'Popular Project Tags', 'grander-core' ),
            'all_items'                  => __( 'All Project Tags', 'grander-core' ),
            'edit_item'                  => __( 'Edit Project Tag', 'grander-core' ),
            'update_item'                => __( 'Update Project Tag', 'grander-core' ),
            'add_new_item'               => __( 'Add New Project Tag', 'grander-core' ),
            'new_item_name'              => __( 'New Project Tag Name', 'grander-core' ),
            'separate_items_with_commas' => __( 'Separate tags with commas', 'grander-core' ),
            'add_or_remove_items'        => __( 'Add or remove project tags', 'grander-core' ),
            'choose_from_most_used'      => __( 'Choose from the most used tags', 'grander-core' ),
            'not_found'                  => __( 'No project tags found.', 'grander-core' ),
            'menu_name'                  => __( 'Project Tags', 'grander-core' ),
        );

        $project_tag_args = array(
            'hierarchical'          => false,
            'labels'                => $project_tag_labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'project-tag', 'with_front' => false ),
            'show_in_rest'          => true,
            'rest_base'             => 'project_tag',
        );

        register_taxonomy( 'project_tag', array( 'project' ), $project_tag_args );

        // =====================================================================
        // FAQ GROUP TAXONOMY
        // Used for: Grouping FAQs by context (build-process, contact, services, etc.)
        // REST endpoint: /wp-json/wp/v2/faq_group
        // Terms: build-process, services-general, custom-homes, outdoor-spaces,
        //        pool-houses-garages-adus, sunrooms-additions, contact, estimate
        // =====================================================================
        $faq_group_labels = array(
            'name'              => _x( 'FAQ Groups', 'taxonomy general name', 'grander-core' ),
            'singular_name'     => _x( 'FAQ Group', 'taxonomy singular name', 'grander-core' ),
            'search_items'      => __( 'Search FAQ Groups', 'grander-core' ),
            'all_items'         => __( 'All FAQ Groups', 'grander-core' ),
            'parent_item'       => __( 'Parent FAQ Group', 'grander-core' ),
            'parent_item_colon' => __( 'Parent FAQ Group:', 'grander-core' ),
            'edit_item'         => __( 'Edit FAQ Group', 'grander-core' ),
            'update_item'       => __( 'Update FAQ Group', 'grander-core' ),
            'add_new_item'      => __( 'Add New FAQ Group', 'grander-core' ),
            'new_item_name'     => __( 'New FAQ Group Name', 'grander-core' ),
            'menu_name'         => __( 'FAQ Groups', 'grander-core' ),
        );

        $faq_group_args = array(
            'hierarchical'      => true,
            'labels'            => $faq_group_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'faq-group', 'with_front' => false ),
            'show_in_rest'      => true,
            'rest_base'         => 'faq_group',
        );

        register_taxonomy( 'faq_group', array( 'faq' ), $faq_group_args );
    }
}
