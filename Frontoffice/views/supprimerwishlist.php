<?PHP
include "../core/produitC.php";
session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
	echo "HAHAHAHA";
	$produitC=new produitC();
	if (isset($_POST["id"]))
	{
		$produitC->supprimerwishlist($_POST["id"],$_SESSION['id']);
		header('Location: produit.php');
	}
}
?>