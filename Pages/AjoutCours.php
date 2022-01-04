<?php require_once "Entete.php";

if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) { 
    
    $Matiere = new Matiere(); 
    $listeMatiere = $Matiere->getAllMatiere();?>

<div class="container mt-4">
    <h2 class="text-align text-center">Ajout d'un cours</h2>
    <form  class="mt-4" method="POST" action="../Traitements/AjoutCours.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" class="form-control" name="titre" placeholder="Entrez le nom du cours">
        </div>
        <div class="mb-3">
            <label class="form-label">Matière :</label>
            <select class="form-select" aria-label="Default select example" name="matiere">
                <option selected disabled>Choisissez la matière du cours</option>
                <?php foreach ($listeMatiere as $matiere) { ?>
                    <option value="<?=$matiere["id_matiere_bts"];?>"><?=$matiere["libelle"];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Contenu : <span class="text-secondary">(Format PDF)</span></label>
            <input type="file" class="form-control" name="contenu">
        </div>
        <button type="submit" class="btn button-login mt-4" name="ajouter">Envoyer</button>
    </form>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "error") {
        echo "<div class='text-danger mt-4'>Erreur lors de l'ajout du cours !</div>";
    }?>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "empty") {
        echo "<div class='text-danger mt-4'>Tous les champs doivent être complétés !</div>";
    }?>
    <?php if(isset($_GET["error"]) && $_GET["error"] == "extension") {
        echo "<div class='text-danger mt-4'>Le fichier n'est pas au bon format !</div>";
    }?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "added") {
        echo "<div class='text-success mt-4'>Ajout du cours réussi !</div>";
    }?>
</div>
<?php } else {
    header("location:../Index.php");
}
require_once "Pied.php";