$(document).ready(function(){

  $('#gallery').on('click', '.dir', function(){
    var view = $(this).data('view');

    if(view)
    document.location.href=view;
  });

});
