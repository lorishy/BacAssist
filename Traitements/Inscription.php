<?php require_once "../Modeles/Utilisateur.php";
      require_once "../Modeles/Modele.php";

if(isset($_POST["inscription"])) {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $mdpConfirm = $_POST["mdp2"];
    $mention = $_POST["mention"];

    if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($pseudo) && !empty($mdp) && !empty($mdpConfirm)) {

        if(!empty($mention)) {

            $mention = 1;

            if(strlen($mdp) > 8) {
                    
                if($mdp == $mdpConfirm) {
                    
                    $newUtilisateur = new Utilisateur();
                    $retour = $newUtilisateur->inscription($nom, $prenom, $pseudo, $email, $mdp, $mention);
                    
                    if($retour["succes"] != false) {
                        header("location:../Pages/Connexion.php?succes=inscrit");
                        
                    } else {
                        header("location:../Pages/Inscription.php?erreur=" . $retour['erreur']);
                    }
                    
                } else {
                    header("location:../Pages/Inscription.php?erreur=Mdp");
                }
            } else {
                header("location:../Pages/Inscription.php?erreur=Mdp2");
            } 
        } else {
            header("location:../Pages/Inscription.php?erreur=Mention");
        }

    } else {
        header("location:../Pages/Inscription.php?erreur=Vide");
    }
    
} else {
    header("location:../Pages/Inscription.php?erreur=Envoi");
}
