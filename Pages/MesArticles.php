<?php require_once "Entete.php";

if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) { ?>

<div class="container mt-5">
        <p class="fw-bold fs-4">Mes articles</p>
        <?php if(isset($_GET["sup"]) && $_GET["sup"] == "succes"){ echo "<div class='text-success'>Votre article a bien été supprimé</div>";}?>
        <a class="btn button-login mb-2" href="AjoutArticle.php">Créer un article</a>
    <table class="table table-striped mb-2">
        <thead>
            <tr class="fw-bold">
                <td class="td-titre">Titre</td>
                <td class="td-cat">Contenu</td>
                <td class="td-actions">Actions</td>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        $Article = new Article();
        $ListeArticle = $Article->getListeArticleUtilisateur($_SESSION["id_utilisateur"]);

        foreach($ListeArticle as $article) {?>
            <tr>
                <td><?=$article['titre']; ?></td>
                <td><?=substr($article["contenu"],0 ,20)?>...</td>
                <td>
                    <a href="EditArticle.php?id=<?= $article['id_article']?>" class="btn button-login">Editer</a>
                    <a href="SupprimerArticle.php?id=<?= $article['id_article']?> "class="btn button-deco">Supprimer</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php }?>
<?php require_once "Pied.php"?>