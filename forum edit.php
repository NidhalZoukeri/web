<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Live Dinner Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/mahdii.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="Forum.php">back</a></li>
						
						
						
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Forum</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start blog -->
	<div class="blog-box">
	
		<div class="container">
		<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Forum</h2>
						<p>Formulaire de Modification</p>
					</div>
				</div>
	 
		<!-- Start Formulaire -->
		<form action=" " method="post" enctype="multipart/form-data">
			<?php include('connect.php');
if (isset($_POST['submit'])) {
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $Poids = $_POST['Poids'];
    $Largeur = $_POST['Largeur'];
    $Age = $_POST['Age'];
    $sexe = $_POST['sexe'];
    $id=$_GET['editid'];
    $query = mysqli_query($conn, "update forum set Nom ='$Nom', Prenom ='$Prenom' , Poids ='$Poids' , Largeur ='$Largeur', Age ='$Age' , sexe ='$sexe'   where id='$id'");
    if ($query) {
        $msg = "Forum modifier";
		header('Location: Tableau Forum.php');

    } else {
        $msg = "Problème de modification";
    }
}
?>
                        
						 <div class="form-group">    
                        <label class="control-label col-md-2 col-sm-1 col-xs-4" align="left">Nom<span class="required"><font color="red">&nbsp;*</font></span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						   
                         <?php  include_once('config4.php');
						 
						               $id=$_GET['editid'];
												$requete3x = "SELECT Nom FROM forum where id='$id' ";
												$resultat3x = $mysqli->query($requete3x);
												
												while ($ligne3x = $resultat3x->fetch_assoc()) {
												
											    $nom= $ligne3x['Nom'];
								?>
										<input type="text" class="form-control" name="Nom" id="Nom" value="<?php echo $nom;?>" style="width: 50%" required>
										<?php
										}
								?>
				 
						</div>
				    </div>
				<br/> 
					  <div class="form-group">
                         <label class="control-label col-md-2 col-sm-1 col-xs-4">Prenom<span class="required"><font color="red">&nbsp;*</font></span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          
                         <?php  include_once('config4.php');
						 
						               $id=$_GET['editid'];
												$requete3x = "SELECT Prenom FROM forum where id='$id' ";
												$resultat3x = $mysqli->query($requete3x);
												
												while ($ligne3x = $resultat3x->fetch_assoc()) {
												
											    $Prenom= $ligne3x['Prenom'];
								?>
										<input type="text" class="form-control" name="Prenom" id="Prenom" value="<?php echo $Prenom;?>" style="width: 50%" required> 
										<?php
										}
								?>
					 
						</div>
				    </div>
					
								<br/> 
								
                     <div class="form-group">
                         <label class="control-label col-md-2 col-sm-1 col-xs-4">Poids<span class="required"><font color="red">&nbsp;*</font></span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
               
                         <?php  include_once('config4.php');
						 
						               $id=$_GET['editid'];
												$requete3x = "SELECT Poids FROM forum where id='$id' ";
												$resultat3x = $mysqli->query($requete3x);
												
												while ($ligne3x = $resultat3x->fetch_assoc()) {
												
											    $Poids= $ligne3x['Poids'];
								?>
										<input type="text" class="form-control" name="Poids" id="Poids" value="<?php echo $Poids;?>" style="width: 50%" required> 
										<?php
										}
								?>
				 
						</div>
				    </div>
					
					
					  <br/> 
                    <div class="form-group">    
                       <label class="control-label col-md-2 col-sm-1 col-xs-4" align="left">Largeur<span class="required"><font color="red">&nbsp;*</font></span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						<?php  include_once('config4.php');
						 
						               $id=$_GET['editid'];
												$requete3x = "SELECT Largeur FROM forum where id='$id' ";
												$resultat3x = $mysqli->query($requete3x);
												
												while ($ligne3x = $resultat3x->fetch_assoc()) {
												
											    $Largeur= $ligne3x['Largeur'];
								?>
										<input type="text" class="form-control" name="Largeur" id="Largeur" value="<?php echo $Largeur;?>" style="width: 50%" required> 
										<?php
										}
								?>
						</div>
				    </div> 
						 <div class="form-group">    
                        <label class="control-label col-md-2 col-sm-1 col-xs-4" align="left">Age<span class="required"><font color="red">&nbsp;*</font></span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
	                             <?php  include_once('config4.php');
						 
						               $id=$_GET['editid'];
												$requete3x = "SELECT Age FROM forum where id='$id' ";
												$resultat3x = $mysqli->query($requete3x);
												
												while ($ligne3x = $resultat3x->fetch_assoc()) {
												
											    $Age= $ligne3x['Age'];
								?>
										<input type="text" class="form-control" name="Age" id="Age" value="<?php echo $Age;?>" style="width: 50%" required> 
										<?php
										}
								?>
						</div>
				    </div> 
					<div class="form-group">    
                        <label class="control-label col-md-2 col-sm-1 col-xs-4" align="left">Sexe<span class="required"><font color="red">&nbsp;*</font></span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
						 <?php  include_once('config4.php');
						 
						               $id=$_GET['editid'];
												$requete3x = "SELECT sexe FROM forum where id='$id' ";
												$resultat3x = $mysqli->query($requete3x);
												
												while ($ligne3x = $resultat3x->fetch_assoc()) {
												
											    $Sexe= $ligne3x['sexe'];
								?>
										<input type="text" class="form-control" name="sexe" id="sexe" value="<?php echo $Sexe;?>" style="width: 50%" required> 
										<?php
										}
								?>
						</div>
				    </div>
					<center><input type="submit" name="submit" class="submit btn btn-success" value="Modification" /></center>
			<div class="row">
				
		
						 
			</div>
		</div>
	</div>
	<!-- End blog -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
					<p class="lead"><a href="#">+01 2000 800 9999</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Live Dinner Restaurant</a> Design By : 
					<a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>