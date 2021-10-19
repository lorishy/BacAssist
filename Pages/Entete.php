<?php require_once "../Modeles/Modele.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/png" href="../Images/favicon.png" sizes="16x16"/>
    <title>BtsAssist</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../Index.php">
      <img src="../Images/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">BtsAssist
    </a>
      <!-- Bouton du responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <!-- Liens dans la navbar -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">Cours</a>
                <a class="nav-item nav-link" href="#">Quizz</a>
                <?php if(isset($_SESSION["email"])) {?>
                    <a class="nav-item nav-link" href="#">Profil</a>
                    <a class="nav-item nav-link" href="../Traitements/Deconnexion.php">Deconnexion</a>
                <?php } else { ?>
                    <a class="nav-item nav-link" href="../Pages/Inscription.php">Inscription</a>
                    <a class="nav-item nav-link" href="../Pages/Connexion.php">Connexion</a>
                <?php } ?>
            </div>
        </div>
  </div>
</nav>
