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
      function get_last_referer(){
      }
      function follow($option){
        specialEcho('users_controllerのfollow()が呼び出されました');
        $this->user->follow($option);
        // $this->displayProf();
        $referer_action = get_last_referer();
         header("Location: ". $referer_action);
      }
      function unfollow($option){
        specialEcho('users_controllerのunfollow()が呼び出されました');
        $this->user->unfollow($option);
        // $this->displayProf();
        $referer_action = get_last_referer();
        echo $referer_action;
        header("Location: ". $referer_action);
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
