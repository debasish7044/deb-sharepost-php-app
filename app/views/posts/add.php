<?php require_once APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT ?>/posts" class=" btn btn-light mb-3 "><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
Back</a>
    <div class="card">
     <div class="card-header">  
      <h3>Add Post</h3>
      <p>Create a post with this form</p>
      <form action="<?php echo URLROOT ?>/posts/add" method="POST">
                 
       <div class="form-group">
        <label class="mt-2">Title: <sup>*</sup></label>
          <input type="text" 
           class="form-control mt-1 <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '' ?>"  
           name="title"
           value="<?php echo $data['title']; ?>"
            >
         <small class="form-text text-muted " ><?php echo $data['title_err']; ?></small>
       </div>              
       <div class="form-group mb-2">
        <label class="mt-2">Body: <sup>*</sup></label>
          <textarea 
           class="form-control mt-1 <?php echo (!empty($data['body_err'])) ? 'is-invalid' : '' ?>" 
           name="body"          
            ><?php echo $data['body']; ?> </textarea>
         <small class="form-text text-muted"><?php echo $data['body_err']; ?></small>
       </div>              
       <input type="submit" value="Submit" class="btn btn-success btn-block mb-3 mt-2" >
     </form>
      </div>
     </div>


<?php require_once APPROOT . '/views/inc/footer.php'; ?>