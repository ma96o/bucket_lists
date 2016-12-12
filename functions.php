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

//リンク先を絶対パスで飛ばす
    function toLink($resource, $action){
      echo '/bucket_lists/'.$resource.'/'.$action;
    }

//ログイン判定
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
        header('location: ');
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

// 前アクション参照用関数
    function get_last_referer() {
      $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null; // 遷移元のURLが存在すれば取得
      $referer = explode('/', $referer);
      return $referer;
    }

    // followingsテーブルからデータを取得
    function follow_all($user_id){
       require('dbconnect.php');
       $sql = sprintf('SELECT *
                       FROM `followings`
                       WHERE `follower_id` = %d
                       AND `following_id` = %d',
              mysqli_real_escape_string($db, $_SESSION['id']),
              mysqli_real_escape_string($db, $user_id)
               );
       $results = mysqli_query($db, $sql) or die(mysqli_error($db));
       $rtn = mysqli_fetch_assoc($results);
       return $rtn;
    }

?>
