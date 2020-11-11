<?php require_once APPROOT.'/views/inc/header.php' ?>
<?php require_once APPROOT.'/views/inc/nav.php' ?>
 <div class="container-fluid my-5">
     <div class="container">
            <?php flash("pes");?>
            <div class="row justify-content-between no-gutters  px-3 mb-3">

             <?php if (getUserSession() != false) :?>

                <a href="<?php echo URLROOT .'post/home/'.$data->cat_id?>" class="btn btn-primary">Back</a>
                 <a href="<?php echo URLROOT .'post/edit/'.$data->id?>" class="btn btn-warning">Edit</a>
            <?php else: ?>
                <a href="<?php echo URLROOT .'post/home/'.$data->cat_id?>" class="btn btn-primary">Back</a>
            <?php endif;?>   

            

            </div>
         <div class="col-md-12">
                <div class="card p-5">
                    <div class="card-header">
                        <?php echo $data->title ?>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($data->image)):?>
                            <img src="<?php echo URLROOT.'assets/uploads/'.$data->image?>" alt="" width="200px" height="200px">
                        <?php endif;?>
                        <p> 
                        <?php echo $data->content?>
                        </p>
                    </div>
                </div>
         </div>
     </div>
 </div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>