<?php require_once "Entete.php";

$idUtilisateur = $_SESSION["id_utilisateur"];
$idArticle = $_GET["id"];
$Article = new Article($idArticle);
$idUtilisateurArticle = $Article->getIdUtilisateur();
if(isset($_GET['id']) && !empty($_GET['id']) && $idUtilisateur == $idUtilisateurArticle->getIdUtilisateur()) { ?>

    <div class="container mt-4 text-center">
        <h1>Êtes-vous sûr de vouloir supprimer votre article ?</h1>
        <form class="mt-4" method="POST" action="../Traitements/SupprimerArticle.php?id=<?=$idArticle?>">
            <input type="submit" name="supprimer" class="btn button-deco" value="Oui">
            <input type="submit" name="cancel" class="btn button-login" value="Revenir sur mes articles">
        </form>
        <?php if(isset($_GET["sup"]) && $_GET["sup"] == "error") {
            echo "<div class='mt-2 text-danger'>Erreur lors de la suppression du compte !</div>";
        }?>
    </div>

<?php } else {
    header("location:/Index.php");
}

require_once "Pied.php";?>