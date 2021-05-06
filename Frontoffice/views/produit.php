<?php
include "../entities/produit.php";
include "../core/produitC.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
if(isset($_POST['ajouterproduit1']) && (isset ($_POST['q1'])))
{ 
  $q1=$_POST['q1'];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(1);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $quantitedisponible=$produit1->get_quantite();
  $verif=0;
  if($q1>$quantitedisponible)
  {
    echo "<script>alert(\"La quantité demandée n'est pas disponible dans le stock\")</script>";
    $verif=1;
  }

  if($q1<0)
  {
    echo "<script>alert(\"La quantité insérée est incorrecte\")</script>";
    $verif=1;
  }
  
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      $produit1->set_quantite($q1);
      $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
  
}


if(isset($_POST['ajouterproduit2']) &&(isset ($_POST['q2'])))
{
  $q1=$_POST['q2'];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(2);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $quantitedisponible=$produit1->get_quantite();
  $verif=0;
  if($q1>$quantitedisponible)
  {
    echo "<script>alert(\"La quantité demandée n'est pas disponible dans le stock\")</script>"; 
    $verif=1;
  }

  if($q1<0)
  {
    echo "<script>alert(\"La quantité insérée est incorrecte\")</script>"; 
    $verif=1;
  }
  
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      $produit1->set_quantite($q1);
      $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
  
}


if(isset($_POST['ajouterproduit3']) &&(isset ($_POST['q3'])))
{
 $q1=$_POST['q3'];
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(3);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $quantitedisponible=$produit1->get_quantite();
  $verif=0;
  if($q1>$quantitedisponible)
  {
    echo "<script>alert(\"La quantité demandée n'est pas disponible dans le stock\")</script>"; 
    $verif=1;
  }

  if($q1<0)
  {
    echo "<script>alert(\"La quantité insérée est incorrecte\")</script>";
    $verif=1;
  }
  
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      $produit1->set_quantite($q1);
      $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
}



if(isset($_POST['ajouterwishlist1']))
{ 
  
 
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(1);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $verif=0;
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod1($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      
      $produit1C->ajouterwishlist($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
}

if(isset($_POST['ajouterwishlist2']))
{ 
  
 
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(2);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $verif=0;
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod1($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      
      $produit1C->ajouterwishlist($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
}

if(isset($_POST['ajouterwishlist3']))
{ 
  
 
  $produit1C=new produitC();
  $produit1=$produit1C->recupererproduit(3);
  $info=$produit1->fetch();
  $produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
  $verif=0;
  if($verif==0)
  {
    $result=$produit1C->verifierexitenceprod1($_SESSION['id'],$produit1->get_id());
    $info=$result->fetch();
    $existence=$info["cnt"];
    if($existence==0)
    {
      
      $produit1C->ajouterwishlist($produit1,$_SESSION['id']);
    }
    else
    {
      echo "<script>alert(\"Le produit existe déja dans le panier\")</script>"; 
    }
    
  }
}
?>
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
<title>Restaurant | Produits</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link href="css/style-.css" rel="stylesheet" type="text/css" media="all" />
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
<!-- header -->

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
					<li class=" menu__item"><a class="menu__link" href="#">Produits</a></li>
					
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
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- banner -->
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="col-md-4 products-left">
			<div class="filter-price">
				<h3>Recherche par prix</h3>
					<ul class="dropdown-menu6">
						<li>                
							<div id="slider-range"></div>							
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>			
					</ul>
							<!---->
							<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "DT" + ui.values[ 0 ] + " - DT" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "DT" + $( "#slider-range" ).slider( "values", 0 ) + " - DT" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
						<script type="text/javascript" src="js/jquery-ui.js"></script>
					 <!---->
			</div>
			<div class="css-treeview">
				<h4>Favoris</h4>
				<ul class="tree-list-pad">
					<?PHP
					$produit1C=new produitC();
					$listeproduits=$produit1C->recupererwishlist($_SESSION['id']);

					?>
				
					<?PHP
					foreach($listeproduits as $row)
					{
					    $id=$row['id'];
                        $chemin="images/produit".$id.".png"
				    ?>
					  <center>
					   <img  height="180px" width="160px" src="<?php echo $chemin; ?> ">
					   <p><?PHP echo $row['nom']; ?> </p>
					   <p><?PHP echo $row['prix']; ?> DT</p>
					   <br>

					    	

					    <form method="POST" action="transfererpanier.php">
					        <button name="transferer" ><img src="images/transfer.png"></button>
					        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">  
		                </form> 
		                <br>

		                <form method="POST" action="supprimerwishlist.php">
					        <button name="supprimer" ><img src="images/Corbeille.png"></button>
					        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">  
		                </form> 


					  </center>
					  
					  <?PHP
					}
					?>
					
					
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<h5>Produits</h5>
			<div class="sort-grid">
				<div class="sorting">
					<h6>Trier par</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Defaut</option>
						<option value="null">Nom(A - Z)</option> 
						<option value="null">Nom(Z - A)</option>
						<option value="null">Prix(High - Low)</option>
						<option value="null">Prix(Low - High)</option>	
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>					
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>

				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="images/sandwich.png" alt="" class="pro-image-front">
							<img src="images/sandwich.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="#" class="link-product-add-cart">Apercu</a>
											</div>
										</div>
										<span class="product-new-top">Nouveau</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="#">sandwich</a></h4>
									<div class="info-product-price">
										<span class="item_price">20 DT</span>
									</div>
									
									<form method="POST">
							        </br>Quantite :<input min="1" required="required" type="number" name="q1"></br>
								        </br><button  name="ajouterproduit1" ><img src="images/transfer.png"></button></br> 
					                </form> 
									<form method="POST"> 
								        </br><button name="ajouterwishlist1"><img src="images/add.png"></button></br>
					                </form>   												                 							
						</div>
					</div>
				</div>
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="images/plat escalope.png" alt="" class="pro-image-front">
							<img src="images/plat escalope.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="single.html" class="link-product-add-cart">apercu</a>
											</div>
										</div>
										<span class="product-new-top">nouveau</span>
										
						</div>
						

						<div class="item-info-product ">
									<h4><a href="single.html">plat escalope</a></h4>
									<div class="info-product-price">
										<span class="item_price">30 DT</span>
									</div>	
						           
									<form method="POST">
							        </br>Quantite :<input min="1" required="required" type="number" name="q2"></br>
								        </br><button  name="ajouterproduit2" ><img src="images/transfer.png"></button></br>  
					                </form> 	
					                <form method="POST"> 
								        </br><button  name="ajouterwishlist2"><img src="images/add.png"></button></br>
					                </form> 				
						</div>
					</div>
				</div>
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="images/Omelette.png" alt="" class="pro-image-front">
							<img src="images/Omelette.png" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="#" class="link-product-add-cart">apercu</a>
											</div>
										</div>
										<span class="product-new-top">nouveau</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="#">Omelette</a></h4>
									<div class="info-product-price">
										<span class="item_price">15 DT</span>
										<del>20 dt</del>
									</div>
									
									
									<form method="POST">
							        </br>Quantite :<input min="1" required="required" type="number" name="q3"></br>
								        </br><button name="ajouterproduit3" ><img src="images/transfer.png"></button></br>  
					                </form> 

									<form method="POST">
								        </br><button  name="ajouterwishlist3"><img src="images/add.png"></button></br>
					                </form> 					
						</div>
					</div>
				</div>
				
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
			<div class="clearfix"></div>
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
