<?php

if(ADMIN){
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    $lastImg = $db->row('SELECT img_min, img FROM events WHERE id=:id', array('id' => $_POST['id']));
    unlink('img/events/min/' . $lastImg['img_min']);
    unlink('img/events/' . $lastImg['img']);

    $db->query('DELETE FROM events WHERE id=:id', array('id' => $_POST['id']));
    include 'templates/events.tpl.php';
  }
  else
  echo 'KO';
}

?>
