<?php

if(ADMIN){

  // File
  if(isset($_FILES['formSlide']['tmp_name'])){
    $fileTmpName = $_FILES['formSlide']['tmp_name'];
    $fileType = $_FILES['formSlide']['type'];
    $fileName = $_FILES['formSlide']['name'];
    $fileSize = $_FILES['formSlide']['size'];

    $path = 'img/homeSliders/';

    switch ($fileType){
      case 'image/jpeg': $ext = '.jpg'; break;
      case 'image/jpg': $ext = '.jpg'; break;
      case 'image/gif': $ext = '.gif'; break;
      case 'image/png': $ext = '.png'; break;
      case 'image/bmp': $ext = '.bmp'; break;
      default: unset($_FILES); break;
    }
  }

  // Edit
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    // Content
    $content = isset($_POST['formSlideContent']) ? $_POST['formSlideContent'] : '';

    // Send new file
    if(isset($_FILES['formSlide']['tmp_name'])){
      $newName = md5(rand()) . $ext;
      if(move_uploaded_file($fileTmpName, $path . $newName)){
        $lastSlide = $db->row('SELECT slide FROM home_sliders WHERE id=:id', array('id' => $_POST['id']));
        if(isset($lastSlide['slide']))
        unlink($path . $lastSlide['slide']);

        $db->query('UPDATE home_sliders set content=:content, slide=:slide WHERE id=:id',
        array(
          'id' => $_POST['id'],
          'slide' => $newName,
          'content' => $content
        ));

        echo $newName;
      }
    }
    else{
      $db->query('UPDATE home_sliders set content=:content WHERE id=:id',
      array(
        'id' => $_POST['id'],
        'content' => $content
      ));

      echo 'OK';
    }
  }
  // Add
  else{
    // Content
    $content = isset($_POST['formSlideContent']) ? $_POST['formSlideContent'] : '';

    // Send file
    if(isset($_FILES['formSlide']['tmp_name'])){
      $newName = md5(rand()) . $ext;
      if(move_uploaded_file($fileTmpName, $path . $newName)){
        $db->query('INSERT INTO home_sliders(slide, content) value(:slide, :content)',
        array(
          'slide' => $newName,
          'content' => $content
        ));

        $arr = array($db->lastInsertId(), $newName);
        echo json_encode($arr);
      }
    }
    else{
      $db->query('INSERT INTO home_sliders(content) value(:content)', array('content' => $content));

      echo $db->lastInsertId();
    }
  }

}
else
echo 'KO';

?>
