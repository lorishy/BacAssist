<?php require_once "Entete.php";

if(empty($_SESSION["id_utilisateur"]) || $_GET["id"] != $_SESSION["id_utilisateur"]) {
    header("location:../Pages/Profil.php");
}
?>
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Supprimer</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Simpression</p>
    </div> 
    <div class="container container-small text-center">
    <h3>Êtes-vous sûr de vouloir supprimer votre compte ?</h3>
    <form class="mt-4" method="POST" action="../Traitements/Supprimer.php">
        <input type="submit" name="supprimer" class="btn button-deco" value="Oui">
        <input type="submit" name="cancel" class="btn button-login" value="revenir sur le profil">
    </form>
    <?php if(isset($_GET["sup"]) && $_GET["sup"] == "error") {
        echo "<div class='mt-2 text-danger'>Erreur lors de la suppression du compte !</div>";
    }?>
</div>

<?php require_once "Pied.php";?>