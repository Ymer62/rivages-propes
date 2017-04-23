$(document).ready(function(){

  $('#submitForm').click(function(){
    if(!$('#age').html().match('[0-9]{2}/[0-9]{2}/[0-9]{4}')){
      alert('Le format de la date est incorrecte');
      return false;
    }
  });

});
