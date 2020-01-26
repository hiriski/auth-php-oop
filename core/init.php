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


/** Function base_url() */
function base_url($param = null) {
  $host = $_SERVER['HTTP_HOST'];
  $name = $_SERVER['SCRIPT_NAME'];

  /* replace basename() misal /index.php dengan string kosong */
  $scriptname = str_replace(basename($name), '', $name);
  if(isset($_SERVER['HTTPS'])) {
    return "https://" . $host . $scriptname . $param;
  }
  else {
    return "http://" . $host . $scriptname . $param;
  }
}