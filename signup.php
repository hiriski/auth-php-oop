<?php include 'templates/header.php';?>


<div id="auth_oop">
  <div class="container">
    <div class="row my-5">
      <div class="col-12 col-md-6 mx-auto card">
      <div class="heading mt-4 text-center">
        <h3>Singup</h3>
      </div>
        <div class="auth_box card-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="name">Name: </label>
              <input type="name" class="form-control">
            </div>        
            <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" class="form-control">
            </div>        
            <div class="form-group">
              <label for="password">Password : </label>
              <input type="password" class="form-control">
            </div>        
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-success" value="Submit">
            </div>        
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'templates/footer.php';?>