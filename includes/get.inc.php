<?php

// GET page
define('G_id', isset($_GET['id']) ? $_GET['id'] : '');
define('G_page', isset($_GET['page']) ? $_GET['page'] : 'home');
define('G_noData', isset($_GET['noData']) ? $_GET['noData'] : '');
define('G_preview', isset($_GET['preview']) ? $_GET['preview'] : '');

?>
