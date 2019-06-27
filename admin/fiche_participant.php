<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}
require_once('../connexion_db/conn_db.php');

$id=$_GET['id'];
$sql_dom="select * from domaine";
$query_dom=mysqli_query($conn,$sql_dom) or die(mysqli_error($conn));

$inti=$_GET['intitule'];
$sql_fiche="select * from participants natural join domaine where id='$id' ";
$query_fiche=mysqli_query($conn,$sql_fiche) or die(mysqli_error($conn));
$fiche=mysqli_fetch_object($query_fiche);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" type="text/css" href="/css/styleFiche.css">
    <style type="text/css">
        form{
            text-align: center;
            margin: 100px;
            background-color: black;
            opacity: 0.7;
            margin-left: 350px;
            margin-right: 350px;
        }
        body{
            background: url(../images/2088.jpg) no-repeat center;
            background-size: 100%;
        }
        form div input[type="text"],input[type="email"],select{
            width: 200px;
            height: 30px;
            margin-left: 30px;
            font-size: 15px;
            background-color:  white;
        }
        form div input[type="submit"]{
            width: 300px;
            height: 40px;
            font-size: 20px;
            cursor: pointer;
        }
        form div input[type="radio"]{
            width: 30px;
            height: 20px;
            font-size: 20px;
            cursor: pointer;
        }
        form div input[type="submit"]:hover{
            width: 300px;
            height: 40px;
            font-size: 20px;
            cursor: pointer;
            background-color: yellow;
            border: none;
        }
        form div .a{
            display: inline-block;
        }
        form div label{
            font-size: 20px;
            color: white;
        }
    </style>

</head>
<body>
<form method="post" action="modif_participant.php"><br>
<h2 align="center" style="color: white">Formulaire d'inscription</h2><br>
    <div>
        <div class="a">
            <input type="hidden" name="id" value="<?php echo $fiche->id ?>">
            <input type="hidden" name="recherche" value="<?php echo $_GET['recherche']?>">
            <input type="text" name="prenom" value="<?php echo $fiche->prenom ?>"><br><br>
            <label>Prénoms</label>
        </div>
        <div class="a">
            <input type="text" name="nom" value="<?php echo $fiche->nom ?>"><br><br>
            <label>NOM</label>
        </div>
    </div><br>
    <div>
        <div class="a" style="width: 230px">
            <input type="radio" name="sexe" value="F"
                   <?php
                   if($fiche->sexe=="F") echo "checked"
                   ?>
                   ><label>F</label>
            <input type="radio" name="sexe" value="M"
                    <?php
                   if($fiche->sexe=="M") echo "checked"
                   ?>
                   ><label>M</label><br><br>
            <label>Sexe</label>
        </div>
        <div class="a">
            <input type="email" name="mail" value="<?php echo $fiche->mail ?>"><br><br>
            <label>E-mail</label>
        </div>
    </div><br>
    <div>
        <div class="a">
            <select name="domaine">
                <option value="<?php echo $fiche->id_domaine ?>"><?php echo $fiche->nom_domaine ?></option>
            </select><br><br>
            <label>Domaine</label>
        </div>
        <div class="a">
            <select name="intitule">
                <option>Sélectionnez</option>
                <?php
                    $sql_intit="select * from formation where id_domaine='$fiche->id_domaine'";
                    $query_intit=mysqli_query($conn,$sql_intit) or die(mysqli_error($conn));
                    while($intit=mysqli_fetch_object($query_intit)){
                    echo"<option value='$intit->intitule' ";
                    if($inti === $intit->intitule) echo "selected";
                    echo">$intit->intitule</option>";
                }
                ?>
            </select><br><br>
            <label>Intitule</label>
        </div>
    </div><br>
    <div>
        <input type="submit" name="bModif" value="Modifier">
    </div><br><br>
</form>
</body>
</html>
