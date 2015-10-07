<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

	<div id="primary" class="<?php echo odin_classes_page_sidebar(); ?>">
		<main id="main-content" class="site-main" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
					<div class="col-lg-12 post-type" data-sr="enter top">
						<div class="thumbnail">
							<img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title(); ?>">
							<div class="caption">
								<h3><?php the_title(); ?></h3>
								<?php
									$vagas = get_field('qtde_vagas');
									$instrutor  = get_field('instrutor');
									$duracao = get_field('duracao');
								?>
								<?php if($duracao): ?>
								<p><strong>Duracao: </strong><?php echo $duracao; ?></p>
								<?php endif; ?>
								<?php if($vagas): ?>
								<p><strong>Vagas: </strong><?php echo $vagas; ?></p>
								<?php endif; ?>
								<?php if($instrutor): ?>
								<p><strong>Instrutor: </strong><?php echo $instrutor; ?></p>
								<?php endif; ?>
								<p><?php the_content(); ?></p>
								<p><a href="#" class="btn btn-primary" role="button">Inscreva-se</a></p>
							</div>
						</div>
					</div>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
