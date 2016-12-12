<?php
    specialEcho('Modelのitem.phpが呼ばれました');
    class Item{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function trend(){
      }
      function show($option) {
            specialEcho('モデルのshowメソッド呼び出し');
            specialEcho('$idは' . $option . 'です(モデル内)');

            $sql = sprintf('SELECT i.*, l.`user_id` AS `is_like` FROM `items` AS i LEFT JOIN `likes` AS l
                                    ON i.`id`=l.`item_id` AND l.`user_id`=%d
                                    WHERE i.`id` = %d',
                              mysqli_real_escape_string($this->dbconnect, $_SESSION['id']),
                              mysqli_real_escape_string($this->dbconnect, $option)
                        );

            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
      }
      function doing(){
      }
      function done(){
      }
      function add(){
      }

      // function create_valid($post) {
      //     //     // バリデーション
      //     if (!empty($post['item_name']) && !empty($post['deadline']) && !empty($post['comment'])) {
      //           $controller->create($post);
      //       } else {
      //           $controller->add();
      //       }
      //       $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

      //       $rtn = mysqli_fetch_assoc($results);
      //       return $rtn;
      // }
      function create($post){
            $sql = sprintf('INSERT INTO `items` SET `item_id` = %d,
                                                    `item_name` = "%s",
                                                    `deadline` = "%s",
                                                    `comment` = "%s",
                                                    `status` = 1,
                                                    `priority` = %d,
                                                    `list_id` = %d,
                                                    `user_id` = %d,
                                                    `tag_id` = %d,
                                                    `created` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['item_id']),
                        mysqli_real_escape_string($this->dbconnect,$post['item_name']),
                        mysqli_real_escape_string($this->dbconnect,$post['deadline']),
                        mysqli_real_escape_string($this->dbconnect,$post['comment']),
                        mysqli_real_escape_string($this->dbconnect,$post['score']),
                        mysqli_real_escape_string($this->dbconnect,$post['list_id']),
                        mysqli_real_escape_string($this->dbconnect,$post['user_id']),
                        mysqli_real_escape_string($this->dbconnect,$post['tag_id'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
        }
      function index(){
      }
      function edit($option) {
          $sql = 'SELECT i.*, l.* FROM `items` AS i LEFT JOIN `lists` AS l ON i.`list_id` = l.`list_id` AND i.`item_id` = ' . $option;
          $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

          $rtn = mysqli_fetch_assoc($results);
          return $rtn;
      }
      function update($post) {
            $sql = sprintf('UPDATE `items` SET `deadline` = "%s",
                                               `comment` = "%s",
                                               `priority` = %d,
                                               `list_id` = %d,
                                               `tag_id` = %d
                                           WHERE `id` = %d',
                        mysqli_real_escape_string($this->dbconnect,$post['deadline']),
                        mysqli_real_escape_string($this->dbconnect,$post['comment']),
                        mysqli_real_escape_string($this->dbconnect,$post['priority']),
                        mysqli_real_escape_string($this->dbconnect,$post['list_id']),
                        mysqli_real_escape_string($this->dbconnect,$post['tag_id']),
                        $post['id']
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }
      function success(){
      }
      function conglaturation($option){
        $sql = 'SELECT * FROM `items` WHERE `status` = 1 AND `user_id` = ' . $option;
            $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

            $rtn = mysqli_fetch_assoc($results);
            return $rtn;
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
      function trash(){
      }
      function giveup(){
      }
      function delete(){
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

      // 本来はいいねする際sprintf('INSERT INTO `likes` SET `user_id`=%d, `item_id`=%d', mysqli_real_escape_string($this->dbconnect, $_SESSION['id']), mysqli_real_escape_string($this->dbconnect, $option));
      // mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

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

    }

?>
