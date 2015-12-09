<?php 	
/**
 * Template Name: Product
 * The template for displaying products.
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			

<?php 

		// echo __FILE__;

		$sort = $_GET['sort'];
	
		if($sort != 'cheap' && $sort != 'patent' && $sort != 'program' && $sort != 'new')
		{
?>
			<form action = "" method = "GET" id = "member-frm" style = "width:100%;">
			
			<!--  New product only : <input type = "checkbox" name = "product_new" value = "1" />
				
				<hr/>-->	
				
				<input type = "hidden" name = "sort" value = "<?php echo $_GET['sort']; ?>" />
				
				<input type = "hidden" name = "page_id" value = "985" />
			
			<?php 	
			
			
				
				if($sort == 'function')
				{
					if(empty($_REQUEST['function']))
						$_REQUEST['function'] = $_SESSION['function']
					
					?>
					
					<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Search by functions</h1>
					<br/>
					
					<table id = "table-form-search">
						<tr>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'keychain' <?php if(@in_array('keychain' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td >Keychain</td>
							
							<td> <input type = 'checkbox' name = 'function[]' value = 'coin-keychain' <?php if(@in_array('coin-keychain' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td >Coin keychain</td>
							
							
							<td><input type = 'checkbox' name = 'function[]' value = 'magnet-stickers' <?php if(@in_array('magnet-stickers' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Magnets and stickers</td>
							
							
							<td><input type = 'checkbox' name = 'function[]' value = 'label-pins' <?php if(@in_array('label-pins' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Label pins</td>
							
						</tr>
						<tr>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'bottle-opener' <?php if(@in_array('bottle-opener' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Bottle opener / Bar accessory</td>
							
							
							<td><input type = 'checkbox' name = 'function[]' value = 'bag-hanger' <?php if(@in_array('bag-hanger' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Bag hanger</td>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'container-canister' <?php if(@in_array('container-canister' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Container and canister</td>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'phone-accessories' <?php if(@in_array('phone-accessories' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Phone accessories</td>
							
						</tr>
						<tr>
			
							<td><input type = 'checkbox' name = 'function[]' value = 'office-awards' <?php if(@in_array('office-awards' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Office awards</td>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'wearable' <?php if(@in_array('wearable' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Wearable</td>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'led-products' <?php if(@in_array('led-products' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>LED products</td>
							
						</tr>
						
					</table>
			
					<?php
			
				}
				else if($sort == 'delivery')
				{
					
					if(empty($_REQUEST['delivery']))
						$_REQUEST['delivery'] = $_SESSION['delivery'];
						
					if(empty($_REQUEST['delivery_quantity']))
						$_REQUEST['delivery_quantity'] = $_SESSION['delivery_quantity'];
						
					if(empty($_REQUEST['delivery_time']))
						$_REQUEST['delivery_time'] = $_SESSION['delivery_time'];
						
					if(empty($_REQUEST['delivery_color']))
						$_REQUEST['delivery_color'] = $_SESSION['delivery_color'];
						
					// VALEUR PAR DEFAULT
					if(empty($_REQUEST['delivery_quantity']))
					{
						$_REQUEST['delivery_quantity'] = '1000k';
						$_REQUEST['delivery_color'] = '0';
						$_REQUEST['delivery_time'] = '1';
					}
					
					?>
					
					<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Search by delivery time</h1>
					<br/>
					
					<p style = "float:left;margin-right:5px;">
					Quantity :
					<select name = "delivery_quantity">
						<option value = "1000k" <?php if($_REQUEST['delivery_quantity'] == '1000k') echo "selected"; ?>>1000</option>
						<option value = "5000k" <?php if($_REQUEST['delivery_quantity'] == '5000k') echo "selected"; ?>>5000</option>
						<option value = "10000k" <?php if($_REQUEST['delivery_quantity'] == '10000k') echo "selected"; ?>>10000</option>
						<option value = "50000k" <?php if($_REQUEST['delivery_quantity'] == '50000k') echo "selected"; ?>>50000</option>
						<option value = "100000k" <?php if($_REQUEST['delivery_quantity'] == '100000k') echo "selected"; ?>>100000</option>
					</select>
					</p>

					<p style = "float:left;margin-right:5px;">
					Logo colors :
					<select name = "delivery_color">
						<option value = "0" <?php if($_REQUEST['delivery_color'] == '0') echo "selected"; ?>>Minimum: no colour</option>
						<option value = "1" <?php if($_REQUEST['delivery_color'] == '1') echo "selected"; ?>>Minimum: 1 colour</option>
						<option value = "4" <?php if($_REQUEST['delivery_color'] == '4') echo "selected"; ?>>Minimum: 4 colour</option>
						<option value = "5" <?php if($_REQUEST['delivery_color'] == '5') echo "selected"; ?>>Full colour</option>
					</select>
					</p>
					
					<p style = "float:left;">
					Time delivery :
					<select name = "delivery_time">
						<option value = "1" <?php if($_REQUEST['delivery_time'] == '1') echo "selected"; ?>>1 week or less</option>
						<option value = "2" <?php if($_REQUEST['delivery_time'] == '2') echo "selected"; ?>>2 week or less</option>
						<option value = "3" <?php if($_REQUEST['delivery_time'] == '3') echo "selected"; ?>>3 week or less</option>
						<option value = "4" <?php if($_REQUEST['delivery_time'] == '4') echo "selected"; ?>>4 week or less</option>
						<option value = "5" <?php if($_REQUEST['delivery_time'] == '5') echo "selected"; ?>>5 week or less</option>
						<option value = "6" <?php if($_REQUEST['delivery_time'] == '6') echo "selected"; ?>>6 week or less</option>
					</select>
					</p>
					
					<br style = "clear:both;"/>
					
					<?php
				}
				else if($sort == 'design')
				{
					
					?>
					
					<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Search by design</h1>
					<hr style = "margin:10px;"/>
					
					Keyword : <input name = "design" type = "text" size = "25" />
					<br/><br/>
					
					<?php
				}
				else if($sort == 'logo')
				{
					
					if(empty($_REQUEST['logo']))
						$_REQUEST['logo'] = $_SESSION['logo'];
					
					?>
					
					<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Search by logo process</h1>
					<hr style = "margin:10px;"/>
					
					<h3>Metal</h3>
					<br/>
					<input type = 'checkbox' name = 'logo[]' value = 'Zamac' <?php if(@in_array('Zamac' , $_REQUEST['logo'])) echo "checked"; ?>/> Zamac
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'logo[]' value = 'Brass' <?php if(@in_array('Brass' , $_REQUEST['logo'])) echo "checked"; ?>/> Brass
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'logo[]' value = 'Iron' <?php if(@in_array('Iron' , $_REQUEST['logo'])) echo "checked"; ?>/> Iron
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'logo[]' value = 'Offset' <?php if(@in_array('Offset' , $_REQUEST['logo'])) echo "checked"; ?>/> Offset
							
									
					<h3>Soft PVC :</h3>
					<br/>
					
					<input type = 'checkbox' name = 'logo[]' value = '3D-PVC-Cloisonne' <?php if(@in_array('2D-PVC-Cloisonne' , $_REQUEST['logo'])) echo "checked"; ?>/> 2D PVC Cloisonne
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
					<input type = 'checkbox' name = 'logo[]' value = '3D-PVC-Cloisonne' <?php if(@in_array('3D-PVC-Cloisonne' , $_REQUEST['logo'])) echo "checked"; ?>/> 3D PVC Cloisonne
							
					<h3>Aluminium and plastic injection :</h3>
					<br/>
								
					<table id = "table-form-search">
						<tr >
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Laser-engraving' <?php if(@in_array('Laser-engraving' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td width = "200px;">LR: Laser engraving</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Silk-screen-printing' <?php if(@in_array('Silk-screen-printing' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td width = "200px;">PP: Silk screen printing</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Digitel-printing' <?php if(@in_array('Digitel-printing' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td width = "200px;">OD: Digital printing</td>
			
						</tr>
						<tr>
			
							<td><input type = 'checkbox' name = 'logo[]' value = 'Doming' <?php if(@in_array('Doming' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>ODD: Doming</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Offset-printing' <?php if(@in_array('Offset-printing' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>OP : Offset printing</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Epoxy' <?php if(@in_array('Epoxy' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>OX: Offset printing label</td>
			
						</tr>
					</table>
					
						<!-- 
						<tr>
						
						<td><input type = 'checkbox' name = 'logo[]' value = 'Soft-enamel' <?php if(@in_array('Soft-enamel' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>Soft enamel</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Woven-enamel' <?php if(@in_array('Woven-enamel' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>STW: Woven enamel</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Pvc-label' <?php if(@in_array('Pvc-label' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>STC: PVC label</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Zamac' <?php if(@in_array('Zamac' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>Zamac</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Brass' <?php if(@in_array('Brass' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>Brass</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Iron' <?php if(@in_array('Iron' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>Iron</td>
							
						</tr>
						
					</table>-->
			
					<?php
			
				}
				
				///////////////////////////////////////////////////////////////////////////
			
			?>
			<br/>
			
			<center><input type = "submit" id = "searchsubmit" value = "Search" style = "padding:5px;" /></center>
			
			
			</form>

<?php
	}
		
	$meta_query = array();
	
	$orderBy = "menu_order";
	 
	if($sort == 'function' && !empty($_REQUEST['function']))
	{
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_functions', 'value' => $_REQUEST["function"] , 'compare' => 'IN' );
	}
	else if($sort == 'logo' && !empty($_REQUEST['logo']))
	{
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_logo_process', 'value' => $_REQUEST["logo"] , 'compare' => 'IN' );
	}
	
	// BROWSE
	if($sort == 'cheap')
	{
		
		echo '<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Cheap items</h1>';
		echo '<hr style = "margin:10px;"/>';
		
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_cheap_item', 'value' => '1' , 'compare' => '=' );
	}
	else if($sort == 'patent')
	{
		echo '<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Patented items</h1>';
		echo '<hr style = "margin:10px;"/>';
		
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_patented_item', 'value' => "YES" , 'compare' => 'IN' );
	}
	else if($sort == 'program')
	{
		
		echo '<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Rush service items</h1>';
		echo '<hr style = "margin:10px;"/>';
		
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_program_item', 'value' => "YES" , 'compare' => 'IN' );
	}
	else if($sort == 'new')
	{
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_new', 'value' => "1" , 'compare' => 'IN' );
		$orderBy = "PRODUCT_new_product_order";
	}
	
	
	/*
	if(!empty($_REQUEST['function_coin_keychain']))
	{
		$meta_query[] = array( 'key' => 'PRODUCT_coin-keychain', 'value' => $_REQUEST['function_coin_keychain'], 'compare' => '=' );
	}
	 
	if(!empty($_REQUEST['function_bottole_opener']))
	{
		$meta_query[] = array( 'key' => 'function_bottole_opener', 'value' => $_REQUEST['function_bottole_opener'], 'compare' => '=' );
	}*/
	
	// print_r($meta_query);
		
	///////////////////////////////////////////////////////////////////////////	

	// 'meta_key' => 'PRODUCT_new', 'meta_value' => '1' 
	
