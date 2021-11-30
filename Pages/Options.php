<?php require_once "Entete.php";

    $idBts = $_GET["id"];
    $Option = new Option();
    $ListeOptions = $Option->getListeOption($idBts);


    if ($ListeOptions == false) {
        header("location:../Pages/ListeMatieres.php?idBts=$idBts");
    } else { ?>

        <div align="center" class="mt-5">
            <h1>Quel options voulez-vous réviser ?</h1>
        </div>

        <div class="container mt-5">
            <div class="row">
                <?php

                foreach ($ListeOptions as $option) { ?>

                    <div class="col-md-6">
                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header">OPTION</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$option["libelle"]?></h5>
                                    <p class="card-text">Visionner tout les cours du <?=$option["libelle"]?>.</p>
                                    <a href="ListeMatieres.php?id=<?=$option["id_option"]?>" class="btn button-login">Voir les cours</a>
                                </div>
                            </div>
                    </div>
                <?php }?>
            </div>
        </div>
    <?php } ?>

<?php require_once "Pied.php";?>