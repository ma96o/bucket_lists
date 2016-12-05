<?php

    require('models/item.php');

    $controller = new ItemsController($resource, $action);

    switch ($action) {
      case 'trend':
        $controller->trend();
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
      function like($option){
        switch ($this->action) {
          // トレンドから来た項目詳細
          case 'show_trend':
            header('Location: show_trend');
            break;

          // 個人ページから来た項目一覧
          case 'index':
            header('Location: index');
            break;

          // 個人ページから来た項目詳細
          case 'show':
            header('Location: show');
            break;

          // 達成項目一覧
          case 'success':
            header('Location: success');
            break;

          // 達成リストから来た項目詳細
          case 'show_success':
            header('Location: show_success');
            break;

          // ゴミ箱項目一覧
          case 'trash':
            header('Location: trash');
            break;

          // ゴミ箱リストから来た項目詳細
          case 'show_trash':
              header('Location: show_trash');
              break;

          default:
            break;
        }
      }

      function unlike($option){
        $this->item->unlike($like);
        $this->displayProf();
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
