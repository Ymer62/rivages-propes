<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <p><a class="grey-text text-lighten-4" href="https://www.facebook.com/RivagesPropres/" target="_blank"><i class="fa fa-facebook-square"></i></a></p>
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
                    <a class="grey-text text-lighten-4" href="?page=logout&noData=true">Déconnexion</a>
                <?php else: ?>
                    <a class="grey-text text-lighten-4" href="?page=login&noData=true">Administration</a>
                <?php endif; ?>
            </div>
        </div>


    </div>
  </div>
</footer>




</body>
</html>
