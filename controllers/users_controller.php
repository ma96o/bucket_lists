<?php

    require('models/user.php');

    $controller = new UsersController($resourse, $action);

    switch ($action) {
      case 'check':
        $controller->check();
        break;
      default:
        break;
    }


    class UsersController{
      private $user;
      private $resourse;
      private $action;
      private $viewOptions;

      function __construct($resourse, $action){
        $this->user = new User();
        $this->resourse = $resourse;
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
