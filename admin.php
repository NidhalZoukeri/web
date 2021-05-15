<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dinner";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = 'SELECT * from forum';
if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$result = mysqli_query($conn, $sql);
// output data of each row
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
					<img src="images/mahdii.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="conseil.php">ajouter conseil</a></li>
						<li class="nav-item"><a class="nav-link" href="admin.php">les forum</a></li>
						
						
						
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
					<h1>Conseil</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start blog -->
	<?php 

if(isset($_GET['search'])){
     $searchKey = $_GET['search']; // grab keyword
     $sql    = "SELECT * FROM forum WHERE Nom LIKE '%$searchKey%'";
}else
    $sql    = "SELECT * FROM forum";
			
    $result = $conn->query($sql);
?>
<form action="" method="GET"> 
     <div class="col-md-6">
        <input type="text" name="search" class='form-control' placeholder="Search By Name" value=<?php echo @$_GET['search']; ?> > 
     </div>
     <div class="col-md-6 text-left">
      <button class="btn btn-danger">Search</button>
     </div>
   </form>

   <br> 
	<div class="blog-box">
	
		<div class="container">
		<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>forum</h2>
						<p>gérer forum</p>
					</div>
				</div>
		<?php 
		
		
		include('connect.php');

    if (isset($_POST['submit'])) {
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
	$adress = $_POST['adress'];
    $Poids = $_POST['Poids'];
    $Largeur = $_POST['Largeur'];
    $Age = $_POST['Age'];
    $sexe = $_POST['sexe'];


    
     
    $query = mysqli_query($conn, "insert into forum( Nom , Prenom ,adress, Poids , Largeur, Age, sexe) value ( '$Nom' , '$Prenom' ,'$adress', '$Poids' , '$Largeur', '$Age', '$sexe') ");
    if ($query) {
        echo "<script>alert('Forum ajouté avec succès!');</script>";
    } else {
        echo "<script>alert('Problème d'ajout!');</script>";
    }
 
     mysqli_close($conn);
}
?>
	 <style>
		#example {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		#example td, #example th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#example tr:nth-child(even){background-color: #f2f2f2;}

		#example tr:hover {background-color: #ddd;}

		#example th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: DodgerBlue;
		  color: white;
		}
		.buttons-excel {
		  margin: 20px;
		}
		</style> 	<!-- Start Formulaire -->
				 <table id="example" class="display nowrap" id="datatable-buttons"  border='1' class="table table-striped table-bordered" width="98%">
                                         <thead>
                                             <tr>
												<th>Nom</th>
												<th>Prenom</th>
												<th>adress</th>
												<th>Poids</th> 
												<th>Largeur</th>
												<th>Age</th>
												<th>Sexe</th>
												
                                            </tr>  
											  
											</thead>

											<tfoot>
											</tfoot>
                                        
											<tbody>
											<?php  include_once('config4.php');
												$requete3x = "SELECT * FROM forum";
												$resultat3x = $mysqli->query($requete3x);
												
												while ($ligne3x = $resultat3x->fetch_assoc()) {
												$id=$ligne3x['id'];
											    $Nom= $ligne3x['Nom'];
												$Prenom= $ligne3x['Prenom'];
												$adress= $ligne3x['adress'];
												$Poids = $ligne3x['Poids'];
										        $Largeur= $ligne3x['Largeur'];
												$Age= $ligne3x['Age'];
												$sexe= $ligne3x['Sexe'];
												 while($row = mysqli_fetch_assoc($result)) {
								?>
											<tr>
										
											<td><?php echo $row['Nom']; ?></td>
									      	<td><?php echo $row['Prenom']; ?></td>
											  <td><?php echo $row['adress']; ?></td>  
											<td><?php echo $row['Poids']; ?></td>
											<td><?php echo $row['Largeur']; ?></td>
											<td><?php echo $row['Age']; ?></td>
											<td><?php echo $row['Sexe']; ?></td>
											
												
												<td>
												
												<a href="mail.php?mail=<?= $row['id']; ?>" 
												class="btn btn-danger" 
												>Mailing</a></td>

												<?php
}}
?>
												
											
						                    </tr>
                                        </tbody>
                                    </table>
						
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