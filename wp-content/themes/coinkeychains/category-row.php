<?php 


if(!isset($idCategory) || empty($idCategory))
	$idCategory = $idCategory1;


if(!isset($linkCategory) || empty($linkCategory))
	$linkCategory = $linkCategory1;


if(!isset($idCategory) || empty($idCategory))
	$idCategory = $idCategory2;


if(!isset($linkCategory) || empty($linkCategory))
	$linkCategory = $linkCategory2;


$term  = get_term($idCategory , 'productcat');


echo "<div class = 'cartouche-categorie'>";
			
			$t_id = $term->term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			
				// RECUPERE LES 4 PREMIERS PRODUITS DE LA CATEGORIE
				$args = array('post_type' => 'product','post_status' => 'publish','posts_per_page' => 4,'order' => 'ASC','orderby'=> 'menu_order','paged'=>$paged ,  'post_parent' => 0 ,   'tax_query' => array(
			        array(
			            'taxonomy' => 'productcat',
			            'field' => 'slug',
			            'terms' => $term->slug)
			        ));
			        
			    $products = new WP_Query( $args );
			    
		//	    query_posts('product_new=1');
			    
		//	    if ($products->have_posts()) :
			    
		//	    	if($products->post_count > 1)
			    	{
			    		echo "<a class = 'lienThumbnailCategory-4' href = '" . $linkCategory . "'>";
			    		$i = 0;
			    
	 				//	while ($products->have_posts()) : $products->the_post(); 
	 					
	 					
	 					while($i < 4)
	 					{
	 					
	 						if($i == 2)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon2'])); 
	 							
	 							if(!empty($img[0]))
	 								echo "<img src = '" . $img[0] . "' class = 'imagecategoryclear'  />";
	 							else
	 								echo "<img src = '" . get_bloginfo('url') . "/colors/blank-90.jpg" . "' class = 'imagecategoryclear'  />";	
	 						}
	 						if($i == 0)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon1']));

	 							if(!empty($img[0]))
	 								echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat'  />";
	 							else
	 								echo "<img src = '" . get_bloginfo('url') . "/colors/blank-90.jpg" . "' class = 'imagecategoryfloat'  />";
	 						}
			    			if($i == 1)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon3']));
	 							
	 							if(!empty($img[0]))
	 								echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat'  />";
	 							else
	 								echo "<img src = '" . get_bloginfo('url') . "/colors/blank-90.jpg" . "' class = 'imagecategoryfloat'  />";
	 								
	 						}
			    			if($i == 3)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon4']));
	 							
	 							if(!empty($img[0]))
	 								echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat'  />";
	 							else
	 								echo "<img src = '" . get_bloginfo('url') . "/colors/blank-90.jpg" . "' class = 'imagecategoryfloat'  />";
	 						}
	 			
	 						
	 						$i++;
	 					
	 					} 
	 			
	 						
	 						$i++;
	 					
	 				//	endwhile; 
	 					
	 					echo "</a>";
	 					
			    	}
		/*	    	else
			    	{
			    		echo "<a class = 'lienThumbnailCategory-1' href = '" . get_term_link($term , "productcat") . "'>" . wp_get_attachment_image( $term->image_id , "full") . "</a>";
			    		
			    	}
 			*/		
 		//		 endif;
 				 
        		/////////////////////////
	    					
 					echo "<br/>";
 					
 					echo  "<center><h2>" . $term->name . "</h2></center>";
 					
 					echo "";
 					
 					echo "<p style = 'margin-left:200px;'>";
 					echo nl2br($term->description);
 					echo "</p>";
 					
 					/*
 					$tab =  explode("\n" , $term->description);
 					
 					echo "<b>N° of products line :</b> " . $tab[0];
 					
 					echo "<br/><br/>";
 					
 					echo "<b>Specificity :</b> " . $tab[1];
 					*/

 			echo "</div>";

?>