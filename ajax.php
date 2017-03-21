<?php

// Connexion
require("connect/Db.class.php");

// Config
include 'includes/config.inc.php';

// Users
include 'includes/users.inc.php';

// Forms
include 'includes/forms.inc.php';

// Content
if(isset($_GET['ajax']) && preg_match('#[a-zA-Z\-]+#', $_GET['ajax']))
include 'ajax/' . $_GET['ajax'] . '.ax.php';

?>
