<?php

class Reponse extends Modele {

    private $idReponse; // int
    private $reponse; // string
    private $statut; // booléen (reponse correcte ou incorrecte)

    public function __construct($idR = null) {
        
        if($idR != null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM reponses WHERE id_reponse = ?");
            $requete->execute([$idR]);
            $LaReponse = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idReponse = $idR;
            $this->reponse = $LaReponse["reponse"];
            $this->statut = $LaReponse["statut"];
        }
    }
    public function initialiserReponse($idReponse, $reponse, $statut) {
        $this->idReponse = $idReponse;
        $this->reponse = $reponse;
        $this->statut = $statut;
    }
    public function insertReponse($reponse, $idQuestion, $statut){
        $requete = $this->getBdd()->prepare("INSERT INTO reponses(reponse, id_question, statut) VALUES (?,?,?)");
        $requete->execute([$reponse, $idQuestion, $statut]);
    }
    public function getIdReponse() {
        return $this->idReponse;
    }
    public function getReponse() {
        return $this->reponse;
    }
    public function getStatut() {
        return $this->statut;
    }
    public function verificationReponse($idReponse) {
        $requete = $this->getBdd()->prepare("SELECT reponses.statut FROM reponses WHERE id_reponse = ?");
        $requete->execute([$idReponse]);
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }
}