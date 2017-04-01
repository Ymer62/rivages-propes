<?php

if(ADMIN){
  // File
  if(isset($_FILES['formEditMemberAvatar']['tmp_name'])){
    $fileTmpName = $_FILES['formEditMemberAvatar']['tmp_name'];
    $fileName = $_FILES['formEditMemberAvatar']['name'];
    $fileType = $_FILES['formEditMemberAvatar']['type'];

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

    if(isset($_FILES['formEditMemberAvatar']['tmp_name']))
    $newName = md5(rand()) . $ext;
  }
  else
  $fileTmp = '';

  $cat = isset($_POST['formEditMemberCat']) ? strtolower($_POST['formEditMemberCat']) : '';
  $name = isset($_POST['formEditMemberName']) ? $_POST['formEditMemberName'] : '';
  $email = isset($_POST['formEditMemberEmail']) ? $_POST['formEditMemberEmail'] : '';
  $job = isset($_POST['formEditMemberJob']) ? $_POST['formEditMemberJob'] : '';
  $id = isset($_POST['id']) ? $_POST['id'] : '';

  if($cat && $name && $job && $id){
    $last_avatar = $db->row('SELECT avatar FROM team WHERE id=:id', array('id' => $id));
    $last_avatar = $last_avatar['avatar'];

    if(!$fileTmpName)
    $avatar = $last_avatar;
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

      if($last_avatar && $last_avatar != 'avatar_placeholder.jpg')
      unlink('img/team/' . $last_avatar);
    }

    $pos_cat = $db->row('SELECT pos_cat FROM team WHERE cat=:cat', array('cat' => $cat));
    if($pos_cat['pos_cat'])
    $pos_cat = $pos_cat['pos_cat'];
    else{
      $pos_cat = $db->row('SELECT pos_cat FROM team ORDER BY pos_cat DESC');
      $pos_cat = $pos_cat['pos_cat'] ? $pos_cat['pos_cat'] + 1 : 1;
    }

    $db->query('UPDATE team SET
                cat=:cat,name=:name,email=:email,pos_cat=:pos_cat,job=:job,avatar=:avatar
                WHERE id=:id',
    array(
      'cat' => $cat,
      'name' => $name,
      'email' => $email,
      'pos_cat' => $pos_cat,
      'job' => $job,
      'avatar' => $avatar,
      'id' => $id
    ));

    include 'templates/members.tpl.php';
  }
  else
  echo 'KO';
}

?>
