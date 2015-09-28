<?php
/**
 * The template for displaying Search Form.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<form method="get" id="searchform" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="form-group">
		<label for="s" class="sr-only"><?php _e( 'Search', 'odin' ); ?></label>
		<input type="search" class="form-control" name="s" id="s" />
	</div>
	<button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-search"></span></button>
</form>
