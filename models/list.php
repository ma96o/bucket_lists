<?php

    class Lists{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function create(){
      }
    }

?>
