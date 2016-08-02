<?php
/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';


if ( ! function_exists( 'morfeu_setup_features' ) ) {

	/**
	 * Setup theme features.
	 */
	function morfeu_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'morfeu', get_template_directory() . '/languages' );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'editor-style.css' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'morfeu' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Add custom header suport.
		 */
		add_theme_support( 'custom-header', array('header-text' => false) );

		/**
		 * Add feed link suport.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add custom background suport.
		 */
		add_theme_support( 'custom-background' );

		/**
		 * Add support for infinite scroll - Jetpack.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'loop-itens',
				'wrapper'        => false,
				'posts_per_page' => get_option('posts_per_page')
			)
		);

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add suport for custom logo in customizer
		 */
		add_theme_support( 'custom-logo' );
	}
}

add_action( 'after_setup_theme', 'morfeu_setup_features' );

/**
 * Register widget areas.
 */
function morfeu_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'morfeu' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'morfeu' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'morfeu_widgets_init' );

/**
 * Load site scripts.
 */
function morfeu_enqueue_scripts() {

	$template_url = get_template_directory_uri();

	// Loads morfeu main stylesheet.
	wp_enqueue_style( 'morfeu-style', get_stylesheet_uri(), array(), null, 'all' );

	//Html5Shiv
	wp_enqueue_script( 'morfeu-html5shiv', $template_url . '/assets/js/polyfill.min.js.js' );
    wp_script_add_data( 'morfeu-html5shiv', 'conditional', 'lt IE 9' );

	// General scripts.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		// Scroll reveal.
		wp_enqueue_script( 'scroll-reveal', $template_url . '/assets/js/libs/scrollreveal.js', array(), null, true );

		// Bootstrap.
		wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/bootstrap.min.js', array( 'jquery' ), null, true );

		// FitVids.
		wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array( 'jquery' ), null, true );

		// Main jQuery.
		wp_enqueue_script( 'morfeu-main', $template_url . '/assets/js/main.js', array( 'jquery' ), null, true );
	} else {
		// Grunt main file with Bootstrap, FitVids and others libs.
		wp_enqueue_script( 'morfeu-main-min', $template_url . '/assets/js/scripts.min.js', array( 'jquery' ), null, true );
	}

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'morfeu_enqueue_scripts', 1 );

/**
 * Morfeu Custom Logo
 */
function morfeu_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
		the_custom_logo();
	} else { ?>
		<a class="navbar-brand clearfix" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<h1 class='site-title'><?php bloginfo( 'name' ); ?></h1>
		</a>
	<?php }
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';