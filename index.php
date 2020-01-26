<?php

require_once('core/init.php');
include_once('templates/header.php');
?>





<div id="auth_oop">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <a href="<?php echo base_url('signin.php');?>">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>Sign In</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="<?php echo base_url('signup.php');?>">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>Signup</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> <!-- .row -->
            </div>
        </div>
    </div>
</div>






<?php include_once('templates/header.php'); ?>