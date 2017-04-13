<?php

if(ADMIN){
  $sponsorImg = $upload->img($_FILES['formSponsor'], 'img/sponsors/', false, 75);

  if($sponsorImg != 'errorFile' && $sponsorImg != 'errorExt'){
    $alt = isset($_POST['formSponsorAlt']) ? $_POST['formSponsorAlt'] : '';
    $idMax = $db->row('SELECT id FROM sponsors ORDER BY id DESC');
    $idMax = $idMax['id'];

    $db->query('INSERT INTO sponsors(img, alt, pos) value(:img, :alt, :pos)',
    array(
      'img' => $sponsorImg,
      'alt' => $alt,
      '' => $idMax + 1
    ));

    include 'templates/sponsors.tpl.php';
  }
  else
  echo 'KO';
}

?>
