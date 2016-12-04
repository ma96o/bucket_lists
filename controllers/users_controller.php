<?php

    require('models/user.php');

    $controller = new UsersController($resource, $action);

    switch ($action) {
      case 'check';
        $controller->check();
        break;
      case 'follow';
        $controller->follow($option);
        break;
      case 'unfollow';
        $controller->unfollow();
        break;
      case `following`;
        $controller->following();
        break;
      case `following`;
        $controller->follower();
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
      function mypage(){
      }
      function edit(){
      }
      function update(){
      }
      function follow($option){
        specialEcho('users_controllerのfollow()が呼び出されました');
        // $this->user->follow($option);
        // $this->displayProf();
        switch($this->action){
          case 'mypage';
          // $this->user->follow($option);
          // $this->displayProf();
          header('Location: mypage');
          break;
          case 'followers';
          // $this->user->follow($option);
          // $this->displayProf();
          header('Location: followers');
          break;
          case 'followings';
          // $this->user->follow($option);
          // $this->displayProf();
          header('Location: followings');
          break;
          case 'doing';
          // $this->user->follow($option);
          // $this->displayProf();
          header('Location: doing');
          break;
          case 'done';
          // $this->user->follow($option);
          // $this->displayProf();
          header('Location: done');
          break;
          default;
          break;
        }
      }
      function unfollow($option){
        specialEcho('users_controllerのunfollow()が呼び出されました');
        $this->user->unfollow($option);
        $this->displayProf();
        // switch($this->action){
        //   case 'mypage';
        //   header('Location: mypage');
        //   break;
        //   case 'followers';
        //   header('Location: followers');
        //   break;
        //   case 'followings';
        //   header('Location: followings');
        //   break;
        //   case 'doing';
        //   header('Location: doing');
        //   break;
        //   case 'done';
        //   header('Location: done');
        //   break;
        //   default;
        //   break;
        // }
         header('Location: mypage');
        
      }
      function followings(){
        $this->user->following();
      }
      function followers(){
        $this->user->followers();
      }
      function display(){
        require('views/layouts/application.php');
      }
      function displayProf(){
        require('views/layouts/application_prof.php');
      }
    }

?>
