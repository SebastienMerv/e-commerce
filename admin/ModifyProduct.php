<?php session_start();

$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
$pdo->exec("SET NAMES UTF8");

$max_height = 501;
$allowed_file_types = Array(
    "png",
    "jpg"
);


if (isset($_FILES["img"])) {
    try {
        // var_dump($_FILES);
        // die;
        // $image_info = getimagesize($_FILES["img"]["tmp_name"]);
        // $image_width = $image_info[0];
        // $image_height = $image_info[1];
        move_uploaded_file($_FILES["img"]["tmp_name"], "../img/" . $_FILES["img"]["name"]);
        $img = $_FILES["img"]["name"];
        
    } catch (\Throwable $th) {
        echo("<p style=\"color: red\">".$th->getMessage()."</p>");
    };
}

if (isset($_POST["submit"])) {
    $query = "UPDATE `products`SET `name`=?, `description`=?, `price`=?, `img`=?  WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST["name"], $_POST["desc"], $_POST["price"], $img, $_POST["idproduct"]]);
    header('Location: articles.php?success=true');

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/reset.css" rel="stylesheet">
    <link href="../Css/products.css" rel="stylesheet">
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
    <link href="../Css/sidebar.css" rel="stylesheet">
</head>

<body>
    <?php (include_once("sidebar.php")) ?>
    <?php (include_once('../membres/iflogged.php')) ?>
    <?php (include_once("ifadmin.php")) ?>
    <div class="tout">
        <h2>Produits</h2>
    </div>
    <div class="informations">
        <h3>Modification de produit :</h3>
        <form enctype="multipart/form-data" action="#" name="article" method="post">
        <div class="input">
            <label for="name">Nom de l'article :</label>
            <input value="<?=$_POST["nameproduct"]?>" name="name" required>
            <label for="desc">Description de l'article :</label>
            <input value="<?=$_POST["descproduct"]?>" row="3" name="desc" required>
            <label for="price">Prix :</label>
            <input value="<?=$_POST["priceproduct"]?>" name="price">
            <input type="hidden" name="idproduct" value="<?=$_POST["idproduct"]?>" required> 
            <button class="submit" name="submit">Envoyer</button>
        </div>
        <div class="img">
            <div class="uploader">
            <input type="file" name="img" id="imgInput" required>
            </form>
            </div>
        </div>
    </div>
</body>

</html>