<?php

	// ini_set('display_errors' , 1);
	
	require_once("../include/member.inc.php");
	
	$idMember = $_REQUEST['idMember'];
	
	$member = getMemberById($idMember);

	require_once("../include/lib/fpdf/fpdf.php");

	$pdf = new FPDF("P"); // L = portrait
	
	$pdf->AddPage();
	
	$pdf->SetAutoPageBreak(true , 0);
	
	////////////////////////////////////////////////////////////
	
	// HEADER
	if(!empty($member['logo']))
		$pdf->Image("http://www.qcsasia.com/qcs-admin/logo/" . $member['logo'] , 150 , 5 , 50, 0);
							 
	//////////////////////////////////////////////////////////////
	
	// TITLE
	//////////////////////////////////////////////////////////////
	
	$pdf->SetXY(0 , 5);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(210 , 10 , $member['company_name'] , 0 , 1 , 'C');
	
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = 30;
	
	//////////////////////////////////////////////////////////////
	
	// FIRSTNAME
	//////////////////////////////////////////////////////////////
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Firstname :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['firstname'] , 0 , 1 , 'L');
	
	// LASTNAME
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Lastname :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['lastname'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// LAST CONNECTION
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Last connection :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['last_connection'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// REGISTRATION DATE
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(40 , 10 , "Registration date :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['date_creation'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// STATUS
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(40 , 10 , "Current status :" , 0 , 0 , 'L');
	
	$status = "";
	
	if($member['status'] == '0')
		$status  = "Pending";
	else if($member['status'] == '1')
		$status  = "Email verified";
	else if($member['status'] == '2')
		$status  = "Member";
		
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $status , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// TYPE
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Company type :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['type'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// EMAIL
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Email :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['email'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// EMAIL 2
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Other email :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['email2'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// COUNTRY
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Country :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['country'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// COUNTRY IP
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Country IP :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['country_ip'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	
	// WEBSITE
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Website :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['website'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// ADDRESS
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Adress :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['address'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// PHONE
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Phone :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['phone'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// CLASSIFICATION
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(40 , 10 , "Classification :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['classification'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// LINKEDIN
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Linkedin :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['linkedin'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	// COMMENT
	//////////////////////////////////////////////////////////////
	
	$startX = 10;
	$startY = $startY + 10;
	 
	$pdf->SetXY($startX , $startY);
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(30 , 10 , "Comment :" , 0 , 0 , 'L');
	
	$pdf->SetFont('Arial' , 'B' , 12);
	$pdf->Cell(50 , 10 , $member['comment'] , 0 , 1 , 'L');
	
	//////////////////////////////////////////////////////////////
	
	$filename = $member['company_name'] . ".pdf";
	
	$pdf->Output($filename , "D");
	
?>