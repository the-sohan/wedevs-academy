<?php

/**
 * Insert a new address 
 * 
 * @param array $args
 * @return int|\WP_Error
 */
function wd_ac_insert_address( $args = [] ) {
    global $wpdb;

    // Validate the input data
    if ( empty( $args['name'] ) ) {
        return new \WP_Error( 'no-name', __( 'You must provide a name', 'wedevs-academy' ) );
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

    if ( isset ( $data['id'] ) ) {

        $id = $data['id'];
        unset( $data['id'] );

        $updated = $wpdb->update(
            "{$wpdb->prefix}ac_addresses",
            $data,
            [ 'id' => $id ],
            [
                '%s',
                '%s',
                '%s',
                '%d',
                '%s'
            ],
            [ '%d' ] 
        );

        return $updated;

    } else {
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
            return new \WP_Error( 'failed-to-insert', __( 'Failed to insert data', 'wedevs-academy' ) );
        }

        // Return the ID of the newly inserted row
        return $wpdb->insert_id;
    } 

}

function wd_ac_get_addresses( $args = [] ) {
    global $wpdb;

    $defaults = [
        'number' => 20,
        'offset' => 0,
        'orderby' => 'id',
        'order' => 'ASC'
    ];

    $args = wp_parse_args( $args, $defaults );

    $items = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}ac_addresses
            ORDER BY {$args['orderby']} {$args['order']}
            LIMIT %d, %d",
            $args['offset'], $args['number']
        )
    );

    return $items;
}

/**
 * Get the count of total address
 * 
 * @return int
 */
function wd_ac_address_count() {
    global $wpdb;

    return (int) $wpdb->get_var( "SELECT count(id) FROM {$wpdb->prefix}ac_addresses" );
}

/**
 * Fetch a single contact form the DB
 * 
 * @param int $id
 * @return object
 */
function wd_ac_get_address( $id ) {
    global $wpdb;

    $address = wp_cache_get( 'book-' . $id, 'address');

    if ( false === $address ) {
        $address = $wpdb->get_row(
            $wpdb ->prepare( "SELECT * FROM {$wpdb->prefix}ac_addresses WHERE id = %d", $id )
        );

        wp_cache_set( 'book-' . $id, $address, 'address' );
    }

    return $address;
}

/**
 * Delete an address
 * 
 * @param int $id
 * @return int|bool
 */
function wd_ac_delete_address( $id ) {
    global $wpdb;

    return $wpdb->delete(
        "{$wpdb->prefix}ac_addresses",
        [ 'id' => $id ],
        [ '%d' ]
    );
}
