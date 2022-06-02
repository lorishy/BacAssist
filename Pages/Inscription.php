<?php require_once "Entete.php";

if(isset($_SESSION["id_utilisateur"])) {
    header("location:Index.php");
}
?>

<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Inscription</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">S'inscrire</p>
    </div>
    <div class="container container-small">
<div class="mt-4">
        <?php
            if(isset($_GET["erreur"]) && $_GET["erreur"] == "Envoi") {
                echo "<div class='text-danger'>Erreur lors de l'envoie du formulaire !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Vide") {
                echo "<div class='text-danger'>Tous les champs doivent être complétés !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Mdp") {
                echo "<div class='text-danger'>Les mots de passe ne correspondent pas !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Mdp2") {
                echo "<div class='text-danger'>Le mot de passe doit contenir au moins 8 caractères !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Pseudo") {
                echo "<div class='text-danger'>Ce pseudo existe déjà !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Email") {
                echo "<div class='text-danger'>Cette adresse E-mail est déjà utilisée !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Mention") {
                echo "<div class='text-danger'>Veuillez cocher la case des mentions légales !</div>";}
        ?>
    </div>
    <form class="mt-4" action="../Traitements/Inscription.php" method ="POST">
    <div class="mb-3">
        <label class="form-label">Nom :</label>
        <input type="text" class="form-control" name="nom" required="required">
    </div>
    <div class="mb-3">
        <label class="form-label">Prénom :</label>
        <input type="text" class="form-control" name="prenom" required="required">
    </div>
    <div class="mb-3">
        <label class="form-label">Pseudo :</label>
        <input type="text" class="form-control" name="pseudo" required="required">
    </div>
    <div class="mb-3">
        <label class="form-label">Email :</label>
        <input type="text" class="form-control" name="email" required="required">
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de passe :</label>
        <input type="password" class="form-control" name="mdp" required="required">
    </div>
        <div class="mb-3">
            <label class="form-label">Confirmation de mot de passe :</label>
            <input type="password" class="form-control" name="mdp2" required="required">
        </div>
        <div class="d-flex align-items-center mb-3">
            <input class="form-label check me-3" type="checkbox" name="mention" required="required">
            <label class="form-label">J'ai pris connaissance de la <span><a class="link-dark" href="Mention_legales.php">politique de confidentialité</a></span> du site</label>
            </div>
            <div class="text-center">
                <button class="btn div-btn-base" type="submit" name="inscription">S'inscrire</button>
        </div>
    </form>
</div>
</section>
    <?php require_once "Pied.php"?>
