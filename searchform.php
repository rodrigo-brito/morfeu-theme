<?php
/**
 * The template for displaying Search Form.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<form method="get" id="searchform" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar..."  name="s" id="s" >
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-search"></span>
		</button>
      </span>
    </div><!-- /input-group -->
</form>
