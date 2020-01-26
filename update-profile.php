<?php
require_once('core/init.php');
include_once('templates/header.php');
?>


<div id="auth_oop">
    <div class="container">
        <div class="row my-5">
            <div class="col-12 col-md-6 mx-auto card auth_box">
                <div class="card-body">
                    <h3 class="card-title">Update Profile</h3>
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



<?php include_once('templates/footer.php');