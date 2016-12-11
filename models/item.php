<?php

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
      function show(){
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
      function create(){
      }
      function index(){
      }
      function edit(){
      }
      function update(){
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
      function conglaturation(){
      }
      function tassei(){
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
      function delete(){
      }
      function undelete(){
      }
      function like(){
      }
      function unlike(){
      }
      function search(){
      }

    }

?>
