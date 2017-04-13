$(document).ready(function(){

  // Add historic
  $(document).on('click', '#btnHistoricAdd', function(){
    var year = $('#formAddHistoricYear').val().trim();
    var text = $('#boxAddHistoric').children('div').last().children('.note-editable').html().trim();

    $.ajax({
      type: "POST",
      url: 'ajax.php?ajax=addHistoric',
      data: {year:year, text:text},
      success: function(data,textStatus,jqXHR){
        $('#historicContainer').html(data);
        $('#historicAdd').modal('close');
      }
    });
  });

  // Delete historic
  $('#historicContainer').on('click', '.deleteHistoric', function(){
    var conf = confirm('Voulez-vous vraiment supprimer cette partie ?');

    if(conf){
      var elm = $(this);
      var id = elm.data('id');

      $.ajax({
        type: "POST",
        url: 'ajax.php?ajax=deleteHistoric',
        data: {id:id},
        success: function(data,textStatus,jqXHR){
          if(data.trim() == 'OK')
          elm.parent().parent().remove();
        }
      });
    }
  });

  // Update historic
  $('#historicContainer').on('keydown', '.editorAir', function(){
    var elm = $(this).parent().children('button').children('i');
    elm.css({'display':'inline'});
    elm.html('mode_edit');
  });

  $('#historicContainer').on('click', '.btnHistoricTextAdmin', function(){
    var id = $(this).data('id');
    var text = $(this).parent().children('.editorAir').html();
    var stat = $(this).children('i');

    $.ajax({
      type: "POST",
      url: 'ajax.php?ajax=editHistoric',
      data: {id:id, text:text},
      success: function(data,textStatus,jqXHR){
        if(data.trim() == 'OK'){
          stat.html('check');
          setTimeout(function(){stat.fadeOut();}, 2000);
        }
      }
    });
  });

});

// Editor historic
var toolbarShort = [
  ['style', ['style']],
  ['color', ['color']],
  ['font', ['bold', 'underline', 'clear']],
  ['para', ['ul', 'paragraph']],
  ['table', ['table']],
  ['insert', ['link', 'picture']],
];

$('#second.editor').materialnote({
    toolbar: toolbarShort,
    height: 200,
    minHeight: 200,
    defaultBackColor: '#fff',
    followingToolbar: false
});
