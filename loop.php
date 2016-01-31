<div class="loop-itens clearfix">
	<?php
		$iteration = 1;
		if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
				/**
				 * Remove problems with grid blocks
				 */
				echo $iteration % 3 == 0 ? '<div class="clearfix"></div>' : '';
				$iteration++;
			endwhile;
		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );
		endif;
	?>
</div>
<?php odin_paging_nav(); ?>