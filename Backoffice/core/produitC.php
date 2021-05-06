<?php
include_once "../config.php";


class produitC
{

	function ajouteraupanier($produit)
	{
		$sql="insert into panier (id,prix,quantite) values (:id,:prix,:quantite)";
		$db = config::getConnexion();
		
		try
		{
       
        $id=$produit->get_id();
        $prix=$produit->get_prix();
        $quantite=$produit->get_quantite();

        $req=$db->prepare($sql);
     
		$req->bindValue(':id',$id);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		
        $req->execute();
           
        }

        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function recupererproduit($id)
	{
   		$sql="SELECT * from produit where id=$id";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererpanier()
	{
   		$sql="SELECT * from panier";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}

	function somme()
	{
		$db=config::getConnexion();
		$q=$db->prepare("select quantite from panier");
		$q->execute();
		return $q;
	}

	function afficherproduit ($produit)
	{
		echo "id : ".$produit->get_id()."<br>";
		echo "Nom : ".$produit->get_nom()."<br>";
		echo "Prix : ".$produit->get_prix()."<br>";
		echo "Quantite : ".$produit->get_quantite()."<br>";
		echo "Catégorie : ".$produit->get_categorie()."<br>";
	}

	function afficherproduits()
	{
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerproduit($id)
	{
		$sql="DELETE FROM panier where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function updatequantite($id,$quantite,$idClient)
	{
		$sql="UPDATE produit SET quantite=:quantite where id=:id AND idClient= :idClient";
		$db = config::getConnexion();
        
        try
        {
        	$req=$db->prepare($sql);
        	$req->bindValue(':id',$id);
        	$req->bindValue(':quantite',$quantite);
        	$req->bindValue(':idClient',$idClient);
        	$s=$req->execute();

        }
        catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
	}

	function modifierquantite($id,$quantite)
	{
		$sql="UPDATE panier SET quantite=:quantite where id=:id";
		$db = config::getConnexion();
        
        try
        {
        	$req=$db->prepare($sql);
        	$req->bindValue(':id',$id);
        	$req->bindValue(':quantite',$quantite);
        	$s=$req->execute();

        }
        catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
	}

	function countpanier()
	{
		$db = config::getConnexion();
		$q=$db->prepare("select count(*) as cnt from panier");
		$q->execute();
		return $q;
	}

	function ajouterwishlist($produit)
	{
		$sql="insert into wishlist (id,prix,quantite) values (:id,:prix,:quantite)";
		$db = config::getConnexion();
		
		try
		{
       
        $id=$produit->get_id();
        $prix=$produit->get_prix();
        $quantite=$produit->get_quantite();

        $req=$db->prepare($sql);
     
		$req->bindValue(':id',$id);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		
        $req->execute();
        //echo "LOL";    
        }

        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function afficherwishlist()
	{
		$sql="SElECT * From wishlist";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerwishlist($id)
	{
		$sql="DELETE FROM wishlist where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>