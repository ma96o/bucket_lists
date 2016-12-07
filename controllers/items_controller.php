<?php

    require('models/item.php');
    specialEcho ("items_controllerが呼び出されました。");
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
      function show($option) {
            specialEcho('hoge');
            specialEcho('Controllerのshow()が呼び出されました。');
            specialEcho('$idは' . $option . 'です。');
            $this->viewOptions = $this->item->show($option);
            specialVarDump($this->viewOptions);
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
        specialEcho('items_contorllerのsuccessメソッドが呼び出されました');

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
