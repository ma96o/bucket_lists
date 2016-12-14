<?php

    class User{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function home_valid($post) {
        $error = array();
        $email = isset($post['email']) ? $post['email'] : NULL;

        $sql = sprintf('SELECT COUNT(*) AS cnt FROM `users` WHERE `email`="%s"',
            mysqli_real_escape_string($this->dbconnect,$email)
            );
        $record = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $table = mysqli_fetch_assoc($record);
        if ($table['cnt'] > 0){
          $error['email'] = 'duplicate';
        }

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
        $url = "http://bucket-list.sakura.ne.jp/bucket_lists/users/signup"."?url_token=".$_SESSION['url_token'];


        $sql = sprintf('INSERT INTO `pre_users` SET
                `url_token`="%s",
                `email`="%s",
                `created`=NOW()',
                mysqli_real_escape_string($this->dbconnect,$_SESSION['url_token']),
                mysqli_real_escape_string($this->dbconnect,$post['email'])
                );
          mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect)
            );
        }

      function signup_valid($post) {
        $error = array();

        if(isset($_GET['url_token'])) {
            $url_token = $_GET['url_token'];
        }
        if(isset($post['nick_name']) && $post['nick_name'] == '') {
              $error['nick_name'] = 'blank';
         }
        if(isset($post['password']) && $post['password'] == '') {
              $error['password'] = 'blank';
          } elseif (isset($post['password']) && strlen($post['password']) < 4) {
              $error['password'] = 'length';
        }
        if ($url_token == '') {
              $error['url_token'] = 'blank';
        }

          $sql = sprintf('SELECT `email` FROM `pre_users`
                          WHERE `url_token` = "%s"
                          ',
              mysqli_real_escape_string($this->dbconnect,$url_token));
          $record = mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect)
          );
          $rtn = mysqli_fetch_assoc($record);

          return $rtn;
          return $error;
      }

      function create($post){
        $sql = sprintf('INSERT INTO `users` SET
                `nick_name`="%s",
                `email`="%s",
                `picture_path`="0.jpg",
                `password`="%s",
                `created`=NOW()',
                mysqli_real_escape_string($this->dbconnect,$post['nick_name']),
                mysqli_real_escape_string($this->dbconnect,$post['email']),
                mysqli_real_escape_string($this->dbconnect,sha1($post['password']))
                );
        mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));

        $sql = sprintf('INSERT INTO `lists` SET `list_name`="新規リスト１", `user_id`=%d',
          mysqli_real_escape_string($this->dbconnect, getLastUser())
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $sql = sprintf('UPDATE `pre_users` SET
                       `reg_flag` = 1 WHERE `email` = "%s"',
                  mysqli_real_escape_string($this->dbconnect,$post['email'])
                  );
                mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $_SESSION = array();

        if (isset($_COOKIE["PHPSESSID"])) {
              setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        session_destroy();

        header('Location: thanks');
        exit();
      }

      function auth($post) {
         $sql = sprintf('SELECT * FROM `users` WHERE `email`="%s" AND `password`="%s"',
                           mysqli_real_escape_string($this->dbconnect,$post['email']),
                           mysqli_real_escape_string($this->dbconnect, sha1($post['password']))
                  );
            $record = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($db));
            $login_flag = false;
            if ($table = mysqli_fetch_assoc($record)) {
                $_SESSION['user_id'] = $table['user_id'];
                $_SESSION['time'] = time();
                $login_flag = true;
            } else {
                $login_flag = false;
            }
            return $login_flag;
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
        $about_user = aboutUser($_SESSION['user_id']);
        $pre_picture_path = $about_user['picture_path'];

        if(empty($post['picture_path'])){
          $picture_path = $pre_picture_path;

        } else {
          $picture_path = date('YmdHis') . $post['picture_path'];
          unlink($post['dirname'].'/views/pf_image/'.$pre_picture_path);
          move_uploaded_file($post['tmp_picture_path'], $post['dirname'].'/views/pf_image/'.$picture_path);
        }

        $sql = sprintf('UPDATE `users` SET `nick_name`="%s", `picture_path`="%s", `description`="%s" WHERE `user_id`=%d',
          mysqli_real_escape_string($this->dbconnect, $post['nick_name']),
          mysqli_real_escape_string($this->dbconnect, $picture_path),
          mysqli_real_escape_string($this->dbconnect, $post['description']),
          mysqli_real_escape_string($this->dbconnect, $_SESSION['user_id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }

      function follow($option){

        $sql = sprintf('INSERT INTO `followings`
                        SET `follower_id` = %d, `following_id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$_SESSION['user_id']),
                        mysqli_real_escape_string($this->dbconnect,$option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }

      function unfollow($option){
        $sql = sprintf('DELETE FROM `followings`
                        WHERE `follower_id` = %d
                        AND `following_id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$_SESSION['user_id']),
                        mysqli_real_escape_string($this->dbconnect,$option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));


      }

      function followings(){
        $sql = sprintf('SELECT u.*, f.`following_id`
                        FROM `users`
                        AS u
                        LEFT JOIN `followings`
                        AS f
                        ON u.`user_id` = f.`following_id`
                        WHERE u.`user_id` = f.`following_id`
                        AND f.`follower_id` = %d',
               mysqli_real_escape_string($this->dbconnect,$_SESSION['user_id']));
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $rtn = array();
        while($result = mysqli_fetch_assoc($results)){
                $rtn[] = $result;
        }
        return $rtn;
      }

      function followers(){
        $sql = sprintf('SELECT u.*,f.`follower_id`, f.`following_id`
                        FROM `users`
                        AS u
                        LEFT JOIN `followings`
                        AS f
                        ON u.`user_id` = f.`follower_id`
                        WHERE u.`user_id` = f.`follower_id`
                        AND f.`following_id` = %d',
               mysqli_real_escape_string($this->dbconnect,$_SESSION['user_id']));
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $rtn = array();
        while($result = mysqli_fetch_assoc($results)){
                $rtn[] = $result;
        }
        return $rtn;
      }

      function search($post){
        $sql = sprintf('SELECT * FROM `users` WHERE `nick_name` LIKE "%%%s%%"',
          mysqli_real_escape_string($this->dbconnect, $post['search_word'])
          );
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $users = array();
        while ($table = mysqli_fetch_assoc($rec)){
          $users[] = $table;
        }
        return $users;
      }

    }

?>