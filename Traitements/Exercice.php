<?php require_once "../Modeles/Modele.php";

if(isset($_POST["valider"]) && isset($_GET["id"])) {
    
    $idExercice = $_GET["id"];
    $note = 0;

    if(!empty($_POST["reponse2"]) && !empty($_POST["reponse3"]) && !empty($_POST["reponse4"]) && !empty($_POST["reponse5"]) && !empty($_POST["reponse6"]) && !empty($_POST["reponse7"]) && !empty($_POST["reponse8"]) && !empty($_POST["reponse9"]) && !empty($_POST["reponse10"]) && !empty($_POST["reponse11"])) {

        $reponses = [$_POST["reponse2"], $_POST["reponse3"], $_POST["reponse4"], $_POST["reponse5"], $_POST["reponse6"], $_POST["reponse7"], $_POST["reponse8"], $_POST["reponse9"], $_POST["reponse10"], $_POST["reponse11"]];
        
        foreach($reponses as $idReponse) { // Pour chaque réponse donné on fait une verification du statut de la réponse

            $Reponse = new Reponse();
            $verif = $Reponse->verificationReponse($idReponse);
            
            foreach($verif as $cleVerif) { // Pour chaque verification bonne on incrémente la note

                if($cleVerif == 1) {
                    $note++;
                }
            }
        }

        $Note = new Note();
        $insertNote = $Note->insertNote($_SESSION["id_utilisateur"], $idExercice, $note);
        header("location:../Pages/Exercice.php?id=$idExercice&succes=$note");


    } else {
        header("location:../Pages/Exercice.php?id=$idExercice&Error=Vide");
    } 

} else {
    header("location:../Pages/NosBts.php");
}