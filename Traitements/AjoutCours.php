<?php require_once "../Modeles/Modele.php";


if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) {

    $idUtilisateur = $_SESSION['id_utilisateur'];

    if(isset($_POST["ajouter"])) {

        $titre = $_POST["titre"];
        $idMatiere = $_POST["matiere"];

        if(isset($titre) && !empty($titre) && !empty($_FILES['contenu']['name']) && isset($idMatiere) && !empty($idMatiere)) {

            $Cours = new Cours();
            $getLastIdCours = $Cours->lastIdCours();
            $LastIdCours = $getLastIdCours["id_cours"];
            $idCours = $LastIdCours + 1;
            
            $extension = "pdf";
            $extensionUpload = strtolower(substr(strrchr($_FILES["contenu"]["name"], "."), 1));

            if ($extensionUpload == $extension) {
                $chemin = "../CoursPDF/". $idCours . "." . $extensionUpload;
                $resultat = move_uploaded_file($_FILES["contenu"]["tmp_name"], $chemin);
                if($resultat == true) {

                    $AjoutCours = $Cours->AjoutCours($titre, $idMatiere, $idCours, $extensionUpload);
                    header("location:../Pages/AjoutCours.php?succes=added");
                } else {
                    header("location:../Pages/AjoutCours.php?error=error");
                }

            } else {
                header("location:../Pages/AjoutCours?error=extension");
            }

        } else {
            header("location:../Pages/AjoutCours.php?error=empty");
        }

    } else {
        header("location:../Pages/AjoutCours.php?error=error");
    }

} else {
    header("location:../Pages/Index.php");
}