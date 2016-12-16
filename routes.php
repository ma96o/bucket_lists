<?php
    session_start();
    require('functions.php');

    $para = explode('/', $_GET['url']);

    if($para[0] == 'actions' || $para[0] == 'items' || $para[0] == 'lists' || $para[0] == 'tags' || $para[0] == 'users'){
        $resource = $para[0];
        $action = $para[1];
        $option = 1;
        $post = array();
        $list_id = 0;
        if(isset($para[2])){
          $option = $para[2];
        }
        if(!empty($_POST)){
          $post = $_POST;
        }
        //pf画像users/update
        if(!empty($_FILES['picture_path']['name'])){
          $post['picture_path'] = $_FILES['picture_path']['name'];
          $post['tmp_picture_path'] = $_FILES['picture_path']['tmp_name'];
          $post['dirname'] = __DIR__;
        }
        if(isset($para[3])){
          $list_id = $para[3];
        }


        require('controllers/'.$resource.'_controller.php');
    } else {
      echo own_header('users/home');
    }


?>

