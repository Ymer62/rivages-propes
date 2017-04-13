<div id="sliders" class="modal">
  <div class="modal-content">
    <h4></h4>
    <div class="row">
      <form id="formSliders" enctype="multipart/form-data" class="col s12">
        <div class="row">
          <div class="file-field input-field">
            <div class="btn">
              <span>Fond</span>
              <input name="formSlide" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="">
            </div>
          </div>
          <div class="input-field col s12">
            <textarea name="formSlideContent" id="formSlideContent" class="materialize-textarea"></textarea>
            <label class="active" for="formSlideContent">Contenu</label>
          </div>
        </div>
        <input type="hidden" name="id">
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a id="btnSubmitSlide" href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Appliquer</a>
  </div>
</div>
