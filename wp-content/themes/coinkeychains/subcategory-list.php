<?php
/**
 * Template Name: subcategory-list
 * The template for displaying products.
 *
 */

get_header(); ?>



	<div id="primary" class="site-content" >
		<div id="content" role="main">category-list
		
<!-- LISTE DES CATEGORIES PRODUITS ############################################################### -->

<?php

		echo "<div class='entry-content' style = 'text-align:justify';>\n";
		
		// AFFICHE CONTENT DE LA PAGE QUI UTILISE CATEGORY-LIST EN TANT QUE TEMPLATE
 		///////////////////////////////////////////////////////////////////////////////////////
 			
		if ( have_posts() ) : while ( have_posts() ) : the_post();
   			the_content();
		endwhile; endif;
		
		echo "</div><br/>\n";
		
		// LISTE DES CATEGORIES (LIGNES) DE PRODUITS
		///////////////////////////////////////////////////////////////////////////////////////
		
		// http://wordpress.org/support/topic/list-of-terms-with-images
		$tabTerm  = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'productcat' , 'parent' => 1) );

		foreach($tabTerm  as $term) 
		{
		
			// N'affiche que les parents
			if ($term->parent > 0) 
			{
				break;
			}
			
			echo "<div class = 'cartouche-categorie'>";
			
				// RECUPERE LES 4 PREMIERS PRODUITS DE LA CATEGORIE
				$args = array('post_type' => 'product','post_status' => 'publish','posts_per_page' => 4,'order' => 'ASC','orderby'=> 'menu_order','paged'=>$paged ,  'post_parent' => 0 ,   'tax_query' => array(
			        array(
			            'taxonomy' => 'productcat',
			            'field' => 'slug',
			            'terms' => $term->slug)
			        ));
			        
			    $products = new WP_Query( $args );
			    
			    query_posts('product_new=1');
			    
			    if ($products->have_posts()) :
			    
			    	if($products->post_count > 1)
			    	{
			    		echo "<a class = 'lienThumbnailCategory-4' href = '" . get_term_link($term , "productcat") . "'>";
			    		$i = 0;
			    
	 					while ($products->have_posts()) : $products->the_post(); 
	 					
	 					
	 						if($i == 2)
	 							echo get_the_post_thumbnail($post->ID , array(75,75) , array('class' => 'imagecategoryclear'));	
	 						else
	 							echo get_the_post_thumbnail($post->ID , array(75,75) , array('class' => 'imagecategoryfloat'));	
	 			
	 						
	 						$i++;
	 					
	 					endwhile; 
	 					
	 					echo "</a>";
	 					
			    	}
			    	else
			    	{
			    		echo "<a class = 'lienThumbnailCategory-1' href = '" . get_term_link($term , "productcat") . "'>" . wp_get_attachment_image( $term->image_id , "full") . "</a>";
			    		
			    	}
 					
 				 endif;
 				 
        		/////////////////////////
	    					
 					echo "<br/><br/>";
 					
 					echo  "<center><h2>" . $term->name . "</h2></center>";
 					
 					echo "";
 					
 					echo "<p style = 'margin-left:200px'>";
 					echo nl2br($term->description);
 					echo "</p>";
 					
 					/*
 					$tab =  explode("\n" , $term->description);
 					
 					echo "<b>N° of products line :</b> " . $tab[0];
 					
 					echo "<br/><br/>";
 					
 					echo "<b>Specificity :</b> " . $tab[1];
 					*/

 			echo "</div>";

			
	  	}
	  	
	
?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php get_footer(); ?>