<?php
namespace WeDevs\Academy\Admin;

/**
 * The menu handler class
 */
class Menu {

    public $addressbook;

    /**
     * Constructor method to initialize the class
     */
    public function __construct( $addressbook ) {
        $this->addressbook = $addressbook;
        
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Registers a new menu page
     */

    public function admin_menu() {

        $parent_slug = 'wedevs-academy';
        $capability = 'manage_options';
    
        $hook = add_menu_page(
            __( 'weDevs Academy', 'wedevs-academy' ), 
            __( 'Academy', 'wedevs-academy' ), 
            $capability, 
            $parent_slug, 
            [ $this->addressbook, 'plugin_page' ], 
            'dashicons-welcome-learn-more', 
            null
        );

        add_action( 'admin_head-' . $hook, [ $this, 'enqueue_assets' ] );
    
        // add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
        add_submenu_page( 
            $parent_slug, 
            __( 'Address Book', 'wedevs-academy' ), 
            __( 'Address Book', 'wedevs-academy' ), 
            $capability, 
            $parent_slug, 
            [ $this->addressbook, 'plugin_page' ] 
        );

        add_submenu_page( 
            $parent_slug, 
            __( 'Settings', 'wedevs-academy' ), 
            __( 'Settings', 'wedevs-academy' ), 
            $capability, 
            'wedevs-academy-settings', 
            [ $this, 'settings_page' ] 
        );
    }

    public function settings_page() {
        echo 'Address Book Settings';
    }

    public function enqueue_assets(){
        wp_enqueue_style( 'academy-admin-style' );
    }
    
}


