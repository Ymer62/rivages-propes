<?php

if(ADMIN){
  $sponsorImg = $upload->img($_FILES['formSponsor'], 'img/sponsors/', false, 75);

  if($sponsorImg != 'errorFile' && $sponsorImg != 'errorExt'){
    $alt = isset($_POST['formSponsorAlt']) ? $_POST['formSponsorAlt'] : '';

    $db->query('INSERT INTO sponsors(img, alt) value(:img, :alt)',
    array(
      'img' => $sponsorImg,
      'alt' => $alt
    ));

    $arr = array($db->lastInsertId(), $sponsorImg, $alt);
    echo json_encode($arr);
  }
  else
  echo 'KO';
}

?>
