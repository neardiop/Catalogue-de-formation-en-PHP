<?php
require_once('connexion_db/conn_db.php');
$id_dom = $_GET['id_dom'] ;
$sql_dom="select * from domaine where id_domaine=$id_dom ";
$query_dom=mysqli_query($conn,$sql_dom) or die(mysqli_error($conn));
$sql_soc1="select * from lieu";
$query_soc1=mysqli_query($conn,$sql_soc1) or die(mysqli_error($conn));
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seminaire de Formation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/album.css" rel="stylesheet">
    <meta name="keywords" content="Company Shipping Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"/>
    <script src="js/scriptIns.js"></script>
  <link href="css/style_ins.css" rel='stylesheet' type='text/css' />
  <script src="tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
  </head>
  <body>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <div class="w3ls-contact">
            <form action="ajout_participant.php" method="post">
              <div class="agile-field-txt">
                <div class="mr_agilemain">
                  <div class="left-wthree">
                    <select name="id_domaine">
                      <?php
                      while($dom=mysqli_fetch_object($query_dom)){
                      ?>
                      <option value="<?php echo $dom->id_domaine ?>"><?php echo $dom->nom_domaine ?></option>
                      <?php } ?>
                    </select>
                    <label class="bot_w3">Domaine</label>
                  </div>
                  <div class="left-wthree">
                    <select name="intitule">
                      <option value="<?php echo $_GET['intitule'] ?>"><?php echo $_GET['intitule'] ?></option>
                    </select>
                    <label class="bot_w3">Intitulé</label>
                  </div>
                </div>
              </div>
              <div class="agile-field-txt">
                <div class="mr_agilemain">
                  <div class="left-wthree">
                    <input type="text" name="nom" placeholder=" " required="">
                    <label class="bot_w3">Nom</label>
                  </div>
                  <div class="left-wthree">
                    <input type="text" name="prenom" placeholder=" " required="">
                    <label class="bot_w3">Prénoms</label>
                  </div>
                </div>
              </div>
              <div class="agile-field-txt">
                <div class="mr_agilemain">
                  <div class="left-wthree">
                    <input type="radio" name="sexe" value="M" ><B  style="color: white">  M</B> 
                    <input type="radio" name="sexe" value="F" ><B  style="color: white">  F</B> <br>
                    <label class="bot_w3">sexe</label>
                  </div>
                  <div class="left-wthree">
                    <input type="email" name="mail" placeholder=" " required="">
                    <label class="bot_w3">E-mail</label>
                  </div>
                </div>
              </div>
              <div class="agile-field-txt">
                <div class="mr_agilemain">
                  <div class="left-wthree">
                    <select name="montant">
                        <option value="<?php echo $_GET['montant'] ?>"><?php echo $_GET['montant'] ?></option>
                    </select>
                    <label class="bot_w3">Montant</label>
                  </div>
                  <div class="left-wthree">
                    <input type="text" name="adresse" placeholder=" " required="">
                    <label class="bot_w3">Adresse</label>
                  </div>
                </div>
              </div>
              <div class="w3ls-contact  w3l-sub">
                <input type="submit" value="Enregistrer">
              </div>
            </form>
          </div>
        </div>
      </section>
    </main>
    <script src="../js/jquery-2.2.3.min.js"></script>
    
  </body>
</html>







