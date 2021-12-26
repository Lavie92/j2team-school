<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div id="body">
        <?php require_once './menu.php'?>
        <?php require_once './content.php' ?>
        <?php require_once './footer.php' ?>
    </div>
</body>
</html>