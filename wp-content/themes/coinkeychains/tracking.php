<?php 	
/**
 * Template Name: Tracking delivery
 * The template for tracking delivery
 *
 */

if (empty($_SESSION['qcs-isconnect']))
{
 	header('Location:http://www.qcsasia.com/?page_id=679');
    exit();
}


get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
		<div class='entry-content' style = 'text-align:justify';>
			<?php
			
			// AFFICHE CONTENT DE LA PAGE QUI UTILISE CATEGORY-LIST EN TANT QUE TEMPLATE
	 		///////////////////////////////////////////////////////////////////////////////////////
	 			
			if ( have_posts() ) : while ( have_posts() ) : the_post();
	   			the_content();
			endwhile; endif;
			
			 ?>
		</div><br/>
			

<?php 

					echo "<center><img src = '" . get_bloginfo('url') . "/colors/icone-member-area/tracking.png' style = 'width:200px;'/>";
 				
 					echo "<br/><br/><br/><br/>";
 					
 					echo  "<center><h2>Track your delivery</h2></center>";
 					
 					echo "<br/><br/>";
 					
 					echo "Please type type the parcel number provided by our sale agent: ";
 					echo "<br/><br/><br/>";
 					
 					echo "<form  target='_blank' action = 'https://www.fedex.com/fedextrack/?' >";
 						echo "Shipper :&nbsp;&nbsp;&nbsp;";
 						echo "<select><option>Fedex</option></select>";
 						echo "&nbsp;&nbsp;&nbsp;";
 						echo "<input type = 'text' name = 'trackingnumber' id = 'trackingnumber'>";
 						echo "&nbsp;&nbsp;&nbsp;";
 						echo "<input id = 'searchsubmit' type = 'submit' value = 'See my delivery' style = 'padding:5px;'>";
 					echo "</form></center>";

?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>