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
                        mysqli_real_escape_string($this->dbconnect,$_SESSION['id']),
                        mysqli_real_escape_string($this->dbconnect,$option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

      }
      function unfollow($option){
        $sql = sprintf('DELETE FROM `followings`
                        WHERE `follower_id` = %d
                        AND `following_id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$_SESSION['id']),
                        mysqli_real_escape_string($this->dbconnect,$option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));


      }
      function followings(){
        specialEcho('usersのfollowings()が呼び出されました');
        // フォローしている人の一覧
        $sql = sprintf('SELECT u.*, f.`following_id` 
                        FROM `users`
                        AS u
                        LEFT JOIN `followings`
                        AS f
                        ON u.`user_id` = f.`following_id`
                        WHERE u.`user_id` = f.`following_id`
                        AND f.`follower_id` = %d',
               mysqli_real_escape_string($this->dbconnect,$_SESSION['id']));
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $rtn = array();
        while($result = mysqli_fetch_assoc($results)){
                $rtn[] = $result;
        }
        return $rtn;

      }
      function followers(){
        specialEcho('usersのfollowers()が呼び出されました');
        // フォローされている人の一覧
        $sql = sprintf('SELECT u.*,f.`follower_id`, f.`following_id`
                        FROM `users`
                        AS u
                        LEFT JOIN `followings`
                        AS f
                        ON u.`user_id` = f.`follower_id`
                        WHERE u.`user_id` = f.`follower_id`
                        AND f.`following_id` = %d',
               mysqli_real_escape_string($this->dbconnect,$_SESSION['id']));
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $rtn = array();
        while($result = mysqli_fetch_assoc($results)){
                $rtn[] = $result;
        }
        // echo '<pre>';
        // var_dump($rtn);
        // echo '</pre>';
        return $rtn;


      }
   }

?>
