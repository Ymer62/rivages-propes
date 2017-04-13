<?php if(ADMIN): ?>
<div class="row">
  <div class="col s12">
    <a href="#addImgGallery" class="waves-effect waves-light btn white-text grey darken-4">
      <i class="small material-icons left">add_circle</i>
      Ajouter une image/galerie
    </a>
  </div>
</div>
<?php endif; ?>
<div class="row">
  <?php

  $gallery = $db->query('SELECT * FROM gallery WHERE id_gallery = :id_gallery ORDER BY directory DESC',
  array(
    'id_gallery' => isset($id_gallery) ? $id_gallery : G_id
  ));

  foreach ($gallery as $data):
  ?>
  <div class="col l3 m4 s12">
    <div data-view="<?= ($data['directory'] ? $path->link('galerie', true, $data['id']) : '') ?>" class="dir<?= ($data['directory'] ? ' view' : '') ?>">
      <i data-id="<?= $data['id'] ?>" data-idgallery="<?= $data['id_gallery'] ?>" class="delGallery small material-icons">delete</i>
      <img class="materialboxed center-block responsive-img" src="img/gallery/<?= $data['img'] ?>" alt="">
      <?php if($data['directory']): ?>
      <div class="placeHolder valign-wrapper center">
        <div>
          <i class="medium material-icons">folder_open</i>
          <br />
          <?= $data['name'] ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php
  endforeach;
  ?>
</div>
