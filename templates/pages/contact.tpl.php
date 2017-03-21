<?php

$debug->arr(array('$pageData' => $pageData));

?>

<div id="contact" class="row col s8 offset-s2">

<div class="row">
   <form class="col s8 offset-s2">
     <div class="row">
       <div class="input-field col s6">
         <input  id="first_name" type="text" class="validate">
         <label for="first_name">Nom :</label>
       </div>

       <div class="input-field col s6">
         <input id="last_name" type="text" class="validate">
         <label for="last_name">Prenom :</label>
       </div>
     </div>

     <div class="row">
       <div class="input-field col s12">
         <input id="email" type="email" class="validate">
         <label for="email">Email :</label>
       </div>
     </div>

<div class="row">
     <div class="input-field col s4 offset-s4">
  <select multiple>
    <option disabled=""></option>
    <option value="1">David Vasconi (Chargé de mission bâtiment)</option>
    <option value="2">Olivier Deroire (Chargé de mission environnement)</option>
    <option value="3">Anne Leman (Chargée de communication)</option>
    <option value="4">Salima Nssis (Agent administratif)</option>
    <option value="5">Pascale Piquet (Secrétaire)</option>
  </select>
  <label>Choix de la personne a contacter :</label>
</div>
</div>

    <div class="row">
      <div class="input-field col s4">
        <input id="input_text" type="text" data-length="50">
        <label for="input_text">Sujet :</label>
      </div>
    </div>
    <div class="row">
        <div class="input-field col s6">

          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
          <label for="icon_prefix2"><i class="fa fa-pencil" aria-hidden="true">Message</i></label>
        </div>
      </div>

      <div class="row">
        <div class="col s4 offset-s8">
        <input type="input" name="envoyer" value="Envoyer">
        </div>
    </div>
  </form>
  </div>

</div>



  <script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });


    $('select').material_select('destroy');

  $('#textarea1').val('New Text');
  $('#textarea1').trigger('autoresize');
  </script>
