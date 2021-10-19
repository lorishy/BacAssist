<?php require_once "Modele.php";

class Cours extends Modele {

        private $idCours; // int
        private $titre; // string
        private $matiere; // objet
        private $contenu; // string

        public function __construct($idCours = null) {

            if($idCours !== null) {
                $requete = $this->getBdd()->prepare("SELECT ");
            }
        }
        
}