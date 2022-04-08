<?php 

class Commentaire extends Modele {

    private $idCommentaire; // int
    private $contenu; // string
    private $idUtilisateur; // object
    private $dateCreation; // datetime
    private $idArticle; // object

    public function __construct($idCommentaire = null) {
        
        if($idCommentaire != null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM commentaires WHERE id_commentaire = ?");
            $requete->execute([$idCommentaire]);
            $commentaire = $requete->fetch();

            $this->idCommentaire = $idCommentaire;
            $this->contenu = $commentaire["contenu"];
            $this->idUtilisateur = new Utilisateur($commentaire["id_utilisateur"]);
            $this->dateCreation = $commentaire["date_creation"];
            $this->idArticle = new Article($commentaire["id_article"]);
        }
    }

    public function getIdCommentaire() {
        return $this->idCommentaire;
    }
    public function getContenu() {
        return $this->contenu;
    }
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
    public function getDateCreation() {
        return $this->dateCreation;
    }
    public function getIdArticle() {
        return $this->idArticle;
    }
    public function getCommentaires($idArticle) {
        $requete = $this->getBdd()->prepare("SELECT * FROM commentaires WHERE id_article = ? ORDER BY RAND() LIMIT 2");
        $requete->execute([$idArticle]);
        $resultats = $requete->fetchAll();
        return $resultats;
    }
    public function insertCommentaire($contenu, $idUtilisateur, $idArticle) {
        $requete = $this->getBdd()->prepare("INSERT INTO commentaires (contenu, id_utilisateur, date_creation, id_article) VALUES (?,?,Now(),?)");
        $requete->execute([$contenu, $idUtilisateur, $idArticle]);
    }
}