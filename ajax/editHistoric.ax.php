<?php

if(ADMIN){
  if(isset($_POST['id']) && isset($_POST['text'])){
    $db->query('UPDATE historic SET text=:text WHERE id=:id',
    array(
      'id' => $_POST['id'],
      'text' => $_POST['text']
    ));

    echo 'OK';
  }
  else
  echo 'KO';
}

?>
