<?php

if(ADMIN):

  // Add;
  $text = isset($_POST['text']) ? $_POST['text'] : '';
  $year = isset($_POST['year']) ? $_POST['year'] : '';

  $db->query('INSERT INTO historic(text, year) value(:text, :year)',
  array(
    'text' => $text,
    'year' => $year
  ));

include 'templates/historic.tpl.php';

endif;
?>
