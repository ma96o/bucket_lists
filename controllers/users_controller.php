<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
      case 'check':
        $controller->check();
        break;
      case 'login':
        if(!empty($post['email']) && !empty($post['password'])){
          $controller->login($post);
        } else {
          header('location: /bucket_lists/');
          exit();
        }
        break;
      case 'logout':
        $controller->logout();
        break;
      default:
        break;
    }


    class UsersController{
      private $user;
      private $resource;
      private $action;
      private $viewOptions;

      function __construct($resource, $action){
        $this->user = new User();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
      }

      function check(){
        $this->user->check();
      }
      function create(){
      }
      function thanks(){
      }
      function login($post){
        $login_flag = $this->user->login($post);
        if($login_flag){
          header('location: /bicket_lists/items/trend');
          exit();
        } else {
          header('location: /bucket_lists/');
          exit();
        }
      }
      function logout(){
        $_SESSION = array();

        if(ini_get("session.use_cookies")){
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header('location: /bucket_lists/');
        exit();
      }
      function mypage(){
      }
      function edit(){
      }
      function update(){
      }
      function follow(){
      }
      function unfollow(){
      }
      function followings(){
      }
      function followers(){
      }
      function display(){
        require('views/layouts/application.php');
      }
      function displayProf(){
        require('views/layouts/application_prof.php');
      }

    }

?>
