<?php

class Matiere extends Modele {
    
    private $idMatiereBts; // int
    private $libelleMatiere; // string
    private $idMatiere; // int
    private $idBts; // objet
    private $idOption; // object

    public function __construct($idMatiere = null) {

        if($idMatiere !== null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM matieres_bts WHERE id_matiere_bts = ?");
            $requete->execute([$idMatiere]);
            $matiere = $requete->fetch(PDO::FETCH_ASSOC);
            
            
            $this->idMatiereBts = $idMatiere;
            $this->libelleMatiere = $matiere["libelle"];
            $this->idMatiere = $matiere["id_matiere"];
            $this->idBts = new Bts($matiere["id_bts"]);
            $this->idOption = new Option($matiere["id_option"]);

        }
    }

    public function getAllMatiere() {
        $requete = $this->getBdd()->prepare("SELECT * FROM matieres_bts");
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;

    }

    public function getListeMatieres($idBts) {
        $requete = $this->getBdd()->prepare("SELECT * FROM matieres_bts WHERE id_bts = ?");
        $requete->execute([$idBts]);
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }

    public function getListeMatieresOption($idBts, $idOption) {
        $requete = $this->getBdd()->prepare("SELECT * FROM matieres_bts WHERE id_bts = ? AND (matieres_bts.id_option = ? OR matieres_bts.id_option is null)");
        $requete->execute([$idBts,$idOption]);
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }

    public function getMatiereParent() {
        $requete = $this->getBdd()->prepare("SELECT * FROM matieres");
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }
    public function getMatiereParentShuffle() {
        $requete = $this->getBdd()->prepare("SELECT matieres.libelle FROM matieres ORDER BY RAND() LIMIT 6");
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }
}