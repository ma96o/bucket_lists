<?php

    require('models/item.php');
echo "items_controllerが呼び出されました。";
    $controller = new ItemsController($resource, $action);

    switch ($action) {
      case 'trend':
        $controller->trend();
        break;

      case 'success':
        $controller->success();
        break;

      case 'show':
        $controller->show($option);
        break;

      case 'like':
        $controller->like();
        break;

      case 'unlike':
        $controller->unlike();
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
      function show($option) {

            echo('Controllerのshow()が呼び出されました。');
            echo('$idは' . $option . 'です。');

            $this->viewOptions = $this->item->show($option); // 戻り値 $rtnを受け取る
            // special_var_dump($this->viewOptions);
            $this->action = 'show';
            $this->display();
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
        special_echo('items_contorllerのsuccessメソッドが呼び出されました');

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

          echo('Controllerのlike()が呼び出されました。');
          $this->blog->like($option);

          // 遷移元がindexかlikes_indexかで遷移先をわける
          // $referer_action = get_last_referer();

          // if ($referer_action == 'likes_index') {
          //     header('Location: ../likes_index');
          // } else {
          //     header('Location: ../index');
          // }
      }

      function unlike($option) {
          // is_login();

          echo('Controllerのunlike()が呼び出されました。');
          $this->blog->unlike($option);

          // 遷移元がindexかlikes_indexかで遷移先をわける
          // $referer_action = get_last_referer();

          // if ($referer_action == 'likes_index') {
          //     header('Location: ../likes_index');
          // } else {
          //     header('Location: ../index');
          // }
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
