<div class="container" id="historique">

    <div class="row">
        <div class="col s12">
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
            <p>
                <?= $pageData['text'] ?>
            </p>
        </div>

    </div>

    <?php
      $historic = $db->query('SELECT * FROM historic ORDER BY year');
      foreach ($historic as $data):
    ?>
        <div class="row">
            <div class="col s1 year">
                <p><?= $data['year'] ?></p>
            </div>
            <div class="col s1 line">
                <div></div><div></div>
            </div>
            <div class="col s10 content">
                <h3><?= $data['title'] ?></h3>
                <p><?= $data['text'] ?></p>
            </div>
        </div>
    <?php
      endforeach;
    ?>
    <div class="row">
        <div class="col s1 year"><p style="right: -8px; top: -18px">Aujourd'hui</p></div>
        <div class="col s1 line">
            <div></div>
        </div>
        <div class="content"></div>
    </div>
</div>

<script type="text/javascript">
    var rows = document.querySelectorAll('#historique .row');
    var divs = document.querySelectorAll('#historique .col.s1');
    var contents = document.querySelectorAll('#historique .content');
    var heights = [];
    // On boucle sur chacune des rows (on enlève 1 à cause de celle contenant le titre)
    for (var i = 0; i < rows.length-1; i++) {
        // On récupère la hauteur du texte sur cette row
        heights[i] = contents[i].clientHeight;
        // On récupère les autres divs contenues dans cette row
        var divs = rows[i+1].querySelectorAll('.col.s1');
        // On boucle sur chacune de ces divs pour leur appliquer la hauteur du texte+20px
        for (var j = 0; j < divs.length; j++) {
            divs[j].style.height = heights[i]+20+'px';
        }
    }
</script>

<?php

$debug->arr(array('$pageData' => $pageData));

?>
