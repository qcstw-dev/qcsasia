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

		$sort = $_GET['sort'];
	
		echo "sort = " . $sort;
	
		if($sort != 'cheap' && $sort != 'patent' && $sort != 'program')
		{
?>
			<form action = "" method = "GET" id = "member-frm" style = "width:660px;">
			
			<!--  New product only : <input type = "checkbox" name = "product_new" value = "1" />
				
				<hr/>-->	
				
				<input type = "hidden" name = "sort" value = "<?php echo $_GET['sort']; ?>" />
				
				<input type = "hidden" name = "page_id" value = "985" />
			
			<?php 	
			
			
				
				if($sort == 'function')
				{
					
					?>
					
					<center><h3>Search by functions</h3></center>
					<br/>
					
					<table id = "table-form-search">
						<tr>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'keychain' <?php if(@in_array('keychain' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Keychain</td>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'coin-keychain' <?php if(@in_array('coin-keychain' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Coin keychain</td>
							
							
							<td><input type = 'checkbox' name = 'function[]' value = 'magnet-stickers' <?php if(@in_array('magnet-stickers' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Magnets and stickers</td>
							
							
							<td><input type = 'checkbox' name = 'function[]' value = 'label-pins' <?php if(@in_array('label-pins' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Label pins</td>
							
						</tr>
						<tr>
							
							<td><input type = 'checkbox' name = 'function[]' value = 'bottle-opener' <?php if(@in_array('bottle-opener' , $_REQUEST['function'])) echo "checked"; ?>/></td>
							<td>Bottle opener / Bar accessories</td>
							
							
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
					
					?>
					
					<center><h3>Search by delivery time</h3></center>
					<br/>
					
					Quantity :
					<select name = "delivery_quantity">
						<option value = "1000k" <?php if($_REQUEST['delivery_quantity'] == '1000k') echo "selected"; ?>>1000k</option>
						<option value = "5000k" <?php if($_REQUEST['delivery_quantity'] == '5000k') echo "selected"; ?>>5000k</option>
						<option value = "10000k" <?php if($_REQUEST['delivery_quantity'] == '10000k') echo "selected"; ?>>10000k</option>
						<option value = "50000k" <?php if($_REQUEST['delivery_quantity'] == '50000k') echo "selected"; ?>>50000k</option>
						<option value = "100000k" <?php if($_REQUEST['delivery_quantity'] == '100000k') echo "selected"; ?>>100000k</option>
					</select>
					
					<!--
					<input type = 'checkbox' name = 'delivery_quantity[]' value = '1000k' <?php if(@in_array('1000k' , $_REQUEST['delivery_quantity'])) echo "checked"; ?>/> 1000k&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'delivery_quantity[]' value = '5000k' <?php if(@in_array('5000k' , $_REQUEST['delivery_quantity'])) echo "checked"; ?>/> 5000k&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'delivery_quantity[]' value = '10000k' <?php if(@in_array('10000k' , $_REQUEST['delivery_quantity'])) echo "checked"; ?>/> 10 000k&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'delivery_quantity[]' value = '50000k' <?php if(@in_array('50000k' , $_REQUEST['delivery_quantity'])) echo "checked"; ?>/> 50 000k&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'delivery_quantity[]' value = '100000k' <?php if(@in_array('100000k' , $_REQUEST['delivery_quantity'])) echo "checked"; ?>/> 100 000k&nbsp;&nbsp;&nbsp;&nbsp;
					  -->
					  
					<br/><br/><br/>
					
					Logo colors :
					<select name = "delivery_color">
						<option value = "0" <?php if($_REQUEST['delivery_color'] == '0') echo "selected"; ?>>Minimum: no colour</option>
						<option value = "1" <?php if($_REQUEST['delivery_color'] == '1') echo "selected"; ?>>Minimum: 1 colour</option>
						<option value = "4" <?php if($_REQUEST['delivery_color'] == '4') echo "selected"; ?>>Minimum: 4 colour</option>
						<option value = "5" <?php if($_REQUEST['delivery_color'] == '5') echo "selected"; ?>>Minimum: quadrichrome</option>
					</select>
						
					<br/><br/><br/>
					
					Time delivery :
					<select name = "delivery_time">
						<option value = "1" <?php if($_REQUEST['delivery_time'] == '1') echo "selected"; ?>>1 week or less</option>
						<option value = "2" <?php if($_REQUEST['delivery_time'] == '2') echo "selected"; ?>>2 week or less</option>
						<option value = "3" <?php if($_REQUEST['delivery_time'] == '3') echo "selected"; ?>>3 week or less</option>
						<option value = "4" <?php if($_REQUEST['delivery_time'] == '4') echo "selected"; ?>>4 week or less</option>
						<option value = "5" <?php if($_REQUEST['delivery_time'] == '5') echo "selected"; ?>>5 week or less</option>
						<option value = "6" <?php if($_REQUEST['delivery_time'] == '6') echo "selected"; ?>>6 week or less</option>
					</select>
					
					<br/><br/>
					
					<?php
				}
				else if($sort == 'design')
				{
					
					?>
					
					<center><h3>Search by design</h3></center>
					<br/>
					
					Keyword : <input name = "design" type = "text" size = "25" />
					<br/><br/>
					
					<?php
				}
				else if($sort == 'logo')
				{
					
					?>
					
					<center><h3>Search by logo process</h3></center>
					
					<h3>Metal</h3>
					<br/>
					<input type = 'checkbox' name = 'logo[]' value = 'Zamac' <?php if(@in_array('Zamac' , $_REQUEST['logo'])) echo "checked"; ?>/> Zamac
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'logo[]' value = 'Brass' <?php if(@in_array('Brass' , $_REQUEST['logo'])) echo "checked"; ?>/> Brass
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = 'checkbox' name = 'logo[]' value = 'Iron' <?php if(@in_array('Iron' , $_REQUEST['logo'])) echo "checked"; ?>/> Iron
							
									
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
							<td width = "200px;">OD: Digitel printing</td>
			
						</tr>
						<tr>
			
							<td><input type = 'checkbox' name = 'logo[]' value = 'Doming' <?php if(@in_array('Doming' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>ODD: Doming</td>
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Offset-printing' <?php if(@in_array('Offset-printing' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>OP : Offset printing</td>
							
							
							<td><input type = 'checkbox' name = 'logo[]' value = 'Epoxy' <?php if(@in_array('Epoxy' , $_REQUEST['logo'])) echo "checked"; ?>/></td>
							<td>OX Epoxy</td>
			
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
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_cheap_item', 'value' => '1' , 'compare' => '=' );
	}
	else if($sort == 'patent')
	{
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_patented_item', 'value' => "YES" , 'compare' => 'IN' );
	}
	else if($sort == 'program')
	{
		$meta_query[] = array('relation' => 'AND');
		$meta_query[] = array( 'key' => 'PRODUCT_program_item', 'value' => "YES" , 'compare' => 'IN' );
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

	$args = array('meta_query' => $meta_query , 'post_type' => 'product','post_status' => 'publish','posts_per_page' => 250,'order' => 'ASC','orderby'=> 'menu_order','paged'=>$paged ,  'post_parent' => 0);
	
		
?>




<br/>
<br/>

<?php // PRODUITS
	
		$products = new WP_Query( $args );
		

		
		//echo "nb products = " . $products->post_count;
		
		//print_r($_REQUEST['delivery_1000']);
		
		if ($products->have_posts()) :
		
		
		
 			while ($products->have_posts()) : $products->the_post(); 
 			
 			global $post;
 			$backup=$post;
 			
 			$tabIdLogoProcessWhichMatch = array();
 			
 			
 			// LOGO PROCESS
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
                    		
                    		// QUANTITY
                    		//////////////////////////////////////////////////////////
                    			
                    		if(count($_REQUEST['delivery_quantity']) > 0  || count($_REQUEST['delivery_time']) > 0)
                    		{
                    			
                    			// Si case 1000 cochée
                    			if(@in_array('1000k' , $_REQUEST['delivery_quantity']))
                    			{
                    				
                    				$time_delivery_1000k = rwmb_meta('PRODUCT_time_delivery_1000k', 'type=select' , $post->ID);
                    			
                    				// Si valeur dans la fiche logo process est présente dans le tableau des cases cochées delivery_time
                    				if($time_delivery_1000k <= $_REQUEST['delivery_time'])
                    				{
                    					$isProductMatchDeliveryFilter = true;
                    					$tabIdLogoProcessWhichMatch[] = $post->ID;
                    				}
                    			}
                    			
                    			// Si case 5000 cochée
                    			if(@in_array('5000k' , $_REQUEST['delivery_quantity']))
                    			{
                    				
                    				$time_delivery_5000k = rwmb_meta('PRODUCT_time_delivery_5000k', 'type=select' , $post->ID);
                    			
                    				// Si valeur dans la fiche logo process est présente dans le tableau des cases cochées delivery_time
                    				if($time_delivery_5000k <= $_REQUEST['delivery_time'])
                    				{
                    					$isProductMatchDeliveryFilter = true;
                    					$tabIdLogoProcessWhichMatch[] = $post->ID;
                    				}
                    			}
                    			
                    			// Si case 10000 cochée
                    			if(@in_array('10000k' , $_REQUEST['delivery_quantity']))
                    			{
                    				
                    				$time_delivery_10000k = rwmb_meta('PRODUCT_time_delivery_10000k', 'type=select' , $post->ID);
                    			
                    				// Si valeur dans la fiche logo process est présente dans le tableau des cases cochées delivery_time
                    				if($time_delivery_10000k <= $_REQUEST['delivery_time'])
                    				{
                    					$isProductMatchDeliveryFilter = true;
                    					$tabIdLogoProcessWhichMatch[] = $post->ID;
                    				}
                    			}
                    			
                    			// Si case 50000 cochée
                    			if(@in_array('50000k' , $_REQUEST['delivery_quantity']))
                    			{
                    				
                    				$time_delivery_50000k = rwmb_meta('PRODUCT_time_delivery_50000k', 'type=select' , $post->ID);
                    			
                    				// Si valeur dans la fiche logo process est présente dans le tableau des cases cochées delivery_time
                    				if($time_delivery_50000k <= $_REQUEST['delivery_time'])
                    				{
                    					$isProductMatchDeliveryFilter = true;
                    					$tabIdLogoProcessWhichMatch[] = $post->ID;
                    				}
                    			}
                    			
                    			// Si case 100000 cochée
                    			if(@in_array('100000k' , $_REQUEST['delivery_quantity']))
                    			{
                    				
                    				$time_delivery_100000k = rwmb_meta('PRODUCT_time_delivery_100000k', 'type=select' , $post->ID);
                    			
                    				// Si valeur dans la fiche logo process est présente dans le tableau des cases cochées delivery_time
                    				if($time_delivery_100000k <= $_REQUEST['delivery_time'])
                    				{
                    					$isProductMatchDeliveryFilter = true;
                    					$tabIdLogoProcessWhichMatch[] = $post->ID;
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
                    				if($color <= $_REQUEST['delivery_color'])
                    				{
                    					$isProductMatchDeliveryFilterColor = true;
                    					$tabIdLogoProcessWhichMatch[] = $post->ID;
                    				}
                    				
                    			}
                    			
                    			// Si aucun match color, remet le boulean false pour que le produit ne soit pas inclue dans la recherche
                    			if(!$isProductMatchDeliveryFilterColor)
                    				$isProductMatchDeliveryFilter = false;
                    		}

                    		//////////////////////////////////////////////////////////
                       			
                       		$i++;
                       		
                     		endwhile;
                		}
                		
                		wp_reset_postdata();
                		
                		if(!$isProductMatchDeliveryFilter)
                		{
                		//	echo "continue";
                		
                			continue;
                		}
                		else
                		{
                		//	echo "isProductMatchDeliveryFilter = true";
                		}
                		
 			}
 			
 			$post = $backup;
 			//echo "affichage prodit";
 				
 			echo "<div class = 'cartouche-categorie'>";
 			
 				if(count($tabIdLogoProcessWhichMatch > 0))
 				{
 					$tabIdLogoProcessWhichMatchString = implode("-" , $tabIdLogoProcessWhichMatch);
 				}
	    	
 				echo "<a class = 'lienThumbnailCategory-1' href = '" . get_permalink($post->ID) . "&quantity=" . $_REQUEST['quantity'] . "&tabIdLogoProcessWhichMatchString=" . $tabIdLogoProcessWhichMatchString . "'>";
 				
 					$i = 0;
 					
 				//	echo "ID = " .  $post->ID;
 					
 					$tab_icon_cartouche = rwmb_meta('PRODUCT_icon_cartouche', 'type=image&size=large');
 					
 					if(empty($tab_icon_cartouche) || count($tab_icon_cartouche) == 0)
 					{
 						echo get_the_post_thumbnail();
 					}	 					
 					else 
 					{
 						
 						$diff = 4 - count($tab_icon_cartouche);
	 					
	 					$j = 0;
	 					
	 					while($j < $diff)
	 					{
	 						$tab_icon_cartouche[] = array();
	 						$j++;	
	 					}
	 					
 						foreach($tab_icon_cartouche as $icon_cartouche)
	 					{
	 						
	 						
	 						if($i == 2)
	 						{
	 							if(!empty($icon_cartouche['url']))
	 								echo "<img src = '" . $icon_cartouche['url'] . "' class = 'imagecategoryclear' style = 'width:90px;height:90px;' />";
	 							else
	 								echo "<img src = '" . get_bloginfo('url') . "/colors/blank-90.jpg" . "' class = 'imagecategoryclear' style = 'width:90px;height:90px;'/>";
	 						}
	 						if($i == 0)
	 						{
	 							
	 							if(count($tab_icon_cartouche) == 1) // Si une seule image
	 								echo "<img src = '" . $icon_cartouche['url'] . "' class = 'imagecategoryfloat' style = 'width:180px;height:180px;' />";	
	 							else
	 								echo "<img src = '" . $icon_cartouche['url'] . "' class = 'imagecategoryfloat' style = 'width:90px;height:90px;' />";	
	 								
	 						}
			    			if($i == 1)
	 						{
	 							if(!empty($icon_cartouche['url']))
	 								echo "<img src = '" . $icon_cartouche['url'] . "' class = 'imagecategoryfloat' style = 'width:90px;height:90px;' />";
	 							else
	 								echo "<img src = '" . get_bloginfo('url') . "/colors/blank-90.jpg" . "' class = 'imagecategoryfloat' style = 'width:90px;height:90px;'/>";
	 						}
			    			if($i == 3)
	 						{
	 							if(!empty($icon_cartouche['url']))
	 								echo "<img src = '" . $icon_cartouche['url'] . "' class = 'imagecategoryfloat' style = 'width:90px;height:90px;' />";
	 							else
	 								echo "<img src = '" . get_bloginfo('url') . "/colors/blank-90.jpg" . "' class = 'imagecategoryfloat' style = 'width:90px;height:90px;'/>";
	 						}
	 			
	 						$i++;
	 					
	 					} 
	 					
	 					
	 					
	 					
	 					
 					}
 					
 					echo  "</a>";
 				
 					echo "<br/>";
 					
 					$title = get_post_meta($post->ID , "PRODUCT_name");
			
 					echo  "<center><h2>" . get_the_title() . "</h2></center>";
 					
 					echo "<br/>";	

 					$description = get_post_meta($post->ID , "PRODUCT_description");
 					
 					$logoSize = get_post_meta($post->ID , "PRODUCT_logo_size");
 					$itemSize = get_post_meta($post->ID , "PRODUCT_item_size");
 					$packaging = get_post_meta($post->ID , "PRODUCT_packaging");
 					$patent = get_post_meta($post->ID , "PRODUCT_patent");
 					
 					$template = rwmb_meta( 'PRODUCT_template');
 					$content = get_the_content();
 					
 					// echo "content = " . $content;
	 					
	 				if($template == 0)
	 					$content = substr($content ,0 , 400) . '...'; // APPERCU
	 				else
	 					$content = substr($content ,0 , 200) . '...'; // APPERCU

	 					if(strlen($content) > 10)
	 						echo $content . "</b></i></strong></em><br/><br/>";
 					
 					
 					
 					if($template == 1)
 					{
 					
 						if(!empty($logoSize[0]))
		 					echo "Logo size :" . $logoSize[0] . "<br/><br/>";
		 						
		 				if(!empty($itemSize[0]))
		 					echo "Item size :" . $itemSize[0] . "<br/><br/>";
		 					
		 				if(!empty($packaging[0]))
		 					echo "Packaging :" . $packaging[0] . "<br/><br/>";
		 					
		 				if(!empty($patent[0]))
		 					echo "Patent :" . $patent[0] . "<br/><br/>";
 						
 					}

 			echo "</div>";
 			
			endwhile; 

 		 endif;

?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>