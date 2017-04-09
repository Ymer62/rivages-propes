
<div class="container" id="accompagnement">

  <div class="row">
    <div class="col s12">
      <?php
      if(ADMIN):
      ?>
        <h1 data-page="<?= PAGE ?>">
          <span contenteditable="true">
            <?= $pageData['title'] ?>
          </span>
          <i class="small material-icons editTitle" style="display:none">mode_edit</i>
        </h1>
        <div class="row">
            <div data-page="<?= PAGE ?>" class="input-field col s12" id="boxEditText">
                <div data-btn="btnSubmitText" class="editor" id="first">
                    <?= $pageData['text'] ?>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col s12">
        <button data-box="boxEditText" id="btnSubmitText" class="btnTextAdmin waves-effect waves-light btn white-text grey darken-4 right">
          <i class="small material-icons right">mode_edit</i>
          Appliquer
        </button>
      </div>
      </div>
      <?php
      else:
      ?>
        <h1><?= $pageData['title'] ?></h1>
        <p class="flow-text"><?= $pageData['text'] ?></p>
      <?php
      endif;
      ?>
    </div>
  </div>

</div>



<?php

$debug->arr(array('$pageData' => $pageData));

?>
