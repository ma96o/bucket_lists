<?php
    function like($like){
  // likesテーブルにuser_idとitem_idを入れる。
        $sql = sprintf('INSERT INTO `likes` SET `user_id`=%d, `item_id`=%d',
          mysqli_real_escape_string($this->db, $_REQUEST['user_id']),
          mysqli_real_escape_string($this->db, $_REQUEST['item_id'])
          );
        mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
      }

// 上記の逆のことをして、ボタン押したらlikesテーブルのデータ一件を削除するという設定。
      function unlike($like){
        $sql = sprintf('DELETE FROM `likes` WHERE `user_id`=%d AND`item_id`=%d',
          mysqli_real_escape_string($this->db, $_REQUEST['user_id']),
          mysqli_real_escape_string($this->db, $_REQUEST['item_id'])
          );
        mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
      }

    header('location: show.php');
    exit();
?>