<?php

class Question extends Modele {

    private $idQuestion; // int
    private $question; // string
    private $reponses = []; // array of objects

    public function __construct($idQ = null) {
        
        if($idQ != null) {
            $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE id_question = ?");
            $requete->execute([$idQ]);
            $LaQuestion = $requete->fetch(PDO::FETCH_ASSOC);

            $requete = $this->getBdd()->prepare("SELECT * FROM reponses WHERE id_question = ?");
            $requete->execute([$idQ]);
            $reponses = $requete->fetchAll(PDO::FETCH_ASSOC);

            $this->idQuestion = $idQ;
            $this->question = $LaQuestion["question"];
            
            foreach ($reponses as $reponse) {
                $objetReponse = new Reponse($reponse["id_reponse"]);
                $this->reponses[] = $objetReponse;
            }
        }
    }

    public function initialiserQuestion($idQuestion, $question) {

        // INI des porops
        $this->idQuestion = $idQuestion;
        $this->question = $question;

        $requete = $this->getBdd()->prepare("SELECT * FROM reponses WHERE id_question = ?");
        $requete->execute([$idQuestion]);
        $infosReponses = $requete->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($infosReponses as $infoReponses) {
            $objetReponse = new Reponse();
            $objetReponse->initialiserReponse($infoReponses["id_reponse"], $infoReponses["reponse"], $infoReponses["statut"]);
            $this->reponses[] = $objetReponse;
        }

    }

    public function insertQuestions($question, $idExercice) {

        $requete = $this->getBdd()->prepare("INSERT INTO questions(question, id_exercice) VALUES(?, ?)");
        $requete->execute([$question, $idExercice]);
        $requete = $this->getBdd()->prepare("SELECT MAX(id_question) AS maximum FROM questions");
        $requete->execute();
        $idQuestion = $requete->fetch(PDO::FETCH_ASSOC);
        return $idQuestion["maximum"];

    }

    public function getQuestion() {
        return $this->question;
    }
    public function getIdQuestion() {
        return $this->idQuestion;
    }
    public function getReponseQuestion() {
        shuffle($this->reponses);
        return $this->reponses;
    }
}