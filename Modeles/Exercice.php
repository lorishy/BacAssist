<?php

class Exercice extends Modele {
    
    private $idExercice; // int
    private $titre; // string
    private $Cours; // objet
    private $question = []; // array of objects

    public function __construct($idExercice = null)
    {
        if($idExercice !== null){
            $requete = $this->getBdd()->prepare("SELECT titre, id_cours FROM exercices WHERE id_exercice = ?");
            $requete->execute([$idExercice]);
            $infoExercice = $requete->fetch(PDO::FETCH_ASSOC);

            $requete = $this->getBdd()->prepare("SELECT * from questions WHERE id_exercice = ?");
            $requete->execute([$idExercice]);
            $questions = $requete->fetchAll(PDO::FETCH_ASSOC);

            $this->idExercice = $idExercice;
            $this->titre = $infoExercice["titre"];
            $this->Cours = new Cours($infoExercice["id_cours"]);

            foreach ($questions as $question) {
                $objectQuestion = new Question();
                $objectQuestion->initialiserQuestion($question["id_question"], $question["question"]);
                $this->question[] = $objectQuestion;
            }
        }
    }

    public function insertExercice($titre, $idCours)
    {
        $requete = $this->getBdd()->prepare("INSERT INTO exercices(titre, id_cours) VALUES(?,?)");
        $requete->execute([$titre, $idCours]);
        $requete = $this->getBdd()->prepare("SELECT MAX(id_exercice) AS maximum FROM exercices");
        $requete->execute();
        $idExercice = $requete->fetch(PDO::FETCH_ASSOC);
        return $idExercice["maximum"];

    }
    public function getListeExercice($idCours) {
        $requete = $this->getBdd()->prepare("SELECT * FROM exercices WHERE id_cours = ?");
        $requete->execute([$idCours]);
        $resultats = $requete->fetchAll();
        return $resultats;
    }
    public function getQuestionExercice() {
        shuffle($this->question);
        return $this->question;
    }
    
}