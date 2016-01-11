<?php
/*
 * Header Section of Iconic One
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */


// COOKIE
////////////////////////////////////////////////////////

if(!empty($_COOKIE['loginQCS']))
{
	// echo "coockei ON";
	$_SESSION['qcs-isconnect'] = true;
	
	$_SESSION['qcs-type'] = $_COOKIE['qcs-type'];
	
	// echo "type = " . $_SESSION['qcs-type'];
}
else
{
	// echo "coockei OFF";
}

////////////////////////////////////////////////////////


?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1,initial-scale=1.0"  />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="author" href="https://plus.google.com/105432120660907122700/posts" />



<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.1/jquery.jcarousel.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.1/jquery.jcarousel-core.min.js"></script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5861473-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body <?php body_class(); ?> oncontextmenu="return false">
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
	
	<div id = "topbar">
		<a href = "<?php echo get_permalink('12'); ?>">About QCS</a> |
		<a href = "<?php echo get_permalink('676'); ?>">Q&A</a> |
		<a href = "<?php echo get_permalink('756'); ?>">Career </a> | 
		<a href = "<?php echo get_permalink('682'); ?>">Terms & Conditions </a> |
		<a href = "<?php echo get_permalink('34'); ?>">Contact QCS</a>
	</div>
	
			<?php if ( get_theme_mod( 'themonic_logo' ) ) : ?>
		
		<div class="themonic-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'themonic_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		</div>
	<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>	
		<div class="socialmedia">
		<a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> <a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a> <a href="<?php echo get_theme_mod( 'plus_url', 'default_value' ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a> 
		<a href="http://www.linkedin.com/company/qcs-asia-co.-ltd" rel="author" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/coinckeychains/img/linkedin.png" alt="Follow us on LinkedIn"/></a>
		<a href="https://www.youtube.com/user/QCSASIA" rel="author" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/coinkeychains/img/youtube.png" alt="Follow us on Youtube"/></a>
		</div>
	<?php } ?>	

		<?php else : ?>				<a href = "<?php echo esc_url( home_url( '/' ) ); ?>"><img src = "https://www.qcsasia.com/wp-content/uploads/2015/11/logo.png" /></a>
		
		<hgroup>
		
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<br/>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="台灣妍品禮贈品有限公司" rel="home" style = "font-size:26px;line-height: 40px;">台灣妍品禮贈品有限公司</a>
			<br/>
			<a class="site-description" style="line-height:1"><?php bloginfo( 'description' ); ?></a>
			<br/> 
			<a class="site-description" style="font-size:15px !important;">人生苦短，寧缺勿濫</a>
		</hgroup>
		
	
	<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>
		<div class="socialmedia">
		<a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a> <a href="<?php echo get_theme_mod( 'plus_url', 'default_value' ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a> 
		<a href="http://www.linkedin.com/company/qcs-asia-co.-ltd" rel="author" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/coinkeychains/img/linkedin.png" alt="Follow us on LinkedIn"/></a>
		<a href="https://www.youtube.com/user/QCSASIA" rel="author" target="_blank"><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/coinkeychains/img/youtube.png" alt="Follow us on Youtube"/></a>
		</div>
	<?php } ?>	
		<?php endif; ?>

		<nav id="site-navigation" class="themonic-nav" role="navigation" style = "float:left;">
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'themonic' ); ?>"><?php _e( 'Skip to content', 'themonic' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<!-- SEARCH FORM -->
		<!-- ###########################################################################" -->
		
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url(); ?>">
				<div>
					<label class="screen-reader-text" for="s">Search for:</label>
					<input type="text" value="" name="s" id="s"/>
					<input type="submit" id="searchsubmit" value="Search" />
				</div>
		</form>	
		
		<!-- ###########################################################################" -->
			
			

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?><div class="clear"></div>
	</header><!-- #masthead -->
	
	<?php
	
		putRevSlider("test" , "homepage");
	
	
		if(get_the_ID() == '5614') // DISPLAY SLIDESHOW ON GIFT LIST
		{
			putRevSlider("home-gift");
			echo "<br/>";
		}
	
	?>
	
	<?php
	
	$slug = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');
	
	$tabSlugMemberArea = array('sales-program' , 'document-center' , 'online-payment' , 'track-delivery' , 'drop-document' , 'member-area-index');
	
	echo "<span id = 'netixy-breadcrumb'>\n";
	
	//echo "slug = " . $slug . " rush = " . $_REQUEST['rush'];

	
	// FICHE PRODUIT
	/////////////////////////////////////////////////////////////////////////////////
	

	if($slug == 'products')
	{
		
		echo "<a href = '/products/'>All products</a> > ";
		
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		$idSelectedLigne = $_REQUEST['idSelectedLigne'];
		
		
			
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
			
			$category1 = get_term_by('id', $category2->parent , 'productcat');
			
			$ligne = get_term_by('id', $category1->parent , 'productcat');
				
			echo "<a href = '/products/?idSelectedLigne=" . $ligne->term_id . "'>" . $ligne->name . "</a> > ";
			
			echo "<a href = '/products/?idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
				
			echo $category2->name;
				
		}
		else if(!empty($idSelectedCategory1))
		{
			$ligne = get_term_by('id', $category1->parent , 'productcat');
			
			echo "<a href = '/products/?idSelectedLigne=" . $ligne->term_id . "'>" . $ligne->name . "</a> > ";
			
			echo $category1->name;
			
		}
		else if(!empty($idSelectedLigne))
		{
			
			$ligne = get_term_by('id', $idSelectedLigne , 'productcat');
			
			echo $ligne->name;
				
		}
		else 
		{
			
		}
		
	}
	else if (!empty($_REQUEST['s']))
	{
		echo "<a href = '#'>Search</a> > ";
	}
	else if($_REQUEST['idSelectedLigne'] == '13')
	{
		echo "<a href = '/products/'>All products</a> > ";
		bcn_display();
	}
	else if($slug == 'patent-copyright-agreement')
	{
		echo "<a href = '/products/'>All products</a> > ";
		echo "<a href = '/productcat/licence-and-patent-exploitation/?idSelectedLigne=13'>Licence and patent exploitation</a> >";
		bcn_display();
	}
	else if($slug == 'licence-exploitation')
	{
		echo "<a href = '/products/'>All products</a> > ";
		echo "<a href = '/productcat/licence-and-patent-exploitation/?idSelectedLigne=13'>Licence and patent exploitation</a> >";
		bcn_display();
	}
	else if($slug == 'document-center')
	{
	
		echo "<a href = '/member-area-index/'>Member area</a> > ";
		echo "<a href = '/document-center/'>Document center</a> > ";
	
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		$idSelectedLigne = $_REQUEST['idSelectedLigne'];
	
	
			
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		
	
		
		if(!empty($idSelectedCategory2))
		{
				
			$category1 = get_term_by('id', $category2->parent , 'productcat');
				
			$ligne = get_term_by('id', $category1->parent , 'productcat');
	
			echo "<a href = '/document-center/?idSelectedLigne=" . $ligne->term_id . "'>" . $ligne->name . "</a> > ";
				
			echo "<a href = '/document-center/?idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
	
			echo $category2->name;
	
		}
		else if(!empty($idSelectedCategory1))
		{
			$ligne = get_term_by('id', $category1->parent , 'productcat');
				
			echo "<a href = '/document-center/?idSelectedLigne=" . $ligne->term_id . "'>" . $ligne->name . "</a> > ";
				
			echo $category1->name;
				
		}
		if(!empty($idSelectedLigne))
		{
				
			$ligne = get_term_by('id', $idSelectedLigne , 'productcat');
				
			echo $ligne->name;
	
		}
		else
		{
				
		}
	
	}
	else if($post->post_type == 'product' && $_REQUEST['rush'] == '1')
	{
	
		//	echo "id = " . $post->ID;
	
		$terms = get_the_terms($post->ID, 'productcat');
	
		$category1 = reset($terms);
	
		//		print_r($category1);
	
		$ligne = get_term_by('id', $category1->parent, 'productcat');
	
		//	print_r($ligne);
	
		// CHECK IF THERE IS ONLY ONE LINE
		/////////////////////////////////////////////////////////////////////////////////
	
		if(empty($ligne))
		{
			$ligne = $category1;
			$category1 = "";
		}
	
		/////////////////////////////////////////////////////////////////////////////////
	
		// CHECK IF THERE IS A SUB CATEGORY
		/////////////////////////////////////////////////////////////////////////////////
	
		$category2 = "";
	
		$vrai_ligne = get_term_by('id', $ligne->parent, 'productcat');
	
	
		if(!empty($vrai_ligne))
		{
			$category2 = $category1;
			$category1 = $ligne;
			$ligne = $vrai_ligne;
		}
	
		/////////////////////////////////////////////////////////////////////////////////
	
		echo "<a href = '/member-area-index/'>Member area</a> > ";
	
		echo "<a href = '/sales-program/?rush=1'>Rush services</a> > \n";
	
		echo "<a href = '/sales-program/?rush=1&idSelectedLigne=" . $ligne->term_id . "'>" . $ligne->name . "</a> > ";
	
		if(!empty($category1))
			echo "<a href = '/sales-program/?rush=1&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
	
		if(!empty($category2))
			echo "<a href = '/sales-program/?rush=1&idSelectedCategory2=" . $category2->term_id . "'>" . $category2->name . "</a> > ";
			
		echo the_title();
	
	
	}
	else if($post->post_type == 'product')
	{
	
	//	echo "id = " . $post->ID;
		
		
		
		if(!empty( $_REQUEST['idSelectedCategory1']))
			$category1= get_term_by('id' , $_REQUEST['idSelectedCategory1'] , 'productcat');
		else 
		{
			$terms = get_the_terms($post->ID, 'productcat');
			
			$category1 = reset($terms);
		}
			
		/////////////////////////////////	
		
//		print_r($category1);
		
		$ligne = get_term_by('id', $category1->parent, 'productcat');
		
	//	print_r($ligne);
	
		// CHECK IF THERE IS ONLY ONE LINE
		/////////////////////////////////////////////////////////////////////////////////
	
		if(empty($ligne))
		{
			$ligne = $category1;
			$category1 = "";
		}
	
		/////////////////////////////////////////////////////////////////////////////////
	
		// CHECK IF THERE IS A SUB CATEGORY
		/////////////////////////////////////////////////////////////////////////////////
	
		$category2 = "";
	
		$vrai_ligne = get_term_by('id', $ligne->parent, 'productcat');
	
	
		if(!empty($vrai_ligne))
		{
			$category2 = $category1;
			$category1 = $ligne;
			$ligne = $vrai_ligne;
		}
	
//		echo "cat1 = " .$category1->name;
	
	
		/////////////////////////////////////////////////////////////////////////////////
		
		if(!empty($_REQUEST['sort']))
		{
			
			if($_REQUEST['sort'] == 'function')
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "'>Sort by function</a> > \n";
			else if($_REQUEST['sort'] == 'delivery')
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "'>Sort by delivery time</a> > \n";
			else if($_REQUEST['sort'] == 'logo')
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "'>Sort by logo process</a> > \n";
			else if($_REQUEST['sort'] == 'design')
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "'>Sort by design</a> > \n";
			else if($_REQUEST['sort'] == 'cheap')
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "'>Sort by cheap items</a> > \n";
			else if($_REQUEST['sort'] == 'patent')
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "'>Sort by patent items</a> > \n";
			else if($_REQUEST['sort'] == 'program')
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "'>Sort by program items</a> > \n";
			else if($_REQUEST['sort'] == 'new')
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "'>New products</a> > \n";

			if(!empty($category1))
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
			
			if(!empty($category2))
				echo "<a href = '/search/?sort=" . $_REQUEST['sort'] . "&idSelectedCategory2=" . $category2->term_id . "'>" . $category2->name . "</a> > ";
		}
		else
		{
			echo "<a href = '/products/'>All products</a> > ";
		
			echo "<a href = '/products/?idSelectedLigne=" . $ligne->term_id . "'>" . $ligne->name . "</a> > ";
		
			if(!empty($category1))
				echo "<a href = '/products/?idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
		
			if(!empty($category2))
				echo "<a href = '/products/?idSelectedCategory2=" . $category2->term_id . "'>" . $category2->name . "</a> > ";
		}
			
		echo the_title();
		
		
	
	}

	else if($slug == 'category-list-2')
	{
		echo "<a href = '".site_url()."/category-list-2'>All promotional products</a> > \n";
	
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
	
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
	
		if(!empty($idSelectedCategory2))
		{
	
			$category1 = get_term_by('id', $category2->parent , 'productcat');
	
			echo "<a href = '/category-list-2/?idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
	
			echo $category2->name;
	
		}
		else if(!empty($idSelectedCategory1))
		{
	
			echo $category1->name;
	
		}
	
	}
	else if($_REQUEST['sort'] == 'function')
	{
		echo "<a href = '".site_url()."/search/?sort=function'>Sort by function</a> > \n";
		
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];

		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
				
			$category1 = get_term_by('id', $category2->parent , 'productcat');
				
			echo "<a href = '/search/?sort=function&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
		
			echo $category2->name;
		
		}
		else if(!empty($idSelectedCategory1))
		{
				
			echo $category1->name;
				
		}
		
	}
	else if($_REQUEST['sort'] == 'delivery')
	{
		echo "<a href = '".site_url()."/search/?sort=delivery'>Sort by delivery time</a> > \n";
	
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
		
			$category1 = get_term_by('id', $category2->parent , 'productcat');
		
			echo "<a href = '/search/?sort=delivery&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
		
			echo $category2->name;
		
		}
		else if(!empty($idSelectedCategory1))
		{
		
			echo $category1->name;
		
		}

	}
	else if($_REQUEST['sort'] == 'logo')
	{
		echo "<a href = '".site_url()."/search/?sort=logo'>Sort by logo process</a> > \n";
	
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
		
			$category1 = get_term_by('id', $category2->parent , 'productcat');
		
			echo "<a href = '/search/?sort=logo&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
		
			echo $category2->name;
		
		}
		else if(!empty($idSelectedCategory1))
		{
		
			echo $category1->name;
		
		}
		

	}
	else if($_REQUEST['sort'] == 'cheap')
	{
		echo "<a href = '".site_url()."/search/?sort=cheap'>Sort by cheap items</a> > \n";
	
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
		
			$category1 = get_term_by('id', $category2->parent , 'productcat');
		
			echo "<a href = '/search/?sort=cheap&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
		
			echo $category2->name;
		
		}
		else if(!empty($idSelectedCategory1))
		{
		
			echo $category1->name;
		
		}

	}
	else if($_REQUEST['sort'] == 'design')
	{
		echo "<a href = '".site_url()."/search/?sort=logo'>Sort by design</a> > \n";
	
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
		
			$category1 = get_term_by('id', $category2->parent , 'productcat');
		
			echo "<a href = '/search/?sort=design&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
		
			echo $category2->name;
		
		}
		else if(!empty($idSelectedCategory1))
		{
		
			echo $category1->name;
		
		}
		
	
	}
	else if($_REQUEST['sort'] == 'patent')
	{
		echo "<a href = '".site_url()."/search/?sort=patent'>Sort by patent</a> > \n";
	
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
		
			$category1 = get_term_by('id', $category2->parent , 'productcat');
		
			echo "<a href = '/search/?sort=patent&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
		
			echo $category2->name;
		
		}
		else if(!empty($idSelectedCategory1))
		{
		
			echo $category1->name;
		
		}
		

	}
	else if($_REQUEST['sort'] == 'program')
	{
		echo "<a href = '".site_url()."/search/?sort=program'>Sort by program</a> > \n";
		
		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
		
			$category1 = get_term_by('id', $category2->parent , 'productcat');
		
			echo "<a href = '/search/?sort=program&idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
		
			echo $category2->name;
		
		}
		else if(!empty($idSelectedCategory1))
		{
		
			echo $category1->name;
		
		}
	

	}
	else if($slug == 'sales-program')
	{
		
		echo "<a href = '/member-area-index/'>Member area</a> > ";
		
		echo "<a href = '".site_url()."/sales-program'>Rush service</a> > \n";

		$idSelectedCategory2 = $_REQUEST['idSelectedCategory2'];
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];
		$idSelectedLigne = $_REQUEST['idSelectedLigne'];
		
			
		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		$category2 = get_term_by('id', $idSelectedCategory2 , 'productcat');
		
		if(!empty($idSelectedCategory2))
		{
			
			$category1 = get_term_by('id', $category2->parent , 'productcat');
			
			$ligne = get_term_by('id', $category1->parent , 'productcat');
				
			echo "<a href = '/sales-program/?idSelectedLigne=" . $ligne->term_id . "&rush=1'>" . $ligne->name . "</a> > ";
			
			echo "<a href = '/sales-program/?idSelectedCategory1=" . $category1->term_id . "&rush=1'>" . $category1->name . "</a> > ";
				
			echo $category2->name;
				
		}
		else if(!empty($idSelectedCategory1))
		{
			$ligne = get_term_by('id', $category1->parent , 'productcat');
			
			echo "<a href = '/sales-program/?idSelectedLigne=" . $ligne->term_id . "&rush=1'>" . $ligne->name . "</a> > ";
			
			echo $category1->name;
			
		}
		else if(!empty($idSelectedLigne))
		{
			
			$ligne = get_term_by('id', $idSelectedLigne , 'productcat');
			
			echo $ligne->name;
				
		}
		else 
		{
			
		}
	
	
	}
	else if($_REQUEST['sort'] == 'new')
	{
		echo "<a href = '".site_url()."/search/?sort=new'>New products</a> > \n";
		
		$idSelectedCategory1 = $_REQUEST['idSelectedCategory1'];

		$category1 = get_term_by('id', $idSelectedCategory1 , 'productcat');
		
		if(!empty($idSelectedCategory1))
		{
			echo $category1->name;
		}

	
	}
	else if(wp_get_referer() == 'http://www.qcsasia.com/search/?sort=new' && $post->post_type == 'product')
	{
		echo "<a href = '".site_url()."/search/?sort=new'>New products</a> > \n";
		
		echo the_title();
	} // wp_get_referer() == 'http://www.qcsasia.com/giftsandsouvenirs/' && 
	else if($slug == 'giftsandsouvenirs')
	{
		echo "<a href = '".site_url()."/giftsandsouvenirs/'>Gifts & Souvenirs</a> > \n";
	
		if(!empty($_REQUEST['idTheme']))
		{
			$theme = get_post($_REQUEST['idTheme']);
				
			echo "<a href = '".site_url()."/giftsandsouvenirs/?idTheme=" . $_REQUEST['idTheme'] . "'>" . $theme->post_title . "</a>\n";
		}
	

	}
	else if($post->post_type == 'gift')
	{
		echo "<a href = '".site_url()."/giftsandsouvenirs/'>Gifts & Souvenirs</a> > \n";
		
		if(!empty($_REQUEST['idTheme']))
		{
			$theme = get_post($_REQUEST['idTheme']);
			
			echo "<a href = '".site_url()."/giftsandsouvenirs/?idTheme=" . $_REQUEST['idTheme'] . "'>" . $theme->post_title . "</a> > \n";
		}
		
		echo the_title();
	}
	
	else if($slug == 'fiche-document-center' && !empty($_REQUEST['idProduct']))
	{
	
		$idProduct = $_REQUEST['idProduct'];
		
		$terms = get_the_terms($idProduct , 'productcat');
	
		$category1 = reset($terms);
	
		$ligne = get_term_by('id', $category1->parent, 'productcat');
	
		// CHECK IF THERE IS ONLY ONE LINE
		/////////////////////////////////////////////////////////////////////////////////
	
		if(empty($ligne))
		{
			$ligne = $category1;
			$category1 = "";
		}
	
		/////////////////////////////////////////////////////////////////////////////////
	
		// CHECK IF THERE IS A SUB CATEGORY
		/////////////////////////////////////////////////////////////////////////////////
	
		$category2 = "";
	
		$vrai_ligne = get_term_by('id', $ligne->parent, 'productcat');
	
	
		if(!empty($vrai_ligne))
		{
			$category2 = $category1;
			$category1 = $ligne;
			$ligne = $vrai_ligne;
		}
	
	
		/////////////////////////////////////////////////////////////////////////////////
		
		echo "<a href = '/member-area-index/'>Member area</a> > ";
	
		echo "<a href = '/document-center/'>Document center</a> > ";
	
		echo "<a href = '/document-center/?idSelectedLigne=" . $ligne->term_id . "'>" . $ligne->name . "</a> > ";
	
		// IN DOCUMENT CENTER WE DON'T DISPLAY CATEGORY, ONLY LINES */
		/*
		if(!empty($category1))
			echo "<a href = '/document-center/?idSelectedCategory1=" . $category1->term_id . "'>" . $category1->name . "</a> > ";
	
		if(!empty($category2))
			echo "<a href = '/document-center/?idSelectedCategory2=" . $category2->term_id . "'>" . $category2->name . "</a> > ";
		*/
		
		echo get_the_title($idProduct);
	
	}
	else if(in_array($slug , $tabSlugMemberArea))
	{
		
		echo "<a href = '/member-area-index/'>Member area</a> > ";
		
		bcn_display();
	}
	else
	{
		if(function_exists('bcn_display'))
		{	

			bcn_display();
		}
		
	}
	
	/////////////////////////////////////////////////////////////////////////////////

	echo "</span>\n";

?>
	
	<?php 
	

	
	//echo "ID = " . $post->ID;
	//echo "Title = " . the_title();
	
	//if($post->ID)
		/*
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} */
	
	
	?>
	
	
    <?php 
    /*
    if(function_exists('bcn_display'))
    {
    	
    	
		if(strstr($_SERVER['REQUEST_URI'] , "product") || strstr($_SERVER['REQUEST_URI'] , "products"))
		{
			echo '<div class="breadcrumbs">';
			echo "<a href = '" .  get_home_url() . "'>All products</a>  &gt;";
			
			if(!empty($selectedLigne))
			{
				echo "<a href = '" .  get_home_url() . "'>All products</a>  &gt;";
			}
			else
			{
				bcn_display();
			}
			
       		echo "</div>";
		}
		
		
    }
    */
    ?>
	
	
	
	<div id="main" class="wrapper">