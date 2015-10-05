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
<div id="carousel-home" class="carousel slide" data-ride="carousel">
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
					<h3><?php the_title(); ?></h3>
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
				<div class="col-sm-6 col-md-6 col-lg-3" data-sr="enter top">
					<div class="thumbnail">
						<img src="http://placehold.it/500x500" alt="Teste">
						<div class="caption">
							<h3>Thumbnail label</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3"  data-sr="enter top">
					<div class="thumbnail">
						<img src="http://placehold.it/500x500" alt="Teste">
						<div class="caption">
							<h3>Thumbnail label</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3" data-sr="enter top">
					<div class="thumbnail">
						<img src="http://placehold.it/500x500" alt="Teste">
						<div class="caption">
							<h3>Thumbnail label</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3" data-sr="enter top">
					<div class="thumbnail">
						<img src="http://placehold.it/500x500" alt="Teste">
						<div class="caption">
							<h3>Thumbnail label</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
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

			<div class="container">
				<div class="page-header" data-sr="enter top">
					<h1 id="timeline">Programação</h1>
				</div>
				<ul class="timeline">
					<li data-sr='enter right'>
						<div class="timeline-badge primary">
							<i class="glyphicon glyphicon-hand-left"></i>
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<div class="media">
									<div class="media-left">
										<a href="#">
											<img class="media-object" src="http://placehold.it/100x100" alt="Teste">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Media heading</h4>
										<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 1 de Janeiro de 2015</small></p>
										<div class="timeline-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
												Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
												dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
												Aliquam in felis sit amet augue.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li class="timeline-inverted" data-sr='enter left'>
						<div class="timeline-badge primary">
							<i class="glyphicon glyphicon-chevron-right"></i>
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Bootstrap 2</h4>
							</div>
							<div class="timeline-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
									Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
									dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
									Aliquam in felis sit amet augue.</p>
							</div>
						</div>
					</li>
					<li data-sr='enter right'>
						<div class="timeline-badge primary">
							<i class="glyphicon glyphicon-eye-open"></i>
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Left Event</h4>
								<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 3 years ago</small></p>
							</div>
							<div class="timeline-body">
								<p>Add more progress events and milestones to the left or right side of the timeline. Each event can be tagged with a date and given a beautiful icon to symbolize it's spectacular meaning.</p>
							</div>
						</div>
					</li>
					<li class="timeline-inverted" data-sr='enter left'>
						<div class="timeline-badge primary">
							<i class="glyphicon glyphicon-home"></i>
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Right Event</h4>
							</div>
							<div class="timeline-body">
								<p>Add more progress events and milestones to the left or right side of the timeline. Each event can be tagged with a date and given a beautiful icon to symbolize it's spectacular meaning.</p>
							</div>
						</div>
					</li>
					<li data-sr='enter right'>
						<div class="timeline-badge primary">
							<i class="glyphicon glyphicon-home"></i>
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Left Event</h4>
							</div>
							<div class="timeline-body">
								<p>Add more progress events and milestones to the left or right side of the timeline. Each event can be tagged with a date and given a beautiful icon to symbolize it's spectacular meaning.</p>

								<hr>
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
										<i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li class="divider"></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<li data-sr='enter right'>
						<div class="timeline-badge primary">
							<i class="glyphicon glyphicon-arrow-left"></i>
						</div>
						<div class="timeline-panel">

							<div class="timeline-heading">
								<h4 class="timeline-title">Left Event</h4>
							</div>
							<div class="timeline-body">
								<p>Add more progress events and milestones to the left or right side of the timeline. Each event can be tagged with a date and given a beautiful icon to symbolize it's spectacular meaning.</p>
							</div>
						</div>
					</li>
					<li class="timeline-inverted" data-sr='enter left'>
						<div class="timeline-badge primary"><i class="glyphicon glyphicon-thumbs-up"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Oldest event</h4>
							</div>
							<div class="timeline-body">
								<p>Add more progress events and milestones to the left or right side of the timeline. Each event can be tagged with a date and given a beautiful icon to symbolize it's spectacular meaning.</p>
							</div>
						</div>
					</li>
				</ul><!-- /.timeline -->
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
