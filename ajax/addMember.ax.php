<?php

if(ADMIN){
  // File
  if(isset($_FILES['formAddMemberAvatar']['tmp_name'])){
    $fileTmpName = $_FILES['formAddMemberAvatar']['tmp_name'];
    $fileName = $_FILES['formAddMemberAvatar']['name'];
    $fileType = $_FILES['formAddMemberAvatar']['type'];

    $path = 'img/team/';

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

    if(isset($_FILES['formAddMemberAvatar']['tmp_name']))
    $newName = md5(rand()) . $ext;
  }
  else
  $fileTmp = '';

  $cat = isset($_POST['formAddMemberCat']) ? strtolower($_POST['formAddMemberCat']) : '';
  $name = isset($_POST['formAddMemberName']) ? $_POST['formAddMemberName'] : '';
  $email = isset($_POST['formAddMemberEmail']) ? $_POST['formAddMemberEmail'] : '';
  $job = isset($_POST['formAddMemberJob']) ? $_POST['formAddMemberJob'] : '';

  if($cat && $name && $job){
    if(!$fileTmpName)
    $avatar = 'avatar_placeholder.jpg';
    else{
      list($width,$height)=@getimagesize($fileTmpName);

      $newheight = 270;
      $newwidth = ($width / $height) * $newheight;
      $tmp = imagecreatetruecolor($newwidth, $newheight);

      imagealphablending($tmp, false);
      imagesavealpha($tmp, true);

      $trans_layer_overlay = imagecolorallocatealpha($tmp, 220, 220, 220, 127);
      imagefill($tmp, 0, 0, $trans_layer_overlay);

      imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

      $dest = $path . $newName;
      $avatar = $newName;

      switch ($fileType){
        case 'image/jpeg': imagejpeg($tmp, $dest, 100); break;
        case 'image/jpg': imagejpeg($tmp, $dest, 100); break;
        case 'image/gif': imagegif($tmp, $dest, 100); break;
        case 'image/png': imagepng($tmp, $dest, 9); break;
      }

      imagedestroy($src);
      imagedestroy($tmp);
    }
    $pos_cat = $db->row('SELECT pos_cat FROM team WHERE cat=:cat', array('cat' => $cat));
    if($pos_cat['pos_cat'])
    $pos_cat = $pos_cat['pos_cat'];
    else{
      $pos_cat = $db->row('SELECT pos_cat FROM team ORDER BY pos_cat DESC');
      $pos_cat = $pos_cat['pos_cat'] ? $pos_cat['pos_cat'] + 1 : 1;
    }

    $db->query('INSERT INTO team(cat,name,email,pos_cat,job,avatar)
                            value(:cat,:name,:email,:pos_cat,:job,:avatar)',
    array(
      'cat' => $cat,
      'name' => $name,
      'email' => $email,
      'pos_cat' => $pos_cat,
      'job' => $job,
      'avatar' => $avatar
    ));

    include 'templates/members.tpl.php';
  }
  else
  echo 'KO';
}

?>
