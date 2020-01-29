<?php

class Session {

    /** Method set session */
    /*  method ini punya 2 parameter
        * parameter pertama adalah key dan parameter kedua adalah valuenya */
    public static function set($key, $value) {
        return $_SESSION[$key] = $value;
    }


    /** Method untuk mendapatkan session */
    public static function get($key) {
        return $_SESSION[$key];
    }


    /** Method untuk mengecek session */
    public static function exists($key){
        if(isset($_SESSION[$key])) return true;
        else return false;

        /* menggunakan opeator ternary */
        // return (isset($_SESSION[$key])) ? true : false;
    }
    
}