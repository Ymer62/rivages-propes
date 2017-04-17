<?php

if(ADMIN){

  $id = isset($_POST['id']) ? $_POST['id'] : '';
  $editEvent = $db->row('SELECT *, DATE_FORMAT(date, "%d/%m/%Y") AS date FROM events WHERE id=:id', array('id' => $id));

  include 'templates/modal/eventEditForm.tpl.php';

}

?>
