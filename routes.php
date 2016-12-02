<?php
    require('functions.php');

    $para = explode('/', $_GET['url']);


    $resourse = $para[0];
    $action = $para[1];
    $id = 1;
    $post = array();
    if(isset($para[2])){
      $id = $para[2];
    }
    if(!empty($_POST)){
      $post = $_POST;
    }

    require('controllers/'.$resourse.'_controller.php');

?>
