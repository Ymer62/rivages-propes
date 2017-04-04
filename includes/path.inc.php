<?php

// Path
class path{
  public function link($page, $data = true){
    $previewHome = G_preview ? '?preview=true' : '';
    $preview = G_preview ? '&preview=true' : '';

    $designHome = isset($_GET['design']) ? '?design='.$_GET['design'] : '';
    $design = isset($_GET['design']) ? '&design='.$_GET['design'] : '';

    if(!trim($page) || $page == 'home')
    return './' . $previewHome . $designHome;
    else if(REWRITING && !$preview)
    return (!$data ? 'form-' : '') . $page;
    else
    return 'index.php?page=' . $page . (!$data ? '&noData=true' : '') . $preview . $design;
  }
}

$path = new path();

?>
