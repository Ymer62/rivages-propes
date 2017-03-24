<div class="container" id="mobilite-douce">

  <div class="row">
    <div class="col s12 ">
      <div class="  col l6 offset-l3 title">
        <?php
        if(ADMIN):
        ?>
          <h3 data-page="<?= PAGE ?>">
            <span contenteditable="true">
              <?php echo $pageData['title'] ?>
            </span>
            <i class="small material-icons editTitle">mode_edit</i>
          </h3>
        <?php
        else:
        ?>
          <h3><?= $pageData['title'] ?></h3>
        <?php
        endif;
        ?>
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col l3 m4 s12 ">
        <img class="materialboxed" width="650" id="" src="img/Mobilité-douce/_DSC0990.JPG" alt="">
      </div>

      <div class="col l3 m4 s12 ">
        <img class="materialboxed" width="650" id="" src="img/Mobilité-douce/_DSC0994r.jpg" alt="">
      </div>
      <div class="col l3 m4 s12 ">
        <img class="materialboxed" width="650" id="" src="img/Mobilité-douce/_DSC0999.JPG" alt="">
      </div>
      <div class="col l3 m4 s12">
        <img class="materialboxed" width="650" id="" src="img/Mobilité-douce/IMG_2703.JPG" alt="">
      </div>
  </div>


</div>



<?php

$debug->arr(array('$pageData' => $pageData));

?>
