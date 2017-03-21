<div class="container full">
    <div class="row<?= (ADMIN ? ' editDispRight' : '') ?>">
        <?php if(ADMIN): ?>
        <div class="editRight">
          <i id="addSlide" class="small material-icons">add_circle</i>
          <i id="editSlide" class="small material-icons">mode_edit</i>
          <i id="deleteSlide" class="small material-icons">delete</i>
        </div>
        <?php endif; ?>
        <div class="carousel carousel-slider center" data-indicators="false">
          <?php
            $slides = $db->query("SELECT * FROM home_sliders");
          ?>
          <div class="carousel-fixed-item center">
              <!-- Fixed content, visible sur toutes les slides -->
          </div>
          <?php
            foreach ($slides as $slide):
          ?>
          <div data-id="<?= $slide['id'] ?>" class="carousel-item" <?= ($slide['slide'] ? 'style="background-image:url(\'img/homeSliders/'. $slide['slide'] .'\');"' : '') ?>>
              <?= $slide['content'] ?>
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
            <h1><?php echo $pageData['title'] ?></h1>
            <p class="flow-text"><?php echo $pageData['text'] ?></p>
        </div>
        <div class="col s5 offset-s1 m2 offset-m4">
            <a href="<?= $path->link('presentation-historique') ?>"><button type="button" class="btn waves-effect center-block">Historique</button></a>
        </div>
        <div class="col s5 m2">
            <a href="<?= $path->link('presentation-equipe') ?>"><button type="button" class="btn waves-effect center-block">Equipe</button></a>
        </div>
    </div>
</div>

<?php if(ADMIN): ?>
<!-- Modal sliders -->
<div id="sliders" class="modal">
  <div class="modal-content">
    <h4>Modifier</h4>
    <div class="row">
      <form enctype="multipart/form-data" class="col s12">
        <div class="row">
          <div class="file-field input-field">
            <div class="btn">
              <span>Image</span>
              <input name="formSlide" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="">
            </div>
          </div>
          <div class="input-field col s12">
            <textarea name="formSlideContent" id="formSlideContent" class="materialize-textarea"></textarea>
            <label class="active" for="formSlideContent">Contenu</label>
          </div>
        </div>
        <input type="hidden" name="id">
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a id="btnSubmitSlide" href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Appliquer</a>
  </div>
</div>

<!-- Progress Bar -->
<div id="progress" class="modal">
  <div class="modal-content">
    <progress class="progr"></progress>
  </div>
</div>
<?php endif; ?>

<script type="text/javascript">

  // Carousel
  $('.carousel.carousel-slider').carousel({fullWidth: true});
  var timerCarousel;
  function carouselPlay(){
    timerCarousel = setInterval(function() { $('.carousel').carousel('next'); }, 3500);
  }
  carouselPlay();

  <?php
  if(ADMIN):
  ?>
  $(document).ready(function(){

    // Progress bar
    function progressBar(e){
      if(e.lengthComputable)
      $('progress').attr({value:e.loaded,max:e.total});
    }

    // Modal carousel
    $('.modal').modal();

    // Delete slide
    $('#deleteSlide').click(function(){
      var dialog =  confirm('Voulez-vous vraiment supprimer cette élément du carousel ?');

      if(dialog) {
        var id = $('.carousel .active').data('id');

        $.ajax({
          type: "POST",
          url: 'ajax.php?ajax=deleteHomeSlide',
          data: {id:id},
          success: function(data,textStatus,jqXHR){
            if(data == 'OK')
            location.reload();
          }
        });
      }
    });

    // Edit slide
    $('#editSlide').click(function(){
      $('#sliders input[type="file"]').attr('placeholder', 'Laissez vide pour ne pas modifier l\'image');
      $('#sliders label').addClass('active');
      $('#sliders input[type="hidden"]').val($('.carousel .active').data('id'));

      clearInterval(timerCarousel);
      var content = $('.carousel .active').html().trim();

      $('#sliders textarea').val(content);
      $('#sliders').modal('open');
    });

    // Add slide
    $('#addSlide').click(function(){
      $('#sliders input[type="file"]').attr('placeholder', '');
      $('#sliders textarea').val('');
      $('#sliders input[type="hidden"]').val('');
      $('#sliders label').removeClass('active');
      $('#sliders').modal('open');
    });

    // Submit slide
    $('#btnSubmitSlide').click(function(){
      var id = $(this).data('id');
      var formSlideContent = $('#formSlideContent').val();
      formSlide = $('#formSlide').val();

      var formData = new FormData($('form')[0]);
      $.ajax({
        url:'ajax.php?ajax=homeSlide',
        type:'POST',
        xhr: function() {
          myXhr = $.ajaxSettings.xhr();
          if(myXhr.upload)
          myXhr.upload.addEventListener('progress',progressBar, false);

          return myXhr;
        },

        beforeSend:function(){ $('#progress').modal('open'); },
        success:function(){ $('#progress').modal('close') },
        error:{},
        data:formData,
        cache:false,
        contentType:false,
        processData:false
      });
    });

    // Close modal
    $('#sliders').modal({complete: function() { carouselPlay(); }});

  });
  <?php
  endif;
  ?>
</script>

<?php

// $debug->arr(array('$pageData' => $pageData));

?>
