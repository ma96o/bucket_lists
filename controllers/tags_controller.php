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
        echo own_header('users/home');
        break;
    }

    class TagsController{
      private $tag;
      private $resource;
      private $action;
      private $viewOptions;

      function __construct($resource, $action){
        $this->tag = new Tag();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
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
