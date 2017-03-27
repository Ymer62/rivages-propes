<?php

// Path
class path{
  public function link($page, $data = true){
    $preview = G_preview ? '&preview=true' : '';

    if(!$page)
    return './' . $preview;
    else if(REWRITING && !$preview)
    return (!$data ? 'form-' : '') . $page;
    else
    return 'index.php?page=' . $page . (!$data ? '&noData=true' : '') . $preview;
  }
}

$path = new path();

?>
