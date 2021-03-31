<?php require_once APPROOT . '/views/inc/header.php'; ?>
<div class="row mb-3">
  <div class="col-md-6">
  <?php  flash('post_message'); ?>
  <h2>Posts</h2>
  </div>
  <div class="col-md-6 d-flex justify-content-end ">
   <div>
    <a href="<?php echo URLROOT ?>/posts/add" class="btn btn-primary justify-content-between">
     <i class="fa fa-plus-circle" aria-hidden="true"></i>
     Add Post
    </a>
   </div>
  </div>
</div>

<?php foreach($data['posts'] as $post): ?>
    <div class="card card-body mb-3">
    <div class="card-title"><?php echo $post->title ?></div>
    <div class="bg-light p-2 mb-3">
    Written By <?php  echo $post->name; ?> create at <?php  echo $post->postCreated; ?> 
    </div>
    <p class="card-text"><?php  echo $post->body; ?></p>
    <a href="<?php echo URLROOT ?>/posts/show/<?php echo $post->postId?>" style="width: 20%;" class="btn btn-dark">More</a>
    </div>
<?php  endforeach;  ?>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>
