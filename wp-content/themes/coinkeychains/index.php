<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress 
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */

// LOGOUT
////////////////////////////////////////////////////////

	if($_REQUEST['logout'] == '1')
	{
		$_SESSION['qcs-isconnect'] = "";
		unset($_SESSION['qcs-isconnect']);
		
		unset($_COOKIE['loginQCS']);
		setcookie('loginQCS', null, -1, '/');
		setcookie('qcs-type', null, -1, '/');
	}
	

// LAST HIT (ONLY FOR MEMBERS)
////////////////////////////////////////////////////////

	if($_SESSION['qcs-isconnect'])
	{
		global $wpdb;
	
		$sqlQuery = "UPDATE qcs_members SET last_hit = '" . time()  . "' WHERE email = '" . $_SESSION['email-login'] . "'";
		// echo "sqlQuery = " . $sqlQuery . "<br/>";
		$wpdb->query($sqlQuery);
	}
	
	

////////////////////////////////////////////////////////
//echo $_SERVER['REMOTE_ADDR'];
//if (!isset($_SESSION['country']) || !$_SESSION['country']) {
////    test china
////    $url = "http://freegeoip.net/json/113.100.99.221";
//    $url = "http://freegeoip.net/json/" . $_SERVER['REMOTE_ADDR'];
//
//    set_time_limit(10);
//
//    $data = file_get_contents($url);
//
//    $obj = json_decode($data);
//
//    if (isset($obj->country_code) && $obj->country_code) {
//        $_SESSION['country'] = $obj->country_code;
//    } else {
//        $_SESSION['country'] = '';
//    }
//}
//echo  $_SESSION['country'];
//if (in_array($_SESSION['country'], ['CN', 'KR', 'KP', 'TR', 'IN'])) {
//    echo 'This website is not available in your country';
//    exit;
//}
	
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
		<!-- 
		<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Promotional soft PVC rubber keychain china factory</h1>
		<hr style = ""/>
		 -->
		 <?php // do_action('slideshow_deploy', '118'); ?>
		
		<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Our promotional products lines</h1>
		<hr style = "margin:10px;"/>
<?php

		// LISTE DES CATEGORIES (LIGNES) DE PRODUITS
		///////////////////////////////////////////////////////////////////////////////////////
		
		
		
		// http://wordpress.org/support/topic/list-of-terms-with-images
		$tabTerm  = apply_filters( 'taxonomy-images-get-terms', '', array('taxonomy' => 'productcat') );

		foreach($tabTerm  as $term) 
		{
				
			// N'affiche que les parents
			if ($term->parent > 0) 
			{
				continue;
			}
			
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
			    
			    query_posts('product_new=1');
			    
			//    if ($products->have_posts()) :
			    
			    	echo "<div class = 'cartouche-categorie-home-wrapper'>";
			    	
					echo "	<div class = 'cartouche-categorie-home'>";
					
					if($term->term_id == '12')
			    		echo "<a class = 'lienThumbnailCategory-4' href = '?page_id=5614'>";
			    	else
			    		echo "<a class = 'lienThumbnailCategory-4' href = '/products/?idSelectedLigne=" . $term->term_id . "'>";
			    
			    //	if($products->post_count > 1)
			    	{
			    	//	echo "<a  class = 'lienThumbnailCategory-home-4' href = '" . get_term_link($term , "productcat") . "'>";
			    		$i = 0;
			    
	 					while($i < 4)
	 					{
	 					
			    			if($i == 2)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon2'])); 
	 							echo "<img src = '" . $img[0]. "' class = 'imagecategoryclear thumbnail-3'  />";
	 							//echo get_the_post_thumbnail($post->ID , array(75,75) , array('class' => 'imagecategoryclear'));	
	 						}
	 						if($i == 0)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon1']));
	 							echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat thumbnail-1'  />";
	 							//echo get_the_post_thumbnail($post->ID , array(75,75) , array('class' => 'imagecategoryfloat'));	
	 						}
			    			if($i == 1)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon3']));
	 							echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat thumbnail-2'  />";
	 							//echo get_the_post_thumbnail($post->ID , array(75,75) , array('class' => 'imagecategoryfloat'));	
	 						}
			    			if($i == 3)
	 						{
	 							$img = wp_get_attachment_image_src(esc_attr($term_meta['custom_term_meta_icon4']));
	 							echo "<img src = '" . $img[0] . "' class = 'imagecategoryfloat thumbnail-4'  />";
	 							//echo get_the_post_thumbnail($post->ID , array(75,75) , array('class' => 'imagecategoryfloat'));	
	 						}
	 			
	 						
	 						$i++;
	 					
	 					} 
	 					
	 					echo "</a>";
	 					
			    	}
			    	/*
			    	else // SI QUE UN SEUL PRODUIT DANS LA CATEGORIE
			    	{
			    		echo "<a class = 'lienThumbnailCategory-home-1' href = '" . get_term_link($term , "productcat") . "'>" . wp_get_attachment_image( $term->image_id , "full") . "</a>";
			    		
			    	}*/
			    	
			    	echo "	</div>";
			    	
 					echo  "<center><h2>" . $term->name . "</h2></center>";
 					
 					echo "</div>";
 					
 			//	 endif;
 				 
        		/////////////////////////

 			
 		
	  	}
	  	
	  	?>


