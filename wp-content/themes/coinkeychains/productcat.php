<?php
/**
 * Template Name: productcat
 * The template for displaying products.
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
<!-- LISTE DES PRODUITS ############################################################### -->



<?php // LIGNE DES TITRES
	

$args=array(
  'name' => 'productcat'
);
$output = 'objects'; // or objects
$taxonomies=get_taxonomies($args,$output); 
if  ($taxonomies) {
  foreach ($taxonomies  as $taxonomy ) {
    echo '<p>' . $taxonomy->name . '</p>';
  }
}  

?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>