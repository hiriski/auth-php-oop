
<?php
require_once('core/init.php');

/** Uji apakah sessionya ada ? jika tidak ada lemparkan user ke halaman signin */
if( !$user::is_loggedin() ) {
    Session::flash('needlogin', 'Anda harus login dulu!');
    redirect('signin');
}


/* Data user */
$data = $user->get(Session::get('email'));

$input_errors = [];

if(Input::get('submit')) {
    if(Token::check(Input::get('token'))) {

        $validation = new Validation();
        $validation = $validation->check(array(
            "password"        => array('required' => true),
            "new_password"    => array('required' => true, 'min' => 3),
            "password_verify" => array('required' => true, 'match' => 'new_password')
        ));
        
        if ($validation->passed()) {
            /* uji dulu pastikan user mengisi password lama sesuai dengan yang ada di database */
            if( password_verify(Input::get('password'), $data->password )) {
                $user->update(array(
                    'password'  => password_hash(Input::get('new_password'), PASSWORD_DEFAULT),
                    /* fungsi ini sudah dinamis saya bisa saja mengupdate data2 user seperti nama password email dll */
                ), $data->id);

                /** jika berhasil update password set session flash dan redirect */
                Session::flash('profile', 'Password berhasil di update');
                redirect('profile');
            }
            else {
                echo "Password lama anda salah!";
            }
        }
        else {
            $input_errors = $validation->show_errors();
        }
    }
    else {
        echo "Token not valid";
    }
}

include 'templates/header.php';

?>



<div id="auth_oop">
    <div class="container">
        <div class="row my-5">
        <div class="col-12 col-md-6 mx-auto card auth_box">
        <div class="heading mt-4 text-center">
            <h3>Change Password</h3>
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

            <form action="change-password.php" method="post">
                <div class="form-group">
                    <label for="password">Current password : </label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="new_password">New password : </label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_verify">Verify new password </label>
                    <input type="password" name="password_verify" class="form-control">
                </div>
                <div class="form-group">
                <!-- CSRF TOKEN -->
                    <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                    <input type="submit" name="submit" class="btn btn-block btn-success" value="Submit">
                </div>        
            </form>
            </div>
        </div>
        </div>
    </div>
</div>


<?php include 'templates/footer.php';?>