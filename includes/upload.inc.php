<?php

class upload{

  public function img($file, $dest, $maxWidth = false, $maxHeight = false){
    if(isset($file['tmp_name']) && $file['tmp_name'] != ''){

      // File
      $fileTmpName = $file['tmp_name'];
      $fileType = $file['type'];
      $fileName = $file['name'];
      $fileSize = $file['size'];

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
        default: unset($file); break;
      }

      $newName = md5(rand()) . $ext;

      // Upload
      if(isset($file['tmp_name'])){
        list($width,$height)=@getimagesize($fileTmpName);

        if(!$maxWidth && !$maxHeight){
          $newheight = $height;
          $newwidth = $width;
        }
        elseif($maxWidth && !$maxHeight){
          $newwidth = $maxWidth;
          $newheight = ($height / $width) * $newwidth;
        }
        elseif(!$maxWidth && $maxHeight){
          $newheight = $maxHeight;
          $newwidth = ($width / $height) * $newheight;
        }
        else{
          if($width > $height){
            $newwidth = $maxWidth;
            $newheight = ($height / $width) * $newwidth;
          }
          else{
            $newheight = $maxHeight;
            $newwidth = ($width / $height) * $newheight;
          }
        }

        $tmp = imagecreatetruecolor($newwidth, $newheight);

        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);

        $trans_layer_overlay = imagecolorallocatealpha($tmp, 220, 220, 220, 127);
        imagefill($tmp, 0, 0, $trans_layer_overlay);

        imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

        $dest = $dest . $newName;

        switch ($fileType){
          case 'image/jpeg': imagejpeg($tmp, $dest, 100); break;
          case 'image/jpg': imagejpeg($tmp, $dest, 100); break;
          case 'image/gif': imagegif($tmp, $dest, 100); break;
          case 'image/png': imagepng($tmp, $dest, 9); break;
        }

        imagedestroy($src);
        imagedestroy($tmp);

        return $newName;
      }
      return 'errorExt';
    }
    return 'errorFile';
  }

}

$upload = new upload();

?>
