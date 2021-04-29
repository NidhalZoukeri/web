<?php

    include_once '../Model/client.php';
    require('../config.php');
    session_start();

        if (isset($_POST['email'])){
            $email=$_POST['email'];
            $sql="SELECT * FROM client WHERE email='" . $email . "'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
                $count=$query->rowCount();
                if($count==1){
                    $user=$query->fetch();
                    $_SESSION['email'] = $email;
                    $_SESSION['login'] = $user['login'];
                    $login=$user['login'];
                    $code=mt_rand(1000,9999);
                    $sql="UPDATE client SET code= '" . $code . "' WHERE email='" . $email . "'";
                    $db = config::getConnexion();
                    $query1=$db->prepare($sql);
                    $query1->execute();

                    $email1="cinemasmart73@gmail.com";    
                    $dest = $email;
                    $sujet = "Réinitialisation du mot de passe";
                    $corp =" Bonjour $login voici votre code de verification $code " ;
                    $headers = 'From: ' .$email1 . "\r\n".'Reply-To: ' . $email1. "\r\n".'X-Mailer: PHP/' . phpversion();
                    if (mail($dest, $sujet, $corp, $headers)) {
                        echo "Email envoyé avec succès à $dest ...";
                    } 
                    else {
                         echo "Échec de l'envoi de l'email...";
                    }
                    header("Location: verifpassword.php");
                }
		    }
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
            }
        } 



?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Mot de passe oublié </title>
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
                    <i class="icofont-phone"></i> +216 27765995
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
            <h1 class="logo mr-auto"><img src="../assets/img/LOGOO.png" alt="" class="img-fluid"><a href="../main.php">UP-TO-DIET</h1>
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
                                    <h1 style=" text-align: center; color: #da1c5c;">Mot de passe oublié</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="email">Adresse mail:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn|.+@yahoo.com|.+@yahoo.fr" placeholder="Entrer l'adresse mail">
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
