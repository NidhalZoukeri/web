<?php
	include_once "../config.php";
	class AdminC 
	{
		
		function Seconnecter($Admin)
		{
			$Login=$Admin->Get_Login();
			$Password=$Admin->Get_Password();

			$database=LiaisonBaseDeDonnee::GetConnexion();
      		$q = $database->prepare("SELECT * FROM admistrateurs WHERE Login=:log AND Password=:pass");
      		$q->bindParam(":log",$Login);
      		$q->bindParam(":pass",$Password);
      		$q->execute();
      		return $q;
		}
	}



?>