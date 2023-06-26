<?php

require_once('../function.php');
require_once('../class/products.php');

$products = new Products();

session_start();


    $data = $products->SeeOneArticle($_GET["id"]);
    $img = $data["img"];
    $desc = $data["description"];
    $name = $data["name"];
    $price = $data["price"];

if (isset($_POST['submit']))  {
    $products->addToCart($_SESSION["email"], $_GET["id"]);
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/styleindex.css" rel="stylesheet">
    <link href="../Css/article.css" rel="stylesheet">
    <link href="../Css/reset.css" rel="stylesheet">
    <title>Statran - Article</title>
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
    <div class="article">
        <img class="img" src="../img/<?=$img?>">
        <div class="body">
            <a class="title"><?=$name?></a><br>
            <a class="price"><?=$price?></a><br><br>
            <div class="Buy">
            <a class="BuyText" href="buy.php">Acheter maintenant</a>
            </div>
            <div class="AddToCart">
            <form action="" method="post">
            <button type="submit" class="AddToCartText" href="../membres/panier.php" name="submit">Ajouter au panier</button>
            </form>
            
            </div>
        </div>
    </div>

</body>
</html>