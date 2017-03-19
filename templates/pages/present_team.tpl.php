<?php

$direction = $db->query("SELECT * FROM team WHERE category='direction'");
$administration = $db->query("SELECT * FROM team WHERE category='administration'");
$insertion = $db->query("SELECT * FROM team WHERE category='insertion'");
$technique = $db->query("SELECT * FROM team WHERE category='technique'");

?>

<div class="container" id="equipe">
    <div class="row">
        <div class="col s12">
            <h1><?php echo $pageData['title'] ?></h1>
        </div>
    </div>

    <!-- Direction -->
    <div class="row">
        <div class="col s12">
            <h4>Direction</h4>
            <?php
            for ($i=0; $i < count($direction); $i++) {
                echo '<div class="col s12 m3">';
                echo '<h6 class="direction">'.$direction[$i]['job'].'</h6>';
                echo '<img src="img/'.$direction[$i]['avatar'].'" alt="Photo de '.$direction[$i]['name'].'">';
                echo '<p>'.$direction[$i]['name'].'</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Administration -->
    <div class="row">
        <div class="col s12">
            <h4>Administration</h4>
            <?php
            for ($i=0; $i < count($administration); $i++) {
                echo '<div class="col s12 m3">';
                echo '<h6 class="administration">'.$administration[$i]['job'].'</h6>';
                echo '<img src="img/'.$administration[$i]['avatar'].'" alt="Photo de '.$administration[$i]['name'].'">';
                echo '<p>'.$administration[$i]['name'].'</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Insertion -->
    <div class="row">
        <div class="col s12">
            <h4>Insertion</h4>
            <?php
            for ($i=0; $i < count($insertion); $i++) {
                echo '<div class="col s12 m3">';
                echo '<h6 class="insertion">'.$insertion[$i]['job'].'</h6>';
                echo '<img src="img/'.$insertion[$i]['avatar'].'" alt="Photo de '.$insertion[$i]['name'].'">';
                echo '<p>'.$insertion[$i]['name'].'</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Technique -->
    <div class="row">
        <div class="col s12">
            <h4>Technique</h4>
            <?php
            for ($i=0; $i < count($technique); $i++) {
                echo '<div class="col s12 m3">';
                echo '<h6 class="technique">'.$technique[$i]['job'].'</h6>';
                echo '<img src="img/'.$technique[$i]['avatar'].'" alt="Photo de '.$technique[$i]['name'].'">';
                echo '<p>'.$technique[$i]['name'].'</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>


<pre>
<?php

echo '<br />$pageData<br />';
var_dump($pageData);

echo '<br />$direction<br />';
print_r($direction);

echo '<br />$administration<br />';
print_r($administration);

echo '<br />$insertion<br />';
print_r($insertion);

echo '<br />$technique<br />';
print_r($technique);


?>
</pre>
