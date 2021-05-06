<?PHP
include "../core/produitC.php";
include "../entities/produit.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
$produitC=new produitC();
	if ((isset($_POST["id"]) && isset($_POST["quantite"])))
	{
		$produitC->modifierquantite($_POST["id"],$_POST["quantite"],$_SESSION['id']);
		header('Location: panier.php');
	}
}
?>