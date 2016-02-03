<?php get_header(); ?>

	<main id="content" class="<?php echo odin_classes_page_sidebar(); ?>" tabindex="-1" role="main">
			<?php if ( have_posts() ) : ?>

				<header class="page-header col-md-12">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'odin' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->

				<?php get_template_part('loop'); ?>

			<?php endif; ?>

	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
