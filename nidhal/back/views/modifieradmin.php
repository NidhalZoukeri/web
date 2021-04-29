<?php
    include "../controller/adminC.php";
    include_once '../Model/admin.php';

	$adminC = new adminC();
	$error = "";

	if (
        isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["adresse"]) &&
        isset($_POST["mot_passe"]) && 
        isset($_POST["email"]) 
       
    ){
		if (
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) &&
            !empty($_POST["adresse"]) && 
            !empty($_POST["mot_passe"]) &&  
            !empty($_POST["email"]) 
            
        ) {
          if( preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom'] )==1 && preg_match (" /^[a-zA-Z]{2,}$/ ", $_POST['prenom'] )==1 && preg_match ( ' /^.+@.+\.[a-z]{2,}$/ ',  $_POST['email'] )==1 ){
            $user = new admin(
                $_POST['nom'],
                $_POST['prenom'], 
                $_POST['adresse'],
                $_POST['mot_passe'], 
                $_POST['email']
               
            );
            
            $adminC->modifieradmin($user, $_GET['id']);
           header('refresh:1;url=../afficheradmin.php');
          }
          else {
            echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>" ;echo "<br>";
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['nom'] )==0){echo 'Le nom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( " /^[a-zA-Z]{2,}$/ " , $_POST['prenom'] )==0){echo 'Le prenom doit contenir que des lettres '; echo "<br>";}
            if(preg_match ( ' /^.+@.+\.[a-zA-Z]{2,}$/ '  , $_POST['email'] )==0){echo 'L email est incorrect '; echo "<br>";} 
          
            
          }
      }
      else{echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>" ;echo "<br>";
            echo "Missing information";}
	}

?>

<?php
	session_start();
	if(!isset($_SESSION["id"])){
    var_dump($_SESSION);
		exit(); 
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link href="styles.css" rel="stylesheet"/>
      
    </head>

    <body>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h1 class="text-center font-weight-light my-4">modifier Profile</h1>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" id="myForm">
                                        <table  align="center">
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="nom">Nom:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="nom" id="nom" maxlength="20" placeholder="Entrer le nom" >
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="prenom">Prénom:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="prenom" id="prenom" maxlength="20" placeholder="Entrer le prenom">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="adresse">adresse:</label>
                                                </td>
                                                <td>
                                                    <input  class="form-control" type="text" name="adresse" id="adresse" placeholder="Entrer adresse">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="adresse">mot_passe:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="mot_passe" id="mot_passe"  placeholder="Entrer l'mot_passe">
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="email">Adresse mail:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn|.+@yahoo.com|.+@yahoo.fr" placeholder="Entrer l'adresse mail">
                                                </td>
                                            </tr>

            

                                </div>
                                            
                                <tr>
                                                <td></td>
                                                <td>
                                                    
                                                    <input class="btn btn-primary btn-block" type="submit" value="Envoyer" > 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-primary btn-block" type="reset" value="Annuler" >
                                                </td>
                                            </tr>

                                            <tr><td></td></tr>
                                        </table>   
                                    </form>
                                
                                
                            </div>
                          
                        </div>
                    </div>
                </div>                         
            </div>
        </div>  
    </body>
</html>
                      