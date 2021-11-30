<?php
session_start();

class Modele {
    
    protected function getBdd(){
        return new PDO('mysql:host=localhost;dbname=btsassist;charset=UTF8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}

require_once "../Modeles/Bts.php";
require_once "../Modeles/Cours.php";
require_once "../Modeles/Matiere.php";
require_once "../Modeles/Option.php";
require_once "../Modeles/Question.php";
require_once "../Modeles/Reponse.php";
require_once "../Modeles/Utilisateur.php";