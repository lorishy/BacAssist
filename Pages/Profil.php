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
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Profil</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Votre profil</p>
    </div> 
        <div class="container container-small">
            <div align="center">
                <?php if(!empty($avatarUtilisateur)) { ?>
                    <img class="avatar" src="../Images/Utilisateurs/<?=$avatarUtilisateur;?>">
                <?php
                } else {
                ?>
                <img src="../Images/avatar.png" width="150px" class="avatar">
                <?php } ?>
                <h1 class="mb-4"><?=$pseudoUtilisateur?></h1>
                    <div class="">
                        <p class="mt-4">Nom : <?=$nomUtilisateur?></p>
                        <p class="mt-4">Prénom : <?=$prenomUtilisateur?></p>
                        <p class="mt-4">Email : <?=$emailUtilisateur?></p>
                        <p class="mt-4">Pseudo : <?=$pseudoUtilisateur?></p>
                        <a href="EditProfil.php" class="btn button-login mb-2 mt-4">Editer votre Profil</a>
                        <a href="Notes.php" class="btn div-btn-base mb-2 mt-4">Consulter mes notes</a>
                        <a href="../Traitements/Deconnexion.php" class="btn button-deco mb-2 mt-4">Deconnexion</a>
                    </div>
            </div>

        </div>

<?php } else { ?>
<div class="container larger-padding-top">
    <div class="alert alert-warning" role="alert">
        Vous devez être connecté pour accéder à cette page,
        <span><a class="link-primary" href="../Pages/Connexion.php">connectez vous !</a></span>
    </div>
    <div class="alert alert-warning" role="alert">
        Si vous n'êtes pas encore inscrit, 
        <span><a class="link-primary" href="../Pages/Inscription.php">inscrivez vous !</a></span>
    </div>
</div>
</section>
<?php } ?>
 

<?php require_once "Pied.php"?>