<?php

    class Item{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function trend(){
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
        $sql = sprintf('INSERT INTO `likes`
                        SET `user_id`=%d, `item_id`=%d',
                        mysqli_real_escape_string($this->db, $_SESSION['id']),
                        mysqli_real_escape_string($this->db, $option)
                        );
        mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
      }

      function unlike($option){
        $sql = sprintf('DELETE FROM `likes`
                        WHERE `user_id`=%d
                        AND`item_id`=%d',
                        mysqli_real_escape_string($this->db, $_SESSION['id']),
                        mysqli_real_escape_string($this->db, $option)
                        );
        mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
      }
      function search(){
      }

    }

?>
