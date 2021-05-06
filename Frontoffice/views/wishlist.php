<?php
include "../entities/produit.php";
include "../core/produitC.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
?>

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
<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Livraison rapide</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Commandez vos articles en ligne</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">restaurant-rapide@gmail.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="accueil.html"><img src="images/logo.png"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form>
				<div class="search">
					<input type="search" value="rechercher ..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				<li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>
					
				</li>
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				<li><a class="you" href="#"></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
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
					<li class="active menu__item menu__item--current"><a class="menu__link" href="#">Acceuil <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="#">Produits</a></li>
					<li class=" menu__item"><a class="menu__link" href="#">Promotion</a></li>
					<li class=" menu__item"><a class="menu__link" href="#">Livraison</a></li>
					<li class=" menu__item"><a class="menu__link" href="#">Service Apres Vente</a></li>
					<li class=" menu__item"><a class="menu__link" href="#">connexion</a></li>
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
<center>
<div class="men-wear">
	<div class="container">
		<div class="col-md-4 products-left">
		
			<div class="css-treeview">
				<h4>Favorit</h4>
				    <?PHP
					$produit1C=new produitC();
					$listeproduits=$produit1C->recupererwishlist($_SESSION['id']);

					?>
					<table border="1">
					<tr>
					<td>Image du produit</td>
					<td>Prix</td>
					
					<td>Supprimer</td>
					<td>Transférer</td>
					</tr>

					<?PHP
					foreach($listeproduits as $row)
					{
					    $id=$row['id'];
                        $chemin="images/produit".$id.".jpg"
				    ?>
					  <tr>
					   <td><img  height="180px" width="160px" src="<?php echo $chemin; ?> ">
					  <td><?PHP echo $row['prix']; ?> DT</td>
					
					  <td>
					  <form method="POST" action="supprimerwishlist.php">
					  <input type="submit" name="supprimer" value="supprimer">
					  <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
					  </form>
					  </td>
					  
					  <td>
					  <form method="POST" action="transfererpanier.php">
					  <input type="submit" name="transferer" value="Transférer">
					  <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
					  </form>
					  </td>
					  </tr>
					  <?PHP
					}
					?>
					</table>
			</div>
			<div class="clearfix"></div>
		</div>
	
		<div class="clearfix"></div>
			<div class="clearfix"></div>
		</div>

	</div>
	</center>
</div>	
<!-- //mens -->
<!-- //product-nav -->
<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-left">
			<h2><a href="accueil.html"><img src="images/logo-bot.png" alt=" " /></a></h2>
		</div>
		<div class="col-md-9 footer-right">
			<div class="col-sm-6 nouveausleft">
				<h3>recevez nos nouveautés !</h3>
			</div>
			<div class="col-sm-6 nouveausright">
				<form>
					<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="Submit">
				</form>
			</div>
			<div class="clearfix"></div>
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Information</h4>
					<ul>
						<li><a href="accueil.html">Home</a></li>
						<li><a href="produit.php">Nos produits</a></li>
						<li><a href="promotion.html">Promotion</a></li>
						<li><a href="sav.html">SAV</a></li>
						<li><a href="livraison.html">Livraison</a></li>
					</ul>
				</div>
				
				<div class="col-md-4 sign-gd-two">
					<h4>Information sur la boutique</h4>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : 1234k Avenue, 4th block, <span>nouveauyork City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:info@example.com">restaurant-rapide@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Telephone : +71 256 567</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //footer -->
<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form>
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<h4>Re-type Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form>
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
</body>
</html>
<?php
}
?>
