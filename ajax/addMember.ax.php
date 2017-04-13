<?php

if(ADMIN){

  $cat = isset($_POST['formAddMemberCat']) ? strtolower($_POST['formAddMemberCat']) : '';
  $name = isset($_POST['formAddMemberName']) ? $_POST['formAddMemberName'] : '';
  $email = isset($_POST['formAddMemberEmail']) ? $_POST['formAddMemberEmail'] : '';
  $job = isset($_POST['formAddMemberJob']) ? $_POST['formAddMemberJob'] : '';

  if($cat && $name && $job){
    $avatar = $upload->img($_FILES['formAddMemberAvatar'], 'img/team/', false, 270);

    if($avatar != 'errorFile' && $avatar != 'errorExt'){

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
  else
  echo 'KO;';

}

?>
