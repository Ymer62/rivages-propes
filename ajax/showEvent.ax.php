<?php

// POST
$id = isset($_POST['id'])? $_POST['id'] : '';

// Data
if($id){
  $data = $db->row('SELECT title, text, img FROM events WHERE id=:id', array('id' => $id));
  include 'templates/event.tpl.php';
}

else
echo 'KO';

?>
