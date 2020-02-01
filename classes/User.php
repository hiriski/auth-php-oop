<?php

class User {

  private $_db;

  public function __construct() {
    $this->_db = Database::getInstance();
  }

  /** Fungsi register */
  /* parameter di method ini adalah sebuah array */
  public function register($fields = array()) {
    if($this->_db->insert('users', $fields)) return true;
    else return false;
  }



  /* Method signin 
    Method ini adalah yang menentukan berhasil atau tidaknya user ketika login
    method ini menggunakan method get_user_info untuk mengecek credentials user di database */
  public function singin($email, $pass_input_user) {
    $credentials = $this->_db->get_user_info('users', 'email', $email);
    /* Mencocokan input password user dengan password yang sudah di hash di database */
    if(password_verify($pass_input_user, $credentials->password)) return true;
    else return false;
  }


  /* method check email ketika signin 
    Method ini hampir mirip dengan method signin, yaitu sama2 menggunakan method get_user_info di class Database untuk mengecek data user. Jika hasil query di method get_user_info ada maka return true */
  public function check_email($email) {
    $credentials = $this->_db->get_user_info('users', 'email', $email);
    /* Jika email yang di masukan user ada di database
      berarti variable $credentialas ada hasil maka return true
      tapi jika tidak ada hasil return false */
    if(!empty($credentials)) return true;
  }



  /* method untuk mengecek apakah user ini admin atau bukan
    jika di kolom role = 2 itu adalah admin
    tapi jika 1 itu user biasa 
    
    method ini hanya mengeluarkan boolean true jika ia admin false jika user biasa */
  public function is_admin($email) {
    $credentials = $this->_db->get_user_info('users', 'email', $email);
    if($credentials->role == 2) return true;
    else return false;
  }



  /* method is_loggedin
    fungsi ini akan digunakan untuk mengecek status user apakah sudah login atau belum 
    buat pake static aja biar beda 
    
    method ini sebenarnya akan menggantikan fungsi pengujian yang ada di signin.php dan signup.php dan profile */
  public static function is_loggedin() {
    /* apakah session si user sudah ada ? jika ada return true */
    if (Session::exists('email')) return true;
    else return false;
  }



  /** method get data user */
  public function get($email) {
    if ($this->check_email($email)) {
      /* biasakan uji dulu sebelum menampilkan, ada apa nggak datanya */
      return $this->_db->get_user_info('users', 'email', $email);
    }
  }


}


?>