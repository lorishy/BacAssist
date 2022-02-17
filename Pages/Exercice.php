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
if(isset($_GET["succes"])) {
    
    $note = $_GET["succes"];
     // Faire apparaitre une div avec la note ou l'ont peut se rediriger vers l'index mais qui actualise quand meme apres 5s
}

$Exercice = new Exercice($_GET["id"]);
$QuestionExercice = $Exercice->getQuestionExercice();
$numero = 1;
?>

<form action="../Traitements/Exercice.php?id=<?=$_GET["id"]?>" method="POST">
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