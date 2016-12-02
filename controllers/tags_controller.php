<?php

    require('models/tag.php');

    $controller = new TagsController($resourse, $action);

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
      private $resourse;
      private $action;
      private $viewsOptions;

      function __construct($resourse, $action){
        $this->tag = new Tag();
        $this->resourse = $resourse;
        $this->action = $action;
        $this->viewsOptions = array();
      }

      function create(){
        $this->tag->create();
      }
      function delete(){
      }
    }

?>
