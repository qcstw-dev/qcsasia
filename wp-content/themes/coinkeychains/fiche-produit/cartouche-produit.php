<?php
					
		$images = rwmb_meta( 'PRODUCT_first_image', 'type=image&size=large' );
						
		$linkFirstImages = rwmb_meta( 'PRODUCT_link_first_image', 'type=image&size=large');
		
		$linkFirstImages = reset($linkFirstImages);
	    
		foreach ( $images as $image )
		{

			$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);
			
		//	print_r($linkFirstImages);
			
		//	echo "linkFirstImage['url'] = " . $linkFirstImages['url'];
	   						
			if(empty($linkFirstImages['url']))
				echo "<a target = '_BLANK' href = '{$image['url']}'> <img src='{$image['url']}' alt='{$image['alt']}' class = 'attachment-post-thumbnail wp-post-image'/></a>";
			else
				echo "<a target = '_BLANK' href = '{$linkFirstImages['url']}'> <img src='{$image['url']}' alt='{$image['alt']}' class = 'attachment-post-thumbnail wp-post-image'/></a>";
	
		}
	   						
?>
					
<?php 

	if(empty( $post->post_parent )) {  // SI PRODUIT PARENT ALORS AFFICHE SEULEMENT CONTENU SANS LES CHAMPS METABOX  ?>
						
		<p style = "float:right;">
			<?php the_content(); ?>
			<br/>
			<?php 
								
				$template = rwmb_meta( 'PRODUCT_template');
									
				if($template == 1)
				{ 
				
					$logoSize = rwmb_meta( 'PRODUCT_logo_size' );
					$itemSize = rwmb_meta( 'PRODUCT_item_size' );
					$packaging = rwmb_meta( 'PRODUCT_packaging' );
					$patent = rwmb_meta( 'PRODUCT_patent' );
					
					if(!empty($logoSize))
						echo "<b>Logo size :</b>" . $logoSize . "<br/>";
						
					if(!empty($itemSize))
						echo "<b>Item size :</b>" . $itemSize . "<br/>";
						
					if(!empty($packaging))
						echo "<b>Packaging :</b>" . $packaging . "<br/>";
						
					if(!empty($patent))
						echo "<b>Patent:</b>" . $patent . "<br/>";				

				} 
				?>
						
						
			<!-- COLORS ################################################################################### -->

			<?php   
						
				$template = rwmb_meta( 'PRODUCT_template');
			
				if($template == 1)
				{
			
				    $colors = rwmb_meta('PRODUCT_colors', 'type=checkbox_list' , $post->ID);
				    
				    if(count($colors) > 0)
				    {
				    	echo "<b>Colors available</b>";
						echo "<br/>";
						
						$colorLink = rwmb_meta( 'PRODUCT_color_link' );
						
						echo "<a href = '". $colorLink . "'>";
						
						$i = 0;
						
					    foreach($colors as $color)
					    {
					    	
					    //	if($i == 7)
					    //		echo "<br/>";
					    	
					    	echo "<img src = '" . get_bloginfo('url') . "/colors/" . $color . ".png'/>";
					    	
					    	$i++;
					    }
					    
					    /*
					    
					    $files = rwmb_meta( 'PRODUCT_datasheet_file', 'type=file' , $post->ID);
					    
					    $linkToFile = "";
					    
					    foreach ( $files as $info )
					    {
					    	$linkToFile = $info['url'];
					    }*/
					    
					    echo "</a>";
				
				    }
				    
				}
				else 
				{
						if($displayImageFinishes == '1')
						{
							echo "<b>Finishes available :</b>";
							echo "<br/>";
							echo '<a href = "/qa-colors-finishes-metal/"><img src = "/wp-content/uploads/2014/03/finishes-bar-e1395739022202.jpg" /></a>';
						}
				}
			    
			} 
						
?>
						
</p>

<?php 
						
		$salesProgram = rwmb_meta('PRODUCT_sales_program', 'type=checkbox_list' , $post->ID);
							
		if(count($salesProgram) > 0)
			echo "<p style = 'clear:both;font-weight:bold;color:red'>* Item available in sales program</p>";
							
?>