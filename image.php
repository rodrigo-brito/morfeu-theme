<?php get_header(); ?>
	<main id="content" class="<?php echo odin_classes_page_sidebar(); ?>" tabindex="-1" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<header class="entry-header">
						<?php if(get_the_title()): ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php endif; ?>
						<div class="entry-meta entry-content">
							<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( 'Image total size: %s pixels', 'morfeu' ), sprintf( '<a href="%1$s" title="%2$s"><span>%3$s</span> &times; <span>%4$s</span></a>', esc_url( wp_get_attachment_url() ), esc_attr( __( 'Full image link', 'morfeu' ) ), $metadata['width'], $metadata['height'] ) );
							?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->

					<div class="entry-content entry-attachment">
						<p class="attachment"><a href="<?php echo wp_get_attachment_url( $post->ID, 'full' ); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_get_attachment_image( $post->ID, 'full' ); ?></a></p>
						<div class="entry-caption"><em><?php if ( ! empty( $post->post_excerpt ) ) the_excerpt(); ?></em></div>
						<?php the_content(); ?>

						<ul class="pager">
							<li class="previous"><?php previous_image_link( false, __( '&larr; Previous image', 'morfeu' ) ); ?></li>
							<li class="next"><?php next_image_link( false, __( 'Next image &rarr;', 'morfeu' ) ); ?></li>
						</ul><!-- .pager -->

						<?php if ( ! empty( $post->post_parent ) ) : ?>
							<ul class="pager page-title">
								<li class="previous"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Back to %s', 'morfeu' ), strip_tags( get_the_title( $post->post_parent ) ) ) ); ?>" rel="gallery"><?php printf( __( '<span class="meta-nav">&larr;</span> %s', 'morfeu' ), get_the_title( $post->post_parent ) ); ?></a></li>
							</ul><!-- .pager -->
						<?php endif; ?>
					</div><!-- .entry-content -->
				</article>
			<?php endwhile; ?>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
