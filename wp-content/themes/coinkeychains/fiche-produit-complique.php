<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php 
					
					$idProduct = $post->ID;
					
					////////////////////////////////////
					
					$tabCategory = wp_get_object_terms($idProduct , 'productcat');
					
					$softEnamel = false;
 		
			 		foreach($tabCategory as $category)
			 		{
			 			if($category->term_id == '8') // SI SOFT ENAMEL
			 			{
			 				$softEnamel = true;
			 			}
			 				
			 		}
			 		
			 		////////////////////////////////////
					
					$displaySlideshow = true;
					$displayOption = true;

					// SORT BY DELIVERY
					$tabIdLogoProcessWhichMatchString = $_GET['tabIdLogoProcessWhichMatchString'];
					$quantity = $_REQUEST['quantity'];
					
					// echo "tabIdLogoProcessWhichMatchString = " . $tabIdLogoProcessWhichMatchString;
					// echo "quantity = " . $quantity;
					
					if(!empty($tabIdLogoProcessWhichMatchString))
					{
						echo "<center><h2>Sort by delivery time</h2></center>";
						echo "<br/>";
					}
					
					// SORT BY LOGO PROCESS
					$tabLogoString = $_REQUEST['tabLogoString'];
					if(!empty($tabLogoString))
					{

						$tabLogo = explode("#" , $tabLogoString);

						echo "<center><h2>Sort by logo process</h2></center>";
						echo "<br/>";
					}
					
					// SORT BY SALES PROGRAM
					$salesProgram = $_REQUEST['salesProgram'];
					
					if($salesProgram == '1')
					{
						$displaySlideshow = false;
						$displayOption = false;
						
						$tabSalesProgram = rwmb_meta('PRODUCT_sales_program', 'type=checkbox_list' , $post->ID);
                    			
						$tabIdLogoProcessWhichMatchString = "";
						
                    	foreach($tabSalesProgram as $salesProgram)
                    	{
                    		if($salesProgram == 'LR')
                    				$tabIdLogoProcessWhichMatchString = tabIdLogoProcessWhichMatchString . "#" . 774;
                    		else if($salesProgram == 'PP')
                    				$tabIdLogoProcessWhichMatchString = tabIdLogoProcessWhichMatchString . "#" . 780;
                    		else if($salesProgram == 'ODD')
                    				$tabIdLogoProcessWhichMatchString = tabIdLogoProcessWhichMatchString . "#" . 776;
                    		else if($salesProgram == 'OD')
                    				$tabIdLogoProcessWhichMatchString = tabIdLogoProcessWhichMatchString . "#" . 784;
                    	}

					}
					
					////////////////////////////////////////////////////
					
					$displayImageFinishes = rwmb_meta( 'PRODUCT_display_image_finishes');
					
					?>
				
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
				
					<!-- CARTOUCHE ################################################################################### -->
					<?php require_once("fiche-produit/cartouche-produit.php"); ?>
					<!-- FIN CARTOUCHE ############################################################################### -->
												
					<br style = "clear:both;">
					
					<!-- DESIGN ######################################################################### -->
					<?php 
						require_once("fiche-produit/design.php"); 
					?>
					<!-- FIN DESIGN ##################################################################### -->
					
						
					<!-- LOGO PROCESS RESULT ######################################################################### -->
					<?php 
						require_once("fiche-produit/logo-process-results.php"); 
					?>
					<!-- FIN LOGO PROCESS RESULT ##################################################################### -->
					
					<br style = "clear:both;">
						
					<!-- OPTIONS AVAILABLE ###################################################################################"-->
					<?php 
						if($displayOption)
							require_once("fiche-produit/options.php"); 
					?>
					<!-- FIN OPTIONS ###################################################################################"-->
						
					<br style = "clear:both;"/>
						
					<!-- LOGO PROCESS ###################################################################################"-->
					
					<?php 
						
						if($_REQUEST['sort'] == 'program')
							require_once("fiche-produit/logo-process-odd.php"); 
						else 
							require_once("fiche-produit/logo-process.php");
						
						$idSlideshow = rwmb_meta( 'PRODUCT_id_slideshow');
							
					?>
					
					<!-- FIN LOGO PROCESS ###################################################################################"-->
						
					<br style = "clear:both;"/>
					<hr/>
				
</article><!-- #post -->

