<?php
echo('Modelのitem.phpが呼ばれました');
    class Item{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function trend(){
      }
      function show($option) {
            echo('モデルのshowメソッド呼び出し');
            echo('$idは' . $option . 'です(モデル内)');

            $sql = sprintf('SELECT i.*, l.`u_id` AS `is_like` FROM `items` AS i LEFT JOIN `likes` AS l
                                    ON i.`id`=l.`i_id` AND l.`u_id`=%d
                                    WHERE i.`item_id` = %d',
                              mysqli_real_escape_string($this->$user['1']),
                              mysqli_real_escape_string($this->$option)
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
      function create(){
      }
      function index(){
      }
      function edit(){
      }
      function update(){
      }
      function success(){
      }
      function conglaturation(){
      }
      function tassei(){
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
        echo 'モデルのlikeメソッド呼び出し';
        $sql = sprintf('INSERT INTO `likes`
                        SET `user_id`=1, `item_id`=%d',
                        mysqli_real_escape_string($this->dbconnect, $option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }

      // 本来はいいねする際はsprintf('INSERT INTO `likes` SET `user_id`=%d, `item_id`=%d', mysqli_real_escape_string($this->dbconnect, $_SESSION['id']), mysqli_real_escape_string($this->dbconnect, $option));
      // mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

      function unlike($option){
        $sql = sprintf('DELETE FROM `likes`
                        WHERE `user_id`=1
                        AND`item_id`=%d',
                        mysqli_real_escape_string($this->dbconnect, $option)
                        );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }
      function search(){
      }

    }

?>
