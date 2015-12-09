<?php 

			
						// Find connected pages
						$connected = new WP_Query(array('order' => 'ASC' , 'orderby' => 'menu_order' , 'connected_type' => 'logo_process_to_product', 'connected_items' => get_queried_object()) );

						$tabLogoProcess = array(); 

						$i = 0;
						 if ( $connected->have_posts() ) 
						 {
                    		while ( $connected->have_posts() ) : $connected->the_post();
                    		
                    			if(get_the_title() == "ODD: Doming")
                    			{
                       			
                    				$tabLogoProcess[0]['title'] = get_the_title();
	                       			$tabLogoProcess[0]['content'] = get_the_content();
	                       			$tabLogoProcess[0]['link'] = get_permalink($post->ID);
	                       			
	                       	//		echo "i = " . $i;
	                       			
	                       			$tabLogoProcess[0]['tabImage'] = rwmb_meta( "PRODUCT_tab_image_process_" . ($i + 1)   , 'type=image&size=large' , $idProduct);
 
                       				
                    			}
                    			
                    			$i++;
                       		
                     		endwhile;
                		}
                		

                		wp_reset_postdata();
                		
                		///////////////////

						 $j = 0;
						
						 if(count($tabLogoProcess) > 0)
						 {
						 	
						 	echo "<hr/>";
						
							echo "<div id = 'logo-process-wrapper'>";
							
							echo "<h2>Logo process</h2>";
							
							echo "<br/>";
								
							foreach($tabLogoProcess as $logoProcess)
						 	{
                    		
                    			///////////////////////////////////////////////////
                    			                    		//	print_r($tabImage);
                       			
                       			$i = 0;
                       			
                       			echo "<div class = 'cartouche-categorie' style = 'height:220px;'> ";
                       			
                       			// " . $tabLogoProcess[$j]['link'] . "
                       			
                       			echo "<a class = 'lienThumbnailCategory-1' href = '#'>";
                       			
                       			foreach($logoProcess['tabImage'] as $image)
                       			{
                       				
                       			//	echo $image['url'];
                       			
	                       			if($i == 2)
		 							{
		 								echo "<a href = '" . $image['description'] . "' target = '_BLANK'><img src = '" . $image['url'] . "' class = 'imagecategoryclear' style = 'width:90px;height:90px;' /></a>";
		 							}
			 						if($i == 0)
			 						{
			 							
			 							if(count($logoProcess['tabImage']) == 1) // Si une seule image
			 								echo "<a href = '" . $image['description'] . "' target = '_BLANK'><img src = '" . $image['url'] . "' class = 'imagecategoryfloat' style = 'width:180px;height:180px;' /></a>";	
			 							else
			 								echo "<a href = '" . $image['description'] . "' target = '_BLANK'><img src = '" . $image['url'] . "' class = 'imagecategoryfloat' style = 'width:90px;height:90px;' /></a>";	
			 								
			 						}
					    			if($i == 1)
			 						{
			 							echo "<a href = '" . $image['description'] . "' target = '_BLANK'><img src = '" . $image['url'] . "' class = 'imagecategoryfloat' style = 'width:90px;height:90px;' /></a>";	
			 						}
					    			if($i == 3)
			 						{
			 							echo "<a href = '" . $image['description'] . "' target = '_BLANK'><img src = '" . $image['url'] . "' class = 'imagecategoryfloat' style = 'width:90px;height:90px;' /></a>";	
			 						}
			 			
			 						$i++;
			 						
                       			}
                       			
                       			echo "</a>";
                       			
 								echo  "<center><h2>" . $tabLogoProcess[$j]['title'] . "</h2></center>";
 				
 								echo "<br/>";
 								
 								echo $tabLogoProcess[$j]['content'];

                       			$j++;
                       			
                       			echo "</div>";
                       		
						 	}
						 	
                		}
                		
                		wp_reset_postdata();

                		  						
?>