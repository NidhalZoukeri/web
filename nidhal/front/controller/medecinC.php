<?PHP
	include "../config.php";
	require_once '../Model/medecin.php';

	class medecinC {

		function ajouterMedecin($medecin){
			$sql="INSERT INTO medecin (nom, prenom, diplome, adresse, email) 
			VALUES (:nom, :prenom, :diplome, :adresse, :email)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $medecin->getNom(),
					'prenom' => $medecin->getPrenom(),
					'diplome' => $medecin->getDiplome(),
					'adresse' => $medecin->getAdresse(),
					'email' => $medecin->getEmail()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherMedecin(){
			
			$sql="SELECT * FROM medecin";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerMedecin($id){
			$sql="DELETE FROM medecin WHERE id= :id";
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
    }
		

?>