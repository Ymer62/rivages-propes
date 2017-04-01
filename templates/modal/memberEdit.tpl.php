<div id="memberEdit" class="modal">
  <div class="modal-content">
    <div class="row">
      <h5>Modifier un membre</h5>
      <form id="formEditMember" enctype="multipart/form-data" class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input name="formEditMemberCat" id="formEditMemberCat" type="text" class="validate">
            <label class="active" for="formEditMemberCat">Catégorie</label>
          </div>
          <div class="input-field col s6">
            <input name="formEditMemberName" id="formEditMemberName" type="text" class="validate">
            <label class="active" for="formEditMemberName">Nom</label>
          </div>
          <div class="input-field col s6">
            <input name="formEditMemberEmail" id="formEditMemberEmail" type="text" class="validate">
            <label class="active" for="formEditMemberEmail">Email</label>
          </div>
          <div class="input-field col s6">
            <input name="formEditMemberJob" id="formEditMemberJob" type="text" class="validate">
            <label class="active" for="formEditMemberJob">Status</label>
          </div>
        </div>
        <div class="row">
          <div class="file-field input-field col s12">
            <div class="btn">
              <span>Avatar</span>
              <input id="formEditMemberAvatar" name="formEditMemberAvatar" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Laissez vide pour garder l'avatar actuel">
            </div>
          </div>
        </div>
        <input type="hidden" name="id" value="" />
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a id="btnMemberEdit" href="#!" class=" modal-action waves-effect waves-green btn-flat">Modifier</a>
  </div>
</div>
