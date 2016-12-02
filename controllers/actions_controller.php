<?php

    require('models/action.php');

    $controller = new ActionsController($resourse, $action);

    switch ($action) {
      case 'index':
        $controller->index();
        break;
      default:
        break;
    }

    class ActionsController{
      private $timeline;
      private $resourse;
      private $action;
      private $viewsOptions;

      function __construct($resourse, $action){
        $this->timeline = new Action();
        $this->resourse = $resourse;
        $this->action;
        $this->viewsOptions = array();
      }
      function index(){
        $this->timeline->index();
      }
      function display(){
        require('views/layouts/application.php');
      }
    }

?>
