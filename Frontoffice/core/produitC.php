<?php
include "../config.php";


class produitC
{

	function ajouteraupanier($produit,$idClient)
	{
		$sql="insert into panier (id,idClient,prix,quantite,nom) values (:id,:idClient,:prix,:quantite,:nom)";
		$db = config::getConnexion();
		
		try
		{
       
        $id=$produit->get_id();
        $prix=$produit->get_prix();
        $quantite=$produit->get_quantite();
        $nom=$produit->get_nom();

        $req=$db->prepare($sql);
     
		$req->bindValue(':id',$id);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':nom',$nom);

		
        $req->execute();
           
        }

        catch (Exception $e)
        {
            echo "<script>alert(\"Le produit est déja dans votre panier.\")</script>"; 
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

	function recupererpanier($idClient)
	{
   		$sql="SELECT * from panier where idClient=$idClient";
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

	function recupererwishlist($idClient)
	{
		$sql="SELECT * from wishlist where idClient=$idClient";
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

	function recupererproduitwishlist($id)
	{
		$sql="SELECT * from wishlist where id=$id";
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

	function supprimerproduit($id,$idClient)
	{
		$sql="DELETE FROM panier where id= :id AND idClient= :idClient";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierquantite($id,$quantite,$idClient)
	{
		$sql="UPDATE panier SET quantite=:quantite where id=:id AND idClient= :idClient";
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


	function verifierexitenceprod($idClient,$id)
	{
		$sql="select count(*) as cnt from panier where idClient=:idClient and id=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
            return $req;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}
	function verifierexitenceprod1($idClient,$id)
	{
		$sql="select count(*) as cnt from wishlist where idClient=:idClient and id=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
            return $req;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}


	function countpanier($idClient)
	{
		$sql="select count(*) as cnt from panier where idClient=:idClient";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
            return $req;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
	}


	function ajouterwishlist($produit,$idClient)
	{
		$sql="insert into wishlist (id,idClient,nom,prix,quantite) values (:id,:idClient,:nom,:prix,:quantite)";
		$db = config::getConnexion();
		
		try
		{
       
        $id=$produit->get_id();
        $nom=$produit->get_nom();
        $prix=$produit->get_prix();
        $quantite=$produit->get_quantite();
        

        $req=$db->prepare($sql);
     
		$req->bindValue(':id',$id);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':nom',$nom);
		
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		

		
        $req->execute();
           
        }

        catch (Exception $e)
        {
            echo "<script>alert(\"Le produit est déja dans votre favorit.\")</script>"; 
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

	function supprimerwishlist($id,$idClient)
	{
		$sql="DELETE FROM wishlist where id= :id and idClient=:idClient";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function ajoutercontenupanier($produit,$idCommande,$idClient)
	{
		$sql="insert into lignecommande (idCommande,id,idClient,prix,quantite,nom) values (:idCommande,:id,:idClient,:prix,:quantite,:nom)";
		$db = config::getConnexion();
		
		try
		{
       
        $id=$produit->get_id();
        $prix=$produit->get_prix();
        $quantite=$produit->get_quantite();
        $nom=$produit->get_nom();

        $req=$db->prepare($sql);
     
     	$req->bindValue(':idCommande',$idCommande);
		$req->bindValue(':idClient',$idClient);
		$req->bindValue(':id',$id);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':nom',$nom);

		
        $req->execute();
           
        }

        catch (Exception $e)
        {
            echo "<script>alert(\"Error\")</script>"; 
        }

	}
	function modifierquantiteaprescommande($id,$quantite)
	{
		$sql="UPDATE produit SET quantite=quantite-:quantite where id=:id";
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
	function destroycart($idClient)
	{
		$sql="DELETE FROM panier where idClient=:idClient";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idClient',$idClient);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>