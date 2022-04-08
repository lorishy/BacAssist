<?php require_once "../Modeles/Modele.php";
if(isset($_POST["envoyer"])) {

    $titre = $_POST["titre"];
    $cours = $_POST["cours"];
    $questions = $_POST["question"];
    $reponses = $_POST["reponse"];
    $utilisateur = $_SESSION["id_utilisateur"];
    $erreur = 0;

    if(!empty($titre) && !empty($cours) && !empty($questions) && !empty($reponses)) {
        
        foreach($questions as $cleQuestion => $question) {
            
            if(empty($question)) {
                $erreur++;
            }
            foreach($reponses[$cleQuestion] as $reponse){
                if(empty($reponse)) {
                    $erreur++;
                }
            }   
        }
            if($erreur == 0) {

                $insertExercice = new Exercice();
                $idExercice = $insertExercice->insertExercice($titre, $cours);

                    foreach($questions as $cleQuestion => $question) {
                        $insertQuestion = new Question();
                        $idQuestion = $insertQuestion->insertQuestions($question, $idExercice);

                        foreach($reponses[$cleQuestion] as $cleReponse => $reponse) {

                            if($cleReponse == 1) {
                                $statut = 1;
                            } else {
                                $statut = 0;
                            }
                            $insertReponse = new Reponse();
                            $insertReponse->insertReponse($reponse, $idQuestion, $statut);
                        } 

                    } header("location:../Pages/AjoutExercice.php?succes=reussite");

            } else {
                header("location:../Pages/AjoutExercice.php?erreur=Vide2");
            }
    } else {
        header("location:../Pages/AjoutExercice.php?erreur=Vide");
    }    

} else {
    header("location:../Pages/AjoutExercice.php?erreur=Envoi");
}