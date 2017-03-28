<div class="container" id="environnement">
  <div class="row">
    <div class="col s12 ">
      <div class="  col l6 offset-l3 title">
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

    <div class="row">
        <div class="col s12">
            <p>Le travail de l'association dans la préservation du littoral est reconnu. Elle a pu mettre a profit ses 25 années d'expériences sur les plages lors de formations dispensées en outre-mer, notamment en Guadeloupe, en s'associant avec l'association Rivages de France. Rivages Propres, de par son expérience dans le ramassage manuel et selectif des macrodéchets, a permis la professionnalisation ainsi que la formation de prés de 60 agents sur le tri des déchets. <p>
            <p>A l'échelle locale, l'association poursuit son travail de sensibilisation : </p>
            <p>Elle opère sur les plages, milieux dunaires, coteaux calcaires, milieux humides, cours d'eau, milieux forestiers, sentiers de randonnée, espaces verts. Elle permet le nettoyage des côtes, mais contribue également à l'aménager, par exemple la construction de 60 cabines de plages. Elle illustre la richesse de notre savoir-faire et une envie de développer d'autres supports d'activités.</p>
            <p> En ce sens, Rivages-Propres peut vous aider à concrétiser vos projets. Avec le soutien de plusieurs partenaires financiers investis dans des démarches d'insertion, l'association se rend disponible pour vous accompagner dans la mise en place des chantiers. L'objectif pour notre structure est de maintenir une palette d'activités importante favorisant le retour à l'emploi de nos salariés. </p>
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
</div>
<?php

$debug->arr(array('$pageData' => $pageData));

?>
