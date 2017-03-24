<?php

$teamQuery = $db->query("SELECT * FROM team ORDER BY pos_cat");
foreach($teamQuery as $key => $value)
$team[$value['category']][$key] = $value;

?>

<div class="container" id="equipe">
  <div class="row">
    <div class="col s12">
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

  <?php
    foreach($team AS $cat => $members):
  ?>
  <div class="row">
    <div class="col s12">
      <h4><?= ucfirst($cat) ?></h4>
      <?php
        foreach($members AS $data):
      ?>
        <div class="col s6 m3">
          <h6 class="<?= $data['category'] ?>"><?= $data['job'] ?></h6>
          <img src="img/<?= $data['avatar'] ?>" alt="Photo de <?= $data['name'] ?>">
          <p><?= $data['name'] ?></p>
        </div>
      <?php
        endforeach;
      ?>
    </div>
  </div>
  <?php
    endforeach;
  ?>
</div>


<?php

$debug->arr(array(
  '$pageData' => $pageData,
  '$team' => $team
));

?>
