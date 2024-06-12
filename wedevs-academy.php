<?php
/*
 * Plugin Name:       weDevs Academy
 * Description:       https://www.youtube.com/watch?v=D_I3qpuGKno&list=PLx7dNwJLCzHldCT_F1uOBELcSYktvrePO
 * Version:           1.0
 * Author:            Sohan 12 mins
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// The main plugin
final class WeDevs_Academy {

	/**
	 * Plugin version
	 * 
	 * @var string
	 */
	const VERSION = '1.0';

	// Class constructor
	private function __construct() {
		$this->define_constants();


	}

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
		
		return $instance;
	}

	/**
	 * Define the constants
	 */
	public function define_constants() {
		define( 'WD_ACADEMY_VERSION', self::VERSION );
		define( 'WD_ACADEMY_FILE', __FILE__ );
		define( 'WD_ACADEMY_PATH', __DIR__ );
		define( 'WD_ACADEMY_URL', plugins_url( '', WD_ACADEMY_FILE ) );
		define( 'WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets' );
	}
}

/**
 * Initializes the main plugin
 * 
 * @return \WeDevs_Academy
 */
function wedevs_academy() {
	return WeDevs_Academy::init();
}

// Initialize the plugin
wedevs_academy();
