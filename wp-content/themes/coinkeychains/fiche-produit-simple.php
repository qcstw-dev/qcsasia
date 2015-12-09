<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php 

	// SORT BY SALES PROGRAM
	$salesProgram = $_REQUEST['salesProgram'];
					
?>
				
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
						
					</header>

						<?php if(empty( $post->post_parent )) {  // SI PRODUIT PARENT ALORS AFFICHE SEULEMENT CONTENU SANS LES CHAMPS METABOX  ?>
						
						<?php

						$images = rwmb_meta( 'PRODUCT_first_image', 'type=image&size=large' );
						
						$linkFirstImages = rwmb_meta( 'PRODUCT_link_first_image', 'type=image&size=large');
						
						//	print_r($linkFirstImages);
						
						foreach ( $linkFirstImages as $linkFirstImage)
	   					{
	   						//	echo "====================";
	   						//	print_r($linkFirstImage);
	   						//	echo "====================";
	   					}
						    
	    				foreach ( $images as $image )
	   					{
	   						
	   						$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);

	 	   					if(empty($linkFirstImage['url']))
	   							echo "<a target = '_BLANK' href = '{$image['url']}'> <img src='{$image['url']}' alt='{$image['alt']}' class = 'attachment-post-thumbnail wp-post-image'/></a>";
	   						else
	   							echo "<a target = '_BLANK' href = '{$linkFirstImage['url']}'> <img src='{$image['url']}' alt='{$image['alt']}' class = 'attachment-post-thumbnail wp-post-image'/></a>";
	   						
	   					}
	   						
						//echo get_the_post_thumbnail(); 
					?>
					
						
						<div class = "header-text">
							
							<?php the_content(); ?>
						
							
							
							<?php 
							
							$images = rwmb_meta( 'PRODUCT_image_situation', 'type=image' , $post->ID);
					    
   							foreach ( $images as $image )
						   	{
						   		$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);
						   		
						  		 echo "<a href='{$image['full_url']}' title='{$image['title']}' rel='thickbox'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process' /></a>";
						   	}
   	
   							?>
   							
   							</div>
							
							<br/><br/>
							<?php if(!empty($linkToFile)) { ?>
							<a target = "_BLANK" href = "<?php echo $linkToFile; ?>">Download the PDF datasheet</a>
							<?php } ?>
							
							<br/><br/><br/>
							
							<p style = "clear:both;float:left;width:150px;text-align:center;">
								<a target = "_BLANK" href = "http://www.qcsasia.com/members/"><img src = "http://www.softpvckeychain.com/wp-content/uploads/2/2014/01/icon-document-center.jpg" /></a>
								<br/>
								<a target = "_BLANK" href = "http://www.qcsasia.com/members/">Document center</a>
							</p>
							
							<p style = "float:left;width:150px;text-align:center;">
								<a href = "/contact-us/?subject=<?php the_title(); ?>"><img src = "http://www.softpvckeychain.com/wp-content/uploads/2/2014/01/icon-contact-us.jpg" /></a>
								<br/>
								<a href = "/contact-us/?subject=<?php the_title(); ?>">Contact us</a>
							</p>
							
							<p style = "float:left;width:150px;text-align:center;">
								<a target = "_BLANK" href = "/fpdf/print-simple.php?idProduct=<?php the_ID(); ?>"><img src = "http://www.softpvckeychain.com/wp-content/uploads/2/2014/01/icon-print.jpg" /></a>
								<br/>
								<a target = "_BLANK" href = "/fpdf/print-simple.php?idProduct=<?php the_ID(); ?>">Print it</a>
							</p>
						
						<br style = "clear:both;">


						<?php
						
								$displayImageFinishes = rwmb_meta( 'PRODUCT_display_image_finishes');
								
								echo 'displayImageFinishes = ' . $displayImageFinishes;
								
								if($displayImageFinishes == '1')
								{
									echo '<img src = "wp-content/uploads/2014/03/FINISHES.jpg />';
								}
						
						?>


						
						<!-- OPTIONS AVAILABLE ###################################################################################"-->
						<?php 
						
							 $images = rwmb_meta( 'PRODUCT_tab_image_option', 'type=image&size=large' );
							 
							 if(count($images) > 0)
							 {
							 	echo "<hr/>";
								echo "<div class = 'logo-process'>";
								
								if($softEnamel)
										echo "<h2>Logo processes and materials</h2>";
									else
										echo "<h2>Options available</h2>";
										
								echo "<br/>";					
						    
								$i = 0;
								
	    						foreach ( $images as $image )
	   							{
	   								
	   								$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);

	   								echo "<div class = 'option'>";
	   								echo "	<img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process'/>";
	   								echo "	<p><u><center>" . $image['title'] . "</center></u><br/><br/></p>";
	   								echo "</div>";
	   								
	   								$i++;
	   								
	   								if($i % 2 == 0)
	   									echo "<br/>";

	   							}
	   						
	   							echo "</div>";
	   							
							 }
	    
						?>
						
						<!-- FIN OPTIONS ###################################################################################"-->
						
						<br style = "clear:both;"/>
						
						<!-- LOGO PROCESS ###################################################################################"-->
						
						<?php 
						
							$images = rwmb_meta( 'PRODUCT_tab_image_process', 'type=image&size=large' );
						
							if(count($images) > 0)
							{
								echo "<hr/>";
						
								echo "<h2>Logo process</h2>";
								echo "<br/>";
								
								$i = 0;
										    
		    					foreach ( $images as $image )
		   						{
		   							
		   							$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);
		   							
		   							echo "<div class = 'logo-process'>";
		   								echo "	<a href='{$image['description']}' title='{$image['title']}' rel='thickbox'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process'/></a>";
		   								echo "	<p><u><center>" . $image['title'] . "</center></u><br/><br/></p>";
		   							echo "</div>";
		   							
		   							$i++;
		   								
		   							if($i % 2 == 0)
		   								echo "<br/>";
		   								
		   						}
		   						
		   	
	   						
							}
	   							   						
						?>

						
						<!-- FIN LOGO PROCESS ###################################################################################"-->
						
						<br style = "clear:both;"/>
						<hr/>
						<div id = "slider-pdf">
						<?php 
							
							$idSlideshow = rwmb_meta( 'PRODUCT_id_slideshow');
							
							if(!empty($idSlideshow))
							{
								echo "<h2>Our achievements</h2>";
								echo "<br/>";
								
								putRevSlider($idSlideshow);
							}
						
						?>
						</div>
						<?php } else { // SI SOUS PRODUIT ALORS AFFICHE SEULEMENT CONTENU SANS LES CHAMPS METABOX ?>
							<div style = "min-height:400px;">
							<?php the_content(); ?>
							</div>
						<hr/>
						<?php } ?>
				
				</article><!-- #post -->
				
				<br/>
<span class="author">QCS Asia</span>
<span class="date updated">Published on <?php the_time('F S, Y'); ?></span>