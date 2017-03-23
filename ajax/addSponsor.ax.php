<?php

if(ADMIN){

  // Add
  if(isset($_FILES['formSponsor']['tmp_name'])){

    // Alt
    $alt = isset($_POST['formSponsorAlt']) ? $_POST['formSponsorAlt'] : '';

    // File
    $fileTmpName = $_FILES['formSponsor']['tmp_name'];
    $fileType = $_FILES['formSponsor']['type'];
    $fileName = $_FILES['formSponsor']['name'];
    $fileSize = $_FILES['formSponsor']['size'];

    $path = 'img/sponsors/';

    switch ($fileType){
      case
        'image/jpeg': $ext = '.jpg';
        $src = imagecreatefromjpeg($fileTmpName);
      break;
      case
        'image/jpg': $ext = '.jpg';
        $src = imagecreatefromjpeg($fileTmpName);
      break;
      case
        'image/gif': $ext = '.gif';
        $src = imagecreatefromgif($fileTmpName);
      break;
      case
        'image/png': $ext = '.png';
        $src = imagecreatefrompng($fileTmpName);
      break;
      default: unset($_FILES); break;
    }

    $newName = md5(rand()) . $ext;

    // Upload
    if(isset($_FILES['formSponsor']['tmp_name'])){
      list($width,$height)=@getimagesize($fileTmpName);

      $newheight = 75;
      $newwidth = ($width / $height) * $newheight;
      $tmp = imagecreatetruecolor($newwidth, $newheight);

      imagealphablending($tmp, false);
      imagesavealpha($tmp, true);

      $trans_layer_overlay = imagecolorallocatealpha($tmp, 220, 220, 220, 127);
      imagefill($tmp, 0, 0, $trans_layer_overlay);

      imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

      $dest = $path . $newName;

      switch ($fileType){
        case 'image/jpeg': imagejpeg($tmp, $dest, 100); break;
        case 'image/jpg': imagejpeg($tmp, $dest, 100); break;
        case 'image/gif': imagegif($tmp, $dest, 100); break;
        case 'image/png': imagepng($tmp, $dest, 9); break;
      }

      imagedestroy($src);
      imagedestroy($tmp);

      // if(move_uploaded_file($fileTmpName, $path . $newName)){
        $db->query('INSERT INTO sponsors(img, alt) value(:img, :alt)',
        array(
          'img' => $newName,
          'alt' => $alt
        ));

        $arr = array($db->lastInsertId(), $newName, $alt);
        echo json_encode($arr);
      // }
    }
    else
    echo 'KO';
  }
  else
  echo 'KO';

}

?>
