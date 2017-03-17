<?php

// Connexion
require("connect/Db.class.php");
$db = new Db();

// GET page
define('G_page', isset($_GET['page']) ? $_GET['page'] : 'home');

// Dispatcher
$dispatcher = array(
  'accompagnement' => 'accompaniment',
  'batiment' => 'asBuilding',
  'support-activites-mobilite-douce' => 'asSoftMobility',
  'environnement' => 'asEnvironment',
  'postuler' => 'candidate',
  'contact' => 'contact',
  'evenements' => 'events',
  'presentation-historique' => 'presentHistoric',
  'presentation-equipe' => 'presentTeam',
  'home' => 'home'
);

$pageName = isset($dispatcher[G_page]) ? $dispatcher[G_page] : 'home';

// Page data
$pageData =  current($db->query("SELECT * FROM page_$pageName LIMIT 1"));

// header
include 'includes/header.inc.php';

// Navbar
include 'includes/navbar.inc.php';

// Content
include 'pages/' . $pageName . '.php';

// Footer
include 'includes/footer.inc.php';

?>
