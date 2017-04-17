$(document).ready(function(){

  // Add event
  $('#eventAdd').on('click', '#btnEventAdd', function(){
    var formData = new FormData($('#eventAddForm')[0]);
    var title = $('#formAddEventTitle').val();
    var date = $('#formAddEventDate').val();
    var img = $('input[name="formEventImg"]').val();
    var text = $('#boxAddEvent').children('div').last().children('.note-editable').html().trim();
    formData.append("text", text);

    if(!text || !title || !date || img == ''){
      alert('Tous les champs sont obligatoires');
      return;
    }
    else if(!date.match('[0-9]{2}/[0-9]{2}/[0-9]{4}')){
      alert('Le format de la date est incorrecte');
      return;
    }

    $.ajax({
      url:'ajax.php?ajax=addEvent',
      type:'POST',
      xhr: function() {
        myXhr = $.ajaxSettings.xhr();
        if(myXhr.upload)
        myXhr.upload.addEventListener('progress',progressBar, false);

        return myXhr;
      },

      beforeSend:function(){ $('#progress').modal('open'); },
      success:function(data,textStatus,jqXHR){
        if(data.trim() != 'KO'){
          $('#eventsContent').html(data);
          $('#progress').modal('close');
          $('#eventAdd').modal('close');
        }
      },
      error:{},
      data:formData,
      cache:false,
      contentType:false,
      processData:false
    });
  });

  // Remove event
  $('#events').on('click', '.deleteEvent', function(){
    var id = $(this).data('id');
    var dialog = confirm('Voulez-vous vraiment supprimer cet évévement ?');

    if(dialog) {
      $.ajax({
        type: "POST",
        url: 'ajax.php?ajax=deleteEvent',
        data: {id:id},
        success: function(data,textStatus,jqXHR){
          if(data.trim() != 'KO')
          $('#events').html(data);
        }
      });
    }
  });

  // Edit event
  $('#events').on('click', '.editEvent', function(){
    var id = $(this).data('id');

    $.ajax({
      type: "POST",
      url: 'ajax.php?ajax=editEventForm',
      data: {id:id},
      success: function(data,textStatus,jqXHR){
        $('#eventEdit').html(data);
      },
      complete: function(){
        editor('third');
      }
    });
    $('#eventEdit').modal('open');
  });

  $('#eventEdit').on('click', '#btnEventEdit', function(){
    var formData = new FormData($('#eventEditForm')[0]);
    var title = $('#formEditEventTitle').val();
    var date = $('#formEditEventDate').val();
    var text = $('#boxEditEvent').children('div').last().children('.note-editable').html().trim();
    formData.append("text", text);

    if(!text || !title || !date){
      alert('Tous les champs sont obligatoires');
      return;
    }
    else if(!date.match('[0-9]{2}/[0-9]{2}/[0-9]{4}')){
      alert('Le format de la date est incorrecte');
      return;
    }

    $.ajax({
      url:'ajax.php?ajax=editEvent',
      type:'POST',
      xhr: function() {
        myXhr = $.ajaxSettings.xhr();
        if(myXhr.upload)
        myXhr.upload.addEventListener('progress',progressBar, false);

        return myXhr;
      },

      beforeSend:function(){ $('#progress').modal('open'); },
      success:function(data,textStatus,jqXHR){
        if(data.trim() != 'KO'){
          $('#eventsContent').html(data);
          $('#progress').modal('close');
          $('#eventEdit').modal('close');
        }
      },
      error:{},
      data:formData,
      cache:false,
      contentType:false,
      processData:false
    });
  });

  function editor(id){
    // Editor events
    var toolbarShort = [
      ['style', ['style']],
      ['color', ['color']],
      ['font', ['bold', 'underline', 'clear']],
      ['para', ['ul', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture']],
    ];

    $('#'+id+'.editor').materialnote({
        toolbar: toolbarShort,
        height: 200,
        minHeight: 200,
        defaultBackColor: '#fff',
        followingToolbar: false
    });
  }
  editor('second');


});
