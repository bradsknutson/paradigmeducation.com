<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paradigm
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title(); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/favicon.png" />

<?php wp_head(); ?>
</head>

<body <?php body_class('pre-load'); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jist' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding pull-left">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() ?>/img/logo-paradigm.png" alt="<?php bloginfo( 'name' ); ?> logo" /></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() ?>/img/logo-paradigm.png" alt="<?php bloginfo( 'name' ); ?> logo" /></a></p>
			
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="pull-right main-navigation" role="navigation">
			
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'jist' ); ?></button>
            <div id><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'main' ) ); ?></div>
			<div class="search-bar">
				<?php get_search_form(); ?>
			</div>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
