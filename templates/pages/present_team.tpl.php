<?php

$teamQuery = $db->query("SELECT * FROM team ORDER BY pos_cat");
foreach($teamQuery as $key => $value)
$team[$value['category']][$key] = $value;

?>

<div class="container" id="equipe">
  <div class="row">
    <div class="col s12">
      <h1><?php echo $pageData['title'] ?></h1>
    </div>
  </div>

  <?php
    foreach($team AS $cat => $member):
  ?>
  <div class="row">
    <div class="col s12">
      <h4><?= $cat ?></h4>
      <?php
        foreach($member AS $data):
      ?>
        <div class="col s12 m3">
          <h6 class="<?= $data['category'] ?>"><?= $data['job'] ?></h6>
          <img src="img/<?= $data['avatar'] ?>" alt="Photo de <?= $data['name'] ?>">
          <p><?= $data['name'] ?></p>
        </div>
      <?php
        endforeach;
      ?>
    </div>
  </div>
  <?php
    endforeach;
  ?>
</div>


<pre>
<?php

echo '<br />$pageData<br />';
var_dump($pageData);

echo '<br />$direction<br />';
print_r($team);

?>
</pre>
