<?php
session_start();
if(!isset($_SESSION['login'])){//Si la variable session n'existe pas
    header("location:index.php"); //Redirection vers la page d'authentification
    exit();
}
//Appel du fichier de connexion à la bd
require_once('../connexion_db/conn_db.php');
$sql_dom="select * from domaine";
//Exécution de la requête
$query_dom=mysqli_query($conn,$sql_dom) or die(mysqli_error($conn));
$sql_int="select * from formation";
//Exécution de la requête
$query_int=mysqli_query($conn,$sql_int) or die(mysqli_error($conn));


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seminaire de Formation</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/album.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style_Table.css">
    <style type="text/css">
      div{
        text-align: center;
      }
      div h1{
        text-align: center;
      }
      input[type="radio"]{
        margin: 20px;
      }
      input[type="submit"]{
        width: 30%;
        height: 40px;
        cursor: pointer;
        background-color: #232B2A;
        border: none;
        color: white;
      }
      input[type="submit"]:hover{
        width: 30%;
        height: 40px;
        cursor: pointer;
        background-color: white;
        border: 1px solid #232B2A;
        color: #232B2A;
      }
      #navbarSupportedContent a:hover{
        color: gray;
      }
      h3,h4{
        background-color: black;
            opacity: 0.8;
            color: white;
            font-family: "Times New Roman", Times, serif;

      }
    </style>
  </head>

  <body>
    <header>
      <?php include('menu.php'); ?>
    </header>
    <main role="main">
      <div class="album py-5 bg-light">
      <div class="container">
        <div><br>
          <form action="liste_participants.php" method="POST">
              <h4 align="left" style="width: 300px;border-radius: 10px;height: 50px"><label><input style="color: black;" type="radio" name="intitule" value="tout" required="">voir la liste totale</label></h4>
            <div style="border: 1px solid black;margin-left: 200px;margin-right: 200px;border-radius: 10px;background-color: rgba(0,0,0,0.4);">
              <?php
                while($dom=mysqli_fetch_object($query_dom)){
                    echo"<h4>$dom->nom_domaine</h4>";
                    $sql_int="select * from formation where id_domaine=$dom->id_domaine";
//Exécution de la requête
$query_int=mysqli_query($conn,$sql_int) or die(mysqli_error($conn));

                while($int=mysqli_fetch_object($query_int)){
                    echo"<B><label style='color:white;'><input type='radio' name='intitule' value='$int->intitule'>$int->intitule</label></B>";
                }
              }
                ?>

              </div><br>
            </div><br>
            <div>
              <input type="submit" name="Rechercher" value="Rechercher">
            </div>
          </form>
        </div>
      </div>
    </div>
    </main>
  <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Vers le haut</a>
        </p>
        <p>ESMT 2018 &copy; | Ecole Supérieure Multinationale des Télécommunications .</p>
        <p>RAMJID & TAPHA <br> Dakar | Sénégal </p>

      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="../js/jquery-2.2.3.min.js"></script>

  </body>
</html>

