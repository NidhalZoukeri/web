<?PHP
	include "../config.php";
	require_once '../Model/admin.php';

	class adminC {

		function ajouteradmin($admin){
			$sql="INSERT INTO admins (nom, prenom, adresse, mot_passe, email) 
			VALUES (:nom, :prenom, :adresse, :mot_passe, :email)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $admin->getNom(),
					'prenom' => $admin->getPrenom(),
					'adresse' => $admin->getadresse(),
					'mot_passe' => $admin->getmot_passe(),
					'email' => $admin->getEmail()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficheradmin(){
			
			$sql="SELECT * FROM admins";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimeradmin($id){
			$sql="DELETE FROM admins WHERE id= :id";
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
		function modifieradmin($admin, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE admins SET 
						nom = :nom, 
						prenom = :prenom,
						adresse = :adresse,
						mot_passe = :mot_passe,
						email = :email,
						
					WHERE id = :id'
				);
				$query->execute([
					'nom' => $admin->getNom(),
					'prenom' => $admin->getPrenom(),
					'date_naissance' => $admin->getadresse(),
					'mot_passe' => $admin->getmot_passe(),
					'email' => $admin->getEmail(),
					
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupereradmin($id){
			$sql="SELECT * from admins where id=$id";
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

		function recupereradmin1($id){
			$sql="SELECT * from admins where id=$id";
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
    }
		

?>