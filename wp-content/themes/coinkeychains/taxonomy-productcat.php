<?php 	
/**
 * Template Name: Product
 * The template for displaying products.
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
<!-- LISTE DES PRODUITS ############################################################### -->

<form action = "" method = "GET">

<?php 	

// echo __FILE__;

	$sort = $_GET['sort'];
	
	$orderBy = 'menu_order';
	
	if($sort == 'function_coinckeychain')
	{
		$meta_key = 'PRODUCT_new';
		$meta_value = '1';
		
		echo "Functions :";
		echo "Keychain :&nbsp;<input type = 'checkbox' name = 'function_keychain' value = '1' />&nbsp;";
		echo "Coin keychain :&nbsp;<input type = 'checkbox' name = 'function_coin_keychain' value = '1' />&nbsp;";
		echo "Bottle opener / Bar accessories :&nbsp;<input type = 'checkbox' name = 'function_bottole_opener' value = '1' />&nbsp;";
		echo "Bag hanger :&nbsp;<input type = 'checkbox' name = 'function_bag_hanger' value = '1' />&nbsp;";
		echo "Pillbox :&nbsp;<input type = 'checkbox' name = 'function_pillbox' value = '1' />&nbsp;";
		echo "Stickers :&nbsp;<input type = 'checkbox' name = 'function_stickers' value = '1' />&nbsp;";
		echo "Magnet :&nbsp;<input type = 'checkbox' name = 'function_magnet' value = '1' />&nbsp;";
		echo "Phone accessories :&nbsp;<input type = 'checkbox' name = 'function_phone_accessories' value = '1' />&nbsp;";
		echo "Office accessories :&nbsp;<input type = 'checkbox' name = 'function_office_accessories' value = '1' />&nbsp;";
		echo "Wearable :&nbsp;<input type = 'checkbox' name = 'function_wearable' value = '1' />&nbsp;";
	}
	if($sort == 'function_keychain')
	{
		$meta_key = 'PRODUCT_new';
		$meta_value = '1';
	}
	else if($sort == 'new')
	{
		$meta_key = 'PRODUCT_new';
		$meta_value = '1';
		$orderBy = 'PRODUCT_new_product_order';
	}
	else
	{
		$meta_key = '';
		$meta_value = '';
	}

	// 'meta_key' => 'PRODUCT_new', 'meta_value' => '1' 
	
	
	// Cherchedans tous les produits
	// our chaque produit on met sa cateorige dans un tableau, en evidant doublone, si pas categorie on met lep produit
	
	// On itere sur les categories

	// Recupere le terme courant
//	 $term =	$wp_query->queried_object;
			

	$args = array('meta_key' => $meta_key , 'hide_empty'    => false , 'meta_value' => $meta_value , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 250,'order' => 'ASC','orderby'=> $orderBy ,'paged'=>$paged ,  'post_parent' => 0);
        
   
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

</form>

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
								
							$linkCategory2 = "?idSelectedCategory2=" . $idCategory2 . "";
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
							
							$linkCategory1 = "?idSelectedCategory1=" . $idCategory1 . "";
							
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
						$linkLigne = "?idSelectedLigne=" . $idLigne . "";
						
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
	
	if(empty($idSelectedLigne) && empty($idSelectedCategory1) && empty($idSelectedCategory2))
	{
	
		// ET ON AFFICHE
		$idCategory1 = '13';
	
		$idCategory = ""; // OBLIGE SINON EGAL A UNE ANCIENNE VALEUR DE idCategory1 , tres bizard
		$linkCategory = "";
	
		$linkCategory1 = "http://www.qcsasia.com/productcat/licence-and-patent-exploitation/?idSelectedLigne=13";
		include("category-row.php");
		
	}
	

	
	if($idSelectedLigne == '13')
	{
		
		// ET ON AFFICHE
		$idCategory1 =  '34';
		
		$idCategory = ""; // OBLIGE SINON EGAL A UNE ANCIENNE VALEUR DE idCategory1 , tres bizard
		$linkCategory = "";
		
		$linkCategory1 = "http://www.qcsasia.com/patent-copyright-agreement/";
		include("category-row.php");
		
		// ET ON AFFICHE
		$idCategory1 =  '33';
		
		$idCategory = ""; // OBLIGE SINON EGAL A UNE ANCIENNE VALEUR DE idCategory1 , tres bizard
		$linkCategory = "";
		
		$linkCategory1 = "http://www.qcsasia.com/licence-exploitation/";
		include("category-row.php");
	}

//////////////////////////////////////////////////////////

?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>