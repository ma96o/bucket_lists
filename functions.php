<?php

    define('DEBUG', true);

    function specialEcho($val){
      if(DEBUG){
        echo $val;
        echo '<br>';
      }
    }

    function specialVarDump($val){
      if(DEBUG){
        echo '<pre>';
        var_dump($val);
        echo '</pre>';
      }
    }

    function toLink($resource, $action){
      echo '/bucket_lists/'.$resource.'/'.$action;
    }

?>
