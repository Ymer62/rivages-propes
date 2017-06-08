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
    global $db;

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
        // To
        $to = $db->row('SELECT name, job, email FROM team WHERE id=:id', array('id' => $to));

        // Headers
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '. $first_name . ' ' . $last_name .' <'. $email .'>' . "\r\n";
        $headers .= 'Reply-To: contact@rivagespropres.fr'. "\r\n";

        // Message
        ob_start();
        ?>
          Nouveau message de la part de <?= $first_name . ' ' . $last_name ?> :
          <br /><br />
          <?= $msg ?>
        <?php

        $msg = ob_get_contents();
        ob_clean();

        // Send
        $response = mail('contact@rivagespropres.fr', 'Rivages Propres : ' . $subject, $msg, $headers);

        // Stat
        if($response)
        $this->msgFlash('Le message a bien été transmis', './');
        else
        $this->msgFlash('L\'envoi du mail a échoué');
      }
    }
  }

  // Candidate
  public function candidate(){
    global $upload;

    if (isset($_POST['submit'])){
      // POST
      $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
      $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
      $email = isset($_POST['email']) ? $_POST['email'] : "";
      $age = isset($_POST['age']) ? $_POST['age'] : "";

      // File
      if(isset($_FILES['cv']))
      $file1 = $upload->doc($_FILES['cv']);

      // Check post
      if (!$first_name || !$last_name || !$email || !$age)
      $this->msgFlash('Tous les champs sont obligatoires');

      else if(!is_array($file1))
      $this->msgFlash('Le chargement du fichier a échoué');

      // Check email
      else if (!preg_match('#^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$#', $email))
      $this->msgFlash('Le format de l\'email est incorrect');

      // Prepar and send mail
      else{
        // Headers
        $boundary = md5(uniqid(rand(), true));
        $headers = 'Content-Type: multipart/mixed;'."\r\n".' boundary="'.$boundary.'"';

        // Message
        ob_start();
        ?>
          Demande de recrutement de la part de <?= $first_name . ' ' . $last_name ?>
        <?php

        $msg = ob_get_contents();
        ob_clean();

        $message = 'This is a multi-part message in MIME format.'."\r\n";
        $message .= '--'.$boundary."\r\n";
        $message .= 'Content-Type: text/html; charset="UTF-8"'."\r\n";
        $message .= trim($msg) . "\r\n";

        $message .= '--'.$boundary."\r\n";
        $message .= 'Content-Type: '.$file1[1].'; name="'.$file1[0].'"'."\r\n";
        $message .= 'Content-Transfer-Encoding: base64'."\r\n";
        $message .= 'Content-Disposition: attachment; filename="'.$file1[0].'"'."\r\n";
        $message .= $file1[2] . "\r\n";
        $message .= '--'.$boundary.'--';

        // Send
        $response = mail('boillot.frederic.62@gmail.com', 'Rivages Propres : Recrutement', $message, $headers);

        // Stat
        if($response)
        $this->msgFlash('La demande a bien été transmise', './');
        else
        $this->msgFlash('L\'envoi du mail a échoué');
      }
    }
  }
}

// Instance
$form = new form();

?>
