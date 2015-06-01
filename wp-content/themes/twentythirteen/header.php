<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-media.js"></script>
	
</head>

<body <?php body_class(); ?>>
		<header role="banner" class="site-header" id="masthead">
			<div class="container clearfix">
				<a class="pull-left logo" rel="home" title="<?php bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
					<h1 class="site-title">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" align="<?php bloginfo( 'name' ); ?>" />
					</h1>
					<h2 style="display: none" class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>

			<div class="nav-menu pull-right">
				<a class="toggle-mobile">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="menu">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menus', 'menu_id' => 'primary-menu' ) ); ?>
				
				</div>
			</div>
			</div>
			
		</header>
