<?php require_once "Entete.php";?>

<?php if(isset($_GET["id"]) && !empty($_GET["id"])) {

    $idMatiere = $_GET["id"];
    $Cours = new Cours();
    $ListeCours = $Cours->getCours($idMatiere);?>

<div align="center" class="mt-5">
        <h1>Voici toutes les chapitres</h1>
</div>
<div class="container mt-5">

    <?php foreach($ListeCours as $cours) { ?>
        
            <div class="card text-white bg-dark mb-3 shadowCard">
                <div class="card-body">
                    <h5 class="card-title"><?=$cours["titre"]?></h5>
                    <a href="Cours.php?id=<?=$cours["id_cours"]?>" class="btn button-login shadowCard">VOIR LE COURS !</a>
                </div>
            </div>
    <?php } ?>
</div>



<?php } else {
    header("location:../Pages/NosBts.php");
}?>

<?php require_once "Pied.php";?>