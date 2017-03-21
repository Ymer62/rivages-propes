<?php if (isset($_SESSION['flash'])): ?>
<div>
  <?= $_SESSION['flash']; ?>
</div>
<?php $_SESSION['flash'] = ''; endif;?>
