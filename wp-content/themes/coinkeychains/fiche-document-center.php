<?php 	
/**
 * Template Name: Fiche Document Center
 * The template for Fiche Document Center
 *
 */

if (empty($_SESSION['qcs-isconnect']))
{
 	header('Location:http://www.qcsasia.com/?page_id=679');
    exit();
}

$product = get_post($_REQUEST['idProduct']);


	function getNameFromFile($file)
	{
		$tab = explode("/" , $file);
									
		$name =  str_replace("%20" , " " , $tab[count($tab) - 1]);
											
		$name =  str_replace("?m=" , " " , $name);
		
		$name= str_replace("?dl=0" , "" , $name);
		
		$name =  urldecode($name);
		
		if(!empty($name))
			$name = truncateFilename($name);
		
		return $name;
	}
	
	function truncateFilename($filename)
	{
		$tab = explode("." , $filename);
	
		$extension = $tab[count($tab) - 1];
	
		if(strlen($filename) > 40)
		{
			$filename = substr($filename , 0  , 39 ) . '...';
			$filename = $filename . "." . $extension;
		}
			
		$filename = str_replace("?dl=0" , "" , $filename);
			
		return $filename;
	}
	
	function getCSS($name)
	{
		if(strpos($name , ".zip") > 0)
			return "font-weight:bold;";
		else
			echo "";
	}

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
			<div class='entry-content' style = 'text-align:justify';>
		
				<article>
				
                                    <div style="margin-bottom: 20px">
					<?php 
						
						// FIRST IMAGE
						// $images = rwmb_meta( 'PRODUCT_first_image', 'type=image&size=large' , $product->ID);
						
						// Recupere la premeire image du premier logo process associe au produit
						$images = rwmb_meta( "PRODUCT_tab_image_process_1", 'type=image&size=large' , $product->ID);
						
						foreach ( $images as $image )
						{
							echo "<img style = 'float:left;width:150px;margin:0px;vertical-align:middle;' src='{$image['url']}' alt='{$image['alt']}' class = 'attachment-post-thumbnail wp-post-image'/>";
						}
						
						// TITRE
						echo "<h2 style = 'display:inline-block;margin-top:40px;text-align:center;width:360px;'>" . get_the_title($product->ID) . "</h2>";
						
						// IMAGE SITUATION
						$images = rwmb_meta( 'PRODUCT_image_situation', 'type=image&size=large' , $product->ID);
						
						foreach ( $images as $image )
						{
							echo "<img style = 'width:150px;margin:0px;float:right;vertical-align:middle;' src='{$image['url']}' alt='{$image['alt']}' class = 'attachment-post-thumbnail wp-post-image'/>";
						}
					
					?>
                                            <div style="clear:both"></div>
					</div>
	
					<table id = "table-document-center">
						<tr>
							<td class = "title">Picture high definition</td>
							<td class = "title">Price lists</td>
						</tr>
						
						<tr>
							<td rowspan = "9">
								<?php 
								
									for($i = 1 ; $i < 21 ; $i++)
									{
									
										$file = rwmb_meta('PRODUCT_document_center_picture_high_definition_' .$i, '' , $product->ID);
										
										$file = str_replace("www" , "dl" , $file);
							    
										$filename = getNameFromFile($file);
										
										$css = "";
										
										if(strpos($filename , ".zip") > 0)
											 $css = "font-weight:bold;";
										
										$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
										
									    echo "<a href = '" . $file . "' style = '" . $css . "'>" . $filename . "</a><br/>\n";
									    
									}
								
								?>
							</td>
							<td>
								<?php 
								
									$file = "";
	
									// echo "type = " . $_SESSION['qcs-type'];
									
									if($_SESSION['qcs-type'] == 'supplier')
										$file = rwmb_meta('PRODUCT_document_center_suppliers_file' , '' , $product->ID);
									else
										$file = rwmb_meta('PRODUCT_document_center_distributors_file' , '' , $product->ID);
									
									$file = str_replace("www" , "dl" , $file);
									
									$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
						    
								    echo "<a href = '" .  $file . "'>" . getNameFromFile($file) . "</a><br/>\n";
								    
								    $file = rwmb_meta('PRODUCT_document_center_suppliers_file_2' , '' , $product->ID);
								    
								    if(!empty($file))
								    {
								    	
									    $file = str_replace("www" , "dl" , $file);
									    	
									    $url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
									    
									    echo "<a href = '" .  $file . "'>" . getNameFromFile($file) . "</a><br/>\n";
									    
								    }
								
								?>
							</td>
						</tr>
						
						<tr>
							<td class = "title">Digital Drawing</td>
						</tr>
						
						<tr>
							<td>
								<?php 

									$file = rwmb_meta('PRODUCT_document_center_digital_drawing', '' , $product->ID);
						    
									$file = str_replace("www" , "dl" , $file);
									
									
								   	$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
						    
								    echo "<a href = '" .  $file  . "'>" . getNameFromFile($file) . "</a><br/>\n";;
								
								?>
							</td>
						</tr>
						
						<tr>
							<td class = "title">Logo standard</td>
						</tr>
						
						<tr>
							<td>
								<?php 

									$file = rwmb_meta('PRODUCT_document_center_logo_standard', '' , $product->ID);
									
									$file = str_replace("www" , "dl" , $file);
						    
								    $url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
						    
								    echo "<a href = '" .  $file . "'>" . getNameFromFile($file) . "</a><br/>\n";

								?>
							</td>
						</tr>
						
						<tr>
							<td class = "title">Patent</td>
						</tr>
						
						<tr>
							<td>
								<?php 

									$file = rwmb_meta('PRODUCT_document_center_patent' , '' , $product->ID);
									
									$file = str_replace("www" , "dl" , $file);
						    
								    $url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
						    
								    echo "<a href = '" .  $file . "'>" . getNameFromFile($file) . "</a><br/>\n";
								
								?>
							</td>
						</tr>
						
						<tr>
							<td class = "title">Certification</td>
						</tr>
						
						<tr>
							<td>
								<?php 

									$file = rwmb_meta('PRODUCT_document_center_certification', '' , $product->ID);
									
									$file = str_replace("www" , "dl" , $file);
						    
								    $url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
						    
								    echo "<a href = '" .  $file . "'>" . getNameFromFile($file) . "</a><br/>\n";

								?>
							</td>
						</tr>
						
						<tr>
							<td class = "title">Other documents</td>
							<td class = "title">Product page</td>
						</tr>
						
						<tr>
							<td>
								<?php 

									$file = rwmb_meta('PRODUCT_document_center_other_documents', '' , $product->ID);
									
									$file = str_replace("www" , "dl" , $file);
						    
								    $url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
						    
								    echo "<a href = '" .  $file . "'>" . getNameFromFile($file) . "</a><br/>\n";
								
								?>
							</td>
							<td>
							<?php 
								
								$file = rwmb_meta( 'PRODUCT_pdf_file', '' , $product->ID);
								
								$file = str_replace("www" , "dl" , $file);
						    
								$url = "http://www.qcsasia.com/qcs-admin/action/downloadFile.php?link=" . $file;
						    
								echo "<a href = '" .  $file . "'>" . getNameFromFile($file) . "</a><br/>\n";
								
							?>
							</td>
							
						</tr>
					
					</table>
					
					<p  style = "text-align:center;">
					
						
						<a style = "color:blue;font-size:18px;margin-right:10px;" href = "javascript:history.go(-1)"><img src = "<?php echo esc_url( home_url( '/' ) ); ?>colors/images/left_arrow.jpg" style = 'vertical-align:middle;'/></a>
							&nbsp;
						<a style = "color:blue;font-size:18px;margin-right:10px;" href = "javascript:history.go(-1)">Back to document center</a>
						
						
						<a style = "color:blue;font-size:18px;margin-right:10px;" href = "<?php echo get_post_permalink($product->ID); ?>">To the product page</a>
							&nbsp;
						<a style = "color:blue;font-size:18px" href = "<?php echo get_post_permalink($product->ID); ?>"><img src = "<?php echo esc_url( home_url( '/' ) ); ?>colors/images/right_arrow.jpg" style = 'vertical-align:middle;'/></a>
							
			
					</p>
					
				</article>
				
				
				
			</div>

		</div><!-- #content -->

</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>