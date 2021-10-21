<?php require_once "Entete.php";?>

<?php
    if(isset($_SESSION["id_utilisateur"]) && $_SESSION["id_utilisateur"] > 0) {
        
        $id = $_SESSION["id_utilisateur"];
        $Utilisateur = new Utilisateur($id);
        $pseudoUtilisateur = $Utilisateur->getPseudo();
    }
?>


<div class="container">
    <div align="center" class="mt-4 mb-4">
        <h1><?php echo $pseudoUtilisateur?></h1>
    </div>
    <div class="profil">
        <p class="text-danger">nom : test</p>

    </div>

</div>
    

<?php require_once "Pied.php"?>