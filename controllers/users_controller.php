<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
      case 'check':
        $controller->check();
        break;
      case 'followings':
        $controller->followings($option);
        break;
      case 'followers':
        $controller->followers($option);
        break;
      case 'mypage':
        $controller->mypage($option);
        break;
      case 'edit':
        $controller->edit($option);

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
      function mypage($option){
        $this->displayProf($option);
      }
      function edit(){
        $this->display($option);
      }
      function update(){
      }
      function follow(){
      }
      function unfollow(){
      }
      function followings($option){
        $this->displayProf($option);
      }
      function followers($option){
        $this->displayProf($option);
      }
      function display($option){
        require('views/layouts/application.php');
      }
      function displayProf($option){
        require('views/layouts/application_prof.php');
      }
    }

?>
