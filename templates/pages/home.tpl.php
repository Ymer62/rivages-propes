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
                <?php echo $pageData['title'] ?>
              </span>
              <i class="small material-icons editTitle" style="display:none">mode_edit</i>
            </h1>
            <div class="row">
                <div data-page="<?= PAGE ?>" class="input-field col s12" id="boxEditText">
                    <div data-btn="btnSubmitText" class="editor" id="first">
                        <p class="flow-text"><?php echo $pageData['text'] ?></p>
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
            <p class="flow-text"><?php echo $pageData['text'] ?></p>
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

<?php if(ADMIN): ?>
<!-- Modal sliders -->
<div id="sliders" class="modal">
  <div class="modal-content">
    <h4></h4>
    <div class="row">
      <form id="formSliders" enctype="multipart/form-data" class="col s12">
        <div class="row">
          <div class="file-field input-field">
            <div class="btn">
              <span>Fond</span>
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

<?php endif; ?>

<script type="text/javascript">

  $(document).ready(function(){

    // Carousel
    var timerCarousel;

    function carouselSize(){
      $('.carousel').height($(window).height() - $('.nav-wrapper').height());
    }

    $(window).resize(function(){
      carouselSize();
    });
    carouselSize();

    function carouselInit(){
      try{
        $('.carousel.carousel-slider').carousel({fullWidth: true});
      } catch(e) {}
    }

    function carouselPlay(){
      clearInterval(timerCarousel);
      timerCarousel = setInterval(function() { $('.carousel').carousel('next'); }, 3500);
    }

    carouselInit();

    <?php
    if(ADMIN):
    ?>

    // Nav carousel
    $('#slideNext').click(function(){
      $('.carousel').carousel('next');
    });
    $('#slidePreview').click(function(){
      $('.carousel').carousel('prev');
    });

    // Delete slide
    $('#deleteSlide').click(function(){
      var slide = $('.carousel-item.active');
      var id = slide.data('id');
      var dialog =  confirm('Voulez-vous vraiment supprimer ce slide du carousel ?');

      if(dialog) {
        $.ajax({
          type: "POST",
          url: 'ajax.php?ajax=deleteHomeSlide',
          data: {id:id},
          success: function(data,textStatus,jqXHR){
            if(data.trim() == 'OK'){
              slide.remove();

              if($('.carousel.carousel-slider').hasClass('initialized'))
              $('.carousel.carousel-slider').removeClass('initialized');

              carouselInit();
            }
          }
        });
      }
    });

    // Edit slide
    $('#editSlide').click(function(){
      $('#formSliders')[0].reset();
      $('#sliders h4').html('Modifier le slide');
      $('#sliders input[type="file"]').attr('placeholder', 'Laissez vide pour ne pas modifier l\'image');
      $('#sliders label').addClass('active');
      $('#sliders input[type="hidden"]').val($('.carousel-item.active').data('id'));

      var content = $('.carousel-item.active .slideContainerCenter').html().trim();

      $('#sliders textarea').val(content);
      $('#sliders').modal('open');
    });

    // Add slide
    $('#addSlide').click(function(){
      $('#formSliders')[0].reset();
      $('#sliders h4').html('Ajouter un slide');
      $('#sliders input[type="file"]').attr('placeholder', '');
      $('#sliders textarea').val('');
      $('#sliders input[type="hidden"]').val('');
      $('#sliders label').removeClass('active');
      $('#sliders').modal('open');
    });

    // Submit slide
    $('#btnSubmitSlide').click(function(){
      var slide = $('.carousel .active');
      var id = $('#sliders input[type="hidden"]').val();
      var formSlideContent = $('#formSlideContent').val();
      formSlide = $('#formSlide').val();

      var formData = new FormData($('#formSliders')[0]);
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
        success:function(data,textStatus,jqXHR){
          // Edit
          if(id){
            if(data.trim() != 'OK')
            slide.css({'background-image':'url("img/homeSliders/'+data+'")'});
            slide.children('.slideContainer').children('.slideContainerCenter').html($('#formSlideContent').val());
          }
          // Add
          else{
            var Data = jQuery.parseJSON(data);
            $(".carousel-item.active").removeClass('active');

            var bg = Data[1] ? ' style="background-image:url(img/homeSliders/'+Data[1]+')"' : '';
            var newSlide = '<div data-id="'+(Data[0] ? Data[0] : Data)+'" class="carousel-item active"'+bg+'>\
                        <div class="valign-wrapper slideContainer">\
                          <div class="slideContainerCenter">\
                          '+$('#formSlideContent').val()+'\
                          </div>\
                        </div>\
                      </div>';

            $('.carousel').append(newSlide);

            if($('.carousel.carousel-slider').hasClass('initialized'))
            $('.carousel.carousel-slider').removeClass('initialized');

            carouselInit();
            $('.carousel').carousel('next', $(".carousel-item").length - 1);
          }

          $('#progress').modal('close');
        },
        error:{},
        data:formData,
        cache:false,
        contentType:false,
        processData:false
      });
    });

    <?php
    else:
    ?>
    carouselPlay();
    <?php
    endif;
    ?>

  });

</script>

<?php

$debug->arr(array('$pageData' => $pageData));

?>
