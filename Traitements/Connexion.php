<?php require_once "../Modeles/Modele.php";

if (isset($_POST["connexion"])) {

    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    if(!empty($email) && !empty($mdp)) {

        $Utilisateur = new Utilisateur();
        $retour = $Utilisateur->connexion($email, $mdp);

        if($retour["succes"] != false) {

            $Utilisateur = new Utilisateur($retour["idUtilisateur"]);

            if(isset($_POST["remember"])) {
                $Modele = new Modele();
                $random = $Modele->str_random(60);
                setcookie("BtsAssist", $retour["idUtilisateur"].'-'.$random, time() + 3600 * 24 * 7, "/");
                $Utilisateur->setToken($random,$retour["idUtilisateur"]);
            }

            $Utilisateur->initialiserConnexion();

            
            header("location:../index.php");

        } else {
            header("location:../Pages/Connexion.php?erreur=" . $retour['erreur']);
        }

    } else {
        header("location:../Pages/Connexion.php?erreur=vide");
    }
} else {
    header("location:../Pages/Connexion.php?erreur=Envoi");
}