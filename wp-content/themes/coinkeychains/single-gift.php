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

			<?php while ( have_posts() ) : the_post(); ?>
			
			<?php 
					
				echo '<div id="primary" class="site-content fiche-produit-complique" style = "float:left;padding-right:0px;margin-right:0px;">';
				echo '	<div id="content" role="main" class = "product">';
				
				require_once("gift/fiche-gift.php");
				
				echo '	</div><!-- #content -->';
				echo '	</div><!-- #primary -->';
				
				get_sidebar('gift');
					
			?>

			<?php endwhile; // end of the loop. ?>

<?php // get_sidebar('product'); ?>
<?php get_footer(); ?>