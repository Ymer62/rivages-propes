<?php

// Path
class path{
  public function link($page, $data = true){
    if(!$page)
    return './';
    else if(REWRITING)
    return (!$data ? 'form-' : '') . $page;
    else
    return 'index.php?page=' . $page . (!$data ? '&noData=true' : '');
  }
}

$path = new path();

?>
