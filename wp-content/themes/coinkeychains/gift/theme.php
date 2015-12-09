
       
<?php

	echo "<hr/>";
	echo "<div>";
		
	echo "<h2>Themes available</h2>";
		
	echo "<br/>";
	

	$connected = new WP_Query(array('order' => 'ASC' , 'posts_per_page' => 2500 , 'orderby' => 'menu_order' , 'connected_type' => 'theme_to_gift', 'connected_items' => get_queried_object()) );
	
	$i = 0;
	
	if ( $connected->have_posts() )
	{
		

		while ( $connected->have_posts() ) : $connected->the_post();
		
			/////////////////////////////////////////////////////////////////////////////////////////////
			
		
			$numImage = $i + 1;
			
			$images = rwmb_meta( 'GIFT_theme_image_' . $numImage, 'type=image&size=large' , $idProduct);
			
			$link = rwmb_meta( 'GIFT_theme_link_' . ($i + 1) , '' , $idProduct);
			
				
			if(count($images) > 0)
			{
				
				echo "<div class='jcarousel-wrapper' style = 'width:220px;float:left;'>\n";

				echo "<div class = 'jcarousel'>\n";
				
				echo "<ul>\n";

				foreach ( $images as $image )
				{
						
					echo "<li>\n";
						
					echo "<dl class = 'list-options' style = 'height:200px;'>";
						
					echo "<dt><a href = '" . $link . "'><img src='{$image['url']}' width='200' height='200' alt='{$image['alt']}' class = 'product_image_logo_process'/> </a></dt>";
					
					// " . $image['title'] . "
					
					echo "<dd style = 'margin-top:15px;'></dd>";
					
					echo "</dl>";
					
					echo "</li>\n";
			
				}
				
				echo "</ul>\n";
				echo "</div>\n";
				
				echo "<a href='#' class='jcarousel-control-prev' style = 'float:left;margin-left:40px;'>&lsaquo;</a>";
				echo  "<p style = 'text-align:center;float:left;line-height:30px;font-weight:bold;margin:0px;width:80px;'>" . get_the_title() . "</p>";
				echo "<a href='#' class='jcarousel-control-next' style = 'float:right;margin-right:40px;'>&rsaquo;</a>";

				echo "</div>\n";
			
			}
					
			$i++;
			
			/////////////////////////////////////////////////////////////////////////////////////////////
	
		endwhile;
	
		
	}

	echo "</div>";
	
?>