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
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="author" href="https://plus.google.com/105432120660907122700/posts" />



<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.1/jquery.jcarousel.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jcarousel/0.3.1/jquery.jcarousel-core.min.js"></script>


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
<body <?php body_class(); ?>>
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

		<?php else : ?>				<a href = "<?php echo esc_url( home_url( '/' ) ); ?>"><img src = "http://www.qcsasia.com/wp-content/uploads/2014/04/IMG_53171.jpg" /></a>
		
		<hgroup>
		
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<br .../> <a class="site-description" style=''><?php bloginfo( 'description' ); ?></a>
		</hgroup>
		
	
	<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>
		<div class="socialmedia">
		<a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="Follow us on Twitter"/></a> <a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="Follow us on Facebook"/></a> <a href="<?php echo get_theme_mod( 'plus_url', 'default_value' ); ?>" rel="author" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/gplus.png" alt="Follow us on Google Plus"/></a> 
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
		
		<form role="search" method="get" id="searchform" class="searchform" action="http://www.qcsasia.com/">
				<div>
					<label class="screen-reader-text" for="s">Search for:</label>
					<input type="text" value="" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="Search" />
				</div>
		</form>	
		
		<!-- ###########################################################################" -->
			
			

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?><div class="clear"></div>
	</header><!-- #masthead -->
	
	<?php putRevSlider("test" , "homepage") ?>
	
	
    <?php if(function_exists('bcn_display'))
    {
    	
    	
		if(strstr($_SERVER['REQUEST_URI'] , "product") || strstr($_SERVER['REQUEST_URI'] , "products"))
		{
			echo '<div class="breadcrumbs">';
			echo "<a href = '" .  get_home_url() . "'>All products</a>  &gt;";
			
       		bcn_display();
       		echo "</div>";
		}
		
		
    }?>
	
	
	
	<div id="main" class="wrapper">