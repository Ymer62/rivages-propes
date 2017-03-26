<div class="container" id="mobilite-douce">
  <div class="row">
    <div class="col s12 ">
      <div class="  col l6 offset-l3 title">
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

    <div class="row">
        <div class="col s12">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col l3 m4 s12">
            <img class="materialboxed" src="img/placeholder.jpg" alt="">
        </div>
        <div class="col l3 m4 s12">
            <img class="materialboxed" src="img/placeholder.jpg" alt="">
        </div>
        <div class="col l3 m4 s12">
            <img class="materialboxed" src="img/placeholder.jpg" alt="">
        </div>
        <div class="col l3 m4 s12">
            <img class="materialboxed" src="img/placeholder.jpg" alt="">
        </div>
    </div>
  </div>
</div>
<?php

$debug->arr(array('$pageData' => $pageData));

?>
