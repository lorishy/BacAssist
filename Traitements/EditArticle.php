<?php require_once "../Modeles/Modele.php";

$idArticle = $_GET["id"];

if(isset($_POST["save"])) {

    $Article = new Article($idArticle);
    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];

    if(!empty($titre) || !empty($contenu) || !empty($_FILES["image"]["name"])) {

        if(isset($titre) && !empty($titre)) {
            $Article->setTitre($titre, $idArticle);
            header("location:../Pages/EditArticle.php?id=$idArticle&succes=1");
        }
        if(isset($contenu) && !empty($contenu)) {
            $Article->setContenu($contenu, $idArticle);
            header("location:../Pages/EditArticle.php?id=$idArticle&succes=1");
        }
        if (isset($_FILES["image"]) AND !empty($_FILES["image"]["name"])) {

            $extensionsValides = ['jpg', 'jpeg', 'gif', 'png'];
            $extensionUpload = strtolower(substr(strrchr($_FILES["image"]["name"], "."), 1));

                if (in_array($extensionUpload, $extensionsValides)) {

                    $chemin = "../Images/Articles/". $idArticle.".".$extensionUpload;
                    $resultat = move_uploaded_file($_FILES["image"]["tmp_name"], $chemin);

                    if($resultat == true) {

                        $Article->setImage($idArticle, $extensionUpload);
                        header("Location:../Pages/EditArticle.php?id=$idArticle&succes=1");
                        
                    } else {
                        header("location:../Pages/EditArticle.php?id=$idArticle&error=image");
                    }
                } else {
                  header("location:../Pages/EditArticle.php?id=$idArticle&error=extension");
                }
        }

    } else {
        header("location:../Pages/EditArticle.php?id=$idArticle&error=vide");
    }

} else {
    header("location:../Pages/Index.php");
}