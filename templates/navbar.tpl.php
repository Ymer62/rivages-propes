<!-- Dropdowns -->
<ul id="drop_presentation" class="dropdown-content">
  <li><a href="<?= $path->link('presentation-historique') ?>">Historique</a></li>
  <li><a href="<?= $path->link('presentation-equipe') ?>">Equipe</a></li>
</ul>

<ul id="drop_support" class="dropdown-content">
  <li><a href="<?= $path->link('support-activites-environnement') ?>">Environnement</a></li>
  <li><a href="<?= $path->link('support-activites-batiment') ?>">Bâtiment</a></li>
  <li><a href="<?= $path->link('support-activites-mobilite-douce') ?>">Mobilité douce</a></li>
</ul>

<!-- Mobile menu -->
<ul class="side-nav right" id="mobile_menu">
    <li><a href="#!">Présentation</a></li>
        <li><a href="<?= $path->link('presentation-historique') ?>" class="submenu">Historique</a></li>
        <li><a href="<?= $path->link('presentation-equipe') ?>" class="submenu">Equipe</a></li>
    <li><a href="<?= $path->link('accompagnement') ?>">Accompagnement</a></li>
    <li><a href="#!">Supports D'activités</a></li>
        <li><a href="<?= $path->link('support-activites-environnement') ?>" class="submenu">Environnement</a></li>
        <li><a href="<?= $path->link('support-activites-batiment') ?>" class="submenu">Bâtiment</a></li>
        <li><a href="<?= $path->link('support-activites-mobilite-douce') ?>" class="submenu">Mobilité douce</a></li>
    <li><a href="<?= $path->link('evenements') ?>">Evènements</a></li>
    <li><a href="<?= $path->link('contact') ?>">Contact</a></li>
    <li><a href="<?= $path->link('postuler') ?>" class="waves-effect waves-light btn">Postuler</a></li>
</ul>

<!-- Navbar -->
<nav>
  <div class="nav-wrapper">
      <a class="hide-on-med-and-down brand-logo" href="<?= $path->link('') ?>">
          <img src="img/logo_small.png" alt="logo_small">
      </a>
      <a href="#" data-activates="mobile_menu" class="button-collapse"><i class="fa fa-bars"></i></a>
      <ul class="hide-on-med-and-down right">
          <li><a class="dropdown-button" href="#!" data-activates="drop_presentation" data-beloworigin="true">Présentation <i class="fa fa-caret-down"></i></a></li>
          <li><a href="<?= $path->link('accompagnement') ?>">Accompagnement</a></li>
          <li><a class="dropdown-button" href="#!" data-activates="drop_support" data-beloworigin="true">Supports D'activités <i class="fa fa-caret-down"></i></a></li>
          <li><a href="<?= $path->link('evenements') ?>">Evènements</a></li>
          <li><a href="<?= $path->link('contact') ?>">Contact</a></li>
          <li><a href="<?= $path->link('postuler') ?>" class="waves-effect waves-light btn">Postuler</a></li>
      </ul>
  </div>
</nav>
<main>
<div id="rivages">
  <div id="logo">
    <a href="<?= $path->link(''); ?>">
      <img src="img/bgs/logoTitle.png" alt="Titre" />
      <img src="img/bgs/logo.png" alt="Logo" />
    </a>
  </div>
</div>
