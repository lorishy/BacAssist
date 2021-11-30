<?php require_once "Modele.php";

class Option extends Modele {
    private $idOption; // int
    private $libelle; // string
    private $idBts; // int

    public function __construct($idOption = null) {
        
        if($idOption !== null) {
            
            $requete = $this->getBdd()->prepare("SELECT * FROM options WHERE id_option = ?");
            $requete->execute([$idOption]);
            $option = $requete->fetchAll(PDO::FETCH_ASSOC);

            $this->idOption = $idOption;
            $this->idBts = $option["id_bts"];
            $this->libelle = $option["libelle"];
        }
    }

    public function getIdOption() {
        return $this->idOption;
    }
    public function getLibelleOption() {
        return $this->libelle;
    }
    public function getIdBts() {
        return $this->idBts;
    }
    public function getListeOption($idBts) {

        $requete = $this->getBdd()->prepare("SELECT * FROM options WHERE id_bts = ?");
        $requete->execute([$idBts]);
        $optionExiste = $requete->rowcount();

        if($optionExiste > 0) {

            $requete = $this->getBdd()->prepare("SELECT * FROM options WHERE id_bts = ?");
            $requete->execute([$idBts]);
            $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        } else {
            return false;
        }
    }
}