<?php

class Session {

    /* Method set session
        method ini punya 2 parameter
        parameter pertama adalah key dan parameter kedua adalah valuenya */
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
    

    /*  Method flash message ini berfungsi untuk 
        menampilkan flash message hanya 1 kali saja
        misal : ketika user berhasil register akan diberikan session pesan
        kemudian sessionya akan dihapus secara otomatis oleh fungsi ini sendiri

        Method ini punya 2 parameter
        param 1 (key) nama sessionya
        param 2 (value) pesan sessionya (defaul param ke 2 string kosong )
        */
    public static function flash($name, $message = '') {
        if(self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        }
        else {
            self::set($name, $message);
        }
    }



    /* method untuk menghapus session */
    public static function delete($name) {
        
        /* uji dulu apakah sessionya sudah ada ?
            jika ada maka hapus sessionnya */
        if(self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

}