<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */

get_header(); ?>

	
		
			<?php $productPage = "a"; while ( have_posts() ) : the_post(); ?>
			
			<?php 
			
				$template = rwmb_meta( 'PRODUCT_template');
					
			//	echo "template = " . $template;

	/*
				if($template == 0)
				{
					
					echo '<div id="primary" class="site-content fiche-produit-simple">';
					echo '	<div id="content" role="main" class = "product">';
					
						require_once("fiche-produit-simple.php");
					
					echo '	</div><!-- #content -->';
					echo '	</div><!-- #primary -->';
					
					get_sidebar();
				 //	require_once("sidebar-product.php");
				}
				else*/
				{
					echo '<div id="primary" class="site-content fiche-produit-complique" style = "float:left;padding-right:0px;margin-right:0px;">';
					echo '	<div id="content" role="main" class = "product">';
					
						require_once("fiche-produit-complique.php");
					
					echo '	</div><!-- #content -->';
					echo '	</div><!-- #primary -->';
					
					get_sidebar('product');
				//	require_once("sidebar-product.php");
				}
					
			?>

			<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>