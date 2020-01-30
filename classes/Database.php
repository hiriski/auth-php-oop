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



  /* Method insert
    Fungsi ini punya 2 parameter
    parameter ke 1 adalah nama table
    parameter ke 2 adalah fields berupa array */ 
  public function insert($table, $fields) {

    /* ambil key dari array, ubah menjadi string dan pisahkan dengan koma,
      ini akan di isi sebagai column pada query insert */
    $column = implode(", ", array_keys($fields));

    /* Ambil values dari array kemudian akan di isi sebagai values di query 
      tapi ada yang perlu di uji terlebih dahulu karena mungkin saja akan ada string atau INT atau TUNYINT
      karena memang untuk mengisi type data ini berbeda (String menggunakan kutif sedangkan INT tidak) */

    /** Siapkan variable yang awalnya array kosong */
    $values_array = [];
    $i = 0; // untuk looping
    /** Looping dan dapatkan valuesnya */
    foreach($fields as $key => $val) {
      $values_array[$i] = "'" . self::escape($val) . "'";
      $i++;
    }

    /** Gabungkan element array dari $values_array menjadi string dan dipisahkan dengan "koma" */
    $values = implode(", ", $values_array);

    /* query dibawah ini nanti jadinya kurang lebih seperti ini 
      INSERT INTO users (name, email, password) VALUES('Riski','hi@riski.id','123') */
    $query = "INSERT INTO $table ($column) VALUES ($values)";

    /** Jalankan query melalui method run_query() */
    return self::run_query($query, "Ada kesahalan ketika insert data");
  }



  /** method get_user_info */
  /* Method ini punya 3 parameter
    parameter ke 1 : nama table
    parameter ke 2 : nama kolom
    parameter ke 3 : value yang ingin dicari */
  public function get_user_info($table, $column, $value) {
    /* uji. Jika inputan user bukan integer tambahkan kutif */
    if(!is_int($value)) $value = "'" . $value . "'";
    $query = "SELECT * FROM $table WHERE $column = $value";

    /* uji sekalian di deklasari ke variable */
    if ($result = $this->mysqli->query($query)) {
      /* keluarkan hasilnya dengan fetch_object saja */
      while($row = $result->fetch_object()) {
        return $row;
      }
    }

  }


  /* Method run query
    Method ini punya 2 parameter tapi parameter yang wajib cuma 1,
    parameter ke 2 opsional ini adalah errornya */
  private function run_query($name, $error = NULL) {
    /** Uji jika true return true */
    if ($this->mysqli->query($name)) return true;
    else echo $error;
  }


  /** Method escape */
  private function escape($name){
    return $this->mysqli->real_escape_string($name);
  }
  





}

?>