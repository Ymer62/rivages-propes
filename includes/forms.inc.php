<?php

// Forms
class form{
  // MSG Flash
  private function msgFlash($msg, $redirect = false){
    $_SESSION['post'] = serialize($_POST);
    $_SESSION['flash'] = $msg;
    header($redirect ? 'Location:' . $redirect : 'Refresh:0');
    exit;
  }

  // Login
  public function login(){
    global $db;

    // Already admin
    if(ADMIN) $this->msgFlash('', './');

    // Test post
    if(isset($_POST['login']) && isset($_POST['password'])){
      $user =  $db->row(
        "SELECT password FROM users WHERE login=:login",
        array('login' => $_POST['login']
      ));

      // Succes
      if($user['password'] && password_verify(SALT . $_POST['password'], $user['password'])){
        $_SESSION['admin'] = 'connected';
        $this->msgFlash('Connexion réussie !', './');
      }
      // Echec
      else
      $this->msgFlash('La connexion a échoué !');
    }
  }

  // Logout
  public function logout(){
    unset($_SESSION['admin']);
    $this->msgFlash('Vous avez bien été déconnecté !', './');
  }

  // Contact
  public function contact(){
    if (isset($_POST['submit'])){
      // POST
      $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
      $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
      $email = isset($_POST['email']) ? $_POST['email'] : "";
      $to = isset($_POST['to']) ? $_POST['to'] : "";
      $subject = isset($_POST['subject']) ? $_POST['subject'] : "";
      $msg = isset($_POST['msg']) ? $_POST['msg'] : "";

      // Check post
      if (!$first_name || !$last_name || !$email || !$to || !$subject || !$msg)
      $this->msgFlash('Tous les champs sont obligatoires');

      // Check email
      else if (!preg_match('#^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$#', $email))
      $this->msgFlash('Le format de l\'email est incorrect');

      // Prepar and send mail
      else{
        // Headers
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: Fred <boillot.frederic.62@gmail.com>' . "\r\n";
        $headers .= 'From: Fredo <boillot.frederic.62@gmail.com>' . "\r\n";

        // Message
        ob_start();
        ?>
          <a href="google.fr">Test de lien</a>
          <br />
          <?= $msg ?>
        <?php

        $msg = ob_get_contents();
        ob_clean();

        // Send
        $response = mail($to, $subject, $msg, $headers);

        // Stat
        if($response)
        $this->msgFlash('Le message a bien été transmis', './');
        else
        $this->msgFlash('Envoi mail PAS OK');
      }
    }
  }
}

// Instance
$form = new form();

?>
