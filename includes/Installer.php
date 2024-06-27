<?php
namespace WeDevs\Academy;

// Installer Class
class Installer {

    public function run() {
        $this->add_version();
        $this->create_table();
    }

    public function add_version(){
        $installed = get_option( 'wd_academy_installed' );

		if ( ! $installed ) {
			update_option( 'wd_academy_installed', time() );
		}

		update_option( 'wd_academy_version', WD_ACADEMY_VERSION );
    }

    public function create_tables(){
        global $wpdb;

        $schema = "CREATE TABLE IF NOT EXISTS } `` "

    }

}