<?php

function delGallery($id){
  global $db;

  $elm = $db->row('SELECT * FROM gallery WHERE id=:id', array('id' => $id));
  unlink('img/gallery/' . $elm['img']);

  $db->query('DELETE FROM gallery WHERE id=:id', array('id' => $id));

  if($elm['directory']){
    $subElm = $db->query('SELECT * FROM gallery WHERE id_gallery=:id_gallery', array('id_gallery' => $elm['id']));

    foreach ($subElm as $data) {
      if($data['directory'])
      delGallery($data['id']);
      else{
        unlink('img/gallery/' . $data['img']);

        $db->query('DELETE FROM gallery WHERE id=:id', array('id' => $data['id']));
      }
    }
  }
}

if(ADMIN){
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    delGallery($_POST['id']);

    $id_gallery = $_POST['id_gallery'];
    include 'templates/gallery.tpl.php';
  }
  else
  echo 'KO';
}

?>
