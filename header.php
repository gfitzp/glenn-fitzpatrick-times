<?php
/**
 * @package WordPress
 * @subpackage Bugis
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'bugis' ), max( $paged, $page ) );
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php 
	$options = get_option('bugis_theme_options');
	if( $options['custom_favicon'] != '' ) : ?>
<link rel="shortcut icon" type="image/ico" href="<?php echo $options['custom_favicon']; ?>" />
<?php endif  ?>
<?php 
	$options = get_option('bugis_theme_options');
	if( $options['custom_apple_icon'] != '' ) : ?>
<link rel="apple-touch-icon" href="<?php echo $options['custom_apple_icon']; ?>" />
<?php endif  ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- enable HTML5 elements in IE7+8 --> 
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->

<?php
	wp_enqueue_script('jquery');
	if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	wp_head();
?>

</head>

<body <?php body_class(); ?>>
	<header id="header">
		<div id="branding" class="clearfix">
			<header id="site-title">
				<?php 
					$options = get_option('bugis_theme_options');
					if( $options['custom_logo'] != '' ) : ?>
					<a href="<?php echo home_url( '/' ); ?>" class="logo"><img src="<?php echo $options['custom_logo']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
				<?php else: ?>
					<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif  ?>
			</header><!-- end site-title -->
			
			<nav id="main-nav" class="clearfix">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- end main-nav -->
			
		</div><!-- end branding -->
	</header><!-- end header -->
			
	<div id="page" class="clearfix">
