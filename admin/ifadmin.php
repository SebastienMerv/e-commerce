<?php 
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
$pdo->exec("SET NAMES UTF8");



$query = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $_SESSION["email"]]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if($data['admin'] == 0) {
    header('Location: accessdenied.php');
}