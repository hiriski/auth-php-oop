<?php 
require_once('core/init.php');

/** Inisialisasi variable $errors bertype array untuk menampilkan error lebih spesifik */
$input_errors = [];

  /** Ini harus diletakan di atas header
    * karena nanti tidak bisa redirect atau menggunakan fungsi lain karena sudah ada ouput include header */
  if(Input::get('submit')) {

  /** VALIDATION */
  /* Panggil object validation */
  $validation = new Validation();

  /** Metode check validation */
  $validation = $validation->check(array(
    "name"     => array('required' => true, 'min' => 5, 'max' => 75),
    "email"    => array('required' => true, 'min' => 5,'max' => 255),
    "password" => array('required' => true, 'min' => 3)
  ));

  if($validation->passed()) {
    $user->register( array(
      'name'      => Input::get('name'),
      'email'     => Input::get('email'),
      'password'  => password_hash(Input::get('password'), PASSWORD_DEFAULT),
    ));
  } else {
    $input_errors = $validation->show_errors();
    
  }

}


include 'templates/header.php';

?>


<div id="auth_oop">
  <div class="container">
    <div class="row my-5">
      <div class="col-12 col-md-6 mx-auto card auth_box">
      <div class="heading mt-4 text-center">
        <h3>Singup</h3>
      </div>
        <div class="auth_box card-body">

          <div id="errors">
            <ul>
              <!-- menampilkan daftar error -->
              <?php if(!empty($input_errors)):?>
                <?php foreach ($input_errors as $key => $error):?>
                  <li class="error"><?php echo $error;?></li>
                <?php endforeach;?>
              <?php endif;?>
            </ul>
          </div>

          <form action="" method="post">
            <div class="form-group">
              <label for="name">Name: </label>
              <input type="name" name="name" class="form-control">
            </div>        
            <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" name="email" class="form-control">
            </div>        
            <div class="form-group">
              <label for="password">Password : </label>
              <input type="password" name="password" class="form-control">
            </div>        
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn-block btn-success" value="Submit">
            </div>        
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'templates/footer.php';?>