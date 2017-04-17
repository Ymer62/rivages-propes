<?php

// Data
$events = $db->query('SELECT id, img_min, DATE_FORMAT(date, "%d/%m/%Y")
                      AS dat FROM events ORDER BY date DESC LIMIT 6');

?>

<div class="row">
  <div class="col s12 m6">
    <h4 class="center">A venir</h4>
    <div class="row">
      <?php
      for($i = 0; $i < 3; $i++):
      if(empty($events[$i])) break;
      ?>
        <div class="col s4">
          <a href="#result">
            <img src="img/events/min/<?= $events[$i]['img_min'] ?>" alt="" data-id="<?= $events[$i]['id'] ?>">
          </a>
          <p><?= $events[$i]['dat'] ?></p>
          <?php if(ADMIN): ?>
            <i data-id="<?= $events[$i]['id'] ?>" class="small material-icons editEvent">mode_edit</i>
            <i data-id="<?= $events[$i]['id'] ?>" class="small material-icons deleteEvent">delete</i>
          <?php endif; ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  <div class="col s12 m6">
    <h4 class="center">Passés</h4>
    <div class="row">
      <?php
      for($i = 3; $i < 6; $i++):
      if(empty($events[$i])) break;
      ?>
        <div class="col s4">
          <a href="#result">
            <img src="img/events/min/<?= $events[$i]['img_min'] ?>" alt="" data-id="<?= $events[$i]['id'] ?>">
          </a>
          <p><?= $events[$i]['dat'] ?></p>
          <?php if(ADMIN): ?>
            <i data-id="<?= $events[$i]['id'] ?>" class="small material-icons editEvent">mode_edit</i>
            <i data-id="<?= $events[$i]['id'] ?>" class="small material-icons deleteEvent">delete</i>
          <?php endif; ?>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</div>
