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

  <div id="members">
  <?php include 'templates/members.tpl.php'; ?>
  </div>

  <?php
  if(ADMIN):
  include 'templates/modal/memberAdd.tpl.php';
  include 'templates/modal/memberEdit.tpl.php';
  ?>
  <script src="js/adminTeam.min.js" type="text/javascript"></script>
  <?php
  endif;
  ?>
</div>


<?php

$debug->arr(array(
  '$pageData' => $pageData,
  '$team' => $team
));

?>
