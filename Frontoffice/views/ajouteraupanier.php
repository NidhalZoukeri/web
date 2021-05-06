<?PHP
include "../entities/produit.php";
include "../core/produitC.php";


if(isset($_POST['ajouterproduit1']) &&(isset ($_POST['q1'])))
{
	$q1=$_POST['q1'];
	$produit1C=new produitC();
	$produit1=$produit1C->recupererproduit(1);
	$info=$produit1->fetch();
	$produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
	$quantitedisponible=$produit1->get_quantite();
	if($q1>$quantitedisponible)
	{
		echo "La quantité demandée n'est pas disponible dans le stock";
	}
	else
	{
		$produit1->set_quantite($q1);
		$produit1C->ajouteraupanier($produit1);
		//$produit1C->afficherproduit($produit1);
		header('Location: all.php');
	}
	
}


if(isset($_POST['ajouterproduit2']) &&(isset ($_POST['q2'])))
{
	$q2=$_POST['q2'];
	$produit1C=new produitC();
	$produit1=$produit1C->recupererproduit(2);
	$info=$produit1->fetch();
	$produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
	$quantitedisponible=$produit1->get_quantite();
	if($q2>$quantitedisponible)
	{
		echo "La quantité demandée n'est pas disponible dans le stock";
	}
	else
	{
		$produit1->set_quantite($q2);
		$produit1C->ajouteraupanier($produit1);
		//$produit1C->afficherproduit($produit1);
	}
	
}


if(isset($_POST['ajouterproduit3']) &&(isset ($_POST['q3'])))
{
	$q3=$_POST['q3'];
	$produit1C=new produitC();
	$produit1=$produit1C->recupererproduit(3);
	$info=$produit1->fetch();
	$produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
	$quantitedisponible=$produit1->get_quantite();
	if($q3>$quantitedisponible)
	{
		echo "La quantité demandée n'est pas disponible dans le stock";
	}
	else
	{
		$produit1->set_quantite($q3);
		$produit1C->ajouteraupanier($produit1);
		//$produit1C->afficherproduit($produit1);
	}
}


if(isset($_POST['ajouterproduit4']) &&(isset ($_POST['q4'])))
{
	$q4=$_POST['q4'];
	$produit1C=new produitC();
	$produit1=$produit1C->recupererproduit(4);
	$info=$produit1->fetch();
	$produit1=new produit($info["id"],$info["nom"],$info["prix"],$info["quantite"],$info["categorie"]);
	$quantitedisponible=$produit1->get_quantite();
	if($q4>$quantitedisponible)
	{
		echo "La quantité demandée n'est pas disponible dans le stock";
	}
	else
	{
		$produit1->set_quantite($q4);
		$produit1C->ajouteraupanier($produit1);
		//$produit1C->afficherproduit($produit1);
	}
	
}



?>