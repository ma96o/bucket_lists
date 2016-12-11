<?php

    class Lists{
      private $dbconnect;

      function __construct(){
        require('dbconnect.php');
        $this->dbconnect = $db;
      }

      function create($post){
        $sql = sprintf('INSERT INTO `lists` SET `list_id` = %d,
		                                            `list_name` = "%s",
				                                        `user_id` = %d,
				                                        `created` = NOW()',
                        mysqli_real_escape_string($this->dbconnect,$post['list_id']),
                        mysqli_real_escape_string($this->dbconnect,$post['list_name']),
                        mysqli_real_escape_string($this->dbconnect,$_SESSION['id'])
                    );
            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }

      function update($post){
        $sql = sprintf('UPDATE `lists` SET `list_name`="%s" WHERE `list_id`=%d',
          mysqli_real_escape_string($this->dbconnect, $post['list_name']),
          mysqli_real_escape_string($this->dbconnect, $post['list_id'])
          );
        mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));
      }

    }

?>
