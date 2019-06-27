<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'existe pas
    header("location:index.php"); //Redirection vers la page d'authentification
    exit();
}
//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
//Récupération des données par la méthode POST
extract($_POST);
//Définition de la requête de mise à jour
$sql_modif="update participants set nom='$nom', prenom='$prenom', ".
"sexe='$sexe', mail='$mail', id_domaine='$domaine' ,intitule='$intitule' where id='$id'";
//Exécution de la requête
$query_modif=mysqli_query($conn,$sql_modif) or die(mysqli_error($conn));
//Redirection
header("location:liste_participants.php?intitule=$recherche");
?>