<div class="container" id="events">
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
      </div>
  </div>
  <?php if(ADMIN): ?>
  <div class="row">
    <div class="col s12">
      <a href="#eventAdd" class="waves-effect waves-light btn white-text grey darken-4">
        <i class="small material-icons left">add_circle</i>
        Ajouter un événement
      </a>
    </div>
  </div>
  <?php
  endif;
  ?>
  <div id="eventsContent">
      <?php include 'templates/events.tpl.php'; ?>
  </div>
  <div class="row" id="result"></div>
</div>

<?php if(ADMIN): ?>
<script src="js/adminEvents.min.js" type="text/javascript"></script>
<?php
include 'templates/modal/eventAdd.tpl.php';
include 'templates/modal/eventEdit.tpl.php';
endif;
?>
<script src="js/events.min.js" type="text/javascript"></script>

<?php

$debug->arr(array(
  '$pageData' => $pageData,
  '$events' => $events
));

?>
