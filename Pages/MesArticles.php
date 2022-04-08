<?php require_once "Entete.php";

if(isset($_SESSION["id_role"]) && $_SESSION["id_role"] == 2) { ?>

<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Mes Articles</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Liste des articles</p>
    </div> 
<div class="container">
        <?php if(isset($_GET["sup"]) && $_GET["sup"] == "succes"){ echo "<div class='alert alert-danger mb-2'>Votre article a bien été supprimé</div>";}?>
        <div class="text-center pb-5">
            <a class="btn div-btn-base" href="AjoutArticle.php">Créer un article</a>
        </div>
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
                    <a href="EditArticle.php?id=<?= $article['id_article']?>" class="btn btn-primary">Editer</a>
                    <a href="SupprimerArticle.php?id=<?= $article['id_article']?> "class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
</section>
<?php }?>
<?php require_once "Pied.php"?>