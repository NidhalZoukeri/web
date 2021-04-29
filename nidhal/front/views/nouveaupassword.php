<?php

    require('../config.php');
    session_start();

    if (isset($_POST['password'])){
        $email=$_SESSION['email'] ;
        $password=$_POST['password'];
        if($_POST['confpassword']==$password){
            $sql="UPDATE client SET password= '" . $password . "' WHERE email='" . $email . "'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                header("Location: login.php");
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        else {
                echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
                echo 'Verifier votre mot de passe ';}
    } 
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nouveau mot de passe</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">
        <link href="../assets/img/logo.png" rel="icon">
        <link href="../assets/img/logo.png" rel="apple-touch-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
        <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/owl.carousel/../assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
            <div class="container d-flex">
                <div class="contact-info mr-auto">
                    <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">uptodiet@esprit.tn</a>
                    <i class="icofont-phone"></i> +216 27 765 995
                    <i class="icofont-google-map"></i> tunis , araiana essoghra technopole ghazela
                </div>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                    <a href="#" class="skype"><i class="icofont-skype"></i></a>
                    <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
                </div>
            </div>
        </div>
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><img src="../assets/img/up.jpg" alt="" class="img-fluid"><a href="../main.php">UP-TO-DIET</h1>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="../main.php">Home</a></li>
                    <li><a href="developement_p.html">Development Personelle</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            </div>
        </header>
        <section></section>
     
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h1 style=" text-align: center; color: #da1c5c;">Nouveau mot de passe</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                        
                                                <td>
                                                    <label class="small mb-1" for="password">Mot de passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="password" name="password" id="password" placeholder="Entrer le mot de passe">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="confpassword">Verifier Mot de passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="password" name="confpassword" id="confpassword" placeholder="Confirmer le mot de passe">
                                                </td>
                                            </tr>
                                </div>
                                            <tr>
                                                <td></td>
                                                <td>
                                                
                                                    <input class="btn btn-primary btn-block" type="submit" value="Envoyer" > 
                                                   

                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="reset" value="Annuler" >
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>                         
            </div>
        </div>
    </body>
</html>



















