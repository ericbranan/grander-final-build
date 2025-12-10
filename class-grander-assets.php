<?php
/**
 * Grander Assets Enqueue
 *
 * Handles CSS and JS enqueuing for frontend and admin.
 * CSS provides class hooks for Elementor templates.
 * JS provides mobile behaviors and small enhancements.
 *
 * @package Grander_Core
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Grander_Assets
 */
class Grander_Assets {

    /**
     * Single instance
     *
     * @var Grander_Assets
     */
    private static $instance = null;

    /**
     * Get instance
     *
     * @return Grander_Assets
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
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

        // Add inline script data for JS
        add_action( 'wp_footer', array( $this, 'localize_script_data' ), 5 );
    }

    /**
     * Enqueue frontend CSS and JS
     */
    public function enqueue_frontend_assets() {
        // Main CSS - provides class hooks for Elementor templates
        wp_enqueue_style(
            'grander-core',
            GRANDER_CORE_URL . 'assets/css/grander-core.css',
            array(),
            GRANDER_CORE_VERSION
        );

        // Main JS - mobile behaviors and enhancements
        wp_enqueue_script(
            'grander-core',
            GRANDER_CORE_URL . 'assets/js/grander-core.js',
            array(),
            GRANDER_CORE_VERSION,
            true // Load in footer
        );
    }

    /**
     * Enqueue admin assets
     *
     * Loads admin-specific CSS on Grander Settings pages.
     * Creates a polished, app-like experience for site settings management.
     */
    public function enqueue_admin_assets( $hook ) {
        // Only load on Grander settings pages
        $allowed_hooks = array(
            'toplevel_page_grander-settings',
        );

        if ( ! in_array( $hook, $allowed_hooks, true ) ) {
            return;
        }

        // Admin-specific styles for the settings UI
        wp_enqueue_style(
            'grander-admin',
            GRANDER_CORE_URL . 'assets/css/grander-admin.css',
            array( 'acf-input' ), // Load after ACF styles
            GRANDER_CORE_VERSION
        );

        // Admin-specific JS for enhanced UX
        wp_enqueue_script(
            'grander-admin',
            GRANDER_CORE_URL . 'assets/js/grander-admin.js',
            array( 'jquery', 'acf-input' ),
            GRANDER_CORE_VERSION,
            true
        );

        // Localize script data
        wp_localize_script( 'grander-admin', 'granderAdminData', array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'grander_admin_nonce' ),
        ) );
    }

    /**
     * Pass data to JS
     */
    public function localize_script_data() {
        // Get phone number from ACF options
        $phone_number = '';
        if ( function_exists( 'get_field' ) ) {
            $phone_number = get_field( 'gc_phone_number', 'option' );
        }

        // Clean phone for tel: link
        $phone_clean = preg_replace( '/[^0-9]/', '', $phone_number );

        $data = array(
            'phoneNumber'  => $phone_number,
            'phoneClean'   => $phone_clean,
            'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
            'breakpoint'   => 768, // Mobile breakpoint
        );

        ?>
        <script type="text/javascript">
            var granderCoreData = <?php echo wp_json_encode( $data ); ?>;
        </script>
        <?php
    }
}
