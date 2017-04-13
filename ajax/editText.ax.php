<?php

if(ADMIN){
  if(isset($_POST['page']) && isset($_POST['text'])){
    $db->query('UPDATE page_'.$_POST['page'].' SET text=:text', array('text' => $_POST['text']));
    echo 'OK';
  }
  else
  echo 'KO';
}

?>
