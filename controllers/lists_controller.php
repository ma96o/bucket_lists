<?php

    require('models/list.php');

    $controller = new ListsController($resource, $action);

    switch ($action) {
      case 'create':
        $controller->create();
        break;
      default:
        break;
    }

    class ListsController{
      private $list;
      private $resource;
      private $action;
      private $viewsOptions;

      function __construct($resource, $action){
        $this->list = new Lists();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
      }

      function create(){
        $this->list->create();
      }
    }

?>
