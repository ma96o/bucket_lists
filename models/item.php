<?php

    class Item{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function trend(){
        $sql = sprintf('SELECT * FROM `items` WHERE 1');
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $items = array();
        while($table = mysqli_fetch_assoc($rec)) {
            $items[] = $table;
        }

        return $items;
      }
      function show(){
      }
      function doing(){
      }
      function done(){
      }
      function add(){
      }
      function create(){
      }
      function index($option, $list_id){
        $sql = sprintf('SELECT * FROM `items` WHERE `user_id`=%d AND `list_id`=%d AND `status`=1',
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
      function update(){
      }
      function success($option){
        $sql = sprintf('SELECT * FROM `items` WHERE `user_id`=%d AND `status`=2',
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
        $sql = sprintf('SELECT * FROM `items` WHERE `user_id`=%d AND `status`=3',
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
