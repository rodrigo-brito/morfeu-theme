<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	</div>
</div>
<?php get_template_part('slider'); ?>
<div id="wrapper" class="container">
	<div class="row">
		<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
			<div id="blog" class="row">
				<div class="container"  data-sr="enter top">
					<h2><?php _('Latest posts') ?></h2>
					<hr>
				</div>
				<?php get_template_part('loop'); ?>
			</div>
			<!-- /.blog -->
		</main><!-- /#content -->
	</div><!-- .row -->
</div><!-- #wrapper -->

<!-- For close in footer.php -->
<div id="wrapper">
	<div class="row">
<?php
get_footer();
