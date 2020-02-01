<?php

class Validation {

    private $_passed = false,
            $_errors = array();

    /** Method pengecekan validasi */
    public function check($items = array()) {

        /** Looping array bagian luar */
        foreach ($items as $item => $rules) {
            /** looping array bagian dalam (rules) */
            foreach ($rules as $rule => $rule_value) {

                switch ($rule) {
                    case 'required':
                        /* jika di trim inputan kosong dan isi dari required true masuk sisi */
                        if( trim(Input::get($item)) == false && $rule_value == true ) {
                            self::addError("Kolom " . ucfirst($item) . " wajib diisi");
                        }
                        break;

                    case 'min':
                        if(strlen(Input::get($item)) < $rule_value){
                            self::addError("$item minimal $rule_value karakter");
                        }
                        break;

                    case 'max':
                        if(strlen(Input::get($item)) > $rule_value){
                            self::addError("$item maksimal $rule_value karakter");
                        }
                        break;

                    /* case password match */
                    case 'match':
                        /** jika password tidak sama dengan input password_verify tambahkan error */
                        if( Input::get('password') != Input::get($item) ){
                            self::addError("$item tidak sama");
                        }
                        break;
                        
                    default:
                        break;
                }

            }
        }

        /** Jika variable $_errors (array) kososong buat variable $_passed jadi true */
        if(empty($this->_errors)){
            $this->_passed = true;
        }
        return $this;

    } // end check()


    /** Method untuk menambahkan error (menunpuk2 ke dalam array) */
    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function show_errors() {
        return $this->_errors;
    }

    public function passed(){
        return $this->_passed;
    }



}