<div class="cartouche-categorie-home-wrapper">	<div class="cartouche-categorie-home"><a class="lienThumbnailCategory-4" href="http://www.qcsasia.com/products/?idSelectedLigne=13"><img src="http://www.qcsasia.com/wp-content/uploads/2014/03/KEYCHAINLICENCEPACKAGE2.jpg" class="imagecategoryfloat thumbnail-1"><img src="http://www.qcsasia.com/wp-content/uploads/2014/03/LUGGAGETAGLICENCE3.jpg" class="imagecategoryfloat thumbnail-2"><img src="http://www.qcsasia.com/wp-content/uploads/2014/03/KEYCHAINLICENCEPACKAGE.jpg" class="imagecategoryclear thumbnail-3"><img src="http://www.qcsasia.com/wp-content/uploads/2014/03/MAGNETLICENCE3.jpg" class="imagecategoryfloat thumbnail-4"></a>	</div><center><h2>Licence and patent exploitation</h2></center></div>

	<hr/>
		
<!-- LISTE DES PRODUITS ############################################################### -->

<?php /*	$args = array('post_type' => 'product','post_status' => 'publish','posts_per_page' => 25,'order' => 'ASC','orderby'=> 'title','paged'=>$paged ,  'post_parent' => 0);?>

<?php // LIGNE DES TITRES
	
		$products = new WP_Query( $args );

		if ($products->have_posts()) :
 			while ($products->have_posts()) : $products->the_post(); 
 				
 			echo "<dl class = 'list-product'>";
 				echo "<dt><a href = '" . get_permalink($post->ID) . "'>" . get_the_post_thumbnail() . "</a></dt>";
 				echo "<dd>" . $post->post_title . "</dd>";
 			echo "</dl>";
 			
 			echo "<dl class = 'list-product'>";
 				echo "<dt><a href = '" . get_permalink($post->ID) . "'>" . get_the_post_thumbnail() . "</a></dt>";
 				echo "<dd>" . $post->post_title . "</dd>";
 			echo "</dl>";
 			
 			echo "<dl class = 'list-product'>";
 				echo "<dt><a href = '" . get_permalink($post->ID) . "'>" . get_the_post_thumbnail() . "</a></dt>";
 				echo "<dd>" . $post->post_title . "</dd>";
 			echo "</dl>";
 			
 			echo "<dl class = 'list-product'>";
 				echo "<dt><a href = '" . get_permalink($post->ID) . "'>" . get_the_post_thumbnail() . "</a></dt>";
 				echo "<dd>" . $post->post_title . "</dd>";
 			echo "</dl>";
 				
			endwhile; 

 		 endif;*/
?>

<br style = "clear:both"/><br/>

<!-- LISTE DES NEWS ############################################################### -->

		<?php
		
		global $paged;

		$query = new WP_Query(array('post_type' => 'post' , 'paged' => $paged));

		
		if ($query->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ($query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile;  ?>
		
		<?php endif; // end have_posts() check ?>
		
		<?php

		// next_posts_link() usage with max_num_pages
		echo "<p style = 'display:inline;text-align:left;margin:0px;'>";
		previous_posts_link( 'Newer post' );
		echo "</p>";
		
		echo "<p style = 'float:right;margin:0px;'>";
		next_posts_link( 'Older post', $the_query->max_num_pages );
		echo "</p>";
		
		// clean up after the query and pagination
		wp_reset_postdata();

		?>

<?php 

?>

		<?php // if(function_exists('tw_pagination')) tw_pagination(); ?>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>