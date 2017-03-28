// Progress bar
function progressBar(e){
  if(e.lengthComputable)
  $('progress').attr({value:e.loaded,max:e.total});
}

// Sponsors
$(document).ready(function(){

  // Add
  $('#addSponsor').click(function(){
    $('#formSponsors')[0].reset();
    $('#sponsors').modal('open');
  });

  // Submit
  $('#btnSubmitSponsor').click(function(){
    if($('input[name="formSponsor"]').val() == ''){
      alert('Vous n\'avez pas sélectionné d\'image !');
      return;
    }

    var id = $('#sponsors input[type="hidden"]').val();
    var formSponsorAlt = $('#formSponsorAlt').val();
    var formData = new FormData($('#formSponsors')[0]);

    $.ajax({
      url:'ajax.php?ajax=addSponsor',
      type:'POST',
      xhr: function() {
        myXhr = $.ajaxSettings.xhr();
        if(myXhr.upload)
        myXhr.upload.addEventListener('progress',progressBar, false);

        return myXhr;
      },

      beforeSend:function(){ $('#progress').modal('open'); },
      success:function(data,textStatus,jqXHR){
        var Data = jQuery.parseJSON(data);

        var newSponsor = '<div class="sponsor">\
                    <i data-id="'+Data[0]+'" class="small material-icons delSponsor">delete</i>\
                    <img src="img/sponsors/'+Data[1]+'" alt="'+Data[2]+'">\
                  </div>';

        $('#sponsorsContainer').append(newSponsor);

        $('#progress').modal('close');
        $('#sponsors').modal('close');
      },
      error:{},
      data:formData,
      cache:false,
      contentType:false,
      processData:false
    });
  });

  // Delete
  $(document).on('click', '.delSponsor', function(){
    var sponsor = $(this).parent();
    var id = $(this).data('id');
    var dialog = confirm('Voulez-vous vraiment supprimer ce sponsor ?');

    if(dialog) {
      $.ajax({
        type: "POST",
        url: 'ajax.php?ajax=deleteSponsor',
        data: {id:id},
        success: function(data,textStatus,jqXHR){
          if(data.trim() == 'OK')
          sponsor.remove();
        }
      });
    }
  });

  // Modal carousel
  $('.modal').modal();

  // Edit title
  $('h1, h2, h3, h4, h5').keydown(function(){
    $(this).children('i').css({'display':'inline'});
    $(this).children('i').html('mode_edit');
  });
  $('.editTitle').click(function(){
    var elm = $(this);
    var title = elm.parent().children('span').html().trim();
    var page = elm.parent().data('page');

    title = title ? title : 'Titre de page';
    elm.parent().children('span').html(title);

    $.ajax({
      type: "POST",
      url: 'ajax.php?ajax=editTitle',
      data: {page:page, title:title},
      success: function(data,textStatus,jqXHR){
        if(data.trim() == 'OK'){
          elm.parent().children('i').html('check');
          setTimeout(function(){elm.parent().children('i').fadeOut();}, 2000);
        }
      }
    });
  });

  // Edit text
  $('.note-editor').click(function(){
    var divEdit = $(this).parent().children('div').first();
    var btn = divEdit.data('btn');

    $('#'+btn+' i').css({'display':'block'});
    $('#'+btn+' i').html('mode_edit');
  });
  $('.btnTextAdmin').click(function(){
    var elm = $(this);
    var boxEditor = elm.data('box');
    var page = $('#' + boxEditor).data('page');
    var text = $('#' + boxEditor).children('div').last().children('.note-editable').html().trim();

    $.ajax({
      type: "POST",
      url: 'ajax.php?ajax=editText',
      data: {page:page, text:text},
      success: function(data,textStatus,jqXHR){
        if(data.trim() == 'OK'){
          elm.children('i').html('check');
          setTimeout(function(){elm.children('i').fadeOut();}, 2000);
        }
      }
    });
  });

  // Edit config
  $('#btnSubmitConfig').click(function(){
    var elm = $(this);
    var page = elm.data('page');
    var head_title = $('#formConfigTitle').val().trim();
    var head_meta_desc = $('#formConfigMetaDesc').val().trim();
    var links = $('#formConfigColorLinks').val().trim();
    var links_hover = $('#formConfigColorLinksHover').val().trim();
    var links_active = $('#formConfigColorLinksActive').val().trim();
    var buttons = $('#formConfigColorButtons').val().trim();
    var buttons_hover = $('#formConfigColorButtonsHover').val().trim();
    var buttons_active = $('#formConfigColorButtonsActive').val().trim();
    var buttons_text = $('#formConfigColorButtonsText').val().trim();
    var titles = $('#formConfigColorTitles').val().trim();

    $.ajax({
      type: "POST",
      url: 'ajax.php?ajax=editConfig',
      data: {
        page:page, head_title:head_title, head_meta_desc:head_meta_desc,
        links:links, links_hover:links_hover, links_active:links_active,
        buttons:buttons, buttons_hover:buttons_hover, buttons_active:buttons_active,
        buttons_text:buttons_text, titles:titles
      },
      success: function(data,textStatus,jqXHR){
        if(data.trim() == 'OK')
          document.title = head_title;
          
      }
    });
  });

});

// Editor WYSIWYG
var toolbar = [
    ['style', ['style', 'bold', 'italic', 'underline', 'strikethrough', 'clear']],
    ['fonts', ['fontsize', 'fontname']],
    ['color', ['color']],
    ['undo', ['undo', 'redo', 'help']],
    ['ckMedia', ['ckImageUploader', 'ckVideoEmbeeder']],
    ['misc', ['link', 'picture', 'table', 'hr', 'codeview', 'fullscreen']],
    ['para', ['ul', 'ol', 'paragraph', 'leftButton', 'centerButton', 'rightButton', 'justifyButton', 'outdentButton', 'indentButton']],
    ['height', ['lineheight']],
];

$('.editor').materialnote({
    toolbar: toolbar,
    height: 550,
    minHeight: 100,
    defaultBackColor: '#fff'
});

$('.editorAir').materialnote({
    airMode: true,
    airPopover: [
        ['color', ['color']],
        ['font', ['bold', 'underline', 'clear']],
        ['para', ['ul', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture']]
    ]
});
