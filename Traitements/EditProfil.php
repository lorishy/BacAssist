<?php
require_once "../Modeles/Modele.php";

if(isset($_SESSION["id_utilisateur"])) {

    $Utilisateur = new Utilisateur($_SESSION["id_utilisateur"]);
    $idUtilisateur = $Utilisateur->getIdUtilisateur();

    if(isset($_POST["save"])) {

        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $pseudo = $_POST["pseudo"];
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        $mdpConfirm = $_POST["mdpConfirm"];

        if(!empty($nom) || !empty($prenom) || !empty($pseudo) || !empty($email) || !empty($mdp) || !empty($mdpConfirm) || !empty($_FILES["avatar"]["name"])) {
        
            if(!empty($nom) AND isset($nom)){
                $Utilisateur->setNom($nom);
            }
            if(!empty($prenom) AND isset($prenom)){
                $Utilisateur->setPrenom($prenom);
            }
            if(!empty($pseudo) AND isset($pseudo)){
                $return = $Utilisateur->setPseudo($pseudo);

                if($return == false) {
                    header("location:../Pages/EditProfil.php?succes=2");exit;
                    
                }
            }
            if(!empty($email) AND isset($email)){
                $return = $Utilisateur->setEmail($email, $idUtilisateur);

                if($return == false){
                    header("location:../Pages/EditProfil.php?succes=3");exit;
                }
            }

            if (!empty($mdp) || !empty($mdpConfirm)) {

                if (!empty($mdp) && !empty($mdpConfirm)) {

                    if(strlen($mdp) >= 8) {

                        if($mdpConfirm == $mdp) {
        
                            $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                            $Utilisateur->setMdp($mdp);

                        } else {
                            header("location:../Pages/EditProfil.php?succes=4");exit;
                        }
                    } else {
                        header("location:../Pages/EditProfil.php?succes=6");exit;
                    }
                } else {
                    header("location:../Pages/EditProfil.php?succes=5");exit;
                }
            }

            if (isset($_FILES["avatar"]) AND !empty($_FILES["avatar"]["name"])) {

                $taillemax = 3000000;
                $extensionsValides = ['jpg', 'jpeg', 'gif', 'png'];
                if($_FILES["avatar"]["size"] <= $taillemax) {

                   $extensionUpload = strtolower(substr(strrchr($_FILES["avatar"]["name"], "."), 1));

                    if (in_array($extensionUpload, $extensionsValides)) {

                        $chemin = "../Images/Utilisateurs/". $idUtilisateur.".".$extensionUpload;
                        $resultat = move_uploaded_file($_FILES["avatar"]["tmp_name"], $chemin);

                        if($resultat == true) {

                            $avatar = $idUtilisateur.".".$extensionUpload;
                            $Utilisateur->setAvatar($avatar);
                            
                        } else {
                            header("location:../Pages/EditProfil.php?succes=8");exit;
                        }
                    } else {
                      header("location:../Pages/EditProfil.php?succes=7");exit;
                    }
                } else {
                   header("location:../Pages/EditProfil.php?succes=9");exit;
                }
            }

            $Utilisateur->saveInfos();
            header("location:../Pages/EditProfil.php?succes=1");
            
        } else {
            header("location:../Pages/EditProfil.php?succes=10");
        }  
    } else {
        header("location:../Pages/Profil.php");
    }
} else {
    header("location:../Pages/Profil.php");
}