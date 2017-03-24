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
</div>

<?php

$debug->arr(array('$pageData' => $pageData));

?>
