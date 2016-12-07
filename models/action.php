<?php

    class Action{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function index(){
        $following_id = followingsId(1);
        $following_id[] = 1;
        $id_string = implode(',', $following_id);

        $sql = 'SELECT * FROM `actions` WHERE `user_id` IN ('.$id_string.')';
        $rec = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        $actions = array();
        while($table = mysqli_fetch_assoc($rec)){
          $actions[] = $table;
        }

        return $actions;
      }
    }

?>
