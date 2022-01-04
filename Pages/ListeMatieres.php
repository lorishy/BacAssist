<?php require_once "Entete.php";

if(isset($_GET["id"])) {

    // Executer la requête d'affichage des matières avec les options
    $idOption = $_GET["id"];
    $Matiere = new Matiere();
    $ListeMatiereOption = $Matiere->getListeMatieresOption($idOption);?>

    <div align="center" class="mt-5">
        <h1>Voici toutes les matières</h1>
    </div>
    <div class="container mt-5">
        <div class="row">

            <?php foreach($ListeMatiereOption as $matiere) { ?>
        
                <div class="col-md-6">
                    <div class="card text-white bg-dark mb-3 shadowCard">
                        <div class="card-body">
                            <h5 class="card-title"><?=$matiere["libelle"]?></h5>
                            <a href="Matiere.php?id=<?=$matiere["id_matiere_bts"]?>" class="btn button-login shadowCard">VOIR LES CHAPITRES !</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php } else if(isset($_GET["idBts"])) {

    // Executer la requête d'affichage des matières sans option
    $idBts = $_GET["idBts"];
    $Matiere = new Matiere();
    $ListeMatiere = $Matiere->getListeMatieres($idBts);?>

    <div align="center" class="mt-5">
        <h1>Voici toutes les matières</h1>
    </div>
    <div class="container mt-5">
        <div class="row">

            <?php foreach($ListeMatiere as $matiere) { ?>
        
                <div class="col-md-6">
                    <div class="card text-white bg-dark mb-3 shadowCard">
                        <div class="card-body">
                            <h5 class="card-title"><?=$matiere["libelle"]?></h5>
                            <a href="Matiere.php?id=<?=$matiere["id_matiere_bts"]?>" class="btn button-login shadowCard">VOIR LES CHAPITRES !</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



<?php } else {
    header("location:../Pages/NosBts.php");
}
?>
<?php require_once "Pied.php";?>