<?php

    require('models/item.php');
    specialEcho ("items_controllerが呼び出されました。");
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

      case 'add':
        $controller->add();
        break;

      case 'show':
        $controller->show($option);
        break;

      case 'create':
        if (!empty($post['item_name']) && !empty($post['deadline']) && !empty($post['comment'])) {
            $controller->create($post);
        } else {
            $controller->add();
        }
        break;

      case 'like':
        $controller->like($option);
        break;

      case 'unlike':
        $controller->unlike($option);
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

      function trend(){
        $this->item->trend();
      }
      function doing($option){
        $this->display($option);
      }
      function done($option){
        $this->display($option);
      }
      function add($option){
        specialEcho('Controllerのadd()が呼び出されました。');
        $this->action = 'add';
        $this->display();
      }
      function create($post){
            specialEcho('Controllerのcreate()が呼び出されました。');
            $this->item->create($post);
            // header('Location: index');
            header('Location: add');
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
      function like($option) {
          // is_login();

          specialEcho('Controllerのlike()が呼び出されました。');
          $this->item->like($option);
          $this->viewOptions;
          $referer = get_last_referer();

          $referer_resource = $referer[4];
          $referer_action = $referer[5];
          $referer_option = $referer[6];
          specialVarDump($referer);
          header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
      }

      function unlike($option) {
          // is_login();

          specialEcho('Controllerのunlike()が呼び出されました。');
          $this->item->unlike($option);

          $referer = get_last_referer();

          $referer_resource = $referer[4];
          $referer_action = $referer[5];
          $referer_option = $referer[6];
          specialVarDump($referer);
          header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
      }

      function show($option) {
        specialEcho('Controllerのshow()が呼び出されました。');
        specialEcho('$idは' . $option . 'です。');
        $this->viewOptions = $this->item->show($option);
        specialVarDump($this->viewOptions);
        $this->action = 'show';
        $this->display();
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
