<?php

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
  'panel' => 'panel',
  'home' => 'home'
);

// Page name
define('PAGE', isset($dispatcher[G_page]) ? $dispatcher[G_page] : '404');

// Page data
if(!G_noData && PAGE != '404'){
  $pageData = $db->query('SELECT * FROM page_' . PAGE .' NATURAL JOIN custom');
  if (count($pageData) == 1) $pageData = current($pageData);
}
if(empty($pageData))
$pageData = $db->row('SELECT * FROM custom');

// Page form
if(method_exists($form, PAGE)){
  $action = PAGE;
  $form->$action();
}

?>
