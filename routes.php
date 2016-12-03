<?php
    session_start();
    require('functions.php');

    $para = explode('/', $_GET['url']);


    $resource = $para[0];
    $action = $para[1];
    $id = 1;
    $post = array();
    if(isset($para[2])){
      $id = $para[2];
    }
    if(!empty($_POST)){
      $post = $_POST;
    }

    require('controllers/'.$resource.'_controller.php');

?>
