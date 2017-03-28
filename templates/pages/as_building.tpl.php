<div class="container" id="batiment">
  <div class="row">
    <div class="col s12 ">
      <div class="col l6 offset-l3 title">
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
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col s12">
          <p>Rivages Propres est également investi dans le secteur du bâtiment avec des formations aux travaux de piquetage, remaillage, terrassement, maçonnerie, jointoiement, menuiserie, ...</p>
          <p>Depuis 2007 l'association a permis à la fois la construction de 60 cabines de plages à l'aide de matériaux de qualité leurs garantissants une bonne durabilité, ainsi que l'accompagnement et la formation d'une trentaine de salariés liés à l'activité menuiserie.</p>
            <p>Rivages Propres s'implique dans la préservation du patrimoine. Depuis 10 ans maintenant, les équipes de l'association interviennent sur le chantier-école, lié à la restauration des remparts de Boulogne Sur Mer. Cela souligne l'investissement des salariés en insertion sur les travaux ainsi que la constance des partenaires du chantier qu'ils soient techniques, sociaux ou financiers</p>
            <p> Ces chantiers-écoles peuvent être assimilés à une formation en temps réel sur le terrain ( la meilleur école ), elles sont importantes et apportent de nombreuses compétences. Elles permettent pour la plupart de  mieux appréhender la sécurité sur les chantiers. En 2016 Rivages Propres accompagnent 9 jeunes demandeurs d'emploi à Marquise en rénovant entièrement une maison de quartier</p>
            <p></p>
      </div>
      <div class="col l3 m4 s12">
          <img class="materialboxed" src="img/placeholder.jpg" alt="">
      </div>
      <div class="col l3 m4 s12">
          <img class="materialboxed" src="img/placeholder.jpg" alt="">
      </div>
      <div class="col l3 m4 s12">
          <img class="materialboxed" src="img/placeholder.jpg" alt="">
      </div>
      <div class="col l3 m4 s12">
          <img class="materialboxed" src="img/placeholder.jpg" alt="">
      </div>
  </div>
</div>
<?php

$debug->arr(array('$pageData' => $pageData));

?>
