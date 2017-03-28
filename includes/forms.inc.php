<?php

// Forms
class form{
  // Login
  public function login($db){
    if(isset($_POST['login']) && isset($_POST['password'])){
      $user =  $db->row(
        "SELECT password FROM users WHERE login=:login",
        array('login' => $_POST['login']
      ));

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

  // Contact

  public function contact(){

    // Récupération du POST
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name'])? $_POST['last_name']:"";
    $email = isset($_POST['email'])? $_POST['email']:"";
    $to = isset($_POST['to'])? $_POST['to']:"";
    $sujet = isset($_POST['sujet'])? $_POST['sujet']:"";
    $msg = isset($_POST['msg'])? $_POST['msg']:"";

    // Vérification du formulaire
    if ($first_name && $email && $sujet){

      echo 'test';

      $header = "From: \"RémyD\"<ymeurt@gmail.com>\n";
      $header .= "Reply-to: \"RémyD\" <ymeurt@gmail.com>\n";
      // $header .= "MIME-Version: 1.0\n";
      // $header .= "Content-Type: multipart/alternative;\n"." boundary=\"$boundary\"\n";

      // Tamporisation
      ob_start();
      ?>
        <a href="google.fr">Test de lien</a>
        <br />
        <?= $msg ?>
      <?php

      // Récupération du tampon
      $msg = ob_end_flush();

      // Néttoyage du tampon
      ob_clean();

      // Envoi du mail
      $response = mail($to, $sujet, $msg, $header);

      if($response){
        $_SESSION['flash'] = 'Envoi mail OK';
        // header('Location:./');
      }
      else{
        $_SESSION['flash'] = 'Envoi mail PAS OK';
        // header('Location:./');
      }
    }
  }
}

// Instance
$form = new form();

?>
