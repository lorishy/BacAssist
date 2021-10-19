<?php require_once "Entete.php" ?>


<div class="mt-4" align="center">
    <h2>Connexion</h2>
</div>
<div class="container">
    <form class="mt-4" action="../Traitements/Connexion.php" method="POST">
    <div class="mb-3">
        <label class="form-label">Email :</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de passe :</label>
        <input type="password" class="form-control" name="mdp">
    </div>
    <div>
        <button class="btn button-login mt-4" type="submit" name="connexion">Se connecter</button>
    </div>
</form>
<?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "vide"){
            echo "<br><p class='text-danger'>Tous les champs doivent être complétés !</p>";
        }?>
        <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "motdepasse"){
            echo "<br><p class='text-danger'>Mauvais mot de passe !</p>";
        }?>
        <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "identifiant"){
            echo "<br><p class='text-danger'>Cet identifiant n'existe pas !</p>";
        }?>
</div>
<?php require_once "Pied.php"?>