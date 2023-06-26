<?php session_start() 






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/reset.css" rel="stylesheet">
    <link href="../Css/admin.css" rel="stylesheet">
    <title>Statran - Administration</title>
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
    <?php (include_once("sidebar.php")) ?>
    <?php (include_once("ifadmin.php")) ?>
    <?php (include_once('../membres/iflogged.php')) ?>
    <div class="tout">  
        <h2>Accueil</h2>     
    </div>
    <div class="carres">
    <div class="bienvenue">
        <h3>Bienvenue sur votre tableau de bord !</h3>
        <img src="../assets/content.png" alt="Bonhomme content sur ordinateur" class="content">
    </div>

</div>

<?php (include_once("script.php")); ?>
</body>
</html>