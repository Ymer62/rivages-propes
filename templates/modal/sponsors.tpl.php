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
