<?php
require_once('connexion_db/conn_db.php');
$sql_dom="select * from domaine";
$query_dom=mysqli_query($conn,$sql_dom) or die(mysqli_error($conn));
$sql_lieu="select * from lieu";
$query_lieu=mysqli_query($conn,$sql_lieu) or die(mysqli_error($conn));
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seminaire de Formation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/album.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleIndex.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand  navbar-dark bg-dark">
        <a href="index.html" style="color: white;" class="navbar-brand">ESMT</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <a style="color: white;" href="index.php" class="nav-item active nav-link">  Rechercher une Formation  </a>
            <a style="color: white;" href="nosPartenaire.php" class="nav-item active nav-link">  Nos Partenaires  </a>
            <a style="color: white;" href="admin/index.php" class="nav-item active nav-link">  Administrateur  </a>
          </ul>
        </div>
      </nav>
    </header>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading" style="text-shadow: 4px 2px gray;color: white"><B>ESMT</B></h1>
          <p  style="font-size: 20px"><B>Le séminaire de formation a pour but premier de former les collaborateurs d’une entreprise.Il participe à la fédération des équipes.</B></p>
        </div>
      </section>
      <div class="album py-5 bg-light">
        <div class="container">
          <div><br>
            <form action="acceuil.php" method="POST">
              <div>
                <h3>Rechercher une formation</h3>
              </div><br>
              <div>
                <select name="id_domaine" required="">
                  <option>Sélectionner un Domaine</option>
                  <?php
                  while($dom=mysqli_fetch_object($query_dom)){
                      echo"<option value='$dom->id_domaine'>$dom->nom_domaine</option>";
                  }
                  ?>
                </select>
              </div><br>
              <div>
                <select name="id_lieu" >
                  <option>Choisir un Lieu</option>
                  <?php
                  while($lieu=mysqli_fetch_object($query_lieu)){
                      echo"<option value='$lieu->id_lieu'>$lieu->nom_lieu</option>";
                  }
                  ?>
                </select>
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
<section  class="container">
            <div align="center" class="row text-center">
                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-map-marker"></i></a>
                    <p>Rocade Fann Bel-air<br> Sénégal</p>
                    
                </div>

                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                    <p>33-836-52-58 <br> Mon - Fri, 8:00-17:00</p>
                </div>

                <div class="col-md-4">
                    <a class="bg-primary px-3 py-2 rounded text-white mb-2 d-inline-block"><i class="fa fa-envelope"></i></a>
                    <p>esmt@gmail.com <br> esmtsn@gmail.com</p>
                </div>
            </div>

    </div>

</section><br>
<!-- Contact -->


    <!-- Footer -->
    <footer class="footer bg-dark text-white">

        <!-- Social Icons -->
        <div class="bg-primary">
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-6 col-lg-7">
                        <h4 class="mb-0 white-text">Connectez-vous avec nous sur les réseaux sociaux!</h4>
                    </div>
                    <div class="col-md-6 col-lg-5 text-right">
                        <a><i class="fa fa-facebook white-text mr-lg-4 fa-2x"> </i></a>
                        <a><i class="fa fa-twitter white-text mr-lg-4 fa-2x"> </i></a>
                        <a><i class="fa fa-google-plus white-text mr-lg-4 fa-2x"> </i></a>
                        <a><i class="fa fa-linkedin white-text mr-lg-4 fa-2x"> </i></a>
                        <a><i class="fa fa-instagram white-text mr-lg-4 fa-2x"> </i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid"><br>
            <p class="text-center m-0 py-1">
                © 2017 RAMJID & TAPHA
            </p>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    </footer>
    <script src="../js/jquery-2.2.3.min.js"></script>
  </body>
</html>

