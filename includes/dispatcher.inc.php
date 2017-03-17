<?php

// GET page
define('G_page', isset($_GET['page']) ? $_GET['page'] : 'home');
define('G_noData', isset($_GET['noData']) ? $_GET['noData'] : '');

// Dispatcher
$dispatcher = array(
  'accompagnement' => 'accompaniment',
  'support-activites-batiment' => 'as_building',
  'support-activites-mobilite-douce' => 'as_softmobility',
  'support-activites-environnement' => 'as_environment',
  'postuler' => 'candidate',
  'contact' => 'contact',
  'evenements' => 'events',
  'presentation-historique' => 'present_historic',
  'presentation-equipe' => 'present_team',
  'login' => 'login',
  'logout' => 'logout',
  'home' => 'home'
);

// Page name
$pageName = isset($dispatcher[G_page]) ? $dispatcher[G_page] : 'home';

// Page data
if(!G_noData)
$pageData = current($db->query("SELECT * FROM page_$pageName LIMIT 1"));

?>
