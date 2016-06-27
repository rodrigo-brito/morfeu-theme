<?php
	$args = array(
		'numberposts' 	=> 5,
		'post_type' 	=> 'post',
		'meta_key'		=> '_thumbnail_id',
	);
	$sliders = get_posts( $args );
?>
<div id="carousel-home" class="carousel slide carousel-fade" data-ride="carousel">
	<!-- Indicators -->
	<?php if($sliders): ?>
	<ol class="carousel-indicators">
	<?php for($i = 0; $i < count($sliders); $i++): ?>
		<li data-target="#carousel-home" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? "active" : ""; ?>"></li>
	<?php endfor; ?>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php
			$active_class = "active";
			foreach ( $sliders as $post ) : setup_postdata( $post );
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<div class="item <?php echo $active_class; ?>" style="background-image: url(<?php echo $large_image_url[0]; ?>);">
						<a href="<?php the_permalink(); ?>">
						  <div class="carousel-caption">
							<h1><?php the_title(); ?></h1>
							<div class="hidden-xs hidden-sm">
								<?php the_excerpt(); ?>
							</div>
						  </div>
						</a>
					</div>
				<?php
				$active_class = "";
			endforeach;
			wp_reset_postdata();
		?>
	</div><!-- .carousel-inner -->

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Previous', 'morfeu'); ?></span>
	</a>
	<a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Next', 'morfeu'); ?></span>
	</a>
	<?php endif; ?>
</div>