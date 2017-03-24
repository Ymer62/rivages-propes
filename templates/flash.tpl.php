<?php if (isset($_SESSION['flash'])): ?>

<div id="msgFlash">
  <div>
    <?= $_SESSION['flash']; ?>
  </div>
</div>

<?php $_SESSION['flash'] = ''; endif;?>
