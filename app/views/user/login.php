
<?php require_once APPROOT.'/views/inc/header.php' ?>
<?php require_once APPROOT.'/views/inc/nav.php' ?>


			
        <!-- Page Content  -->
   
    <div class="container-fluid my-5">
        <div class="container">
            <div class="card col-md-8 offset-md-2 p-5 bg-light">
                <?php flash('register_success');?>
                <?php flash('login_fail');?>
                <h3 class="text-center text-info">Login  your account</h3>
                <form action="<?php echo URLROOT.'user/login' ?>" method="POST">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control <?php echo !empty($data['email_err']) ? 'is-invalid' : ''; ?>" id="email" name="email">
                        <span class="text-danger "><?php echo !empty($data['email_err']) ? $data['email_err'] : ''; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control <?php echo !empty($data['password_err']) ? 'is-invalid' : ''; ?>" id="password" name="password">
                        <span class="text-danger "><?php echo !empty($data['password_err']) ? $data['password_err'] : ''; ?></span>
                    </div>


                    <div class="row justify-content-between no-gutters">
                        <a href="<?php echo URLROOT.'user/register' ?>" class="text-primary">Register not yet ! go to register </a>
                        <div>
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
   


<?php require_once APPROOT.'/views/inc/footer.php' ?>