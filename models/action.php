<?php

    class Action{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function index(){
      }
    }

?>
