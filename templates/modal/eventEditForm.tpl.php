<div class="modal-content">
  <div class="row">
    <h5>Editer un événement</h5>
    <form id="eventEditForm" enctype="multipart/form-data" class="row">
      <div class="input-field col s6">
        <input name="formEditEventTitle" id="formEditEventTitle" type="text" class="validate" value="<?= $editEvent['title'] ?>">
        <label class="active" for="formEditEventTitle">Titre</label>
      </div>
      <div class="input-field col s6">
        <input name="formEditEventDate" id="formEditEventDate" type="text" class="validate" placeholder="JJ/MM/YYYY" value="<?= $editEvent['date'] ?>">
        <label class="active" for="formEditEventDate">Date</label>
      </div>
      <div class="file-field input-field col s12">
        <div class="btn">
          <span>Image</span>
          <input name="formEditEventImg" type="file">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Laissez vide pour ne pas modifier l'image">
        </div>
      </div>
      <input name="id" type="hidden" value="<?= $editEvent['id'] ?>" />
    </form>
    <div class="row">
        <div class="input-field col s12" id="boxEditEvent">
            <div data-btn="btnEditEvent" class="editor" id="third"><?= $editEvent['text'] ?></div>
        </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <a id="btnEventEdit" href="#!" class=" modal-action waves-effect waves-green btn-flat">Ajouter</a>
</div>
