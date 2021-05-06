<?php
include_once "../config.php";

class commandeC
{
	function ajoutercommande($commande)
	{
		$sql="insert into commande (dateCommande,montantCommande,etatCommande,lieuLivraison,prixLivraison,idClient) values (:dateCommande,:montantCommande,:etatCommande,:lieuLivraison,:prixLivraison,:idClient)";
		$db = config::getConnexion();
		
		try
		{
       
        //$idCommande=$commande->get_idCommande();
        $dateCommande=$commande->get_dateCommande();
        $montantCommande=$commande->get_montantCommande();
        $etatCommande=$commande->get_etatCommande();
        $lieuLivraison=$commande->get_lieuLivraison();
        $prixLivraison=$commande->get_prixLivraison();
        $idClient=$commande->get_idClient();

        $req=$db->prepare($sql);
     
		//$req->bindValue(':idCommande',$idCommande);
		$req->bindValue(':dateCommande',$dateCommande);
		$req->bindValue(':montantCommande',$montantCommande);
		$req->bindValue(':etatCommande',$etatCommande);
		$req->bindValue(':lieuLivraison',$lieuLivraison);
		$req->bindValue(':prixLivraison',$prixLivraison);
		$req->bindValue(':idClient',$idClient);
		
        $req->execute();
           
        }

        catch (Exception $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function recuperercommande($idClient)
	{
   		$sql="SELECT * from historiquecommande where idClient=$idClient";
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
	function recuperercommande1($idClient)
	{
   		$sql="SELECT * from commande  where idClient=$idClient";
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

	function recupererdernierID()
	{
		$sql="SELECT MAX(idCommande) as max from commande";
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

	function recuperercontenucommande($idCommande)
	{
        $sql="SELECT * from lignecommande where idCommande=$idCommande";
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

	function notification($idClient)
	{
		$sql="SELECT count(*) as cnt from historiquecommande where idClient=:idClient and etatCommande='Validee' ";
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
}
?>