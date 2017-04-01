<?php

if(ADMIN){
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    $avatar = $db->row('SELECT avatar FROM team WHERE id=:id', array('id' => $_POST['id']));
    $avatar = $avatar['avatar'];

    if($avatar && $avatar != 'avatar_placeholder.jpg')
    unlink('img/team/' . $avatar);

    $db->query('DELETE FROM team WHERE id=:id', array('id' => $_POST['id']));
    include 'templates/members.tpl.php';
  }
  else
  echo 'KO';
}

?>
