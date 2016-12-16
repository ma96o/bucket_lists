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
        $controller->create($post);
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
      case 'tassei':
        $controller->tassei($post);
        break;
      case 'delete':
        $controller->delete($post);
        break;
        case 'add':
        $controller->add();
        break;
      default:
        echo own_header('users/home');
        break;
    }

    class ItemsController{
      private $item;
      private $resource;
      private $action;
      private $viewOptions;

      function __construct($resource, $action){
        $this->item = new Item();
        $this->resource = $resource;
        $this->action = $action;
        $this->viewOptions = array();
      }

      function trend($option, $post){
        isLogin();
        $this->viewOptions = $this->item->trend($option, $post);

        $this->display($option);
      }
      function doing($option){
        isLogin();
        $this->viewOptions = $this->item->doing($option);

        $this->display($option);
      }
      function done($option){
        isLogin();
        $this->viewOptions = $this->item->done($option);

        $this->display($option);
      }
      function add(){
        isLogin();
        specialEcho('Controllerのadd()が呼び出されました。');
        $this->action = 'add';
        $this->display();
      }
      function create($post) {
        isLogin();
          if (empty($post['list_id']) || empty($post['comment']) || empty($post['deadline'])) {
              echo own_header('users/mypage/'.$_SESSION['user_id']);
              exit();
          }
          specialEcho('Controllerのcreate()が呼び出されました。');
          $this->item->create($post);
          echo own_header('users/mypage/'.$_SESSION['user_id'].'/'.$post['list_id']);
      }
      function index(){
        isLogin();
      }
      function success($option){
        isLogin();
        $this->viewOptions = $this->item->success($option);

        $this->displayProf($option);
      }
      function update($post) {
        isLogin();
            $this->item->update($post);
            // あとでindexに飛ぶように戻す。location:editは消す。echo own_header('     echo own_header('users/mypage/'.$_SESSION['user_id'].'/'.$post['list_id']);
      }
      function conglaturation(){
        isLogin();
      }
      function tassei($post){
        isLogin();
        $this->item->tassei($post);
        echo own_header('items/success/'.$_SESSION['user_id']);
      }
      function undone(){
        isLogin();
      }
      function trash($option){
        isLogin();
        $this->viewOptions = $this->item->trash($option);

        $this->displayProf($option);
      }
      function giveup(){
        isLogin();
      }
      function delete($post){
        isLogin();
        $this->item->delete($post);
        echo own_header('items/trash/'.$_SESSION['user_id']);
      }
      function undelete(){
        isLogin();
      }
      function like($option) {
          isLogin();

          specialEcho('Controllerのlike()が呼び出されました。');
          $this->item->like($option);

          $referer = get_last_referer();

          $referer_resource = $referer[4];
          $referer_action = $referer[5];
          $referer_option = $referer[6];
          if(isset($referer[7])){
          $referer_list_id = $referer[7];
          echo own_header($referer_resource.'/'.$referer_action.'/'.$referer_option.'/'.$referer_list_id);
          } else {
          echo own_header($referer_resource.'/'.$referer_action.'/'.$referer_option);
          }
      }

      function unlike($option) {
          isLogin();

          specialEcho('Controllerのunlike()が呼び出されました。');
          $this->item->unlike($option);

          $referer = get_last_referer();

          $referer_resource = $referer[4];
          $referer_action = $referer[5];
          $referer_option = $referer[6];
          if(isset($referer[7])){
          $referer_list_id = $referer[7];
          echo own_header($referer_resource.'/'.$referer_action.'/'.$referer_option.'/'.$referer_list_id);
          } else {
          echo own_header($referer_resource.'/'.$referer_action.'/'.$referer_option);
          }
      }

      function show() {
          isLogin();
      }

      function search(){
          isLogin();
      }
      function updateSuccess($post){
        isLogin();
        $this->item->updateSuccess($post);
        echo own_header('items/success/'.$_SESSION['user_id']);
      }
      function updateTrash($post){
        isLogin();
        $this->item->updateTrash($post);
        echo own_header('items/trash/'.$_SESSION['user_id']);
      }
      function display($option){
        isLogin();
        require('views/layouts/application.php');
      }
      function displayProf($option){
        isLogin();
        require('views/layouts/application_prof.php');
      }
    }

?>
