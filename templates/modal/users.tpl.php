<div id="users" class="modal">
  <div class="modal-content">
    <div class="row">
      <h5>Liste des utilisateurs</h5>
      <ul class="row">
        <?php
        $users = $db->query('SELECT * FROM users');
        foreach ($users as $user):
        ?>
        <li class="col s4">
          <?= $user['login'] ?>
          <i data-id="<?= $user['id'] ?>" class="editUser small material-icons">edit</i>
          <i data-id="<?= $user['id'] ?>" class="delUser small material-icons">delete</i>
        </li>
        <?php
        endforeach;
        ?>
      </ul>
    </div>
    <a href="#userAdd">
      <button type="button" class="btn waves-effect center-block">Ajouter un utilisateur</button>
    </a>
  </div>
</div>
