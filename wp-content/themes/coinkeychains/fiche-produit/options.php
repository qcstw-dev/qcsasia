<?php 
						
							if($_REQUEST['sort'] != 'program')
							{
							 
								$imagesOptions = rwmb_meta( 'PRODUCT_tab_image_option', 'type=image&size=large' );
								 
								 $i = 0;
								 
								 if(count($imagesOptions) > 0)
								 {
								 	echo "<hr/>";
									echo "<div>";
									
									if($softEnamel)
										echo "<h2>Logo processes and materials</h2>";
									else
										echo "<h2>Options available</h2>";
										
									echo "<br/>";					
							    
		    						foreach ( $imagesOptions as $image )
		   							{
		   								$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);

		   								   							
		   								echo "<dl class = 'list-options' style = '" . $style . "'>";
		   								
		   									if($displayImageFinishes == '1')
		   							 			echo "<dt><a href='{$image['description']}' title='{$image['title']}' rel='thickbox' target = '_BLANK'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process'/></a></dt>";
		    								else
		    									echo "<dt><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process'/></dt>";
		    								
		   							 			echo "<dd>" . $image['title'] . "</dd>";
		   							 			
										echo "</dl>";
										
										$i++;
		   							}
		   						
		   							echo "</div>";
		   							
								 }
								 
							}
	    
?>