<?php require_once "Modele.php";

class Matiere extends Modele {
    
    private $idMatiereBts; // int
    private $libelleMatiere; // string
    private $idMatiere; // int
    private $idBts; // int

    public function __construct($idMatiere = null) {

        if($idMatiere !== null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM matieres_bts WHERE id_matiere_bts = ?");
            $requete->execute([$idMatiere]);
            $matiere = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->idMatiereBts = $idMatiere;
            $this->libelleMatiere = $matiere["libelle"];
            $this->idMatiere = $matiere["id_matiere"];
            $this->idBts = $matiere["id_bts"];

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
}