<?php 	
/**
 * Template Name: Document Center
 * The template for Document Center
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



<?php 

	$idSelectedLigne = $_REQUEST['idSelectedLigne'];
	
	$a = get_term_by('id', $idSelectedLigne , 'productcat' );

?>

<h2 style = "text-align:center;font-size:22px;">Document Center <?php if(!empty($a->name)) echo " -> " . $a->name; ?></h2>
<br/>
<hr/>
<br/>

<div class = "search-result-design">

<?php // PRODUITS

		////////////////////////////////////////////
		
		$tabProduct = array();

		
		$idSelectedCategory = $_REQUEST['idSelectedCategory1'];
		
		$tabIdLigne = array();
		$tabIdCategory = array();
		$tabProduct = array();

		////////////////////////////////////////////

		$meta_query[] = array( 'key' => 'PRODUCT_document_center', 'value' => '1' , 'compare' => 'IN' );
		
		$args = array('meta_query' => $meta_query , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 10000,'order' => 'ASC','orderby'=> 'menu_order');

	
		$products = new WP_Query( $args );
		
		if ($products->have_posts()) :
		
		
 			while ($products->have_posts()) : $products->the_post(); 
 			
 				$tabProduct[] = $post;
 				
 				/*
 			
 				$images = rwmb_meta( 'PRODUCT_first_image', 'type=image&size=large' );
 				
 				foreach ( $images as $image )
				{
					$image1 = $image;
				}

 				echo "<dl class = 'list-options'>";
			   		echo "<dt><a href='?page_id=3104&idProduct=" . get_the_ID() . "' rel='thickbox'><img  style = 'width:200px;height:200px' src='" .$image1['url'] . "'  class = 'product_image_logo_process'/></a></dt>";
			    	echo "<dd>" . get_the_title();  "</dd>";
				echo "</dl>";
				
				*/
 			
			endwhile; 

 		 endif;
 		 
 		// print_r($tabProduct);
 		 
 		 //////////////////////////////////////////////////////////
 		 
 		foreach($tabProduct as $product)
		{
			
			if(!empty($idSelectedLigne))// SI AFFICHAGE PRODUIT
			{
				// RECUPERE LES CATEGORIES DU PRODUIT
				$tabCategory = wp_get_object_terms($product->ID , 'productcat');
		 		
				// PARCOUR LES CATEGORIES DU PRODUIT
		 		foreach($tabCategory as $category)
		 		{
		 			
		 			$categoryParent = get_term($category->parent , 'productcat');
		 			
		 			/*
		 			if($category->term_id == '32')
		 			{
		 			
		 				echo "category->parent = " . $category->parent . "<br/>";
		 			
		 			
		 			
		 			echo "categoryParent->parent= " . $categoryParent->parent . "<br/>";
		 			}
		 			*/
		 			
		 	//		print_r($categoryParent);
		 			
		 			// SI LA CATEOGRIE EST LA LIGNE SELECTIONNE 
		 			if(($category->term_id > 0 && $category->term_id == $idSelectedLigne) || $category->parent == $idSelectedLigne || $categoryParent->parent == $idSelectedLigne) 
		 			{
			 		
		 				// TEST SI PRODUIT PAS DEJA AFFICHE
			 			if(!$tabIdProduit || !in_array($product->ID , $tabIdProduit))
			 			{
			 				$tabIdProduit[] = $product->ID;
			 				
	 		 				// include("product-row.php");
	 		 				
 							// $images = rwmb_meta( 'PRODUCT_first_image', 'type=image&size=large' , $product->ID );
 							$images = rwmb_meta( "PRODUCT_tab_image_process_1", 'type=image&size=large' , $product->ID);
 				
 							foreach ( $images as $image )
							{
								$image1 = $image;
							}

			 				echo "<dl class = 'list-options'>";
						   		echo "<dt><a href='?page_id=3104&idProduct=" .  $product->ID . "' rel='thickbox'><img  style = 'width:200px;height:200px' src='" .$image1['url'] . "'  class = 'product_image_logo_process'/></a></dt>";
						    	echo "<dd>" .  get_the_title($product->ID) .  "</dd>";
							echo "</dl>";
				
	
			 			}
			 						
		 			}

				}
			}
			else // SI AFFICHAGE LIGNE
			{
				// RECUPERE LES CATEGORIES DU PRODUIT
				$tabCategory = wp_get_object_terms($product->ID , 'productcat');
				
				if($product->ID == '2892')
				{
				//	print_r($tabCategory);
				}
		 		
				// PARCOUR LES CATEGORIES DU PRODUIT
		 		foreach($tabCategory as $category)
		 		{//echo "idLigne = " . $category->term_id . "<br/>";
		 			
		 			// SI LA CATEOGRIE EST UNE LIGNE
		 			if($category->parent == 0) 
		 			{
		 				
		 				// TEST SI LIGNE PAS DEJA AFFICHE
			 			if(!in_array($category->term_id , $tabIdLigne))
			 			{
			 				// SINON ON MET DANS TABLEAU DES LIGNES PAS AFFICHE
			 				$tabIdLigne[] = $category->term_id; 
			 				
			 				// ET ON AFFICHE
			 				$idLigne =  $category->term_id;
			 				$linkLigne = "?idSelectedLigne=" . $idLigne;
	 		 				include("ligne-row.php");

			 			}
			 						
		 			}
		 			/*
		 			else if($category->parent > 0) // SI LA CATEGORIE PARENTE EST UNE LIGNE
		 			{
		 				
		 				// TEST SI LIGNE PAS DEJA AFFICHE
		 				if(!in_array($category->parent , $tabIdLigne))
		 				{
		 					// SINON ON MET DANS TABLEAU DES LIGNES PAS AFFICHE
		 					$tabIdLigne[] = $category->parent;
		 				
		 					// ET ON AFFICHE
		 					$idLigne =  $category->parent;
		 					$linkLigne = "?idSelectedLigne=" . $idLigne;
		 					include("ligne-row.php");
		 				
		 				}
		 			}
		 			*/
				}
				
			}
			
			
		}
		
		//////////////////////////////////////////////////////////
		
?>

</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>