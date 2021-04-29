<?PHP
	class medecin{
		private  $id = null;
		private  $nom = null;
		private  $prenom = null;
		private  $diplome = null;
		private  $adresse = null;
		private  $email = null;
		
		
		function __construct(string $nom, string $prenom, string $diplome, string $adresse , string $email){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->diplome=$diplome;
			$this->adresse=$adresse;
			$this->email=$email;
			
		}
		
		function getId(): int{
			return $this->id;
		}
		function getNom(): string{
			return $this->nom;
		}
		function getPrenom(): string{
			return $this->prenom;
		}
		function getDiplome(): string{
			return $this->diplome;
		}
		function getAdresse(): string{
			return $this->adresse;
		}
		function getEmail(): string{
			return $this->email;
		}
	

		function setNom(string $nom): void{
			$this->nom=$nom;
		}
		function setPrenom(string $prenom): void{
			$this->prenom=$prenom;
		}
		function setDiplome(string $diplome): void{
			 $this->diplome=$diplome;
		}
		function setAdresse(string $adresse): void{
			 $this->adresse=$adresse;
		}
		function setEmail(string $email): void{
			$this->email=$email;
		}
		
	}
?>