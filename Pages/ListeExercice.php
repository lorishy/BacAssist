<?php require_once "Entete.php";

if(!isset($_GET["id"]) && empty($_GET["id"])) {
    header("location:NosBts.php");
}

$idCours = $_GET["id"];
$Exercice = new Exercice();
$ListeExercice = $Exercice->getListeExercice($idCours);
?>

<div class="container mt-5">
    <div class="row">
        <?php
            foreach ($ListeExercice as $exercice) {?>
                <div class="col-md-3">
                    <div class="card text-white bg-dark mb-3 shadowCard">
                        <div class="card-header">Exercice</div>
                            <div class="card-body">
                                <h5 class="card-title"><?=$exercice["titre"]?></h5>
                                <a href="Exercice.php?id=<?=$exercice["id_exercice"]?>" class="btn button-login">S'EXERCER !</a>
                            </div>
                    </div>
                </div>
        <?php } ?>
    </div>
</div>

<?php require_once "Pied.php"?>
