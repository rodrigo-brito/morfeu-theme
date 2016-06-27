<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header role="banner">

		<nav id="main-navigation" class="navbar navbar-default" style="background-image: url('<?php header_image(); ?>')" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'morfeu' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php if ( get_theme_mod( 'morfeu_logo' ) ) : ?>
							<img class="logo" src='<?php echo esc_url( get_theme_mod( 'morfeu_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
						<?php else: ?>
							<h1 class='site-title'><?php bloginfo( 'name' ); ?></h1>
						<?php endif; ?>
					</a>
				</div><!-- .navbar-header -->
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
								</li><!-- .li-form -->
							</ul><!-- .dropdown-menu  -->
						</li><!-- .dropdown -->
					</ul><!-- .nav -->
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
			</div><!-- .container -->
		</nav><!-- #main-menu -->
		<a id="skippy" class="sr-only sr-only-focusable" href="#content">
			<div class="container">
				<span class="skiplink-text"><?php _e( 'Skip to content', 'morfeu' ); ?></span>
			</div>
		</a>
	</header><!-- #header -->

	<div id="wrapper" class="container">
		<div class="row">
