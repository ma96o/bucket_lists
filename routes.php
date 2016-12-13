<?php
    session_start();
    $_SESSION['id'] = 5;
    require('functions.php');

    $para = explode('/', $_GET['url']);


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
    if(isset($para[3])){
      $list_id = $para[3];
    }


    require('controllers/'.$resource.'_controller.php');

?>
