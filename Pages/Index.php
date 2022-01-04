<?php require_once "Entete.php"?>

<div class="container mt-4">
    <?php if(isset($_GET["sup"]) && $_GET["sup"] == "succes") {
        echo "<div class='text-success'>Le compte a été supprimé avec succès !</div>";
        header("refresh:3;Index.php");
    }?>
</div>

<h1 class="text-center mt-2 titreAcceuil">Bienvenue sur BtsAssist</h1>
<div class="divpres">
    <h2 class="text-center mt-4">Réviser toutes les matières du BTS</h2>
</div>

<?php require_once "Pied.php"?>