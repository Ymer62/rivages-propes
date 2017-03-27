<?php

// Sessions
session_start();

// Check connected
define('ADMIN', (isset($_SESSION['admin']) && !G_preview) ? true : false);

?>
