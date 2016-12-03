<?php

    class User{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function check(){
      }
      function create(){
      }
      function thanks(){
      }
      function login($post){
        $sql = sprintf('SELECT * FROM `users` WHERE `email`="%s" AND `password`="%s"',
                        mysqli_real_escape_string($this->dbconnect, $post['email']),
                        mysqli_real_escape_string($this->dbconnect, sha1($post['password']))
                        );
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $login_flag = false;
        if ($table = mysqli_fetch_assoc($rec)){
          $_SESSION['id'] = $table['id'];
          $_SESSION['time'] = time();
          $login_flag = true;
        } else {
          $login_flag = false;
        }
        return $login_flag;
      }
      function mypage(){
      }
      function edit(){
      }
      function update(){
      }
      function follow(){
      }
      function unfollow(){
      }
      function followings(){
      }
      function followers(){
      }
    }

?>
