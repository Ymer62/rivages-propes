<?php

if(ADMIN){
  // Edit
  if(isset($_POST['id']) && is_numeric($_POST['id'])){

    $content = isset($_POST['content']) ? $_POST['content'] : '';

    $db->query('UPDATE home_sliders set content=:content WHERE id=:id',
    array(
      'id' => $_POST['id'],
      'content' => $content
    ));

    echo 'OK';
  }
  // Add
  else{
    $content = isset($_POST['content']) ? $_POST['content'] : '';

    $db->query('INSERT INTO home_sliders(content) value(:content)',
    array(
      'content' => $content
    ));
  }
}

?>
