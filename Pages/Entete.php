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
    <!-- jquery pour la nav -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-8CDD2PK01C');
    </script>
</head>
<body>

<!-- NAV DEBUT -->
<nav>
  <label class="logo">BTS Assist</label>
  <ul>
    <li>
      <a href="../Pages/Index.php">ACCUEIL</a>
    </li>
    <li>
      <a href="../Pages/FilActualite.php">FIL D'ACTUALITE</a>
    </li>
    <li>
      <a href="../Pages/NosBts.php">NOS BTS</a>
    </li>
    <?php if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) { ?>
      <li>
        <a href="../Pages/AjoutCours.php">AJOUTER UN COURS</a>
      </li>
      <li>
        <a href="../Pages/AjoutExercice.php">AJOUTER UN EXERCICE</a>
      </li>
      <li>
        <a href="../Pages/MesArticles.php">MES ARTICLES</a>
      </li>
    <?php } ?>
    <?php if(isset($_SESSION["email"])) {?>
      <li>
        <a href="../Pages/Profil.php">PROFIL</a>
      </li>
      <li>
        <a href="../Traitements/Deconnexion.php">DECONNEXION</a>
      </li>
    <?php } else { ?>
      <li>
        <a href="../Pages/Connexion.php">CONNEXION</a>
      </li>
      <li>
        <a href="../Pages/Inscription.php">INSCRIPTION</a>
      </li>
    <?php } ?>
  </ul>
  <label id="icon">
    <i class="fas fa-bars"></i>
  </label>
</nav>
<!-- NAV FIN -->