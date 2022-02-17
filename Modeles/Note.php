<?php 

class Note extends Modele {

    private $idNote;
    private $note;
    private $idExercice;
    private $idUtilisateur;

    public function __construct($idNote = null) {
        
        if($idNote !== null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM notes WHERE id_note = ?");
            $requete->execute([$idNote]);
            $note = $requete->fetchAll(PDO::FETCH_ASSOC);

            $this->idNote = $idNote;
            $this->note = $note["note"];
            $this->idExercice = new Exercice($note["id_exercice"]);
            $this->idUtilisateur = new Utilisateur($note["id_utilisateur"]);
        }
    }

    public function insertNote($idUtilisateur, $idExercice, $note) {
        $requete = $this->getBdd()->prepare("INSERT INTO notes(id_utilisateur, id_exercice, note) VALUES(?, ?, ?)");
        $requete->execute([$idUtilisateur, $idExercice, $note]);
    }

    public function getListeNote($idUtilisateur) {

    }
}