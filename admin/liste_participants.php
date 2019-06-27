<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}
require_once('../connexion_db/conn_db.php');
$intitule = $_REQUEST['intitule'];
if ($intitule === 'tout') {
    $sql_part="SELECT * FROM participants NATURAL JOIN domaine ";
}
else{
    $sql_part="SELECT * FROM participants NATURAL JOIN domaine WHERE intitule='$intitule'";

}
$query_part=mysqli_query($conn,$sql_part) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des participants</title>
    <link rel="stylesheet" href="../css/style_Table.css">
    <link rel="stylesheet" type="text/css" href="../css/album.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
      <?php include('menu.php'); ?>
    </header>
    <main>
        <div class="album py-5 bg-light">
      <div class="container">
<table align="center">
    <tr>
        <th class='col'>Modification</th>
        <th>Suppression</th>
        <th class='col'>NOM</th>
        <th>Prénoms</th>
        <th class='col'>E-mail</th>
        <th>Sexe</th>
        <th class='col'>Domaine</th>
        <th>Intitulé</th>
        <th class='col'>Adresse</th>
        <th>Montant</th>
    </tr>
    <?php
    while($part=mysqli_fetch_object($query_part)){
        echo"<tr>
                <td><a style='color:white' class='but1' href='fiche_participant.php?id=$part->id&intitule=$part->intitule&recherche=$intitule'>Editer</a></td>
                <td><a style='color:white' class='but2' href='supprim_participant.php?id=$part->id&recherche=$intitule'
                onclick=\"return confirm('Voulez vous supprimer $part->prenom ? Oui ou Non?');\"><i class='fa fa-times aria-hidden='true'>Supprimer</a></td>
                <td class='col'>$part->nom</td>
                <td>$part->prenom</td>
                <td class='col'>$part->mail</td>
                <td>$part->sexe</td>
                <td class='col'>$part->nom_domaine</td>
                <td>$part->intitule</td>
                <td class='col'>$part->adresse</td>
                <td>$part->montant F cfa</td>
            </tr>";
    }
    ?>
</table>
</div>
</div>
</main>
<footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Vers le haut</a>
        </p>
        <p>ESMT 2018 &copy; | Ecole Supérieure Multinationale des Télécommunications .</p>
        <p>RAMJID & TAPHA <br> Dakar | Sénégal </p>

      </div>
    </footer>
</body>
</html>
