<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <img src="img/sponsors/haut_de_france.png" alt="L'Europe s'engage en hauts-de-france">
        <img src="img/sponsors/ue.png" alt="Drapeau de l'union européene">
        <img src="img/placeholder.jpg" alt="placeholder">
        <img src="img/placeholder.jpg" alt="placeholder">
        <img src="img/placeholder.jpg" alt="placeholder">
        <img src="img/placeholder.jpg" alt="placeholder">
        <img src="img/placeholder.jpg" alt="placeholder">
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
        <div class="row">
            <div class="col s12 m4">© 1991-<?php echo date("Y") ?> Rivages Propres</div>
            <div class="col s12 m4">
                Site crée par <a href="http://boulogne.simplon.co/" target="_blank">Simplon BSM</a>
            </div>
            <div class="col s12 m4">
                <?php if (ADMIN): ?>
                    <a href="<?= $path->link('logout', false) ?>">Déconnexion</a>
                <?php else: ?>
                    <a href="<?= $path->link('login', false) ?>">Administration</a>
                <?php endif; ?>
            </div>
        </div>


    </div>
  </div>
</footer>




</body>
</html>
