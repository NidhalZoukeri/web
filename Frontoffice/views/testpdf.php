  <?php
   
  include_once "../entities/produit.php";
  include_once "../core/produitC.php";
  include_once "../core/commandeC.php";
  include_once "../entities/commande.php";

  include_once "../core/clientC.php";
  include_once "../entities/clients.php";
  require ("pdf/fpdf.php");
  require_once('phpmailer/PHPMailer-master/src/PHPMailer.php');
  require_once('phpmailer/PHPMAiler-master/src/SMTP.php');


session_start();
$_SESSION['id']=2;
if(isset($_SESSION['id']))
{

  $produitC=new produitC();
  $produit1=$produitC->recupererpanier($_SESSION['id']);
  
  $tab=array();
  $somme=0;
  
  foreach ($produit1 as $row) 
  {
    array_push($tab,$row['prix']*$row['quantite']);
    $somme+=$row['prix']*$row['quantite'];
  }

    
    $clientC=new clientC();
    $client1=$clientC->recupererclient($_SESSION['id']);
    $client=$client1->fetch();
    $mail=$client["Email"];
    $nom=$client["nom"];
    $prenom=$client["prenom"];

   

    $dateactuelle = date("Y-m-d");

    $commande1C=new commandeC;
    $lastID=$commande1C->recupererdernierID($_SESSION['id']);

   
    $max=$lastID->fetch();
    $max_row=$max["max"];

    $contenucommande=$commande1C->recuperercontenucommande($max_row);

    $pdf=new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(130,5,'Code de la facture :'.'  '.$max_row,1,0);
    $pdf->Cell(59,5,'MadameZarrouk.tn',1,1);
    $pdf->Cell(130,5,' ',0,1);
    $pdf->SetFont('Arial','',12);

    $pdf->Cell(130,5,'Date de livraison ',1,0);
    $pdf->Cell(61,5,$dateactuelle,1,1);

    $pdf->Cell(130,5,'Lieu de livraison ',1,0);
    $pdf->Cell(61,5,'Ariana',1,1);

    $pdf->Cell(130,5,' ',0,1);
    $pdf->Cell(130,5,'Envoyer a : ',1,1);

    $pdf->Cell(130,5,'Nom du destinataire ',1,0);
    $pdf->Cell(61,5,$nom,1,1);
    $pdf->Cell(130,5,'Prenom du destinataire ',1,0);
    $pdf->Cell(61,5,$prenom,1,1);
    $pdf->Cell(130,5,'E-mail du destinataire ',1,0);
    $pdf->Cell(61,5,$mail,1,1);

    $pdf->Cell(130,5,' ',0,1);
    $pdf->Cell(71,5,'Description : ',1,0);
    $pdf->Cell(45,5,'Prix unitaire',1,0);
    $pdf->Cell(45,5,'Quantite',1,0);
    $pdf->Cell(30,5,'Prix total',1,1);

    foreach($contenucommande as $row)
    {
        $pdf->Cell(71,5,$row["nom"],1,0);
        $pdf->Cell(45,5,$row["prix"],1,0);
        $pdf->Cell(45,5,$row["quantite"],1,0);
        $pdf->Cell(30,5,$row["quantite"]*$row["prix"],1,1);
    }

    $pdf->Cell(116,5,'',1,0);
    $pdf->Cell(45,5,'Prix Livraison',1,0);
    $pdf->Cell(30,5,'0',1,1);
      $pdf->Cell(116,5,'',1,0);

    $pdf->Cell(45,5,'Somme total',1,0);
    $pdf->Cell(30,5,$somme,1,1);
    $pdf->Cell(116,5,'',1,0);
    $pdf->Cell(45,5,'TVA',1,0);
    $pdf->Cell(30,5,$somme*0.18 ,1,1);
    $pdf->Cell(116,5,'',1,0);
    $pdf->Cell(45,5,'TTC',1,0);
    $pdf->Cell(30,5,$somme*1.18 ,1,1);

    $dest = 'sample.pdf';
    $pdf->Output('F', $dest);

$to = $mail;
$upload_path='sample.pdf';
 
//sender
$from = 'madame.zarrouk123@gmail.com';
$fromName = 'Madame Zarrouk';
 
//email subject
$subject = 'Facturation Commande #'.$max_row.'.';
 
//attachment file path
$file = $upload_path;
 
//email body content
$htmlContent = '<h1>Votre facture</h1>
   <p>Ci-joint est la facture..</p>';
 
//header for sender info
$headers = "From: $fromName"." <".$from.">";
 
//boundary
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
//headers for attachment
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
 
//multipart boundary
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";
 
//preparing attachment
if(!empty($file) > 0)
{
    if(is_file($file))
    {
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));
 
        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
        "Content-Description: ".basename('$files[$i]')."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
}
 
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;
 
//send email
$mail = @mail($to, $subject, $message, $headers, $returnpath);


$contenucommande=$commande1C->recuperercontenucommande($max_row);
$produit3C=new produitC;
foreach($contenucommande as $row)
    {
      $produit3C->modifierquantiteaprescommande($row["id"],$row["quantite"]);
    }

$produit3C->destroycart($_SESSION['id']);

header('Location: panier.php');
}

?>