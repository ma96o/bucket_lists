<?php

    class Lists{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function getAllLists(){
        $sql = 'SELECT * FROM `lists` WHERE 1';
        $results = mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

          $rtn = mysqli_fetch_assoc($results);
          return $rtn;
      }
    }

?>
