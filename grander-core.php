<?php
/**
 * Plugin Name: Grander Core
 * Plugin URI: https://granderconstruction.com
 * Description: Core functionality for Grander Construction website. Registers CPTs, taxonomies, ACF field groups, and provides REST API compatibility. Works alongside Elementor templates.
 * Version: 1.2.0
 * Author: Grander Construction
 * Author URI: https://granderconstruction.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: grander-core
 * Domain Path: /languages
 *
 * Architecture Note:
 * This plugin handles DATA and ENHANCEMENTS only.
 * Elementor owns all markup, layout, and visual design.
 * Do not add full page layouts or complex HTML rendering here.
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Plugin constants
define( 'GRANDER_CORE_VERSION', '1.2.0' );
define( 'GRANDER_CORE_PATH', plugin_dir_path( __FILE__ ) );
define( 'GRANDER_CORE_URL', plugin_dir_url( __FILE__ ) );
define( 'GRANDER_CORE_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Main Grander Core Class
 *
 * @since 1.0.0
 */
final class Grander_Core {

    /**
     * Single instance of the class
     *
     * @var Grander_Core
     */
    private static $instance = null;

    /**
     * Get singleton instance
     *
     * @return Grander_Core
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
        $this->includes();
        $this->init_hooks();
    }

    /**
     * Include required files
     */
    private function includes() {
        // Core classes
        require_once GRANDER_CORE_PATH . 'includes/class-grander-cpt.php';
        require_once GRANDER_CORE_PATH . 'includes/class-grander-acf.php';
        require_once GRANDER_CORE_PATH . 'includes/class-grander-assets.php';
        require_once GRANDER_CORE_PATH . 'includes/class-grander-shortcodes.php';
        require_once GRANDER_CORE_PATH . 'includes/class-grander-rest-options.php';
    }

    /**
     * Initialize hooks
     */
    private function init_hooks() {
        // Initialize classes
        add_action( 'init', array( $this, 'init_classes' ), 0 );

        // Plugin activation/deactivation
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        // Check for ACF dependency
        add_action( 'admin_notices', array( $this, 'check_acf_dependency' ) );

        // Show cache cleared notice
        add_action( 'admin_notices', array( $this, 'cache_cleared_notice' ) );

        // Add admin bar menu for cache clearing
        add_action( 'admin_bar_menu', array( $this, 'add_admin_bar_menu' ), 100 );

        // Handle cache clear request
        add_action( 'admin_init', array( $this, 'handle_cache_clear' ) );
    }

    /**
     * Add Grander menu to admin bar
     */
    public function add_admin_bar_menu( $admin_bar ) {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $admin_bar->add_menu( array(
            'id'    => 'grander-core',
            'title' => 'Grander Tools',
            'href'  => '#',
        ) );

        $admin_bar->add_menu( array(
            'id'     => 'grander-clear-cache',
            'parent' => 'grander-core',
            'title'  => 'Clear Elementor Cache',
            'href'   => wp_nonce_url( admin_url( 'admin.php?grander_clear_cache=1' ), 'grander_clear_cache' ),
        ) );

        $admin_bar->add_menu( array(
            'id'     => 'grander-settings-link',
            'parent' => 'grander-core',
            'title'  => 'Grander Settings',
            'href'   => admin_url( 'admin.php?page=grander-settings' ),
        ) );
    }

    /**
     * Handle cache clear request from admin bar
     */
    public function handle_cache_clear() {
        if ( ! isset( $_GET['grander_clear_cache'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_GET['_wpnonce'], 'grander_clear_cache' ) ) {
            return;
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $this->clear_elementor_cache();

        // Also clear WordPress object cache
        wp_cache_flush();

        // Redirect with success message
        wp_redirect( add_query_arg( 'grander_cache_cleared', '1', admin_url() ) );
        exit;
    }

    /**
     * Initialize plugin classes
     */
    public function init_classes() {
        // CPT and Taxonomy registration
        Grander_CPT::instance();

        // ACF field groups (only if ACF is active)
        if ( class_exists( 'ACF' ) ) {
            Grander_ACF::instance();
        }

        // Assets (CSS/JS)
        Grander_Assets::instance();

        // Shortcodes
        Grander_Shortcodes::instance();

        // REST Options endpoint
        Grander_REST_Options::instance();
    }

    /**
     * Plugin activation
     */
    public function activate() {
        // Register CPTs and taxonomies
        Grander_CPT::instance()->register_post_types();
        Grander_CPT::instance()->register_taxonomies();

        // Flush rewrite rules
        flush_rewrite_rules();

        // Clear Elementor cache on activation
        $this->clear_elementor_cache();
    }

    /**
     * Clear Elementor CSS cache
     * Forces Elementor to regenerate styles from templates
     */
    public function clear_elementor_cache() {
        if ( did_action( 'elementor/loaded' ) || class_exists( '\Elementor\Plugin' ) ) {
            // Clear Elementor files cache
            if ( class_exists( '\Elementor\Plugin' ) && isset( \Elementor\Plugin::$instance->files_manager ) ) {
                \Elementor\Plugin::$instance->files_manager->clear_cache();
            }
        }
    }

    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Flush rewrite rules
        flush_rewrite_rules();
    }

    /**
     * Check if ACF Pro is active
     */
    public function check_acf_dependency() {
        if ( ! class_exists( 'ACF' ) ) {
            echo '<div class="notice notice-warning is-dismissible">';
            echo '<p><strong>Grander Core:</strong> Advanced Custom Fields Pro is required for full functionality. Some features will be limited until ACF Pro is installed and activated.</p>';
            echo '</div>';
        }
    }

    /**
     * Show cache cleared success notice
     */
    public function cache_cleared_notice() {
        if ( isset( $_GET['grander_cache_cleared'] ) && $_GET['grander_cache_cleared'] === '1' ) {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p><strong>Grander Core:</strong> Elementor cache cleared successfully. Templates will regenerate on next page load.</p>';
            echo '</div>';
        }
    }

    /**
     * Prevent cloning
     */
    private function __clone() {}

    /**
     * Prevent unserializing
     */
    public function __wakeup() {
        throw new Exception( 'Cannot unserialize singleton' );
    }
}

/**
 * Initialize the plugin
 *
 * @return Grander_Core
 */
function grander_core() {
    return Grander_Core::instance();
}

// Start the plugin
grander_core();
