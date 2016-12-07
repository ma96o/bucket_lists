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
        $this->timeline->index();
        $this->display($option);
      }
      function display($option){
        require('views/layouts/application.php');
      }
    }

?>
