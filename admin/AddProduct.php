<?php session_start();

$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
$pdo->exec("SET NAMES UTF8");



if (isset($_FILES["img"])) {
    try {
        move_uploaded_file($_FILES["img"]["tmp_name"], "../img/" . $_FILES["img"]["name"]);
        $img = $_FILES["img"]["name"];
        
    } catch (\Throwable $th) {
        echo("<p style=\"color: red\">".$th->getMessage()."</p>");
    };
}

if (
    isset($_POST['Envoyer'])
) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $sql = "INSERT INTO products (`name`, `description`, `price`, `img`) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $description, $price, $img]);
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
    <form enctype="multipart/form-data" action="#" name="article" method="post">
        <h3>Ajout de produit :</h3>
        <form method="post" action="">
        <div class="input">
        <label for="name">Nom de l'article :</label>
        <input value="" name="name" required>
        <label for="description">Description de l'article :</label>
        <input value="" name="description" required>
        <label for="price">Prix :</label>
        <input value="" name="price" required>
        <input type="submit" value="Envoyer" class="submit" name="Envoyer">
        </div>        
        <div class="img">
            <div class="uploader">
            <input type="file" name="img" id="imgInput" required>
            </div>
            
        </div>
        </form>
    </div>
</body>
</html>