<?php

$teamQuery = $db->query("SELECT * FROM team ORDER BY pos_cat");
foreach($teamQuery as $key => $value)
$team[$value['cat']][$key] = $value;

?>

<?php if(ADMIN): ?>
<div class="row">
  <div class="col s12">
    <a href="#memberAdd" class="waves-effect waves-light btn white-text grey darken-4">
      <i class="small material-icons right">add_circle</i>
      Ajouter
    </a>
  </div>
</div>
<?php
  endif;

  foreach($team AS $cat => $members):
?>
<div class="row">
  <div class="col s12">
    <h4>
      <span><?= ucfirst($cat) ?></span>
      <?php if(ADMIN): ?>
        <i data-cat="<?= $cat ?>" class="small material-icons upCatMember">keyboard_arrow_up</i>
        <i data-cat="<?= $cat ?>" class="small material-icons downCatMember">keyboard_arrow_down</i>
      <?php endif; ?>
    </h4>
    <?php
      foreach($members AS $data):
    ?>
      <div class="col s6 m3 member">
        <h6 class="<?= $data['cat'] ?>"><?= $data['job'] ?></h6>
        <div>
          <?php if(ADMIN): ?>
          <i data-id="<?= $data['id'] ?>" class="small material-icons deleteMember">delete</i>
          <i data-id="<?= $data['id'] ?>" data-email="<?= $data['email'] ?>" class="small material-icons editMember">mode_edit</i>
          <?php endif; ?>
          <img src="img/team/<?= $data['avatar'] ?>" alt="Photo de <?= $data['name'] ?>">
          <p><?= $data['name'] ?></p>
        </div>
      </div>
    <?php
      endforeach;
    ?>
  </div>
</div>
<?php
  endforeach;
?>
