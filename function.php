<?php
function search($recherche)
{
    // Connexion à la base de donnée
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
    $pdo->exec("SET NAMES UTF8");

    $query = 'SELECT * FROM products WHERE name LIKE :recherche';
    $stmt = $pdo->prepare($query);
    $stmt->execute(['recherche' => $recherche]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}