<?php
include "../core/produitC.php";
include "../entities/produit.php";

session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{
	if (isset($_POST["id"]))
	{
		$idprod=$_POST["id"];
		$produit1C=new produitC();
		$produit1=$produit1C->recupererproduit($_POST["id"]);
		$info1=$produit1->fetch();
  		$produit1=new produit($info1["id"],$info1["nom"],$info1["prix"],$info1["quantite"],$info1["categorie"]);


		$result=$produit1C->verifierexitenceprod($_SESSION['id'],$idprod);
		$info=$result->fetch();
    	$existence=$info["cnt"];


    	if($existence==0)
    	{
    		 $produit1C->ajouteraupanier($produit1,$_SESSION['id']);
    		 $produit1C->supprimerwishlist($_POST["id"],$_SESSION['id']);
    	}
    	else
    	{
    		 echo "<script>alert(\"Le produit existe déja dans le panier\")</script>";
    	}

		header('Location: produit.php');
	}
}
?>