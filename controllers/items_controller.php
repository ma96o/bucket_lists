<?php

    require('models/item.php');

    $controller = new ItemsController($resource, $action);

    switch ($action) {
      case 'trend':
        $controller->trend();
        break;
      case 'doing':
        $controller->doing($option);
        break;
      case 'done':
        $controller->done($option);
        break;
      case 'show':
        $controller->show($option);
        break;
      case 'edit':
        $controller->edit($option);
        break;
      case 'giveup':
        $controller->giveup($option);
        break;
      case 'conglaturation';
        $controller->conglaturation($option);
        break;
      case 'add':
        $controller->add($option);
        break;
      case 'success':
        $controller->success($option);

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

      function trend(){
        $this->item->trend();
      }
      function show($option){
        $this->display($option);
      }
      function doing($option){
        $this->display($option);
      }
      function done($option){
        $this->display($option);
      }
      function add(){
        $this->display($option);
      }
      function create(){
      }
      function index(){
      }
      function edit($option){
        $this->display($option);
      }
      function update(){
      }
      function success($option){
        $this->display($option);
      }
      function conglaturation($option){
        $this->display($option);
      }
      function tassei(){
      }
      function undone(){
      }
      function trash(){
      }
      function giveup($option){
        $this->display($option);
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
