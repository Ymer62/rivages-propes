<?php

if(ADMIN){

  // Upload
  $uploadImg = $upload->img($_FILES['formEventImg'], 'img/events/', 440, 680);
  $uploadImgMin = $upload->img($_FILES['formEventImg'], 'img/events/min/', 132, 204);

  if($uploadImg != 'errorFile' && $uploadImg != 'errorExt' &&
     $uploadImgMin != 'errorFile' && $uploadImgMin != 'errorExt'){

   $title = isset($_POST['formAddEventTitle']) ? $_POST['formAddEventTitle'] : '';
   $text = isset($_POST['text']) ? $_POST['text'] : '';
   $date = isset($_POST['formAddEventDate']) ? $_POST['formAddEventDate'] : '';
   $date = explode('/', $date);
   $date = $date[2] . '-' . $date[1] . '-' . $date[0];

   if(!$title || !$text || !preg_match('#[0-9]{4}-[0-9]{2}-[0-9]{2}#', $date)){
     echo 'KO';
     return;
   }

    $db->query('INSERT INTO events(title, text, img_min, img, date)
                            value(:title, :text, :img_min, :img, :date)',
    array(
      'title' => $title,
      'text' => $text,
      'img_min' => $uploadImgMin,
      'img' => $uploadImg,
      'date' => $date
    ));

    include 'templates/events.tpl.php';
  }
  else
  echo 'KO';

}

?>
