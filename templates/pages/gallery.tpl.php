<?php

$title = $db->row('SELECT name FROM gallery WHERE id=:id', array('id' => G_id));
$id_gallery = G_id;

?>

<h1><?= $pageData['title'] . ($title['name'] ? ' : ' : '') . $title['name'] ?></h1>

<div class="row" id="gallery">
  <?php
  include 'templates/gallery.tpl.php';
  ?>
</div>

<?php
if(ADMIN):
include 'templates/modal/galleryAdd.tpl.php';
?>
<script src="js/adminGallery.min.js" type="text/javascript"></script>
<?php endif; ?>

<script src="js/gallery.min.js" type="text/javascript"></script>
