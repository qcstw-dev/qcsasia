<?php

			$post = $product;
 			$link = get_permalink($post->ID);
 			
 			$link = $link . "?";
 			
 			if(!empty($_REQUEST['delivery_quantity']))
 				$link = $link . "&quantity=" . $_REQUEST['delivery_quantity'];
 			
 			if(!empty($tab_tabIdLogoProcessWhichMatchString[$post->ID]))
 				$link = $link . "&tabIdLogoProcessWhichMatchString=" . $tab_tabIdLogoProcessWhichMatchString[$post->ID];
 			
 			if(!empty($tab_tabLogoString[$post->ID]))
 				$link = $link . "&tabLogoString=" . $tab_tabLogoString[$post->ID];
 			
 			if(!empty($_REQUEST['salesProgram']))
 				$link = $link . "&salesProgram=" . $_REQUEST['salesProgram'];
 			
 			if(!empty($_REQUEST['sort']))
 				$link = $link . "&sort=" . $_REQUEST['sort'];
 			
 			if(!empty($_REQUEST['idTheme']))
 				$link = $link . "&idTheme=" . $_REQUEST['idTheme'];
 				
                        echo "<a class = 'lienThumbnailCategory-1' href = '" . $link  . "'>";

                            echo "<div class = 'cartouche-categorie'>\n";
 			
 				
 					$i = 0;
 					
 				//	echo "ID = " .  $post->ID;
 					
 					$tab_icon_cartouche = rwmb_meta('GIFT_icon_cartouche', 'type=image&size=large');
 					
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

 				
 					$title = get_post_meta($post->ID , "GIFT_name");
 					
					setup_postdata($post);
 					
					echo  "<center><h2>" . get_the_title() . "</h2></center>";

 					
 					echo "<br/>";	

 					$description = get_post_meta($post->ID , "GIFT_description");
 					
 					$logoSize = get_post_meta($post->ID , "GIFT_logo_size");
 					$itemSize = get_post_meta($post->ID , "GIFT_item_size");
 					$packaging = get_post_meta($post->ID , "GIFT_packaging");
 					$patent = get_post_meta($post->ID , "GIFT_patent");
 					
 					$template = rwmb_meta( 'GIFT_template');
 					$content = get_the_content();

	 					
	 				if (strpos($content , '<br>') === 0)
				 		 $content = substr($content , 4);
	 				
	 				$content = substr($content ,0 , 100) . '...'; // APPERCU
	 				
	 				/*
					
 					if($template == 0)
	 					$content = substr($content ,0 , 400) . '...'; // APPERCU
	 				else
	 				{
	 					$tabContent = explode("<br/>" , $content);
 						$content = $tabContent[0];
	 					$content = substr($content ,0 , 100) . '...'; // APPERCU
	 					echo "AAA";
	 				}*/
	 				
	 				if(strlen($content) > 10)
	 					echo $content . "</b></i></strong></em<br/><br/>";
 					
 					
 						if(!empty($logoSize[0]))
		 					echo "<br/>Logo size :" . $logoSize[0] . "<br/><br/>";
		 						
		 				if(!empty($itemSize[0]))
		 					echo "Item size :" . $itemSize[0] . "<br/><br/>";
		 					
		 				if(!empty($packaging[0]))
		 					echo "Packaging :" . $packaging[0] . "<br/><br/>";
		 					
		 				if(!empty($patent[0]))
		 					echo "Patent :" . $patent[0] . "<br/><br/>";


                            echo "</div>";
                        echo  "</a>";
 			
 ?>