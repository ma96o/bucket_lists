<?php
    session_start();
    require('functions.php');

    $para = explode('/', $_GET['url']);


    $resource = $para[0];
    $action = $para[1];
    $option = 1;
    $post = array();
    if(isset($para[2])){
      $option = $para[2];
    }
    if(!empty($_POST)){
      $post = $_POST;
    }

    // 仮ユーザーとしてログインしている
    $_SESSION['id'] = 1;

    require('controllers/'.$resource.'_controller.php');

?>
