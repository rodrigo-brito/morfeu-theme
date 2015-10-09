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
$args = array( 'posts_per_page' => -1, 'post_type' => 'slider');
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
					<p><?php echo get_field('slider_descricao'); ?></p>
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
			<div class="row">
				<?php $args = array( 'posts_per_page' => -1, 'post_type' => 'minicurso');
				$minicurso = get_posts( $args );
				foreach ($minicurso as $post): ?>
					<?php setup_postdata( $post );
					$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'minicurso-home' ); ?>
					<div class="col-sm-6 col-md-6 col-lg-3" data-sr="enter top">
						<div class="thumbnail">
							<img src="<?php echo $thumbnail['0']; ?>" alt="<?php the_title(); ?>">
							<div class="caption">
								<h3><?php the_title(); ?></h3>
								<p><?php the_content(); ?></p>
								<p><a href="<?php the_permalink(); ?>" class="btn btn-primary form-control" role="button">Saiba Mais</a></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div><!-- /.row -->
			<div class="clearfix"></div>
			<div id="blog" class="row">
				<div class="container"  data-sr="enter top">
					<h2>Últimas Notícias</h2>
					<hr>
				</div>
				<?php
					// The Query
					$the_query = new WP_Query( ['posts_per_page' => 3, 'post_type' => 'post'] );

					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>

							<div class="item-blog col-md-4" data-sr="enter top">
								<div class="media">
									<?php
									$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'post-home' );
									?>
									<div class="media-left">
										<a href="<?php echo the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<img class="media-object" src="<?php echo $thumbnail['0']; ?>" />
										</a>
									</div>
									<div class="media-body">
										<a href="<?php echo the_permalink(); ?>">
											<h4 class="media-heading"><?php echo the_title(); ?></h4>
										</a>
										<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php the_date(); ?> </small></p>
									</div>
								</div>
							</div>
						<?php }
					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();
				?>
				<div class="more" data-sr="enter top">
					<a href="<?php echo bloginfo('url');?>">Mais notícias <span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
			<!-- /.blog -->
			<div class="page-header" data-sr="enter top">
				<h2 id="timeline">Programação</h2>
			</div>
			<div class="container">
				<div class="row">
					<ul class="timeline">
						<?php
						$args = array(
									'posts_per_page' 	=> -1,
									'post_type' 		=> 'evento',
									'meta_query' => array(
										array(
											'key'     => 'data_evento',
											'orderby' => 'meta_value_num',
											'order' => 'ASC',
										),
										array(
											'key'     => 'hora_evento',
											'orderby' => 'meta_value',
											'order' => 'ASC'
										)
									),
								);
						$sliders = get_posts( $args );
						$indice = 0;
						foreach ($sliders as $post) : setup_postdata( $post );
							$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-home' ); 
							$date = DateTime::createFromFormat('Ymd', get_field('data_evento')); ?>
							<?php if($indice % 2 == 0): ?>
							<li data-sr='enter right'>
							<?php else: ?>
							<li class="timeline-inverted" data-sr='enter left'>
							<?php endif; $indice++; ?>
								<div class="timeline-badge primary">
									<i class="glyphicon glyphicon-calendar"></i>
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<div class="media">
											<div class="media-left">
												<a href="<?php the_permalink(); ?>">
													<img class="media-object" src="<?php echo $thumbnail['0']; ?>">
												</a>
											</div>
											<div class="media-body">
												<h4 class="media-heading">
													<?php $evento = get_field('pagina_evento');
													if($evento): ?>
														<a href="<?php echo get_permalink($evento->ID); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
													<?php else: ?>
														<?php the_title(); ?>
													<?php endif; ?>
												</h4>
												<?php
													if($date){
														$data = $date->format('j \d\e F \d\e Y');
													}
													$hora = get_field('hora_evento');
												 ?>
												<p><small class="text-muted"><?php echo isset($data)?'<i class="glyphicon glyphicon-calendar"> </i> '.$data:''; ?><?php echo !empty($hora)?' <i class="glyphicon glyphicon-time"> </i> '.$hora:''; ?></small></p>
												<div class="timeline-body">
													<p><?php echo get_field('descricao_evento'); ?></p>
													<?php $local =  get_field('local_evento'); ?>
													<?php if($local): ?>
													<p><strong>Local: </strong><?php echo $local; ?></p>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
						<?php /* Restore original Post Data */
						wp_reset_postdata(); ?>
					</ul><!-- /.timeline -->
				</div>
			</div><!-- /.container -->
		</main><!-- /#content -->
	</div><!-- .row -->
</div><!-- #wrapper -->

<!-- Google Maps -->
<div id="map-home">
	<div class="address visible-lg" data-sr='enter top'>
		<h3>IFMG - Campus Sabará</h3>
		<p>Avenida Serra da Piedade, 299</p>
		<p>Morada da Serra, Sabará - MG, CEP 34515-640.</p>
		<p>Tel. (31) 3670-1072</p>
	</div><!-- /.address -->
	<div id="map"></div><!-- /#map -->
</div><!-- /#map-home -->
	
<!-- For close in footer.php -->
<div id="wrapper">
	<div class="row">
<?php
get_footer();
