<?php

require_once('../function.php');

session_start();


if (isset($_GET['s'])) {
    $data = search($_GET['s']);
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/styleindex.css" rel="stylesheet">
    <link href="../Css/stylediscover.css" rel="stylesheet">
    <link href="../Css/reset.css" rel="stylesheet">
    <title>Statran - Search</title>
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
    <form method="GET">
        <div class="input-container">
            <input type="text" name="s" class="input" placeholder="search...">
            <span class="icon">
                <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </span>
        </div>
        <input type="submit" name="envoyer">

    </form>





    <?php
    if (isset($data)) {
    if (count($data) > 0) {
        foreach ($data as $row) {
            echo '<div class="article">
            <img src="../img/' . $row['img'] . '" class="shirt">
            <a class="desc">' . $row['name'] . '<br><a>' . $row['price'] . '</a>
                <br>
                <a href="../products/article.php?id=' . $row['id'] . '" class="btn-btn">Ajouter au panier</a>
        </div>
        ';
        }
    } else {
        echo '<h1>Aucun article trouvé correspondant à votre recherche</h1>';
    }
}
    else {
        echo "<h1>Effectuez une recherche ! :')</h1>";
    }
    ?>

</body>

</html>