<?php

	ini_set('display_errors' , 1);
	
	require_once("../wp-load.php");
	 
	$idProduct = $_REQUEST['idProduct'];
	 
	$product = get_post($idProduct);
	 
	// print_r($product);
	 
	// exit();
	
	require_once("fpdf.php");

	$pdf = new FPDF("P"); // L = mode paysage
	
	$pdf->AddPage();
	
	$pdf->SetAutoPageBreak(true , 0);
	
	////////////////////////////////////////////////////////////
	
	// HEADER
	$pdf->Image("http://www.coinkeychain.com/wp-content/uploads/2013/12/header-pdf.jpg" , 0 , 0 , 210 , 35);
	
	$startY = 45;

	    // POLICE
	    $pdf->SetTextColor(0, 0 , 0);
	    $pdf->SetFont('Arial' , 'BU' , '14');
	    ////////////////////
	    
	    // POSITION DE DEPART
	   // $pdf->Ln(10); // Saut de ligne
	    $pdf->setX(10);
	    $pdf->setY($startY);
	    ////////////////////
	    
	    // TITRE
	    $pdf->SetFontSize('14');
	    $pdf->Cell(0 , 0 , $product->post_title , '' , 0 , 'C');
	   	////////////////////
	   	
	    $images = rwmb_meta( 'PRODUCT_first_image', 'type=image&size=large' , $idProduct);
	   			
	    foreach ( $images as $image )
	   	{
	   		$pdf->setX(10);
	   		$pdf->Image($image['url'] , 10 , $startY + 5 , 75 , 75);
	   	}
	   		   	
	   	// DESCRIPTION
	   	//////////////////
	   	
	   	$product->post_content =  str_replace("<strong>" , "" , $product->post_content);
	   	$product->post_content =  str_replace("</strong>" , "" , $product->post_content);
	   	
	   	$pdf->SetXY(90 , $startY + 10);
	   	$pdf->SetFont('Arial' , 'B' , 12);
	    $pdf->MultiCell(0 , 5 , utf8_decode($product->post_content) , 0 , 1 , 'L');
	    
	   	//////////////////
	   	
	    $startXBlockProperties = 90;
	    $startYBlockProperties = 130;
	   	
	   	// LOGO SIZE
	   	///////////////////
	   	
	   	$pdf->SetXY($startXBlockProperties , $startYBlockProperties);
	   	$pdf->SetFont('Arial' , 'B' , 12);
	    $pdf->Cell(35 , 10 , "Logo Size :" , 0 , 1 , 'L');
	    
	    $pdf->SetXY($startXBlockProperties + 30 , $startYBlockProperties);
	    $pdf->SetFont('Arial' , '' , 12);
	    $pdf->Cell(50 , 10 , utf8_decode(rwmb_meta( 'PRODUCT_logo_size' , '' , $idProduct)) , 0 , 1 , 'L');
	    
	   	////////////////////
	   	
	    // ITEM SIZE
	   	///////////////////
	   	
	   	$pdf->SetXY($startXBlockProperties , $startYBlockProperties + 5);
	   	$pdf->SetFont('Arial' , 'B' , 12);
	    $pdf->Cell(35 , 10 , "Item Size :" , 0 , 1 , 'L');
	    
	    $pdf->SetXY($startXBlockProperties + 30 , $startYBlockProperties + 5);
	    $pdf->SetFont('Arial' , '' , 12);
	    $pdf->Cell(50 , 10 , utf8_decode(rwmb_meta( 'PRODUCT_item_size' , '' , $idProduct)) , 0 , 1 , 'L');
	    
	   	////////////////////
	   	
	    // PACKAGING
	   	///////////////////
	   	
	   	$pdf->SetXY($startXBlockProperties , $startYBlockProperties + 10);
	   	$pdf->SetFont('Arial' , 'B' , 12);
	    $pdf->Cell(35 , 10 , "Packaging :" , 0 , 1 , 'L');
	    
	    $pdf->SetXY($startXBlockProperties + 30 , $startYBlockProperties + 10);
	    $pdf->SetFont('Arial' , '' , 12);
	    $pdf->Cell(50 , 10 , utf8_decode(rwmb_meta( 'PRODUCT_packaging' , '' , $idProduct)) , 0 , 1 , 'L');
	    
	   	////////////////////
	   	
	     // PATENT
	   	///////////////////
	   	
	   	$pdf->SetXY($startXBlockProperties , $startYBlockProperties + 15);
	   	$pdf->SetFont('Arial' , 'B' , 12);
	    $pdf->Cell(35 , 10 , "Patent :" , 0 , 1 , 'L');
	    
	    $pdf->SetXY($startXBlockProperties + 30 , $startYBlockProperties + 15);
	    $pdf->SetFont('Arial' , '' , 12);
	    $pdf->Cell(50 , 10 , utf8_decode(rwmb_meta( 'PRODUCT_patent' , '' , $idProduct)) , 0 , 1 , 'L');
	    
	   	////////////////////
	 
	    // COLORS AVAILABLE
		//////////////////////

	    $startXBlockColors = 90;
	    $startYBlockColors = 170;
		
	   	$colors = rwmb_meta('PRODUCT_colors', 'type=checkbox_list' , $idProduct);
	   	
	   	if(count($colors))
	   	{
	   	
	   	  	$pdf->SetXY($startXBlockColors , $startYBlockColors);
	   	  	$currentY =  $startYBlockColors;
	  	
	   		$pdf->SetFont('Arial' , 'B' , 14);
	    	$pdf->Cell(35 , 10 , "Color available" , 0 , 1 , 'L');
	    	
	    	$currentY = $currentY + 10;
	    	
	    	$currentX = $startXBlockColors;
	    	
	    	$i = 1;
	    	
	   		foreach($colors as $color)
	    	{
	    		$urlImage = "http://www.qcsasia.com/colors/" . $color . ".png";
	    	
	    		if($i == 11)
	    		{
	    			$currentY = $currentY + 15;
	    			$currentX = $startXBlockColors;
	    		}
	    		
	    		$pdf->Image($urlImage , $currentX , $currentY , 10 , 15);
	    		$currentX = $currentX + 10;
	    		
	    		$i++;
	    	}
	    
	   	}
	   	
	   
	 //////////////////////////////////////////////////////////////
