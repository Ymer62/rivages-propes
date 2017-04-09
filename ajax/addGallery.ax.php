<?php

if(ADMIN){
  // Upload
  $uploadImg = $upload->img($_FILES['formGalleryImg'], 'img/gallery/', false, 600);

  if($uploadImg != 'errorFile' && $uploadImg != 'errorExt'){

   $id_gallery = isset($_POST['id']) ? $_POST['id'] : '';
   $name = isset($_POST['formGalleryName']) ? $_POST['formGalleryName'] : '';
   $directory = isset($_POST['formGalleryType']) ? $_POST['formGalleryType'] : '';

    $db->query('INSERT INTO gallery(id_gallery, name, directory, img)
                            value(:id_gallery, :name, :directory, :img)',
    array(
      'id_gallery' => $id_gallery,
      'name' => $name,
      'directory' => $directory,
      'img' => $uploadImg
    ));

    include 'templates/gallery.tpl.php';
  }
  else
  echo 'KO';

}

?>
