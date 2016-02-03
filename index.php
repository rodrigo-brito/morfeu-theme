<?php get_header(); ?>
	<main id="content" class="<?php echo odin_classes_page_sidebar(); ?>" tabindex="-1" role="main">
		<?php get_template_part('loop'); ?>
	</main><!-- #content -->
<?php
get_sidebar();
get_footer();
