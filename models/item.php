<?php
    specialEcho('Modelのitem.phpが呼ばれました');
    class Item{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function trend($option, $post){

        if($option == 'hot'){
          if(!empty($post['search_word'])){
            $sql = sprintf('SELECT *, COUNT(`item_id`) AS `cnt` FROM `items` WHERE `item_name` LIKE "%%%s%%" GROUP BY `items`.`item_id` ORDER BY `cnt` DESC',
              mysqli_real_escape_string($this->dbconnect, $post['search_word'])
              );
          } else {
            $sql = 'SELECT *, COUNT(`item_id`) AS `cnt` FROM `items` WHERE 1 GROUP BY `items`.`item_id` ORDER BY `cnt` DESC';
          }

        } else {

          if(!empty($post['search_word'])){
            $sql = sprintf('SELECT * FROM `items` WHERE `item_name` LIKE "%%%s%%" GROUP BY `items`.`item_id` ORDER BY `created` DESC',
              mysqli_real_escape_string($this->dbconnect, $post['search_word'])
              );
          } else {
            $sql = 'SELECT * FROM `items` WHERE 1 GROUP BY `items`.`item_id` ORDER BY `items`.`created` DESC';
          }
        }

        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $items = array();
        while($table = mysqli_fetch_assoc($rec)) {
            $items[] = $table;
        }
        // specialVarDump($items);
        return $items;
      }
      function show() {
      }
      function doing($option){
        $sql = sprintf('SELECT `user_id` FROM `items` WHERE `item_id`=%d AND `status`=1',
                mysqli_real_escape_string($this->dbconnect, $option)
                );
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $doing = array();
        while($table = mysqli_fetch_assoc($rec)){
          $doing[] = $table;
        }
        return $doing;
      }
      function done($option){
        $sql = sprintf('SELECT `user_id` FROM `items` WHERE `item_id`=%d AND `status`=2',
                mysqli_real_escape_string($this->dbconnect, $option)
                );
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        $done = array();
        while($table = mysqli_fetch_assoc($rec)){
          $done[] = $table;
        }
        return $done;
      }
      function add(){
      }

      function create($post){
            $sql = sprintf('INSERT INTO `items` SET `item_id` = %d,
                                                    `item_name` = "%s",
                                                    `deadline` = "%s",
                                                    `comment` = "%s",
                                                    `priority` = %d,
                                                    `status` = 1,
                                                    `list_id` = %d,
                                                    `user_id` = %d,
                                                    `tag_id` = 1,
                                                    `created` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['item_id']),
                        mysqli_real_escape_string($this->dbconnect,$post['item_name']),
                        mysqli_real_escape_string($this->dbconnect,$post['deadline']),
                        mysqli_real_escape_string($this->dbconnect,$post['comment']),
                        mysqli_real_escape_string($this->dbconnect,$post['score']),
                        mysqli_real_escape_string($this->dbconnect,$post['list_id']),
                        mysqli_real_escape_string($this->dbconnect,$_SESSION['id'])
                        // mysqli_real_escape_string($this->dbconnect,$post['tag_id'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }
      function index(){
      }
      function success($option){
        $sql = sprintf('SELECT i.*, a.`created` FROM `items` i, `actions` a WHERE i.`user_id`=%d AND i.`status`=2 AND i.`id`=a.`item_id`',
            mysqli_real_escape_string($this->dbconnect, $option)
            );
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $items = array();
        while($table = mysqli_fetch_assoc($rec)){
            $items[] = $table;
        }

        return $items;
      }
      function update($post) {
            $sql = sprintf('UPDATE `items` SET `deadline` = "%s",
                                               `comment` = "%s",
                                               `priority` = %d,
                                               `list_id` = %d,
                                               `tag_id` = 1
                                           WHERE `id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$post['deadline']),
                        mysqli_real_escape_string($this->dbconnect,$post['comment']),
                        mysqli_real_escape_string($this->dbconnect,$post['score']),
                        mysqli_real_escape_string($this->dbconnect,$post['list_id']),
                        // mysqli_real_escape_string($this->dbconnect,$post['tag_id']),
                        $post['id']
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }
      function conglaturation(){
      }
      function tassei($post){
        $sql = sprintf('UPDATE `items` SET `status`=2, `comment`="%s" WHERE `id`=%d',
          mysqli_real_escape_string($this->dbconnect, $post['comment']),
          mysqli_real_escape_string($this->dbconnect, $post['id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $sql = sprintf('INSERT INTO `actions` SET `item_id`=%d, `user_id`=%d, `status_id`=2, `created`=now()',
          mysqli_real_escape_string($this->dbconnect, $post['id']),
          mysqli_real_escape_string($this->dbconnect, $_SESSION['id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }
      function undone(){
      }
      function trash($option){
        $sql = sprintf('SELECT i.*, a.`created` FROM `items` i, `actions` a WHERE i.`user_id`=%d AND i.`status`=3 AND i.`id`=a.`item_id`',
            mysqli_real_escape_string($this->dbconnect, $option)
            );
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $items = array();
        while($table = mysqli_fetch_assoc($rec)){
            $items[] = $table;
        }

        return $items;
      }
      function giveup(){
      }
      function delete($post){
        $sql = sprintf('UPDATE `items` SET `status`=3, `comment`="%s" WHERE `id`=%d',
          mysqli_real_escape_string($this->dbconnect, $post['comment']),
          mysqli_real_escape_string($this->dbconnect, $post['id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $sql = sprintf('INSERT INTO `actions` SET `item_id`=%d, `user_id`=%d, `status_id`=3, `created`=now()',
          mysqli_real_escape_string($this->dbconnect, $post['id']),
          mysqli_real_escape_string($this->dbconnect, $_SESSION['id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }
      function undelete(){
      }
      function like($option){
        specialEcho ('モデルのlikeメソッド呼び出し');
        $sql = sprintf('INSERT INTO `likes`
                        SET `user_id`=%d, `item_id`=%d',
                        mysqli_real_escape_string($this->dbconnect, $_SESSION['id']),
                        mysqli_real_escape_string($this->dbconnect, $option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }

      function unlike($option){
        $sql = sprintf('DELETE FROM `likes`
                        WHERE `user_id`=%d
                        AND`item_id`=%d',
                        mysqli_real_escape_string($this->dbconnect, $_SESSION['id']),
                        mysqli_real_escape_string($this->dbconnect, $option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }
      function search(){
      }
      function updateSuccess($post){
        $sql = sprintf('UPDATE `items` SET `comment`="%s" WHERE `id`=%d',
          mysqli_real_escape_string($this->dbconnect, $post['comment']),
          mysqli_real_escape_string($this->dbconnect, $post['id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }
      function updateTrash($post){
        $sql = sprintf('UPDATE `items` SET `comment`="%s" WHERE `id`=%d',
          mysqli_real_escape_string($this->dbconnect, $post['comment']),
          mysqli_real_escape_string($this->dbconnect, $post['id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }

    }

?>
