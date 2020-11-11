<?php require_once APPROOT.'/views/inc/header.php' ?>
<?php require_once APPROOT.'/views/inc/nav.php' ?>
 

<div class="container-fluid">
    <div class="container my-3">
    <?php if (getUserSession() != false) :?>
    <a href="<?php echo URLROOT.'post/create'?>" class="btn btn-primary mb-2">Create</a>
    <?php endif;?>   
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <?php foreach($data['cats'] as $cat): ?>
                    <li class="list-group-item">
                        <a href="<?php echo URLROOT.'post/home/'.$cat->id;?>"><?php echo $cat->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-8">
              <?php foreach($data['posts'] as $post): ?>
                <div class="card mb-3">
                    <div class="card-header bg-dark text-white">
                        <h4><?php echo $post->title ?></h4>
                    </div>
                    <div class="card-block p-2">
                        <p><?php echo $post->description ?></p>
                        <div class="row justify-content-end no-gutter">

                            <?php if (getUserSession() != false) :?>

                                <a href="<?php echo URLROOT .'post/show/'.$post->id?>" class="btn btn-sm btn-success mr-3">Detail</a>
                                <a href="<?php echo URLROOT .'post/edit/'.$post->id?>" class="btn btn-sm btn-warning mr-3">Edit</a>
                                <a href="<?php echo URLROOT .'post/delete/'.$post->id?>" class="btn btn-sm btn-danger mr-3">Delete</a>
                            <?php else: ?>
                                <a href="<?php echo URLROOT .'post/show/'.$post->id?>" class="btn btn-sm btn-success mr-3">Detail</a>
                            <?php endif;?>   

                        </div>
                    </div>
                </div>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
 

<?php require_once APPROOT.'/views/inc/footer.php' ?>