<?php

if(ADMIN){
  if(isset($_POST['page'])){
    $head_title = isset($_POST['head_title']) ? $_POST['head_title'] : '';
    $head_meta_desc = isset($_POST['head_meta_desc']) ? $_POST['head_meta_desc'] : '';
    $links = isset($_POST['links']) ? $_POST['links'] : '';
    $links_hover = isset($_POST['links_hover']) ? $_POST['links_hover'] : '';
    $links_active = isset($_POST['links_active']) ? $_POST['links_active'] : '';
    $buttons = isset($_POST['buttons']) ? $_POST['buttons'] : '';
    $buttons_hover = isset($_POST['buttons_hover']) ? $_POST['buttons_hover'] : '';
    $buttons_active = isset($_POST['buttons_active']) ? $_POST['buttons_active'] : '';
    $buttons_text = isset($_POST['buttons_text']) ? $_POST['buttons_text'] : '';
    $titles = isset($_POST['titles']) ? $_POST['titles'] : '';

    // Metas
    if ($head_title || $head_meta_desc)
    $db->query('UPDATE page_'.$_POST['page'].' SET
      head_title=:head_title,
      head_meta_desc=:head_meta_desc',

      array(
        'head_title' => $head_title,
        'head_meta_desc' => $head_meta_desc
      )
    );

    // Custom
    $db->query('UPDATE custom SET
      c_links=:links,
      c_links_hover=:links_hover,
      c_links_active=:links_active,
      c_buttons=:buttons,
      c_buttons_hover=:buttons_hover,
      c_buttons_active=:buttons_active,
      c_buttons_text=:buttons_text,
      c_titles=:titles',

      array(
        'links' => $links,
        'links_hover' => $links_hover,
        'links_active' => $links_active,
        'buttons' => $buttons,
        'buttons_hover' => $buttons_hover,
        'buttons_active' => $buttons_active,
        'buttons_text' => $buttons_text,
        'titles' => $titles
      )
    );

    echo 'OK';
  }
  else
  echo 'KO';
}

?>
