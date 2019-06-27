<?php
//Appel du fichier de connexion à la bd
require_once('connexion_db/conn_db.php');
//Définition de la requête de sélection
$sql_part="select * from participant natural join societe";
//Exécution
$query_part=mysqli_query($conn,$sql_part) or die(mysqli_error($conn));


$sql_part1="select * from image ";
//Exécution
$query_part1=mysqli_query($conn,$sql_part1) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des participants</title>
    <link rel="stylesheet" href="styletable.css">
</head>
<body>
<?php
    include "menu.php";
?>
<table>
    <caption>Liste des participants</caption>
    <tr>
        <th>NOM</th>
        <th>Prénoms</th>
        <th>E-mail</th>
        <th>Sexe</th>
        <th>Société</th>
    </tr>
    <?php
    while($part=mysqli_fetch_object($query_part)){
        echo"<tr>
                <td>$part->nom</td>
                <td>$part->prenom</td>
                <td>$part->email</td>
                <td>$part->sexe</td>
                <td>$part->nom_societe</td>
            </tr>";
    }
    ?>
    <?php
    while($part1=mysqli_fetch_object($query_part1)){  echo "$part1->lien" ; ?>
       <img src=" <?php echo $part1->lien ?> ">
    <?php }
    ?>
</table>


</body>
</html>
