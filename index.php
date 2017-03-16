<?php

// Connexion
require("connect/Db.class.php");
$db = new Db();

// GET page
define('G_page', isset($_GET['page']) ? $_GET['page'] : '');

// Dispatcher
switch (G_page){
  case 'accompagnement': $page = 'accompaniment'; break;
  case 'batiment': $page = 'asBuilding'; break;
  case 'support-activites-mobilite-douce': $page = 'asSoftMobility'; break;
  case 'environnement': $page = 'asEnvironment'; break;
  case 'postuler': $page = 'candidate'; break;
  case 'contact': $page = 'contact'; break;
  case 'evenements': $page = 'events'; break;
  case 'presentation-historique': $page = 'presentHistoric'; break;
  case 'presentation-equipe': $page = 'presentTeam'; break;
  default: $page = 'home'; break;
}

// header
include 'includes/header.inc.php';

// Navbar
include 'includes/navbar.inc.php';

// Content
include 'pages/' . $page . '.php';

// Footer
include 'includes/footer.inc.php';

?>
