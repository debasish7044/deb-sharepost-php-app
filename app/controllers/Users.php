
<?php

class Users extends Controller {
   public function __construct()
   {
     $this->userModel = $this->model('User');
   }

  //index for default method;
    public function index(){
  
     $data = [
       'title' => "SharePost",
       'description' => 'Simple social network  to connect each other App build on debasishMvc PHP framework'
     ];
      $this->view('pages/index', $data);
   }

   public function register(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // process form

        // sanitize the post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // init data
        $data = [
          'name' => trim($_POST['name']),
          'email'=> trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err'=> '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter your name';
        }
        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter your email';
        }else {
           if($this->userModel->findUserByEmail($data['email'])){
             $data['email_err'] = 'Email already exist';
           }
        }
        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter your password';
        }elseif (strlen($data['password']) < 5) {
           $data['password_err'] = 'password must be at least 6 characters';
        }
        // Validate Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please enter confirm password';
        }else {
          if(($data['password'] !== $data['confirm_password'])){      
           $data['confirm_password_err'] = 'Password must be matched'; 
          }
        }

        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['email_err'])  && empty($data['password_err']) && empty($data['confirm_password_err'])){
          // validated
         // hash password
         $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

         if($this->userModel->register($data)){
            flash('register_success', 'You are registered and can log in'); 
            redirect('/users/login');
          
         }else {
            die('Something went wrong');
         }
        }else{
           $this->view('/users/register', $data);
        }

      }else {

        // init data
        $data = [
          'name' => '',
          'email'=> '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err'=> '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load view
        $this->view('/users/register', $data);
      }
   }

/*============================================================================================== */


   public function login(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // init data
        $data = [
          'email'=> trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err'=> '',
          'password_err' => '',
        ];

      
        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter your email';
        }

          // Validate Password
        if(empty($data['password'])) {
          $data['password_err'] = 'Please enter your password';
        }
        if($this->userModel->findUserByEmail($data['email'])){
          // user found
         
        }else{
          $data['email_err'] = 'User is not found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // validated
        //  check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'],$data['password']);
        if($loggedInUser){
          //  create session
          $this->userModel->createUserSession($loggedInUser);
        }else{
          $data['password_err'] = 'Password is incorrect';
          $this->view('/users/login', $data);
        }
        }else{
           $this->view('/users/login', $data);
        }

      }else {
        // init data
        $data = [
          'email'=> '',
          'password' => '',
          'email_err'=> '',
          'password_err' => '',
        ];

        // Load view
        $this->view('/users/login', $data);
      }
   }



   public function logout(){
     unset($_SESSION['user_id']);
     unset($_SESSION['user_email']);
     unset($_SESSION['user_name']);
     session_destroy();
     redirect('/users/login');
   }

  
}



