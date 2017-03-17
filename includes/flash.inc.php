<?php

if (isset($_SESSION['flash'])):

// Display message flash
?>

<div>
  <?= $_SESSION['flash']; ?>
</div>

<?php

// Destroy message flash
$_SESSION['flash'] = '';
endif;

?>
