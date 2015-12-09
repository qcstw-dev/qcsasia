<?php 
						$idProduct = $post->ID;
						
						// Find connected pages
						$connected = new WP_Query( array('connected_type' => 'logo_process_to_product', 'connected_items' => get_queried_object()) );

						$tabLogoProcess = array();

						$i = 0;
						 if ( $connected->have_posts() ) 
						 {
                    		while ( $connected->have_posts() ) : $connected->the_post();
                    		
                       			$tabLogoProcess[$i]['title'] = get_the_title();
                       			$tabLogoProcess[$i]['content'] = get_the_content();
                       			$tabLogoProcess[$i]['link'] = get_permalink($post->ID);
                       			
                       			$tabLogoProcess[$i]['tabImage'] = rwmb_meta( "PRODUCT_tab_image_process_" . ($i + 1), 'type=image&size=large' , $idProduct);
                       			
                       		//	echo " A";
                       		//	print_r($tabLogoProcess[$i]['tabImage']);
                       		//	echo " B";
                       			/////////////////////////////////////////////////////
                       			
                       			if(!empty($tabIdLogoProcessWhichMatchString))
                       			{
                       			
                       					$tabLogoProcess[$i]['color'] = rwmb_meta( "PRODUCT_colors");
		                       			
		                       			if($tabLogoProcess[$i]['color'] == '0')
		                       				$tabLogoProcess[$i]['color'] = "No color";
		                       			else if($tabLogoProcess[$i]['color'] == '1')
		                       				$tabLogoProcess[$i]['color'] = "1 color";
		                       			else if($tabLogoProcess[$i]['color'] == '4')
		                       				$tabLogoProcess[$i]['color'] = "4 color";
		                       			else if($tabLogoProcess[$i]['color'] == '5')
		                       				$tabLogoProcess[$i]['color'] = "Full color";
		                       				
		                       			// echo "tabLogoProcess[$i]['color'] = " . $tabLogoProcess[$i]['color'];
		                       				
		                       			if($quantity == '1000k')
		                       				$tabLogoProcess[$i]['time'] = rwmb_meta( "PRODUCT_time_delivery_1000k");
		                       			else if($quantity == '5000k')
		                       				$tabLogoProcess[$i]['time'] = rwmb_meta( "PRODUCT_time_delivery_5000k");
		                       			else if($quantity == '10000k')
		                       				$tabLogoProcess[$i]['time'] = rwmb_meta( "PRODUCT_time_delivery_10000k");
		                       			else if($quantity == '50000k')
		                       				$tabLogoProcess[$i]['time'] = rwmb_meta( "PRODUCT_time_delivery_50000k");
		                       			else if($quantity == '100000k')
		                       				$tabLogoProcess[$i]['time'] = rwmb_meta( "PRODUCT_time_delivery_100000k");
		                       				
		                       			if($tabLogoProcess[$i]['time'] == '1')
		                       				$tabLogoProcess[$i]['time'] = "1 week";
		                       			else if($tabLogoProcess[$i]['time'] == '2')
		                       				$tabLogoProcess[$i]['time'] = "2 weeks";
		                       			else if($tabLogoProcess[$i]['time'] == '3')
		                       				$tabLogoProcess[$i]['time'] = "3 weeks";
		                       			else if($tabLogoProcess[$i]['time'] == '4')
		                       				$tabLogoProcess[$i]['time'] = "4 weeks";
		                       			else if($tabLogoProcess[$i]['time'] == '5')
		                       				$tabLogoProcess[$i]['time'] = "5 weeks";
		                       			else if($tabLogoProcess[$i]['time'] == '6')
		                       				$tabLogoProcess[$i]['time'] = "6 weeks";
		                       				
		                       				
		                       				
                       			}
                       					
		                       	/////////////////////////////////////////////////////
                       			
                       			$i++;
                       		
                     		endwhile;
                		}
                		
                		wp_reset_postdata();
                		
                		///////////////////

						 $j = 0;
						
						 if(count($tabLogoProcess) > 0)
						 {
						 	
						 	echo "<hr/>";
						
							echo "<div>";
							
							if(!empty($tabIdLogoProcessWhichMatchString))
								echo "<h2>Logo process : All results</h2>";
							else
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
 								
 								if(!empty($tabIdLogoProcessWhichMatchString))
 								{
 									echo "<br/><br/>";	
 									echo "<span style = 'font-weight:bold;color:red'>" . $quantity . " / " . $tabLogoProcess[$j]['color'] . " / " . $tabLogoProcess[$j]['time'] . "</span>";
 								}
                       			
                       			$j++;
                       			
                       			echo "</div>";
                       		
						 	}
						 	
                		}
                		
                		wp_reset_postdata();
                		  						
						?>