<?php
assets
    css
    image
    js
includes
    Admin
        views
            address-edit.php
            address-list.php
            address-new.php
            address-view.php
        Addressbook.php
        Menu.php
    Api
    Cli
    Frontend
        Shortcode.php
    Admin.php
    Frontend.php

wedevs-academy.php



======================
CLASS 03 - 29.00 mins 
======================
Addressbook.php
class Addressbook {

    public $errors = []; //eta ekta public property

    ----
    ----
    ----

    // uporer public $errors e amra error set korchi, but amra ei(error['name']) error gula ke access korte parchi na
    // er karon hocche amra Addressbook Class 2ta instance toiri korechi
    // er karon hocche, amader plugin page jkn hendle hocche, eta ekta instance theke hocce
    // public function plugin_page() {}
    // ebong jokhon form_handler arekti handler hocche 
    // public function form_handler()
    
    if ( empty( $name ) ) {
        $this->errors['name'] = __( 'Please provide a name', 'wedevs-academy' );
    }

    Admin.php
    // er mane hocche: Admin er khetre Form Handler ta ekta new instance toiri hocce
    public function dispatch_actions() {
        $addressbook = new Admin\Addressbook(); 
        add_action( 'admin_init', [ $addressbook, 'form_handler' ] );
    }

    Admim/Menu.php
    // ebong Menu er khetre ekta new instance toiti hocche
    public function addressbook_page() {
        $addressbook = new Addressbook();
        $addressbook->plugin_page();
    }

    // Jehetu 2ta Class. 2ta class er property difference. Ekta class e set hocche error gula. So, ekta class e set hocche error gula. But onno class theke eta handle hocche. 
    // Eta amader change korte hobe. 

    // So Old Admin.php
    // -------------------

    namespace WeDevs\Academy;

    class Admin {
        // Initialize the class
        function __construct(){
            $this->dispatch_actions();
            new Admin\Menu(); 
        }

        public function dispatch_actions() {
            $addressbook = new Admin\Addressbook(); 
            add_action( 'admin_init', [ $addressbook, 'form_handler' ] );
        }

    }

?>
    // CLASS 04
    // =========
amra ekhon database e je data gula save kora ace sugula show korate chai,
fetch korar jonno amader ekta function banate hobe,
amader database e koto ta exctly data ace seta o amader ber korte hobe 

function.php te amader insert korar function already ace, 
fetch kora function toiri korbo ekhon:

    
7.17 mins 
-----------
so, amra amader show korar pala; wordpress er ekta Class ace (not so much well documentation) 
wp_list_table();
amader je post table thake, pages table thake, comment table thake, so gula table data structure ek e dhoroner 
So sob jaygay same dhoroner structure use hocche
se jonno amra Admin folder e ekta Class likhbo, jar naam hobe Address_List.ph

amra ekta class likbo, jeta wp list table ke Extend korbe; wp_list_table sorasori use kora jay na, extend kore nite hoy. 
<!-- Admin/Address_List.php -->
<?php

?>

