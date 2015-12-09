<?php

	echo "<hr/>";
	echo "<div>";
		
	echo "<h2>Display options</h2>";
		
	echo "<br/>";

	$connected = new WP_Query(array('order' => 'ASC' , 'orderby' => 'menu_order' , 'connected_type' => 'display_to_gift', 'connected_items' => get_queried_object() , 'orderby' => 'GIFT_theme_sort') );
	
	$i = 0;
	
	if ( $connected->have_posts() )
	{
	
		while ( $connected->have_posts() ) : $connected->the_post();
		
			/////////////////////////////////////////////////////////////////////////////////////////////
		
			$numImage = $i + 1;
			
			$images = rwmb_meta( 'GIFT_image_display_' . $numImage, 'type=image&size=large' , $idProduct);
			
			echo "<div class = 'cartouche-categorie' style = 'min-height:240px'> ";

			if(count($images) > 0)
			{
				
				echo "<div class='jcarousel-wrapper' style = 'width:220px;float:left;'>\n";
				
				echo "<div class = 'jcarousel' style = 'height:200px'>\n";
				
				echo "<ul>\n";

				foreach ( $images as $image )
				{
					
					echo "<li>\n";
					
					echo "<dl class = 'list-options' style = 'border-style:none;height:200px;'>";
					
					echo "<dt><img src='{$image['url']}' width='200' height='200' alt='{$image['alt']}' class = 'product_image_logo_process'/></dt>";
						
					echo "<dd style = 'margin-top:15px;'></dd>";
						
					echo "</dl>";
						
					echo "</li>\n";
			
				}
				
				echo "</ul>\n";
				echo "</div>\n";
				
				
				// " . $image['title'] . "
				echo "<a href='#' class='jcarousel-control-prev' style = 'float:left;margin-left:10px;'>&lsaquo;</a>";
				echo  "<p style = 'text-align:center;float:left;line-height:30px;font-weight:bold;margin:0px;width:120px;'></p>";
				echo "<a href='#' class='jcarousel-control-next' style = 'float:right;margin-right:30px;'>&rsaquo;</a>";
				
				echo "</div>\n";
			
			}
			
			
			echo  "<center><h2>" . get_the_title() . "</h2></center>";
				
			echo "<br/>";
				
			echo get_the_content();
			
			echo "</div>";
					
			$i++;
			
			/////////////////////////////////////////////////////////////////////////////////////////////
	
		endwhile;
		
	}
	
	echo "</div>";
					 
?>