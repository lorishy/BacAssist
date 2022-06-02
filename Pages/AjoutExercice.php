<?php require_once "Entete.php";
if(isset($_GET["succes"]) && $_GET["succes"] == "reussite") {
    echo "
    <div class='container larger-padding-top'>
        <div class='alert alert-primary'>L'exercice a été ajouté avec succès !</div>
    </div>" ;
}
if(isset($_GET["erreur"]) && $_GET["erreur"] == "Envoi") {
    echo "<div class='mt-4 mb-4 text-danger'>Une erreur s'est produite lors de l'envoie du formulaire</div>";
    } elseif (isset($_GET["erreur"]) && $_GET["erreur"] == "Vide") {
    echo "    
    <div class='container larger-padding-top'>
        <div class='alert alert-danger' role='alert'>Vous devez remplir tous les champs !</div>
    </div>";
    }
if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) {
    
    $Cours = new Cours();
    $ListeCours = $Cours->getAllCours()
    ?>
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Ajoutez un exercice</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Remplire votre exercice</p>
    </div>    
<div class="container">
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
            
        <div class="row">
        <?php
        for ($i=1; $i <=10; $i++) { ?>
            <div class="col-lg-4 col-md-6">
                <div class="card-test m-3">
                    <label class="form-label fw-bold fs-5">Question <?=$i?></label>
                    <input type="text" class="form-control mb-3" placeholder= "Saisissez la question <?=$i?> de l'exercice" name="question[<?=$i?>]">
                    <label class="form-label fw-bold fs-5 mb-3">Réponses</label> 
                    <div class="test">
                        <ul>
                            <li><input type="text" class="form-control mb-3 ms-3" placeholder=" Saisissez la bonne réponse" name="reponse[<?=$i?>][1]"></li>
                            <li><input type="text" class="form-control mb-3 ms-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][2]"></li>
                            <li><input type="text" class="form-control mb-3 ms-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][3]"></li>
                            <li><input type="text" class="form-control mb-3 ms-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][4]"></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="text-center mb-3">
            <button type="submit" class="btn div-btn-base" name="envoyer">Envoyer</button>
        </div>
</div>
</section>
<?php } else {
    header("location:../index.php");
}
require_once "Pied.php";