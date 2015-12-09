<?php 	
/**
 * Template Name: New Product
 * The template for displaying new products.
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">template-new-product.php
		
<!-- LISTE DES PRODUITS ############################################################### -->

<?php 	

// 'meta_value' => 'PRODUCT_new=1',

$args = array('meta_key' => 'PRODUCT_new', 'meta_value' => '1'  , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 25,'order' => 'ASC','orderby'=> 'date','paged'=>$paged ,  'post_parent' => 0);?>


<?php
	
		$products = new WP_Query( $args );

		if ($products->have_posts()) :
 			while ($products->have_posts()) : $products->the_post(); 
 				
 			echo "<div class = 'cartouche-categorie'>";
	    	
 				echo "<a class = 'lienThumbnailCategory-1' href = '" . get_permalink($post->ID) . "'>" . get_the_post_thumbnail() . "</a>";
 				
 					echo "<br/>";
 					
 					$tab = get_post_meta($post->ID , "PRODUCT_name");
 				
 					$name = nl2br($tab[0]);
 					
 					echo  "<center><h2>" . $name . "</h2></center>";
 					
 					echo "<br/>";
 					
 					$tab = get_post_meta($post->ID , "description");
 				
 					$description = nl2br($tab[0]);
 					
 					echo $description;
 					
 					/*
 					$tab =  explode("\n" , $term->description);
 					
 					echo "<b>N° of products line :</b> " . $tab[0];
 					
 					echo "<br/><br/>";
 					
 					echo "<b>Specificity :</b> " . $tab[1];
 					*/

 			echo "</div>";
 			
 			// AFFICHAGE LISTE VIGNETTE
 			////////////////////////////////////////////////////////////////////
 			
 			// echo "<dl class = 'list-product'>";
 			
 			//	echo "<dt><a href = '" . get_permalink($post->ID) . "'>" . get_the_post_thumbnail() . "</a></dt>";
 			//	echo "<dd>" . $post->post_title . "</dd>";
 			//echo "</dl>";
			
			////////////////////////////////////////////////////////////////////
			
 			endwhile; 

 		 endif;
?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>