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
<?php
$args = array(
	'numberposts'=>5,            // should show 5 but only shows 3
	'post_type'=>'post',         // posts only
	'meta_key'=>'_thumbnail_id', // with thumbnail
);
$sliders = get_posts( $args ); ?>
<div id="carousel-home" class="carousel slide carousel-fade" data-ride="carousel">
	<!-- Indicators -->
	<?php if($sliders): ?>
	<ol class="carousel-indicators">
	<?php for($i = 0; $i < count($sliders); $i++): ?>
		<li data-target="#carousel-home" data-slide-to="<?php echo $i; ?>" class="<?php echo $i==0?"active":""; ?>"></li>
	<?php endfor; ?>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php
			$active_class = "active";
			foreach ( $sliders as $post ) : setup_postdata( $post );
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<div class="item <?php echo $active_class; ?>" style="background-image: url(<?php echo $large_image_url[0]; ?>);">
					  <div class="carousel-caption">
						<h1><?php the_title(); ?></h1>
						<p><?php the_excerpt(); ?></p>
					  </div>
					</div>
				<?php
				$active_class = "";
			endforeach;
			wp_reset_postdata();
		?>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	<?php endif; ?>
</div>
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
