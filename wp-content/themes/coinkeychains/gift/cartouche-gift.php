<?php
		

$images = array();
$links = array();
$titles = array();

	// RECUPERE LES TITRES DES THEMES
	////////////////////////////////////////

	$connected = new WP_Query(array( 'posts_per_page' => 2500 , 'order' => 'ASC' , 'orderby' => 'menu_order' , 'connected_type' => 'theme_to_gift', 'connected_items' => get_queried_object()) );
	
	$i = 0;


	while ( $connected->have_posts() ) : $connected->the_post();
		$titles[] = get_the_title();
	endwhile;
	
	wp_reset_query();
	
	////////////////////////////////////////
	
		$images = rwmb_meta( 'GIFT_first_image', 'type=image&size=large' );
						
		$linkFirstImages = rwmb_meta( 'GIFT_link_first_image', 'type=image&size=large');
		
	
		

		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_1', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_1');
			$images[] = $image;
		}
		
		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_2', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_2');
			$images[] = $image;
		}
		
		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_3', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_3');
			$images[] = $image;
		}
		
		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_4', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_4');
			$images[] = $image;
		}
		
		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_5', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_5');
			$images[] = $image;
		}
		
		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_6', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_6');
			$images[] = $image;
		}
		
		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_7', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_7');
			$images[] = $image;
		}
		
		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_8', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_8');
			$images[] = $image;
		}
		
		$image = reset(rwmb_meta( 'GIFT_theme_image_principale_9', 'type=image&size=large'));
		if($image)
		{
			$links[] = rwmb_meta( 'GIFT_theme_link_9');
			$images[] = $image;
		}


		if(count($images) > 0)
		{
		
			echo "<div class='jcarousel-wrapper' style = 'width:300px;height:350px;float:left;'>\n";
		
			echo "<div class = 'jcarousel'>\n";
		
			echo "<ul>\n";
			
			$i = 0;
	    
			foreach ( $images as $image )
			{
		   		
				echo "<li>\n";
				
				echo "<dl style = 'height:300px'>";
				
				echo "<dt><a target = '_BLANK' href = '{$links[$i]}'> <img src='{$image['url']}' alt='{$image['alt']}' class = 'attachment-post-thumbnail wp-post-image' style = 'margin-right:0px;'/></a></dt>";
		
				echo "</dl>";
				
				echo "<dd style = 'margin-top:15px;margin-left:30px;text-align:center;font-weight:bold;font-size:18px;'>" . $titles[$i] . "</dd>";
					
				echo "</li>\n";
				
				$i++;
				
			}
			
			echo "</ul>\n";
			echo "</div>\n";
			
			echo "<a href='#' class='jcarousel-control-prev' style = 'float:left;margin-left:30px;'>&lsaquo;</a>";
			echo  "<p style = 'text-align:center;float:left;line-height:30px;font-weight:bold;margin:0px;width:200px;'></p>";
			echo "<a href='#' class='jcarousel-control-next' style = 'float:right;margin-right:10px;'>&rsaquo;</a>";
			
			echo "</div>\n";
				
		}
			
	   						
?>
					
<?php 

	if(empty( $post->post_parent )) {  // SI PRODUIT PARENT ALORS AFFICHE SEULEMENT CONTENU SANS LES CHAMPS METABOX  ?>
						
		<p style = "float:right;">
			<?php the_content(); ?>
			<br/>
			<?php 

				$logoSize = rwmb_meta( 'GIFT_logo_size' );
				$itemSize = rwmb_meta( 'GIFT_item_size' );
				$packaging = rwmb_meta( 'GIFT_packaging' );
				$patent = rwmb_meta( 'GIFT_patent' );
				
				if(!empty($logoSize))
					echo "<b>Logo size :</b>" . $logoSize . "<br/>";
					
				if(!empty($itemSize))
					echo "<b>Item size :</b>" . $itemSize . "<br/>";
					
				if(!empty($packaging))
					echo "<b>Packaging :</b>" . $packaging . "<br/>";
					
				if(!empty($patent))
					echo "<b>Patent:</b>" . $patent . "<br/>";				

				?>
						
						
			<!-- COLORS ################################################################################### -->

			<?php   
						
				$template = rwmb_meta( 'GIFT_template');

			    $colors = rwmb_meta('GIFT_colors', 'type=checkbox_list' , $post->ID);
			    
			    if(count($colors) > 0)
			    {
			    	echo "<b>Colors available</b>";
					echo "<br/>";
					
					$colorLink = rwmb_meta( 'GIFT_color_link' );
					
					echo "<a href = '". $colorLink . "'>";
					
					$i = 0;
					
				    foreach($colors as $color)
				    {
				    	
				    	echo "<img src = '" . get_bloginfo('url') . "/colors/" . $color . ".png'/>";
				    	
				    	$i++;
				    }
				    
				    echo "</a>";
			
			    }

			} 
						
?>
						
</p>