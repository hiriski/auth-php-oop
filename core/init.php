<?php


/** Start Session */
session_start();

/** Load semua class yanga da di folder classes
  * menggunakan fungsi spl_autoload_register() 
  * isi dari parameter ini adalah fungsi
  * dan isi parameter di dalam fungsi ini adalah nama file */
spl_autoload_register( function($file_name){
  require_once 'classes/' . $file_name . '.php';
});

$user = new User();