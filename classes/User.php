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


}


?>