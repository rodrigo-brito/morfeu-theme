<?php get_header(); ?>
	</div><!-- .row -->
</div><!-- #wrapper -->
<!-- slider for latest posts -->
<?php get_template_part('slider'); ?>
<div id="wrapper" class="container">
	<div class="row">
		<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
			<div id="blog" class="row">
				<hr>
				<?php get_template_part('loop'); ?>
			</div><!-- .blog -->
		</main><!-- #content -->
	</div><!-- .row -->
</div><!-- #wrapper -->
<!-- For close in footer.php -->
<div class="container">
	<div class="row">
<?php
get_footer();
