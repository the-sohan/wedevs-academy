<?php

/**
 * Insert a new address 
 * 
 * @param array $args
 *     
 * @return int|WP_Error
 */
function wd_ac_insert_address( $args = [] ) {
    global $wpdb;

    // Validate the input data
    if ( empty( $args['name'] ) ) {
        return new WP_Error( 'no-name', __( 'You must provide a name', 'wedevs-academy' ) );
    }

    // Set default values
    $defaults = [
        'name' => '',
        'address' => '',
        'phone' => '',
        'created_by' => get_current_user_id(),
        'created_at' => current_time( 'mysql' ),
    ];

    // Parse the arguments with the defaults
    $data = wp_parse_args( $args, $defaults );

    // Insert the data into the database
    $inserted = $wpdb->insert(
        "{$wpdb->prefix}ac_addresses",
        $data,
        [
            '%s',
            '%s',
            '%s',
            '%d',
            '%s'
        ]
    );

    // Check if the insertion was successful
    if ( ! $inserted ) {
        return new WP_Error( 'failed-to-insert', __( 'Failed to insert data', 'wedevs-academy' ) );
    }

    // Return the ID of the newly inserted row
    return $wpdb->insert_id;
}
