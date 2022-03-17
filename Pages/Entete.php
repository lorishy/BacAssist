<?php require_once "../Modeles/Modele.php";
if(isset($_COOKIE["BtsAssist"])){

  $BtsAssist = $_COOKIE["BtsAssist"];
  $BtsAssist = explode('-',$BtsAssist);
  $idUtilisateur = $BtsAssist[0];
  $Utilisateur = new Utilisateur($idUtilisateur);
  $tokenExiste = $Utilisateur->getToken();

  if($BtsAssist[1] == $tokenExiste) {
      $Utilisateur->initialiserConnexion();
  } else {
    setcookie("BtsAssist",'', time() -3600, "/");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
      src="https://kit.fontawesome.com/e2c7c393eb.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/png" href="../Images/favicon.png" sizes="16x16"/>
    <title>BtsAssist</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8CDD2PK01C"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-8CDD2PK01C');
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">
      <img src="../Images/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">BtsAssist
    </a>
      <!-- Bouton du responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <!-- Liens dans la navbar -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="../Pages/NosBts.php">Nos BTS</a>
                <?php if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) { ?>
                  <a class="nav-item nav-link" href="../Pages/AjoutCours.php">Ajouter un cours</a>
                  <a class="nav-item nav-link" href="../Pages/AjoutExercice.php">Ajouter un exercice</a>
                  <a class="nav-item nav-link" href="../Pages/MesArticles.php">Mes Articles</a>
                <?php } ?>
                <?php if(isset($_SESSION["email"])) {?>
                    <a class="nav-item nav-link" href="../Pages/Profil.php">Profil</a>
                    <a class="nav-item nav-link" href="../Traitements/Deconnexion.php">Deconnexion</a>
                <?php } else { ?>
                    <a class="nav-item nav-link" href="../Pages/Inscription.php">Inscription</a>
                    <a class="nav-item nav-link" href="../Pages/Connexion.php">Connexion</a>
                <?php } ?>
            </div>
        </div>
  </div>
</nav>
