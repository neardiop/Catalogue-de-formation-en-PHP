<?php
$domaine = $_POST['id_domaine'];
$lieu = $_POST['id_lieu'];
require_once('connexion_db/conn_db.php');
$sql_part="select * from formation natural join domaine natural join lieu where id_domaine=$domaine and id_lieu=$lieu ";
$query_part=mysqli_query($conn,$sql_part) or die(mysqli_error($conn));
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seminaire de Formation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/album.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand  navbar-dark bg-dark">
        <a href="index.html" class="navbar-brand">ESMT</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <ul class="navbar-nav mr-auto">
                <a href="index.php" class="nav-item active nav-link">  Rechercher une Formation  </a>
                <a href="nosPartenaire.php" class="nav-item active nav-link">  Nos Partenaires  </a>
                <a href="admin/index.php" class="nav item active nav-link">  Administrateur  </a>
            </ul>
        </div>
    </nav>
    </header>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading" style="text-shadow: 4px 2px gray;"><B>ESMT</B></h1>
          <p  style="color: black;font-size: 20px"><B>Le séminaire de formation a pour but premier de former les collaborateurs d’une entreprise.Il participe à la fédération des équipes. </B></p>
        </div>
      </section>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php
            while($part=mysqli_fetch_object($query_part)){
            ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img height="200px" class="card-img-top" src="<?php echo $part->image ?>">
                <div class="card-body">
                  <p class="card-text" style="height: 70px" ><?php echo $part->description; ?></p>
                  <?php 
                      echo"
                      <tr>
                              <td> <B>Domaine :</B> $part->nom_domaine</td><br>
                              <td><B>Intutilé : </B> $part->intitule</td><br>
                              <td><B>Lieu : </B>$part->nom_lieu</td><br>
                              <td><B>Date : </B>$part->date</td><br>
                              <td><B>Durée : </B>$part->duree</td><br>
                              <td><B>Montant : </B>$part->montant</td> F cfa<br>
                              <td><B>Animateurs : </B>$part->animateur</td><br>
                          </tr>";

                  ?>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="form_inscription.php?id_dom=<?php echo $part->id_domaine ?>&intitule=<?php echo $part->intitule ?>&montant=<?php echo $part->montant ?>">S'inscrie</a></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="<?php echo $part->programme; ?>">Voir Programme</a> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
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

    </footer>
    <script src="../js/jquery-2.2.3.min.js"></script>
  </body>
</html>

