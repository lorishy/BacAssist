<?php require_once "Entete.php";

if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) {
    
    $Cours = new Cours();
    $ListeCours = $Cours->getAllCours()
    ?>

<div class="container mt-4">
    <h2 class="text-center">Ajout d'un exercice</h2>
    <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "Envoi") {
        echo "<div class='mt-4 mb-4 text-danger'>Une erreur s'est produite lors de l'envoie du formulaire</div>";
        }
    ?>
    
    <form method="POST" action="../Traitements/AjoutExercice.php">
        
        <label class="form-label fw-bold">Titre de l'exercice</label>
        <input type="text" class="form-control mb-3" name="titre" placeholder="Entrez le titre de l'exercice">
        <label class="form-label fw-bold">À quel cours appartient l'exercice</label>
        <select class="form-select mb-5" aria-label="Default select example" name="cours">
            <option selected disabled>Choisissez le cours</option>
            <?php foreach ($ListeCours as $cours) { ?>
                <option value="<?=$cours['id_cours'];?>"><?=$cours['titre'];?></option>
            <?php } ?>
        </select>
            
        <?php
        for ($i=1; $i <=10; $i++) { ?>
            <label class="form-label fw-bold">Question <?=$i?></label>
            <input type="text" class="form-control mb-3" placeholder= "Saisissez la question <?=$i?> de l'exercice" name="question[<?=$i?>]">
            <label class="form-label fw-bold mb-3">Réponses</label> 
            <ul>
                <li><input type="text" class="form-control mb-3 ms-3" placeholder=" Saisissez la bonne réponse" name="reponse[<?=$i?>][1]"></li>
                <li><input type="text" class="form-control mb-3 ms-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][2]"></li>
                <li><input type="text" class="form-control mb-3 ms-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][3]"></li>
                <li><input type="text" class="form-control mb-3 ms-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][4]"></li>
            </ul>
        <?php } ?>
        <div class="text-center mb-3">
            <button type="submit" class="btn button-login mt-4" name="envoyer">Envoyer</button>
        </div>
</div>

<?php } else {
    header("location:../index.php");
}
require_once "Pied.php";