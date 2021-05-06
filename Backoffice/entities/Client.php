<?php
class Client
{
	private $Nom;
	private $Prenom;
	private $Sexe;
	private $Pseudo;
	private $DateNaissance;
	Private $AdresseMail;
	private $Password;
	function __construct($Nom,$Prenom,$Sexe,$Pseudo,$DateNaissance,$Email,$Pass)
	{
		$this->Nom=$Nom;
		$this->Prenom=$Prenom;
		$this->Sexe=$Sexe;
		$this->Pseudo=$Pseudo;
		$this->DateNaissance=$DateNaissance;
		$this->AdresseMail=$Email;
		$this->Password=$Pass;
	}

	function Get_Nom()
	{
		return $this->Nom;
	}

	function Get_Prenom()
	{
		return $this->Prenom;
	}

	function Get_AdresseMail()
	{
		return $this->AdresseMail;
	}

	function Get_Password()
	{
		return $this->Password;
	}

	function Get_Sexe()
	{
		return $this->Sexe;
	}

	function Get_Pseudo()
	{
		return $this->Pseudo;
	}

	function Get_DateNaissance()
	{
		return $this->DateNaissance;
	}

	function Set_Nom($Nom)
	{
		$this->Nom=$Nom;
	}

	function Set_Prenom($Prenom)
	{
		$this->Prenom=$Prenom;
	}

	function Set_AdresseMail($Email)
	{
		 $this->AdresseMail=$Email;
	}

	function Set_Password($Pass)
	{
		 $this->Password=$Pass;
	}

	function Set_Sexe($Sexe)
	{
		$this->Sexe=$Sexe;
	}

	function Set_Pseudo($Pseudo)
	{
		$this->Pseudo=$Pseudo;
	}

	function Set_DateNaissance($DateNaissance)
	{
		$this->DateNaissance=$DateNaissance;
	}
}

?>