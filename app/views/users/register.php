<?php require_once APPROOT . '/views/inc/header.php'; ?>
  <div class="row mt-5 mb-5">
 <div class="col-md-6 mx-auto">
    <div class="card">
     <div class="card-header">
      <h3>Create An Account</h3>
      <p>Please fill out the form to register with us</p>
     
      <form action="<?php echo URLROOT; ?>/users/register" method="POST">
       <div class="form-group">
        <label>Name: <sup>*</sup></label>
          <input type="text" 
           class="form-control  mt-1 <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '' ?>" 
           name="name"
           value="<?php echo $data['name'] ?>"
            >
         <small class="form-text text-muted"><?php echo $data['name_err'] ?></small>
       </div>              
       <div class="form-group">
        <label class="mt-2">Email: <sup>*</sup></label>
          <input type="email" 
           class="form-control  mt-1 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ?>" 
           name="email"
           value="<?php echo $data['email'] ?>"
            >
         <small class="form-text text-muted"><?php echo $data['email_err'] ?></small>
       </div>              
       <div class="form-group">
        <label class="mt-2">Password: <sup>*</sup></label>
          <input type="password" 
           class="form-control  mt-1 <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ?>" 
           name="password"
           value="<?php echo $data['password'] ?>"
            >
         <small class="form-text text-muted"><?php echo $data['password_err'] ?></small>
       </div>              
       <div class="form-group">
        <label class="mt-2">Confirm Password: <sup>*</sup></label>
          <input type="password" 
           class="form-control  mt-1 <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '' ?>" 
           name="confirm_password"
           value="<?php echo $data['confirm_password'] ?>"
            >
         <small class="form-text text-muted"><?php echo $data['confirm_password_err'] ?></small>
       </div>  
       <div class="row">
         <div class="col">
            <input type="submit" value="Register" class="btn btn-success btn-block mt-3" style="width: 100%;">
        </div>
         <div class="col">
            <a href="<?php echo URLROOT ?>/users/login" class="btn btn-light mt-3 p-0" style="width: 100%;">Have an account? Login</a>
        </div>
       </div>            
     </form>
      </div>
     </div>
     </div>
  </div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>