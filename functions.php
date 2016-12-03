<?php

    define('DEBUG', true);

    function specialEcho($val){
      if(DEBUG){
        echo $val;
        echo '<br>';
      }
    }

    function specialVarDump($val){
      if(DEBUG){
        echo '<pre>';
        var_dump($val);
        echo '</pre>';
      }
    }

    function toLink($resource, $action){
      echo '/bucket_lists/'.$resource.'/'.$action;
    }

    function isLogin(){
      require('dbconnect.php');
      if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()){
        $_SESSION['time'] = time();

        $sql = sprintf('SELECT * FROM `users` WHERE `user_id`=%d',
                        mysqli_real_escape_string($db, $_SESSION['id'])
                      );
        $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
        $user = mysqli_fetch_assoc($rec);
        return $user;
      } else {
        header('location: /bucket_lists/users/login');
        exit();
      }
    }

    function currentUser(){
      require('dbconnect.php');

      if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()){
        $_SESSION['time'] = time();

        $sql = sprintf('SELECT * FROM `users` WHERE `user_id`=%d',
                        mysqli_real_escape_string($db, $_SESSION['id'])
                      );
        $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
        $user = mysqli_fetch_assoc($rec);
        return $user;
      } else {
        return null;
      }
    }

?>
