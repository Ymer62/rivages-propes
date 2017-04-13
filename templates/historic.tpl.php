<?php if(ADMIN): ?>
<div class="row">
  <div class="col s12">
    <a href="#historicAdd" class="waves-effect waves-light btn white-text grey darken-4">
      <i class="small material-icons right">add_circle</i>
      Ajouter
    </a>
  </div>
</div>
<?php
  endif;

  $historic = $db->query('SELECT * FROM historic ORDER BY year');
  foreach ($historic as $data):
?>
<div class="row">
    <div class="col s2 year">
        <p><?= $data['year'] ?></p>
    </div>
    <div class="col s10 content">
      <div></div>
      <div></div>
      <?php if(ADMIN): ?>
      <div class="editorAir">
         <?= $data['text'] ?>
      </div>
      <br />
      <i data-id="<?= $data['id'] ?>" class="deleteHistoric small material-icons left">delete</i>
      <button data-id="<?= $data['id'] ?>" class="btnHistoricTextAdmin waves-effect waves-light btn white-text grey darken-4">
        <i class="small material-icons right">mode_edit</i>
        Appliquer
      </button>
      <?php else: ?>
      <?= $data['text'] ?>
      <?php endif; ?>
    </div>
</div>
<?php
  endforeach;
?>
<div class="row">
    <div class="col s2 year">
      <p>Aujourd'hui</p>
    </div>
    <div class="col s10 content">
      <div></div>
    </div>
</div>
