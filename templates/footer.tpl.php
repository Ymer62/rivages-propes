</main>
<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div id="sponsorsContent" class="col s12">
        <?php include 'templates/sponsors.tpl.php'; ?>
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
                <a href="<?= $path->link('mentions-legales') ?>">Mentions légales</a>
            </div>
            <?php if (!ADMIN): ?>
            <div class="col s12 m4">
                <a href="<?= $path->link('login', false) ?>" class="admin-link">Administration</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
  </div>
</footer>

<?php
if(ADMIN):

// Modal
include 'templates/modal/sponsors.tpl.php';
include 'templates/modal/config.tpl.php';
include 'templates/modal/users.tpl.php';
include 'templates/modal/userAdd.tpl.php';
include 'templates/modal/userEdit.tpl.php';
include 'templates/modal/progressBar.tpl.php';

// JS
?>
<script src="js/adminGeneral.min.js" type="text/javascript"></script>
<?php
endif;
?>
<script src="js/main.min.js" type="text/javascript"></script>
</body>
</html>
