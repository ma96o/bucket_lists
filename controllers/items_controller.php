<?php

    require('models/item.php');

    $controller = new ItemsController($resource, $action);

    switch ($action) {
      case 'trend':
        $controller->trend($option, $post);
        break;
      case 'show':
        $controller->show($option);
        break;
      case 'doing':
        $controller->doing($option);
        break;
      case 'done':
        $controller->done($option);
        break;
      case 'add':
        $controller->add($option);
        break;
      case 'index':
        $controller->index($option, $list_id);
        break;
      case 'edit':
        $controller->edit($option);
        break;
      case 'success':
        $controller->success($option);
        break;
      case 'conglaturation':
        $controller->conglaturation($option);
        break;
      case 'trash':
        $controller->trash($option);
        break;
      case 'giveup':
        $controller->giveup($option);
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
      function show($option){
        $this->viewsOptions = $this->item->show($option);

      }
      function doing($option){
        $this->viewsOptions = $this->item->doing($option);

        $this->display($option);
      }
      function done($option){
        $this->viewsOptions = $this->item->done($option);

        $this->display($option);
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
