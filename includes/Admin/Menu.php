<?php
namespace WeDevs\Academy\Admin;

/**
 * The menu handler class
 */
class Menu {
    /**
     * Constructor method to initialize the class
     */
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Registers a new menu page
     */
    public function admin_menu() {
        add_menu_page(
            __( 'weDevs Academy', 'wedevs-academy' ), 
            __( 'Academy', 'wedevs-academy' ), 
            'manage_options', 
            'wedevs-academy', 
            [ $this, 'plugin_page' ], 
            'dashicons-welcome-learn-more', 
            null
        );
    }

    /**
     * Displays the plugin page content
     */
    public function plugin_page() {
        echo 'Hello world';
    }
}


