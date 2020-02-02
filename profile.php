<?php
require_once('core/init.php');

/** Uji apakah sessionya ada ? jika tidak ada lemparkan user ke halaman signin */
if( !$user::is_loggedin() ) {
  /* Sebelum di redirect
    store dulu flash message. Jadi nanti idenya
    si user akan mendapatkan flash message bahwa ia harus login dulu
    untuk mengakses halaman ini */
  Session::flash('needlogin', 'Anda harus login dulu!');
  redirect('signin');
}

/* Periksa apakah session profile ada  ?
    jika ada panggil method flash di class Session */
if(Session::exists('profile')) {
  echo Session::get('profile');
}

include 'templates/header.php';


/* Data user */
$data = $user->get(Session::get('email'));

?>




<!-- Cek apakah user ini admin ? jika admin jalankan fungsi2 dibawah ini -->
<?php if( $user->is_admin(Session::get('email')) ):?>
  <div class="container">
    <div class="row text-center mt-5">
      <div class="col-10 col-md-6 mx-auto">
        <h3>Hello Admin</h3>
      </div>
    </div>
  </div>
<?php endif;?>



<div class="container">
  <div class="row my-5">
    <div class="col-sm-12 col-md-6 mx-auto">
      <div class="main-heading text-center">
        <h4>Profile</h4>
      </div>
      <div class="jumbotron">
        <h2>Hi,<?php echo $data->name; ?></h2>
        <p><?php echo $data->email; ?></p>
        <p class="lead">Welcome to Profile page!</p>

        <div class="block">
          <a 
            href="<?php echo base_url('change-password.php');?>" 
            class="btn btn-primary">Change Password
          </a>
        </div>

      </div>
    </div>
  </div>
</div>


<?php include 'templates/footer.php';?>