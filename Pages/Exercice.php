<?php require_once "Entete.php";

if(empty($_SESSION["id_utilisateur"])) {
    header("location:../Pages/Profil.php");
}
if(empty($_GET["id"])) {
    header("location:../Pages/Index.php");
}
if(isset($_GET["Error"]) && $_GET["Error"] = "Vide") {
    
    echo "
    <div class='container larger-padding-top'>
        <div class='alert alert-danger' role='alert'>Vous devez répondre à toutes les questions !
        </div>
    </div>";
}
if(!empty($_GET["succes"])) {
    
    $note = intval($_GET["succes"]);
    ?>
    <div class="container larger-padding-top">
        <div class="card-bts">
            <div class="card-body-nos-bts text-center">
                <h3 class="card-title">Résultat de l'exercice</h3>
                <div class="card-body">
                    <h3 class=""><?=$note?>/10</h3>
                    <?php if($note < 5) {
                        echo "<p class='card-text text-danger'>Votre résultat est trop faible, revoyez les cours !</p>";
                    } else if($note > 4 && $note < 8) {
                        echo "<p class='card-text text-warning'>Votre résultat est trop juste, travaillez davantage !</p>";
                    } else if($note > 7) {
                        echo "<p class='card-text text-success'>Félicitation, vous avez eu une très bonne note !</p>";
                    }
                        ?>
                    <a href="Index.php" class="btn div-btn-base">Retour à la page d'acceuil</a>
                </div>
            </div>
        </div>
    </div>
    <?php 
    // header("refresh:7;Index.php");    
}

$Exercice = new Exercice($_GET["id"]);
$QuestionExercice = $Exercice->getQuestionExercice();
$numero = 1;
?>

<form class="<?php if(isset($_GET["succes"])) { echo "d-none";}?>" action="../Traitements/Exercice.php?id=<?=$_GET["id"]?>" method="POST">
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Exercice</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Repondez aux questions</p>
    </div>    
<div class="container">
        <div class="row">
            <?php foreach ($QuestionExercice as $question) { ?>
            <div class="col-lg-4 col-md-6">
                <div class="card-bts m-3">
                    <div class="card-body-nos-bts">
                        <h3 class="card-title">QUESTION <?=$numero++?></h3>
                        <span class="section-separator"></span>
                        <div class="card-body">
                            <h5 class="card-title"><?=$question->getQuestion()?></h5>
                            <div class="card-text">
                                <?php foreach ($question->getReponseQuestion() as $reponse) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="<?=$reponse->getIdReponse()?>" name="reponse<?=$numero?>">
                                        <label class="form-check-label"><?=$reponse->getReponse()?></label>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        <div class="text-center mb-3">
            <button type="submit" class="btn div-btn-base" name="valider">Valider</button>
        </div>
        </div>
    </div>
</form>
</section>
<?php require_once "Pied.php"?>