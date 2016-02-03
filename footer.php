		</div><!-- .row -->
	</div><!-- #wrapper -->

	<footer id="footer" role="contentinfo">
		<div class="container">
			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'odin' ); ?> | <?php echo sprintf( __( 'Develope by <a href="#">Rodrigo Brito</a> with <a href="%s" rel="nofollow" target="_blank">Odin &hearts;</a>  - Powered by <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'odin' ), 'http://wpod.in/', 'http://wordpress.org/' ); ?></p>
		</div><!-- .container -->
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
	<script>
		window.sr = new scrollReveal();
	</script>
</body>
</html>
