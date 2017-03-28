<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div id="sponsorsContainer" class="col s12">
        <?php
        $sponsors = $db->query("SELECT * FROM sponsors");
        foreach ($sponsors as $sponsor):
          if(ADMIN):
        ?>
          <div class="sponsor">
            <i data-id="<?= $sponsor['id'] ?>" class="small material-icons delSponsor">delete</i>
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
      </div>
      <?php
      if(ADMIN):
      ?>
      <i id="addSponsor" class="small material-icons">add_circle</i>
      <?php
      endif;
      ?>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
        <div class="row">
            <div class="col s12 <?= (ADMIN ? 'm6' : 'm4') ?>">© 1991-<?php echo date("Y") ?> Rivages Propres</div>
            <div class="col s12 <?= (ADMIN ? 'm6' : 'm4') ?>">
                Site crée par <a href="http://boulogne.simplon.co/" target="_blank">Simplon BSM</a>
            </div>
            <?php if (!ADMIN): ?>
            <div class="col s12 m4">
                <a href="<?= $path->link('login', false) ?>">Administration</a>
            </div>
            <?php endif; ?>
        </div>


    </div>
  </div>
</footer>

<?php
if(ADMIN):

// Modal
include 'templates/modal/progressBar.tpl.php';
include 'templates/modal/sponsors.tpl.php';
include 'templates/modal/config.tpl.php';
include 'templates/modal/user.tpl.php';

// JS
?>
<script src="js/adminGeneral.min.js" type="text/javascript"></script>
<?php
endif;
?>
<script src="js/main.min.js" type="text/javascript"></script>
</body>
</html>
