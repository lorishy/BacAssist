<?php require_once "Entete.php";

    $idBts = $_GET["id"];
    $Option = new Option();
    $ListeOptions = $Option->getListeOption($idBts);


    if ($ListeOptions == false) {
        header("location:../Pages/ListeMatieres.php?idB=$idBts");
    } else { ?>

<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Options</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Quel options voulez-vous réviser ?</p>
    </div>

        <div class="container mt-5">
            <div class="row">
                <?php

                foreach ($ListeOptions as $option) { ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="card-bts mb-3">
                                <div class="card-body-nos-bts">
                                    <h5 class="card-title"><?=$option["libelle"]?></h5>
                                    <span class="section-separator"></span>
                                    <p class="card-text">Visionner tout les cours du <?=$option["libelle"]?>.</p>
                                    <a href="ListeMatieres.php?id=<?=$option["id_option"]?>&idBts=<?=$option["id_bts"]?>" class="btn div-btn-base">Voir les matières</a>
                                </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    <?php } ?>
</section>
<?php require_once "Pied.php";?>
