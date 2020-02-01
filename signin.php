<?php 
require_once('core/init.php');

/* pengujian apakah session si user sudah ada ?
  jika ada si user ini nggak boleh signin lagi tapi redirect ke profile.php */
if (Session::exists('email')) {
  redirect('profile');
}


/* Menampilkan flash message ketika user mencoba mengakses halaman profile
  dan kemudian di lemparkan ke halaman ini */
if(Session::exists('needlogin')) {
  echo Session::flash('needlogin');
}


$input_errors = [];

  if(Input::get('submit')) {

  $validation = new Validation();
  $validation = $validation->check(array(
    "email"    => array('required' => true),
    "password" => array('required' => true)
  ));

  if($validation->passed()) {

    $user_email = Input::get('email');
    $user_pass  = Input::get('password');

    /* pengujian pertama mengecek apakah email sudah terdaftar atau belum */
    if($user->check_email(Input::get('email'))) {

      if($user->singin($user_email, $user_pass)) {
        /** setelah user berhasil singin  Set Session kemudian lemparkan user ke profile.php */
        Session::set('email', Input::get('email'));
        redirect('profile');
      }
      else {
        echo 'Gagal signin';
      }
    }

    else {
      echo "Email ini belum terdaftar";
    }
  }
  else {
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
        <h3>Signin</h3>
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

          <form action="signin.php" method="post">     
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