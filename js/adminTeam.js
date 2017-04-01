$(document).ready(function(){

  // Add member
  $(document).on('click', '#btnMemberAdd', function(){
    if(!$('#formAddMemberCat').val() ||
       !$('#formAddMemberName').val() ||
       !$('#formAddMemberJob').val()){
      alert('Seul les champs email et avatar ne sont pas obligatoires');
    }
    else{
      var formData = new FormData($('#formAddMember')[0]);
      $.ajax({
        url:'ajax.php?ajax=addMember',
        type:'POST',
        xhr: function() {
          myXhr = $.ajaxSettings.xhr();
          if(myXhr.upload)
          myXhr.upload.addEventListener('progress',progressBar, false);

          return myXhr;
        },

        beforeSend:function(){ $('#progress').modal('open'); },
        success:function(data,textStatus,jqXHR){
          $('#members').html(data.trim());
          $('#memberAdd').modal('close');
          $('#progress').modal('close');
          $('#formAddMember')[0].reset();
        },
        error:{},
        data:formData,
        cache:false,
        contentType:false,
        processData:false
      });
    }
  });

  // Delete member
  $('#members').on('click', '.deleteMember', function(){
    var conf = confirm('Voulez-vous vraiment supprimer ce membre ?');

    if(conf){
      var id = $(this).data('id');

      $.ajax({
        type: "POST",
        url: 'ajax.php?ajax=deleteMember',
        data: {id:id},
        success: function(data,textStatus,jqXHR){
          $('#members').html(data.trim());
        }
      });
    }
  });

  // Update member
  $('#members').on('click', '.editMember', function(){
    var cat = $(this).parent().parent().parent().children('h4').html();
    var job = $(this).parent().parent().children('h6').html();
    var name = $(this).parent().children('p').html();
    var email = $(this).data('email');
    var id = $(this).data('id');

    $('#formEditMemberCat').val(cat);
    $('#formEditMemberJob').val(job);
    $('#formEditMemberName').val(name);
    $('#formEditMemberEmail').val(email);
    $('#memberEdit input[type="hidden"]').val(id);

    Materialize.updateTextFields();
    $('#memberEdit').modal('open');
  });

  $(document).on('click', '#btnMemberEdit', function(){
    if(!$('#formEditMemberCat').val() ||
       !$('#formEditMemberName').val() ||
       !$('#formEditMemberJob').val()){
      alert('Seul les champs email et avatar ne sont pas obligatoires');
    }
    else{
      var formData = new FormData($('#formEditMember')[0]);
      $.ajax({
        url:'ajax.php?ajax=editMember',
        type:'POST',
        xhr: function() {
          myXhr = $.ajaxSettings.xhr();
          if(myXhr.upload)
          myXhr.upload.addEventListener('progress',progressBar, false);

          return myXhr;
        },

        beforeSend:function(){ $('#progress').modal('open'); },
        success:function(data,textStatus,jqXHR){
          $('#members').html(data.trim());
          $('#memberEdit').modal('close');
          $('#progress').modal('close');
          $('#formEditMember')[0].reset();
        },
        error:{},
        data:formData,
        cache:false,
        contentType:false,
        processData:false
      });
    }
  });

  // Move cat
  function moveCat(direction, cat){
    $.ajax({
      type: "POST",
      url: 'ajax.php?ajax=' + (direction ? 'upCatMember' : 'downCatMember'),
      data: {cat:cat},
      success: function(data,textStatus,jqXHR){
        $('#members').html(data.trim());
      }
    });
  }

  $('#members').on('click', '.upCatMember', function(){
    moveCat(true, $(this).data('cat'));
  });

  $('#members').on('click', '.downCatMember', function(){
    moveCat(false, $(this).data('cat'));
  });

});
