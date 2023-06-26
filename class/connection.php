<?php

class connection
{
    function login($email, $password)
    {
        // Connexion à la base de donnée
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");

        $query = "SELECT * FROM users where email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $data["password"])) {

            $_SESSION["logged_in"] = true;
            $_SESSION["email"] = $data["email"];
            $_SESSION["name"] = $data["name"];
            $_SESSION["surname"] = $data["surname"];
            header('Location: profil.php');
        } else {
            $error = 'mdp';
            return $error;
        }
    }
    function signup($email, $password)
    {
        // Connexion à la base de donnée
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");


        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
        $query = "SELECT * FROM users where email = :mail";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['mail' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data != false) {
            header("Location: profil.php?erreur=account");
        } else {
            $sql = "INSERT INTO users (`email`, `password`) VALUES (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $passwordhash]);
            header("Location: login.php");
        }
    }
}
