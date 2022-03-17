<?php

class Utilisateur extends Modele {

    private $idUtilisateur; // int
    private $nom; // string
    private $prenom;
    private $pseudo; // string
    private $email; //string
    private $mdp; // string
    private $avatar; // string
    private $idRole; // int
    private $mention_legale; // int
    private $date_creation; // datetime
    private $token; // string

    public function __construct($idUtilisateur = null) {

        if($idUtilisateur !== null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = ?");
            $requete->execute([$idUtilisateur]);
            $infoUtilisateur = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idUtilisateur = $idUtilisateur;
            $this->nom = $infoUtilisateur["nom"];
            $this->prenom = $infoUtilisateur["prenom"];
            $this->pseudo = $infoUtilisateur["pseudo"];
            $this->email = $infoUtilisateur["email"];
            $this->mdp = $infoUtilisateur["mdp"];
            $this->avatar = $infoUtilisateur["avatar"];
            $this->idRole = $infoUtilisateur["id_role"];
            $this->mention_legale = $infoUtilisateur["mention_legale"];
            $this->date_creation = $infoUtilisateur["date_creation"];
            $this->token = $infoUtilisateur["token"];

        }
    }
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getPseudo() {
        return $this->pseudo;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getMdp() {
        return $this->mdp;
    }
    public function getAvatar() {
        return $this->avatar;
    }
    public function getIdRole() {
        return $this->idRole;
    }
    public function getDateCreation() {
        return $this->date_creation;
    }
    public function getToken() {
        return $this->token;
    }
    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    public function setPseudo($pseudo) {

        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
        $requete->execute([$pseudo]);
        $pseudoExiste = $requete->rowCount();

        if($pseudoExiste < 1) {
            $this->pseudo = $pseudo;
            return true;  
        } else {
            return false;
        }
    }
    public function setEmail($email) {

        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $requete->execute([$email]);
        $emailExiste = $requete->rowCount();

        if($emailExiste < 1) {

            $this->email = $email;
            return true;
        } else {
            return false;
        }
    }
    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }
    public function setIdRole($idRole) {
        return $this->idRole = $idRole;
    }
    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }
    public function setToken($token) {
        $this->token = $token;
    }


    public function getUtilisateur($idUtilisateur) {
        $requete = $this->getBdd()->prepare('SELECT * FROM utilisateurs WHERE id_utilisateur = ?');
        $requete->execute([$idUtilisateur]);
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }
    public function inscription($nom, $prenom, $pseudo, $email, $mdp, $mention_legale) {

        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
        $requete->execute([$pseudo]);
        $pseudoExiste = $requete->rowCount();

        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $requete->execute([$email]);
        $emailExiste = $requete->rowcount();

        if($pseudoExiste != 1) {

            if($emailExiste != 1) {

                $requete = $this->getBdd()->prepare("INSERT INTO utilisateurs (nom, prenom, pseudo, email, mdp, mention_legale, date_creation) VALUES (?,?,?,?,?,?,Now())");
                $requete->execute([$nom, $prenom, $pseudo, $email, password_hash($mdp, PASSWORD_BCRYPT), $mention_legale]);

                return ["succes" => true, "erreur" => ""];
            } else {
                return ["succes" => false, "erreur" => "Email"];
            }
        } else {
            return ["succes" => false, "erreur" => "Pseudo"];
        }

    }
    public function connexion($email, $mdp) {
        
        $requete = $this->getBdd()->prepare("CALL getEmailCorrespond(?)");
        $requete->execute([$email]);
        $emailExiste = $requete->rowcount();

        if($emailExiste == 1) {

            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

            if(password_verify($mdp, $utilisateur["mdp"])) {

                return ["succes" => true, "erreur" => "", "idUtilisateur" => $utilisateur["id_utilisateur"]];

            } else {
                return ["succes" => false, "erreur" => "motdepasse", "idUtilisateur" => 0 ];
            }

        } else {
            return ["succes" => false, "erreur" => "Email", "idUtilisateur" => 0 ];
        }
    }
    public function initialiserConnexion() {

            $_SESSION["id_utilisateur"] = $this->getIdUtilisateur();
            $_SESSION["nom"] = $this->getNom();
            $_SESSION["prenom"] = $this->getPrenom();
            $_SESSION["pseudo"] = $this->getPseudo();
            $_SESSION["email"] = $this->getEmail();
            $_SESSION["mdp"] = $this->getMdp();
            $_SESSION["id_role"] = $this->getIdRole();
            $_SESSION["avatar"] = $this->getAvatar();
            $_SESSION["token"] = $this->getToken();
    }
    public function supprimer($idUtilisateur) {
        $requete = $this->getBdd()->prepare("DELETE FROM utilisateurs WHERE id_utilisateur = ?");
        $requete->execute([$idUtilisateur]);
        return true;
    }

    public function saveInfos() {
        $requete = $this->getBdd()->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?,pseudo = ?, email = ?, mdp = ?, avatar = ?, token = ?WHERE id_utilisateur = ?");
        $requete->execute([$this->nom, $this->prenom, $this->pseudo, $this->email, $this->mdp, $this->avatar, $this->token, $this->idUtilisateur]);
    }
    
}