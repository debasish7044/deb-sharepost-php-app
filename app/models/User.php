<?php

class User {
   
  private $db;



  public function __construct()
  {
    $this->db = new Database;
  }


  // register user
  public function register ($data) { 
    $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

    // execute now 
    if($this->db->execute()) {
      return true;
    }else{
      return false;
    }
  }

  // Login user by email and password
  public function login ($email,$password) { 
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);
    
     $row = $this->db->single();

     $hash_password = $row->password;

    // verify password
    if(password_verify($password,$hash_password)){
      return $row;
    }else{
       return false;
    }
  }

   public function createUserSession($user){
     $_SESSION['user_id'] = $user->id;
     $_SESSION['user_email'] = $user->email;
     $_SESSION['user_name'] = $user->name;

     redirect('posts');
   }

  // Find user by email
  public function findUserByEmail ($email) { 
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);
    
     $row = $this->db->single();

    //  Check now 
    if($this->db->rowCount() > 0) {
      return true;
    }else{
      return false;
    }
  }
  // Find user by email
  public function getUserById ($id) { 
    $this->db->query('SELECT * FROM users WHERE id = :id');
    $this->db->bind(':id', $id);
    
     $row = $this->db->single();

     return $row;
  }
  
}