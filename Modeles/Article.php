<?php 

class Article extends Modele {

    private $idArticle; // int
    private $titre; // string
    private $contenu; // string
    private $date_creation; // date
    private $image; // string
    private $idUtilisateur; // object

    public function __construct($idArticle = null) {

        if($idArticle != null) {
            $requete = $this->getBdd()->prepare("SELECT * FROM articles where id_article = ?");
            $requete->execute([$idArticle]);
            $article = $requete->fetch();

            $this->idArticle = $idArticle;
            $this->titre = $article["titre"];
            $this->contenu = $article["contenu"];
            $this->date_creation = $article["date_creation"];
            $this->image = $article["image_article"];
            $this->idUtilisateur = new Utilisateur($article["id_utilisateur"]);
        }
        
    }

    public function getListeArticleUtilisateur($idUtilisateur) {

        $requete = $this->getBdd()->prepare("SELECT * FROM articles WHERE id_utilisateur =?");
        $requete->execute([$idUtilisateur]);
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }
    public function getListeArticle() {

        $requete = $this->getBdd()->prepare("SELECT * FROM articles");
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }

    public function lastIdArticle() {
        $requete = $this->getBdd()->prepare("SELECT id_article from articles order by id_article desc limit 1");
        $requete->execute();
        $resultats = $requete->fetch(PDO::FETCH_ASSOC);
        return $resultats;
    }

    public function AjouterArticle($titre, $contenu, $idUtilisateur, $image) {
        $requete = $this->getBdd()->prepare("INSERT INTO articles (titre, contenu, id_utilisateur, image_article, date_creation) VALUES (?,?,?,?,Now())");
        $requete->execute([$titre, $contenu, $idUtilisateur, $image]);
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
    public function getTitreArticle() {
        return $this->titre;
    }
    public function getContenuArticle() {
        return $this->contenu;
    }
    public function setTitre($titre, $idArticle) {
        $requete = $this->getBdd()->prepare("UPDATE articles SET titre = ? WHERE id_article = ?");
        $requete->execute([$titre, $idArticle]);
    }
    public function setContenu($contenu, $idArticle) {
        $requete = $this->getBdd()->prepare("UPDATE articles SET contenu = ? WHERE id_article = ?");
        $requete->execute([$contenu, $idArticle]);
    }
    public function setImage($idArticle, $extensionUpload) {
        $requete = $this->getBdd()->prepare("UPDATE articles SET image_article = ? WHERE id_article = ?");
        $requete->execute([$idArticle.".".$extensionUpload, $idArticle]);
    }
    public function supprimerArticle($idArticle) {
            $requete = $this->getBdd()->prepare("DELETE FROM articles WHERE id_article = ?");
            $requete->execute([$idArticle]);
            return true;
    }

}