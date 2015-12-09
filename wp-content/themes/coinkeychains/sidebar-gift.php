<center>

<div class = "sidebar-product">

<?php 
	
	wp_reset_postdata();
	
	$linkToFile = rwmb_meta( 'GIFT_pdf_file', '' , $post->ID);
	
	$images = rwmb_meta( 'GIFT_image_situation', 'type=image' , $post->ID);

	if(count($images) > 0)
	{
	   	foreach ( $images as $image )
	   	{
	  		 echo "<img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process' />";
	   	}
	   	
	   	echo "<hr/>";

	}

?>


	<div style = "text-align:center;">


	<p style = "width:100px;float:left;text-align:center;">
		<a target = "_BLANK" href = "?page_id=679"><img src = "<?php echo get_bloginfo('url') ?>/wp-content/themes/coinkeychains/img/icon-document-center-70.jpg" /></a>
		<br/><a target = "_BLANK" href = "?page_id=679/" style = "text-align:right;margin-left:8px;">Pictures items</a>
		<br/><br/>
		
	</p>
	



	<p style = "width:100px;float:left;text-align:center;">
		<a target = "_BLANK" href = "?page_id=34&subject=<?php the_title(); ?>"><img src = "<?php echo get_bloginfo('url') ?>/wp-content/themes/coinkeychains/img/icon-contact-us-70.jpg" /></a>
		<br/><a href = "?page_id=34&subject=<?php the_title(); ?>">Contact Us</a>
	</p>
	

	<?php 
		
		$file = rwmb_meta( 'GIFT_pdf_file', '' , $post->ID);
		
		$file = str_replace("www" , "dl" , $file);
	
	?>
	<p style = "width:100px;float:left;text-align:center;">
		<a target = "_BLANK" href = "<?php echo $file; ?>"><img src = "<?php echo get_bloginfo('url') ?>/wp-content/themes/coinkeychains/img/icon-print-70.jpg" /></a>
		<br/>
		<a  target = "_BLANK" href = "<?php echo $file; ?>">Print it</a>
	</p>
	
	<p style = "clear:left;text-align:center;">
		<?php if(!empty($linkToFile)) { ?>
		<a target = "_BLANK" href = "<?php echo $linkToFile; ?>">Download the PDF datasheet</a>
		<?php } ?>
	</p>
	
	</div>



<!-- YOU MIGHT ALSO LIKE -->

<?php 

	$salesProgram = $_REQUEST['salesProgram'];

	if($salesProgram != '1')
	{
		echo '<hr style = "clear:both"/>';
		
		$tabImage = rwmb_meta( 'GIFT_also_like', 'type=image' , $post->ID);
		
		if(count($tabImage) > 0)
		{
			echo "<span style = 'color:red;font-weight:bold;'>You might also like</span>";
			
			echo "<br/><br/>";
			
			foreach ( $tabImage as $image )
			{
		   	//	$image['url'] = str_replace("coinkeychain.com/softpvckeychain" , "softpvckeychain.com" , $image['url']);
		   		
		  	 	echo "<a href='{$image['description']}' title='{$image['title']}' rel='thickbox'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}'  /></a>";
				echo "<br/>";
		  	 	echo rwmb_meta( 'GIFT_caption_might_also_like' );
			}
		}
	}

?>


</div>

</center>

