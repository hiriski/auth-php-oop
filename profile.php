<?php
require_once('core/init.php');
include 'templates/header.php';

?>

<div class="container">
  <div class="row my-5">
    <div class="col-sm-12 col-md-6 mx-auto">
      <div class="main-heading text-center">
        <h4>Profile Page</h4>
      </div>
      <div class="jumbotron">
        <h2>Hi, <?=Session::get('email');?></h2>
        <p class="lead">Welcome to Profile page!</p>
      </div>
    </div>
  </div>
</div>


<?php include 'templates/footer.php';?>