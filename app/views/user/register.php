
<?php require_once APPROOT.'/views/inc/header.php' ?>
<?php require_once APPROOT.'/views/inc/nav.php' ?>


    
    <div class="container-fluid my-5">
        <div class="container">
            <div class="card col-md-8 offset-md-2 p-5 bg-light">
                <h3 class="text-center text-info">Register your information</h3>
                <form action="<?php echo URLROOT."user/register"?>" method="POST">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : ''; ?>" id="name" name="name">
                        <span class="text-danger "><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
                    </div>

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


                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control <?php echo !empty($data['confirm_password_err']) ? 'is-invalid' : ''; ?>" id="confirm_password " name="confirm_password">
                        <span class="text-danger "><?php echo !empty($data['confirm_password_err']) ? $data['confirm_password_err'] : ''; ?></span>
                    </div>


                    <div class="row justify-content-between no-gutters">
                        <a href="<?php echo URLROOT.'user/login' ?>" class="text-primary">Already register! go to login </a>
                        <div>
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


<?php require_once APPROOT.'/views/inc/footer.php' ?>