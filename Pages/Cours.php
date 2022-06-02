<?php require_once "Entete.php";?>

<?php if(isset($_GET["id"])) {

    $idCours = $_GET["id"];
    $Cours = new Cours($idCours);
    $titreCours = $Cours->getTitreCours();
    $contenuCours = $Cours->getContenuCours();?>
    <section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Cours</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Cours simplifié</p>
    </div>
    <div class="container text-center">
        <h5><?=$titreCours?></h5>
        <embed class="pdf" src="../CoursPDF/<?=$contenuCours;?>"type='application/pdf'/>
    </div>
    <div class="mt-5 text-center">
        <a class="btn btn-pagination" href="ListeExercice.php?id=<?=$idCours?>">Entrainez-vous !</a>
    </div>
</div>

<?php } else {
    header("location:../Pages/NosBts.php");
}


?>
<?php require_once "Pied.php";?>