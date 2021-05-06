<?PHP
include_once "../Entities/produit.php";
include_once "../Core/produitC.php";
include_once "../Core/commandeC.php";
include_once "../Entities/commande.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
           
$commande1C=new commandeC();
$commandes=$commande1C->recuperercommandes();

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
 <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

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
				</a></li>Consulter Commandes :</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Les Commandes :</h1>
			</div>
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
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title">Commandes</h4>
                            </div>
                            <div class="card-content table-responsive">
                                <table id="invoice" class="table">
                                    <thead class="text-info">
                                    <th>ID Client</th>
                                    <th>ID Commande</th>
                                    <th>Contenu</th>
                                    <th>Date Commande </th>
                                    <th>Total</th>
                                    <th>Adresse</th>
                      
                                    <th>Etat</th>  
                                    <th>Supprimer</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($commandes as $row)
                                     {
                                    ?>
                                    <tr>

                                        <td><?php echo $row["idClient"] ; ?></td>
                                        <td><?php echo $row["idCommande"] ; ?></a></td>

                                        <td>

											  <form method="POST" action="affichercontenucommande.php">
											        <button name="contenu" ><img src="images/eyes.png"></button>
											        <input type="hidden" value="<?PHP echo $row['idCommande']; ?>" name="idCommande">
											  </form> 										    
										  </td>

                                        <td><?php echo $row["dateCommande"] ; ?></td>
                                        <td><?php echo $row["montantCommande"]." TND" ; ?></td>
                                        
                                        <td><?php echo $row["lieuLivraison"] ; ?></td>
                                       
                                                  

										  <td>

											  <form method="POST" action="validercommande.php">
											        <button name="valider" ><img src="images/valider.png"></button>
											        <input type="hidden" value="<?PHP echo $row['idCommande']; ?>" name="idCommande">
											  </form> 	

										  <td> 
											  <form method="POST" action="supprimercommande.php">
											        <button name="supprimer" ><img src="images/Corbeille1.png"></button>
											        <input type="hidden" value="<?PHP echo $row['idCommande']; ?>" name="idCommande">
											  </form> 
										  </td>

										  
										  </tr>
                                        

                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
 <button class="btn btn-primary" id="download"> download pdf</button>
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
