<?php
require_once "Entete.php";
        $Article = new Article();
        $nombreArticle = $Article->nombreArticle();
        if(isset($_GET["page"]) && !empty($_GET["page"])) {
          $page = $_GET["page"];
        } else {
          $page=1;
        }
        $nombreElementsParPages = 5;
        $nombreDePage = ceil($nombreArticle[0]["cpt"]/$nombreElementsParPages);
        $debut = ($page-1)*$nombreElementsParPages;
        $listeArticle = $Article->getListeArticle($debut, $nombreElementsParPages);
    ?>
<section class="section section-bg larger-padding-top">
  <div class="section-header">
      <h2 class="titreAcceuil">Fil D'actualité</h2>
      <span class="section-separator"></span>
      <p class="titreAcceuil">Bienvenue sur le fil d'actualité de BTS Assist</p>
  </div>

  <div class="container-article">
  <?php foreach($listeArticle as $article) { 
    
    $Utilisateur = new Utilisateur($article["id_utilisateur"]);
    $avatarUtilisateur = $Utilisateur->getAvatar();
    $pseudoUtilisateur = $Utilisateur->getPseudo();
    ?>
        <article class="card-article mb-4">
            <header class="card-article-header card-header-avatr">
                <div class="content-avatar-titre">
                    <?php if(!empty($avatarUtilisateur)) {?>
                        <img src="../Images/Utilisateurs/<?=$avatarUtilisateur?>" width="45" height="45" style="border-radius : 40%" class="card-article-avatar">
                    <?php } else {?>
                        <img src="../Images/avatar.png" width="45" height="45" style="border-radius : 40%" class="card-article-avatar">
                    <?php } ?>
                    <?php if(!empty($pseudoUtilisateur)) {?>
                      <div class="card-article-title"><?=$pseudoUtilisateur?></div>
                    <?php } else { ?>
                      <div class="card-article-title">Utilisateur introuvable</div>
                    <?php } ?>
                </div>
            </header>

            <div class="card-article-body">
              <?php if($article["image_article"] != null) { ?>
                <p>
                <img class="full-width" src="../Images/Articles/<?=$article['image_article']?>" alt="">
                </p>
              <?php } ?>
            <footer class="card-article-footer">
            <i class="fa fa-heart-o" style="font-size:24px; color:black" ></i>
              </button>
              <button data-modal-target="#modale-me" class="card-article-comments btn-commentaire"></a>
                <i class="fa-regular fa-comment fa-2xl"></i>
              </button>
            </footer>
              <div class="card-article-title"><?=$article["titre"]?></div>
              <p class="contenue-article">
                  <?=$article["contenu"]?>
              </p>
              <?php $Commentaire = new Commentaire();
                $ListeCommentaire = $Commentaire->getCommentaires($article["id_article"]);
            foreach ($ListeCommentaire as $Com) { 
                $utilisateurCommentaire = new Utilisateur($Com['id_utilisateur']);
                ?>
              <div class="commentaire-users">
                  <?php if($utilisateurCommentaire->getPseudo() != null) {?>
                      <span><?= $utilisateurCommentaire->getPseudo()?> :</span>
                    <?php } else {?>
                      <span>Utilisateur introuvable :</span><?php }?>
                  <p><?=$Com['contenu']?></p>
                </div>
              <?php } ?>
              <div class="card-article-date"><?= dateFr($article["date_creation"])?></div>
              <button class="btn-ajouter-message" data-modal-target="#modale-me">Afficher les 10 commentaires</button><!-- Faire un count des commentaire de l'article et le mettre dans 'afficher les ... comentaires' -->
          </div>
<hr>
          <form method="POST" class="send-message_input" action="../Traitements/AjoutCommentaire.php?id=<?=$article['id_article']?>">
              <input name="commentaire" type="text" placeholder="Ajouter un commentaire">
              <input type="hidden" name="url" value="<?=$_SERVER["PHP_SELF"]?>">
              <button class="btn-envoie-commentaire" name="envoi" type="submit"><i class="fa-solid fa-paper-plane fa-xl"></i></button>
          </form>
        </article>
        <?php } ?>
    <div class="pagination">
        <?php for($i=1;$i<=$nombreDePage;$i++) {
        echo "<a class='btn btn-pagination' href='?page=$i'>$i</a>&nbsp";
        }?>
    </div>
      </div>
    <!-- Modal Start -->
    <div id="modale-me" class="modale">
      <div class="div-close-btn">
        <button data-close-button class="close-button">&times;</button>
      </div>
      <div class="imgBx">
        <img
          src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80"
          alt=""
        />
      </div>
      <div class="contentBx">
        <div class="formBx">
          <div class="header-modal">
            <img
              src="../Images/avatar.png"
              width="45"
              height="45"
              alt=""
              class="card-article-avatar"
            />
            <span class="modal-header-auteur">L'auteur &nbsp;</span>
            <span class="modal-header-titre"> • Titre</span>
          </div>
          <hr />
          <div class="commentaire">
            <div class="div-commentaire">
              <div class="content-commentaire">
                <div class="img">
                  <img
                    src="../Images/avatar.png"
                    width="35"
                    height="35"
                    alt=""
                    class="card-article-avatar"
                  />
                </div>
                <div class="auteur-commentaire">L'auteur</div>
                <p class="contenue-commentaire">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Placeat, consectetur.
                </p>
              </div>
              <div class="content-date">
                <p class="date-commentaire">il y a 3j</p>
              </div>
            </div>
            
          <hr />
          <form class="send-message_input-commentaire" action="">
            <input type="text" placeholder="Ajouter un commentaire" />
            <a href=""><i class="fa-solid fa-paper-plane fa-xl"></i></a>
          </form>
        </div>
      </div>
    </div>
    <div id="overlay" class=""></div>
    </div>
    <!-- Modal End -->
    <script src="../app/modal.js"></script>

<?php require_once "Pied.php"?>