<?php

// Last post
if (isset($_SESSION['post']))
$post = unserialize($_SESSION['post']);

?>
<div class="pagecontact">

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

<div id="contact">

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
      <div class="input-field col s12">
        <input name="subject" id="subject" type="text" data-length="50" value="<?= (isset($post['subject']) ? $post['subject'] : '') ?>">
        <label for="subject">Sujet :</label>
      </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <textarea name="msg" id="msg" class="materialize-textarea"><?= (isset($post['msg']) ? $post['msg'] : '') ?></textarea>
          <label for="msg">Message :</i></label>
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


<div class="googlemap">

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2526.1284028268997!2d1.6103626506873756!3d50.71755697586367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dc2c50d1b68489%3A0x4c34effe2d72d877!2sRivages+Propres+C%C3%B4te+d&#39;Opale!5e0!3m2!1sfr!2sfr!4v1491211165105" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

<div class="contactinfo">

  <?php
  if(ADMIN):
  ?>
    <div class="row">
        <div data-page="<?= PAGE ?>" class="input-field col s12" id="boxEditText">
            <div data-btn="btnSubmitText" class="editor" id="first">
                <?= $pageData['text'] ?>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col s12">
    <button data-box="boxEditText" id="btnSubmitText" class="btnTextAdmin waves-effect waves-light btn white-text grey darken-4 right">
      <i class="small material-icons right">mode_edit</i>
      Appliquer
    </button>
  </div>
  </div>
  <?php
  else:
  ?>
    <p class="flow-text"><?= $pageData['text'] ?></p>
  <?php
  endif;
  ?>

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
