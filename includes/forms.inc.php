<?php

// Forms
class form{
  public function login($db){
    if(isset($_POST['login']) && isset($_POST['password'])){
      $user =  current($db->query(
        "SELECT password FROM users WHERE login=:login LIMIT 1",
        array('login' => $_POST['login']
      )));

      // Succes
      if($user['password'] && password_verify($_POST['password'], $user['password'])){
        $_SESSION['admin'] = 'connected';
        $_SESSION['flash'] = 'Connexion réussie !';
        header('Location:./');
      }
      // Echec
      else{
        $_SESSION['flash'] = 'La connexion a échoué !';
        header('Refresh:0');
      }
    }
  }
}

// Instance
$form = new form();

?>
