<?php 	
/**
 * Template Name: Product List
 * The template for displaying products.
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">products.php
		
<!-- LISTE DES PRODUITS ############################################################### -->

<form action = "" method = "GET">

	New product only : <input type = "checkbox" name = "product_new" value = "1" />
	
	<br/>
	
	<br/>

	<input type = "submit" />

</form>


<?php 

	$meta_key = "PRODUCT_" . $_GET['key'];
	$meta_value = $_GET['value'];

	$args = array('meta_key' => $meta_key , 'meta_value' => $meta_value , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 25,'order' => 'ASC','orderby'=> 'menu_order','paged'=>$paged ,  'post_parent' => 0);
	
	//print_r($args);

	
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
 		 
 		 /*

		if ($products->have_posts()) :
 			while ($products->have_posts()) : $products->the_post(); 
 				
 			echo "<dl class = 'list-product'>";
 				echo "<dt><a href = '" . get_permalink($post->ID) . "'>" . get_the_post_thumbnail() . "</a></dt>";
 				echo "<dd>" . $post->post_title . "</dd>";
 			echo "</dl>";
 				
			endwhile; 

 		 endif;
 		 
 		 */
?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>