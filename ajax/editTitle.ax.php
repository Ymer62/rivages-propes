<?php

if(ADMIN){
  if(isset($_POST['page']) && isset($_POST['title'])){
    $db->query('UPDATE page_'.$_POST['page'].' SET title=:title', array('title' => $_POST['title']));
    echo 'OK';
  }
  else
  echo 'KO';
}

?>
