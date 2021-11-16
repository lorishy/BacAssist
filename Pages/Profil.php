<?php require_once "Entete.php";?>

<?php
    if(isset($_SESSION["id_utilisateur"]) && $_SESSION["id_utilisateur"] > 0) {
        
        $id = $_SESSION["id_utilisateur"];
        $Utilisateur = new Utilisateur($id);
        $pseudoUtilisateur = $Utilisateur->getPseudo();
        $nomUtilisateur = $Utilisateur->getNom();
        $avatarUtilisateur = $Utilisateur->getAvatar();
?>
        <div class="container">
            <div align="center" class="mt-4 mb-4">
                <h1><?php echo $pseudoUtilisateur?></h1>
            </div>
            <div class="profil">
                <p class="text-center m-auto">Nom : <?php echo $nomUtilisateur?></p>
                <img src="../Images/Utilisateurs/<?php echo $avatarUtilisateur;?>" width="150px" height="150px"style="border-radius : 25%">
                <a href="EditProfil.php" class="btn button-login">Editer votre Profil</a>
            </div>

        </div>

<?php } else { ?>

        <h1 class="text-center mt-4">Vous devez être connecté pour accéder à cette page, 
            <span><a class="link-primary" href="../Pages/Connexion.php">connectez vous !</a></span>
        </h1>
        <h1 class="text-center mt-4">Si vous n'êtes pas encore inscrit, 
            <span><a class="link-primary" href="../Pages/Inscription.php">inscrivez vous !</a></span>
        </h1>

<?php } ?>
 

<?php require_once "Pied.php"?>