<?php

    require('models/action.php');
    require('models/user.php');

    $controller = new ActionsController($resource, $action);

    switch ($action) {
      case 'index':
        $controller->index($option);
        break;
      default:
        echo own_header('users/home');
        break;
    }

    class ActionsController{
      private $timeline;
      private $resource;
      private $action;
      private $viewOptions;

      function __construct($resource, $action){
        $this->timeline = new Action();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
      }
      function index(){
        isLogin();
        $this->viewOptions = $this->timeline->index();

        $this->display();
      }
      function display(){
        require('views/layouts/application.php');
      }
    }

?>
