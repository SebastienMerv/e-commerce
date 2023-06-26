<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/reset.css" rel="stylesheet">
    <link href="../Css/acessdenied.css" rel="stylesheet">
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

    <div class="middle">
        <div class="left">
        <h1 class="title">STATRAN</h1>
        <img src="../assets/secret.png" alt="ACESS REFUSE">
        </div>
        <h2>Accès Refusé</h2>
        <p>Vous devez disposer des privilèges d’administrateur pour
            accéder à cet page, hors ce n’est pas le cas.</p>

        <a class="return" onclick="history.back()" href="#">Retour</a>
    </div>

    <?php (include_once("script.php")); ?>


</body>
</html>