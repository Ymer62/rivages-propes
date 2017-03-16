<?php

// GET page
define('G_page', isset($_GET['page']) ? $_GET['page'] : '');

// Dispatcher
switch (G_page){
  case 'accompagnement': $page = 'accompaniment'; break;
  case 'batiment': $page = 'asBuilding'; break;
  case 'support-activites-mobilite-douce': $page = 'asSoftMobility'; break;
  case 'environnement': $page = 'asEnvironment'; break;
  case 'postuler': $page = 'candidate'; break;
  case 'contact': $page = 'contact'; break;
  case 'evenements': $page = 'events'; break;
  case 'presentation-historique': $page = 'presentHistoric'; break;
  case 'presentation-equipe': $page = 'presentTeam'; break;
  default: $page = 'home'; break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.min.css" rel="stylesheet">
    <title>Rivages Propres</title>
</head>
<body>

<?php

// Content
include 'pages/' . $page . '.php';

?>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/materialize.min.js" type="text/javascript"></script>
<script src="js/main.min.js" type="text/javascript"></script>
</body>
</html>
