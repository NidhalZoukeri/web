<?php // content="text/plain; charset=utf-8"
require_once ('C:/wamp64/www/projetweb/Backoffice/core/jpgraph-4.2.0/src/jpgraph.php');
require_once ('C:/wamp64/www/projetweb/Backoffice/core/jpgraph-4.2.0/src/jpgraph_bar.php');
require_once '../config.php';
//bar linear fix

$query="select count(montantCommande) as cnt , lieuLivraison  from commande group by lieuLivraison   ";

$db= config::getConnexion();
$Data1 =  $db->query($query);
$Data2 =  $db->query($query);
$datay=array();
$datax=array();

foreach ($Data1 as $row){
$datay[]=$row['cnt'];
}
foreach ($Data2 as $row){
$datax[]=$row['lieuLivraison'];

}


// Create the graph. These two calls are always required
$graph = new Graph(700,400,"auto");
$graph->SetScale('textlin');
 
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
// Adjust the margin a bit to make more room for titles
$graph->SetMargin(40,30,20,40);
$graph->SetBox(false);
// Create a bar pot
$bplot = new BarPlot($datay);
$fcol='blue';
$tcol='#55eeff';
$bplot->SetFillGradient($fcol,$tcol,GRAD_LEFT_REFLECTION);
// Adjust fill color
$bplot->SetColor("white");
$bplot->SetFillColor("#cc1111");
$graph->Add($bplot);
// Setup the titles
//$graph->title->Set('A basic bar graph');
$graph->xaxis->title->Set('Lieu');
$graph->yaxis->title->Set('Nombre de commandes');
$graph->title->SetFont(FF_TIMES,FS_BOLD);
$graph->yaxis->title->SetFont(FF_TIMES,FS_BOLD);
$graph->xaxis->title->SetFont(FF_TIMES,FS_BOLD);
$graph->xaxis->SetTickLabels($datax);
//$graph->xaxis->SetLabelAngle(50);
$graph->xaxis->SetTextTickInterval(1);
// Display the graph
$graph->Stroke();
?>