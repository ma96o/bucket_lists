<?php

    class User{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function pre_check() {
        try{
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $statement = $dbh->prepare("INSERT INTO pre_members (url_token,email,date) VALUES (:url_token,:email,now() )");

          $statement->bindValue(':url_token', $url_token, PDO::PARAM_STR);
          $statement->bindValue(':email', $email, PDO::PARAM_STR);
          $statement->execute();

          $dbh = null;

          } catch (PDOException $e){
          echos('Error:'.$e->getMessage());
          die();
          }
      }

      function check(){
      }

      function create(){
        $sql = sprintf('INSERT INTO `members` SET
                `nick_name`="%s",
                `email`="%s",
                `password`="%s",
                `created`=NOW()',
                mysqli_real_escape_string($db,$_SESSION['nick_name']),
                mysqli_real_escape_string($db,$_SESSION['email']),
                mysqli_real_escape_string($db,sha1($_SESSION['password']))
                );
            mysqli_query($db,$sql) or die(mysqli_error($db));

        $_SESSION = array();

        if (isset($_COOKIE["PHPSESSID"])) {
              setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        session_destroy();
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
