
<?php if(!empty( $post->post_parent)) // SI DANS SOUS PRODUIT ALORS ON AFFICHE SIDEBAR NORMAL AVEC MEMBER AREA
{
	//echo "dans if";
	//$post =  get_post($post->post_parent); 
	
	get_sidebar();
	
	?>
	
	
<?php } else {

 ?> 

<center>

<div class = "sidebar-product">

<?php 
	
	$images = rwmb_meta( 'PRODUCT_image_situation', 'type=image' , $post->ID);

	if(count($images) > 0)
	{
	   	foreach ( $images as $image )
	   	{
	   		$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);
	   		
	  		 echo "<td><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process' /></td>";
	   	}
	   	
	   	echo "<hr/>";

	}

?>


	<div style = "text-align:center;">


	<p style = "width:100px;float:left;text-align:center;">
		<a target = "_BLANK" href = "/fiche-document-center/?idProduct=<?php echo $post->ID ?>"><img src = "<?php echo get_bloginfo('url') ?>/wp-content/themes/coinkeychains/img/icon-document-center-70.jpg" /></a>
		<br/><a target = "_BLANK" href = "/fiche-document-center/?idProduct=<?php echo $post->ID ?>" style = "text-align:center;">Document center</a>
		<br/><br/>
		<?php if(!empty($linkToFile)) { ?>
		<a target = "_BLANK" href = "<?php echo $linkToFile; ?>">Download the PDF datasheet</a>
		<?php } ?>
	</p>


	<p style = "width:100px;float:left;text-align:center;">
		<a target = "_BLANK" href = "?page_id=34&subject=<?php the_title(); ?>"><img src = "<?php echo get_bloginfo('url') ?>/wp-content/themes/coinkeychains/img/icon-contact-us-70.jpg" /></a>
		<br/><a href = "?page_id=34&subject=<?php the_title(); ?>">Contact Us</a>
	</p>
	
	<?php 
		
		$file = rwmb_meta( 'PRODUCT_pdf_file', '' , $post->ID);
		
		$file = str_replace("www" , "dl" , $file);
	
	?>
	<p style = "width:100px;float:left;text-align:center;">
		<a target = "_BLANK" href = "<?php echo $file; ?>"><img src = "<?php echo get_bloginfo('url') ?>/wp-content/themes/coinkeychains/img/icon-print-70.jpg" /></a>
		<br/>
		<a  target = "_BLANK" href = "<?php echo $file; ?>">Print it</a>
	</p>
	
	</div>



<!-- YOU MIGHT ALSO LIKE -->

<?php 

	$salesProgram = $_REQUEST['salesProgram'];

	if($salesProgram != '1')
	{
		echo '<hr style = "clear:both"/>';
		
		$tabImage = rwmb_meta( 'PRODUCT_also_like', 'type=image' , $post->ID);
		
		if(count($tabImage) > 0)
		{
			echo "<span style = 'color:red;font-weight:bold;'>You might also like</span>";
			
			echo "<br/><br/>";
			
			foreach ( $tabImage as $image )
			{
		   	//	$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);
		   		
		  	 	echo "<a href='{$image['description']}' title='{$image['title']}' rel='thickbox'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}'  /></a>";
				echo "<br/>";
		  	 	echo rwmb_meta( 'PRODUCT_caption_might_also_like' );
			}
		}
	}

?>


</div>

<?php 

// echo "login = " . $_SESSION['email-login'] ;

$file = rwmb_meta('PRODUCT_document_center_picture_high_definition_1' , $post->ID);

