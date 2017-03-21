<?php

// Logout
unset($_SESSION['admin']);
// $_SESSION['flash'] = 'Vous avez bien été déconnecté !';
header('Location:./');

?>
