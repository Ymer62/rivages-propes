<?php

// GET page
define('G_page', isset($_GET['page']) ? $_GET['page'] : 'home');

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
  'admin' => 'admin',
  'home' => 'home'
);

// Page name
$pageName = isset($dispatcher[G_page]) ? $dispatcher[G_page] : 'home';

// Page data
$pageData =  current($db->query("SELECT * FROM page_$pageName LIMIT 1"));

?>
