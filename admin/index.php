<?php
session_start();//Démarrer ou relancer la session
if(isset($_SESSION['login'])){//Si on est déjà authentifié
    header("location:liste_participants.php");
    exit();
}
if(isset($_POST['btn_log'])){//SI on clique sur le bouton connexion
    //Appel du fichier de connexion à la bd
    require_once('../connexion_db/conn_db.php');
    //Récupération des données par la méthode POST
    extract($_POST);
    $mdp=sha1($mdp);
    //Définition de la requête de selection
    $sql_auth="SELECT count(*) nbl from admin where login='$login' and mdp='$mdp'";
    $query_auth=mysqli_query($conn,$sql_auth) or die(mysqli_error($conn));
    $auth=mysqli_fetch_object($query_auth);
    if($auth->nbl==1){//Si l'authentification est correcte
        $_SESSION['login']=$login;//Initialisation de la variable session
        header("location:formation.php");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mask Login Form Flat Responsive Widget Template :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Mask Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <link rel="stylesheet" href="../css/style_login.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/font-awesome.css" type="text/css" media="all">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-image: url(../images/2088.jpg);">
    <div class="container">
        <h1 class="title-agile">Bienvenue dans la page d'Administration</h1>
        <div class="cont_centrar">
            <div class="cont_login">
                <div class="cont_info_log_sign_up" style="margin-left: 280px">
                    <div class="col_md_login">
                        <div class="cont_ba_opcitiy text-center">
                            <h2>Login</h2>
                            <p><a href="../index.php"> Cliquer ici </a>, si vous n'étes pas un admin</p>
                            <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                        </div>
                    </div>
                </div>
                    <div class="cont_forms">
                        <div class="cont_img_back_">
                            <img src="../images/bg.jpg" alt="" />
                        </div>
                        <div class="cont_form_login">
                            <a href="#" onclick="ocultar_login_sign_up()">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </a>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <input type="text" placeholder="Email" name="login" required/>
                                <input type="password" placeholder="Password" name="mdp" required/>
                                <button name="btn_log" class="btn_login" onclick="cambiar_login()">LOGIN</button>
                            </form>
                        </div>
                        <div class="cont_form_sign_up">
                        </div>
                    </div>
            </div>
        </div>
        <div class="copy-wthree text-center">
            <p>© 2018 RAMJD & TAPHA
                
            </p>
        </div>
        <!--//copyright-->
    </div>
    <script src="../js/jquery-2.2.3.min.js"></script>
   <!-- form js -->
    <script src="../js/script.js"></script>
	<!-- form js -->

</body>
<!-- //Body -->

</html>