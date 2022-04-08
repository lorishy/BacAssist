<?php require_once "Entete.php";?>

<?php if(isset($_GET["id"]) && !empty($_GET["id"])) {

    $idMatiere = $_GET["id"];
    $Cours = new Cours();
    $ListeCours = $Cours->getCours($idMatiere);?>
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Chapitres</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Liste des chapitres</p>
    </div>
<div class="container mt-5">
    <?php foreach($ListeCours as $cours) { ?>
            <div class="card-chapitre mb-3">
                <div>
                    <h5 class="card-title"><?=$cours["titre"]?></h5>
                    <a href="Cours.php?id=<?=$cours["id_cours"]?>" class="btn div-btn-base mt-2">Voir le cours</a>
                </div>
            </div>
    <?php } ?>
</div>



<?php } else {
    header("location:../Pages/NosBts.php");
}?>

<?php require_once "Pied.php";?>