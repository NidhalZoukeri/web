<?PHP
	include "../config.php";
	require_once '../Model/client.php';

	class clientC {
		
		function ajouterclient($client){
			$sql="INSERT INTO client (nom, prenom, date_naissance, telephone, email, login, password) 
			VALUES (:nom, :prenom, :date_naissance, :telephone, :email, :login, :password)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $client->getNom(),
					'prenom' => $client->getPrenom(),
					'date_naissance' => $client->getDateNaissance(),
					'telephone' => $client->getTelephone(),
					'email' => $client->getEmail(),
					'login' => $client->getLogin(),
					'password' => $client->getPassword()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherclient(){
			
			$sql="SELECT * FROM client";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerclient($id){
			$sql="DELETE FROM client WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierclient($client, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE client SET 
						nom = :nom, 
						prenom = :prenom,
						date_naissance = :date_naissance,
						telephone = :telephone,
						email = :email,
						login = :login,
						password = :password
					WHERE id = :id'
				);
				$query->execute([
					'nom' => $client->getNom(),
					'prenom' => $client->getPrenom(),
					'date_naissance' => $client->getDateNaissance(),
					'telephone' => $client->getTelephone(),
					'email' => $client->getEmail(),
					'login' => $client->getLogin(),
					'password' => $client->getPassword(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererclient($id){
			$sql="SELECT * from client where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererclient1($id){
			$sql="SELECT * from client where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function rechercherclient($valueToSearch1){
			$query = "SELECT * FROM client WHERE CONCAT(Id, nom, prenom,login ) LIKE '%".$valueToSearch1."%'";
			$db= config::getConnexion();
			try { 
				$liste = $db->query($query);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}
	
		function tridsc(){
			$query = "SELECT * FROM reclamations ORDER BY Id DESC";
			$db= config::getConnexion();
			try { 
				$liste = $db->query($query);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}
	
		function triasc(){
			$query = "SELECT * FROM reclamations ORDER BY Id ASC";
			$db= config::getConnexion();
			try { 
				$liste = $db->query($query);
			return $liste;
			}
			catch (Exception $e)
			{die ('Erreur:'.$e->getMessage());}
		}
		
	}

?>