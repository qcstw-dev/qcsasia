<?php 	
/**
 * Template Name: Member Area Index 
 * The template for displaying products.
 *
 */

if (empty($_SESSION['qcs-isconnect']))
{
 	header('Location:'.$_SERVER['HTTP_HOST'].'/?page_id=679');
    exit();
}

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php
	
 			
 			// DOCUMENT CENTER /////////////////////////////////////////////////////////////////////////
 			////////////////////////////////////////////////////////////////////////////////////////////
 			
 			echo "<div class = 'cartouche-categorie' style = 'height:190px;margin-bottom:10px;background: #F3F3F3;'>";
	    	
 				echo "<a class = 'lienThumbnailCategory-1' href = '?page_id=2890' style = 'text-decoration:none'>";
 					
 					echo "<img src = '" . get_bloginfo('url') . "/colors/icone-member-area/document-center.png' style = 'float:left;margin:5px;padding:0px;'/>";
 				
 					echo "<br/>";
 					
 					echo  "<center><h2>Document Center</h2></center>";
 					
 					echo "<br/>";
 					
 					echo "In this area, you can download our standard documents in editable high definition to use as sales tools :";

 					echo "<br/><br/>";
 					
 					echo "<ul style = 'list-style-type:disc;'>";

					echo "<li style = 'padding:1px;'>Product picture high definition (.psd/photoshop)</li>";
					
					echo "<li style = 'padding:1px;'>Price list (.ai/Illustrator)</li>";
					
					echo "<li style = 'padding:1px;'>Digital drawing (.cdr/corel draw)</li>";
					
					echo "<li style = 'padding:1px;'>Certification (.pdf)</li>";
					
					echo "<li style = 'padding:1px;'>Patent (.pdf)</li>";
					
					echo "<li style = 'padding:1px;'>Logo standard (.crd/corel draw)</li>";
					
					echo "</ul>";
 					
 					echo "<br/>";
 					
 				echo "</a>";
 					
 			echo "</div>";
 			
 			// SALES / SUPPLIER PROGRAM ////////////////////////////////////////////////////////////////
 			////////////////////////////////////////////////////////////////////////////////////////////
 			
 			echo "<div class = 'cartouche-categorie' style = 'height:190px;margin-bottom:10px;background: #F3F3F3;'>";
	    	
 				echo "<a class = 'lienThumbnailCategory-1' href = '?page_id=2730' style = 'text-decoration:none'>";
 					
 					echo "<img src = '" . get_bloginfo('url') . "/colors/icone-member-area/program.png' style = 'float:left;margin:5px;padding:0px;margin-right:30px;'/>";
 				
 					echo "<br/>";
 					
 					echo  "<center><h2>Rush service / Supplier program</h2></center>";
 					
 					echo "<br/>";
 					
 					echo "Take advantage of our sales program: ";

 					echo "<br/><br/>";
 					
 					echo "<ul style = 'list-style-type:disc;'>";

					echo "<li style = 'padding:1px;'>Pre-determined product selection</li>";
					
					echo "<li style = 'padding:1px;'>Uniformized order processing</li>";
					
					echo "<li style = 'padding:1px;'>Very low MOQ</li>";
					
					echo "<li style = 'padding:1px;'>Extra short delivery time</li>";
					
					echo "</ul>";
 					
 					echo "<br/>";
 					
 					echo "Based on a long term partnership …";
 					
 				echo "</a>";
 					
 			echo "</div>";
 			
 			// ONLINE PAYMENT
 			////////////////////////////////////////////////////////////////////////////////////////////
 			
 			echo "<div class = 'cartouche-categorie' style = 'height:190px;margin-bottom:10px;background: #F3F3F3;'>";
 			
 				echo "<a class = 'lienThumbnailCategory-1' href = '?page_id=754' style = 'text-decoration:none'>";
 					
 					echo "<img src = '" . get_bloginfo('url') . "/colors/icone-member-area/paypal.png' style = 'float:left;margin:5px;padding:0px;'/>";
 				
 					echo "<br/>";
 					
 					echo  "<center><h2>Online payment</h2></center>";
 					
 					echo "<br/>";
 					
 					echo "Use your paypal account to pay your order on our paypal (secured connexion)";

 					echo "<br/><br/>";
 					
 					echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">';
					echo '<input type="hidden" name="cmd" value="_s-xclick">';
					echo '<input type="hidden" name="hosted_button_id" value="3752716">';
					echo '<center><img src = "' . esc_url( home_url( '/' ) ) . 'colors/images/paypal-small.png" style = "width:229px;height:30px;" /></center>';
					echo "<br/><br/>";
					echo '<center><input type="submit" name="submit" alt="PayPal - The safer, easier way to pay online." style="padding:5px;" id = "searchsubmit"></center>';
					
					echo '<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" style = "width:1px;height:1px;">';
					echo '</form>';

					
					echo "</ul>";
 					
 					echo "<br/>";
 					
 				echo "</a>";
 					
 			echo "</div>";
 			
 			// CHAT WITH A SALE
 			////////////////////////////////////////////////////////////////////////////////////////////
 			/*
 			echo "<div class = 'cartouche-categorie' style = 'height:190px;margin-bottom:10px;'>";
	    	
 				echo "<a class = 'lienThumbnailCategory-1' href = '' style = 'text-decoration:none'>";
 					
 					echo "<img src = '" . get_bloginfo('url') . "/colors/icone-member-area/program.png' style = 'float:left;margin:5px;padding:0px;'/>";
 				
 					echo "<br/>";
 					
 					echo  "<center><h2>Chat with a sale</h2></center>";
 					
 					echo "<br/>";
 					
 					echo "You have any question or inquiry? Connect to speak in live with a sales.";
 					
 					echo "<br/>";
 					
 					echo "Chat opening hours: 9:00am-12:30pm and 13:30pm-18:00pm (Time zone: UTC+ 08:00)";
 					
 				echo "</a>";
 					
 			echo "</div>";
 			*/
 			
 			// TRACK YOUR DELIVERY
 			////////////////////////////////////////////////////////////////////////////////////////////
 			
 			echo "<div class = 'cartouche-categorie' style = 'height:190px;margin-bottom:10px;background: #F3F3F3;'>";
 			
 				echo "<a class = 'lienThumbnailCategory-1' href = '?page_id=2879' style = 'text-decoration:none'>";
 					
 					echo "<img src = '" . get_bloginfo('url') . "/colors/icone-member-area/tracking.png' style = 'float:left;margin:5px;padding:0px;'/>";
 				
 					echo "<br/>";
 					
 					echo  "<center><h2>Track your delivery</h2></center>";
 					
 					echo "<br/>";
 					
 					echo "Please type type the parcel number provided by our sale agent: ";
 					echo "<br/><br/>";
 					
 					echo "<form  target='_blank' action = 'https://www.fedex.com/fedextrack/?' >";
 						echo "Shipper :";
 						echo "<select><option>Fedex</option></select>";
 						echo "&nbsp;&nbsp;&nbsp;";
 						echo "<input type = 'text' name = 'trackingnumber' id = 'trackingnumber'>";
 						echo "&nbsp;&nbsp;&nbsp;";
 						echo "<br/><br/>";
 						echo "<center><input id = 'searchsubmit' type = 'submit' value = 'See my delivery' style = 'padding:5px;'></center>";
 					echo "</form>";
 				

 					echo "<br/><br/>";
 					
 					echo "<br/>";
 					
 				echo "</a>";
 					
 			echo "</div>";
 			
 			// DROP A DOCUMENT
 			////////////////////////////////////////////////////////////////////////////////////////////

 			echo "<div class = 'cartouche-categorie' style = 'height:190px;margin-bottom:10px;background: #F3F3F3;'>";
	    	
 				echo "<a class = 'lienThumbnailCategory-1' href = '?page_id=2882' style = 'text-decoration:none'>";
 					
 					echo "<img src = '" . get_bloginfo('url') . "/colors/icone-member-area/icone-drop-doc.png' style = 'float:left;margin:5px;padding:0px;'/>";
 				
 					echo "<br/>";
 					
 					echo  "<center><h2>Drop a document</h2></center>";
 					
 					echo "<br/>";
 					
 					echo "You want to send us an outsized document, please upload it through this easy to use platform.";
 					
 					echo "<br/>";

					echo "Please name your document correctly with your company name and the topic of the document";
					
					echo "<br/><br/>";
					
					echo "<center>";
					echo "<a href = '?page_id=2882'><input id = 'searchsubmit' type = 'submit' value = 'Drop a document' style = 'padding:5px;'></a>";
					echo "</center>";
 					
 				echo "</a>";
 					
 			echo "</div>";
 			

?>



		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>