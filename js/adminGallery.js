$(document).ready(function(){

  $(document).on('change', 'input[name="formGalleryType"]', function(){
    if($('#formGalleryIsImage').prop('checked'))
    $('#formGalleryNameShow').css({'display':'none'});
    else
    $('#formGalleryNameShow').css({'display':'block'});
  });

  // Submit
  $(document).on('click', '#btnSubmitGallery', function(){
    if($('input[name="formGalleryImg"]').val() == ''){
      alert('Vous n\'avez pas sélectionné d\'image !');
      return;
    }

    var id = $('#formAddGallery input[type="hidden"]').val();
    var formGalleryName = $('#formGalleryName').val();
    var formData = new FormData($('#formAddGallery')[0]);

    $.ajax({
      url:'ajax.php?ajax=addGallery',
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
          $('#gallery').html(data);
          $('#progress').modal('close');
          $('#formAddGallery').modal('close');
        }
      },
      error:{},
      data:formData,
      cache:false,
      contentType:false,
      processData:false
    });
  });

  // Delete
  $('#gallery').on('click', '.delGallery', function(){
    var id = $(this).data('id');
    var id_gallery = $(this).data('idgallery');
    var dialog = confirm('Voulez-vous vraiment supprimer ce élément de la galerie ?');

    if(dialog) {
      $.ajax({
        type: "POST",
        url: 'ajax.php?ajax=deleteGallery',
        data: {id:id, id_gallery:id_gallery},
        success: function(data,textStatus,jqXHR){
          if(data.trim() != 'KO')
          $('#gallery').html(data);
        }
      });
    }

    return false;
  });

});
