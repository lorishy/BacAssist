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

        $requete = $this->getBdd()->prepare("INSERT INTO notes(id_utilisateur, id_exercice, note, date_note) VALUES(?, ?, ?, Now())");
        $requete->execute([$idUtilisateur, $idExercice, $note]);
    }

    public function getListeNote($idUtilisateur) {

        $requete = $this->getBdd()->prepare("SELECT notes.note, matieres.libelle,matieres.id_matiere, notes.date_note from notes inner join exercices on notes.id_exercice = exercices.id_exercice inner join cours on exercices.id_cours = cours.id_cours inner join matieres_bts on cours.id_matiere_bts = matieres_bts.id_matiere_bts left join matieres on matieres_bts.id_matiere = matieres.id_matiere where notes.id_utilisateur = ? order by matieres.libelle desc");
        $requete->execute([$idUtilisateur]);
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;

    }
    public function moyenneNote() {

        $requete = $this->getBdd()->prepare("SELECT AVG(note) AS moyenne, matieres.libelle from notes, exercices, cours, matieres_bts,matieres where notes.id_exercice = exercices.id_exercice and exercices.id_cours = cours.id_cours and cours.id_matiere_bts = matieres_bts.id_matiere_bts and matieres_bts.id_matiere = matieres.id_matiere");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
}