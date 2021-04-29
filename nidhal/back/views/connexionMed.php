<?php
    include_once '../Model/medecin.php';
    include_once '../Controller/medecinC.php';
 
 
    $error = [];
    // create user
    $user = null;
    // create an instance of the controller
    $userC = new medecinC();
    if (
        isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["diplome"]) && 
        isset($_POST["adresse"]) &&
        isset($_POST["email"])
                
    ) { 
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["prenom"]) && 
            !empty($_POST["diplome"]) && 
            !empty($_POST["adresse"]) && 
            !empty($_POST["email"]) 
            
        ) {
                $user = new medecin(
                    $_POST['nom'],
                    $_POST['prenom'], 
                    $_POST['diplome'],
                    $_POST['adresse'],
                    $_POST['email']
            );
    
            
            $userC->ajouterMedecin($user);
            header('Location:afficherMedecin.php');
    
            }
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
                                    <h1 class="text-center font-weight-light my-4">S'inscrire</h1>
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
                                                    <label class="small mb-1" for="diplome">diplome:</label>
                                                </td>
                                                <td>
                                                    <input  class="form-control" type="text" name="diplome" id="diplome" placeholder="Entrer le diplome">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="small mb-1" for="adresse">adresse:</label>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="adresse" id="adresse"  placeholder="Entrer l'adresse">
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
                      