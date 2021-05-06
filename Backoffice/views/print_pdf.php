<?php

	 function generateRow()
 {
    
    $contents = '';
    include_once('../config.php');
    $req = 'SELECT * FROM commande';
    $db = config::getConnexion();
    $sth = $db->query($req);
         while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 

		{
			$contents .= "
			<tr>
				<td>".$row['idCommande']."</td>
				<td>".$row['dateCommande']."</td>
				<td>".$row['montantCommande']."</td>
				<td>".$row['lieuLivraison']."</td>
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center"> Votre Facture </h2>
      	<h4> Commande   </h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="25%">Les commande</th>
				<th width="25%">Description Event</th>
				<th width="25%">Start Date Event</th>
				<th width="25%">Date End Event</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('event.pdf', 'I');
	

?>