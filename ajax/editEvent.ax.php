<?php

if(ADMIN){

  $id = isset($_POST['id']) ? $_POST['id'] : '';
  $uploadFile = false;

  // Upload
  if(isset($_FILES['formEditEventImg']['tmp_name']) &&
     $_FILES['formEditEventImg']['tmp_name'] != ''){
    $uploadImg = $upload->img($_FILES['formEditEventImg'], 'img/events/', 440, 680);
    $uploadImgMin = $upload->img($_FILES['formEditEventImg'], 'img/events/min/', 132, 204);
    $uploadFile = true;

    $lastImg = $db->row('SELECT img, img_min FROM events WHERE id=:id', array('id' => $id));
    unlink('img/events/' . $lastImg['img']);
    unlink('img/events/min/' . $lastImg['img_min']);
  }

  if(($uploadFile &&
    ($uploadImg != 'errorFile' && $uploadImg != 'errorExt' &&
     $uploadImgMin != 'errorFile' && $uploadImgMin != 'errorExt'))
     || !$uploadFile){

   $title = isset($_POST['formEditEventTitle']) ? $_POST['formEditEventTitle'] : '';
   $text = isset($_POST['text']) ? $_POST['text'] : '';
   $date = isset($_POST['formEditEventDate']) ? $_POST['formEditEventDate'] : '';
   $date = explode('/', $date);
   $date = $date[2] . '-' . $date[1] . '-' . $date[0];

   if(!$title || !$text || !preg_match('#[0-9]{4}-[0-9]{2}-[0-9]{2}#', $date)){
     echo 'KO';
     return;
   }

    if($uploadFile)
    $db->query('UPDATE events SET title=:title, text=:text, img_min=:img_min,
                                       img=:img, date=:date
                                       WHERE id=:id',
    array(
      'title' => $title,
      'text' => $text,
      'img_min' => $uploadImgMin,
      'img' => $uploadImg,
      'date' => $date,
      'id' => $id
    ));
    else
    $db->query('UPDATE events SET title=:title, text=:text,date=:date
                                       WHERE id=:id',
    array(
      'title' => $title,
      'text' => $text,
      'date' => $date,
      'id' => $id
    ));

    include 'templates/events.tpl.php';
  }
  else
  echo 'KO';

}

?>
