
  
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
				<li class="active">Statistiques : </li>
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
                           
                            <div>
							<img src="../core/StatistiqueC.php">
							<img src="../core/StatistiqueC1.php">

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


<div>
	<center>
    <?php  
	 $connect = mysqli_connect("localhost", "root", "", "projetweb");  
	 $query = "SELECT montantCommande, count(*) as number FROM commande GROUP BY montantCommande";  
	 $result = mysqli_query($connect, $query);  
	 ?>  
	 <!DOCTYPE html>  
	 <html>  
	      <head>  
	           <title>Titre</title>  
	           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
	           <script type="text/javascript">  
	           google.charts.load('current', {'packages':['corechart']});  
	           google.charts.setOnLoadCallback(drawChart);  
	           function drawChart()  
	           {  
	                var data = google.visualization.arrayToDataTable([  
	                          ['montantCommande', 'Number'],  
	                          <?php  
	                          while($row = mysqli_fetch_array($result))  
	                          {  
	                               echo "['".$row["montantCommande"]."', ".$row["number"]."],";  
	                          }  
	                          ?>  
	                     ]);  
	                var options = {  
	                      title: 'Percentage de nombres de montant commande',  
	                      //is3D:true,  
	                      pieHole: 0.4  
	                     };  
	                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
	                chart.draw(data, options);  
	           }  
	           </script>  
	      </head>  
	      <body>  
	           <br /><br />  
	           <div style="width:900px;">  
	                <h3 align="center">Titre</h3>  
	                <br />  
	                <div id="piechart" style="width: 900px; height: 500px;"></div>  
	           </div>  
	      </body>  
	 </html> 
  </center>
</div>

	
</body>
</html>
