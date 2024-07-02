<?php
namespace WeDevs\Academy\Admin;

class Addressbook {

    public $error = [];

    public function plugin_page() {
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list' ;
        
        switch( $action ) {
            case 'new';
                $template = __DIR__ . '/views/address-new.php';
                break;

            case 'edit';
               $template = __DIR__ . '/views/address-edit.php';
               break;
            
            case 'view';
                $template = __DIR__ . '/views/address-view.php';
                break;

            default;
                $template = __DIR__ . '/views/address-list.php';
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }

    public function form_handler() {
        if ( ! isset( $_POST['submit_address'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'new_address') ) {
            wp_die( 'Are you cheating?' );
        }

        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( 'Are you cheating?' );
        }

        $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '' ;
        $address = isset( $_POST['address'] ) ? sanitize_textarea_field( $_POST['address'] ) : '' ;
        $phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '' ;

        if ( empty( $name ) ) {
            $this->error['name'] = __( 'Please provide a name', 'wedevs-academy' );
        }

        if ( empty( $phone ) ) {
            $this->error['phone'] = __( 'Please provide a phone number', 'wedevs-academy' );
        }

        $insert_id = wd_ac_insert_address( [
            'name' => $name,
            'address' => $address,
            'phone' => $phone
        ] );

        var_dump( $_POST );
        exit;
    }

    
}