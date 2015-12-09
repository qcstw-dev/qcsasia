<?php 	
/**
 * Template Name: Sales Program
 * The template for sales program
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
			
			if(empty($_REQUEST['idSelectedLigne']) && empty($_REQUEST['idSelectedCategory']))
			{
			
				// AFFICHE CONTENT DE LA PAGE QUI UTILISE CATEGORY-LIST EN TANT QUE TEMPLATE
		 		///////////////////////////////////////////////////////////////////////////////////////
		 			
				if ( have_posts() ) : while ( have_posts() ) : the_post();
		   			the_content();
				endwhile; endif;
			
			}
			
			 ?>
		</div><br id = "ancre"/>
		
		
			

<?php 

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

	$meta_query[] = array( 'key' => 'PRODUCT_activate_sales_program', 'value' => '1' , 'compare' => '=' );

	$args = array('meta_query' => $meta_query , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 250,'order' => 'ASC','orderby'=> 'menu_order','paged'=>$paged ,  'post_parent' => 0);

	
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
								
							$linkCategory2 = "?idSelectedCategory2=" . $idCategory2 . "&salesProgram=1#ancre&rush=1";
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
		else if(!empty($idSelectedLigne)) // SI AFFICHAGE CATEGORY 1
		{
			// RECUPERE LES CATEGORIES DU PRODUIT
			$tabCategory = wp_get_object_terms($product->ID , 'productcat');
	
			$uneCategorieEstLaLigne = false;
	
			$membreDuneSousCategorie = false;
			 
			// PARCOUR LES CATEGORIES DU PRODUIT
			foreach($tabCategory as $category)
			{
				// SI LA CATEOGRIE EST UNE CATEGORY ET QUE CETTE CATEGORIE FAIT PARTIE DE LA LIGNE SELECTIONNE
				// if($category1->parent > 0 && $category1->parent == $idSelectedLigne)
	
				if($category->parent > 0)
					$membreDuneSousCategorie = true;
			 	
				if($category->term_id == $idSelectedLigne)
					$uneCategorieEstLaLigne = true;
			 	
	
				// N'AFFICHE PAS LES LIGNES
				if($category->parent == $idSelectedLigne)
				{
						
					if($category->parent > 0)
					{
							
						// TEST SI CATEGORIE PAS DEJA AFFICHE
						if(!in_array($category->term_id , $tabIdCategory1))
						{
							// SINON ON MET DANS TABLEAU DES CATEGORIES PAS AFFICHE
							$tabIdCategory1[] = $category->term_id;
							 
							// ET ON AFFICHE
							$idCategory1 =  $category->term_id;
							
							$idCategory = ""; // OBLIGE SINON EGAL A UNE ANCIENNE VALEUR DE idCategory1 , tres bizard
							$linkCategory = "";
							
							$linkCategory1 = "?idSelectedCategory1=" . $idCategory1 . "&salesProgram=1#ancre&rush=1";
							
							if($idCategory1 == '34')
							{
								$linkCategory1 = "http://www.qcsasia.com/patent-copyright-agreement/";
							}
							
							include("category-row.php");
	
						}
	
					}
	
				}
	
			}
	
			// PRODUIS SANS CATEGORIE
			if($membreDuneSousCategorie == false && $uneCategorieEstLaLigne == true)
			{
				include("product-row.php");
			}
	
		}
		else // SI AFFICHAGE LIGNE
		{
			// RECUPERE LES CATEGORIES DU PRODUIT
			$tabCategory1 = wp_get_object_terms($product->ID , 'productcat');
	
			if($product->ID == '2892')
			{
				//	print_r($tabCategory1);
			}
			 
			// PARCOUR LES CATEGORIES DU PRODUIT
			foreach($tabCategory1 as $category1)
			{//echo "idLigne = " . $category1->term_id . "<br/>";
	
				// SI LA CATEOGRIE EST UNE LIGNE
				if($category1->parent == 0)
				{
						
					// TEST SI LIGNE PAS DEJA AFFICHE
					if(!in_array($category1->term_id , $tabIdLigne))
					{
						// SINON ON MET DANS TABLEAU DES LIGNES PAS AFFICHE
						$tabIdLigne[] = $category1->term_id;
	
						// ET ON AFFICHE
						$idLigne =  $category1->term_id;
						$linkLigne = "?idSelectedLigne=" . $idLigne . "&salesProgram=1&rush=1";
						
						if($idLigne != '12')
						{
							include("ligne-row.php");
						}
						
					
	
					}
	
				}/*
				else if($category1->parent > 0) // SI LA CATEGORIE PARENTE EST UNE LIGNE
				{
						
					// TEST SI LIGNE PAS DEJA AFFICHE
					if(!in_array($category1->parent , $tabIdLigne))
					{
						// SINON ON MET DANS TABLEAU DES LIGNES PAS AFFICHE
						$tabIdLigne[] = $category1->parent;
							
						// ET ON AFFICHE
						$idLigne =  $category1->parent;
						$linkLigne = "?idSelectedLigne=" . $idLigne . "";
						include("ligne-row.php");
							
					}
				}*/
			}
	
		}
			
			
	}
		
		//////////////////////////////////////////////////////////

?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>