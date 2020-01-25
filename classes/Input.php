<?php

/* ini adalah file fungsi untuk menhandle method POST dan GET pada form 
  Fungsi ini nantinya akan di konsumsi seperti ini
  if (Input::get('submit')) {}
  fungsi di atas kurang lebih artinya seperti ini
  if ( isset(_$POST['submit'])) {} */

class Input {
  
  public static function get($name) {
    if( isset($_POST[$name]) ) {
      return $_POST[$name];
    }
    else if( isset($_GET[$name]) ) {
      return $_GET[$name];
    }
    else {
      return false;
    }
  }

}
