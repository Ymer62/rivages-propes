$(document).ready(function(){

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

});
