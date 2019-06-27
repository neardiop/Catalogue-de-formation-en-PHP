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
$id_domaine=$_POST['id_domaine'];
$intitule=$_POST['intitule'];
$id_lieu=$_POST['id_lieu'];
$date=$_POST['date'];
$duree=$_POST['duree'];
$montant=$_POST['montant'];
$animateur=$_POST['animateur'];
$image=$_POST['image'];
$description=$_POST['description'];
$sql_ajout="insert into formation values(null,'$id_domaine',".
        "'$intitule','$id_lieu','$date','$duree','$montant','$animateur','images/$image','$description','admin/$uploadfile')";
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));
echo"<div><h2>$intitule a été publié avec succés comme une nouvelle formation</h2>
    <a href='formation.php'>Retour à liste des formation</a></div>";
?>
<link rel="stylesheet" type="text/css" href="../css/styleConf.css">