<div id="eventAdd" class="modal">
  <div class="modal-content">
    <div class="row">
      <h5>Ajouter un événement</h5>
      <form id="eventAddForm" enctype="multipart/form-data" class="row">
        <div class="input-field col s6">
          <input name="formAddEventTitle" id="formAddEventTitle" type="text" class="validate">
          <label for="formAddEventTitle">Titre</label>
        </div>
        <div class="input-field col s6">
          <input name="formAddEventDate" id="formAddEventDate" type="text" class="validate" placeholder="JJ/MM/YYYY">
          <label for="formAddEventDate">Date</label>
        </div>
        <div class="file-field input-field col s12">
          <div class="btn">
            <span>Image</span>
            <input name="formEventImg" type="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="">
          </div>
        </div>
      </form>
      <div class="row">
          <div class="input-field col s12" id="boxAddEvent">
              <div data-btn="btnAddEvent" class="editor" id="second"></div>
          </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <a id="btnEventAdd" href="#!" class=" modal-action waves-effect waves-green btn-flat">Ajouter</a>
  </div>
</div>
