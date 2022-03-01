<?php require_once "../Modeles/Modele.php";

if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) {

    $idUtilisateur = $_SESSION['id_utilisateur'];

    if(isset($_POST["poster"])) {

        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $image = null;

        if(isset($titre) && !empty($titre) && isset($contenu) && !empty($contenu)) {
            
            if(isset($_FILES["image"]) AND !empty($_FILES["image"]["name"])) {
                
                $Article = new Article();
                $getLastIdArticle = $Article->lastIdArticle();
                $LastIdArticle = $getLastIdArticle["id_article"];
                $idArticle = $LastIdArticle + 1;
                
                $extensionValides = ['jpg', 'jpeg', 'gif', 'png'];
                $extensionUpload = strtolower(substr(strrchr($_FILES["image"]["name"], "."), 1));
                
                if(in_array($extensionUpload, $extensionValides)) {
                    
                    $chemin = "../Images/Articles/". $idArticle . "." . $extensionUpload;
                    $resultat = move_uploaded_file($_FILES["image"]["tmp_name"], $chemin);

                    if($resultat == true) {
                        
                        $image = $idArticle.".".$extensionUpload;
                    }
                    
                } else {
                    header("location:../Pages/AjoutArticle.php?error=extension");exit;
                }
            }
            
            $Article = new Article();
            $insertArticle = $Article->AjouterArticle($titre, $contenu, $idUtilisateur, $image);

            header("location:../Pages/AjoutArticle.php?succes=added");

        } else {
            header("location:../Pages/AjoutArticle.php?error=vide");
        }
    } else {
        header("location:../Pages/AjoutArticle.php?error=error");
    }
}