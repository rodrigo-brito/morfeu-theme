<?php get_header(); ?>

	<main id="content" class="<?php echo odin_classes_page_sidebar(); ?>" tabindex="-1" role="main">
			<header class="page-header col-md-12">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );

					/*
					 * Queue the first post, that way we know what author
					 * we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop properly
					 * with a call to rewind_posts().
					 */
					the_post();
				?>
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author-biography">
						<span class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></span>
						<span class="author-description"><?php the_author_meta( 'description' ); ?></span>
					</div><!-- .author-biography -->
				<?php endif; ?>
			</header><!-- .archive-header -->
			<?php get_template_part('loop'); ?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
