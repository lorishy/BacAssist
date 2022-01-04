<?php require_once "Entete.php";?>

<?php if(isset($_GET["id"])) {

    $idCours = $_GET["id"];
    $Cours = new Cours($idCours);
    $titreCours = $Cours->getTitreCours();
    $contenuCours = $Cours->getContenuCours();?>

<div class="container mt-5">
    <div align="center">
        <h1 class="text-uppercase mb-5 titleCours"><?=$titreCours?></h1>
        <embed class="pdf" src="../CoursPDF/<?=$contenuCours;?>" width="100%" height="800" type='application/pdf'/>
    </div>
    <div class="mt-5">
        <a href="#">Exercecez-vous avec des exercices de ce chapitre</a>
    </div>
</div>

<?php } else {
    header("location:../Pages/NosBts.php");
}


?>
<?php require_once "Pied.php";?>