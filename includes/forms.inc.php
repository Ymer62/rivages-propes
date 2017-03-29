<?php

// Forms
class form{
  // Login
  public function login(){
    global $db;

    if(ADMIN){
      header('Location:./');
      exit;
    }

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
        exit;
      }
      // Echec
      else{
        $_SESSION['flash'] = 'La connexion a échoué !';
        header('Refresh:0');
        exit;
      }
    }
  }

  // Logout
  public function logout(){
    unset($_SESSION['admin']);
    $_SESSION['flash'] = 'Vous avez bien été déconnecté !';
    header('Location:./');
    exit;
  }

  // Contact
  public function contact(){
    global $path;

    // Récupération du POST
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $to = isset($_POST['to']) ? $_POST['to'] : "";
    $sujet = isset($_POST['sujet']) ? $_POST['sujet'] : "";
    $msg = isset($_POST['msg']) ? $_POST['msg'] : "";

    // Vérification du formulaire
    if ($first_name && $email && $sujet){
      $header = "From: boillot.frederic.62@gmail.com\r\n";
      $header .= "Reply-to: boillot.frederic.62@gmail.com";
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
      $msg = ob_get_contents();

      // Néttoyage du tampon
      ob_clean();

      // Envoi du mail
      $response = mail($to, $sujet, $msg, $header);

      if($response){
        $_SESSION['flash'] = 'Envoi mail OK';
        header('Location:./');
        exit;
      }
      else{
        $_SESSION['flash'] = 'Envoi mail PAS OK';
        header('Refresh:0');
        exit;
      }
    }
  }
}

// Instance
$form = new form();

?>
