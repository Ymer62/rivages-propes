<?php

if(ADMIN){
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    $db->query('DELETE FROM historic WHERE id=:id', array('id' => $_POST['id']));
    echo 'OK';
  }
  else
  echo 'KO';
}

?>
