<?php 

require_once('../class/products.php');

session_start();

$products = new Products();
$data = $products->Getall();


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/styleindex.css" rel="stylesheet">
    <link href="../Css/stylediscover.css" rel="stylesheet">
    <link href="../Css/reset.css" rel="stylesheet">
    <title>Statran - Discover</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Besley:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <?php (include_once('../navbar.php')) ?>
        <a class="categories">PRODUITS</a><br>
        <br>
        <?php foreach($data as $row): ?>
        <div class="article">
        <img src="../img/<?=$row["img"]?>">
        <a class="desc"><?=$row["name"]?> <br><a><?=$row["price"]?></a>
        <br>
        <a href="article.php?id=<?=$row["id"]?>" class="btn-btn">Ajouter au panier</a>


        </div>
        <?php endforeach ?>

        
</body>
</html>
