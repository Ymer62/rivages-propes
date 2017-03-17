<?php

// Connexion
require("connect/Db.class.php");

// Users
include 'includes/users.inc.php';

// Dispatcher
include 'includes/dispatcher.inc.php';

// header
include 'includes/header.inc.php';

// Navbar
include 'includes/navbar.inc.php';

// Display message flash
include 'includes/flash.inc.php';

// Content
include 'pages/' . $pageName . '.php';

// Footer
include 'includes/footer.inc.php';

?>
