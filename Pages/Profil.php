<?php require_once "Entete.php";?>

<?php
    if(isset($_SESSION["id_utilisateur"]) && $_SESSION["id_utilisateur"] > 0) {
        
        $idUtilisateur = $_SESSION["id_utilisateur"];
        $Utilisateur = new Utilisateur($idUtilisateur);
        $nomUtilisateur = $Utilisateur->getNom();
        $prenomUtilisateur = $Utilisateur->getPrenom();
        $pseudoUtilisateur = $Utilisateur->getPseudo();
        $emailUtilisateur = $Utilisateur->getEmail();
        $avatarUtilisateur = $Utilisateur->getAvatar();

?>
        <div class="container">
            <div align="center" class="mt-4 mb-4">

                <?php if(!empty($avatarUtilisateur)) { ?>
                    <img src="../Images/Utilisateurs/<?=$avatarUtilisateur;?>" class="avatar">
                <?php
                } else {
                ?>
                <img src="../Images/avatar.png" width="150px" height="150px"style="border-radius : 25%">
                <?php } ?>
                <h1 class="mb-4"><?=$pseudoUtilisateur?></h1>
                    <div class="profil shadowCard">
                        <p class="mt-4">Nom : <?=$nomUtilisateur?></p>
                        <p class="mt-4">Prénom : <?=$prenomUtilisateur?></p>
                        <p class="mt-4">Email : <?=$emailUtilisateur?></p>
                        <p class="mt-4">Pseudo : <?=$pseudoUtilisateur?></p>
                        <a href="EditProfil.php" class="btn button-login mb-2 mt-4">Editer votre Profil</a>
                        <a href="Notes.php" class="btn button-login mb-2 mt-4">Consulter mes notes</a>
                        <a href="../Traitements/Deconnexion.php" class="btn button-deco mb-2 mt-4">Deconnexion</a>
                    </div>
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