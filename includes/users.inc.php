<?php

// Sessions
session_start();

// Check connected
define('ADMIN', (isset($_SESSION['admin']) && empty($_GET['preview'])) ? true : false);

?>
