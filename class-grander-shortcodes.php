<?php
/**
 * Grander Shortcodes
 *
 * Provides small, atomic helper shortcodes for Elementor integration.
 * These output minimal semantic HTML with stable class hooks.
 * Styling lives in Elementor or the plugin CSS file.
 *
 * Available shortcodes:
 * - [grander_zigzag_divider]      - SVG zigzag pattern divider
 * - [grander_service_area_line]   - Service area microline from options
 * - [grander_trust_bar]           - Trust bar repeater output
 * - [grander_events_strip]        - Upcoming events output
 * - [grander_phone_link]          - Clickable phone link
 * - [grander_estimate_form]       - Estimate form wrapper (Gravity Forms)
 * - [grander_estimate_lightbox]   - Global estimate lightbox modal
 *
 * @package Grander_Core
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Grander_Shortcodes
 */
class Grander_Shortcodes {

    /**
     * Single instance
     *
     * @var Grander_Shortcodes
     */
    private static $instance = null;

    /**
     * Get instance
     *
     * @return Grander_Shortcodes
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
        add_action( 'init', array( $this, 'register_shortcodes' ) );
    }

    /**
     * Register all shortcodes
     */
    public function register_shortcodes() {
        add_shortcode( 'grander_zigzag_divider', array( $this, 'render_zigzag_divider' ) );
        add_shortcode( 'grander_service_area_line', array( $this, 'render_service_area_line' ) );
        add_shortcode( 'grander_trust_bar', array( $this, 'render_trust_bar' ) );
        add_shortcode( 'grander_events_strip', array( $this, 'render_events_strip' ) );
        add_shortcode( 'grander_phone_link', array( $this, 'render_phone_link' ) );
        add_shortcode( 'grander_estimate_form', array( $this, 'render_estimate_form' ) );
        add_shortcode( 'grander_estimate_lightbox', array( $this, 'render_estimate_lightbox' ) );
    }

