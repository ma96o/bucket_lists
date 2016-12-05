<?php

    class User{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function pre_check_valid() {
        $error = array();
            if ($post['email'] == '') {
                $error['email'] = 'blank';
            }
            if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
                $error['mail_check'] = 'false';
          }
            return $error;
        }

      function pre_create() {
        $sql = sprintf('INSERT INTO `pre_members` SET
                `url_token`="%s",
                `email`="%s",
                `date`=NOW()',
                mysqli_real_escape_string($db,$_SESSION['url_token']),
                mysqli_real_escape_string($db,$_SESSION['email'])
                );
          mysqli_query($db,$sql) or die(mysqli_error($db)
            );
      }

      function signup_valid($post) {
        $errors = array();

        if(empty($_GET)) {
            header("Location: reg_email_form.php");
            exit();
         } else{
            //GETデータを変数に入れる
            $url_token = isset($_GET['url_token']) ? $_GET['url_token'] : NULL;
            //メール入力判定
        if ($url_token == ''){
          $errors['url_token'] = "もう一度登録をやりなおして下さい。";
        } else {
          $sql = sprintf('SELECT `email` from `pre_members` WHERE
                 `url_token` = "%s" AND date > now() - interval 24 hour');
                 `email`="%s",
                `date`=NOW()',
                mysqli_real_escape_string($db,$_SESSION['url_token']),
                mysqli_real_escape_string($db,$_SESSION['email'])
                );
          mysqli_query($db,$sql) or die(mysqli_error($db)
            );
          }
        }
      }

      function check($post) {
            $error = array();

            if ($post['nick_name'] == '') {
                $error['nick_name'] = 'blank';
            }
            if ($post['password'] == '') {
                $error['password'] = 'blank';
            } elseif (strlen($post['password']) < 4) {
                $error['password'] = 'length';
            } else {
                $password_hide = str_repeat('*', strlen($password));
            }
            return $error;
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