if(!empty($file))
{
	
	echo '<div class = "sidebar-product" style = "margin-top:20px;">';
	
		
		echo "<p style = 'font-weight:bold;font-size:16px;text-align:center;padding-top:0xp;margin-top:0px;'>";
		echo "Documents available for download";
		echo "<br/><br/>";
		echo "<span style = 'font-weight:normal;font-size:14px;color:red;'>* Members only</span>";
		echo "</p>";
	
	
		function getNameFromFile($file)
		{
			$tab = explode("/" , $file);
				
			$name =  str_replace("%20" , " " , $tab[count($tab) - 1]);
			
			$name =  urldecode($name);
				
			$name =  str_replace("?m=" , " " , $name);
		
			return $name;
		}
		
		function getCSS($name)
		{
		//	if(strpos($name , ".zip") > 0)
		//		return "font-weight:bold;";
		//	else
		//		echo "";
		}
		
		function truncateFilename($filename)
		{
			$tab = explode("." , $filename);
				
			$extension = $tab[count($tab) - 1];
				
			if(strlen($filename) > 28)
			{
				$filename = substr($filename , 0  , 27 ) . '...';
				
				$filename = $filename . "." . $extension;
			}
			
			$filename = str_replace("?dl=0" , "" , $filename);
			
			return $filename;
		}
		
		echo '<table id = "table-document-center" style = "margin-top:0px;border-width:0px;">';
		
		// PICTURE HIGH DEFINITION
		/////////////////////////////////////////////////////////////
	
		$file = rwmb_meta('PRODUCT_document_center_picture_high_definition_1' , $post->ID);
		
		if(!empty($file))
		{
			
			echo "<tr><td class = 'title' style = 'padding:10px;'>Picture high definition</td></tr>";
			echo "<tr><td style = 'padding:10px;'>";
			
			//echo "<u><b>Picture high definition</b></u><br/><br/>";
									
			for($i = 1 ; $i < 21 ; $i++)
			{
										
				$file = rwmb_meta('PRODUCT_document_center_picture_high_definition_' .$i, '' , $post->ID);
				
				// $string = substr($string,0,10).'...';
				
				if(!empty($file))
				{
											
					$file = str_replace("www" , "dl" , $file);
									    
					$filename = getNameFromFile($file);
												
					$css = "";
												
				//	if(strpos($filename , ".zip") > 0)
				//		$css = "font-weight:bold;";
					
					
					
				$filename = truncateFilename(getNameFromFile($file));
			
				if (!isset($_SESSION['qcs-isconnect']))
				{
					$file = "/member-area-index";
				}
												
					echo "<a href = '" . $file . "' style = '" . $css . "'>" . $filename . "</a><br/><br/>\n";
						
				}
			}
			
			echo "</tr></td>";
									    
	
		}
		
		
		// PRICE LIST 1
		/////////////////////////////////////////////////////////////
		
		$file = "";
		
		if($_SESSION['qcs-type'] == 'supplier')
		 	$file = rwmb_meta('PRODUCT_document_center_suppliers_file' , '' , $post->ID);
		else
			$file = rwmb_meta('PRODUCT_document_center_distributors_file' , '' , $post->ID);
		
		if(!empty($file))
		{
			
			echo "<tr><td class = 'title' style = 'padding:10px;'>Price list</td></tr>";
			echo "<tr><td style = 'padding:10px;'>";
			
			$file = str_replace("www" , "dl" , $file);
			
			$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
			
			$filename = truncateFilename(getNameFromFile($file));
			
			if (!isset($_SESSION['qcs-isconnect']))
			{
				$file = "/member-area-index";
			}
			
			echo "<a href = '" . $file . "'>" . $filename  . "</a><br/>\n";
			
			
		}
		
		// PRICE LIST 2
		/////////////////////////////////////////////////////////////
		
		$file = rwmb_meta('PRODUCT_document_center_suppliers_file_2' , '' , $post->ID);
		
		if(!empty($file) && $_SESSION['qcs-type'] == 'supplier')
		{

			$file = str_replace("www" , "dl" , $file);
				
			$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
				
			$filename = truncateFilename(getNameFromFile($file));
				
			if (!isset($_SESSION['qcs-isconnect']))
			{
				$file = "/member-area-index";
			}
				
			echo "<a href = '" . $file . "'>" . $filename  . "</a><br/>\n";
				
			echo "</tr></td>";
		}
		else
			echo "</tr></td>";
		
		
		$file = rwmb_meta('PRODUCT_document_center_distributors_file_2' , '' , $post->ID);
		
		if(!empty($file) && $_SESSION['qcs-type'] == 'distributor')
		{
		
			$file = str_replace("www" , "dl" , $file);
		
			$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
		
			$filename = truncateFilename(getNameFromFile($file));
		
			if (!isset($_SESSION['qcs-isconnect']))
			{
				$file = "/member-area-index";
			}
		
			echo "<a href = '" . $file . "'>" . $filename  . "</a><br/>\n";
		
			echo "</tr></td>";
		}
		else
			echo "</tr></td>";
		
		// DIGITAL DRAWING
		/////////////////////////////////////////////////////////////
		
		$file = rwmb_meta('PRODUCT_document_center_digital_drawing' , '' , $post->ID);
		
		if(!empty($file))
		{
			
			echo "<tr><td class = 'title' style = 'padding:10px;'>Digital drawing</td></tr>";
			echo "<tr><td style = 'padding:10px;'>";
			
			$file = str_replace("www" , "dl" , $file);
			
			$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
			
			$filename = truncateFilename(getNameFromFile($file));
			
			if (!isset($_SESSION['qcs-isconnect']))
			{
				$file = "/member-area-index";
			}
		
			echo "<a href = '" . $file . "'>" . $filename . "</a><br/>\n";
		
			echo "</tr></td>";
			
		}
		
		// LOGO STANDARD
		/////////////////////////////////////////////////////////////

		$file = rwmb_meta('PRODUCT_document_center_logo_standard' , '' , $post->ID);
		
		if(!empty($file))
		{
			
			echo "<tr><td class = 'title' style = 'padding:10px;'>Logo standard</td></tr>";
			echo "<tr><td style = 'padding:10px;'>";
			
			$file = str_replace("www" , "dl" , $file);
			
			$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
			
			$filename = truncateFilename(getNameFromFile($file));
			
			if (!isset($_SESSION['qcs-isconnect']))
			{
				$file = "/member-area-index";
			}
			
			echo "<a href = '" . $file . "'>" . $filename . "</a><br/>\n";
			
			echo "</tr></td>";
		
		}
		
		// PATENT
		/////////////////////////////////////////////////////////////

		$file = rwmb_meta('PRODUCT_document_center_patent' , '' , $post->ID);
		
		if(!empty($file))
		{
			
			echo "<tr><td class = 'title' style = 'padding:10px;'>Patent</td></tr>";
			echo "<tr><td style = 'padding:10px;'>";
			
			$file = str_replace("www" , "dl" , $file);
			
			$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
			
			$filename = truncateFilename(getNameFromFile($file));
			
			if (!isset($_SESSION['qcs-isconnect']))
			{
				$file = "/member-area-index";
			}
			
			echo "<a href = '" . $file . "'>" . $filename . "</a><br/>\n";
			
			echo "</tr></td>";
			
		}
		
		// CERTIFICATION
		/////////////////////////////////////////////////////////////
		
		$file = rwmb_meta('PRODUCT_document_center_certification' , '' , $post->ID);
		
		if(!empty($file))
		{
			
			echo "<tr><td class = 'title' style = 'padding:10px;'>Certification</td></tr>";
			echo "<tr><td style = 'padding:10px;'>";
			
			$file = str_replace("www" , "dl" , $file);
			
			$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
			
			$filename = truncateFilename(getNameFromFile($file));
			
			if (!isset($_SESSION['qcs-isconnect']))
			{
				$file = "/member-area-index";
			}
			
			echo "<a href = '" . $file . "'>" . $filename . "</a><br/>\n";
			
			echo "</tr></td>";
			
		}
		
		// PDF
		/////////////////////////////////////////////////////////////
		
		$file = rwmb_meta( 'PRODUCT_pdf_file', '' , $post->ID);
		
		if(!empty($file))
		{
				
			echo "<tr><td class = 'title' style = 'padding:10px;'>Product sheet</td></tr>";
			echo "<tr><td style = 'padding:10px;'>";
				
			$file = str_replace("www" , "dl" , $file);
			
			$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
			
			$filename = truncateFilename(getNameFromFile($file));
			
			if (!isset($_SESSION['qcs-isconnect']))
			{
				$file = "/member-area-index";
			}
			
			echo "<a href = '" . $file . "'>" . $filename . "</a><br/>\n";
				
			echo "</tr></td>";
				
		}
		

		echo "</table>";
								

		echo "</div>";

}

?>

</center>

<?php } ?> 

