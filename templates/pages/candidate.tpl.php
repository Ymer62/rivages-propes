<?php

$debug->arr(array('$pageData' => $pageData));

?>

<div class="candidate col s8 offset-s2">

<h1>Candidature</h1>
<form action="" method="get">
  <p>
    <label for="prenom" class="left">Prénom :</label>
    <input name="prenom" id="prenom" type="text" size="30" maxlength="30" />
  </p>
    <p>
    <label for="nom" class="left">Nom : </label>
    <input name="nom" id="nom" type="text" size="30" maxlength="30" />
  </p>
  <p>
  <label for="age" class="left">Age(JJ/MM/AAAA) : </label>
  <input name="age" id="age" type="text" size="30" maxlength="30" />
</p>
  <p>
  <label for="mail" class="left">E-mail : </label>
  <input name="mail" id="mail" type="email" size="30" maxlength="30" />
</p>
<p>
<label for="cv" class="left">Piece jointe(CV) : </label>
<input name="cv" id="cv" type="file" size="30" maxlength="30" />
</p>

  <p>
    <label class="left">Votre Disponnibilité :</label>
    <input name="lundi" id="lundi" type="checkbox" /><label for="lundi">Lundi</label>
    <input name="mardi" id="mardi" type="checkbox" /><label for="mardi">Mardi</label>
    <input name="mercredi" id="mercredi" type="checkbox" /><label for="mercredi">Mercredi</label>
    <input name="jeudi" id="jeudi" type="checkbox" /><label for="jeudi">Jeudi</label>
    <input name="vendredi" id="vendredi" type="checkbox" /><label for="vendredi">Vendredi</label>
  </p>

  <p>
    <label for="commentaires" class="left">Commentaires : </label>
    <textarea name="commentaires" id="commentaires" cols="50" rows="5" />
  </p>

</div>
