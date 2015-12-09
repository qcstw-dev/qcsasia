<?php 	
/**
 * Template Name: Supplier Program
 * The template for supplier program
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
		</div><br/>
			

<?php 

	$tabSupplierProgram = array('ODD' , 'OD' , 'LR' , 'PP');

	$meta_query[] = array( 'key' => 'PRODUCT_supplier_program', 'value' => $tabSupplierProgram , 'compare' => 'IN' );

	$args = array('meta_query' => $meta_query , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 250,'order' => 'ASC','orderby'=> 'menu_order','paged'=>$paged ,  'post_parent' => 0);

	
		$products = new WP_Query( $args );

		if ($products->have_posts()) :

 			while ($products->have_posts()) : $products->the_post(); 
 			
				include("product-row.php");
 			
			endwhile; 

 		 endif;

?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>