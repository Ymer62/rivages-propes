$(document).ready(function(){

  $('#btnHistoricAdd').click(function(){
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

  $('#historicContainer').on('click', '.deleteHistoric', function(){

  });

  $('#historicContainer').on('click', '.btnTextAdmin', function(){
    alert();
  });

});

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
