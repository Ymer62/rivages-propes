<div class="candidate col s8 offset-s2">

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


<?php

$debug->arr(array('$pageData' => $pageData));

?>
