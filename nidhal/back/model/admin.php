<?PHP
	class admin{
		private  $id = null;
		private  $nom = null;
		private  $prenom = null;
		private  $adresse = null;
		private  $mot_passe = null;
		private  $email = null;
		
		
		function __construct(string $nom, string $prenom, string $adresse, string $mot_passe , string $email){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->adresse=$adresse;
			$this->mot_passe=$mot_passe;
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
		function getadresse(): string{
			return $this->adresse;
		}
		function getmot_passe(): string{
			return $this->mot_passe;
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
		function setadresse(string $adresse): void{
			 $this->adresse=$adresse;
		}
		function setmot_passe(string $mot_passe): void{
			 $this->mot_passe=$mot_passe;
		}
		function setEmail(string $email): void{
			$this->email=$email;
		}
		
	}
?>