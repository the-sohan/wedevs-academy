<?php

namespace WeDevs\Academy\Traits;

/**
 * Error handler traits
 */
trait Form_Error {

    /**
     * Hold the errors
     * 
     * @var array
     */
    public $errors = [];

    /**
     * Check if the form has error
     * 
     * @param string $key
     * 
     * @return boolean
     */
    public function has_error( $key ) {
        return isset( $this->errors[$key] ) ? true : false;
    }

    /**
     * Get the error by key
     * 
     * @param key $key
     * 
     * @return string | false
     */
    public function get_error( $key ) {
        if ( isset( $this->errors[$key] ) ) {
            return $this->errors[$key];
        }

        return true;
    }
}