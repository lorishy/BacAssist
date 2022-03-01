<?php require_once "Entete.php";

if(empty($_SESSION["id_utilisateur"])) {
    header("location:../Pages/Index.php");
}
if(empty($_GET["id"])) {
    header("location:../Pages/Index.php");
}
if(isset($_GET["Error"]) && $_GET["Error"] = "Vide") {
    echo "<div class='text-danger container mt-4'>Vous devez répondre à toutes les questions !</div>";
}
if(!empty($_GET["succes"])) {
    
    $note = intval($_GET["succes"]);
    ?>
    <div class="container mt-5">
        <div class="card text-center text-white bg-dark mb-3 shadowCard">
            <div class="card-header">Résultat de l'exercice</div>
            <div class="card-body">
                <h3 class="card-title"><?=$note?>/10</h3>
                <?php if($note < 5) {
                    echo "<p class='card-text text-danger fs-2'>Votre résultat est trop faible, revoyez les cours !</p>";
                } else if($note > 4 && $note < 8) {
                    echo "<p class='card-text text-warning fs-2'>Votre résultat est trop juste, travaillez davantage !</p>";
                } else if($note > 7) {
                    echo "<p class='card-text text-success fs-2'>Félicitation, vous avez eu une très bonne note !</p>";
                }
                    ?>
                <a href="Index.php" class="btn button-login">Retour à la page d'acceuil</a>
            </div>
        </div>
    </div>
    <?php 
    header("refresh:7;Index.php");    
}

$Exercice = new Exercice($_GET["id"]);
$QuestionExercice = $Exercice->getQuestionExercice();
$numero = 1;
?>

<form class="<?php if(isset($_GET["succes"])) { echo "d-none";}?>" action="../Traitements/Exercice.php?id=<?=$_GET["id"]?>" method="POST">
    <div class="container">

        <h1 class="text-center mb-5 mt-5">Exercice</h1>
        <div class="row">
            <?php foreach ($QuestionExercice as $question) { ?>
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header color-site">QUESTION <?=$numero++?></div>
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
            <?php } ?>
        <div class="text-center mb-3">
            <button type="submit" class="btn button-login mt-4" name="valider">Valider</button>
        </div>
        </div>
    </div>
</form>
<?php require_once "Pied.php"?>