		</div><!-- .row -->
	</div><!-- #wrapper -->

	<footer id="footer" role="contentinfo">
		<div class="container">
			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a> - <?php _e( 'All rights reserved', 'morfeu' ); ?> | <?php echo sprintf( __( 'Developed by <a href="%s" rel="nofollow" target="_blank">Rodrigo Brito</a> with Odin &hearts;  - Powered by <a href="%s" rel="nofollow" target="_blank">WordPress</a>.', 'morfeu' ), 'http://rodrigobrito.net', 'http://wordpress.org/' ); ?></p>
		</div><!-- .container -->
	</footer><!-- #footer -->
	<?php wp_footer(); ?>
</body>
</html>
