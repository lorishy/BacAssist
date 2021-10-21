<?php require_once "Modele.php";

class Bts extends Modele {
    
    private $idBts; // int
    private $bts; // string

    public function __construct($idBts = null) {
        
        if($idBts != null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM bts WHERE id_bts = ?");
            $requete->execute([$idBts]);
            $bts = $requete->fetchAll(PDO::FETCH_ASSOC);
            $this->idBts = $idBts;
            $this->bts = $bts["libelle"];
        }
    }
    public function getIdBts() {
        return $this->idBts;
    }
    public function getBts() {
        return $this->bts;
    }
    public function setIdBts($newIdBts) {
        return $this->idBts = $newIdBts;
    }
    public function setBts($newBts) {
        return $this->bts = $newBts;
    }
    public function getListeBts() {
        $requete = $this->getBdd()->prepare("SELECT * from bts");
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    public function getInfoBts($idUtilisateur) {
        $requete = $this->getBdd()->prepare("SELECT * FROM bts WHERE id_bts = ?");
        $requete->execute([$idUtilisateur]);
        $resultat = $requete->fetchAll();
    }
}