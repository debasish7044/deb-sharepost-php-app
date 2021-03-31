<?php require_once APPROOT . '/views/inc/header.php'; ?>
  <div class="row mt-5 mb-5">
 <div class="col-md-6 mx-auto">

    <div class="card">
     <div class="card-header">
      <?php  flash('register_success'); ?>
      <h3>Login</h3>
      <p> Please fill out email and password field to Login with us </p>
      <form action="<?php echo URLROOT ?>/users/login" method="POST">
                 
       <div class="form-group">
        <label class="mt-2">Email: <sup>*</sup></label>
          <input type="email" 
           class="form-control mt-1 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>"  
           name="email"
           value="<?php echo $data['email']; ?>"
            >
         <small class="form-text text-muted " ><?php echo $data['email_err']; ?></small>
       </div>              
       <div class="form-group">
        <label class="mt-2">Password: <sup>*</sup></label>
          <input type="password" 
           class="form-control mt-1 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" 
           name="password"
           value="<?php echo $data['password']; ?>"
            >
         <small class="form-text text-muted"><?php echo $data['password_err']; ?></small>
       </div>              
       <div class="row">
         <div class="col">
            <input type="submit" value="Login" class="btn btn-success btn-block mt-3" style="width: 100%;">
        </div>
         <div class="col">
            <a href="<?php echo URLROOT ?>/users/register" class="btn btn-light mt-3 p-0" style="width: 100%;">No account? Register</a>
        </div>
       </div>            
     </form>
      </div>
     </div>
     </div>
  </div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>