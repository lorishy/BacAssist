<?php require_once "Entete.php";

if(!isset($_GET["id"]) && empty($_GET["id"])) {
    header("location:NosBts.php");
}

$idCours = $_GET["id"];
$Exercice = new Exercice();
$ListeExercice = $Exercice->getListeExercice($idCours);
?>
    <section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Exercice</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Entraînez-vous</p>
    </div>
<div class="container">
    <div class="row">
        <?php
            foreach ($ListeExercice as $exercice) {?>
                <div class="col-md-3">
                    <div class="card-chapitre mb-3">
                            <div>
                                <h5 class="card-title"><?=$exercice["titre"]?></h5>
                                <a href="Exercice.php?id=<?=$exercice["id_exercice"]?>" class="btn div-btn-base mt-2">S'exercer !</a>
                            </div>
                    </div>
                </div>
        <?php } ?>
    </div>
</div>

<?php require_once "Pied.php"?>
