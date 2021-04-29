<?PHP
	include "../controller/clientC.php";

	$clientC=new clientC();
	
	if (isset($_POST["id"])){
		$clientC->supprimerclient($_POST["id"]);
		header('Location:afficherclient.php');
	}

?>