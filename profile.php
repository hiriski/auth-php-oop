<?php
require_once('core/init.php');

/** Uji apakah sessionya ada ? jika tidak ada lemparkan user ke halaman signin */
if(!Session::exists('email')) {
  /* Sebelum di redirect
    store dulu flash message. Jadi nanti idenya
    si user akan mendapatkan flash message bahwa ia harus login dulu
    untuk mengakses halaman ini */
  Session::flash('needlogin', 'Anda harus login dulu!');
  header('Location: signin.php');
}

/* Periksa apakah session profile ada  ?
    jika ada panggil method flash di class Session */
if(Session::exists('profile')) {
  echo Session::get('profile');
}

include 'templates/header.php';

?>

<div class="container">
  <div class="row my-5">
    <div class="col-sm-12 col-md-6 mx-auto">
      <div class="main-heading text-center">
        <h4>Profile</h4>
      </div>
      <div class="jumbotron">
        <h2>Hi, <?=Session::get('email');?></h2>
        <p class="lead">Welcome to Profile page!</p>
      </div>
    </div>
  </div>
</div>


<?php include 'templates/footer.php';?>