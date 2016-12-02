<?php

    require('models/list.php');

    $controller = new ListsController($resourse, $action);

    switch ($action) {
      case 'create':
        $controller->create();
        break;
      default:
        break;
    }

    class ListsController{
      private $list;
      private $resourse;
      private $action;
      private $viewsOptions;

      function __construct($resourse, $action){
        $this->list = new Lists();
        $this->resourse = $resourse;
        $this->action = $action;
        $this->viewOptions = array();
      }

      function create(){
        $this->list->create();
      }
    }

?>
