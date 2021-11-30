<?php require_once "Entete.php"?>

<div class="container mt-4">
    <?php if(isset($_GET["sup"]) && $_GET["sup"] == "succes") {
        echo "<div class='text-success'>Le compte a été supprimé avec succès !</div>";
    }?>
    <h1>Page d'acceuil</h1>
    
</div>
<?php require_once "Pied.php"?>