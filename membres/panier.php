<?php 

session_start();

require_once('../class/panier.php');
require_once('../class/user.php');
$panier = new Panier();
$user = New User();

$userdata = $user->GetUserData($_SESSION["email"]);

$total = 0;


if (isset($_POST["idproduct"])) {
    $panier->delete($_POST["idproduct"], $total);
}




$uid = $userdata["id"];

$data = $panier->ViewPanierUser($uid);

$total = 0;

if(isset($_POST["submit"])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mes feueilles css  -->
    <link href="../Css/styleindex.css" rel="stylesheet">
    <link href="../Css/reset.css" rel="stylesheet">
    <link href="../Css/stylepanier.css" rel="stylesheet">
    <!-- TITRE  -->
    <title>Statran - Panier</title>
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
<?php (include_once('../navbar.php')) ?>
<?php (include_once('../membres/iflogged.php')) ?>
    <div class="cart">
        <a class="title">MON PANIER</a><br>
        <table>
        <?php foreach ($data as $row) : ?>
                <tr>
                    <td><img src="../img/<?=$row["img"]?>"></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["description"]?></td>
                    <form action="" method="post">
                    <td><input type="hidden" name="idproduct" value="<?=$row["product"]?>"></td>
                    <?php $total += $row["price"];?>
                    <td><button class="noselect" type="submit" name="submit"><span class="text">Delete</span><span class="icon" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path></svg></span></button></td>
                    </form>
                </tr>  
                <?php endforeach ?>
        </table>
    </div>
    <form method="post" action="">
    <div class="delivry">
        <a class="title">TOTAL - <?=$total?>€</a><br>
        <a class="sub">Livraison</a>
        <select class="select" name="livraison">
        <option>Standard - Gratuit</option>
        <option>Livré demain - 5€</option>
        </select>
        <input type="submit" class="BuyNow" href="NOTFOUD.PHP" name="submit" value="Acheter maintenant">
        </form>
    </div>

</body>
</html>