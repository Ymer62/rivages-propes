<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div id="sponsorsContainer" class="col s12">
        <?php
        $sponsors = $db->query("SELECT * FROM sponsors");
        foreach ($sponsors as $sponsor):
          if(ADMIN):
        ?>
          <div class="sponsor">
            <i data-id="<?= $sponsor['id'] ?>" class="small material-icons delSponsor">delete</i>
            <img src="img/sponsors/<?= $sponsor['img'] ?>" alt="<?= $sponsor['alt'] ?>">
          </div>
          <?php
          else:
          ?>
          <img src="img/sponsors/<?= $sponsor['img'] ?>" alt="<?= $sponsor['alt'] ?>">
          <?php
          endif;
          ?>
        <?php
        endforeach;
        ?>
      </div>
      <?php
      if(ADMIN):
      ?>
      <i id="addSponsor" class="small material-icons">add_circle</i>
      <?php
      endif;
      ?>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
        <div class="row">
            <div class="col s12 m4">© 1991-<?php echo date("Y") ?> Rivages Propres</div>
            <div class="col s12 m4">
                Site crée par <a href="http://boulogne.simplon.co/" target="_blank">Simplon BSM</a>
            </div>
            <div class="col s12 m4">
                <?php if (ADMIN): ?>
                    <a href="<?= $path->link('panel', false) ?>">Panneau d'administration</a>
                <?php else: ?>
                    <a href="<?= $path->link('login', false) ?>">Administration</a>
                <?php endif; ?>
            </div>
        </div>


    </div>
  </div>
</footer>

<?php if(ADMIN): ?>
<!-- Progress Bar -->
<div id="progress" class="modal">
  <div class="modal-content">
    <progress class="progr"></progress>
  </div>
</div>

<!-- Modal sponsors -->
<div id="sponsors" class="modal">
  <div class="modal-content">
    <h4>Ajouter un sponsor</h4>
    <div class="row">
      <form id="formSponsors" enctype="multipart/form-data" class="col s12">
        <div class="row">
          <div class="file-field input-field">
            <div class="btn">
              <span>Image</span>
              <input name="formSponsor" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="">
            </div>
          </div>
          <div class="input-field col s12">
            <textarea name="formSponsorAlt" id="formSponsorAlt" class="materialize-textarea"></textarea>
            <label class="active" for="formSponsorAlt">Alt</label>
          </div>
        </div>
        <input type="hidden" name="id">
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a id="btnSubmitSponsor" href="#!" class="waves-effect waves-green btn-flat">Appliquer</a>
  </div>
</div>

<script type="text/javascript">
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
      var title = elm.parent().children('span').html();
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
      var text = $('#' + boxEditor).children('div').last().children('.note-editable').html();

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
</script>

<?php endif; ?>

</body>
</html>
