<?php

class Products
{
    function Getall()
    {
        // Connexion à la base de donnée
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");
        $query = "SELECT * FROM products";
        $stmt = $pdo->prepare($query);
        $stmt->execute([]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function SeeOneArticle($id)
    {
        // Connexion à la base de donnée
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");

        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function addToCart($email, $idproduct)
    {
        // Connexion à la base de donnée
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");

        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $uid = $data["id"];

        $sql = "INSERT INTO panier (`user`, `product`) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$uid, $idproduct]);
        header("Location: ../membres/panier.php");
    }
}
