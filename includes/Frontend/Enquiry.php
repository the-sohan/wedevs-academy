<?php
namespace WeDevs\Academy\Frontend;

/**
 * Shortcode handler class
 */

class Enquiry {

    function __construct() {
        add_shortcode( 'academy-enquiry', [ $this, 'render_shortcode' ] );
    }

    public function render_shortcode( $atts, $content = '' ) {

        wp_enqueue_script( 'academy-enquiry-script' );
        wp_enqueue_style( 'academy-enquiry-style' );
        
        return '<div class="testt">Hello from shortcode</div>';
    }

}