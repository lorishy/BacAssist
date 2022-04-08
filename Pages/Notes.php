<?php require_once "Entete.php";

if(empty($_SESSION["id_utilisateur"])) {
    header("location:Profil.php");
}

$Note = new Note();
$ListeNote = $Note->getListeNote($_SESSION["id_utilisateur"]);
$Moyenne = $Note->moyenneNote()?>

<!-- Tableau des notes -->
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Mes Notes</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Consultation de mes notes</p>
    </div> 
<div class="container container-medium">
    <table class="table">
      <thead>
        <tr>
          <th>Matières</th>
          <th>Note de l'élève</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ListeNote as $detailNote) {?>
            <tr>
              <th scope="row"><?=$detailNote["libelle"]?></th>
              <td><?=$detailNote["note"]?>/10</td>
              <td><?php echo dateFr($detailNote["date_note"])?></td>
            </tr>
        <?php } ?>
      </tbody>
    </table>
    <table class="table">
      <thead>
        <tr>
          <th>Matières</th>
          <th>Moyenne de l'élève</th>
          <th>Moyenne de la matière</th>
          <th>Moyenne générale</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($Moyenne as $moy) { ?>
          <tr>
            <th><?=$moy["libelle"]?></th>
            <td><?=intval($moy["moyenne"])?>/10</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</div>
</section>
<?php require_once "Pied.php"?>