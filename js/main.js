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

});
