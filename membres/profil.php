<?php

require_once('../function.php');
require_once('../class/user.php');
session_start();
$user = new User;


$data = $user->GetUserData($_SESSION["email"]);


$email = $data["email"];
$name = $data["name"];
$surname = $data["surname"];
$adress = $data["adress"];





if (isset($_POST["maj"])) {
    $update = $user->updateProfil($_POST["email"], $_POST["name"], $_POST["surname"], $_POST["adress"], $_SESSION["email"]);
    header('Location: profil.php');
}

if (isset($_POST['disconnect'])) {
    $_SESSION['logged_in'] = false;
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/styleindex.css" rel="stylesheet">
    <link href="../Css/reset.css" rel="stylesheet">
    <link href="../Css/profil.css" rel="stylesheet">
    <title>Statran - Profil</title>
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
    <?php (include_once('../navbar.php')) ?>

    <?php (include_once('iflogged.php')) ?>
    <div class="start">

        <a class="title">Bienvenue <?= $surname ?> <?= $name ?></a><br>
        <a class="sub">Ici, tu retrouvera toutes les informations de ton compte</a>

        <?php if ($data["admin"] == 1) {
            echo "<a class='maj' href='../admin/admin.php'>Panel administrateur</a>";
        }
        ?>
    </div>
    <div class="info">
        <form action="" method="post">
            <h5 class="information">Informations</h5><br>
            <label class="informations">Adresse EMAIL</label><br>
            <input type="email" class="input" value="<?= $email ?>" name="email"><br>
            <label class="informations">Nom</label><br>
            <input class="input" value="<?= $name ?>" name="name"><br>
            <label class="informations">Prénom</label><br>
            <input class="input" value="<?= $surname ?>" name="surname"><br>
            <label class="informations">Adresse complète</label><br>
            <input class="input" value="<?= $adress ?>" name="adress"><br>
            <button name="maj" class="maj">Mettre à jour</button>
        </form>
        <?php if (isset($update)) {
            echo '<div class="card">
            <div class="img"></div>
            <div class="textBox">
              <div class="textContent">
                <p class="h1">Mise à jour</p>
                <span class="span">Il y a quelque secondes...</span>
              </div>
              <p class="p">Les informations de votre compte ont étés mises à jour !</p>
            <div>
          </div></div></div>';
        }
        ?>

        <br>
        <form method="post" action="">
            <button class="deco" name="disconnect">Déconnexion</button>
            <button class="deco" name="deleteaccount">Supprimer mon compte</button>
        </form>
    </div>

</body>

</html>