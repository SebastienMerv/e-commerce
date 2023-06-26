<?php

require_once('../function.php');
require_once('../class/user.php');
$user = new User();

session_start();

if (isset($_POST["recup"])) {
    if ($_POST["newmdp"] == $_POST["newmdpvalidate"]) {
        $user->resetPassword($_GET['account'], $_POST["newmdp"]);
    }
    else {
        echo 'Les deux mots de passe ne sont pas identiques';
    }
}

?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mes feueilles css  -->
    <link href="../Css/styleindex.css" rel="stylesheet">
    <link href="../Css/reset.css" rel="stylesheet">
    <link href="../Css/login.css" rel="stylesheet">
    <!-- TITRE  -->
    <title>Statran - Changer de mot de passe</title>
    <!-- FONTS  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mogra&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Besley:wght@600&display=swap" rel="stylesheet">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="center">
        <h1 class="title">Récupération de mot de passe</h1>
        <form method="post" action="">
            <input class="input" name="newmdp" placeholder="Nouveau mot de passe" required type="password">
            <input class="input" name="newmdpvalidate" placeholder="Nouveau mot de passe" required type="password">
            <input type="submit" class="inscription" name="recup" value="Récupérer">
        </form>
    </div>
</body>

</html>