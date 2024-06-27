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

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_addresses` (
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT, 
            `name` varchar(100) NOT NULL,
            `address` varchar(255) DEFAULT NULL,
            `phone` varchar(30) DEFAULT NULL,
            `created_by` bigint(20) unsigned NOT NULL,
            `created_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    }

}