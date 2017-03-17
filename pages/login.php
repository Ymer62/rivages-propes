<?php

// Submit
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

// Admin
if (ADMIN):
header('Location:./');

// Form
else:

?>
  <div class="row">
    <form action="?page=login&noData=true" method="post" class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input name="login" id="login" type="text" class="validate">
          <label for="login">Utilisateur</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="password" id="password" type="password" class="validate">
          <label for="password">Mot de passe</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="action">
        Connexion
      </button>
    </form>
  </div>
<?php

endif;

?>
