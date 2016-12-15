<?php

    class Action{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function index(){
        $following_id = followingsId($_SESSION['user_id']);
        $following_id[] = $_SESSION['user_id'];
        $id_string = implode(',', $following_id);

        $sql = 'SELECT * FROM `actions` WHERE `user_id` IN ('.$id_string.') ORDER BY `created` DESC';
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $actions = array();
        while($table = mysqli_fetch_assoc($rec)){
          $actions[] = $table;
        }

        return $actions;
      }
    }

?>
