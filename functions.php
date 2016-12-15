<?php

    define('DEBUG', false);

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

//リンク先を絶対パスで飛ばす
    function toLink($resource, $action){
      echo '/bucket_lists/'.$resource.'/'.$action;
    }

//ログイン判定
    function isLogin(){
      require('dbconnect.php');
      if(isset($_SESSION['user_id']) && $_SESSION['time'] + 3600 > time()){
        $_SESSION['time'] = time();

        $sql = sprintf('SELECT * FROM `users` WHERE `user_id`=%d',
                        mysqli_real_escape_string($db, $_SESSION['user_id'])
                      );
        $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
        $user = mysqli_fetch_assoc($rec);
        return $user;
      } else {
        header('location: /bucket_lists/users/home');
        exit();
      }
    }

//指定したユーザについての情報を配列データとして返す
    function aboutUser($user_id){
      require('dbconnect.php');

        $sql = sprintf('SELECT * FROM `users` WHERE `user_id`=%d',
                        mysqli_real_escape_string($db, $user_id)
                      );
        $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
        $user = mysqli_fetch_assoc($rec);

        return $user;
    }

//フォロー数
    function countFollowing($user_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT COUNT(*) AS `cnt` FROM `followings` WHERE `following_id`=%d',
        mysqli_real_escape_string($db, $user_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $row = mysqli_fetch_assoc($rec);

      return $row['cnt'];
    }

//フォロワー数
    function countFollower($user_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT COUNT(*) AS `cnt` FROM `followings` WHERE `follower_id`=%d',
        mysqli_real_escape_string($db, $user_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $row = mysqli_fetch_assoc($rec);

      return $row['cnt'];
    }

//doingユーザ数
    function countDoing($item_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT COUNT(*) AS `cnt` FROM `items` WHERE `item_id`=%d AND `status`=1',
        mysqli_real_escape_string($db, $item_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $row = mysqli_fetch_assoc($rec);

      return $row['cnt'];
    }

//doneユーザ数
    function countDone($item_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT COUNT(*) AS `cnt` FROM `items` WHERE `item_id`=%d AND `status`=2',
        mysqli_real_escape_string($db, $item_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $row = mysqli_fetch_assoc($rec);

      return $row['cnt'];
    }

//いいね数
    function countLike($item_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT COUNT(*) AS `cnt` FROM `likes` WHERE `item_id`=%d',
        mysqli_real_escape_string($db, $item_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $row = mysqli_fetch_assoc($rec);

      return $row['cnt'];
    }


//フォローしているユーザのIdを取得
    function followingsId($follower_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT DISTINCT `following_id` FROM `followings` WHERE `follower_id`=%d',
        mysqli_real_escape_string($db, $follower_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));

      $following_id = array();
      while($table = mysqli_fetch_assoc($rec)){
        $following_id[] = $table['following_id'];
      }

      return $following_id;
    }

//指定した項目の情報を取得
    function aboutItem($item_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT * FROM `items` WHERE `id`=%d',
        mysqli_real_escape_string($db, $item_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));

      $items = mysqli_fetch_assoc($rec);

      return $items;
    }

//指定したユーザのリストを取得
    function getList($user_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT * FROM `lists` WHERE `user_id`=%d',
        mysqli_real_escape_string($db, $user_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $lists = array();
      while($table = mysqli_fetch_assoc($rec)){
        $lists[] = $table;
      }
      return $lists;
    }

//指定したユーザの一番上のリストのIDを取得
    function getFirstListId($user_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT `list_id` FROM `lists` WHERE `user_id`=%d',
        mysqli_real_escape_string($db, $user_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $table = mysqli_fetch_assoc($rec);
      $first_list_id = $table['list_id'];
      return $first_list_id;
    }

// 前アクション参照用関数
    function get_last_referer() {
      $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null; // 遷移元のURLが存在すれば取得
      $referer = explode('/', $referer);
      return $referer;
    }

    // followingsテーブルからデータを取得
    function follow_all($option){
       require('dbconnect.php');
       $sql = sprintf('SELECT *
                       FROM `followings`
                       WHERE `follower_id` = %d
                       AND `following_id` = %d',
              mysqli_real_escape_string($db, $_SESSION['user_id']),
              mysqli_real_escape_string($db, $option)
               );
       $results = mysqli_query($db, $sql) or die(mysqli_error($db));
       $rtn = mysqli_fetch_assoc($results);
       return $rtn;
    }

//いいね判定 0->いいねしてない、1->いいねしてる
    function isLike($item_id){
      require('dbconnect.php');
      $sql = sprintf('SELECT * FROM `likes` WHERE `user_id`=%d AND `item_id`=%d',
        mysqli_real_escape_string($db, $_SESSION['user_id']),
        mysqli_real_escape_string($db, $item_id)
        );
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
      $like_flag = 0;
      if($table = mysqli_fetch_assoc($rec)){
        $like_flag = 1;
      }

      return $like_flag;

    }

    function getLastUser(){
      require('dbconnect.php');
      $sql = 'SELECT `user_id` FROM `users` WHERE 1';
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));

      $last_id = 0;
      while($table = mysqli_fetch_assoc($rec)){
        $last_id = $table;
      }
      return ++$last_id['user_id'];
    }

    function getLast(){
      require('dbconnect.php');
      $sql = 'SELECT `id` FROM `items` WHERE 1';
      $rec = mysqli_query($db, $sql) or die(mysqli_error($db));

      $last = 0;
      while($table = mysqli_fetch_assoc($rec)){
        $last = $table['id'];
      }
      return ++$last;
    }

?>
