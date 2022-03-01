<?php
require_once "../Modeles/Modele.php";

$idArticle = $_GET["id"];

if(isset($_POST["supprimer"])) {

    $Article = new Article();
    $supprimerArticle = $Article->supprimerArticle($idArticle);
    if($supprimerArticle == true) {
        header("location:../Pages/MesArticles.php?sup=succes");
    } else {
        header("location:../Pages/SupprimerArticle.php?sup=error");
    }
    

} else if(isset($_POST["cancel"])) {
    header("location:../Pages/MesArticles.php");

} else {
    header("location:../Pages/Index.php");
}
