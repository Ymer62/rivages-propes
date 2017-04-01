<div id="memberAdd" class="modal">
  <div class="modal-content">
    <div class="row">
      <h5>Ajouter un membre</h5>
      <form id="formAddMember" enctype="multipart/form-data" class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input name="formAddMemberCat" id="formAddMemberCat" type="text" class="validate">
            <label for="formAddMemberCat">Catégorie</label>
          </div>
          <div class="input-field col s6">
            <input name="formAddMemberName" id="formAddMemberName" type="text" class="validate">
            <label for="formAddMemberName">Nom</label>
          </div>
          <div class="input-field col s6">
            <input name="formAddMemberEmail" id="formAddMemberEmail" type="text" class="validate">
            <label for="formAddMemberEmail">Email</label>
          </div>
          <div class="input-field col s6">
            <input name="formAddMemberJob" id="formAddMemberJob" type="text" class="validate">
            <label for="formAddMemberJob">Status</label>
          </div>
        </div>
        <div class="row">
          <div class="file-field input-field col s12">
            <div class="btn">
              <span>Avatar</span>
              <input id="formAddMemberAvatar" name="formAddMemberAvatar" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a id="btnMemberAdd" href="#!" class=" modal-action waves-effect waves-green btn-flat">Ajouter</a>
  </div>
</div>
