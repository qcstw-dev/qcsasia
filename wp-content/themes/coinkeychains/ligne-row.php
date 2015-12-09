<?php 

	$term  = get_term($idLigne , 'productcat');

			
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

			    	{
                                    echo "<a class = 'lienThumbnailCategory-4' href = '" . $linkLigne . "'>";
                                        echo "<div class = 'cartouche-categorie'>";
			    		$i = 0;
			    
	 					while($i < 4)
	 					{
	 					
	 						if($i == 2)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon2'])); 
	 							echo "<img src = '" . $img[0]. "' class = 'imagecategoryclear'  />";
	 						}
	 						if($i == 0)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon1']));
	 							echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat'  />";
	 						}
			    			if($i == 1)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon3']));
	 							echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat'  />";
	 						}
			    			if($i == 3)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon4']));
	 							echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat'  />";
	 						}
	 			
	 						
	 						$i++;
	 					
	 					} 
	 					
 					echo "<br/>";
 					
 					echo  "<center><h2>" . $term->name . "</h2></center>";
 					
 					echo "";
 					
 					echo "<p style = 'padding-right: 10px;'>";
 					echo nl2br($term->description);
 					echo "</p>";

                            echo "</div>";
                        echo "</a>";
	 					
			    	}
	    					

 			
?>