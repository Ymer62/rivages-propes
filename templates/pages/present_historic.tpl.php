<?php

$histoQuery = $db->query("SELECT * FROM page_present_historic WHERE id>1 ORDER BY year");

?>

<div class="container" id="historique">

    <div class="row">
        <h1><?php echo $pageData['title'] ?></h1>
        <p>
            <?php echo $pageData['text'] ?>
        </p>
    </div>

    <?php

    for ($i=0; $i < count($histoQuery); $i++) {
        echo '<div class="row">';
            echo '<div class="col s1 year">';
                echo '<p>'.$histoQuery[$i]['year'].'</p>';
            echo '</div>';
            echo '<div class="col s1 line">';
                echo '<div></div><div></div>';
            echo '</div>';
            echo '<div class="col s10 content">';
                echo '<h3>'.$histoQuery[$i]['title'].'</h3>';
                echo '<p>'.$histoQuery[$i]['text'].'</p>';
            echo '</div>';
        echo '</div>';
    }

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

$debug->arr(array(
    '$pageData' => $pageData,
    '$histoQuery' => $histoQuery
));

?>
