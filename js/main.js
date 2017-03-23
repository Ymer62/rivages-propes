$(document).ready(function(){

    // Mobile menu
    $(".button-collapse").sideNav({ edge: 'right' });

    // Msg flash
    var blockFlash = $('#msgFlash');
    if(blockFlash.children('div').html().trim() != ''){
      blockFlash.fadeIn();
      setTimeout(function(){blockFlash.fadeOut();},3000);
    }

    $('#msgFlash').children('div').click(function(){
      blockFlash.fadeOut();
    });

    // Title
    $('h1, h2, h3, h4, h5').keydown(function(){
      $(this).children('i').css({'visibility':'visible'});
    });
    $('.editTitle').click(function(){
      var elm = $(this);
      var title = elm.parent().children('span').html();
      var page = elm.parent().data('page');

      title = title ? title : 'Titre de page';
      elm.parent().children('span').html(title);

      $.ajax({
        type: "POST",
        url: 'ajax.php?ajax=editTitle',
        data: {page:page, title:title},
        success: function(data,textStatus,jqXHR){
          if(data.trim() == 'OK')
          elm.parent().children('i').css({'visibility':'hidden'});
        }
      });
    });

});
