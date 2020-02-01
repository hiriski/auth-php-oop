<?php


class Redirect {
    public function __construct($to) {
        header('Location: ' . $to . '.php');
    }
}