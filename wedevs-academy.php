<?php
/*
 * Plugin Name:       weDevs Academy
 * Description:       https://www.youtube.com/watch?v=D_I3qpuGKno&list=PLx7dNwJLCzHldCT_F1uOBELcSYktvrePO
 * Version:           1.0
 * Author:            Sohan
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


final class WeDevs_Academy {

	// class constructor
	function __construct() {

	}

	/**
	 * 
	 * 
	 * @return
	*/



	/**
	 * Initializes a Singleton instance
	 * 
	 * @return \WeDevs_Academy
	*/
	public static function init() {
		static $instance = false; 

		if ( ! $instance ) {
			$instance = new self();
		}  
	}

	/**
	 * Initializes the main plugin
	 * 
	 * @return \WeDevs_Academy
	*/
	function wedevs_academy() {
		return WeDevs_Academy()::init();
	}

}





