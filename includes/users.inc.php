<?php

// Sessions
session_start();

// Check connected
define('ADMIN', (isset($_SESSION['admin']) && (!defined('G_preview') || !G_preview)) ? true : false);

?>
