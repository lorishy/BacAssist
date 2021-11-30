<?php require_once "../Modeles/Utilisateur.php";

if (isset($_POST["connexion"])) {

    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    if(!empty($email) && !empty($mdp)) {

        $Utilisateur = new Utilisateur();
        $retour = $Utilisateur->connexion($email, $mdp);

        if($retour["succes"] != false) {

            $Utilisateur = new Utilisateur($retour["idUtilisateur"]);

            $_SESSION["id_utilisateur"] = $Utilisateur->getIdUtilisateur();
            $_SESSION["nom"] = $Utilisateur->getNom();
            $_SESSION["prenom"] = $Utilisateur->getPrenom();
            $_SESSION["pseudo"] = $Utilisateur->getPseudo();
            $_SESSION["email"] = $Utilisateur->getEmail();
            $_SESSION["mdp"] = $Utilisateur->getMdp();
            $_SESSION["id_role"] = $Utilisateur->getIdRole();
            $_SESSION["avatar"] = $Utilisateur->getAvatar();
            header("location:../Index.php");

        } else {
            header("location:../Pages/Connexion.php?erreur=" . $retour['erreur']);
        }

    } else {
        header("location:../Pages/Connexion.php?erreur=vide");
    }
} else {
    header("location:../Pages/Connexion.php?erreur=Envoi");
}