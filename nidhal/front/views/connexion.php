<?php

    include_once '../Model/client.php';
    include_once '../Controller/clientC.php';
    session_start();
  
    $user = null;
    $userC = new clientC();
    if (
        isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["date_naissance"]) && 
        isset($_POST["telephone"]) &&
        isset($_POST["email"]) && 
        isset($_POST["login"]) && 
        isset($_POST["password"])&&
        isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]
                
    ) { 
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) && 
            !empty($_POST["date_naissance"]) && 
            !empty($_POST["telephone"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["login"]) && 
            !empty($_POST["password"])
            
        ) {
            $sql="SELECT * FROM client WHERE email='" . $_POST['email'] . "'";
			$db = config::getConnexion();
			
				$query=$db->prepare($sql);
				$query->execute();
                $count=$query->rowCount();
                if($count==0 && preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom'] )==1 && preg_match (" /^[a-zA-Z]{2,}$/ ", $_POST['prenom'] )==1 && preg_match ( ' /^.+@.+\.[a-z]{2,}$/ ' , $_POST['email'] )==1 && preg_match ( ' #^[0-9]{8}+$# ', $_POST['telephone'])==1 && $_POST['password']==$_POST['confpassword']){
                $user = new client(
                    $_POST['nom'],
                    $_POST['prenom'], 
                    $_POST['date_naissance'],
                    $_POST['telephone'],
                    $_POST['email'],
                    $_POST['login'],
                    $_POST['password']
            );
    
            
            $userC->ajouterclient($user);
            header('Location:login.php');
        
            $status = "<p style='color:#FFFFFF; font-size:20px'>
            <span style='background-color:#46ab4a;'>Votre code captcha est correct.</span></p>";
            }
            else {
                echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
                if($count!=0){echo 'L email existe deja '; echo "<br>";}
                if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom'] )==0){echo 'Le nom doit contenir que des lettres '; echo "<br>";}
                if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['prenom'] )==0){echo 'Le prenom doit contenir que des lettres '; echo "<br>";}
                if(preg_match ( ' /^.+@.+\.[a-zA-Z]{2,}$/ '  , $_POST['email'] )==0){echo 'L email est incorrect '; echo "<br>";} 
                if(preg_match ( " /^[0-9]{8}$/ " , $_POST['telephone'] )==0){echo 'Le numero de telephone doit contenir 8 chiffres '; echo "<br>";}
                if($_POST['password']!=$_POST['confpassword']){echo 'Verifier votre mot de passe ';}
            }
        }
    
        else
         echo 'Des informations sont manquantes';
    }
     
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Connexion</title>
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
        <link href="../assets/css/style1.css" rel="stylesheet">
    </head>

    <body>
        <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
            <div class="container d-flex">
                <div class="contact-info mr-auto">
                    <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">uptodietn@esprit.tn</a>
                    <i class="icofont-phone"></i> +216 94 366 666
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
                                    <h1 class="text-center font-weight-light my-4">S'inscrire</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="nom">Nom:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="nom" id="nom" maxlength="20" placeholder="Entrer le nom" >
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="prenom">Prénom:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="prenom" id="prenom" maxlength="20" placeholder="Entrer le prenom">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="date_naissance">date de naissance:</label>
                                                </td>
                                                <td>
                                                    <input  class="form-control" type="date" name="date_naissance" id="date_naissance">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="telephone">telephone:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="telephone" id="telephone"  placeholder="Entrer le numero de telephone">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="email">Adresse mail:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn|.+@yahoo.com|.+@yahoo.fr" placeholder="Entrer l'adresse mail">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="login">Login:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="login" id="login" placeholder="Entrer le nom d'utilisateur">
                                                </td>
                                            </tr>

                                            <tr>
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
                                                <img src="captcha.php"/>
                                                <input class="form-control" type="text" name="captcha"/>
                                                    <input class="btn btn-primary btn-block" type="submit" value="Envoyer" > 
                                                   

                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="reset" value="Annuler" >
                                                </td>
                                            </tr>
                                            <tr><td></td> </tr>
                                        </table>
                                        
                                    </form>
                                    
   
                               
                                
                                    <div class="btn btn-primary btn-block" onclick="myFunction()" >Imprimer la page</div>
                                
                                <script>
                                function myFunction() {
                                    window.print();
                                }
                                </script>
                            </div>
                        <div> 
                            <a href="login.php">j'ai deja un compte </a> 
                        </div>
                        </div>
                    </div>
                </div>                         
            </div>
        </div>

        <footer id="footer">
        <div class="footer-top">
              <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 footer-contact">
            <h3>UP-TO-DIET</h3>
            <p>
              ESPRIT <br>
              Ariana sghira, 2080<br>
              Tunisia <br><br>
              <strong>Phone:</strong> +216 94 366 666<br>
              <strong>Email:</strong> uptodiet@esprit.tn<br>
            </p>
            </div>
            <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="../main.php">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="developement_p.html">Development Personelle</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="forum.php">Blog</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
            </ul>
            </div>
            <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Pour recevoir toutes les noveautes medicales</p>
            <form  method="post" action="subscribe.php">
                <input  require type="email" name="subscribe" placeholder="Entrez votre adresse mail ici..."/>
                <button type="submit">S'abonner</button>
            </form>
            </div>
          </div>
          </div>
        </div>
        <div class="container d-md-flex py-4">
          <div class="mr-md-auto text-center text-md-left">
          <div class="copyright">
            &copy; Copyright <strong><span>UP-TO-DIET</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          </div>
          </div>
          <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
        </div>
        </footer>
        <!-- End Footer -->
        <div id="preloader"></div>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
        <!-- Vendor JS Files -->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>
        <script src="../assets/vendor/venobox/venobox.min.js"></script>
        <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/vendor/counterup/counterup.min.js"></script>
        <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>
    </body>
    </body>
</html>
                      
