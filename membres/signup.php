<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', 'root');
$pdo->exec("SET NAMES UTF8");

require_once('../function.php');
require_once('../class/connection.php');

$connection = new Connection();


if (isset($_POST['Inscription'])) {
  $connection->signup($_POST["email"], $_POST["password"]);
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Mes feueilles css  -->
  <link href="../Css/styleindex.css" rel="stylesheet">
  <link href="../Css/reset.css" rel="stylesheet">
  <link href="../Css/login.css" rel="stylesheet">
  <!-- TITRE  -->
  <title>Statran - Inscription</title>
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

<body>
  <div class="center">
    <h1 class="title">STATRAN</h1>
    <?php if (isset($_GET["erreur"]) and $_GET["erreur"] == 'account') {
      echo '<div class="notifications-container">
            <div class="error-alert">
              <div class="flex">
                <div class="flex-shrink-0">
                  
                  <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="error-svg">
                    <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" fill-rule="evenodd"></path>
                  </svg>
                </div>
                <div class="error-prompt-container">
                  <p class="error-prompt-heading">Vous avez déjà un compte !
                  </p><div class="error-prompt-wrap">
                    <ul class="error-prompt-list" role="list">
                      <li>Erreur due au fait que cet boite mail est déjà utilisé. <a  class="no" href="login.php">Connexion</a></li>
                    </ul>
                </div>
                </div>
              </div>
            </div>
          </div><br><br>';
    }
    ?>
    <form method="post" action="">
      <input class="input" name="email" placeholder="Adresse E-MAIL" required>
      <input class="input" name="password" type="password" placeholder="Mot de passe" required>

      <input class="inscription" type="submit" value="Inscription" name="Inscription">
    </form>

    <a href="login.php" class="account">J'ai déjà un compte</a>
  </div>

</body>

</html>