<?php

// Debug
class debug{
  public function arr($var){
    if (DEBUG){
      foreach ($var as $key => $value)
      include 'templates/debug/debugArr.tpl.php';
    }
  }
}

$debug = new debug();

?>
