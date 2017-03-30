<div class="candidate col s8 offset-s2">

<?php
if(ADMIN):
?>
  <h1 data-page="<?= PAGE ?>">
    <span contenteditable="true">
      <?php echo $pageData['title'] ?>
    </span>
    <i class="small material-icons editTitle" style="display:none">mode_edit</i>
  </h1>
<?php
else:
?>
  <h1><?= $pageData['title'] ?></h1>
<?php
endif;
?>

<div class="candidate">

<form class="col s6" action="" method="get">
  <p>
    <label for="prenom" >Prénom :</label>
    <input name="prenom" id="prenom" type="text"/>
  </p>
    <p>
    <label for="nom" >Nom : </label>
    <input name="nom" id="nom" type="text"/>
  </p>
  <p>
  <label for="age" class="left">Age(JJ/MM/AAAA) : </label>
  <input name="age" id="age" type="text"/>
</p>
  <p>
  <label for="mail" class="left">E-mail : </label>
  <input name="mail" id="mail" type="email"/>
</p>
<p>
<label for="cv" class="left">Piece jointe(CV) : </label>
<input name="cv" id="cv" type="file"/>
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
    <input name="matin" id="jeudi" type="checkbox" /><label for="jeudi">Matin</label>
    <input name="apres-midi" id="vendredi" type="checkbox" /><label for="vendredi">Apres-midi</label>
  </p>

  <p>
    <label for="commentaires" class="left">Commentaires : </label>
    <textarea name="commentaires" id="commentaires"/></textarea>
  </p>
  </form>

</div>

<?php

$debug->arr(array('$pageData' => $pageData));

?>
