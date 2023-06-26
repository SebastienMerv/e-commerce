<?php

session_start();

require_once('../class/products.php');
$products = New Products();

if (isset($_POST["idproduct"])) {
    $query = "DELETE FROM products WHERE id = :idproduct";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['idproduct' => $_POST["idproduct"]]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    unlink('../img/'.$_POST["imgproduct"]);
    }

$data = $products->Getall();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/reset.css" rel="stylesheet">
    <link href="../Css/articles.css" rel="stylesheet">
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
    <div class="tout">
        <h2>Articles</h2>
        <a class="add" href="AddProduct.php">Ajouter</a>
    </div>



    <div class="table">
        <table>
            <th>Image</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>


            <?php foreach ($data as $row) : ?>
                <tr>    
                    <form action="ModifyProduct.php" method="post">
                    <td><img src="../img/<?= $row["img"] ?>"></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["description"] ?></td>
                    <td><?= $row["price"] ?></td>
                    <input type="hidden" name="idproduct" value="<?=$row["id"]?>"> 
                    <input type="hidden" name="imgproduct" value="<?=$row["img"]?>">
                    <input type="hidden" name="nameproduct" value="<?=$row["name"]?>">
                    <input type="hidden" name="descproduct" value="<?=$row["description"]?>"> 
                    <input type="hidden" name="priceproduct" value="<?=$row["price"]?>">   
                    <td><button type="submit" class="modifier">Modifier</button></td>
                    </form>
                    <form action="" method="post">
                    <input type="hidden" name="idproduct" value="<?=$row["id"]?>">
                    <input type="hidden" name="imgproduct" value="<?=$row["img"]?>">
                    <td><button class="noselect"><span class="text">Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button></td>
                    </form>
                    
                </tr>
            <?php endforeach ?>
        </table>
        <?php if (isset($_GET["success"])) {
        echo '<div class="cardone">
        <div class="img"></div>
        <div class="textBox">
          <div class="textContent">
            <p class="h1">Modification</p>
            <span class="span">Il y a quelque secondes...</span>
          </div>
          <p class="p">Les modifications ont étés effectuées.</p>
        <div>
      </div></div></div>';
    }?>
    </div>
    

    <?php (include_once("script.php")); ?>

    <?php (include_once('../membres/iflogged.php')) ?>
    <?php (include_once("ifadmin.php")) ?>
</body>

</html>