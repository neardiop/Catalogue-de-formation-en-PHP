<?php
require_once('connexion_db/conn_db.php');
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$sexe=$_POST['sexe'];
$mail=$_POST['mail'];
$id_domaine=$_POST['id_domaine'];
$intitule=$_POST['intitule'];
$adresse=$_POST['adresse'];
$montant=$_POST['montant'];
$sql_ajout="insert into participants values(null,'$nom',".
        "'$prenom','$sexe','$mail','$id_domaine','$intitule','$adresse','$montant')";
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));
echo"<div><h2>Merci $nom $prenom ! un mail de confirmation vous a été envoyé à l'adresse $mail</h2>
    <a href='index.php'>Retour à la page d'accueil</a></div>";
?>
<link rel="stylesheet" type="text/css" href="css/styleConf.css">