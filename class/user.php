<?php

class User
{
    function GetUserData($email)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");


        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }


    function updateProfil($email, $name, $surname, $adress, $usermail)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");
        $query = "SELECT * FROM users where email = :mail";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['mail' => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data != false) {
            header('Location: profil.php?erreur=account');
        } else {
        $query = "UPDATE `users`SET `email`=?, `name`=?, `surname`=?, `adress`=?  WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email, $name, $surname, $adress, $usermail]);
        $update = 1;
        $_SESSION["email"] = $email;
        return $update;
        }
    }
    function resetPassword($account, $password)
    {
        // Connexion à la base de donnée
        $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
        $pdo->exec("SET NAMES UTF8");
        $query = "SELECT * FROM activation where code = :code";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['code' => $account]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $uid = $data["user_id"];

        if (isset($data["id"])) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $query = "UPDATE `users`SET `password`=? WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$hash, $uid]);
            header('Location: login.php');

            $query = "DELETE FROM `activation` WHERE code = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$account]);
        } else {
            echo 'Code de récupération invalide';
        }
    }
}
