<?php require_once "Entete.php";

if(empty($_SESSION["id_utilisateur"])) {
    header("location:Profil.php");
}

$Note = new Note();
$ListeNote = $Note->getListeNote($_SESSION["id_utilisateur"]);
$Moyenne = $Note->moyenneNote($_SESSION["id_utilisateur"])?>

<!-- Tableau des notes -->
<div class="container mt-4">
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

<!-- Deuxième tableau -->
    <table class="table">
      <thead>
        <tr>
          <th>Matières</th>
          <th>Moyenne de l'élève</th>
          <th>Moyenne de la matière</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($Moyenne as $moy) { ?>
          <tr>
            <th><?=$moy["libelle"]?></th>
            <td><?=intval($moy["moyUser"])?>/10</td>
            <td><?=intval($moy["moyMat"])?>/10</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</div>

<?php require_once "Pied.php"?>