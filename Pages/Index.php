<?php 
if(isset($_GET["sup"]) && $_GET["sup"] == "succes") {
  echo "<div class='alert alert-warning'>Le compte a été supprimé avec succès !</div>";
  header("refresh:3;Index.php");
}

require_once "Entete.php";
?>
<section class="section-nav">
  <div class="text-box">
    <h1>Bienvenue</h1>
    <p>Exercer, Informer, Apprendre</p>
    <a href="" class="btn-contact-me">Contactez-nous</a>
  </div>
</section>
<section class="section">
  <div class="section-header">
    <h2>A Propos</h2>
    <span class="section-separator"></span>
    <p>Qui sommes-nous ?</p>
  </div>
  <div class="div-qui-somme-nous">
    <p>
      La start-up BTS Assist créée depuis 2 ans est une organisation
      française SARL fondée par le français Irold Lawson située à Paris elle
      est basée sur la création de site web. BTS Assist est dirigée par deux
      développeurs full-stack. Suite à la crise de la COVID-19, BTS Assist a
      décidé de proposer une plateforme permettant à l’étudiant de facilité
      l’obtention du BTS.
    </p>
  </div>
</section>
<section class="section">
  <div class="section-header">
    <h2>Nos Mission</h2>
    <span class="section-separator"></span>
    <p>S'exercer, S'informer, Se Motiver</p>
  </div>
  <div class="rowme">
    <div class="course-mecol">
      <h3>S'exercer</h3>
      <p>
        BTS Assist œuvre dans le but de faciliter l’accès à la connaissance
        tout en instaurant un cadre de bienveillance qui permet aux jeunes
        de s’affranchir des barrières mentales.
      </p>
    </div>
    <div class="course-mecol">
      <h3>S'informer</h3>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo
        tempore dolorem sequi, aut eos aspernatur officia deleniti libero
        ullam asperiores voluptatibus rerum maxime! Dignissimos hic dolore
      </p>
    </div>
    <div class="course-mecol">
      <h3>Se Motiver</h3>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo
        tempore dolorem sequi, aut eos aspernatur officia deleniti libero
        ullam asperiores voluptatibus rerum maxime! Dignissimos hic dolore
      </p>
    </div>
  </div>
</section>
<section class="section-contact">
  <div class="section-header">
    <h2>Contact</h2>
    <span class="section-separator"></span>
    <p>Contactez-nous</p>
  </div>
</section>
<?php require_once "Pied.php";?>