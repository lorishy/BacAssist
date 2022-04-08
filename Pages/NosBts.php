<?php require_once "Entete.php"?>

<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Nos BTS</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Accédez aux options cours et matières de tous les BTS</p>
    </div>


<div class="container mt-5">
      <div class="row">
        <?php 
        $Bts = new Bts();
        $ListeBts = $Bts->getListeBts();

        foreach ($ListeBts as $bts) {?>

            <div class="col-lg-4 col-md-6">
                  <div class="card-bts mb-3">
                        <div class="card-body-nos-bts">
                              <h3 class="card-title"><?=$bts["libelle"]?></h3>
                              <span class="section-separator"></span>
                              <p class="card-text">Accéder à tous les cours du <?=$bts["libelle"]?>.</p>
                              <div>
                                    <a href="Options.php?id=<?=$bts["id_bts"]?>" class="btn div-btn-base">Voir plus</a>
                              </div>
                        </div>
                  </div>
            </div>
<?php } ?>
      </div>
</div>
</section>
<?php require_once "Pied.php"?>