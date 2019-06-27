<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'existe pas
    header("location:index.php"); //Redirection vers la page d'authentification
    exit();
}
//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
//Définition de la requête de sélection
$sql_part="select * from formation natural join domaine natural join lieu";
//Exécution
$query_part=mysqli_query($conn,$sql_part) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des participants</title>
    <link rel="stylesheet" type="text/css" href="../css/album.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style_Table.css">
</head>
<body>
    <header>
      <?php include('menu.php') ?>
    </header>
    <main>
        <div class="album py-5 bg-light">
      <div class="container">
        <h6 align="left" ><a class="but" href="form_formation.php">Ajoutez une nouvelle formation</a></h6><br>
    <div class="tab">
<table align="center">
    <caption style="color: white">Listes des participants</caption>
    <tr>
        <th>Modification</th>
        <th>Suppression</th>
        <th>Domaine</th>
        <th>Intitulé</th>
        <th>Lieu</th>
        <th style="padding-left: 40px;padding-right: 40px;">Date</th>
        <th>Durée</th>
        <th>Montant</th>
        <th>Animateurs</th>
        <th class="b">Description</th>
    </tr>
    <?php
    while($part=mysqli_fetch_object($query_part)){
        echo"<tr>
                <td><a  class='but1' href='fiche_formation.php?id=$part->id'>Editer</a></td>
                <td></i><a class='but2' href='supprim_formation.php?id=$part->id'
                    onclick=\"return confirm('Voulez vous supprimer $part->intitule ? Oui ou Non?');\"><i class='fa fa-times aria-hidden='true'>Supprimer</a></td>
                <td>$part->nom_domaine</td>
                <td>$part->intitule</td>
                <td>$part->nom_lieu</td>
                <td >$part->date</td>
                <td>$part->duree</td>
                <td>$part->montant</td>
                <td>$part->animateur</td>
                <td>$part->description</td>
            </tr>";
    }
    ?>
</table><br>
</div>
</div>
</div>
</main>
  <footer class="text-muted">
      <div class="container" align="center">
        <p class="float-right">
          <a href="#">Vers le haut</a>
        </p>
        <p>ESMT 2018 &copy; | Ecole Supérieure Multinationale des Télécommunications .</p>
        <p>RAMJID & TAPHA Dakar | Sénégal </p>

      </div>
    </footer>
</body>
</html>
