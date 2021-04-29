<?PHP
	class client{
		private  $id = null;
		private  $nom = null;
		private  $prenom = null;
		private  $date_naissance = null;
		private  $telephone = null;
		private  $email = null;
		private  $login = null;
		private  $password = null;
		
		function __construct(string $nom, string $prenom, string $date_naissance, int $telephone , string $email, string $login, string $password){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->date_naissance=$date_naissance;
			$this->telephone=$telephone;
			$this->email=$email;
			$this->login=$login;
			$this->password=$password;
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
		function getDateNaissance(): string{
			return $this->date_naissance;
		}
		function getTelephone(): int{
			return $this->telephone;
		}
		function getEmail(): string{
			return $this->email;
		}
		function getLogin(): string{
			return $this->login;
		}
		
		function getPassword(): string{
			return $this->password;
		}

		function setNom(string $nom): void{
			$this->nom=$nom;
		}
		function setPrenom(string $prenom): void{
			$this->prenom=$prenom;
		}
		function setDateNaissance(string $date_naissance): void{
			 $this->date_naissance=$date_naissance;
		}
		function setTelephone(int $telephone): void{
			 $this->telephone=$telephone;
		}
		function setLogin(string $login): void{
			$this->login=$login;
		}
		function setEmail(string $email): void{
			$this->email=$email;
		}
		function setPassword(string $password): void{
			$this->password=$password;
		}
	}
?>