<?php

if(ADMIN){

  $cat = isset($_POST['formEditMemberCat']) ? strtolower($_POST['formEditMemberCat']) : '';
  $name = isset($_POST['formEditMemberName']) ? $_POST['formEditMemberName'] : '';
  $email = isset($_POST['formEditMemberEmail']) ? $_POST['formEditMemberEmail'] : '';
  $job = isset($_POST['formEditMemberJob']) ? $_POST['formEditMemberJob'] : '';
  $id = isset($_POST['id']) ? $_POST['id'] : '';

  if($cat && $name && $job && $id){
    $last_avatar = $db->row('SELECT avatar FROM team WHERE id=:id', array('id' => $id));
    $last_avatar = $last_avatar['avatar'];

    $avatar = $upload->img($_FILES['formEditMemberAvatar'], 'img/team/', false, 270);
    if($avatar != 'errorFile' && $avatar != 'errorExt'){
      if($last_avatar && $last_avatar != 'avatar_placeholder.jpg')
      unlink('img/team/' . $last_avatar);
    }
    else
    $avatar = $last_avatar;

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
