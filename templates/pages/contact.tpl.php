<?php

// Last post
if (isset($_SESSION['post']))
$post = unserialize($_SESSION['post']);

?>

<div id="content">
  <?php
  if(ADMIN):
  ?>
    <h1 data-page="<?= PAGE ?>">
      <span contenteditable="true">
        <?php echo $pageData['title'] ?>
      </span>
      <i class="small material-icons editTitle" style="display:none">mode_edit</i>
    </h1>
  <?php
  else:
  ?>
    <h1><?= $pageData['title'] ?></h1>
  <?php
  endif;
  ?>

<div id="contact" class="row col s10">

<div class="row">
   <form action="<?= $path->link('contact') ?>" method="post" class="col s12">
     <div class="row">
       <div class="input-field col s6">
         <input name="first_name" id="first_name" type="text" class="validate" value="<?= (isset($post['first_name']) ? $post['first_name'] : '') ?>">
         <label for="first_name">Nom :</label>
       </div>

       <div class="input-field col s6">
         <input name="last_name" id="last_name" type="text" class="validate" value="<?= (isset($post['last_name']) ? $post['last_name'] : '') ?>">
         <label for="last_name">Prenom :</label>
       </div>
     </div>

     <div class="row">
       <div class="input-field col s12">
         <input name="email" id="email" type="email" class="validate" value="<?= (isset($post['email']) ? $post['email'] : '') ?>">
         <label for="email">Email :</label>
       </div>
     </div>

<div class="row">
     <div class="input-field col s6 offset-s3">
  <select name="to" multiple>
    <option disabled=""></option>
    <option value="1">ymeurt@gmail.com</option>
    <option value="2">Olivier Deroire (Chargé de mission environnement)</option>
    <option value="3">Anne Leman (Chargée de communication)</option>
    <option value="4">Salima Nssis (Agent administratif)</option>
    <option value="5">Pascale Piquet (Secrétaire)</option>
  </select>
  <label>Choix de la personne a contacter :</label>
</div>
</div>

    <div class="row">
      <div class="input-field col s12">
        <input name="subject" id="subject" type="text" data-length="50" value="<?= (isset($post['subject']) ? $post['subject'] : '') ?>">
        <label for="subject">Sujet :</label>
      </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <textarea name="msg" id="msg" class="materialize-textarea"><?= (isset($post['msg']) ? $post['msg'] : '') ?></textarea>
          <label for="msg"><i class="fa fa-pencil" aria-hidden="true">Message :</i></label>
        </div>
      </div>

      <div class="row">
        <div class="col s4 offset-s8">
        <input type="submit" id="submit" name="submit" value="Envoyer">
        </div>
    </div>

  </form>
  </div>

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

<?php

  // Delete post
  unset($_SESSION['post']);

  // Debug
  $debug->arr(array('$pageData' => $pageData));

  ?>
