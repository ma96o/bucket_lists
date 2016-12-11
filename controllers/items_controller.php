<?php

    require('models/item.php');
    specialEcho ("items_controllerが呼び出されました。");
    $controller = new ItemsController($resource, $action);

    switch ($action) {
      case 'trend':
        $controller->trend($option, $post);
        break;
      case 'doing':
        $controller->doing($option);
        break;
      case 'done':
        $controller->done($option);
        break;
      case 'success':
        $controller->success($option);
        break;
      case 'trash':
        $controller->trash($option);
        break;
      case 'create':
        if (!empty($post['list_id']) && !empty($post['comment']) && !empty($post['deadline'])) {
            $controller->create($post);
        } else {
            $controller->success($option);
        }
        break;
      case 'update':
        $controller->update($post);
        break;
      case 'like':
        $controller->like($option);
        break;
      case 'unlike':
        $controller->unlike($option);
        break;
      case 'updateSuccess':
        $controller->updateSuccess($post);
        break;
      case 'updateTrash':
        $controller->updateTrash($post);
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
      function doing($option){
        $this->viewsOptions = $this->item->doing($option);

        $this->display($option);
      }
      function done($option){
        $this->viewsOptions = $this->item->done($option);

        $this->display($option);
      }
      function add(){
        specialEcho('Controllerのadd()が呼び出されました。');
        $this->action = 'add';
        $this->display();
      }
      function create($post) {
          specialEcho('Controllerのcreate()が呼び出されました。');
          $this->item->create($post);
          header('Location: /bucket_lists/users/mypage/'.$_SESSION['id'].'/'.$post['list_id']);
      }
      function index(){
      }
      function success($option){
        $this->viewsOptions = $this->item->success($option);

        $this->displayProf($option);
      }
      function update($post) {
            $this->item->update($post);
            // あとでindexに飛ぶように戻す。location:editは消す。header('Location: index');
          header('Location: /bucket_lists/users/mypage/'.$_SESSION['id'].'/'.$post['list_id']);
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
      function like($option) {
          // is_login();

          specialEcho('Controllerのlike()が呼び出されました。');
          $this->item->like($option);

          $referer = get_last_referer();

          $referer_resource = $referer[4];
          $referer_action = $referer[5];
          $referer_option = $referer[6];
          if(isset($referer[7])){
          $referer_list_id = $referer[7];
          header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option.'/'.$referer_list_id);
          } else {
          header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
          }
      }

      function unlike($option) {
          // is_login();

          specialEcho('Controllerのunlike()が呼び出されました。');
          $this->item->unlike($option);

          $referer = get_last_referer();

          $referer_resource = $referer[4];
          $referer_action = $referer[5];
          $referer_option = $referer[6];
          if(isset($referer[7])){
          $referer_list_id = $referer[7];
          header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option.'/'.$referer_list_id);
          } else {
          header('Location: /bucket_lists/'.$referer_resource.'/'.$referer_action.'/'.$referer_option);
          }
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
      function updateSuccess($post){
        $this->item->updateSuccess($post);
        header('location: /bucket_lists/items/success/'.$_SESSION['id']);
      }
      function updateTrash($post){
        $this->item->updateTrash($post);
        header('location: /bucket_lists/items/trash/'.$_SESSION['id']);
      }
      function display($option){
        require('views/layouts/application.php');
      }
      function displayProf($option){
        require('views/layouts/application_prof.php');
      }
    }

?>
