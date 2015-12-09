<?php 	
/**
 * Template Name: Drop Document
 * The template for Drop Document
 *
 */

if (empty($_SESSION['qcs-isconnect']))
{
 	header('Location:http://www.qcsasia.com/?page_id=679');
    exit();
}


get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
		<div class='entry-content' style = 'text-align:justify';>
			<?php
			
			// AFFICHE CONTENT DE LA PAGE QUI UTILISE CATEGORY-LIST EN TANT QUE TEMPLATE
	 		///////////////////////////////////////////////////////////////////////////////////////
	 			
			if ( have_posts() ) : while ( have_posts() ) : the_post();
	   			the_content();
			endwhile; endif;
			
			 ?>
		</div>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>