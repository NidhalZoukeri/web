<?php
include_once "../config.php";


class clientC

{ function recupererclient($id)
  {
      $sql="SELECT * from clients where idC=$id";
    $db = config::getConnexion();
    
    try
    {
    $liste=$db->query($sql);
    $liste->execute();
    return $liste;
    }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
  }

  function mailcommande($mail,$somme,$date)
  {
    $msg=" Mail de confirmation de Madame Zarrouk  le ".$date."\nSomme de la commande : ".$somme." DT\nmerci d'avoir choisi nos services.";
    $msg=wordwrap($msg,70);
    mail($mail, $msg, $msg);
  }
}