<?php 
class Cours extends Modele {

        private $idCours; // int
        private $titre; // string
        private $idMatiere; // objet
        private $contenu; // string

        public function __construct($idCours = null) {

            if($idCours != null) {
                
                $requete = $this->getBdd()->prepare("SELECT * FROM cours WHERE id_cours = ?");
                $requete->execute([$idCours]);
                $cours = $requete->fetch();
                $this->idCours = $idCours;
                $this->titre = $cours["titre"];
                $this->idMatiere = new Matiere($cours["id_matiere_bts"]);
                $this->contenu = $cours["contenu"];
            }
        }

        public function getIdCours() {
            return $this->idCours;
        }
        public function getTitreCours(){
            return $this->titre;
        }
        public function getIdMatiereCours() {
            return $this->idMatiere;
        }
        public function getContenuCours() {
            return $this->contenu;
        }

        public function getCours($idMatiere) {
            $requete = $this->getBdd()->prepare("SELECT * FROM cours WHERE id_matiere_bts = ?");
            $requete->execute([$idMatiere]);
            $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        }
        public function getAllCours() {
            $requete = $this->getBdd()->prepare("SELECT * FROM cours");
            $requete->execute();
            $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $resultats;
        }
        public function AjoutCours($titre, $idMatiere, $idCours, $extensionUpload) {

            $requete = $this->getBdd()->prepare("INSERT INTO cours (titre, id_matiere_bts, contenu) VALUES (?,?,?)");
            $requete->execute([$titre, $idMatiere, $idCours.".".$extensionUpload]);
        }
        public function lastIdCours() {
            $requete = $this->getBdd()->prepare("SELECT id_cours from cours order by id_cours desc limit 1");
            $requete->execute();
            $resultats = $requete->fetch(PDO::FETCH_ASSOC);
            return $resultats;
        }
        
}