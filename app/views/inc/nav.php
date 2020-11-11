
<div class="container-fluid bg-dark">
    <nav class="container navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-light" href="<?php echo URLROOT ?> ">
        <img src="<?php echo URLROOT.'assets/images/logo.jpg'?>" alt="" width="30px" height="30px" class="rounded">

        <span class ="ml-3">Pratice project</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <?php if(getUserSession()) : ?>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="<?php echo URLROOT.'admin/home'?> ">Admin Panel </a>
                </li>
            <?php endif; ?>
       
        <li class="nav-item dropdown">
            <a class="  nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if(getUserSession() != false) :?>
                <?php echo getUserSession()->name ?>
            <?php else : ?>  
                Member
            <?php endif; ?>      
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

            <?php if (getUserSession() != false) :?>
                <a class="dropdown-item" href="<?php echo URLROOT.'user/logout'?>">Logout</a>
            <?php else: ?>
                <a class="dropdown-item" href="<?php echo URLROOT.'user/login'?>">Login</a>
                <a class="dropdown-item" href="<?php echo URLROOT.'user/register'?>">Register</a>
            <?php endif;?>   

            </div>
        </li>

        </ul>
    </div>
    </nav>
</div>
