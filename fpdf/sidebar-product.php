
<?php if(!empty( $post->post_parent)) // SI DANS SOUS PRODUIT ALORS ON AFFICHE SIDEBAR NORMAL AVEC MEMBER AREA
{
	//echo "dans if";
	//$post =  get_post($post->post_parent); 
	
	get_sidebar();
	
	?>
	
	
<?php } else { ?> 

<center>

<div style = "margin:20px" class = "product_sidebar">

<?php 

	$images = rwmb_meta( 'PRODUCT_image_situation', 'type=image' , $post->ID);
					    
   	foreach ( $images as $image )
   	{
  		 echo "<td><a href='{$image['full_url']}' title='{$image['title']}' rel='thickbox'><img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' class = 'product_image_logo_process' /></a></td>";
   	}

?>
<br/><br/><br/><br/>

<?php   

    $colors = rwmb_meta('PRODUCT_colors', 'type=checkbox_list' , $post->ID);
    
    if(count($colors) > 0)
    {
    	echo "<h2 style = 'clear:none;'>Colors available</h2>";
		echo "<br/>";
		
	    foreach($colors as $color)
	    {
	    	echo "<img src = '/colors/" . $color . ".png'/>";
	    }
	    
	    $files = rwmb_meta( 'PRODUCT_datasheet_file', 'type=file' , $post->ID);
	    
	    $linkToFile = "";
	    
	    foreach ( $files as $info )
	    {
	    	$linkToFile = $info['url'];
	    }
	    
	    echo "<br/><br/><br/>";
	    
    }
    
?>



<hr/>

<br/><br/><br/>

<a target = "_BLANK" href = "http://www.qcsasia.com/members/">Document center</a>
<br/><br/>
<?php if(!empty($linkToFile)) { ?>
<a target = "_BLANK" href = "<?php echo $linkToFile; ?>">Download the PDF datasheet</a>
<br/><br/>
<?php } ?>
<a href = "/contact-us/?subject=<?php the_title(); ?>">Contact Us</a>
<br/><br/><br/>

<div id = "print_btn">
	<a target = "_BLANK" href = "/fpdf/print.php?idProduct=<?php the_ID(); ?>"><img src = "http://www.coinkeychain.com/wp-content/uploads/2013/12/15843350-icone-de-l-39-imprimante-sur-le-bouton-vert-brillant.jpg" /></a>
	<br/>
	<a href = "/fpdf/print.php?idProduct=<?php the_ID(); ?>">PRINT</a>
</div>

</div>

</center>

<?php } ?> 

