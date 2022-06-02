<?php require_once "Entete.php" ;

if(isset($_SESSION["id_utilisateur"])) {
    header("location:Index.php");
}
?>
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Connexion</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Se connecter</p>
    </div>
    <div class="container container-small">
    <?php if(isset($_GET["succes"]) && $_GET["succes"] == "inscrit"){
                echo "<p class='text-success'>Vous avez bien été inscrit, connectez-vous !</p>";
            }?>
            
        <form class="mt-4" action="../Traitements/Connexion.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Email :</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" name="mdp">
        </div>
        <div class="d-flex align-items-center">
            <input class="form-label check me-3" type="checkbox" name="remember">
            <label class="form-label">Resté connecté</label>
        </div>
        <div class="text-center">
            <button class="btn div-btn-base mt-4" type="submit" name="connexion">Se connecter</button>
        </div>
    </form>

    <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "Envoi"){
        echo "<br><p class='text-danger'>Erreur lors de la connexion !</p>";
    }?>
    <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "vide"){
        echo "<br><p class='text-danger'>Tous les champs doivent être complétés !</p>";
    }?>
    <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "motdepasse"){
        echo "<br><p class='text-danger'>Mauvais mot de passe !</p>";
    }?>
    <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "Email"){
        echo "<br><p class='text-danger'>Cette adresse Email n'existe pas !</p>";
    }?>
    <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "cookies"){
        echo "<br><p class='text-danger'>Vous devez accepter les cookies pour pouvoir rester connecté au site !</p>";

}?>
            

    </div>
    </section>
<?php require_once "Pied.php"?>