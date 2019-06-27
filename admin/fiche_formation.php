<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}
require_once('../connexion_db/conn_db.php');
$sql_dom="select * from domaine";
$query_dom=mysqli_query($conn,$sql_dom) or die(mysqli_error($conn));
$sql_lieu="select * from lieu";
$query_lieu=mysqli_query($conn,$sql_lieu) or die(mysqli_error($conn));
$id=$_GET['id'];
$sql_fiche="select * from formation natural join domaine natural join lieu where id='$id' ";
$query_fiche=mysqli_query($conn,$sql_fiche) or die(mysqli_error($conn));
$fiche=mysqli_fetch_object($query_fiche);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulaire d'inscription</title>
    <link href="../css/style_addForm.css" rel='stylesheet' type='text/css' />
</head>
<body  style="background: url(../images/2088.jpg) no-repeat center;background-size: 100%">
<h2></h2>
  <header>
    <h1>Modifier la formation</h1>
  </header>
  <div class="w3ls-contact">

    <!-- form starts here -->
    <form enctype="multipart/form-data" action="modif_formation.php" method="post">
      <div class="agile-field-txt">
        <div class="mr_agilemain">
          <div class="left-wthree">
            <select name="id_domaine">
            <option>Sélectionnez</option>
            <?php
            while($dom=mysqli_fetch_object($query_dom)){
                echo"<option value='$dom->id_domaine' ";
                if($fiche->id_domaine === $dom->id_domaine) echo "selected";
                echo">$dom->nom_domaine</option>";
            }
            ?>
        </select>
            <label class="bot_w3">
              Domaine</label>
          </div>
          <div class="left-wthree">
            <input type="hidden" name="id" value="<?php echo $fiche->id ?>">
            <input type="text" name="intitule" placeholder=" " required="" value="<?php echo $fiche->intitule ?>">
            <label class="bot_w3">
              Intitulé</label>
          </div>
        </div>
      </div>
      <div class="agile-field-txt">
        <div class="mr_agilemain">
          <div class="left-wthree">
            <select name="id_lieu">
            <option>Sélectionnez</option>
            <?php
            while($lieu=mysqli_fetch_object($query_lieu)){
                echo"<option value='$lieu->id_lieu' ";
                if($fiche->id_lieu === $lieu->id_lieu) echo "selected";
                echo">$lieu->nom_lieu</option>";
            }
            ?>
        </select>
            <label class="bot_w3">
              Lieu</label>
          </div>
          <div class="left-wthree">
            <input type="date" name="date" placeholder=" " required="" value="<?php echo $fiche->date ?>">
            <label class="bot_w3">
              Date</label>
          </div>
        </div>
      </div>
      <div class="agile-field-txt">
        <div class="mr_agilemain">
          <div class="left-wthree">
            <input type="text" name="duree" placeholder=" " required="" value="<?php echo $fiche->duree ?>">
            <label class="bot_w3">
              Duréé</label>
          </div>
          <div class="left-wthree">
            <input type="number" name="montant" placeholder=" " required="" value="<?php echo $fiche->montant ?>">
            <label class="bot_w3">
              Montant en Fcfa</label>
          </div>
        </div>
      </div>
      <div class="agile-field-txt">
        <div class="mr_agilemain">
          <div class="left-wthree">
            <input type="text" name="animateur" placeholder=" " required="" value="<?php echo $fiche->animateur ?>">
            <label class="bot_w3">
              Animateurs</label>
          </div>
          <div class="left-wthree">
            <input type="text" name="image" placeholder="saisir le chemin de l'img" required="" value="<?php echo $fiche->image ?>">
            <label class="bot_w3">
              Images</label>
          </div>
        </div>
      </div>
      <div class="w3ls-contact  w3l-sub">
        <textarea name="description" placeholder="Description de la formation">
          <?php echo $fiche->description ?>
        </textarea>
      </div>
<p style="color: red;font-size: 20px">Attention : Joindre à nouveau le programme svp</p>
      <div class="agile-field-txt"><br>
        <div class="mr_agilemain">
          
          <div style="color: white">
          <label>Joindre le programme :</label>
          <input type="file" name="fichier">
          </div>
          </div>
        </div>
      <div class="w3ls-contact  w3l-sub">
        <input type="submit" value="Enregistrer">
      </div>

    </form>
  </div>
</body>
</html>
