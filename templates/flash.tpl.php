<?php if (isset($_SESSION['flash']) && $_SESSION['flash'] != ''): ?>

<div id="msgFlash">
  <div>
    <?= $_SESSION['flash']; ?>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

    // Msg flash
    var blockFlash = $('#msgFlash');
    blockFlash.fadeIn();
    setTimeout(function(){blockFlash.fadeOut();},3000);

    $('#msgFlash').children('div').click(function(){
      blockFlash.fadeOut();
    });

});
</script>

<?php $_SESSION['flash'] = ''; endif;?>
