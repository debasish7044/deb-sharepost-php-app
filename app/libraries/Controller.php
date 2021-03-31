<?php

/*
 
*Base controller
*Loads the models and views
*/

class Controller {
  
  //  Load model
  public function model($model){
     require_once "../app/models/". $model . ".php";
     return new $model();
  }

  // Load view file
  public function view($view, $data=[]){
    //  check for the view file
    if(file_exists('../app/views/'. $view .'.php')){
      require_once '../app/views/'. $view .'.php';
    }else {
      //  view does not exist
      die('view does not exist');
    }
  }
}