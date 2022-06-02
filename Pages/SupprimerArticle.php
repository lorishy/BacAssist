<?php require_once "Entete.php";

$idUtilisateur = $_SESSION["id_utilisateur"];
$idArticle = $_GET["id"];
$Article = new Article($idArticle);
$idUtilisateurArticle = $Article->getIdUtilisateur();
if(isset($_GET['id']) && !empty($_GET['id']) && $idUtilisateur == $idUtilisateurArticle->getIdUtilisateur()) { ?>
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Supprimer</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Simpression</p>
    </div> 
    <div class="container container-small text-center">
        <h3>Êtes-vous sûr de vouloir supprimer votre article ?</h3>
        <form class="mt-4" method="POST" action="../Traitements/SupprimerArticle.php?id=<?=$idArticle?>">
            <input type="submit" name="supprimer" class="btn button-deco" value="Oui">
            <input type="submit" name="cancel" class="btn div-btn-base" value="Revenir sur mes articles">
        </form>
        <?php if(isset($_GET["sup"]) && $_GET["sup"] == "error") {
            echo "<div class='mt-2 text-danger'>Erreur lors de la suppression du compte !</div>";
        }?>
    </div>

<?php } else {
    header("location:/Index.php");
}

require_once "Pied.php";?>