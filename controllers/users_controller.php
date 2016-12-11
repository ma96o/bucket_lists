<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
      case 'check':
        $controller->check();
        break;
      case 'mypage':
        $controller->mypage($option, $list_id);
        break;
      case 'followings':
        $controller->followings($option);
        break;
      case 'followers':
        $controller->followers($option);
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
      function login(){
      }
      function logout(){
      }
      function mypage($option, $list_id){
        if($list_id == 0){
          $list_id = getFirstListId($option);
          header('location: /bucket_lists/users/mypage/'.$option.'/'.$list_id);
        }

        $this->viewsOptions = $this->user->mypage($option, $list_id);

        $this->displayProf($option, $list_id);
      }
      function edit(){
      }
      function update(){
      }
      function follow(){
      }
      function unfollow(){
      }
      function followings($option, $list_id){
        $this->displayProf($option, $list_id);
      }
      function followers($option, $list_id){
        $this->displayProf($option, $list_id);
      }
      function display($option){
        require('views/layouts/application.php');
      }
      function displayProf($option, $list_id){
        require('views/layouts/application_prof.php');
      }
    }

?>
