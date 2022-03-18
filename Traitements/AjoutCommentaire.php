<?php require_once "../Modeles/Modele.php";

if(isset($_POST["envoi"])) {

    $url = $_POST["url"];

    if(isset($_SESSION["id_utilisateur"])) {

        $Commentaire = new Commentaire();
        $ajout = $Commentaire->insertCommentaire($_POST["commentaire"], $_SESSION["id_utilisateur"], $_GET["id"]);
        
        header("location:..$url");
    } else {
        header("location:..$url");
    }

} else {
    header("location:../Pages/Index.php");
}