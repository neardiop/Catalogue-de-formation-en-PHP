<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}
require_once('../connexion_db/conn_db.php');
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);
move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile);
extract($_POST);
$sql_modif="UPDATE formation SET id_domaine='$id_domaine', intitule='$intitule', ".
"id_lieu='$id_lieu', date='$date', duree='$duree' , montant='$montant', ".
" animateur='$animateur' , description='$description' ,programme='admin/$uploadfile' where id='$id'";
$query_modif=mysqli_query($conn,$sql_modif) or die(mysqli_error($conn));
header("location:formation.php");
?>