<?php

    require('models/item.php');

    $controller = new ItemsController($resourse, $action);

    switch ($action) {
      case 'trend':
        $controller->trend();
        break;
      default:
        break;
    }

    class ItemsController{
      private $item;
      private $resourse;
      private $action;
      private $viewsOptions;

      function __construct($resourse, $action){
        $this->item = new Item();
        $this->resourse = $resourse;
        $this->action = $action;
        $this->viewsOptions = array();
      }

      function trend(){
        $this->item->trend();
      }
      function show(){
      }
      function doing(){
      }
      function done(){
      }
      function add(){
      }
      function create(){
      }
      function index(){
      }
      function edit(){
      }
      function update(){
      }
      function success(){
      }
      function conglaturation(){
      }
      function tassei(){
      }
      function undone(){
      }
      function trash(){
      }
      function giveup(){
      }
      function delete(){
      }
      function undelete(){
      }
      function like(){
      }
      function unlike(){
      }
      function search(){
      }
      function display(){
        require('views/layouts/application.php');
      }
      function displayProf(){
        require('views/layouts/application_prof.php');
      }
    }

?>
