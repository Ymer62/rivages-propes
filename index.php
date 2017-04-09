<?php


// ------------------------------------
// BACK-END ---------------------------
// ------------------------------------

// Connexion
require("connect/Db.class.php");

// Config
include 'includes/config.inc.php';

// Get
include 'includes/get.inc.php';

// Path
include 'includes/path.inc.php';

// Users
include 'includes/users.inc.php';

// Debug
include 'includes/debug.inc.php';

// Forms
include 'includes/forms.inc.php';

// Upload
include 'includes/upload.inc.php';

// Dispatcher
include 'includes/dispatcher.inc.php';

// ------------------------------------
// FRONT-END --------------------------
// ------------------------------------

// Header
include 'templates/header.tpl.php';

// Navbar
include 'templates/navbar.tpl.php';

// Display message flash
include 'templates/flash.tpl.php';

// Content
include 'templates/pages/' . PAGE . '.tpl.php';

// Admin bar
include 'templates/adminBar.tpl.php';

// Footer
include 'templates/footer.tpl.php';

?>
