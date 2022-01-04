<?php require_once "Entete.php"?>

<div align="center" class="mt-5">
    <h1>Accédez aux cours de tous les BTS <br>avec leurs options !</h1>
</div>

<div class="container mt-5">
      <div class="row">
        <?php 
        $bts = new Bts();
        $ListeBts = $bts->getListeBts();

        foreach ($ListeBts as $bts) {?>

            <div class="col-md-6">
                  <div class="card text-white bg-dark mb-3 shadowCard">
                    <div class="card-header">BTS</div>
                        <div class="card-body">
                              <h5 class="card-title"><?=$bts["libelle"]?></h5>
                              <p class="card-text">Visionner tout les cours du <?=$bts["libelle"]?>.</p>
                              <a href="Options.php?id=<?=$bts["id_bts"]?>" class="btn button-login shadowCard">Voir les cours</a>
                        </div>
                  </div>
            </div>
<?php } ?>
      </div>
</div>
<?php require_once "Pied.php"?>