<?php
    session_start();
    $_SESSION['id'] = 1;
    require('functions.php');

specialEcho('<br>');
    specialEcho('<br>');
    specialEcho('<br>');
    specialEcho('<br>');
    specialEcho('<br>');
    specialEcho('<br>');
    
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

    require('controllers/'.$resource.'_controller.php');

?>
