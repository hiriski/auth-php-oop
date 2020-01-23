<?php


class Database {
  
  /** Membuat credentials */
  private static $_instance = null; // defaulnya null
  private $mysqli,
          $_host     = 'localhost',
          $_user     = 'root',
          $_password = 'kopi',
          $_database = 'authoop';

  /** Fungsi otomatis akan dijalankan */
  public function __construct() {

    /* Di dalam fungsi ini mengkoneksikan database ke mysqli */
    $this->mysqli = new mysqli($this->_host, $this->_user, $this->_password, $this->_database);

    /** Menguji */
    if($this->mysqli->connect_errno) {
      die($this->mysqli->connect_error);
    }
  }


  /** Menggunakan Singleton pattern 
    * ( Keuntungan dari pattern ini agar tidak terjadi koneksi double )
    * Fungsi ini akan mengecek apakah variable $_instance sudah di set ? (atau dengan kata lain apakah  memiliki data ?) default variable ini null
    * Jika belum ada maka akan diisi koneksi ke databasenya
    * Tapi kalau sudah ada maka akan ngebalikin nilai instancenya */
  public static function getInstance() {
    if(!isset(self::$_instance)) {
      self::$_instance = new Database(); // ini artinya akan memanggil metode __construc();
    }
    return self::$_instance;
  }


}

?>