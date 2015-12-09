<?php
/**
 * Footer section template.
 * @package WordPress
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */
?>
	</div><!-- #main .wrapper -->

	<?php global $productPage;   if($productPage == "a") { ?>
	
	<div id = "slider-pdf">
				<?php 
							if($_REQUEST['salesProgram'] == '1')
							{
								// echo "<img src = 'http://www.qcsasia.com/wp-content/uploads/2014/05/Sales-programm-speech-V2-page0001-e1400581447934.jpg' />";
								echo "<img src = 'http://www.qcsasia.com/wp-content/uploads/2014/05/Sales-programm-speech-V8.png' />";
							}
							else if($_REQUEST['sort'] == 'program')
							{
								
							}
							else 
							{
								//$idSlideshow = rwmb_meta( 'PRODUCT_id_slideshow');
								
								global $idSlideshow;
								global $displaySlideshow;
								
								if(!empty($idSlideshow) && $displaySlideshow)
								{
			
											
									echo "<h2 class = 'title-slider;' style = 'font-size:20px;'>Our shipping sample</h2>";

									
									echo "<br/>";
									
									putRevSlider($idSlideshow);
								}
							}
						
				?>
</div>


<br/>
<span class="author">QCS Asia</span>

<?php } ?>

	<footer id="colophon" role="contentinfo">
		<div class="site-info">
		<div class="footercopy"><?php echo get_theme_mod( 'textarea_copy', 'custom footer text left' ); ?></div>
		<div class="footercredit"><?php echo get_theme_mod( 'custom_text_right', 'custom footer text right' ); ?></div>
		</div><!-- .site-info -->
		</footer><!-- #colophon --><div class="clear"></div>
		
		<br/>
		
		<div style = "min-width:15%;text-align:center;float:left;" class = "footer-logo">
			<img src = "http://www.qcsasia.com/wp-content/uploads/2014/11/caefi.png" style = "height:86px;"/>
		</div>
		
		<div style = "min-width:15%;text-align:center;float:left;" class = "footer-logo">
			<img src = "http://www.qcsasia.com/wp-content/uploads/2014/11/eppa.png" style = "height:86px;"/>
		</div>
		
		<div style = "min-width:10%;text-align:center;float:left;" class = "footer-logo">
			<img src = "http://www.qcsasia.com/wp-content/uploads/2013/11/promota300.jpg" style = "height:86px;"/>
		</div>
		
		<div style = "min-width:15%;text-align:center;float:left;" class = "footer-logo">
			<img src = "http://www.qcsasia.com/wp-content/uploads/2014/05/sedex_trans.jpg" style = "height:86px;"/>
		</div>
		<div style = "min-width:20%;text-align:center;float:left;" class = "footer-logo">
			<img src = "http://www.qcsasia.com/wp-content/uploads/2014/05/PPAI-logo-QCS.jpg" style = "height:86px;"/>
		</div>

		<div style = "min-width:15%;text-align:center;float:left;" class = "footer-logo">
			<img src = "http://www.qcsasia.com/wp-content/uploads/2014/11/ippag.png" style = "height:86px;"/>
		</div>
		
		<br style = "clear:both;" /><br/>
		
		<div class="site-wordpress" style = "float:none;text-align:center;">Website designed by <a href="http://www.netixy.com/en">Netixy</a></div><!-- .site-info -->
		
		<div class="clear"></div>
		
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>