<?php 

class Posts extends Controller {

  public function __construct()
  {
    if(!isLoggedIn()){
      redirect('users/login');
     }

       $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
  }

  public function index(){

    $posts = $this->postModel->getPosts();
    
    $data = [
      'posts' => $posts
    ];
    $this->view('posts/index',$data);
  }
  public function add(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // sanitize the post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // init data
        $data = [
          'title' => trim($_POST['title']),
          'body'=> trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'body_err' => ''
        ];

        // Validate Name
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter post title';
        }
        // Validate Email
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter post body';
        }

        // Make sure errors are empty
        if(empty($data['title_err']) && empty($data['body_err'])){
          
          if($this->postModel->addPost($data)){
            flash('post_message', 'You post has been added');
            redirect('posts');
          }else{
            die('Something went wrong');
          }
          
         }else {
             $this->view('posts/add',$data);
         }
        }else{
              // init data
        $data = [
          'title' => '',
          'body'=> '',
          'title_err' => '',
          'body_err' => ''
        ];
            $this->view('posts/add',$data);
        }
    
   
  }
  public function edit($id){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // sanitize the post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // init data
        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body'=> trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'body_err' => ''
        ];

        // Validate Name
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter post title';
        }
        // Validate Email
        if(empty($data['body'])){
          $data['body_err'] = 'Please enter post body';
        }

        // Make sure errors are empty
        if(empty($data['title_err']) && empty($data['body_err'])){
          
          if($this->postModel->updatePost($data)){
            flash('post_message', 'Your post has been updated');
            redirect('posts');
          }else{
            die('Something went wrong');
          }
          
         }else {
             $this->view('posts/edit',$data);
         }
        }else{
         
        $post = $this->postModel->getPostById($id);
        if($post->user_id !== $_SESSION['user_id']){
          redirect('post');
        }
        

        $data = [
          'id' => $id,
          'title' => $post->title,
          'body'=> $post->body,
          'title_err' => '',
          'body_err' => ''
        ];
            $this->view('posts/edit',$data);
        }
    
   
  }

  public function show($id){
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);
 
    $data = [
      'post' => $post,
      'user' => $user
    ];
    $this->view('posts/show',$data);
  }
  public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       if($this->postModel->deletePost($id)){
          flash('post_message','Post Removed');
          redirect('posts');
       }else{
         die('Something went wrong');
       }
    }
  }
}