<?php

	$baseURL = "../";
	
	require_once("checkSession.php");
	require_once("../include/utils.inc.php");
	require_once("../include/member.inc.php");
	require_once("../include/lib/phpexcel/PHPExcel.php");
	require_once("../include/lib/phpexcel/PHPExcel/Writer/Excel2007.php");
	
	////////////////////////////////////////////////////////////////////
	
	$tabMember = getTabMember("" , $_SESSION['sqlQuery'] , -1 , $_REQUEST['sort']);
	
	$rand = rand(0, 10000);
	    
	$filename = "list-members-" . $login . "-" . $rand . ".xls";
	$filepath = "../xls/" . $filename;
	
	$objPHPExcel = new PHPExcel();
	
	$objPHPExcel->getActiveSheet()->setTitle('QCS');
	$objPHPExcel->setActiveSheetIndex(0);
	 
	
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
	$objPHPExcel->getDefaultStyle()->getFont()->setSize(10); 
	
	// STYLE TITRE
	////////////////////////////////////////////////////////////
	
	$styleTitre = new PHPExcel_Style();
	$styleTitre->applyFromArray(
	array(	'font' 	=> array(
								'name'		=> 'Arial',
								'bold'		=> true,
								'size'		=> '12',
								'color'		=> array('rgb' => 'FFFFFF')
							),
			'fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('rgb' => 'DF0101')),
			'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
		 ));
		 

	$objPHPExcel->getActiveSheet()->setSharedStyle($styleTitre , "A1:U1");
	
	// TAILE DES COLONNES ///////////////////////////////////////////////
	
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth(10); 		
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(30);    
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setWidth(30); 
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setWidth(30); 
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setWidth(30);	
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("O")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("P")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension("R")->setWidth(30);	
	
	////////////////////////////////////////////////////////////////////
	
	$ligne = 1;
	
	$objPHPExcel->getActiveSheet()->SetCellValue("A" . $ligne , "ID");
	$objPHPExcel->getActiveSheet()->SetCellValue("B" . $ligne , "Company name");
	$objPHPExcel->getActiveSheet()->SetCellValue("C" . $ligne , "type");
	$objPHPExcel->getActiveSheet()->SetCellValue("D" . $ligne , "Email");
	$objPHPExcel->getActiveSheet()->SetCellValue("E" . $ligne , "Country");
	$objPHPExcel->getActiveSheet()->SetCellValue("F" . $ligne , "Country IP");
	$objPHPExcel->getActiveSheet()->SetCellValue("G" . $ligne , "Last connection");
	$objPHPExcel->getActiveSheet()->SetCellValue("H" . $ligne , "Regitration date");
	$objPHPExcel->getActiveSheet()->SetCellValue("I" . $ligne , "First name");
	$objPHPExcel->getActiveSheet()->SetCellValue("J" . $ligne , "Last name");
	$objPHPExcel->getActiveSheet()->SetCellValue("K" . $ligne , "Compatny type");
	$objPHPExcel->getActiveSheet()->SetCellValue("L" . $ligne , "Status");
	$objPHPExcel->getActiveSheet()->SetCellValue("M" . $ligne , "Address");
	$objPHPExcel->getActiveSheet()->SetCellValue("N" . $ligne , "Phone");
	$objPHPExcel->getActiveSheet()->SetCellValue("O" . $ligne , "Website");
	$objPHPExcel->getActiveSheet()->SetCellValue("P" . $ligne , "Classification");
	$objPHPExcel->getActiveSheet()->SetCellValue("Q" . $ligne , "Other email");
	$objPHPExcel->getActiveSheet()->SetCellValue("R" . $ligne , "Comment");
		
	$ligne = 2;
	
	foreach($tabMember as $member)
	{

		$objPHPExcel->getActiveSheet()->SetCellValue("A" . $ligne , $member['id']);
		$objPHPExcel->getActiveSheet()->SetCellValue("B" . $ligne , $member['company_name']);
		$objPHPExcel->getActiveSheet()->SetCellValue("C" . $ligne , $member['type']);
		$objPHPExcel->getActiveSheet()->SetCellValue("D" . $ligne , $member['email']);
		$objPHPExcel->getActiveSheet()->SetCellValue("E" . $ligne , $member['country']);
		$objPHPExcel->getActiveSheet()->SetCellValue("F" . $ligne , $member['country_ip']);
		$objPHPExcel->getActiveSheet()->SetCellValue("G" . $ligne , $member['last_connection']);
		$objPHPExcel->getActiveSheet()->SetCellValue("H" . $ligne , $member['date_creation']);
		$objPHPExcel->getActiveSheet()->SetCellValue("I" . $ligne , $member['firstname']);
		$objPHPExcel->getActiveSheet()->SetCellValue("J" . $ligne , $member['lastname']);
		$objPHPExcel->getActiveSheet()->SetCellValue("K" . $ligne , $member['type']);
		$objPHPExcel->getActiveSheet()->SetCellValue("L" . $ligne , $member['status']);
		$objPHPExcel->getActiveSheet()->SetCellValue("M" . $ligne , $member['address']);
		$objPHPExcel->getActiveSheet()->SetCellValue("N" . $ligne , $member['phone']);
		$objPHPExcel->getActiveSheet()->SetCellValue("O" . $ligne , $member['website']);
		$objPHPExcel->getActiveSheet()->SetCellValue("P" . $ligne , $member['classification']);
		$objPHPExcel->getActiveSheet()->SetCellValue("Q" . $ligne , $member['email2']);
		$objPHPExcel->getActiveSheet()->SetCellValue("R" . $ligne , $member['comment']);
		
		$ligne++;
	}
	
	////////////////////////////////////////////////////////////////////
	
	$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
//	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save($filepath);
	
	header("content-type: application/octet-stream");
 	header("Content-Disposition: attachment; filename=\"" .  $filename . "\"");
	header("Content-Length: ". filesize($filepath));
	header("Pragma: no-cache");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
	header("Expires: 0");
	readfile($filepath);

	
?>