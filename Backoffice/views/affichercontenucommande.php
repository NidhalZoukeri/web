 <?PHP
 include_once "../Entities/produit.php";
 include_once "../Core/produitC.php";
 include_once "../Core/commandeC.php";
 include_once "../Entities/commande.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{

if(isset($_POST["idCommande"]))
{
  $idrecup=$_POST["idCommande"];
  //echo $idrecup;
}

$commande1C=new commandeC();
$produit=new produitC;
$commandes=$commande1C->recuperercontenucommande($idrecup);

?>
  
  <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Restaurant dinner</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">


</head>
<body>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">souhe</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="affichercommandes.php"><em class="fa fa-xl fa-shopping-cart color-blue"></em> Les commandes</a></li>
			<li><a href="historique.php"><img src="images/historique1.png">Historique</a></li>
			<li><a href="statistique.php"><img src="images/stat1.png">Statistiques</a></li>
			<li><a href="#"><em class="fa fa-power-off"></em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Contenu Commande :</li>
			</ol>
		</div><!--/.row-->
		
	
        <div class="row">
			<div class="col-lg-12">
				  <div class="box-body">
              <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                           

<h1>ID de la commande : <?php echo $idrecup; ?></h1> 

<div class="card-content table-responsive">
                                <table class="table">
                                    <thead class="text-info">
<tr>
<th>ID produit </th>
<th>Nom</th>
<th>Quantite</th>
<th>Prix</th>
<th>Total du produit</th>
</tr>
</thead>
<?PHP
foreach($commandes as $row)
{
  ?>
  <tr>
  <td><?PHP echo $row['id']; ?></td>
  <td><?PHP echo $row['nom']; ?></td>
  <td><?PHP echo $row['quantite']; ?></td>
  <td><?PHP echo $row['prix']; ?></td>
  <td><?PHP echo $row['prix']*$row['quantite']; ?></td>
  </tr>
  
  <?PHP
}
?>
</table> 
</div>


                          </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
			</div>
		</div><!--/.row-->		
		

	
		</div><!--/.row-->
	</div><!--/.main-->
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>

<?php
  }
?>
