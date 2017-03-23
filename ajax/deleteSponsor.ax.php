<?php

if(ADMIN){
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    $path = 'img/sponsors/';
    $lastSponsor = $db->row('SELECT img FROM sponsors WHERE id=:id', array('id' => $_POST['id']));
    unlink($path . $lastSponsor['img']);

    $db->query('DELETE FROM sponsors WHERE id=:id', array('id' => $_POST['id']));

    echo 'OK';
  }
  else
  echo 'KO';
}

?>
