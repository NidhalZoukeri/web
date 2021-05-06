<?php
   
  include_once "../entities/produit.php";
  include_once "../core/produitC.php";
  include_once "../core/commandeC.php";
  include_once "../entities/commande.php";

  include_once "../core/clientC.php";
  include_once "../entities/clients.php";
  require ('pdf/fpdf.php');


session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
  

  $produitC=new produitC();
  $produit1=$produitC->recupererpanier($_SESSION['id']);
  
  $tab=array();
  $somme=0;

  foreach ($produit1 as $row) 
  {
    array_push($tab,$row['prix']*$row['quantite']);
    $somme+=$row['prix']*$row['quantite'];
  }
  
  if(isset($_POST['validercommande']) && !empty($_POST['secteur']) )
  {
    $secteur=$_POST['secteur'];
    $dateactuelle = date("Y-m-d");

    $commande1C=new commandeC();
    $commande1= new commande($dateactuelle,$somme,'en cours',$secteur,5,$_SESSION['id']);
    $commande1C->ajoutercommande($commande1);

    $lastID=$commande1C->recupererdernierID();
    $max=$lastID->fetch();
    $max_row=$max["max"];
    

    $clientC=new clientC();
    $client1=$clientC->recupererclient($_SESSION['id']);
    $client=$client1->fetch();
    $mail=$client["Email"];
   

    //$clientC->mailcommande($mail,$somme,$dateactuelle);

    $produit1=$produitC->recupererpanier($_SESSION['id']);
    
    foreach($produit1 as $row)
    {
      $produit2=new produit($row["id"],$row["nom"],$row["prix"],$row["quantite"],"Test");
      $produitC->ajoutercontenupanier($produit2,$max_row,$_SESSION['id']);
    }
     header('Location: testpdf.php');;
  } 
?>
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
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="produit.php">produit</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Pages</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="reservation.html">Reservation</a>
								<a class="dropdown-item" href="stuff.html">Stuff</a>
								<a class="dropdown-item" href="gallery.html">Gallery</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="blog.html">blog</a>
								<a class="dropdown-item" href="blog-details.html">blog Single</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
						<div class="top_nav_right">
			<div class="cart box_1">
				<a href="panier.php">
					     <?php
				          $produit=new produitC;
				          $count=$produit->countpanier($_SESSION['id']);
				          foreach($count as $row)
				            {
				              echo '<div>'.$row["cnt"].'</div>';
				            }
				          ?>
						<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
				</a>
						
			</div>	
		</div>
					</ul>
				</div>
			</div>
		</nav>
	</header>

<!DOCTYPE html>
<html>

<head>
	<title>Madame Zarrouk | Panier</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../views/css/style-.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- cart -->
		<script src="js/simpleCart.min.js"></script>
	<!-- cart -->
	<!-- for bootstrap working -->
		<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
	<script src="js/jquery.easing.min.js"></script>
</head>

<body>

<!-- //header-bot -->



<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
	             <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class=" menu__item"><a class="menu__link" href="produit.php">Produits</a></li>
		
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="panier.php">
					    <?php
				          $produit=new produitC;
				          $count=$produit->countpanier($_SESSION['id']);
				          foreach($count as $row)
				            {
				              echo '<div>'.$row["cnt"].'</div>';
				            }
				          ?>
						<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
				</a>
						
			</div>	
		</div>

	</div>
</div>

<div class="checkout">
	<div class="container">
		<div>
			
				                <?PHP
									$produit2C=new produitC();
									$panier=$produit2C->recupererpanier($_SESSION['id']);

									?>
						
						
				<table class="timetable_sub">
				
				        <tr>
						
						<th>Nom du produit</th>
						<th>Image du produit</th>
						<th>Prix</th>
						<th>Quantite</th>
						<th>Total produit</th>
						</tr>

						<?PHP
						foreach($panier as $row)
						{
						  $id=$row['id'];
						  $chemin="images/produit".$id.".png"
						  ?>
						  <tr>
						  
						  <td><?PHP echo $row['nom']; ?></td>
						  <td><img  height="180px" width="160px" src="<?php echo $chemin; ?> ">
						  <td><?PHP echo $row['prix']; ?> DT</td>
						  <td><?PHP echo $row['quantite']; ?></td>
						  <td><?PHP echo $row['prix']*$row['quantite']?> DT</td>
						  </tr>
						  <?PHP
						}
						?>
				
				</table>
				</br></br>
				<center><p> Total de la commande : <?php echo $somme." DT"; ?> </p> </center>
	            <center><p> TTC : <?php echo ($somme*1.18)." DT"; ?></p></center>
	            <center> Date : <?php $date = new DateTime(); echo $date->format('Y-m-d H:i:s');?> </p></center><p>
	            <center><p>Veuillez choisir un secteur de livraison</p> </center>
	            
	            <form method="POST" action="commande.php">
	              <center>
                <select name="secteur">
                  <option value="Ariana">
                    Ariana
                  </option>
                  <option value="Ghazela">
                    Ghazela
                  </option>
                  <option value="Le Bardo">
                    Le Bardo
                  </option>
                  <option value="El Manar">
                    El Manar
                  </option>
                  <option value="El Menzah">
                    El Menzah
                  </option>
                </select>
              </center>
            </br></br></br>
         
	        <form method="POST" action="commande.php">
                
                <center><a class="item_add single-item hvr-outline-out button2"><input class="item_add single-item hvr-outline-out button2" type="submit" name="validercommande"  value="Valider"> </center></a>
            </form>
            </form>
             
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="panier.php"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Retour </a>
				</div>
				
			
		</div>
	</div>
</div>	
<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>produit Us</h3>
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


</body>
</html>

<?php
}
?>
