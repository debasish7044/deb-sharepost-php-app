<?php

class Pages extends Controller {
   public function __construct()
   {
    
     
   }

   public function index(){
    
    if(isLoggedIn()){
      redirect('posts');
    }


     $data = [
       'title' => "SharePost",
       'description' => 'Simple social network  to connect each other App build on debasishMvc PHP framework'
     ];
      $this->view('pages/index', $data);
   }

   public function about(){
     $data = [
       'title' => "ABOUT US",
       'description' => 'Social app to share each other.'
     ];
     $this->view('pages/about',$data);
   }
}