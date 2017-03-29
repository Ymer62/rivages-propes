<?php
// Home sliders
$slides = $db->query("SELECT * FROM home_sliders");
?>
<div class="container full">
    <div class="row">
        <div class="carousel carousel-slider center" data-indicators="false">
          <?php if(ADMIN): ?>
          <div class="editRight">
            <i id="addSlide" class="small material-icons">add_circle</i>
            <i id="editSlide" class="small material-icons">mode_edit</i>
            <i id="deleteSlide" class="small material-icons">delete</i>
          </div>
          <i id="slideNext" class="medium material-icons navCar">keyboard_arrow_right</i>
          <i id="slidePreview" class="medium material-icons navCar">keyboard_arrow_left</i>
          <?php
            endif;
          ?>
          <div class="carousel-fixed-item center">
              <!-- Fixed content, visible sur toutes les slides -->
          </div>
          <?php
            foreach ($slides as $slide):
          ?>
          <div data-id="<?= $slide['id'] ?>" class="carousel-item" <?= ($slide['slide'] ? 'style="background-image:url(\'img/homeSliders/'. $slide['slide'] .'\');"' : '') ?>>
            <div class="valign-wrapper slideContainer">
              <div class="slideContainerCenter">
                <?= $slide['content'] ?>
              </div>
            </div>
          </div>
          <?php
            endforeach;
          ?>
        </div>
    </div>
</div>

<div class="container" id="home">
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
            <button data-box="boxEditText" id="btnSubmitText" class="btnTextAdmin waves-effect waves-light btn white-text grey darken-4 right">
              <i class="small material-icons right">mode_edit</i>
              Appliquer
            </button>
            <!-- <div class="editorAir" id="airFirst">
               <h2 id="title">Air Mode</h2>
            </div> -->
          <?php
          else:
          ?>
            <h1><?= $pageData['title'] ?></h1>
            <p class="flow-text"><?= $pageData['text'] ?></p>
          <?php
          endif;
          ?>
        </div>
        <div class="col s5 offset-s1 m2 offset-m4">
            <a href="<?= $path->link('presentation-historique') ?>"><button type="button" class="btn waves-effect center-block">Historique</button></a>
        </div>
        <div class="col s5 m2">
            <a href="<?= $path->link('presentation-equipe') ?>"><button type="button" class="btn waves-effect center-block">Equipe</button></a>
        </div>
    </div>
</div>

<?php
// Modal sliders
if(ADMIN)
include 'templates/modal/adminSlides.tpl.php';
?>

<script src="js/home.min.js" type="text/javascript"></script>
<?php if(ADMIN): ?>
<script src="js/homeAdmin.min.js" type="text/javascript"></script>
<?php else: ?>
<script type="text/javascript">carouselPlay();</script>
<?php endif; ?>

<?php

$debug->arr(array('$pageData' => $pageData));

?>
