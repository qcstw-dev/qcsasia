<?php
/**
 * Template Name: category-list
 * The template for displaying products.
 *
 */

get_header(); ?>



	<div id="primary" class="site-content" >
		<div id="content" role="main">
		
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
		
$args = array('meta_key' => $meta_key , 'hide_empty'    => false , 'meta_value' => $meta_value , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 250,'order' => 'ASC','orderby'=> 'menu_order' ,'paged'=>$paged ,  'post_parent' => 0);
        
   
	////////////////////////////////////////////
	
	$tabProduct = array();
	
	$idCategory = "";
	
	$idSelectedLigne = $_REQUEST['idSelectedLigne'];
	$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
	$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
	
	$tabIdLigne = array();
	$tabIdCategory1 = array();
	$tabIdCategory2 = array();
	$tabProduct = array();
	
	////////////////////////////////////////////
   
	$products = new WP_Query( $args );
	
	if ($products->have_posts()) :
	
		while ($products->have_posts()) : $products->the_post();
		
			$tabProduct[] = $post;
		
		endwhile;
	
	endif;

?>


<?php // PRODUITS
	
	foreach($tabProduct as $product)
	{
			
		if(!empty($idSelectedCategory2))// SI AFFICHAGE PRODUIT
		{
			// RECUPERE LES CATEGORIES DU PRODUIT
			$tabCategory = wp_get_object_terms($product->ID , 'productcat');
			 
			// PARCOUR LES CATEGORIES DU PRODUIT
			foreach($tabCategory as $category)
			{
				// SI LA CATEOGRIE EST LA LIGNE SELECTIONNE
				if(($category->term_id > 0 && $category->term_id == $idSelectedCategory2) || $category->parent == $idSelectedCategory2)
				{
	
					// TEST SI PRODUIT PAS DEJA AFFICHE
					if(!in_array($product->ID , $tabIdProduit))
					{
						$tabIdProduit[] = $product->ID;
						//	echo "category1->term_id = " . $category1->term_id;
						include("product-row.php");
	
	
					}
	
				}
	
			}
		}
		else if(!empty($idSelectedCategory1)) // SI AFFICHAGE CATEGORY 2
		{
			// RECUPERE LES CATEGORIES DU PRODUIT
			$tabCategory = wp_get_object_terms($product->ID , 'productcat');
			

			
			$uneCategorieEstLaCategorie1 = false;
		
			$membreDuneCategorie2 = false;
		
			// PARCOUR LES CATEGORIES DU PRODUIT
			foreach($tabCategory as $category)
			{
					
				if($category->term_id == $idSelectedCategory1) // SI LE PRODUIT FAIRE PARTIE DE LA CATEGORIE 1
					$uneCategorieEstLaCategorie1 = true;
					
		
				// N'AFFICHE QUE LES CATEGORIES ENFANTS DE LA CATEGORIE 1
				if($category->parent == $idSelectedCategory1)
				{			
					
					if($category->parent > 0)
					{
							
						// TEST SI CATEGORIE PAS DEJA AFFICHE
						if(!in_array($category->term_id , $tabIdCategory2))
						{
							$membreDuneCategorie2 = true;
							
							// SINON ON MET DANS TABLEAU DES CATEGORIES PAS AFFICHE
							$tabIdCategory2[] = $category->term_id;
		
							// ET ON AFFICHE
							$idCategory2 =  $category->term_id;
								
							$idCategory = ""; // OBLIGE SINON EGAL A UNE ANCIENNE VALEUR DE idCategory1 , tres bizard
								
							$linkCategory2 = "&page_id=5546&idSelectedCategory2=" . $idCategory2 . "";
							include("category-row.php");
		
						}
		
					}
		
				}
		
			}

			// PRODUIS SANS CATEGORIE
			if($membreDuneCategorie2 == false && $uneCategorieEstLaCategorie1 == true)
			{
				include("product-row.php");
			}
		
		}
		else // if(!empty($idSelectedLigne)) // SI AFFICHAGE CATEGORY
			{
				// RECUPERE LES CATEGORIES DU PRODUIT
				$tabCategory = wp_get_object_terms($product->ID , 'productcat');
				
				$produitSansCategorie = true;
		 		
				// PARCOUR LES CATEGORIES DU PRODUIT
		 		foreach($tabCategory as $category)
		 		{
		 			// SI LA CATEOGRIE EST UNE CATEGORY ET QUE CETTE CATEGORIE FAIT PARTIE DE LA LIGNE SELECTIONNE
		 			// if($category->parent > 0 && $category->parent == $idSelectedLigne) 
		 			
		 			// N'AFFICHE PAS LES LIGNES
		 			if($category->parent > 0)
		 			{
		 					
		 				$produitSansCategorie = false;
		 				
		 				// TEST SI CATEGORIE PAS DEJA AFFICHE
			 			if(!in_array($category->term_id , $tabIdCategory))
			 			{
			 				// SINON ON MET DANS TABLEAU DES CATEGORIES PAS AFFICHE
			 				$tabIdCategory[] = $category->term_id; 
			 				
			 				// ET ON AFFICHE
			 				$idCategory = ""; // OBLIGE SINON EGAL A UNE ANCIENNE VALEUR DE idCategory1 , tres bizard
							$linkCategory = "";
							
			 				$idCategory1 =  $category->term_id;
			 				$linkCategory1 = "?sort=" . $sort . "&page_id=5546&idSelectedCategory1=" . $idCategory1;
	 		 				include("category-row.php");

			 			}
			 						
		 			}
		 			
				}
				
				// PRODUIS SANS CATEGORIE
		 		if($produitSansCategorie)
		 		{
		 			if($product->ID != '3489' && $product->ID != '929')
		 				include("product-row.php");
		 		}
				
			}
	
			
	}

//////////////////////////////////////////////////////////
  		 

?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php get_footer(); ?>