<?php require_once APPROOT.'/views/inc/header.php' ?>
<?php require_once APPROOT.'/views/inc/nav.php' ?>
 <div class="container-fluid my-5">
     <div class="container">
        <?php flash('pef') ?>
         <div class="col-md-8 offset-md-2">
                <div class="card p-5">
                        <h3 class="text-center text-info">Edit your post</h3>
                    <form action="<?php echo URLROOT."post/edit"?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="cat_id">Category</label>
                            <select class="form-control" name="cat_id" id="cat_id">
                                <?php foreach ($data['cats'] as $cat) :?>
                                    <?php if($cat->id == $data['post']->cat_id ): ?>
                                        <option value="<?php echo $cat->id ?>" selected><?php echo $cat->name ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                                    <?php endif;?>
                                <?php endforeach; ?>    
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tilte">Title</label>
                            <input type="text" class="form-control <?php echo !empty($data['title_err']) ? 'is-invalid' : ''; ?> " id="title" name="title" value="<?php echo $data['post']->title?>" >
                            <span class="text-danger "><?php echo !empty($data['title_err']) ? $data['title_err'] : ''; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea class="form-control <?php echo !empty($data['title_err']) ? 'is-invalid' : ''; ?> "name="desc" id="desc" rows="3"><?php echo $data['post']->description?></textarea>
                            <span class="text-danger "><?php echo !empty($data['desc_err']) ? $data['desc_err'] : ''; ?></span>
                        </div>

 

                        <div class="form-group">
                            <label for="file">File upload</label>
                            <input type="file" class="form-control-file <?php echo !empty($data['title_err']) ? 'is-invalid' : ''; ?> " id="file" name="file">      
                            <span class="text-danger "><?php echo !empty($data['file_err']) ? $data['file_err'] : ''; ?></span>
                            <input type="hidden" name="old_file" value="<?php echo $data['post']->image?>">
                        </div>


                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control <?php echo !empty($data['title_err']) ? 'is-invalid' : ''; ?> " name="content" id="content" rows="3"><?php echo $data['post']->content?></textarea>
                            <span class="text-danger "><?php echo !empty($data['content_err']) ? $data['content_err'] : ''; ?></span>
                        </div>


                        <div class="row justify-content-end no-gutters">
                            <div>
                                <button class="btn btn-outline-secondary">Cancel</button>
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
         </div>
     </div>
 </div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>