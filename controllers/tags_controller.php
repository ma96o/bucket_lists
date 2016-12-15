<?php

    require('models/tag.php');

    $controller = new TagsController($resource, $action);

    switch ($action) {
      case 'create':
        $controller->create();
        break;
      case 'delete':
        $controller->delete();
        break;
      default:
        break;
    }

    class TagsController{
      private $tag;
      private $resource;
      private $action;
      private $viewsOptions;

      function __construct($resource, $action){
        $this->tag = new Tag();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewsOptions = array();
      }

      function create(){
        isLogin();
        $this->tag->create();
      }
      function delete(){
        isLogin();
      }
    }

?>
