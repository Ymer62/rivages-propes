<?php

// Display message flash
if (isset($_SESSION['flash'])){
  include 'templates/flash.tpl.php';
  $_SESSION['flash'] = '';
}

?>
