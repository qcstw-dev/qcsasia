
<script type="text/javascript">
(function($) {
    $(function() {

   	 	$('.jcarousel').jcarousel();
     
        $('.jcarousel-control-prev')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .on('jcarouselcontrol:active', function() {
                $(this).removeClass('inactive');
            })
            .on('jcarouselcontrol:inactive', function() {
                $(this).addClass('inactive');
            })
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .jcarouselPagination();
        
    });
})(jQuery);
</script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php 
					
					$idProduct = $post->ID;
					
					?>
				
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
				
					<!-- CARTOUCHE ################################################################################### -->
					<?php require_once("cartouche-gift.php"); ?>
					<!-- FIN CARTOUCHE ############################################################################### -->
												
					<br style = "clear:both;">
					
					<!-- THEME RESULT ######################################################################### -->
					<?php 
						require_once("theme-results.php"); 
					?>
					<!-- FIN THEME RESULT ##################################################################### -->
					
					<br style = "clear:both;">
						
					<!-- THEME ###################################################################################"-->
					<?php require_once("theme.php"); ?>
					<!-- FIN THEME ###################################################################################"-->
					
					<br style = "clear:both;">
						
					<!-- DISPLAY OPTIONS ###################################################################################"-->
					<?php require_once("display-options.php"); ?>
					<!-- FIN DISPLAY OPTOINS ###################################################################################"-->
			
					<br style = "clear:both;"/>
					<hr/>
				
</article><!-- #post -->

<div id = "slider-pdf">
<?php 

				wp_reset_postdata();

				$idSlideshow = rwmb_meta( 'GIFT_id_slideshow' , $idProduct);

				if(!empty($idSlideshow))
				{
					echo "<h2 class = 'title-slider'>Our shipping sample</h2>";
					echo "<br/>";
					
					putRevSlider($idSlideshow);
				}
		
?>
</div>

<br/>
<span class="author">QCS Asia</span>
<span class="date updated">Published on <?php the_time('F S, Y'); ?></span>