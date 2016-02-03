<?php get_header(); ?>

	<div id="primary" class="<?php echo odin_classes_page_sidebar(); ?>">
		<main id="main-content" class="site-main" role="main">
			<?php get_template_part('loop'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