//	echo "orderBy= " . $orderBy;
	
	if($sort == 'new')
	{
		//echo "a";
		$args = array('meta_query' => $meta_query , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 2500,'order' => 'ASC', 'orderby' => 'meta_value_num' , 'meta_key' => 'PRODUCT_new_product_order' , 'post_parent' => 0);
	}
	else
		$args = array('meta_query' => $meta_query , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 2500,'order' => 'ASC','orderby'=> 'menu_order' ,'paged'=>$paged ,  'post_parent' => 0 , 'post__not_in' => array(929 , 3855));
	
		
?>




<br/>
<br/>

<?php // PRODUITS

		////////////////////////////////////
		
		$_SESSION['function'] = $_REQUEST['function'];
		$_SESSION['delivery'] = $_REQUEST['delivery'];
		$_SESSION['logo'] = $_REQUEST['logo'];
		
		
		$_SESSOIN['delivery_quantity'] = $_REQUEST['delivery_quantity'];
		$_SESSOIN['delivery_color'] = $_REQUEST['delivery_color'];
		$_SESSOIN['delivery_time'] = $_REQUEST['delivery_time'];
						
						
		$idSelectedLigne = $_REQUEST['idSelectedLigne'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
	
		$tabIdLigne = array();
		$tabIdCategory1 = array();
		$tabIdCategory2 = array();
		$tabProduct = array();
		
		$tab_tabIdLogoProcessWhichMatchString = array();
		$tab_tabLogoString = array();
		
		// SI PAGE RECHARGE APRES CLIQUE SUR UNE LIGNE OU CATEGORIE, NE REFAIT PAS LA RECHERCHE
		////////////////////////////////////////////////////////////////////////////////////////
		
		//if(empty($idSelectedCategory))
		{
			$products = new WP_Query( $args );
			

			////////////////////////////////////////////////////////////////////////////////////////
			
			/*
			if(count($products) == 0)
				echo "<p id = 'count' style = 'text-align:center'>No products found</p>\n";
			else
				echo "<p id = 'count' style = 'text-align:center'>" . $products->found_posts . " product(s) found</p>\n";
			*/
			
			$count = 0;
			
			if ($products->have_posts()) :
			
			
			
	 			while ($products->have_posts()) : $products->the_post();
	 			
	 				/////////////////////////////////
	 				
			if($post->ID == '2026')
			{
				//echo "check 2026 ##############################<br/>";
				$poduct_id = '2026';
			}
			else
				$poduct_id = '0';
					
	 			
		 			global $post;
		 			$backup=$post;
		 			
		 			
		 			$patent =  get_post_meta($post->ID , "PRODUCT_new_product_order");
		 			
		 			
		 			if($sort == 'new')
		 			{
		 			//	echo "Order = " .  $patent[0] . "<br/>";
		 			//	continue;
		 			}
		 					
		 			$tabIdLogoProcessWhichMatch = array();
		 			
		 			
		 			// LOGO PROCESS
		 			////////////////////////////////////////////////////////////////////
		 			
		 			// SORT BY DELIVERY TIME
		 			////////////////////////////////////////////////////////////////////
		 			
		 			if($sort == 'delivery' &&
		 			(count($_REQUEST['delivery_quantity']) > 0 
		 			|| count($_REQUEST['delivery_time']) > 0 
		 			|| count($_REQUEST['delivery_color']) > 0))
		 			{
		 				
		 			//	echo "dans if";
		 				
		 						$isProductMatchDeliveryFilter = false;
		
		 						
		 						// Find connected pages
								$connected = new WP_Query(array('connected_type' => 'logo_process_to_product', 'connected_items' => $post) );
		
								 if ( $connected->have_posts() )
								 {
								 	
								 //	echo "dans if 2";
								 	
		                    		while ( $connected->have_posts() ) : $connected->the_post();
		                    		
		                    	//	echo "dans while";
		                    		
		                    		if($poduct_id == '2026' )
		                    			{
		                    			//	echo "logo process" . $post->ID . "<br/>";
		                    			}
									
		                    		// QUANTITY
		                    		//////////////////////////////////////////////////////////
		                    			
		                    		if(count($_REQUEST['delivery_quantity']) > 0  || count($_REQUEST['delivery_time']) > 0)
		                    		{
		                    			if($poduct_id == '2026' && $post->ID = '776')
		                    			{
		                    			//	echo "dans if";
		                    			}
		                    			// Si case 1000 cochée
		                    		//	if($_REQUEST['delivery_quantity'] == '1000k')
		                    			{
		                    				$fieldName = 'PRODUCT_time_delivery_' . $_REQUEST['delivery_quantity'];
		                    				//
		                    				
		                    				$time_delivery = rwmb_meta($fieldName , 'type=select' , $post->ID);
		                    				
		                    				//
		                    				
		                    				if($poduct_id == '2026' && $post->ID = '776')
		                    				{
		                    				//	echo "fieldName = " . $fieldName  . "<br/>";
		                    				//	echo "time_delivery = " . $time_delivery . "<br/>";
		                    				}
		                    				
		                    			
		                    				// Si valeur dans la fiche logo process est présente dans le tableau des cases cochées delivery_time
		                    				if($time_delivery <= $_REQUEST['delivery_time'])
		                    				{
		                    					//if($poduct_id == '2026' && $post->ID = '776')
		                    					//	echo "Time OK car " . $time_delivery . " <= " . $_REQUEST['delivery_time'] . "<br/>";
		                    					
		                    					$isProductMatchDeliveryFilter = true;
		                    					$tabIdLogoProcessWhichMatch[] = $post->ID;
		                    					//echo "post->ID = " . $post->ID . "<br/>";
		                    					//echo "post->title = " . get_the_title($post->ID) . "<br/>";
		                    				}
		                    			}
		
		                    		}	
		                    		
		                    		
		                    		// COLOR
		                    		//////////////////////////////////////////////////////////
		                    		
		                    		if(!empty($_REQUEST['delivery_color']))
		                    		{
		                    			
		                    			$isProductMatchDeliveryFilterColor = false;
		                    		
		                    			$tabColors = rwmb_meta('PRODUCT_colors', 'type=checkbox_list' , $post->ID);
		                    			
		                    			foreach($tabColors as $color)
		                    			{
		                    				// Si couleurs pas présente, on remet isProductMatchDeliveryFilter à FALSE
		                    				if($color >= $_REQUEST['delivery_color'])
		                    				{
		                    				//	if($poduct_id == '2026' && $post->ID = '776')
		                    				//		echo "Couleur OK car " . $color . " >= " . $_REQUEST['delivery_color'] . "<br/>";
		                    					
		                    					$isProductMatchDeliveryFilterColor = true;
		                    					$tabIdLogoProcessWhichMatch[] = $post->ID;
		                    				}
		                    				
		                    			}
		                    			
		                    			// Si aucun match color, remet le boulean false pour que le produit ne soit pas inclue dans la recherche
		                    			if(!$isProductMatchDeliveryFilterColor)
		                    			{
		                    				$isProductMatchDeliveryFilter = false;
		                    				
		                    			//	if($poduct_id == '2026' && $post->ID = '776')
		                    			//		echo "dans if";
		                    			}
		                    		}
		
		                    		//////////////////////////////////////////////////////////
		                    		
		                    	//	echo "##################################<br/>";
		                       			
		                       		$i++;
		                       		
		                     		endwhile;
		                		}
		                		
		 						wp_reset_postdata();
		 						
		 						
		               
		                		
		                		if(!$isProductMatchDeliveryFilter)
		                		{
		                		//	echo "continue";
		                			if($poduct_id == '2026')
		                				//echo "isProductMatchDeliveryFilter = false<br/>";
		                			
		                			if($poduct_id == '2026')
		                				//echo "<br/>END##############################<br/>";
		                			
		                			continue; // SAUTE LE REST
		                		}
		                		else
		                		{
		                			//if($poduct_id == '2026')
		                				//echo "isProductMatchDeliveryFilter = true<br/>";
		                		
		                		//	if($poduct_id == '2026')
		                			//	echo "<br/>END##############################<br/>";
		                		}
		                		
		 			}
		 			
		 			
		 			
		 		//	$tabProduct[] = get_post();
		 			
		 			$post = $backup;
		 			$tabProduct[] = $post;
		 			
		 			//echo "<br/>" . $post->ID;
		 			
		 			if(count($tabIdLogoProcessWhichMatch > 0))
		 			{
		 				$tab_tabIdLogoProcessWhichMatchString[$post->ID] = implode("-" , $tabIdLogoProcessWhichMatch);
		 			}
		 				
		 			if ($sort == 'logo')
		 			{
		 				if(!empty($_REQUEST['logo']))
		 					$tab_tabLogoString[$post->ID] = implode("#" , $_REQUEST['logo']);
		 				else
		 					$tab_tabLogoString[$post->ID] = "";
		 			}
	 			
	 			 			
				endwhile; 
	  
	 		 endif;
	 		 
		}
		/*
		else
		{
			$tabProduct = $_SESSION['tabProduct'];
		}*/
		
		////////////////////////////////////////////////////////////////////////////////////////
		
//		echo "tabProduct count = " . count($tabProduct) . "<br/>";
		
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
								
							$linkCategory2 = "?sort=" . $sort . "&page_id=985&idSelectedCategory2=" . $idCategory2 . "";
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
		 			if($category->parent > 0
					&& ($category->parent == '8'
					|| $category->parent == '9'
					|| $category->parent == '10'
					|| $category->parent == '11'
					|| $category->parent == '13'))
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
			 				$linkCategory1 = "?sort=" . $sort . "&page_id=985&idSelectedCategory1=" . $idCategory1;
	 		 				include("category-row.php");

			 			}
			 						
		 			}
		 			
				}
				
				//echo "ID = " . $product->ID;
				
				// $tabCat = wp_get_post_categories($product->ID);
				
				$tabCat = wp_get_object_terms($product->ID , 'productcat');
				
				// echo "count = " . count($tabCat);
				
			//	print_r($tabCat);
				
				$nbNiveau = 0;
				
				foreach($tabCat as $c1)
				{
					$nbNiveau++;
					
				//	echo "c1 name = " . $c1->name . "<br/>";
					
					if($c1->parent > 0)
					{
						$nbNiveau++;
						$c2 = get_term_by('id', $c1->parent , 'productcat');
						
					//	echo "c2 name = " . $c2->name . "<br/>";
						
						if($c2->parent > 0)
						{
							$nbNiveau++;
							$c3 = get_term_by('id', $c2->parent , 'productcat');
							
						//	echo "c3 name = " . $c3->name . "<br/>";
						//	echo $nbNiveau . "<br/>";
						
						}
						
					}
					
					break; // We only check the first category in case the product is on many categories
						
				}				
				
				// PRODUIS SANS CATEGORIE
		 		if($produitSansCategorie && $nbNiveau < 3)
		 		{
		 			// echo "sans cat" . $nbNiveau;
		 			
		 			if($product->ID != '3489' && $product->ID != '929')
		 				include("product-row.php");
		 		}
				
			}
	
			
	}

	//////////////////////////////////////////////////////////
	 		 

	$_SESSION['tabProduct'] = $tabProduct;
		
 	
	if(count($tabProduct) == 0)
		echo "<p id = 'count' style = 'text-align:center'>No matching result</p>\n";


?>

		



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>