<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/materialize.css" rel="stylesheet">

    <?php
    if(ADMIN):
    ?>
    <link href="wysiwyg/css/materialNote.min.css" rel="stylesheet">
    <link href="wysiwyg/css/codeMirror/codemirror.min.css" rel="stylesheet">
    <link href="wysiwyg/css/codeMirror/monokai.min.css" rel="stylesheet">
    <?php
    endif;
    ?>

    <link href="css/main<?= isset($_GET['design']) ? $_GET['design'] : '' ?>.min.css" rel="stylesheet">
    <?php if (PAGE === 'as_softmobility'): ?>
    <link href="css/cycleco.min.css" rel="stylesheet">
    <?php endif; ?>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <?php
    if(ADMIN):
    ?>
    <script type="text/javascript" src="wysiwyg/js/ckMaterializeOverrides.min.js"></script>
    <script type="text/javascript" src="wysiwyg/lib/codeMirror/codemirror.min.js"></script>
    <script type="text/javascript" src="wysiwyg/lib/codeMirror/xml.min.js"></script>
    <script type="text/javascript" src="wysiwyg/js/materialNote.min.js"></script>
    <?php
    endif;
    ?>

    <title><?= (!G_noData && PAGE != '404' ? $pageData['head_title'] : 'Rivages Propres') ?></title>
    <meta name="description" content="<?= (!G_noData && PAGE != '404' ? $pageData['head_meta_desc'] : '') ?>">
    <meta name="author" content="Simplon BSM - [Frédéric, Quentin, Thomas, Rémy]">
    <?php if(!G_noData && PAGE != '404'): ?>
    <meta name="robots" content="all">
    <?php else: ?>
    <meta name="robots" content="none">
    <?php endif; ?>

    <style>
      a, nav a, nav ul a, .side-nav a,.dropdown-content li>a { color: <?= $pageData['c_links'] ?>; }
      a:hover, nav a:hover, .dropdown-content li>a:hover { color: <?= $pageData['c_links_hover'] ?>; }
      a:active,nav a:active, .dropdown-content li>a:active { color: <?= $pageData['c_links_active'] ?>; }

      .btn,.side-nav a.btn{ background-color: <?= $pageData['c_buttons'] ?>; color: <?= $pageData['c_buttons_text'] ?>; }
      .btn:hover,.side-nav a.btn:hover{ background-color: <?= $pageData['c_buttons_hover'] ?>; }
      .btn:active,.side-nav a.btn:active{ background-color: <?= $pageData['c_buttons_active'] ?>; }

      h1,h2,h3{ color: <?= $pageData['c_titles'] ?>; }
    </style>
</head>
<body>
