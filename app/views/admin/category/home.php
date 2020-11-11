
<?php require_once APPROOT.'/views/inc/header.php' ?>
<?php require_once APPROOT.'/views/inc/nav.php' ?>
 
<div class="container-fluid p-0">
    <div class="row">

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h2>Category</h2>
                </div>
                <ul class="list-group list-group-flush  ">
                    <?php foreach($data['cats'] as $category) : ?>
                    <li class="list-group-item justify-content-between d-flex">
                        <span>
                            <?php echo $category->name ?>
                        </span>
                        <span>
                            <a href="<?php echo URLROOT."category/edit/".$category->id ?> "><i class="fa fa-edit text-warning"></i></a>
                            <a href="<?php echo URLROOT."category/delete/".$category->id ?> "><i class="fa fa-trash text-danger"></i></a>
                        </span>
                    </li>
                    <?php endforeach ;?>     
                </ul>
            </div>
        </div>

       <div class="col-md-5 offset-2 my-5">
            <?php flash('cat_create_success');?>
            <h3 class="text-center text-info">Category Create</h3>
            <form action="<?php echo URLROOT.'category/create' ?>" method="POST">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control <?php echo !empty($data['name_err']) ? 'is-invalid' : ''; ?>" id="name" name="name">
                    <span class="text-danger "><?php echo !empty($data['name_err']) ? $data['name_err'] : ''; ?></span>
                </div>

                <div class="row justify-content-end no-gutters">
                    <div>
                        <button class="btn btn-outline-primary">Submit</button>
                    </div>
                </div>
            </form>
       </div>

    </div>
</div>
 

<?php require_once APPROOT.'/views/inc/footer.php' ?>