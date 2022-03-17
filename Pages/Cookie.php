<div <?php if (isset($_COOKIE["AcceptCookie"])) { echo 'class="wrapper hide"'; } else { echo 'class="wrapper"';}?> >
    <img src="../Images/cookie.png"/>
    <div class="content">
      <header>Consentement aux cookies</header>
      <p>
        BTSAssist utilise des cookies pour vous garantir la meilleure
        expérience sur notre site
      </p>
        <div class="buttons">
                <form action="../Traitements/AcceptCookie.php" method="POST">
                    <input type="hidden" value="<?=$_SERVER["PHP_SELF"]?>" name="url">
                    <button name="AcceptCookie" class="item">Oui, j'accepte</button>
                </form>
                <a href="../Pages/Mention_legales.php" class="item">En savoir plus</a>
        </div>
    </div>
</div>