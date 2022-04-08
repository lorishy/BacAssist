<?php require_once "Entete.php";

if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["idBts"]) && !empty($_GET["idBts"])) {

    // Executer la requête d'affichage des matières avec les options
    $idBts = $_GET["idBts"];
    $idOption = $_GET["id"];
    $Matiere = new Matiere();
    $ListeMatiereOption = $Matiere->getListeMatieresOption($idBts, $idOption);?>

<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Matières</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Liste des matières</p>
    </div>
    <div class="container mt-5">
        <div class="row">

            <?php foreach($ListeMatiereOption as $matiere) { ?>
        
                <div class="col-lg-4 col-md-6"">
                    <div class="card-bts mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?=$matiere["libelle"]?></h5>
                            <span class="section-separator"></span>
                            <p class="card-text">Visionner tout les chapitres du <?=$matiere["libelle"]?>.</p>
                            <a href="Matiere.php?id=<?=$matiere["id_matiere_bts"]?>" class="btn div-btn-base">Accedez aux chapitres</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php } else if(isset($_GET["idB"]) && !empty($_GET["idB"])) {

    // Executer la requête d'affichage des matières sans option
    $idBts = $_GET["idB"];
    $Matiere = new Matiere();
    $ListeMatiere = $Matiere->getListeMatieres($idBts);?>

<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Matières</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Liste des matières</p>
    </div>

    <div class="container mt-5">
        <div class="row">

            <?php foreach($ListeMatiere as $matiere) { ?>
        
                <div class="col-lg-4 col-md-6">
                    <div class="card-bts mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?=$matiere["libelle"]?></h5>
                            <span class="section-separator"></span>
                            <p class="card-text">Visionner tout les chapitres du <?=$matiere["libelle"]?>.</p>
                            <a href="Matiere.php?id=<?=$matiere["id_matiere_bts"]?>" class="btn div-btn-base">Accedez aux chapitres</a>
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