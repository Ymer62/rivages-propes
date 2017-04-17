$(document).ready(function(){

  $('#eventsContent').on('click touchstart', 'img', function getEvent() {
      var result = $('#result');
        result.slideUp();
        var id = this.getAttribute('data-id');

        $.ajax({
          type: "POST",
          url: 'ajax.php?ajax=showEvent',
          data: { id:id },
          success: function(data){
              result.html(data);
          },
          complete : function(){
              result.slideDown();
              $('.materialboxed').materialbox();
          }
        });
    });

});
