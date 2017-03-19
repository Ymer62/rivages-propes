<?php


// ------------------------------------
// BACK-END ---------------------------
// ------------------------------------

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

// ------------------------------------
// FRONT-END --------------------------
// ------------------------------------

// header
include 'templates/header.tpl.php';

// Navbar
include 'templates/navbar.tpl.php';

// Display message flash
include 'templates/flash.tpl.php';

// Content
include 'templates/pages/' . $pageName . '.tpl.php';

// Footer
include 'templates/footer.tpl.php';

?>
