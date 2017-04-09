<?php

if(ADMIN){

  // Edit
  if(isset($_POST['id']) && is_numeric($_POST['id'])){
    // Content
    $content = isset($_POST['formSlideContent']) ? $_POST['formSlideContent'] : '';

    // Send new file
    if(isset($_FILES['formSlide']['tmp_name'])){
      $slideImg = $upload->img($_FILES['formSlide'], 'img/homeSliders/', 1024, 768);

      if($slideImg != 'errorFile' && $slideImg != 'errorExt'){
        $lastSlide = $db->row('SELECT slide FROM home_sliders WHERE id=:id', array('id' => $_POST['id']));
        if(isset($lastSlide['slide']))
        unlink('img/homeSliders/' . $lastSlide['slide']);

        $db->query('UPDATE home_sliders set content=:content, slide=:slide WHERE id=:id',
        array(
          'id' => $_POST['id'],
          'slide' => $slideImg,
          'content' => $content
        ));

        echo $slideImg;
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
      $slideImg = $upload->img($_FILES['formSlide'], 'img/homeSliders/', 1024, 768);

      if($slideImg != 'errorFile' && $slideImg != 'errorExt'){
        $db->query('INSERT INTO home_sliders(slide, content) value(:slide, :content)',
        array(
          'slide' => $slideImg,
          'content' => $content
        ));

        $arr = array($db->lastInsertId(), $slideImg);
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
