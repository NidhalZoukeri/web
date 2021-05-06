<?php
class produit
{
	private $id;
	private $nom;
	private $prix;
	private $quantite;
	private $categorie;

		public function __construct($id,$nom,$prix,$quantite,$categorie)
		{
			$this->id=$id;
			$this->nom=$nom;
			$this->prix=$prix;
			$this->quantite=$quantite;
			$this->categorie=$categorie;
		}

		public function get_id()
		{
			return $this->id;
		}

		public function set_id($id)
		{
			$this->id = $id;
		}

		public function get_nom()
		{
			return $this->nom;
		}

		public function set_nom($nom)
		{
			$this->nom = $nom;
		}

		public function get_prix()
		{
			return $this->prix;
		}

		public function set_prix($prix)
		{
			$this->prix = $prix;
		}

		public function get_quantite()
		{
			return $this->quantite;
		}

		public function set_quantite($quantite)
		{
			$this->quantite = $quantite;
		}

		public function get_categorie()
		{
			return $this->categorie;
		}

		public function set_categorie($categorie)
		{
			$this->categorie = $categorie;
		}
}	
?>