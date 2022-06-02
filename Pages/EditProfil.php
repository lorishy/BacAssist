<?php require_once "Entete.php";

if(empty($_SESSION["id_utilisateur"])) {
    header("location:../Pages/Profil.php");
}
?><pre><?php
$Utilisateur = new Utilisateur($_SESSION["id_utilisateur"]);

?></pre>

<div class="mt-4" align="center">
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "1") {
        echo "<div class='mt-2 text-success'>Modification sauvegardé !</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "2") {
        echo "<div class='mt-4 text-danger'>Ce pseudo est indisponible !</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "3") {
        echo "<div class='mt-4 text-danger'>Cette adresse email est indisponible !</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "4") {
        echo "<div class='mt-4 text-danger'>Les deux mots de passe doivent correspondre !</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "5") {
        echo "<div class='mt-4 text-danger'>Vous devez renseigner un mot de passe ou confirmer le mot de passe saisie !</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "6") {
        echo "<div class='mt-4 text-danger'>Le mot de passe doit contenir au moins 8 caractères !</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "7") {
        echo "<div class='mt-4 text-danger'>L'avatar n'est pas au bon format d'image</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "8") {
        echo "<div class='mt-4 text-danger'>Erreur lors de l'insertion de l'avatar</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "9") {
        echo "<div class='mt-4 text-danger'>Votre avatar ne doit pas dépasser 3Mo</div>";}?>
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "10") {
        echo "<div class='mt-4 text-danger'>Veuillez remplir au moins un champ !</div>";}?>
        
</div>
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Edition du profil</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Modifier votre profil</p>
    </div> 
<div class="container container-small">
    <form class="mt-4" method="POST" action="../Traitements/EditProfil.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nom :</label>
            <input type="text" class="form-control" name="nom" placeholder="<?=$Utilisateur->getNom()?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Prénom :</label>
            <input type="text" class="form-control" name="prenom" placeholder="<?=$Utilisateur->getPrenom()?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Pseudo :</label>
            <input type="text" class="form-control" name="pseudo" placeholder="<?=$Utilisateur->getPseudo()?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Email :</label>
            <input type="email" class="form-control" name="email" placeholder="<?=$Utilisateur->getEmail()?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" name="mdp" placeholder="Entrez un nouveau mot de passe">
        </div>
        <div class="mb-3">
            <label class="form-label">Confimation du mot de passe :</label>
            <input type="password" class="form-control" name="mdpConfirm" placeholder="Confirmez votre nouveau mot de passe">
        </div>
        <div class="mb-3">
            <label class="form-label">Avatar :</label>
            <input type="file" class="form-control" name="avatar">
        </div>
        <div class="test">
            <button class="btn div-btn-base mt-4" type="submit" name="save">Sauvegarder les modifications</button>
            <a href="../Pages/Supprimer.php?id=<?=$_SESSION['id_utilisateur']?>" class="btn button-deco mt-4" type="submit" name="supprimer">Supprimer mon profil</a>
        </div>
    </form>
</div>
</section>

<?php require_once "Pied.php"?>