<?php

if(ADMIN){

  // Edit
  $id = isset($_POST['id']) ? $_POST['id'] : '';
  $password = isset($_POST['password']) ? password_hash(SALT . $_POST['password'], PASSWORD_DEFAULT) : '';

  $db->query('UPDATE users SET password=:password WHERE id=:id',
  array(
    'id' => $id,
    'password' => $password)
  );

  echo 'OK';

}

?>
