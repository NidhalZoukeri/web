<?PHP
	include "../controller/adminC.php";

	$adminC=new adminC();
	
	if (isset($_POST["id"])){
		$adminC->supprimeradmin($_POST["id"]);
		header('Location:afficheradmin.php');
	}

?>