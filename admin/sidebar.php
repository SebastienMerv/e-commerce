<head>
  <link href="../Css/sidebar.css" rel="stylesheet">

</head>

<body>
  <div class="sidebar">
    <div class="title">
      <h1>STATRAN</h1>
    </div>

    <div class="sidebar-wrapper">
      <ul>
        <li><a href="admin.php">Accueil</a></li>
        <li><a href="articles.php">Gérer les articles</a></li>
      </ul>
      <div class="bottom">
        
        <div class="cardm">
          
          <div class="card">
            
            
            <svg class="weather" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" xml:space="preserve">
              <image id="image0" width="100" height="100" x="0" y="0" href="../assets/profil.png"></image>
            </svg>
            <div class="main"><?= $_SESSION["surname"] ?></div>
            <div class="main"><?= $_SESSION["name"] ?></div>

          </div>

          <div class="card2">
            <div class="upper">
            <a href="../membres/profil.php">Retour au profil</a>

            </div>

            <div class="lower">
              <div class="aqi">
                <svg class="aqisvg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" xml:space="preserve">
                  <image id="image0" width="20" height="20" x="0" y="0" href="../assets/adresse.png"></image>
                </svg>
                <div class="aqitext">Rue de velaine 162<br>5300 Andenne</div>
              </div>

              <div class="realfeel">

              </div>
            </div>
          </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>
  </div>
</body>