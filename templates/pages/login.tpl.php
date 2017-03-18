<?php

// Submit
$form->login($db);

// Admin
if (ADMIN):
header('Location:./');

// Form
else:

?>
  <div class="row">
    <form action="?page=login&noData=true" method="post" class="col s6 offset-s3 m4 offset-m4 l2 offset-l5">
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
      <div class="row">
          <div class="col s12">
              <button class="btn waves-effect waves-light center-block" type="submit" name="action">
                Connexion
              </button>
          </div>
      </div>

    </form>
  </div>
<?php

endif;

?>
