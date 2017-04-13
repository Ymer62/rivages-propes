<?php

if(ADMIN){
  $cat = isset($_POST['cat']) ? $_POST['cat'] : '';

  if($cat){
    $pos_cat = $db->row('SELECT pos_cat FROM team WHERE cat=:cat', array('cat' => $cat));
    $pos_cat = $pos_cat['pos_cat'];

    if($pos_cat != 1){
      $db->query('UPDATE team SET pos_cat=pos_cat+1 WHERE pos_cat=:posUp',
      array('posUp' => $pos_cat - 1));

      $db->query('UPDATE team SET pos_cat=pos_cat-1 WHERE cat=:cat',
      array('cat' => $cat));
    }
  }

  include 'templates/members.tpl.php';
}

?>
