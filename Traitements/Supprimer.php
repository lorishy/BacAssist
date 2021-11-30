<?php
require_once "../Modeles/Modele.php";
session_start();

if(empty($_SESSION["id_utilisateur"]) || $_GET["id"] != $_SESSION["id_utilisateur"]) {
    header("location:../Pages/Profil.php");
}
$idUtilisateur = $_SESSION["id_utilisateur"];

if(isset($_POST["supprimer"])) {
    $Utilisateur = new Utilisateur($idUtilisateur);
    $supprimer = $Utilisateur->supprimer($idUtilisateur);
    if($supprimer == true) {
        session_destroy();
        header("location:../Pages/Index.php?sup=succes");
    } else {
        header("location:../Pages/Supprimer.php?sup=error");
    }
}

if(isset($_POST["cancel"])) {
    header("location:../Pages/EditProfil.php");
}
