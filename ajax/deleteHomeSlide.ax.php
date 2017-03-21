<?php

if(ADMIN){
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    $path = 'img/homeSliders/';
    $lastSlide = $db->row('SELECT slide FROM home_sliders WHERE id=:id', array('id' => $_POST['id']));
    if(isset($lastSlide['slide']))
    unlink($path . $lastSlide['slide']);

    $db->query('DELETE FROM home_sliders WHERE id=:id', array('id' => $_POST['id']));

    echo 'OK';
  }
  else
  echo 'KO';
}

?>
