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

    <link href="css/main.min.css" rel="stylesheet">
    <link href="css/thomas.css" rel="stylesheet">
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

    <script src="js/main.min.js" type="text/javascript"></script>

    <title>Rivages Propres</title>
</head>
<body>
