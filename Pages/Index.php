<?php require_once "Entete.php"?>

<div class="container mt-4">
    <?php if(isset($_GET["sup"]) && $_GET["sup"] == "succes") {
        echo "<div class='text-success'>Le compte a été supprimé avec succès !</div>";
        header("refresh:3;Index.php");}?>
</div>

    <?php
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

<h1 class="text-center mt-2 titreAcceuil">Bienvenue sur BtsAssist</h1>

<div class="container-article main pt-5">
  <div class="pagination">
    <?php for($i=1;$i<=$nombreDePage;$i++) {
    echo "<a class='btn button-login' href='?page=$i'>$i</a>&nbsp";
    }?>
  
  </div>
  <?php foreach($listeArticle as $article) { 
    
    $Utilisateur = new Utilisateur($article["id_utilisateur"]);
    $avatarUtilisateur = $Utilisateur->getAvatar();
    $pseudoUtilisateur = $Utilisateur->getPseudo();
    ?>
        
        <article class="card-article card-header-avat mt-5">
            <header class="card-article-header card-header-avatr">
                <div class="content-avatar-titre">
                    <?php if(!empty($avatarUtilisateur)) {?>
                        <img src="../Images/Utilisateurs/<?=$avatarUtilisateur?>" width="45" height="45" style="border-radius : 40%" class="card-article-avatar">
                    <?php } else {?>
                        <img src="../Images/avatar.png" width="45" height="45" style="border-radius : 40%" class="card-article-avatar">
                    <?php } ?>
                    <div class="card-article-title"><?=$pseudoUtilisateur?></div>
                </div>
            </header>

            <div class="card-article-body">
              <?php if($article["image_article"] != null) { ?>
                <p>
                <img class="full-width" src="../Images/Articles/<?=$article['image_article']?>" alt="">
                </p>
              <?php } ?>
            <footer class="card-article-footer">
              <button class="like-button" title="Like">
              <div class="like-button__ring"></div>
              <div class="like-button__text sr-only"></div>
              <svg class="like-button__icon" viewBox="0 0 512 512" width="100" title="heart">
                  <path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"></path>
              </svg>
              <input id="nbLike" type="hidden" value="50">
              <div class="like-button__count" aria-hidden="true"></div>
              </button>
              <button data-modal-target="#modale-me" class="card-article-comments btn-commentaire"></a>
                <i class="fa-regular fa-comment fa-2xl"></i>
              </button>
            </footer>
              <div class="card-article-title"><?=$article["titre"]?></div>
              <p>
                  <?=$article["contenu"]?>
              </p>
              <button class="btn-ajouter-message" data-modal-target="#modale-me">Afficher les 10 commentaires</button><!-- Faire un count des commentaire de l'article et le mettre dans 'afficher les ... comentaires' -->
              <div class="card-article-date">Il y a 5 min</div>
          </div>
          <div class="border-top"></div>
          <form method="POST" class="send-message_input" action="">
              <input name="commentaire" type="text" placeholder="Ajouter un commentaire">
              <a type="submit"><i class="fa-solid fa-paper-plane fa-xl"></i></a>
          </form>
        </article>
    <?php } ?>
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
<script>
  
  const BUTTON = document.querySelector(".like-button");
  const ICON = BUTTON.querySelector(".like-button__icon");
  const RING = BUTTON.querySelector(".like-button__ring");
  const COUNT = BUTTON.querySelector(".like-button__count");
  const TEXT = BUTTON.querySelector(".like-button__text");

  const LIKE_COUNT = Number(document.querySelector("#nbLike").value);
  TEXT.innerText = `${LIKE_COUNT} Likes`;
  COUNT.innerText = LIKE_COUNT;

  let liked = false;

  const LIKE = () => {
    liked = !liked;
    TEXT.innerText = `${liked ? LIKE_COUNT + 1 : LIKE_COUNT} Likes`;
    COUNT.innerText = liked ? LIKE_COUNT + 1 : LIKE_COUNT;
    BUTTON.classList.toggle("like-button--active");
    gsap.set(RING, { display: liked ? "block" : "none" });
    gsap
      .timeline()
      .set(RING, {
        scale: 1,
        opacity: 1
      })
      .set(COUNT, {
        yPercent: 0
      })
      .to(
        ICON,
        {
          scale: 1.25,
          repeat: 1,
          yoyo: true,
          duration: 0.3,
          ease: "power4.out"
        },
        "<"
      )
      .to(
        COUNT,
        {
          yPercent: -150,
          repeat: 1,
          yoyo: true,
          ease: "power4.out",
          duration: 0.3
        },
        "<"
      )
      .to(
        RING,
        {
          duration: 0.3,
          scale: 4,
          opacity: 0
        },
        "<"
      );
  };

  BUTTON.addEventListener("click", LIKE);


  const openModalButtons = document.querySelectorAll("[data-modal-target]");
  const closeModalButtons = document.querySelectorAll(
    "[data-close-button]"
  );
  const overlay = document.querySelector("#overlay");

  openModalButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const modal = document.querySelector(button.dataset.modalTarget);
      openModal(modal);
    });
  });
  closeModalButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const modal = button.closest(".modale");
      closeModal(modal);
    });
  });
  function openModal(modal) {
    if (modal == null) return;
    modal.classList.add("active");
    overlay.classList.add("active");
  }
  function closeModal(modal) {
    if (modal == null) return;
    modal.classList.remove("active");
    overlay.classList.remove("active");
  }
</script>

<?php require_once "Pied.php"?>