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
      function login(){
      }
      function logout(){
      }
      function mypage(){
      }
      function edit(){
      }
      function update(){
      }
      function follow($option){
        $sql = sprintf('INSERT INTO `followings`
                        SET `follower_id` = %d, `following_id` = %d',
                        mysqli_real_escape_string($_SESSION['id']),
                        mysqli_real_escape_string($option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

      }
      function unfollow($option){
        $sql = sprintf('DELETE FROM `followings`
                        WHERE `follower_id` = %d
                        AND `following_id` = %d',
                        mysqli_real_escape_string($_SESSION['id']),
                        mysqli_real_escape_string($option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

      }
      function followings(){
        // フォローしている人の一覧
        
      }
      function followers(){
        // フォローされている人の一覧
        
      }
    }

?>
