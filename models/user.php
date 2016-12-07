<?php

    class User{
      private $dbconnect;

      function __construct(){
        require('dbconnects.php');
        $this->dbconnect = $db;
      }

      function home_valid($post) {
        $error = array();
        $email = isset($post['email']) ? $post['email'] : NULL;

        if ($post['email'] == '') {
              $error['email'] = 'blank';
          }

        if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
             $error['emali'] = 'false';
          }
            return $error;
        }

      function pre_create($post) {
        $email = isset($post['email']) ? $post['email'] : NULL;
        $url_token = hash('sha256',uniqid(rand(),1));
        $url = "http://bucket-list.sakura.ne.jp/bucket_lists/users/signup"."?url_token=".$url_token;

        $sql = sprintf('INSERT INTO `pre_users` SET
                `url_token`="%s",
                `email`="%s",
                `created`=NOW()',
                mysqli_real_escape_string($this->dbconnect,$url_token),
                mysqli_real_escape_string($this->dbconnect,$post['email'])
                );
          mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect)
            );
        }

      function signup_valid($post) {
        $error = array();

        if ($post['nick_name'] == '') {
              $error['nick_name'] = 'blank';
         }
        if ($post['password'] == '') {
              $error['password'] = 'blank';
          } elseif (strlen($post['password']) < 4) {
              $error['password'] = 'length';
        }
        if ($_GET['url_token'] == '') {
              $error['url_token'] = 'blank';
        }

          $sql = sprintf('SELECT `email` from `pre_users`
                          WHERE `url_token` = "%s"
                          AND date > now() - interval 24 hour,
                              `date`=NOW()',
                mysqli_real_escape_string($this->dbconnect,$_SESSION['url_token']),
          $record = mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect))
          );
          $record_count = mysqli_fetch_assoc($record);

          if($record_count == 1){
            $email_array = $statement->fetch();
            $email = $email_array['email'];
            $_SESSION['email'] = $email;
          } else{
            $error['urltoken_timeover'] = 'over';
          }

          return $error;
      }

      function create(){
        $sql = sprintf('INSERT INTO `users` SET
                `nick_name`="%s",
                `email`="%s",
                `password`="%s",
                `created`=NOW()',
                mysqli_real_escape_string($this->dbconnect,$_SESSION['nick_name']),
                mysqli_real_escape_string($this->dbconnect,$_SESSION['email']),
                mysqli_real_escape_string($this->dbconnect,sha1($_SESSION['password']))
                );
            mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

        $sql = sprintf('UPDATE `pre_users` SET
                       `reg_flag` = 1 WHERE `email` = "%s"',
                  mysqli_real_escape_string($this->dbconnect,$_SESSION['email'])
                  );
                mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

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
