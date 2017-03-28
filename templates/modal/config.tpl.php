<div id="config" class="modal">
  <div class="modal-content">
    <div class="row">
      <form id="formConfig" class="col s12">
        <div class="row">
          <h5>Balise head de la page</h5>
          <div class="input-field col s12">
            <input name="formConfigTitle" id="formConfigTitle" type="text" value="<?= $pageData['head_title'] ?>" class="validate">
            <label <?= (($pageData['head_title'] != '') ? 'class="active"' : '') ?> for="formConfigTitle">Title</label>
          </div>
          <div class="input-field col s12">
            <textarea name="formConfigMetaDesc" id="formConfigMetaDesc" class="materialize-textarea"><?= $pageData['head_meta_desc'] ?></textarea>
            <label <?= (($pageData['head_title'] != '') ? 'class="active"' : '') ?> for="formConfigMetaDesc">Meta description</label>
          </div>
          <h5>Personalisation générale</h5>
          <div class="col s12">
            <h6>Couleur des liens</h6>
            <div class="input-field col s4 configColor">
              Normal
              <input name="formConfigColorLinks" id="formConfigColorLinks" type="color" value="<?= $pageData['c_links'] ?>" class="validate">
            </div>
            <div class="input-field col s4 configColor">
              Hover
              <input name="formConfigColorLinksHover" id="formConfigColorLinksHover" type="color" value="<?= $pageData['c_links_hover'] ?>" class="validate">
            </div>
            <div class="input-field col s4 configColor">
              Active
              <input name="formConfigColorLinksActive" id="formConfigColorLinksActive" type="color" value="<?= $pageData['c_links_active'] ?>" class="validate">
            </div>
          </div>
          <div class="col s12">
            <h6>Couleur des boutons</h6>
            <div class="input-field col s3 configColor">
              Normal
              <input name="formConfigColorButtons" id="formConfigColorButtons" type="color" value="<?= $pageData['c_buttons'] ?>" class="validate">
            </div>
            <div class="input-field col s3 configColor">
              Hover
              <input name="formConfigColorButtonsHover" id="formConfigColorButtonsHover" type="color" value="<?= $pageData['c_buttons_hover'] ?>" class="validate">
            </div>
            <div class="input-field col s3 configColor">
              Active
              <input name="formConfigColorButtonsActive" id="formConfigColorButtonsActive" type="color" value="<?= $pageData['c_buttons_active'] ?>" class="validate">
            </div>
            <div class="input-field col s3 configColor">
              Text
              <input name="formConfigColorButtonsText" id="formConfigColorButtonsText" type="color" value="<?= $pageData['c_buttons_text'] ?>" class="validate">
            </div>
          </div>
          <div class="col s12">
            <h6>Couleur des titres</h6>
            <div class="input-field col s12 configColor">
              <input name="formConfigColorTitles" id="formConfigColorTitles" type="color" value="<?= $pageData['c_titles'] ?>" class="validate">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a data-page="<?= PAGE ?>" id="btnSubmitConfig" href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Appliquer</a>
  </div>
</div>
