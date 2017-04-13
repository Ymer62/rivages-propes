<?php

// On récup l'id de l'image qui a été cliquée
$id = isset($_POST['id'])? $_POST['id']:1;
// Et sa source
$src = isset($_POST['src'])? $_POST['src']:'img/placeholderV.png';

// TODO : Faire la requête sur la bdd



// Lorem ipsum temporaire
?>

<div class="col s12 m6">
    <h2>Titre évènement</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
<div class="col s12 m6">
    <img src="<?= $src ?>" alt="" class="center-block materialboxed">
</div>
