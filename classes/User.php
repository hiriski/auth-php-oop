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



  /** method signin */
  public function singin($email, $password) {
    $credentials = $this->_db->get_user_info('users', 'email', $email);

    /* Mencocokan input password user dengan password yang sudah di hash di database */
    if(password_verify($password, $credentials->password)) return true;
    else return false;
  }

}


?>