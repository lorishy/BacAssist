<?php require_once "Modele.php";

class Cours extends Modele {

        private $idCours; // int
        private $titre; // string
        private $idMatiere; // int
        private $contenu; // string

        public function __construct($idCours = null) {

            if($idCours != null) {
                
                $requete = $this->getBdd()->prepare("SELECT * FROM cours WHERE id_cours = ?");
                $requete->execute([$idCours]);
                $cours = $requete->fetch();
                $this->idCours = $idCours;
                $this->titre = $cours["titre"];
                $this->idMatiere = $cours["id_matiere_bts"];
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
        public function AjoutCours($titre, $idMatiere, $idUtilisateur, $extensionUpload) {

            $requete = $this->getBdd()->prepare("INSERT INTO cours (titre, id_matiere_bts, contenu) VALUES (?,?,?)");
            $requete->execute([$titre, $idMatiere, $idUtilisateur.".".$extensionUpload]);
        }
        
}