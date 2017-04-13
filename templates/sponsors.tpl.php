<?php
$sponsors = $db->query("SELECT * FROM sponsors ORDER BY pos");
foreach ($sponsors as $sponsor):
  if(ADMIN):
?>
  <div class="sponsor">
    <i data-id="<?= $sponsor['id'] ?>" class="small material-icons delSponsor">delete</i>
    <i data-id="<?= $sponsor['id'] ?>" class="medium material-icons sponsorMoveLeft">keyboard_arrow_left</i>
    <i data-id="<?= $sponsor['id'] ?>" class="medium material-icons sponsorMoveRight">keyboard_arrow_right</i>
    <img src="img/sponsors/<?= $sponsor['img'] ?>" alt="<?= $sponsor['alt'] ?>">
  </div>
  <?php
  else:
  ?>
  <img src="img/sponsors/<?= $sponsor['img'] ?>" alt="<?= $sponsor['alt'] ?>">
  <?php
  endif;
  ?>
<?php
endforeach;
?>
