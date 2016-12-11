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
      function mypage($option, $list_id){
        $sql = sprintf('SELECT * FROM `items` WHERE `user_id`=%d AND `list_id`=%d',
            mysqli_real_escape_string($this->dbconnect, $option),
            mysqli_real_escape_string($this->dbconnect, $list_id)
            );
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $items = array();
        while($table = mysqli_fetch_assoc($rec)){
            $items[] = $table;
        }

        return $items;
      }
      function edit(){
      }
      function update($post){
        $sql = sprintf('UPDATE `users` SET `nick_name`="%s", `description`="%s" WHERE `user_id`=%d',
          mysqli_real_escape_string($this->dbconnect, $post['nick_name']),
          // mysqli_real_escape_string($this->dbconnect, $post['picture_path']),
          mysqli_real_escape_string($this->dbconnect, $post['description']),
          mysqli_real_escape_string($this->dbconnect, $_SESSION['id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
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
