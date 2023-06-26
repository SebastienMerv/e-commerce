<?php


class Panier
{
    function delete($productid, $total)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");

        $query = "DELETE FROM panier WHERE product = :idproduct";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['idproduct' => $_POST["idproduct"]]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $total -= $data["price"];
        header('Location: panier.php');
    }

    function ViewPanierUser($uid)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");


        $query = "SELECT * FROM panier INNER JOIN products ON panier.product = products.id WHERE panier.user = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $uid]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
