<?php
class commande
{
	private $idCommande;
	private $dateCommande;
	private $montantCommande;
	private $etatCommande;
	private $lieuLivraison;
	private $prixLivraison;
	private $idClient;

		public function __construct($idCommande,$dateCommande,$montantCommande,$etatCommande,$lieuLivraison,$prixLivraison,$idClient)
		{
			$this->idCommande=$idCommande;
			$this->dateCommande=$dateCommande;
			$this->montantCommande=$montantCommande;
			$this->etatCommande=$etatCommande;
			$this->lieuLivraison=$lieuLivraison;
			$this->prixLivraison=$prixLivraison;
			$this->idClient=$idClient;
		}

		public function get_idCommande()
		{
			return $this->idCommande;
		}

		public function set_idCommande($idCommande)
		{
			$this->idCommande = $idCommande;
		}
		//====================================


		public function get_dateCommande()
		{
			return $this->dateCommande;
		}

		public function set_dateCommande($dateCommande)
		{
			$this->dateCommande = $dateCommande;
		}
		//=====================================


		public function get_montantCommande()
		{
			return $this->montantCommande;
		}

		public function set_montantCommande($montantCommande)
		{
			$this->montantCommande = $montantCommande;
		}
		//======================================


		public function get_lieuLivraison()
		{
			return $this->lieuLivraison;
		}

		public function set_lieuLivraison($lieuLivraison)
		{
			$this->lieuLivraison = $prixLivraison;
		}
		//========================================

		public function get_prixLivraison()
		{
			return $this->prixLivraison;
		}

		public function set_prixLivraison($prixLivraison)
		{
			$this->prixLivraison = $prixLivraison;
		}
		//====================================


		public function get_idClient()
		{
			return $this->idClient;
		}

		public function set_idClient($idClient)
		{
			$this->idClient = $idClient;
		}
		//=============================
		public function get_etatCommande()
		{
			return $this->etatCommande;
		}

		public function set_etatCommande($etatCommande)
		{
			$this->etatCommande = $etatCommande;
		}
}	
?>