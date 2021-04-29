<?php
    include "../controller/clientC.php";
    include_once '../Model/client.php';

	$clientC = new clientC();
	$error = "";

	if (
        isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["date_naissance"]) &&
        isset($_POST["telephone"]) && 
        isset($_POST["email"]) && 
        isset($_POST["login"]) && 
        isset($_POST["password"])
    ){
		if (
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) &&
            !empty($_POST["date_naissance"]) && 
            !empty($_POST["telephone"]) &&  
            !empty($_POST["email"]) && 
            !empty($_POST["login"]) && 
            !empty($_POST["password"])
        ) {
            if( preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom'] )==1 && preg_match (" /^[a-zA-Z]{2,}$/ ", $_POST['prenom'] )==1 && preg_match ( ' /^.+@.+\.[a-z]{2,}$/ ' , $_POST['email'] )==1 && preg_match ( ' #^[0-9]{8}+$# ', $_POST['telephone'])==1 ){
            $user = new client(
                $_POST['nom'],
                $_POST['prenom'], 
                $_POST['date_naissance'],
                $_POST['telephone'], 
                $_POST['email'],
                $_POST['login'],
                $_POST['password']
            );
            
            $clientC->modifierclient($user, $_GET['id']);
           // header('Location:afficherPatient.php');
        }else {
            echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
            if($count!=0){echo 'L email existe deja '; echo "<br>";}
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom'] )==0){echo 'Le nom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['prenom'] )==0){echo 'Le prenom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( ' /^.+@.+\.[a-zA-Z]{2,}$/ '  , $_POST['email'] )==0){echo 'L email est incorrect '; echo "<br>";} 
            if(preg_match ( " /^[0-9]{8}$/ " , $_POST['telephone'] )==0){echo 'Le numero de telephone doit contenir 8 chiffres '; echo "<br>";}
            
        }
    }
        else
            $error = "Missing information";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Modifier mon compte</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body >
		<?php
			if (isset($_GET['id'])){
				$user = $clientC->recupererPatient1($_GET['id']);	
		?>
		<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h1 class="text-center font-weight-light my-4">S'inscrire</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <table  align="center">
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="nom">Nom:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="nom" id="nom" maxlength="20" value = "<?php echo $user->nom; ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="prenom">Prénom:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="prenom" id="prenom" maxlength="20" value = "<?php echo $user->prenom; ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="date_naissance">date de naissance:</label>
                                                </td>
                                                <td>
                                                    <input  class="form-control" type="date" name="date_naissance" id="date_naissance" value = "<?php echo $user->date_naissance; ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="telephone">telephone:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="telephone" id="telephone" length="8" value = "<?php echo $user->telephone; ?>">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="email">Adresse mail:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn|.+@yahoo.fr|.+yahoo.com" value = "<?php echo $user->email; ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="login">Login:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="login" id="login" value = "<?php echo $user->login; ?>">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="password">Mot de passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="password" name="password" id="password" value = "<?php echo $user->password; ?>">
                                                </td>
                                            </tr>

                                    

                                </div>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="submit" value="Envoyer" onclick="verif();"> 
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="reset" value="Annuler" >
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>                         
            </div>
        </div>

		<?php
		}
		?>
	</body>
</html>
