
<div class="container" id="accompagnement">

  <div class="row">
    <div class="col s12">
      <div class=" col l6 offset-l3 title">
        <?php
        if(ADMIN):
        ?>
          <h1 data-page="<?= PAGE ?>">
            <span contenteditable="true">
              <?php echo $pageData['title'] ?>
            </span>
            <i class="small material-icons editTitle">mode_edit</i>
          </h1>
        <?php
        else:
        ?>
          <h1><?= $pageData['title'] ?></h1>
        <?php
        endif;
        ?>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col s12 ">
      <div class=" row one">
        <img class="materialboxed" width="650" id="imgRdv" src="img/placeholder.jpg" alt="Rendez-vous avec un conseiller">
        <p>Un accompagnement personnalisé permet à chaque salarié de travailler son projet. <br>Ce travail s’appuie sur les attitudes et les compétences acquises sur le chantier et des actions de formation interne et externe (”Sauveteur Secouriste du Travail”, “Prévention des Risques liés à l’Activité Physique”, “Utilisateur d’échafaudage”). Une PMSMP (Période de Mise en Situation en Milieu Professionnel) doit être obligatoirement effectuée par chaque salarié en insertion pour vérifier la cohérence du projet et envisager la suite du parcours.</p>
          <img class="materialboxed" width="650" id="imgchantier" src="img/placeholder.jpg" alt="">
          <p> L’objectif est de rendre le salarié acteur de ses démarches et faire en sorte qu’il soit capable de les poursuivre à l’issue du contrat, sur du long terme.<p>
      </div>

    </div>
  </div>

</div>



<?php

$debug->arr(array('$pageData' => $pageData));

?>
