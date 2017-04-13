<?php

if(ADMIN){
  $id = isset($_POST['id']) ? $_POST['id'] : '';

  if($id){
    $pos = $db->row('SELECT pos FROM sponsors WHERE id=:id', array('id' => $id));
    $pos = $pos['pos'];

    if($pos != 1){
      $db->query('UPDATE sponsors SET pos=pos+1 WHERE pos=:posUp',
      array('posUp' => $pos - 1));

      $db->query('UPDATE sponsors SET pos=pos-1 WHERE id=:id',
      array('id' => $id));
    }
  }

  include 'templates/sponsors.tpl.php';
}

?>
