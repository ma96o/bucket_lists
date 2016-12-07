<?php

    require('models/item.php');

    $controller = new ItemsController($resource, $action);

    switch ($action) {
      case 'trend':
        $controller->trend($option, $post);
        break;
      case 'index':
        $controller->index($option, $list_id);
        break;
      case 'success':
        $controller->success($option);
        break;
      case 'trash':
        $controller->trash($option);
        break;
      default:
        break;
    }

    class ItemsController{
      private $item;
      private $resource;
      private $action;
      private $viewsOptions;

      function __construct($resource, $action){
        $this->item = new Item();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewsOptions = array();
      }

      function trend($option, $post){
        $this->viewsOptions = $this->item->trend($option, $post);

        $this->display($option);
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
      function index($option, $list_id){
        $this->viewsOptions = $this->item->index($option, $list_id);

        $this->displayProf($option);
      }
      function edit(){
      }
      function update(){
      }
      function success($option){
        $this->viewsOptions = $this->item->success($option);

        $this->displayProf($option);
      }
      function conglaturation(){
      }
      function tassei(){
      }
      function undone(){
      }
      function trash($option){
        $this->viewsOptions = $this->item->trash($option);

        $this->displayProf($option);
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
      function display($option){
        require('views/layouts/application.php');
      }
      function displayProf($option){
        require('views/layouts/application_prof.php');
      }
    }

?>
