<div id="candidate" class="col s8 offset-s2">

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

<div class="container">
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input id="name" type="text" class="validate">
          <label for="name">Nom</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input id="lastName" type="text" class="validate">
          <label for="lastName">Prénom</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input id="date" type="text" class="validate" placeholder="JJ/MM/YYYY">
          <label for="date">Âge</label>
        </div>
      </div>
      <div class="row">
        <div class="file-field input-field">
           <div class="btn">
             <span>Votre CV</span>
             <input type="file">
           </div>
           <div class="file-path-wrapper">
             <input class="file-path validate" type="text">
           </div>
         </div>
      </div>
      <div class="row">
        <div class="file-field input-field">
           <div class="btn">
             <span>Attestation CAF</span>
             <input type="file">
           </div>
           <div class="file-path-wrapper">
             <input class="file-path validate" type="text">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col s12">
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
       </div>
     </div>
    </form>
  </div>
</div>

<?php

$debug->arr(array('$pageData' => $pageData));

?>
