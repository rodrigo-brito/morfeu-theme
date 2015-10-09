<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->

	<!-- Open Sans - Google Fonts -->
	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header role="banner">

		<nav id="main-navigation" class="navbar navbar-default" role="navigation">
			<div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
					<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
		          <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-header.png" class="logo" alt="Sabara Fotos">
		          </a>
		        </div>
		        <div class="collapse navbar-collapse navbar-right navbar-main-navigation">
					<ul class="nav navbar-nav navbar-right hidden-xs">
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-search"></span></a>
				          <ul class="dropdown-menu clearfix" role="menu">
				            <li class="li-form">
				            	<form method="get" class="navbar-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
									<div class="conteudo-form-busca">
										<input type="search" class="form-control" name="s" id="navbar-search" />
										<button type="submit" class="form-control btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
									</div>
								</form>
							</li>
				          </ul>
				        </li>
				     </ul>
					<a href="<?php echo wp_registration_url(); ?>" class="navbar-btn btn btn-blue btn-primary btn-lg pull-right hidden-xs" href="#">Cadastre-se</a>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'depth'          => 2,
								'container'      => false,
								'menu_class'     => 'nav navbar-nav',
								'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
								'walker'         => new Odin_Bootstrap_Nav_Walker()
							)
						);
					?>
				</div><!-- .navbar-collapse -->

		    </div>
		</nav><!-- #main-menu -->
		<a id="skippy" class="sr-only sr-only-focusable" href="#content">
			<div class="container">
				<span class="skiplink-text"><?php _e( 'Skip to content', 'odin' ); ?></span>
			</div>
		</a>

	</header><!-- #header -->

	<div id="wrapper" class="container">
		<div class="row">
