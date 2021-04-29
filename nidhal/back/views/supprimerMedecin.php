<?PHP
	include "../controller/medecinC.php";

	$medecinC=new medecinC();
	
	if (isset($_POST["id"])){
		$medecinC->supprimerMedecin($_POST["id"]);
		header('Location:afficherMedecin.php');
	}

?>