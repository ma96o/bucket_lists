<?php

    require('models/action.php');
    require('models/user.php');

    $controller = new ActionsController($resource, $action);

    switch ($action) {
      case 'index':
        $controller->index($option);
        break;
      default:
        break;
    }

    class ActionsController{
      private $timeline;
      private $resource;
      private $action;
      private $viewsOptions;

      function __construct($resource, $action){
        $this->timeline = new Action();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewsOptions = array();
      }
      function index(){
        isLogin();
        $this->viewsOptions = $this->timeline->index();

        $this->display();
      }
      function display(){
        require('views/layouts/application.php');
      }
    }

?>
