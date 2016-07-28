<form method="get" class="searchform form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group">
      <input type="text" class="form-control" placeholder="<?php esc_attr_e('Search', 'morfeu') ?>"  name="s" >
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-search"></span>
		</button>
      </span>
    </div><!-- /input-group -->
</form>
