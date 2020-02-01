<?php


class Token {

    /*  method untuk generate token *
        medhod ini akan meng generate token string random 
        sekaligus meng set Session dengan key token, 
        (value tokennya akan random setiap kali refresh) */

    /* md5(uniqid(rand(), true)) dapat dari stackoverflow 
        https://stackoverflow.com/questions/1846202/php-how-to-generate-a-random-unique-alphanumeric-string */
    public static function generate() {
        return Session::set('token', md5(uniqid(rand(), true)));
    }


    /* method check 
        method ini akan mencocokan token yang ada di form <input type="hidden" name="token" value="tokenrandomstring">
        dengan yang ada di session */
    public static function check($token) {
        if($token === Session::get('token')) return true;
        else return false;
    }

}