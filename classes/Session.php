<?php

class Session {

    /** Fungsi set session */
    /*  fungsi ini punya 2 parameter
        * parameter pertama adalah key dan parameter kedua adalah valuenya */
    public static function set($key, $value) {
        return $_SESSION[$key] = $value;
    }


    /** Fungsi get session */
    public static function get($key) {
        return $_SESSION[$key];
    }

    
}