<?php

// Connexion
require("connect/Db.class.php");

// Users
include 'includes/users.inc.php';

// Debug
include 'includes/debug.inc.php';

// Forms
include 'includes/forms.inc.php';

// Dispatcher
include 'includes/dispatcher.inc.php';

// header
include 'templates/header.tpl.php';

// Navbar
include 'templates/navbar.tpl.php';

// Display message flash
include 'includes/flash.inc.php';

// Content
include 'templates/pages/' . $pageName . '.tpl.php';

// Footer
include 'templates/footer.tpl.php';

?>