    /**
     * Zigzag Divider Shortcode
     *
     * Usage: [grander_zigzag_divider color="dark"]
     * Outputs the SVG zigzag pattern used at the top of the footer.
     *
     * @param array $atts Shortcode attributes.
     * @return string HTML output.
     */
    public function render_zigzag_divider( $atts ) {
        $atts = shortcode_atts( array(
            'color' => 'dark', // dark or light
        ), $atts );

        $color_class = 'gc-zigzag--' . sanitize_html_class( $atts['color'] );

        ob_start();
        ?>
        <div class="gc-zigzag-divider <?php echo esc_attr( $color_class ); ?>">
            <svg viewBox="0 0 1200 40" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,40 L30,20 L60,40 L90,20 L120,40 L150,20 L180,40 L210,20 L240,40 L270,20 L300,40 L330,20 L360,40 L390,20 L420,40 L450,20 L480,40 L510,20 L540,40 L570,20 L600,40 L630,20 L660,40 L690,20 L720,40 L750,20 L780,40 L810,20 L840,40 L870,20 L900,40 L930,20 L960,40 L990,20 L1020,40 L1050,20 L1080,40 L1110,20 L1140,40 L1170,20 L1200,40 L1200,0 L0,0 Z" fill="currentColor"/>
            </svg>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Service Area Line Shortcode
     *
     * Usage: [grander_service_area_line]
     * Outputs the service area microline from ACF options.
     *
     * @param array $atts Shortcode attributes.
     * @return string HTML output.
     */
    public function render_service_area_line( $atts ) {
        if ( ! function_exists( 'get_field' ) ) {
            return '';
        }

        $enabled = get_field( 'gc_service_area_enabled', 'option' );
        if ( ! $enabled ) {
            return '';
        }

        $text = get_field( 'gc_service_area_text', 'option' );
        if ( empty( $text ) ) {
            $text = 'Proudly serving the Upstate of South Carolina with custom homes and outdoor living.';
        }

        ob_start();
        ?>
        <p class="gc-service-area-line"><?php echo esc_html( $text ); ?></p>
        <?php
        return ob_get_clean();
    }

    /**
     * Trust Bar Shortcode
     *
     * Usage: [grander_trust_bar]
     * Outputs trust items as a flex row from ACF options.
     *
     * @param array $atts Shortcode attributes.
     * @return string HTML output.
     */
    public function render_trust_bar( $atts ) {
        if ( ! function_exists( 'get_field' ) ) {
            return '';
        }

        $items = get_field( 'gc_trust_items', 'option' );
        if ( empty( $items ) || ! is_array( $items ) ) {
            return '';
        }

        ob_start();
        ?>
        <div class="gc-trust-bar">
            <div class="gc-trust-bar__inner">
                <?php foreach ( $items as $item ) : ?>
                    <?php
                    $logo = isset( $item['logo'] ) ? $item['logo'] : null;
                    $label = isset( $item['label'] ) ? $item['label'] : '';
                    $url = isset( $item['url'] ) ? $item['url'] : '';
                    ?>
                    <div class="gc-trust-bar__item">
                        <?php if ( $url ) : ?>
                            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="gc-trust-bar__link">
                        <?php endif; ?>

                        <?php if ( $logo && isset( $logo['url'] ) ) : ?>
                            <img
                                src="<?php echo esc_url( $logo['url'] ); ?>"
                                alt="<?php echo esc_attr( $logo['alt'] ?? $label ); ?>"
                                class="gc-trust-bar__logo"
                            >
                        <?php endif; ?>

                        <?php if ( $label ) : ?>
                            <span class="gc-trust-bar__label"><?php echo esc_html( $label ); ?></span>
                        <?php endif; ?>

                        <?php if ( $url ) : ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Events Strip Shortcode
     *
     * Usage: [grander_events_strip]
     * Only outputs HTML if events_enabled is true and there are events.
     *
     * @param array $atts Shortcode attributes.
     * @return string HTML output.
     */
    public function render_events_strip( $atts ) {
        if ( ! function_exists( 'get_field' ) ) {
            return '';
        }

        $enabled = get_field( 'gc_events_enabled', 'option' );
        if ( ! $enabled ) {
            return '';
        }

        $events = get_field( 'gc_events', 'option' );
        if ( empty( $events ) || ! is_array( $events ) ) {
            return '';
        }

        // Filter out past events
        $current_date = date( 'Y-m-d' );
        $upcoming_events = array_filter( $events, function( $event ) use ( $current_date ) {
            $end_date = ! empty( $event['end_date'] ) ? $event['end_date'] : $event['start_date'];
            return $end_date >= $current_date;
        } );

        if ( empty( $upcoming_events ) ) {
            return '';
        }

        ob_start();
        ?>
        <div class="gc-events-strip">
            <div class="gc-events-strip__inner">
                <?php foreach ( $upcoming_events as $event ) : ?>
                    <div class="gc-events-strip__event">
                        <div class="gc-events-strip__content">
                            <h4 class="gc-events-strip__title"><?php echo esc_html( $event['title'] ); ?></h4>

                            <div class="gc-events-strip__meta">
                                <?php
                                $start = ! empty( $event['start_date'] ) ? date( 'F j, Y', strtotime( $event['start_date'] ) ) : '';
                                $end = ! empty( $event['end_date'] ) ? date( 'F j, Y', strtotime( $event['end_date'] ) ) : '';
                                $date_display = $start;
                                if ( $end && $end !== $start ) {
                                    $date_display .= ' - ' . $end;
                                }
                                ?>
                                <?php if ( $date_display ) : ?>
                                    <span class="gc-events-strip__date"><?php echo esc_html( $date_display ); ?></span>
                                <?php endif; ?>

                                <?php if ( ! empty( $event['location'] ) ) : ?>
                                    <span class="gc-events-strip__location"><?php echo esc_html( $event['location'] ); ?></span>
                                <?php endif; ?>
                            </div>

                            <?php if ( ! empty( $event['short_summary'] ) ) : ?>
                                <p class="gc-events-strip__summary"><?php echo esc_html( $event['short_summary'] ); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if ( ! empty( $event['button_label'] ) && ! empty( $event['button_url'] ) ) : ?>
                            <a href="<?php echo esc_url( $event['button_url'] ); ?>" class="gc-events-strip__button">
                                <?php echo esc_html( $event['button_label'] ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Phone Link Shortcode
     *
     * Usage: [grander_phone_link display="formatted"]
     * Outputs a clickable phone link from ACF options.
     *
     * @param array $atts Shortcode attributes.
     * @return string HTML output.
     */
    public function render_phone_link( $atts ) {
        $atts = shortcode_atts( array(
            'display' => 'formatted', // formatted or icon
            'class'   => '',
        ), $atts );

        if ( ! function_exists( 'get_field' ) ) {
            return '';
        }

        $phone = get_field( 'gc_phone_number', 'option' );
        if ( empty( $phone ) ) {
            return '';
        }

        $phone_clean = preg_replace( '/[^0-9]/', '', $phone );
        $class = 'gc-phone-link';
        if ( ! empty( $atts['class'] ) ) {
            $class .= ' ' . sanitize_html_class( $atts['class'] );
        }

        if ( $atts['display'] === 'icon' ) {
            ob_start();
            ?>
            <a href="tel:<?php echo esc_attr( $phone_clean ); ?>" class="<?php echo esc_attr( $class ); ?> gc-phone-link--icon" aria-label="Call us">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                </svg>
            </a>
            <?php
            return ob_get_clean();
        }

        return sprintf(
            '<a href="tel:%s" class="%s">%s</a>',
            esc_attr( $phone_clean ),
            esc_attr( $class ),
            esc_html( $phone )
        );
    }

    /**
     * Estimate Form Shortcode
     *
     * Usage: [grander_estimate_form]
     * Outputs the Gravity Forms shortcode stored in ACF options.
     * Wrapper provides consistent styling hooks.
     *
     * @param array $atts Shortcode attributes.
     * @return string HTML output.
     */
    public function render_estimate_form( $atts ) {
        if ( ! function_exists( 'get_field' ) ) {
            return '';
        }

        $form_shortcode = get_field( 'gc_estimate_form_shortcode', 'option' );
        if ( empty( $form_shortcode ) ) {
            return '<!-- Grander: No estimate form shortcode configured -->';
        }

        ob_start();
        ?>
        <div class="gc-estimate-form">
            <?php echo do_shortcode( $form_shortcode ); ?>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Estimate Lightbox Shortcode
     *
     * Usage: [grander_estimate_lightbox]
     * Outputs the global estimate lightbox modal structure.
     * Should be placed once in the footer template or site-wide location.
     * Triggers: Any element with [data-gc-estimate-trigger] or .gc-estimate-trigger class.
     *
     * @param array $atts Shortcode attributes.
     * @return string HTML output.
     */
    public function render_estimate_lightbox( $atts ) {
        if ( ! function_exists( 'get_field' ) ) {
            return '';
        }

        // Get reassurance copy from ACF options
        $reassurance_copy = get_field( 'gc_estimate_reassurance_copy', 'option' );
        if ( empty( $reassurance_copy ) ) {
            $reassurance_copy = 'Tell us about your project and we will provide clear next steps, realistic timelines, and thoughtful options that match your goals and budget.';
        }

        // Get form shortcode
        $form_shortcode = get_field( 'gc_estimate_form_shortcode', 'option' );

        // Get trust items for mini trust bar
        $trust_items = get_field( 'gc_trust_items', 'option' );

        ob_start();
        ?>
        <div class="gc-estimate-lightbox-overlay" role="dialog" aria-modal="true" aria-labelledby="gc-lightbox-title">
            <div class="gc-estimate-lightbox">
                <button type="button" class="gc-estimate-lightbox__close" aria-label="Close estimate form">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </button>

                <div class="gc-estimate-lightbox__content">
                    <!-- Left Column: Reassurance -->
                    <div class="gc-estimate-lightbox__left">
                        <h2 id="gc-lightbox-title" class="gc-estimate-lightbox__title">Request an estimate</h2>
                        <p class="gc-estimate-lightbox__copy"><?php echo esc_html( $reassurance_copy ); ?></p>

                        <?php if ( ! empty( $trust_items ) && is_array( $trust_items ) ) : ?>
                            <div class="gc-estimate-lightbox__trust">
                                <?php
                                // Show first 3 trust items max in lightbox
                                $lightbox_trust_items = array_slice( $trust_items, 0, 3 );
                                foreach ( $lightbox_trust_items as $item ) :
                                    $logo = isset( $item['logo'] ) ? $item['logo'] : null;
                                    $label = isset( $item['label'] ) ? $item['label'] : '';
                                    ?>
                                    <div class="gc-estimate-lightbox__trust-item">
                                        <?php if ( $logo && isset( $logo['url'] ) ) : ?>
                                            <img
                                                src="<?php echo esc_url( $logo['url'] ); ?>"
                                                alt="<?php echo esc_attr( $logo['alt'] ?? $label ); ?>"
                                                class="gc-estimate-lightbox__trust-logo"
                                            >
                                        <?php elseif ( $label ) : ?>
                                            <span class="gc-estimate-lightbox__trust-label"><?php echo esc_html( $label ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Right Column: Form -->
                    <div class="gc-estimate-lightbox__right">
                        <?php if ( ! empty( $form_shortcode ) ) : ?>
                            <div class="gc-estimate-form gc-estimate-form--lightbox">
                                <?php echo do_shortcode( $form_shortcode ); ?>
                            </div>
                        <?php else : ?>
                            <p class="gc-estimate-lightbox__no-form">Form not configured. Please set the estimate form shortcode in site options.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
