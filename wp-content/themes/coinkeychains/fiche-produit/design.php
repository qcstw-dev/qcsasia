<?php 

	
	// ONLY USE TO KNOW IF WE DISPLAY TITLE
	$images = rwmb_meta( 'PRODUCT_theme_image_1', 'type=image&size=large' );
						 
	if(count($images) > 0)
	{
		echo "<hr/>";
		echo "<div>";
							
		echo "<h2>Design</h2>";
								
		echo "<br/>";

		
		for($i = 1; $i < 6 ; $i++)
		{
			
			$images = rwmb_meta( 'PRODUCT_theme_image_' . $i, 'type=image&size=large' );
			
			$image = $images[0];
   								   							
			echo "<dl class = 'list-options' style = '" . $style . "'>";
   								
			echo "<dt><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process'/></dt>";
    								
			echo "<dd>" . $image['title'] . "</dd>";
   							 			
			echo "</dl>";
								
			$i++;
		}
   						
		echo "</div>";
   							
	}
								 

?>