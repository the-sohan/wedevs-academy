<?php
namespace WeDevs\Academy;

class Assets {
    // Initialize the class
    function __construct(){
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    public function get_scripts() {
        return [
            'academy-script' => [
                'src'       => WD_ACADEMY_ASSETS . '/js/frontend.js',
                'version'   => filemtime( WD_ACADEMY_PATH . '/assets/js/frontend.js' ),
                'deps'      => [ 'jquery' ]
            ]
        ];
    }

    public function get_styles() {
        return [
            'academy-style' => [
                'src'       => WD_ACADEMY_ASSETS . '/css/frontend.css',
                'version'   => filemtime( WD_ACADEMY_PATH . '/assets/css/frontend.css' ),
            ]
        ];
    }

    public function enqueue_assets() {
        $scripts = $this->get_scripts();
        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        $styles = $this->get_styles();
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $style['version'] );
        }
    }
}