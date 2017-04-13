<div id="addImgGallery" class="modal">
  <div class="modal-content">
    <h4>Ajouter une image/gallery</h4>
    <div class="row">
      <form id="formAddGallery" enctype="multipart/form-data" class="col s12">
        <div class="row">
          <div class="file-field input-field">
            <div class="btn">
              <span>Image</span>
              <input name="formGalleryImg" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="">
            </div>
          </div>
          <p>
            Type :
            <input name="formGalleryType" type="radio" id="formGalleryIsImage" value="0" checked="checked" />
            <label for="formGalleryIsImage">Image</label>
            <input name="formGalleryType" type="radio" id="formGalleryIsGallery" value="1" />
            <label for="formGalleryIsGallery">Galerie d'image</label>
          </p>
          <div style="display:none;" id="formGalleryNameShow" class="input-field col s12">
            <input name="formGalleryName" id="formGalleryName" type="text" class="validate">
            <label for="formGalleryName">Nom de la galerie</label>
          </div>
        </div>
        <input type="hidden" name="id" value="<?= $id_gallery ? $id_gallery : G_id ?>">
      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a id="btnSubmitGallery" href="#!" class="waves-effect waves-green btn-flat">Ajouter</a>
  </div>
</div>
