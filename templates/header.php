<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <title>Learn AUTH PHP OOP</title>
</head>
<body>

<div id="top_section">
  <div class="container">
    <div class="row mt-3">
      <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
        <nav class="navbar navbar-expand-md navbar-light bg-primary rounded shadow">
          <a href="<?php echo base_url();?>" class="navbar-brand text-white">Auth OOP</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top_nav" aria-controls="top_nav" aria-expanded="false" aria-label="Toggle top navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="top_nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a href="<?php echo base_url('signin.php');?>" class="nav-link text-white">Sign in</a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('signup.php');?>" class="nav-link text-white">Sign Up</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>