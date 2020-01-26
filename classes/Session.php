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

    
    /** Method exists untuk mengecek apakah session sudah di set atau belum */
    public static function exists($key) {
        
        /** jika sudah di set atau ada datanya return true */
        if (isset($_POST[$key])) return true;

        /** jika belum di set return false */
        else return false;

        /** menggunakan opeator ternary */
        // return (isset($_POST[$key])) ? true : false;
    }

    
}