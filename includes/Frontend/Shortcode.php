<?php
namespace WeDevs\Academy\Frontend;

/**
 * Shortcode handler class
 */

class Shortcode {

    function __construct() {
        add_shortcode( 'wedevs-academy', [ $this, 'render_shortcode' ] );
    }

    public function render_shortcode( $atts, $content = '' ) {

        wp_enqueue_script( 'academy-script' );
        wp_enqueue_style( 'academy-style' );
        
        return '<div class="testt">Hello from shortcode</div>';
    }

}