<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Css/styleindex.css" rel="stylesheet">
    <link href="Css/reset.css" rel="stylesheet">
    <title>Statran - Accueil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mogra&display=swap" rel="stylesheet">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <?php (include_once('navbar.php')); ?>

    <div class="rectangle blanc">
        <div class="barre">
            <a class="title2">Bienvenue sur la boutique<br>Officielle Statran<br><br><br></a>


            <img src="assets/welcome.png" class="welcome">

        </div>
        <a class="button" href="products/discover.php">Découvrir</a>

    </div>
</body>

</html>