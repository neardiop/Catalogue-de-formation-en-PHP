<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}
require_once('../connexion_db/conn_db.php');
$sql_soc="select * from domaine";
$query_soc=mysqli_query($conn,$sql_soc) or die(mysqli_error($conn));
$sql_soc1="select * from lieu";
$query_soc1=mysqli_query($conn,$sql_soc1) or die(mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Modifier la formation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="keywords" content="Company Shipping Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"/>
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <link href="../css/style_addForm.css" rel='stylesheet' type='text/css' />
  <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
      <br><br>
  <div class="w3ls-contact">
    <form enctype="multipart/form-data" action="addFormation.php" method="post">
      <div class="agile-field-txt">
        <div class="mr_agilemain">
          <div class="left-wthree">
            <select name="id_domaine">
            <option>Sélectionnez</option>
            <?php
            while($soc=mysqli_fetch_object($query_soc)){
                echo"<option value='$soc->id_domaine'>$soc->nom_domaine</option>";
            }
            ?>
        </select>
            <label class="bot_w3">
              Domaine</label>
          </div>
          <div class="left-wthree">
            <input type="text" name="intitule" placeholder=" " required="">
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
            while($soc1=mysqli_fetch_object($query_soc1)){
                echo"<option value='$soc1->id_lieu'>$soc1->nom_lieu</option>";
            }
            ?>
        </select>
            <label class="bot_w3">
              Lieu</label>
          </div>
          <div class="left-wthree">
            <input type="date" name="date" placeholder=" " required="">
            <label class="bot_w3">
              Date</label>
          </div>
        </div>
      </div>
      <div class="agile-field-txt">
        <div class="mr_agilemain">
          <div class="left-wthree">
            <input type="text" name="duree" placeholder=" " required="">
            <label class="bot_w3">
              Duréé</label>
          </div>
          <div class="left-wthree">
            <input type="number" name="montant" placeholder=" " required="">
            <label class="bot_w3">
              Montant en Fcfa</label>
          </div>
        </div>
      </div>
      <div class="agile-field-txt">
        <div class="mr_agilemain">
          <div class="left-wthree">
            <input type="text" name="animateur" placeholder=" " required="">
            <label class="bot_w3">
              Animateurs</label>
          </div>
          <div class="left-wthree">
            <input type="text" name="image" placeholder="saisir le chemin de l'img" required="">
            <label class="bot_w3">
              Images</label>
          </div>
        </div>
      </div>
      <div class="w3ls-contact  w3l-sub">
        <textarea name="description" placeholder="Description de la formation"></textarea>
      </div>
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
  <!-- //form ends here -->
  <div class="copy-wthree">
    <p align="center">© 2018 
    </p>
  </div>
</body>
</html>