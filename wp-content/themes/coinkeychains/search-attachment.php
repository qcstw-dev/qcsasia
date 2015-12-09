<?php 	
/**
 * Template Name: Search Attacment
 * The template for displaying products.
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
	
		<form action = "" method = "GET" id = "member-frm" style = "width:100%;"> 
				
				<input type = "hidden" name = "sort" value = "<?php echo $_GET['sort']; ?>" />
				
				<input type = "hidden" name = "page_id" value = "1742" />
			
					
				<h1 style = "color:#359302;font-size:25px;font-weight:normal;text-align:center;font-family:verdana;">Search by design</h1>
				<br/>
					
				Type a brand's name : <input name = "design" type = "text" size = "25" value = "<?php echo $_REQUEST['design'] ?>"/>
				<br/><br/>
					
				
			<br/>
			
			<center><input type = "submit" id = "searchsubmit" value = "Search" style = "padding:5px;" /></center>
			
			
			</form>

<?php

	function randLetter()
	{
	    $int = rand(0,51);
	    $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $rand_letter = $a_z[$int];
	    return $rand_letter;
	}


	if(!empty($_REQUEST['design']))
		$args = array('s' => $_REQUEST['design'] , 'meta_query' => $meta_query , 'post_type' => 'attachment','post_status' => 'any','posts_per_page' => -1,'order' => 'ASC','orderby'=> 'menu_order','paged'=>$paged);
	else
	{
		$randLetter = randLetter();
		$args = array('s' => $randLetter         , 'meta_query' => $meta_query , 'post_type' => 'attachment','post_status' => 'any','posts_per_page' => -1,'order' => 'ASC','orderby'=> 'menu_order','paged'=>$paged);
	}
	
?>


<br/>
<br/>

<div class = "search-result-design">
<?php 
	
		$attachments = new WP_Query( $args );

		if(count($attachments) == 0)
			echo "<p id = 'count' style = 'text-align:center'>No picture found</p>\n";
		else
			echo "<p id = 'count' style = 'text-align:center'>" . $attachments->found_posts . " picture(s) found</p>\n";
		

		$count = 0;	
			
		if ($attachments->have_posts()) :
		
 			while ($attachments->have_posts()) : $attachments->the_post(); 
 			
 			//////////////////////////////////
 			
 		//	echo "AAAA<br/>";
 			
 			
 	//		print_r($attacments);
 			$parent_id = $post->post_parent;
 			$parent_type = get_post_type($parent_id);
 			$parent = get_post($parent_id);
 			
 			//echo "parent_type = " . $parent_type . "<br/<br/>";
 			
 		//	echo "post->post_type = " . $post->post_type . "<br/>";
 		
 		// FIELD ALT
 			// $alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
 			
 			$image_attributes_full = wp_get_attachment_image_src($post->ID , 'full');
 				
 			$width = $image_attributes_full[1];
 				
 			// echo "width = ". $width;
 			
 			
 			if($width == '960' || ($parent_type == 'product' || $parent_type == 'logo-process') && get_post_type($post->ID) != 'product' && $parent->post_status == 'publish')
 			{

 				
	 			
	 			if(strpos(get_the_title() , "SHEET") === FALSE )
	 			{	 			
			 		
	 				$image_attributes = wp_get_attachment_image_src($post->ID);
	 				
			 		//	print_r($image_attributes);

			 			echo "<dl class = 'list-options'>";
			 		//	echo get_post_type($post->ID);
					   		echo "<dt><a href='" . get_permalink($post->ID) . "' rel='thickbox'><img src='" . $image_attributes[0] . "'  class = 'product_image_logo_process'/></a></dt>";
					    	echo "<dd>" . get_the_title();  "</dd>";
						echo "</dl>";
						
						$count++;
						
	 			}
				
 			}

			//////////////////////////////////							
										
 			
			endwhile; 

 		 endif;
 		 
 		 if($count == 0)
 		 	$messageCount = "No picture found";
 		 else
 		 	$messageCount = $count . " picture(s) found";

?>

		<script type="text/javascript" charset="utf-8">
		
			jQuery(document).ready(function()
		   {
				jQuery('#count').html('<?php echo $messageCount; ?>');
		   });
		
		</script>

</div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php  get_sidebar(); ?>
<?php  get_footer(); ?>