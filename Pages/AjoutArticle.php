<?php require_once "Entete.php";

if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) { ?>
    
<div class="container mt-4">
    <h2 class="text-center">Ajout d'un article</h2>
<?php if(isset($_GET['error']) && $_GET['error'] == 'error') {
    echo "<div class='text-danger'>Erreur lors de l'ajout de l'article</div>";
}
if(isset($_GET['error']) && $_GET['error'] == 'vide') {
    echo "<div class='text-danger'>Vous devez renseigner un titre et un contenu</div>";
}
if(isset($_GET['error']) && $_GET['error'] == 'extension') {
    echo "<div class='text-danger'>L'image n'est pas au bon format</div>";
}
if(isset($_GET['succes']) && $_GET['succes'] == 'added') {
    echo "<div class='text-success'>Votre article abien été ajouté !</div>";
}?>

    <form  class="mt-4" method="POST" action="../Traitements/AjoutArticle.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" class="form-control" name="titre" placeholder="Entrez un titre">
        </div>
        <div class="mb-3">
            <label class="form-label">Contenu :</label>
            <textarea class="form-control" name="contenu" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image : <span class="text-secondary">(Facultatif)</span></label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn button-login mt-4" name="poster">Poster l'article</button>
    </form>
</div>
<?php } else {
    header("location:../index.php");
}
require_once "Pied.php";