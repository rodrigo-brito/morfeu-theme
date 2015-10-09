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
					<div class="col-lg-12 post-type">
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
								<?php if ( is_user_logged_in() ): ?>
								<p>
									<?php if( verificaCadastroMinicurso( get_the_ID() ) ): ?>
									<button href="#" data-minicurso="<?php echo get_the_ID(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="cadastrar-minicurso btn btn-primary" role="button" style="display: none;">Inscreva-se</button>
									<button href="#" data-minicurso="<?php echo get_the_ID(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="descadastrar-minicurso btn btn-danger" role="button">Cancelar Inscrição</button>
									<?php else: ?>
									<button href="#" data-minicurso="<?php echo get_the_ID(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="cadastrar-minicurso btn btn-primary" role="button">Inscreva-se</button>
									<button href="#" data-minicurso="<?php echo get_the_ID(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="descadastrar-minicurso btn btn-danger" role="button" style="display: none;">Cancelar Inscrição</button>
									<?php endif; ?>
								</p>
								<?php else: ?>
									<div class="alert alert-success" role="alert">
										<p>Para se inscrever em minicursos é preciso estar logado no sistema.</p>
									</div>
									<a href="<?php echo wp_registration_url(); ?>" class="btn btn-primary" role="button">Cadastre-se</a>
									<a href="<?php echo wp_login_url( $_SERVER['REQUEST_URI'] ); ?>" class="btn btn-default" role="button">Faça login</a>
								<?php endif; ?>
							</div>
						</div>
						<?php if( current_user_can( 'manage_options' ) ) : ?>
							<?php $participantes = get_field('participantes',get_the_ID());
							if ( $participantes ) :	?>
								<div class="inscritos">
									<h4>Inscritos</h4>
									<hr><!--
									<?php foreach ($participantes as $key => $participante) : ?>
										<div class="well col-md-6" id="participante-<?php echo $participante['ID']; ?>">
											<div class="media">
												<div class="media-left">
													<a href="<?php echo $participante['user_url']; ?>" title="<?php echo $participante['display_name']; ?>">
														<?php echo $participante['user_avatar']; ?>
													</a>
												</div>
												<div class="media-body">
													<h4 class="media-heading"><?php echo $participante['display_name']; ?></h4>
													<p><i class="glyphicon glyphicon-mail"></i> <?php echo $participante['user_email']; ?> </p>
													<p><button href="#" data-usuario="<?php echo $participante['ID']; ?>" data-minicurso="<?php echo get_the_ID(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="descadastrar-minicurso-usuario btn btn-danger" role="button">Remover</button></p>
												</div>
											</div>
										</div>
									<?php endforeach;?> -->
								</div>
								<table class="table table-hover">
									<th>ID</th>
									<th>Nome</th>
									<th>E-mail</th>
									<th></th>
									<?php foreach ($participantes as $key => $participante) : ?>
								  		<tr id="participante-<?php echo $participante['ID']; ?>">
						  					<td><?php echo $participante['ID']; ?></td>
											<td><?php echo $participante['display_name']; ?></td>
											<td><?php echo $participante['user_email']; ?></td>
											<td>
												<button href="#" data-usuario="<?php echo $participante['ID']; ?>" data-minicurso="<?php echo get_the_ID(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>" class="descadastrar-minicurso-usuario btn btn-danger" role="button">
													<span class="glyphicon glyphicon-trash"></span>
												</button>
											</td>
										</tr>
									<?php endforeach;?>
								</table>
							<?php endif;  ?>
						<?php endif; ?>
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
