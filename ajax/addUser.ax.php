<?php

if(ADMIN){

  // Add
  $login = isset($_POST['login']) ? $_POST['login'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  $testAvailable = $db->row('SELECT id FROM users WHERE login=:login', array('login' => $login));

  if(!$testAvailable['id']){
    $db->query('INSERT INTO users(login, password) value(:login, :password)',
    array(
      'login' => $login,
      'password' => password_hash(SALT . $password, PASSWORD_DEFAULT)
    ));

    echo $db->lastInsertId();
  }
  else
  echo 'KO';

}

?>
