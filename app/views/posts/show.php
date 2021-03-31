<?php require_once APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT ?>/posts" class=" btn btn-light mb-3 "><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
Back</a>
   
 <h2 class="mb-3"><?php echo $data['post']->title ?></h2>
 <div class="bg-secondary p-2 text-white ">
  Written By <?php echo $data['user']->name ?> on <?php echo $data['post']->created_at ?>
 </div>
 <p class="mt-3"><?php echo $data['post']->body ?></p>
<?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr> 
    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>
    <form class="d-inline" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="POST">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    <?php endif; ?>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>