/*
	   	$currentY = 140;
	   	$pdf->SetXY(10 , $currentY);
	   	
	    // OPTIONS AVAILABLE
	    /////////////////////

		$images = rwmb_meta( 'PRODUCT_tab_image_option', 'type=image&size=large' , $idProduct);
		
		$i = 1;
							 
		if(count($images) > 0)
		{

	   		$pdf->SetFont('Arial' , 'B' , 14);
	    	$pdf->Cell(35 , 10 , "Options available" , 0 , 1 , 'L');
	    	
	    	$currentX = 10;
	    	$currentY = $currentY + 10;
	    		    	
	    	foreach ( $images as $image )
	   		{
	   			
	   			if($i == 4)
	   			{
	   				$currentX = 10;
	   				$currentY = $currentY + 70;
	   			}
	   		
	   			// IMAGE
	   			$pdf->Image($image['url'] , $currentX , $currentY , 50 , 50);
	   			
	   			// TITLE
	   			$pdf->SetXY($currentX , $currentY + 50);
	   			$pdf->SetFont('Arial' , '' , 12);
	    		$pdf->MultiCell(50 , 10 , $image['title'] , 0 , 1 , 'L');
	    		
	    		$currentX = $currentX + 60;
	    		
	    		$i++;
	   			
	   		}
		
	   		$currentY = $currentY + 70;
		}
		
	 //////////////////////////////////////////////////////////////
	 
		// SI PLUS DE 3 PHOTO OPTIONS, CHANGEMENT DE PAGE
		if($i > 3)
		{
			$pdf->AddPage();
			$currentY = 20;
		}
	 
   		// LOGO PROCESS
	    /////////////////////

		$images = rwmb_meta( 'PRODUCT_tab_image_process', 'type=image&size=large' , $idProduct);
							 
		if(count($images) > 0)
		{

			$pdf->SetXY(10 , $currentY);
	   		$pdf->SetFont('Arial' , 'B' , 14);
	    	$pdf->Cell(35 , 10 , "Logo process" , 0 , 1 , 'L');
	    	
	    	$currentX = 10;
	    	$currentY = $currentY + 10;
	    	
	    	$i = 1;
	    	
	    	foreach ( $images as $image )
	   		{
	   		
	   			if($i == 4)
	   			{
	   				$currentX = 10;
	   				$currentY = $currentY + 70;
	   			}
	   			
	   			// IMAGE
	   			$pdf->Image($image['url'] , $currentX , $currentY , 50 , 50);
	   			
	   			// TITLE
	   			$pdf->SetXY($currentX , $currentY + 50);
	   			$pdf->SetFont('Arial' , '' , 12);
	    		$pdf->MultiCell(50 , 10 , $image['title'] , 0 , 1 , 'L');
	    		
	    		$currentX = $currentX + 60;

	    		$i++;
	    		
	   		}
		
		}
		*/
							 
	 //////////////////////////////////////////////////////////////
	 
	    
//	$rand = rand(0, 10000);
	    
	$filename = "a.pdf";
	

	$pdf->Output($filename , "D");

	
?>